<?php
// auto-generated by sfAdvancedAdmin
// date: 2015/10/30 10:56:51
?>
<?php

/**
 * autoArticle actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoArticle
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 390 2007-12-18 15:59:00Z romain $
 */
class autoArticleActions extends sfActions
{
  public function preExecute()
  {
    $this->maps = $this->getMaps();
  }
  
  public function executeAutocomplete() {
    $table  = sfInflector::camelize($this->getRequestParameter('table'));
    $field  = sfInflector::camelize($this->getRequestParameter('field'));
    $txt    = strtolower("${table}_${field}_search");
    $search = $this->getRequestParameter($txt);
    $return = '';
    $c = new Criteria();
    $c->add(constant($table.'Peer::'.strtoupper($field)), '%'.$search.'%', Criteria::LIKE);
    foreach (call_user_func(array($table.'Peer', 'doSelect'), $c) as $item) {
      $return .= '<li id="'.$item->getId().'">'.call_user_func(array($item, 'get'.$this->getRequestParameter('field'))).'</li>';
    }
    return $this->renderText('<ul>'.$return.'</ul>');
  }
  
  public function executeIndex()
  {
    return $this->forward('article', 'list');
  }


  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/article/filters');

    // pager
    $this->pager = new sfPropelPager('Article', 25);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $c->addJoin(ArticlePeer::CREATED_BY,sfGuardUserPeer::ID, Criteria::LEFT_JOIN);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function executeShow()
  {
    $this->article = $this->getArticleOrCreate();
    if ($this->article->isNew()) {
    	return $this->forward('article', 'create');
    }
    $this->labels = $this->getLabels();
  }

  public function executeCreate()
  {
    
    $this->article = new Article();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      return $this->handlePost();
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeSave()
  {
    return $this->forward('article', 'edit');
  }

  public function executeEdit()
  {
    $this->article = $this->getArticleOrCreate();
        if (! $this->article->canEdit())
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }
    
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      return $this->handlePost();
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->article = ArticlePeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->article);

    try
    {
      $this->deleteArticle($this->article);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected element. Make sure it does not have any associated items.');
      return $this->forward('article', 'list');
    }
    
    switch ($this->getActionName()) {
      case 'create':
        break;
      case 'edit':
        break;
    }

    $this->setFlash('notice', 'The selected element has been successfully deleted');

    return $this->redirect('article/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->article = $this->getArticleOrCreate();
    $this->updateArticleFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  public function handleErrorCreate()
  {
    $this->preExecute();
    $this->article = $this->getArticleOrCreate();
    $this->updateArticleFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  public function handlePost()
  {
    $this->updateArticleFromRequest();

    $this->saveArticle($this->article);

    $this->setFlash('notice', 'Your modifications have been saved');

    if ($this->getRequestParameter('save_and_add'))
    {
      return $this->redirect('article/create');
    }
    else if ($this->getRequestParameter('save_and_list'))
    {
      return $this->redirect('article/list');
    }
    else
    {
      return $this->redirect('article/edit?id='.$this->article->getId());
    }
  }
  
  protected function saveArticle($article)
  {
    $article->save();

    switch ($this->getActionName()) {
      case 'create':
          // Update many-to-many for "article_tag"
          $c = new Criteria();
          $c->add(ArticleTagPeer::ARTICLE_ID, $article->getPrimaryKey());
          ArticleTagPeer::doDelete($c);

          $ids = $this->getRequestParameter('associated_article_tag');
          if (is_array($ids))
          {
            foreach ($ids as $id)
            {
              $ArticleTag = new ArticleTag();
              $ArticleTag->setArticleId($article->getPrimaryKey());
              $ArticleTag->setTagId($id);
              $ArticleTag->save();
            }
          }

          // Update many-to-many for "article_section"
          $c = new Criteria();
          $c->add(ArticleSectionPeer::ARTICLE_ID, $article->getPrimaryKey());
          ArticleSectionPeer::doDelete($c);

          $ids = $this->getRequestParameter('associated_article_section');
          if (is_array($ids))
          {
            foreach ($ids as $id)
            {
              $ArticleSection = new ArticleSection();
              $ArticleSection->setArticleId($article->getPrimaryKey());
              $ArticleSection->setSectionId($id);
              $ArticleSection->save();
            }
          }

        break;
      case 'edit':
          // Update many-to-many for "article_tag"
          $c = new Criteria();
          $c->add(ArticleTagPeer::ARTICLE_ID, $article->getPrimaryKey());
          ArticleTagPeer::doDelete($c);

          $ids = $this->getRequestParameter('associated_article_tag');
          if (is_array($ids))
          {
            foreach ($ids as $id)
            {
              $ArticleTag = new ArticleTag();
              $ArticleTag->setArticleId($article->getPrimaryKey());
              $ArticleTag->setTagId($id);
              $ArticleTag->save();
            }
          }

          // Update many-to-many for "article_section"
          $c = new Criteria();
          $c->add(ArticleSectionPeer::ARTICLE_ID, $article->getPrimaryKey());
          ArticleSectionPeer::doDelete($c);

          $ids = $this->getRequestParameter('associated_article_section');
          if (is_array($ids))
          {
            foreach ($ids as $id)
            {
              $ArticleSection = new ArticleSection();
              $ArticleSection->setArticleId($article->getPrimaryKey());
              $ArticleSection->setSectionId($id);
              $ArticleSection->save();
            }
          }

        break;
    }
  }

  protected function deleteArticle($article)
  {
    $article->delete();
  }

  protected function updateArticleFromRequest()
  {
    $article = $this->getRequestParameter('article');

    switch ($this->getActionName()) {
      case 'create':
        if (isset($article['name']))
        {
          $this->article->setName($article['name']);
        }
        if (isset($article['source_id']))
        {
          $this->article->setSourceId($article['source_id'] ? $article['source_id'] : null);
        }
        if (isset($article['type_field']))
        {
          $this->article->setTypeField($article['type_field']);
        }
        if (isset($article['comment']))
        {
          $this->article->setComment($article['comment']);
        }
      if ($this->getUser()->hasCredential(array (   0 =>    array (     0 => 'reporter_admin',     1 => 'designer_admin',   ), )))
      {
        if (isset($article['is_published']))
        {
          $this->article->setIsPublished($article['is_published']);
        }
      }
        if (isset($article['article_tag']))
        {
          $this->article->setArticleTag($article['article_tag']);
        }
        if (isset($article['section_id']))
        {
          $this->article->setSectionId($article['section_id'] ? $article['section_id'] : null);
        }
        if (isset($article['article_section']))
        {
          $this->article->setArticleSection($article['article_section']);
        }
        if (isset($article['upper_description']))
        {
          $this->article->setUpperDescription($article['upper_description']);
        }
        if (isset($article['title']))
        {
          $this->article->setTitle($article['title']);
        }
        if (isset($article['heading']))
        {
          $this->article->setHeading($article['heading']);
        }
        if (isset($article['editor']))
        {
          $this->article->setEditor($article['editor']);
        }
        if (isset($article['contact']))
        {
          $this->article->setContact($article['contact']);
        }
        if (isset($article['multimedia_id']))
        {
          $this->article->setMultimediaId($article['multimedia_id'] ? $article['multimedia_id'] : null);
        }
        if (isset($article['zoomable_multimedia']))
        {
          $this->article->setZoomableMultimedia($article['zoomable_multimedia']);
        }
        if (isset($article['main_gallery_id']))
        {
          $this->article->setMainGalleryId($article['main_gallery_id'] ? $article['main_gallery_id'] : null);
        }
        if (isset($article['reference_type']))
        {
          $this->article->setReferenceType($article['reference_type']);
        }
        if (isset($article['reference']))
        {
          $this->article->setReference($article['reference']);
        }
        if (isset($article['open_reference_new_window']))
        {
          $this->article->setOpenReferenceNewWindow($article['open_reference_new_window']);
        }
        if (isset($article['auto_publish_at']))
        {
          if ($article['auto_publish_at'])
          {
            try
            {
              $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                                  if (!is_array($article['auto_publish_at']))
              {
                $value = $dateFormat->format($article['auto_publish_at'], 'I', $dateFormat->getInputPattern('g'));
              }
              else
              {
                $value_array = $article['auto_publish_at'];
                $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
              }
              $this->article->setAutoPublishAt($value);
            }
            catch (sfException $e)
            {
              // not a date
            }
          }
          else
          {
            $this->article->setAutoPublishAt(null);
          }
        }
        if (isset($article['auto_unpublish_at']))
        {
          if ($article['auto_unpublish_at'])
          {
            try
            {
              $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                                  if (!is_array($article['auto_unpublish_at']))
              {
                $value = $dateFormat->format($article['auto_unpublish_at'], 'I', $dateFormat->getInputPattern('g'));
              }
              else
              {
                $value_array = $article['auto_unpublish_at'];
                $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
              }
              $this->article->setAutoUnpublishAt($value);
            }
            catch (sfException $e)
            {
              // not a date
            }
          }
          else
          {
            $this->article->setAutoUnpublishAt(null);
          }
        }
      break;
      case 'edit':
        if (isset($article['name']))
        {
          $this->article->setName($article['name']);
        }
        if (isset($article['source_id']))
        {
          $this->article->setSourceId($article['source_id'] ? $article['source_id'] : null);
        }
        if (isset($article['type_field']))
        {
          $this->article->setTypeField($article['type_field']);
        }
        if (isset($article['comment']))
        {
          $this->article->setComment($article['comment']);
        }
        if (isset($article['article_tag']))
        {
          $this->article->setArticleTag($article['article_tag']);
        }
        if (isset($article['section_id']))
        {
          $this->article->setSectionId($article['section_id'] ? $article['section_id'] : null);
        }
        if (isset($article['article_section']))
        {
          $this->article->setArticleSection($article['article_section']);
        }
        if (isset($article['upper_description']))
        {
          $this->article->setUpperDescription($article['upper_description']);
        }
        if (isset($article['title']))
        {
          $this->article->setTitle($article['title']);
        }
        if (isset($article['heading']))
        {
          $this->article->setHeading($article['heading']);
        }
        if (isset($article['editor']))
        {
          $this->article->setEditor($article['editor']);
        }
        if (isset($article['contact']))
        {
          $this->article->setContact($article['contact']);
        }
        if (isset($article['multimedia_id']))
        {
          $this->article->setMultimediaId($article['multimedia_id'] ? $article['multimedia_id'] : null);
        }
        if (isset($article['zoomable_multimedia']))
        {
          $this->article->setZoomableMultimedia($article['zoomable_multimedia']);
        }
        if (isset($article['main_gallery_id']))
        {
          $this->article->setMainGalleryId($article['main_gallery_id'] ? $article['main_gallery_id'] : null);
        }
        if (isset($article['reference_type']))
        {
          $this->article->setReferenceType($article['reference_type']);
        }
        if (isset($article['reference']))
        {
          $this->article->setReference($article['reference']);
        }
        if (isset($article['open_reference_new_window']))
        {
          $this->article->setOpenReferenceNewWindow($article['open_reference_new_window']);
        }
        if (isset($article['auto_publish_at']))
        {
          if ($article['auto_publish_at'])
          {
            try
            {
              $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                                  if (!is_array($article['auto_publish_at']))
              {
                $value = $dateFormat->format($article['auto_publish_at'], 'I', $dateFormat->getInputPattern('g'));
              }
              else
              {
                $value_array = $article['auto_publish_at'];
                $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
              }
              $this->article->setAutoPublishAt($value);
            }
            catch (sfException $e)
            {
              // not a date
            }
          }
          else
          {
            $this->article->setAutoPublishAt(null);
          }
        }
        if (isset($article['auto_unpublish_at']))
        {
          if ($article['auto_unpublish_at'])
          {
            try
            {
              $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                                  if (!is_array($article['auto_unpublish_at']))
              {
                $value = $dateFormat->format($article['auto_unpublish_at'], 'I', $dateFormat->getInputPattern('g'));
              }
              else
              {
                $value_array = $article['auto_unpublish_at'];
                $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
              }
              $this->article->setAutoUnpublishAt($value);
            }
            catch (sfException $e)
            {
              // not a date
            }
          }
          else
          {
            $this->article->setAutoUnpublishAt(null);
          }
        }
      break;
    }
  }

  protected function getArticleOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $article = new Article();
    }
    else
    {
      $article = ArticlePeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($article);
    }

    return $article;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');
      if (isset($filters['updated_at']['from']) && $filters['updated_at']['from'] !== '')
      {
        $filters['updated_at']['from'] = sfI18N::getTimestampForCulture($filters['updated_at']['from'], $this->getUser()->getCulture());
      }
      if (isset($filters['updated_at']['to']) && $filters['updated_at']['to'] !== '')
      {
        $filters['updated_at']['to'] = sfI18N::getTimestampForCulture($filters['updated_at']['to'], $this->getUser()->getCulture());
      }

      // reset Multi-sort
      if (!is_array($filters)) 
      {
        $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/article/sort');

        if (!$this->getUser()->getAttributeHolder()->getAll('sf_admin/article/sort'))
        {
          $this->getUser()->setAttribute('created_at', 'desc', 'sf_admin/article/sort');
        }

      }

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/article/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/article/filters');
    }
  }

  protected function processSort()
  {
    $sort = $this->getRequestParameter('sort');
    $type = $this->getRequestParameter('type');
    
    if ($sort)
    {
      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/article/sort');
      

      $this->getUser()->setAttribute($sort, $type, 'sf_admin/article/sort');
    }

    if (!$this->getUser()->getAttributeHolder()->getAll('sf_admin/article/sort'))
    {


      $this->getUser()->setAttribute('created_at', 'desc', 'sf_admin/article/sort');


    }
  }

  protected function addFiltersCriteria($c)
  {
    $c->setIgnoreCase(true);
    if (isset($this->filters['title_is_empty']))
    {
      $criterion = $c->getNewCriterion(ArticlePeer::TITLE, '');
      $criterion->addOr($c->getNewCriterion(ArticlePeer::TITLE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['title']) && $this->filters['title'] !== '')
    {
      $c->add(ArticlePeer::TITLE, strtr($this->filters['title'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['name_is_empty']))
    {
      $criterion = $c->getNewCriterion(ArticlePeer::NAME, '');
      $criterion->addOr($c->getNewCriterion(ArticlePeer::NAME, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['name']) && $this->filters['name'] !== '')
    {
      $c->add(ArticlePeer::NAME, strtr($this->filters['name'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['type_is_empty']))
    {
      $criterion = $c->getNewCriterion(ArticlePeer::TYPE, '');
      $criterion->addOr($c->getNewCriterion(ArticlePeer::TYPE, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['type']) && $this->filters['type'] !== '')
    {
      $c->add(ArticlePeer::TYPE, $this->filters['type']);
    }
    if (isset($this->filters['is_published_is_empty']))
    {
      $criterion = $c->getNewCriterion(ArticlePeer::IS_PUBLISHED, '');
      $criterion->addOr($c->getNewCriterion(ArticlePeer::IS_PUBLISHED, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['is_published']) && $this->filters['is_published'] !== '')
    {
      $c->add(ArticlePeer::IS_PUBLISHED, $this->filters['is_published']);
    }
    if (isset($this->filters['is_deleted_is_empty']))
    {
      $criterion = $c->getNewCriterion(ArticlePeer::IS_DELETED, '');
      $criterion->addOr($c->getNewCriterion(ArticlePeer::IS_DELETED, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['is_deleted']) && $this->filters['is_deleted'] !== '')
    {
      $c->add(ArticlePeer::IS_DELETED, $this->filters['is_deleted']);
    }
    if (isset($this->filters['is_archived_is_empty']))
    {
      $criterion = $c->getNewCriterion(ArticlePeer::IS_ARCHIVED, '');
      $criterion->addOr($c->getNewCriterion(ArticlePeer::IS_ARCHIVED, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['is_archived']) && $this->filters['is_archived'] !== '')
    {
      $c->add(ArticlePeer::IS_ARCHIVED, $this->filters['is_archived']);
    }
    if (isset($this->filters['section_id_is_empty']))
    {
      $criterion = $c->getNewCriterion(ArticlePeer::SECTION_ID, '');
      $criterion->addOr($c->getNewCriterion(ArticlePeer::SECTION_ID, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['section_id']) && $this->filters['section_id'] !== '')
    {
      $c->add(ArticlePeer::SECTION_ID, $this->filters['section_id']);
    }
    if (isset($this->filters['created_by_is_empty']))
    {
      $criterion = $c->getNewCriterion(ArticlePeer::CREATED_BY, '');
      $criterion->addOr($c->getNewCriterion(ArticlePeer::CREATED_BY, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['created_by']) && $this->filters['created_by'] !== '')
    {
      $c->add(ArticlePeer::CREATED_BY, $this->filters['created_by']);
    }
    if (isset($this->filters['updated_at_is_empty']))
    {
      $criterion = $c->getNewCriterion(ArticlePeer::UPDATED_AT, '');
      $criterion->addOr($c->getNewCriterion(ArticlePeer::UPDATED_AT, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['updated_at']))
    {
      if (isset($this->filters['updated_at']['from']) && $this->filters['updated_at']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(ArticlePeer::UPDATED_AT, $this->filters['updated_at']['from'], Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['updated_at']['to']) && $this->filters['updated_at']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(ArticlePeer::UPDATED_AT, $this->filters['updated_at']['to'], Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(ArticlePeer::UPDATED_AT, $this->filters['updated_at']['to'], Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
  }

  protected function addSortCriteria($c)
  {
    $sort_array = $this->getUser()->getAttributeHolder()->getAll('sf_admin/article/sort');

    if ($sort_array) 
    {
      $sort_columns = Array();
      foreach($sort_array as $sort_column => $sort_type) 
      {
        switch ($sort_column) 
        {
          case 'author':
 
            $sort_columns[sfGuardUserPeer::NAME] = $sort_type;
            break;
            
          case 'type_text':
 
            $sort_columns[ArticlePeer::TYPE] = $sort_type;
            break;
            
          default:
			$sort_column = strtolower($sort_column);
			$sort_column_php = sfInflector::camelize($sort_column);
            $sort_columns[ArticlePeer::translateFieldName($sort_column_php, BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME)] = $sort_type;
            break;
        }
        
        if ($sort_type=='none') 
        {
          $this->getUser()->getAttributeHolder()->remove($sort_column, null, 'sf_admin/article/sort');
        }
      }

      foreach($sort_columns as $sort_column => $sort_type) 
      {
        switch ($sort_type)
        {
          case 'asc':
            $c->addAscendingOrderByColumn($sort_column);
            break;
          case 'desc': 
            $c->addDescendingOrderByColumn($sort_column);
            break;
        }
      }
    }
  }


  protected function getLabels()
  {
    switch ($this->getActionName()) {
      case 'create':
        return array(
          'article{name}' => 'Nombre:',
          'article{source_id}' => 'Fuente:',
          'article{type_field}' => 'Tipo:',
          'article{comment}' => 'Comentario:',
          'article{is_published}' => 'Publicado:',
          'article{article_tag}' => 'Categorías:',
          'article{section_id}' => 'Sección:',
          'article{article_section}' => 'Secciones relacionadas:',
          'article{upper_description}' => 'Volanta:',
          'article{title}' => 'Título:',
          'article{heading}' => 'Copete:',
          'article{editor}' => 'Cuerpo:',
          'article{contact}' => 'Email de contacto:',
          'article{multimedia_id}' => 'Imagen destacada:',
          'article{zoomable_multimedia}' => 'Ampliar imagen destacada:',
          'article{main_gallery_id}' => 'Galería destacada:',
          'article{reference_type}' => 'Tipo de enlace:',
          'article{reference}' => 'Enlace:',
          'article{open_reference_new_window}' => 'Abrir en nueva ventana:',
          'article{auto_publish_at}' => 'Publicar articulo automáticamente el:',
          'article{auto_unpublish_at}' => 'Despublicar articulo automáticamente el:',
        );
        break;
      case 'edit':
        return array(
          'article{name}' => 'Nombre:',
          'article{source_id}' => 'Fuente:',
          'article{type_field}' => 'Tipo:',
          'article{comment}' => 'Comentario:',
          'article{article_tag}' => 'Categorías:',
          'article{section_id}' => 'Sección:',
          'article{article_section}' => 'Secciones relacionadas:',
          'article{upper_description}' => 'Volanta:',
          'article{title}' => 'Título:',
          'article{heading}' => 'Copete:',
          'article{editor}' => 'Cuerpo:',
          'article{contact}' => 'Email de contacto:',
          'article{multimedia_id}' => 'Imagen destacada:',
          'article{zoomable_multimedia}' => 'Ampliar imagen destacada:',
          'article{main_gallery_id}' => 'Galería destacada:',
          'article{reference_type}' => 'Tipo de enlace:',
          'article{reference}' => 'Enlace:',
          'article{open_reference_new_window}' => 'Abrir en nueva ventana:',
          'article{auto_publish_at}' => 'Publicar articulo automáticamente el:',
          'article{auto_unpublish_at}' => 'Despublicar articulo automáticamente el:',
        );
        break;
      case 'show':
        return array(
          'article{source}' => 'Fuente:',
          'article{type_text}' => 'Tipo:',
          'article{comment}' => 'Comentario:',
          'article{current_status}' => 'Estado:',
          'article{section}' => 'Sección:',
          'article{references}' => 'Referenciado en:',
          'article{author}' => 'Author:',
          'article{created_at}' => 'Fecha de creación:',
          'article{author_updated}' => 'Actualizado por:',
          'article{updated_at}' => 'Última actualización:',
          'article{full_html_representation}' => 'Vista previa:',
          'article{auto_publish_at}' => 'Publicar articulo automáticamente el:',
          'article{auto_unpublish_at}' => 'Despublicar articulo automáticamente el:',
        );
        break;
    }
  }

  protected function getMaps()
  {
    return NULL;
  }
}

