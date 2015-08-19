<?php


abstract class BaseSection extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $title;


	
	protected $priority = 0;


	
	protected $description;


	
	protected $comment;


	
	protected $is_published = false;


	
	protected $multimedia_id;


	
	protected $section_id;


	
	protected $template_id;


	
	protected $article_id;


	
	protected $layout_id;


	
	protected $color;


	
	protected $article_group_id;

	
	protected $aMultimedia;

	
	protected $aSectionRelatedBySectionId;

	
	protected $aTemplate;

	
	protected $aArticle;

	
	protected $aLayout;

	
	protected $aArticleGroup;

	
	protected $collsfGuardUsers;

	
	protected $lastsfGuardUserCriteria = null;

	
	protected $collArticles;

	
	protected $lastArticleCriteria = null;

	
	protected $collEventSections;

	
	protected $lastEventSectionCriteria = null;

	
	protected $collArticleSections;

	
	protected $lastArticleSectionCriteria = null;

	
	protected $collSectionTags;

	
	protected $lastSectionTagCriteria = null;

	
	protected $collSectionsRelatedBySectionId;

	
	protected $lastSectionRelatedBySectionIdCriteria = null;

	
	protected $collSectionLinks;

	
	protected $lastSectionLinkCriteria = null;

	
	protected $collSectionDocuments;

	
	protected $lastSectionDocumentCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getPriority()
	{

		return $this->priority;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getComment()
	{

		return $this->comment;
	}

	
	public function getIsPublished()
	{

		return $this->is_published;
	}

	
	public function getMultimediaId()
	{

		return $this->multimedia_id;
	}

	
	public function getSectionId()
	{

		return $this->section_id;
	}

	
	public function getTemplateId()
	{

		return $this->template_id;
	}

	
	public function getArticleId()
	{

		return $this->article_id;
	}

	
	public function getLayoutId()
	{

		return $this->layout_id;
	}

	
	public function getColor()
	{

		return $this->color;
	}

	
	public function getArticleGroupId()
	{

		return $this->article_group_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SectionPeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = SectionPeer::NAME;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = SectionPeer::TITLE;
		}

	} 
	
	public function setPriority($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->priority !== $v || $v === 0) {
			$this->priority = $v;
			$this->modifiedColumns[] = SectionPeer::PRIORITY;
		}

	} 
	
	public function setDescription($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = SectionPeer::DESCRIPTION;
		}

	} 
	
	public function setComment($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = SectionPeer::COMMENT;
		}

	} 
	
	public function setIsPublished($v)
	{

		if ($this->is_published !== $v || $v === false) {
			$this->is_published = $v;
			$this->modifiedColumns[] = SectionPeer::IS_PUBLISHED;
		}

	} 
	
	public function setMultimediaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->multimedia_id !== $v) {
			$this->multimedia_id = $v;
			$this->modifiedColumns[] = SectionPeer::MULTIMEDIA_ID;
		}

		if ($this->aMultimedia !== null && $this->aMultimedia->getId() !== $v) {
			$this->aMultimedia = null;
		}

	} 
	
	public function setSectionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->section_id !== $v) {
			$this->section_id = $v;
			$this->modifiedColumns[] = SectionPeer::SECTION_ID;
		}

		if ($this->aSectionRelatedBySectionId !== null && $this->aSectionRelatedBySectionId->getId() !== $v) {
			$this->aSectionRelatedBySectionId = null;
		}

	} 
	
	public function setTemplateId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->template_id !== $v) {
			$this->template_id = $v;
			$this->modifiedColumns[] = SectionPeer::TEMPLATE_ID;
		}

		if ($this->aTemplate !== null && $this->aTemplate->getId() !== $v) {
			$this->aTemplate = null;
		}

	} 
	
	public function setArticleId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->article_id !== $v) {
			$this->article_id = $v;
			$this->modifiedColumns[] = SectionPeer::ARTICLE_ID;
		}

		if ($this->aArticle !== null && $this->aArticle->getId() !== $v) {
			$this->aArticle = null;
		}

	} 
	
	public function setLayoutId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->layout_id !== $v) {
			$this->layout_id = $v;
			$this->modifiedColumns[] = SectionPeer::LAYOUT_ID;
		}

		if ($this->aLayout !== null && $this->aLayout->getId() !== $v) {
			$this->aLayout = null;
		}

	} 
	
	public function setColor($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->color !== $v) {
			$this->color = $v;
			$this->modifiedColumns[] = SectionPeer::COLOR;
		}

	} 
	
	public function setArticleGroupId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->article_group_id !== $v) {
			$this->article_group_id = $v;
			$this->modifiedColumns[] = SectionPeer::ARTICLE_GROUP_ID;
		}

		if ($this->aArticleGroup !== null && $this->aArticleGroup->getId() !== $v) {
			$this->aArticleGroup = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->title = $rs->getString($startcol + 2);

			$this->priority = $rs->getInt($startcol + 3);

			$this->description = $rs->getString($startcol + 4);

			$this->comment = $rs->getString($startcol + 5);

			$this->is_published = $rs->getBoolean($startcol + 6);

			$this->multimedia_id = $rs->getInt($startcol + 7);

			$this->section_id = $rs->getInt($startcol + 8);

			$this->template_id = $rs->getInt($startcol + 9);

			$this->article_id = $rs->getInt($startcol + 10);

			$this->layout_id = $rs->getInt($startcol + 11);

			$this->color = $rs->getString($startcol + 12);

			$this->article_group_id = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Section object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseSection:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SectionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SectionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseSection:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseSection:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SectionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseSection:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aMultimedia !== null) {
				if ($this->aMultimedia->isModified()) {
					$affectedRows += $this->aMultimedia->save($con);
				}
				$this->setMultimedia($this->aMultimedia);
			}

			if ($this->aSectionRelatedBySectionId !== null) {
				if ($this->aSectionRelatedBySectionId->isModified()) {
					$affectedRows += $this->aSectionRelatedBySectionId->save($con);
				}
				$this->setSectionRelatedBySectionId($this->aSectionRelatedBySectionId);
			}

			if ($this->aTemplate !== null) {
				if ($this->aTemplate->isModified()) {
					$affectedRows += $this->aTemplate->save($con);
				}
				$this->setTemplate($this->aTemplate);
			}

			if ($this->aArticle !== null) {
				if ($this->aArticle->isModified()) {
					$affectedRows += $this->aArticle->save($con);
				}
				$this->setArticle($this->aArticle);
			}

			if ($this->aLayout !== null) {
				if ($this->aLayout->isModified()) {
					$affectedRows += $this->aLayout->save($con);
				}
				$this->setLayout($this->aLayout);
			}

			if ($this->aArticleGroup !== null) {
				if ($this->aArticleGroup->isModified()) {
					$affectedRows += $this->aArticleGroup->save($con);
				}
				$this->setArticleGroup($this->aArticleGroup);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SectionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SectionPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collsfGuardUsers !== null) {
				foreach($this->collsfGuardUsers as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticles !== null) {
				foreach($this->collArticles as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEventSections !== null) {
				foreach($this->collEventSections as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticleSections !== null) {
				foreach($this->collArticleSections as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSectionTags !== null) {
				foreach($this->collSectionTags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSectionsRelatedBySectionId !== null) {
				foreach($this->collSectionsRelatedBySectionId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSectionLinks !== null) {
				foreach($this->collSectionLinks as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSectionDocuments !== null) {
				foreach($this->collSectionDocuments as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aMultimedia !== null) {
				if (!$this->aMultimedia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMultimedia->getValidationFailures());
				}
			}

			if ($this->aSectionRelatedBySectionId !== null) {
				if (!$this->aSectionRelatedBySectionId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSectionRelatedBySectionId->getValidationFailures());
				}
			}

			if ($this->aTemplate !== null) {
				if (!$this->aTemplate->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTemplate->getValidationFailures());
				}
			}

			if ($this->aArticle !== null) {
				if (!$this->aArticle->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArticle->getValidationFailures());
				}
			}

			if ($this->aLayout !== null) {
				if (!$this->aLayout->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLayout->getValidationFailures());
				}
			}

			if ($this->aArticleGroup !== null) {
				if (!$this->aArticleGroup->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArticleGroup->getValidationFailures());
				}
			}


			if (($retval = SectionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collsfGuardUsers !== null) {
					foreach($this->collsfGuardUsers as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticles !== null) {
					foreach($this->collArticles as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEventSections !== null) {
					foreach($this->collEventSections as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticleSections !== null) {
					foreach($this->collArticleSections as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSectionTags !== null) {
					foreach($this->collSectionTags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSectionLinks !== null) {
					foreach($this->collSectionLinks as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSectionDocuments !== null) {
					foreach($this->collSectionDocuments as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SectionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getTitle();
				break;
			case 3:
				return $this->getPriority();
				break;
			case 4:
				return $this->getDescription();
				break;
			case 5:
				return $this->getComment();
				break;
			case 6:
				return $this->getIsPublished();
				break;
			case 7:
				return $this->getMultimediaId();
				break;
			case 8:
				return $this->getSectionId();
				break;
			case 9:
				return $this->getTemplateId();
				break;
			case 10:
				return $this->getArticleId();
				break;
			case 11:
				return $this->getLayoutId();
				break;
			case 12:
				return $this->getColor();
				break;
			case 13:
				return $this->getArticleGroupId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SectionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getTitle(),
			$keys[3] => $this->getPriority(),
			$keys[4] => $this->getDescription(),
			$keys[5] => $this->getComment(),
			$keys[6] => $this->getIsPublished(),
			$keys[7] => $this->getMultimediaId(),
			$keys[8] => $this->getSectionId(),
			$keys[9] => $this->getTemplateId(),
			$keys[10] => $this->getArticleId(),
			$keys[11] => $this->getLayoutId(),
			$keys[12] => $this->getColor(),
			$keys[13] => $this->getArticleGroupId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SectionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setTitle($value);
				break;
			case 3:
				$this->setPriority($value);
				break;
			case 4:
				$this->setDescription($value);
				break;
			case 5:
				$this->setComment($value);
				break;
			case 6:
				$this->setIsPublished($value);
				break;
			case 7:
				$this->setMultimediaId($value);
				break;
			case 8:
				$this->setSectionId($value);
				break;
			case 9:
				$this->setTemplateId($value);
				break;
			case 10:
				$this->setArticleId($value);
				break;
			case 11:
				$this->setLayoutId($value);
				break;
			case 12:
				$this->setColor($value);
				break;
			case 13:
				$this->setArticleGroupId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SectionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitle($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setPriority($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescription($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setComment($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIsPublished($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMultimediaId($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSectionId($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTemplateId($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setArticleId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setLayoutId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setColor($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setArticleGroupId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SectionPeer::DATABASE_NAME);

		if ($this->isColumnModified(SectionPeer::ID)) $criteria->add(SectionPeer::ID, $this->id);
		if ($this->isColumnModified(SectionPeer::NAME)) $criteria->add(SectionPeer::NAME, $this->name);
		if ($this->isColumnModified(SectionPeer::TITLE)) $criteria->add(SectionPeer::TITLE, $this->title);
		if ($this->isColumnModified(SectionPeer::PRIORITY)) $criteria->add(SectionPeer::PRIORITY, $this->priority);
		if ($this->isColumnModified(SectionPeer::DESCRIPTION)) $criteria->add(SectionPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(SectionPeer::COMMENT)) $criteria->add(SectionPeer::COMMENT, $this->comment);
		if ($this->isColumnModified(SectionPeer::IS_PUBLISHED)) $criteria->add(SectionPeer::IS_PUBLISHED, $this->is_published);
		if ($this->isColumnModified(SectionPeer::MULTIMEDIA_ID)) $criteria->add(SectionPeer::MULTIMEDIA_ID, $this->multimedia_id);
		if ($this->isColumnModified(SectionPeer::SECTION_ID)) $criteria->add(SectionPeer::SECTION_ID, $this->section_id);
		if ($this->isColumnModified(SectionPeer::TEMPLATE_ID)) $criteria->add(SectionPeer::TEMPLATE_ID, $this->template_id);
		if ($this->isColumnModified(SectionPeer::ARTICLE_ID)) $criteria->add(SectionPeer::ARTICLE_ID, $this->article_id);
		if ($this->isColumnModified(SectionPeer::LAYOUT_ID)) $criteria->add(SectionPeer::LAYOUT_ID, $this->layout_id);
		if ($this->isColumnModified(SectionPeer::COLOR)) $criteria->add(SectionPeer::COLOR, $this->color);
		if ($this->isColumnModified(SectionPeer::ARTICLE_GROUP_ID)) $criteria->add(SectionPeer::ARTICLE_GROUP_ID, $this->article_group_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SectionPeer::DATABASE_NAME);

		$criteria->add(SectionPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setTitle($this->title);

		$copyObj->setPriority($this->priority);

		$copyObj->setDescription($this->description);

		$copyObj->setComment($this->comment);

		$copyObj->setIsPublished($this->is_published);

		$copyObj->setMultimediaId($this->multimedia_id);

		$copyObj->setSectionId($this->section_id);

		$copyObj->setTemplateId($this->template_id);

		$copyObj->setArticleId($this->article_id);

		$copyObj->setLayoutId($this->layout_id);

		$copyObj->setColor($this->color);

		$copyObj->setArticleGroupId($this->article_group_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getsfGuardUsers() as $relObj) {
				$copyObj->addsfGuardUser($relObj->copy($deepCopy));
			}

			foreach($this->getArticles() as $relObj) {
				$copyObj->addArticle($relObj->copy($deepCopy));
			}

			foreach($this->getEventSections() as $relObj) {
				$copyObj->addEventSection($relObj->copy($deepCopy));
			}

			foreach($this->getArticleSections() as $relObj) {
				$copyObj->addArticleSection($relObj->copy($deepCopy));
			}

			foreach($this->getSectionTags() as $relObj) {
				$copyObj->addSectionTag($relObj->copy($deepCopy));
			}

			foreach($this->getSectionsRelatedBySectionId() as $relObj) {
				if($this->getPrimaryKey() === $relObj->getPrimaryKey()) {
						continue;
				}

				$copyObj->addSectionRelatedBySectionId($relObj->copy($deepCopy));
			}

			foreach($this->getSectionLinks() as $relObj) {
				$copyObj->addSectionLink($relObj->copy($deepCopy));
			}

			foreach($this->getSectionDocuments() as $relObj) {
				$copyObj->addSectionDocument($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new SectionPeer();
		}
		return self::$peer;
	}

	
	public function setMultimedia($v)
	{


		if ($v === null) {
			$this->setMultimediaId(NULL);
		} else {
			$this->setMultimediaId($v->getId());
		}


		$this->aMultimedia = $v;
	}


	
	public function getMultimedia($con = null)
	{
		if ($this->aMultimedia === null && ($this->multimedia_id !== null)) {
						include_once 'lib/model/om/BaseMultimediaPeer.php';

			$this->aMultimedia = MultimediaPeer::retrieveByPK($this->multimedia_id, $con);

			
		}
		return $this->aMultimedia;
	}

	
	public function setSectionRelatedBySectionId($v)
	{


		if ($v === null) {
			$this->setSectionId(NULL);
		} else {
			$this->setSectionId($v->getId());
		}


		$this->aSectionRelatedBySectionId = $v;
	}


	
	public function getSectionRelatedBySectionId($con = null)
	{
		if ($this->aSectionRelatedBySectionId === null && ($this->section_id !== null)) {
						include_once 'lib/model/om/BaseSectionPeer.php';

			$this->aSectionRelatedBySectionId = SectionPeer::retrieveByPK($this->section_id, $con);

			
		}
		return $this->aSectionRelatedBySectionId;
	}

	
	public function setTemplate($v)
	{


		if ($v === null) {
			$this->setTemplateId(NULL);
		} else {
			$this->setTemplateId($v->getId());
		}


		$this->aTemplate = $v;
	}


	
	public function getTemplate($con = null)
	{
		if ($this->aTemplate === null && ($this->template_id !== null)) {
						include_once 'lib/model/om/BaseTemplatePeer.php';

			$this->aTemplate = TemplatePeer::retrieveByPK($this->template_id, $con);

			
		}
		return $this->aTemplate;
	}

	
	public function setArticle($v)
	{


		if ($v === null) {
			$this->setArticleId(NULL);
		} else {
			$this->setArticleId($v->getId());
		}


		$this->aArticle = $v;
	}


	
	public function getArticle($con = null)
	{
		if ($this->aArticle === null && ($this->article_id !== null)) {
						include_once 'lib/model/om/BaseArticlePeer.php';

			$this->aArticle = ArticlePeer::retrieveByPK($this->article_id, $con);

			
		}
		return $this->aArticle;
	}

	
	public function setLayout($v)
	{


		if ($v === null) {
			$this->setLayoutId(NULL);
		} else {
			$this->setLayoutId($v->getId());
		}


		$this->aLayout = $v;
	}


	
	public function getLayout($con = null)
	{
		if ($this->aLayout === null && ($this->layout_id !== null)) {
						include_once 'lib/model/om/BaseLayoutPeer.php';

			$this->aLayout = LayoutPeer::retrieveByPK($this->layout_id, $con);

			
		}
		return $this->aLayout;
	}

	
	public function setArticleGroup($v)
	{


		if ($v === null) {
			$this->setArticleGroupId(NULL);
		} else {
			$this->setArticleGroupId($v->getId());
		}


		$this->aArticleGroup = $v;
	}


	
	public function getArticleGroup($con = null)
	{
		if ($this->aArticleGroup === null && ($this->article_group_id !== null)) {
						include_once 'lib/model/om/BaseArticleGroupPeer.php';

			$this->aArticleGroup = ArticleGroupPeer::retrieveByPK($this->article_group_id, $con);

			
		}
		return $this->aArticleGroup;
	}

	
	public function initsfGuardUsers()
	{
		if ($this->collsfGuardUsers === null) {
			$this->collsfGuardUsers = array();
		}
	}

	
	public function getsfGuardUsers($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUsers === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUsers = array();
			} else {

				$criteria->add(sfGuardUserPeer::SECTION_ID, $this->getId());

				sfGuardUserPeer::addSelectColumns($criteria);
				$this->collsfGuardUsers = sfGuardUserPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserPeer::SECTION_ID, $this->getId());

				sfGuardUserPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserCriteria) || !$this->lastsfGuardUserCriteria->equals($criteria)) {
					$this->collsfGuardUsers = sfGuardUserPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserCriteria = $criteria;
		return $this->collsfGuardUsers;
	}

	
	public function countsfGuardUsers($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserPeer::SECTION_ID, $this->getId());

		return sfGuardUserPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUser(sfGuardUser $l)
	{
		$this->collsfGuardUsers[] = $l;
		$l->setSection($this);
	}

	
	public function initArticles()
	{
		if ($this->collArticles === null) {
			$this->collArticles = array();
		}
	}

	
	public function getArticles($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
			   $this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

				ArticlePeer::addSelectColumns($criteria);
				$this->collArticles = ArticlePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

				ArticlePeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
					$this->collArticles = ArticlePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleCriteria = $criteria;
		return $this->collArticles;
	}

	
	public function countArticles($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

		return ArticlePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticle(Article $l)
	{
		$this->collArticles[] = $l;
		$l->setSection($this);
	}


	
	public function getArticlesJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinMultimedia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinGallery($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinGallery($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinGallery($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinLink($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinLink($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinLink($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinSource($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinSource($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::SECTION_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinSource($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}

	
	public function initEventSections()
	{
		if ($this->collEventSections === null) {
			$this->collEventSections = array();
		}
	}

	
	public function getEventSections($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventSections === null) {
			if ($this->isNew()) {
			   $this->collEventSections = array();
			} else {

				$criteria->add(EventSectionPeer::SECTION_ID, $this->getId());

				EventSectionPeer::addSelectColumns($criteria);
				$this->collEventSections = EventSectionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EventSectionPeer::SECTION_ID, $this->getId());

				EventSectionPeer::addSelectColumns($criteria);
				if (!isset($this->lastEventSectionCriteria) || !$this->lastEventSectionCriteria->equals($criteria)) {
					$this->collEventSections = EventSectionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEventSectionCriteria = $criteria;
		return $this->collEventSections;
	}

	
	public function countEventSections($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEventSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EventSectionPeer::SECTION_ID, $this->getId());

		return EventSectionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEventSection(EventSection $l)
	{
		$this->collEventSections[] = $l;
		$l->setSection($this);
	}


	
	public function getEventSectionsJoinEvent($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventSections === null) {
			if ($this->isNew()) {
				$this->collEventSections = array();
			} else {

				$criteria->add(EventSectionPeer::SECTION_ID, $this->getId());

				$this->collEventSections = EventSectionPeer::doSelectJoinEvent($criteria, $con);
			}
		} else {
									
			$criteria->add(EventSectionPeer::SECTION_ID, $this->getId());

			if (!isset($this->lastEventSectionCriteria) || !$this->lastEventSectionCriteria->equals($criteria)) {
				$this->collEventSections = EventSectionPeer::doSelectJoinEvent($criteria, $con);
			}
		}
		$this->lastEventSectionCriteria = $criteria;

		return $this->collEventSections;
	}

	
	public function initArticleSections()
	{
		if ($this->collArticleSections === null) {
			$this->collArticleSections = array();
		}
	}

	
	public function getArticleSections($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleSections === null) {
			if ($this->isNew()) {
			   $this->collArticleSections = array();
			} else {

				$criteria->add(ArticleSectionPeer::SECTION_ID, $this->getId());

				ArticleSectionPeer::addSelectColumns($criteria);
				$this->collArticleSections = ArticleSectionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleSectionPeer::SECTION_ID, $this->getId());

				ArticleSectionPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleSectionCriteria) || !$this->lastArticleSectionCriteria->equals($criteria)) {
					$this->collArticleSections = ArticleSectionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleSectionCriteria = $criteria;
		return $this->collArticleSections;
	}

	
	public function countArticleSections($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleSectionPeer::SECTION_ID, $this->getId());

		return ArticleSectionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleSection(ArticleSection $l)
	{
		$this->collArticleSections[] = $l;
		$l->setSection($this);
	}


	
	public function getArticleSectionsJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleSections === null) {
			if ($this->isNew()) {
				$this->collArticleSections = array();
			} else {

				$criteria->add(ArticleSectionPeer::SECTION_ID, $this->getId());

				$this->collArticleSections = ArticleSectionPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleSectionPeer::SECTION_ID, $this->getId());

			if (!isset($this->lastArticleSectionCriteria) || !$this->lastArticleSectionCriteria->equals($criteria)) {
				$this->collArticleSections = ArticleSectionPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastArticleSectionCriteria = $criteria;

		return $this->collArticleSections;
	}

	
	public function initSectionTags()
	{
		if ($this->collSectionTags === null) {
			$this->collSectionTags = array();
		}
	}

	
	public function getSectionTags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionTags === null) {
			if ($this->isNew()) {
			   $this->collSectionTags = array();
			} else {

				$criteria->add(SectionTagPeer::SECTION_ID, $this->getId());

				SectionTagPeer::addSelectColumns($criteria);
				$this->collSectionTags = SectionTagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SectionTagPeer::SECTION_ID, $this->getId());

				SectionTagPeer::addSelectColumns($criteria);
				if (!isset($this->lastSectionTagCriteria) || !$this->lastSectionTagCriteria->equals($criteria)) {
					$this->collSectionTags = SectionTagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSectionTagCriteria = $criteria;
		return $this->collSectionTags;
	}

	
	public function countSectionTags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSectionTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SectionTagPeer::SECTION_ID, $this->getId());

		return SectionTagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSectionTag(SectionTag $l)
	{
		$this->collSectionTags[] = $l;
		$l->setSection($this);
	}


	
	public function getSectionTagsJoinTag($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionTags === null) {
			if ($this->isNew()) {
				$this->collSectionTags = array();
			} else {

				$criteria->add(SectionTagPeer::SECTION_ID, $this->getId());

				$this->collSectionTags = SectionTagPeer::doSelectJoinTag($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionTagPeer::SECTION_ID, $this->getId());

			if (!isset($this->lastSectionTagCriteria) || !$this->lastSectionTagCriteria->equals($criteria)) {
				$this->collSectionTags = SectionTagPeer::doSelectJoinTag($criteria, $con);
			}
		}
		$this->lastSectionTagCriteria = $criteria;

		return $this->collSectionTags;
	}

	
	public function initSectionsRelatedBySectionId()
	{
		if ($this->collSectionsRelatedBySectionId === null) {
			$this->collSectionsRelatedBySectionId = array();
		}
	}

	
	public function getSectionsRelatedBySectionId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionsRelatedBySectionId === null) {
			if ($this->isNew()) {
			   $this->collSectionsRelatedBySectionId = array();
			} else {

				$criteria->add(SectionPeer::SECTION_ID, $this->getId());

				SectionPeer::addSelectColumns($criteria);
				$this->collSectionsRelatedBySectionId = SectionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SectionPeer::SECTION_ID, $this->getId());

				SectionPeer::addSelectColumns($criteria);
				if (!isset($this->lastSectionRelatedBySectionIdCriteria) || !$this->lastSectionRelatedBySectionIdCriteria->equals($criteria)) {
					$this->collSectionsRelatedBySectionId = SectionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSectionRelatedBySectionIdCriteria = $criteria;
		return $this->collSectionsRelatedBySectionId;
	}

	
	public function countSectionsRelatedBySectionId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SectionPeer::SECTION_ID, $this->getId());

		return SectionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSectionRelatedBySectionId(Section $l)
	{
		$this->collSectionsRelatedBySectionId[] = $l;
		$l->setSectionRelatedBySectionId($this);
	}


	
	public function getSectionsRelatedBySectionIdJoinMultimedia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionsRelatedBySectionId === null) {
			if ($this->isNew()) {
				$this->collSectionsRelatedBySectionId = array();
			} else {

				$criteria->add(SectionPeer::SECTION_ID, $this->getId());

				$this->collSectionsRelatedBySectionId = SectionPeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::SECTION_ID, $this->getId());

			if (!isset($this->lastSectionRelatedBySectionIdCriteria) || !$this->lastSectionRelatedBySectionIdCriteria->equals($criteria)) {
				$this->collSectionsRelatedBySectionId = SectionPeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastSectionRelatedBySectionIdCriteria = $criteria;

		return $this->collSectionsRelatedBySectionId;
	}


	
	public function getSectionsRelatedBySectionIdJoinTemplate($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionsRelatedBySectionId === null) {
			if ($this->isNew()) {
				$this->collSectionsRelatedBySectionId = array();
			} else {

				$criteria->add(SectionPeer::SECTION_ID, $this->getId());

				$this->collSectionsRelatedBySectionId = SectionPeer::doSelectJoinTemplate($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::SECTION_ID, $this->getId());

			if (!isset($this->lastSectionRelatedBySectionIdCriteria) || !$this->lastSectionRelatedBySectionIdCriteria->equals($criteria)) {
				$this->collSectionsRelatedBySectionId = SectionPeer::doSelectJoinTemplate($criteria, $con);
			}
		}
		$this->lastSectionRelatedBySectionIdCriteria = $criteria;

		return $this->collSectionsRelatedBySectionId;
	}


	
	public function getSectionsRelatedBySectionIdJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionsRelatedBySectionId === null) {
			if ($this->isNew()) {
				$this->collSectionsRelatedBySectionId = array();
			} else {

				$criteria->add(SectionPeer::SECTION_ID, $this->getId());

				$this->collSectionsRelatedBySectionId = SectionPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::SECTION_ID, $this->getId());

			if (!isset($this->lastSectionRelatedBySectionIdCriteria) || !$this->lastSectionRelatedBySectionIdCriteria->equals($criteria)) {
				$this->collSectionsRelatedBySectionId = SectionPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastSectionRelatedBySectionIdCriteria = $criteria;

		return $this->collSectionsRelatedBySectionId;
	}


	
	public function getSectionsRelatedBySectionIdJoinLayout($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionsRelatedBySectionId === null) {
			if ($this->isNew()) {
				$this->collSectionsRelatedBySectionId = array();
			} else {

				$criteria->add(SectionPeer::SECTION_ID, $this->getId());

				$this->collSectionsRelatedBySectionId = SectionPeer::doSelectJoinLayout($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::SECTION_ID, $this->getId());

			if (!isset($this->lastSectionRelatedBySectionIdCriteria) || !$this->lastSectionRelatedBySectionIdCriteria->equals($criteria)) {
				$this->collSectionsRelatedBySectionId = SectionPeer::doSelectJoinLayout($criteria, $con);
			}
		}
		$this->lastSectionRelatedBySectionIdCriteria = $criteria;

		return $this->collSectionsRelatedBySectionId;
	}


	
	public function getSectionsRelatedBySectionIdJoinArticleGroup($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionsRelatedBySectionId === null) {
			if ($this->isNew()) {
				$this->collSectionsRelatedBySectionId = array();
			} else {

				$criteria->add(SectionPeer::SECTION_ID, $this->getId());

				$this->collSectionsRelatedBySectionId = SectionPeer::doSelectJoinArticleGroup($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::SECTION_ID, $this->getId());

			if (!isset($this->lastSectionRelatedBySectionIdCriteria) || !$this->lastSectionRelatedBySectionIdCriteria->equals($criteria)) {
				$this->collSectionsRelatedBySectionId = SectionPeer::doSelectJoinArticleGroup($criteria, $con);
			}
		}
		$this->lastSectionRelatedBySectionIdCriteria = $criteria;

		return $this->collSectionsRelatedBySectionId;
	}

	
	public function initSectionLinks()
	{
		if ($this->collSectionLinks === null) {
			$this->collSectionLinks = array();
		}
	}

	
	public function getSectionLinks($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionLinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionLinks === null) {
			if ($this->isNew()) {
			   $this->collSectionLinks = array();
			} else {

				$criteria->add(SectionLinkPeer::SECTION_ID, $this->getId());

				SectionLinkPeer::addSelectColumns($criteria);
				$this->collSectionLinks = SectionLinkPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SectionLinkPeer::SECTION_ID, $this->getId());

				SectionLinkPeer::addSelectColumns($criteria);
				if (!isset($this->lastSectionLinkCriteria) || !$this->lastSectionLinkCriteria->equals($criteria)) {
					$this->collSectionLinks = SectionLinkPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSectionLinkCriteria = $criteria;
		return $this->collSectionLinks;
	}

	
	public function countSectionLinks($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSectionLinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SectionLinkPeer::SECTION_ID, $this->getId());

		return SectionLinkPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSectionLink(SectionLink $l)
	{
		$this->collSectionLinks[] = $l;
		$l->setSection($this);
	}


	
	public function getSectionLinksJoinLink($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionLinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionLinks === null) {
			if ($this->isNew()) {
				$this->collSectionLinks = array();
			} else {

				$criteria->add(SectionLinkPeer::SECTION_ID, $this->getId());

				$this->collSectionLinks = SectionLinkPeer::doSelectJoinLink($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionLinkPeer::SECTION_ID, $this->getId());

			if (!isset($this->lastSectionLinkCriteria) || !$this->lastSectionLinkCriteria->equals($criteria)) {
				$this->collSectionLinks = SectionLinkPeer::doSelectJoinLink($criteria, $con);
			}
		}
		$this->lastSectionLinkCriteria = $criteria;

		return $this->collSectionLinks;
	}

	
	public function initSectionDocuments()
	{
		if ($this->collSectionDocuments === null) {
			$this->collSectionDocuments = array();
		}
	}

	
	public function getSectionDocuments($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionDocuments === null) {
			if ($this->isNew()) {
			   $this->collSectionDocuments = array();
			} else {

				$criteria->add(SectionDocumentPeer::SECTION_ID, $this->getId());

				SectionDocumentPeer::addSelectColumns($criteria);
				$this->collSectionDocuments = SectionDocumentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SectionDocumentPeer::SECTION_ID, $this->getId());

				SectionDocumentPeer::addSelectColumns($criteria);
				if (!isset($this->lastSectionDocumentCriteria) || !$this->lastSectionDocumentCriteria->equals($criteria)) {
					$this->collSectionDocuments = SectionDocumentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSectionDocumentCriteria = $criteria;
		return $this->collSectionDocuments;
	}

	
	public function countSectionDocuments($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSectionDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SectionDocumentPeer::SECTION_ID, $this->getId());

		return SectionDocumentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSectionDocument(SectionDocument $l)
	{
		$this->collSectionDocuments[] = $l;
		$l->setSection($this);
	}


	
	public function getSectionDocumentsJoinDocument($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionDocuments === null) {
			if ($this->isNew()) {
				$this->collSectionDocuments = array();
			} else {

				$criteria->add(SectionDocumentPeer::SECTION_ID, $this->getId());

				$this->collSectionDocuments = SectionDocumentPeer::doSelectJoinDocument($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionDocumentPeer::SECTION_ID, $this->getId());

			if (!isset($this->lastSectionDocumentCriteria) || !$this->lastSectionDocumentCriteria->equals($criteria)) {
				$this->collSectionDocuments = SectionDocumentPeer::doSelectJoinDocument($criteria, $con);
			}
		}
		$this->lastSectionDocumentCriteria = $criteria;

		return $this->collSectionDocuments;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseSection:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseSection::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 