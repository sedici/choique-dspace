<?php


abstract class BaseArticlePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'article';

	
	const CLASS_DEFAULT = 'lib.model.Article';

	
	const NUM_COLUMNS = 33;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'article.ID';

	
	const TYPE = 'article.TYPE';

	
	const NAME = 'article.NAME';

	
	const TITLE = 'article.TITLE';

	
	const HEADING = 'article.HEADING';

	
	const COMMENT = 'article.COMMENT';

	
	const DESCRIPTION = 'article.DESCRIPTION';

	
	const UPPER_DESCRIPTION = 'article.UPPER_DESCRIPTION';

	
	const BODY = 'article.BODY';

	
	const CREATED_AT = 'article.CREATED_AT';

	
	const UPDATED_AT = 'article.UPDATED_AT';

	
	const CREATED_BY = 'article.CREATED_BY';

	
	const UPDATED_BY = 'article.UPDATED_BY';

	
	const IS_PUBLISHED = 'article.IS_PUBLISHED';

	
	const IS_ARCHIVED = 'article.IS_ARCHIVED';

	
	const PUBLISHED_AT = 'article.PUBLISHED_AT';

	
	const ARCHIVED_AT = 'article.ARCHIVED_AT';

	
	const SIGNATURE = 'article.SIGNATURE';

	
	const CONTACT = 'article.CONTACT';

	
	const ZOOMABLE_MULTIMEDIA = 'article.ZOOMABLE_MULTIMEDIA';

	
	const MULTIMEDIA_ID = 'article.MULTIMEDIA_ID';

	
	const MAIN_GALLERY_ID = 'article.MAIN_GALLERY_ID';

	
	const LINK_ID = 'article.LINK_ID';

	
	const SOURCE_ID = 'article.SOURCE_ID';

	
	const SECTION_ID = 'article.SECTION_ID';

	
	const REFERENCE = 'article.REFERENCE';

	
	const REFERENCE_TYPE = 'article.REFERENCE_TYPE';

	
	const OPEN_REFERENCE_NEW_WINDOW = 'article.OPEN_REFERENCE_NEW_WINDOW';

	
	const TIMES_READ = 'article.TIMES_READ';

	
	const RATING = 'article.RATING';

	
	const OPEN_AS_POPUP = 'article.OPEN_AS_POPUP';

	
	const AUTO_PUBLISH_AT = 'article.AUTO_PUBLISH_AT';

	
	const AUTO_UNPUBLISH_AT = 'article.AUTO_UNPUBLISH_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Type', 'Name', 'Title', 'Heading', 'Comment', 'Description', 'UpperDescription', 'Body', 'CreatedAt', 'UpdatedAt', 'CreatedBy', 'UpdatedBy', 'IsPublished', 'IsArchived', 'PublishedAt', 'ArchivedAt', 'Signature', 'Contact', 'ZoomableMultimedia', 'MultimediaId', 'MainGalleryId', 'LinkId', 'SourceId', 'SectionId', 'Reference', 'ReferenceType', 'OpenReferenceNewWindow', 'TimesRead', 'Rating', 'OpenAsPopup', 'AutoPublishAt', 'AutoUnpublishAt', ),
		BasePeer::TYPE_COLNAME => array (ArticlePeer::ID, ArticlePeer::TYPE, ArticlePeer::NAME, ArticlePeer::TITLE, ArticlePeer::HEADING, ArticlePeer::COMMENT, ArticlePeer::DESCRIPTION, ArticlePeer::UPPER_DESCRIPTION, ArticlePeer::BODY, ArticlePeer::CREATED_AT, ArticlePeer::UPDATED_AT, ArticlePeer::CREATED_BY, ArticlePeer::UPDATED_BY, ArticlePeer::IS_PUBLISHED, ArticlePeer::IS_ARCHIVED, ArticlePeer::PUBLISHED_AT, ArticlePeer::ARCHIVED_AT, ArticlePeer::SIGNATURE, ArticlePeer::CONTACT, ArticlePeer::ZOOMABLE_MULTIMEDIA, ArticlePeer::MULTIMEDIA_ID, ArticlePeer::MAIN_GALLERY_ID, ArticlePeer::LINK_ID, ArticlePeer::SOURCE_ID, ArticlePeer::SECTION_ID, ArticlePeer::REFERENCE, ArticlePeer::REFERENCE_TYPE, ArticlePeer::OPEN_REFERENCE_NEW_WINDOW, ArticlePeer::TIMES_READ, ArticlePeer::RATING, ArticlePeer::OPEN_AS_POPUP, ArticlePeer::AUTO_PUBLISH_AT, ArticlePeer::AUTO_UNPUBLISH_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'type', 'name', 'title', 'heading', 'comment', 'description', 'upper_description', 'body', 'created_at', 'updated_at', 'created_by', 'updated_by', 'is_published', 'is_archived', 'published_at', 'archived_at', 'signature', 'contact', 'zoomable_multimedia', 'multimedia_id', 'main_gallery_id', 'link_id', 'source_id', 'section_id', 'reference', 'reference_type', 'open_reference_new_window', 'times_read', 'rating', 'open_as_popup', 'auto_publish_at', 'auto_unpublish_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Type' => 1, 'Name' => 2, 'Title' => 3, 'Heading' => 4, 'Comment' => 5, 'Description' => 6, 'UpperDescription' => 7, 'Body' => 8, 'CreatedAt' => 9, 'UpdatedAt' => 10, 'CreatedBy' => 11, 'UpdatedBy' => 12, 'IsPublished' => 13, 'IsArchived' => 14, 'PublishedAt' => 15, 'ArchivedAt' => 16, 'Signature' => 17, 'Contact' => 18, 'ZoomableMultimedia' => 19, 'MultimediaId' => 20, 'MainGalleryId' => 21, 'LinkId' => 22, 'SourceId' => 23, 'SectionId' => 24, 'Reference' => 25, 'ReferenceType' => 26, 'OpenReferenceNewWindow' => 27, 'TimesRead' => 28, 'Rating' => 29, 'OpenAsPopup' => 30, 'AutoPublishAt' => 31, 'AutoUnpublishAt' => 32, ),
		BasePeer::TYPE_COLNAME => array (ArticlePeer::ID => 0, ArticlePeer::TYPE => 1, ArticlePeer::NAME => 2, ArticlePeer::TITLE => 3, ArticlePeer::HEADING => 4, ArticlePeer::COMMENT => 5, ArticlePeer::DESCRIPTION => 6, ArticlePeer::UPPER_DESCRIPTION => 7, ArticlePeer::BODY => 8, ArticlePeer::CREATED_AT => 9, ArticlePeer::UPDATED_AT => 10, ArticlePeer::CREATED_BY => 11, ArticlePeer::UPDATED_BY => 12, ArticlePeer::IS_PUBLISHED => 13, ArticlePeer::IS_ARCHIVED => 14, ArticlePeer::PUBLISHED_AT => 15, ArticlePeer::ARCHIVED_AT => 16, ArticlePeer::SIGNATURE => 17, ArticlePeer::CONTACT => 18, ArticlePeer::ZOOMABLE_MULTIMEDIA => 19, ArticlePeer::MULTIMEDIA_ID => 20, ArticlePeer::MAIN_GALLERY_ID => 21, ArticlePeer::LINK_ID => 22, ArticlePeer::SOURCE_ID => 23, ArticlePeer::SECTION_ID => 24, ArticlePeer::REFERENCE => 25, ArticlePeer::REFERENCE_TYPE => 26, ArticlePeer::OPEN_REFERENCE_NEW_WINDOW => 27, ArticlePeer::TIMES_READ => 28, ArticlePeer::RATING => 29, ArticlePeer::OPEN_AS_POPUP => 30, ArticlePeer::AUTO_PUBLISH_AT => 31, ArticlePeer::AUTO_UNPUBLISH_AT => 32, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'type' => 1, 'name' => 2, 'title' => 3, 'heading' => 4, 'comment' => 5, 'description' => 6, 'upper_description' => 7, 'body' => 8, 'created_at' => 9, 'updated_at' => 10, 'created_by' => 11, 'updated_by' => 12, 'is_published' => 13, 'is_archived' => 14, 'published_at' => 15, 'archived_at' => 16, 'signature' => 17, 'contact' => 18, 'zoomable_multimedia' => 19, 'multimedia_id' => 20, 'main_gallery_id' => 21, 'link_id' => 22, 'source_id' => 23, 'section_id' => 24, 'reference' => 25, 'reference_type' => 26, 'open_reference_new_window' => 27, 'times_read' => 28, 'rating' => 29, 'open_as_popup' => 30, 'auto_publish_at' => 31, 'auto_unpublish_at' => 32, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ArticleMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ArticleMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ArticlePeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(ArticlePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ArticlePeer::ID);

		$criteria->addSelectColumn(ArticlePeer::TYPE);

		$criteria->addSelectColumn(ArticlePeer::NAME);

		$criteria->addSelectColumn(ArticlePeer::TITLE);

		$criteria->addSelectColumn(ArticlePeer::HEADING);

		$criteria->addSelectColumn(ArticlePeer::COMMENT);

		$criteria->addSelectColumn(ArticlePeer::DESCRIPTION);

		$criteria->addSelectColumn(ArticlePeer::UPPER_DESCRIPTION);

		$criteria->addSelectColumn(ArticlePeer::BODY);

		$criteria->addSelectColumn(ArticlePeer::CREATED_AT);

		$criteria->addSelectColumn(ArticlePeer::UPDATED_AT);

		$criteria->addSelectColumn(ArticlePeer::CREATED_BY);

		$criteria->addSelectColumn(ArticlePeer::UPDATED_BY);

		$criteria->addSelectColumn(ArticlePeer::IS_PUBLISHED);

		$criteria->addSelectColumn(ArticlePeer::IS_ARCHIVED);

		$criteria->addSelectColumn(ArticlePeer::PUBLISHED_AT);

		$criteria->addSelectColumn(ArticlePeer::ARCHIVED_AT);

		$criteria->addSelectColumn(ArticlePeer::SIGNATURE);

		$criteria->addSelectColumn(ArticlePeer::CONTACT);

		$criteria->addSelectColumn(ArticlePeer::ZOOMABLE_MULTIMEDIA);

		$criteria->addSelectColumn(ArticlePeer::MULTIMEDIA_ID);

		$criteria->addSelectColumn(ArticlePeer::MAIN_GALLERY_ID);

		$criteria->addSelectColumn(ArticlePeer::LINK_ID);

		$criteria->addSelectColumn(ArticlePeer::SOURCE_ID);

		$criteria->addSelectColumn(ArticlePeer::SECTION_ID);

		$criteria->addSelectColumn(ArticlePeer::REFERENCE);

		$criteria->addSelectColumn(ArticlePeer::REFERENCE_TYPE);

		$criteria->addSelectColumn(ArticlePeer::OPEN_REFERENCE_NEW_WINDOW);

		$criteria->addSelectColumn(ArticlePeer::TIMES_READ);

		$criteria->addSelectColumn(ArticlePeer::RATING);

		$criteria->addSelectColumn(ArticlePeer::OPEN_AS_POPUP);

		$criteria->addSelectColumn(ArticlePeer::AUTO_PUBLISH_AT);

		$criteria->addSelectColumn(ArticlePeer::AUTO_UNPUBLISH_AT);

	}

	const COUNT = 'COUNT(article.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT article.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ArticlePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ArticlePeer::populateObjects(ArticlePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseArticlePeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseArticlePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ArticlePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ArticlePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinMultimedia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinGallery(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLink(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinSource(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinSection(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ArticlePeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addArticleRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticlesRelatedByCreatedBy();
				$obj2->addArticleRelatedByCreatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserRelatedByUpdatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ArticlePeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addArticleRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticlesRelatedByUpdatedBy();
				$obj2->addArticleRelatedByUpdatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinMultimedia(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		MultimediaPeer::addSelectColumns($c);

		$c->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = MultimediaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getMultimedia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addArticle($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticles();
				$obj2->addArticle($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinGallery(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		GalleryPeer::addSelectColumns($c);

		$c->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = GalleryPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getGallery(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addArticle($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticles();
				$obj2->addArticle($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLink(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LinkPeer::addSelectColumns($c);

		$c->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LinkPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLink(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addArticle($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticles();
				$obj2->addArticle($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinSource(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SourcePeer::addSelectColumns($c);

		$c->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SourcePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getSource(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addArticle($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticles();
				$obj2->addArticle($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinSection(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SectionPeer::addSelectColumns($c);

		$c->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SectionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getSection(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addArticle($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticles();
				$obj2->addArticle($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ArticlePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$criteria->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$criteria->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);

		$criteria->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol2 = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		MultimediaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + MultimediaPeer::NUM_COLUMNS;

		GalleryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + GalleryPeer::NUM_COLUMNS;

		LinkPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + LinkPeer::NUM_COLUMNS;

		SourcePeer::addSelectColumns($c);
		$startcol8 = $startcol7 + SourcePeer::NUM_COLUMNS;

		SectionPeer::addSelectColumns($c);
		$startcol9 = $startcol8 + SectionPeer::NUM_COLUMNS;

		$c->addJoin(ArticlePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ArticlePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$c->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$c->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);

		$c->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticleRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initArticlesRelatedByCreatedBy();
				$obj2->addArticleRelatedByCreatedBy($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addArticleRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initArticlesRelatedByUpdatedBy();
				$obj3->addArticleRelatedByUpdatedBy($obj1);
			}


					
			$omClass = MultimediaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getMultimedia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addArticle($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initArticles();
				$obj4->addArticle($obj1);
			}


					
			$omClass = GalleryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getGallery(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addArticle($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initArticles();
				$obj5->addArticle($obj1);
			}


					
			$omClass = LinkPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getLink(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addArticle($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initArticles();
				$obj6->addArticle($obj1);
			}


					
			$omClass = SourcePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7 = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getSource(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addArticle($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj7->initArticles();
				$obj7->addArticle($obj1);
			}


					
			$omClass = SectionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj8 = new $cls();
			$obj8->hydrate($rs, $startcol8);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj8 = $temp_obj1->getSection(); 				if ($temp_obj8->getPrimaryKey() === $obj8->getPrimaryKey()) {
					$newObject = false;
					$temp_obj8->addArticle($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj8->initArticles();
				$obj8->addArticle($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$criteria->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$criteria->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);

		$criteria->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByUpdatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$criteria->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$criteria->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);

		$criteria->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptMultimedia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ArticlePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$criteria->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$criteria->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);

		$criteria->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptGallery(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ArticlePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$criteria->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);

		$criteria->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptLink(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ArticlePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$criteria->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);

		$criteria->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptSource(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ArticlePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$criteria->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$criteria->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptSection(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticlePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticlePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticlePeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ArticlePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$criteria->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$criteria->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);

		$rs = ArticlePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol2 = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		GalleryPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + GalleryPeer::NUM_COLUMNS;

		LinkPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + LinkPeer::NUM_COLUMNS;

		SourcePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + SourcePeer::NUM_COLUMNS;

		SectionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + SectionPeer::NUM_COLUMNS;

		$c->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$c->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$c->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);

		$c->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = MultimediaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getMultimedia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticles();
				$obj2->addArticle($obj1);
			}

			$omClass = GalleryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getGallery(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initArticles();
				$obj3->addArticle($obj1);
			}

			$omClass = LinkPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getLink(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initArticles();
				$obj4->addArticle($obj1);
			}

			$omClass = SourcePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getSource(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initArticles();
				$obj5->addArticle($obj1);
			}

			$omClass = SectionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getSection(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initArticles();
				$obj6->addArticle($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByUpdatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol2 = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		GalleryPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + GalleryPeer::NUM_COLUMNS;

		LinkPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + LinkPeer::NUM_COLUMNS;

		SourcePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + SourcePeer::NUM_COLUMNS;

		SectionPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + SectionPeer::NUM_COLUMNS;

		$c->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$c->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$c->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);

		$c->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = MultimediaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getMultimedia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticles();
				$obj2->addArticle($obj1);
			}

			$omClass = GalleryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getGallery(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initArticles();
				$obj3->addArticle($obj1);
			}

			$omClass = LinkPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getLink(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initArticles();
				$obj4->addArticle($obj1);
			}

			$omClass = SourcePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getSource(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initArticles();
				$obj5->addArticle($obj1);
			}

			$omClass = SectionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getSection(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initArticles();
				$obj6->addArticle($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptMultimedia(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol2 = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		GalleryPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + GalleryPeer::NUM_COLUMNS;

		LinkPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + LinkPeer::NUM_COLUMNS;

		SourcePeer::addSelectColumns($c);
		$startcol7 = $startcol6 + SourcePeer::NUM_COLUMNS;

		SectionPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + SectionPeer::NUM_COLUMNS;

		$c->addJoin(ArticlePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ArticlePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$c->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$c->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);

		$c->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticleRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticlesRelatedByCreatedBy();
				$obj2->addArticleRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addArticleRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initArticlesRelatedByUpdatedBy();
				$obj3->addArticleRelatedByUpdatedBy($obj1);
			}

			$omClass = GalleryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getGallery(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initArticles();
				$obj4->addArticle($obj1);
			}

			$omClass = LinkPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getLink(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initArticles();
				$obj5->addArticle($obj1);
			}

			$omClass = SourcePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getSource(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initArticles();
				$obj6->addArticle($obj1);
			}

			$omClass = SectionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getSection(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initArticles();
				$obj7->addArticle($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptGallery(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol2 = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		MultimediaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + MultimediaPeer::NUM_COLUMNS;

		LinkPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + LinkPeer::NUM_COLUMNS;

		SourcePeer::addSelectColumns($c);
		$startcol7 = $startcol6 + SourcePeer::NUM_COLUMNS;

		SectionPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + SectionPeer::NUM_COLUMNS;

		$c->addJoin(ArticlePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ArticlePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$c->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);

		$c->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticleRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticlesRelatedByCreatedBy();
				$obj2->addArticleRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addArticleRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initArticlesRelatedByUpdatedBy();
				$obj3->addArticleRelatedByUpdatedBy($obj1);
			}

			$omClass = MultimediaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getMultimedia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initArticles();
				$obj4->addArticle($obj1);
			}

			$omClass = LinkPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getLink(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initArticles();
				$obj5->addArticle($obj1);
			}

			$omClass = SourcePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getSource(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initArticles();
				$obj6->addArticle($obj1);
			}

			$omClass = SectionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getSection(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initArticles();
				$obj7->addArticle($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLink(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol2 = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		MultimediaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + MultimediaPeer::NUM_COLUMNS;

		GalleryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + GalleryPeer::NUM_COLUMNS;

		SourcePeer::addSelectColumns($c);
		$startcol7 = $startcol6 + SourcePeer::NUM_COLUMNS;

		SectionPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + SectionPeer::NUM_COLUMNS;

		$c->addJoin(ArticlePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ArticlePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$c->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);

		$c->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticleRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticlesRelatedByCreatedBy();
				$obj2->addArticleRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addArticleRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initArticlesRelatedByUpdatedBy();
				$obj3->addArticleRelatedByUpdatedBy($obj1);
			}

			$omClass = MultimediaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getMultimedia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initArticles();
				$obj4->addArticle($obj1);
			}

			$omClass = GalleryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getGallery(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initArticles();
				$obj5->addArticle($obj1);
			}

			$omClass = SourcePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getSource(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initArticles();
				$obj6->addArticle($obj1);
			}

			$omClass = SectionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getSection(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initArticles();
				$obj7->addArticle($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptSource(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol2 = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		MultimediaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + MultimediaPeer::NUM_COLUMNS;

		GalleryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + GalleryPeer::NUM_COLUMNS;

		LinkPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + LinkPeer::NUM_COLUMNS;

		SectionPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + SectionPeer::NUM_COLUMNS;

		$c->addJoin(ArticlePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ArticlePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$c->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$c->addJoin(ArticlePeer::SECTION_ID, SectionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticleRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticlesRelatedByCreatedBy();
				$obj2->addArticleRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addArticleRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initArticlesRelatedByUpdatedBy();
				$obj3->addArticleRelatedByUpdatedBy($obj1);
			}

			$omClass = MultimediaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getMultimedia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initArticles();
				$obj4->addArticle($obj1);
			}

			$omClass = GalleryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getGallery(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initArticles();
				$obj5->addArticle($obj1);
			}

			$omClass = LinkPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getLink(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initArticles();
				$obj6->addArticle($obj1);
			}

			$omClass = SectionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getSection(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initArticles();
				$obj7->addArticle($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptSection(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticlePeer::addSelectColumns($c);
		$startcol2 = (ArticlePeer::NUM_COLUMNS - ArticlePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		MultimediaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + MultimediaPeer::NUM_COLUMNS;

		GalleryPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + GalleryPeer::NUM_COLUMNS;

		LinkPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + LinkPeer::NUM_COLUMNS;

		SourcePeer::addSelectColumns($c);
		$startcol8 = $startcol7 + SourcePeer::NUM_COLUMNS;

		$c->addJoin(ArticlePeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ArticlePeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ArticlePeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(ArticlePeer::MAIN_GALLERY_ID, GalleryPeer::ID);

		$c->addJoin(ArticlePeer::LINK_ID, LinkPeer::ID);

		$c->addJoin(ArticlePeer::SOURCE_ID, SourcePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticleRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticlesRelatedByCreatedBy();
				$obj2->addArticleRelatedByCreatedBy($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addArticleRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initArticlesRelatedByUpdatedBy();
				$obj3->addArticleRelatedByUpdatedBy($obj1);
			}

			$omClass = MultimediaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getMultimedia(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initArticles();
				$obj4->addArticle($obj1);
			}

			$omClass = GalleryPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getGallery(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initArticles();
				$obj5->addArticle($obj1);
			}

			$omClass = LinkPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getLink(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initArticles();
				$obj6->addArticle($obj1);
			}

			$omClass = SourcePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj7  = new $cls();
			$obj7->hydrate($rs, $startcol7);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj7 = $temp_obj1->getSource(); 				if ($temp_obj7->getPrimaryKey() === $obj7->getPrimaryKey()) {
					$newObject = false;
					$temp_obj7->addArticle($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj7->initArticles();
				$obj7->addArticle($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return ArticlePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseArticlePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseArticlePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(ArticlePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseArticlePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseArticlePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseArticlePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseArticlePeer', $values, $con);
      if (false !== $ret)
      {
        return $ret;
      }
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(ArticlePeer::ID);
			$selectCriteria->add(ArticlePeer::ID, $criteria->remove(ArticlePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseArticlePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseArticlePeer', $values, $con, $ret);
    }

    return $ret;
  }

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += BasePeer::doDeleteAll(ArticlePeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(ArticlePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Article) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ArticlePeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Article $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ArticlePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ArticlePeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(ArticlePeer::DATABASE_NAME, ArticlePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ArticlePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(ArticlePeer::DATABASE_NAME);

		$criteria->add(ArticlePeer::ID, $pk);


		$v = ArticlePeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(ArticlePeer::ID, $pks, Criteria::IN);
			$objs = ArticlePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseArticlePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ArticleMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ArticleMapBuilder');
}
