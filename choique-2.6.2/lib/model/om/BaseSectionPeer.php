<?php


abstract class BaseSectionPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'section';

	
	const CLASS_DEFAULT = 'lib.model.Section';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'section.ID';

	
	const NAME = 'section.NAME';

	
	const TITLE = 'section.TITLE';

	
	const PRIORITY = 'section.PRIORITY';

	
	const DESCRIPTION = 'section.DESCRIPTION';

	
	const COMMENT = 'section.COMMENT';

	
	const IS_PUBLISHED = 'section.IS_PUBLISHED';

	
	const MULTIMEDIA_ID = 'section.MULTIMEDIA_ID';

	
	const SECTION_ID = 'section.SECTION_ID';

	
	const TEMPLATE_ID = 'section.TEMPLATE_ID';

	
	const ARTICLE_ID = 'section.ARTICLE_ID';

	
	const LAYOUT_ID = 'section.LAYOUT_ID';

	
	const COLOR = 'section.COLOR';

	
	const ARTICLE_GROUP_ID = 'section.ARTICLE_GROUP_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'Title', 'Priority', 'Description', 'Comment', 'IsPublished', 'MultimediaId', 'SectionId', 'TemplateId', 'ArticleId', 'LayoutId', 'Color', 'ArticleGroupId', ),
		BasePeer::TYPE_COLNAME => array (SectionPeer::ID, SectionPeer::NAME, SectionPeer::TITLE, SectionPeer::PRIORITY, SectionPeer::DESCRIPTION, SectionPeer::COMMENT, SectionPeer::IS_PUBLISHED, SectionPeer::MULTIMEDIA_ID, SectionPeer::SECTION_ID, SectionPeer::TEMPLATE_ID, SectionPeer::ARTICLE_ID, SectionPeer::LAYOUT_ID, SectionPeer::COLOR, SectionPeer::ARTICLE_GROUP_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'title', 'priority', 'description', 'comment', 'is_published', 'multimedia_id', 'section_id', 'template_id', 'article_id', 'layout_id', 'color', 'article_group_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'Title' => 2, 'Priority' => 3, 'Description' => 4, 'Comment' => 5, 'IsPublished' => 6, 'MultimediaId' => 7, 'SectionId' => 8, 'TemplateId' => 9, 'ArticleId' => 10, 'LayoutId' => 11, 'Color' => 12, 'ArticleGroupId' => 13, ),
		BasePeer::TYPE_COLNAME => array (SectionPeer::ID => 0, SectionPeer::NAME => 1, SectionPeer::TITLE => 2, SectionPeer::PRIORITY => 3, SectionPeer::DESCRIPTION => 4, SectionPeer::COMMENT => 5, SectionPeer::IS_PUBLISHED => 6, SectionPeer::MULTIMEDIA_ID => 7, SectionPeer::SECTION_ID => 8, SectionPeer::TEMPLATE_ID => 9, SectionPeer::ARTICLE_ID => 10, SectionPeer::LAYOUT_ID => 11, SectionPeer::COLOR => 12, SectionPeer::ARTICLE_GROUP_ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'title' => 2, 'priority' => 3, 'description' => 4, 'comment' => 5, 'is_published' => 6, 'multimedia_id' => 7, 'section_id' => 8, 'template_id' => 9, 'article_id' => 10, 'layout_id' => 11, 'color' => 12, 'article_group_id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/SectionMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.SectionMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = SectionPeer::getTableMap();
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
		return str_replace(SectionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(SectionPeer::ID);

		$criteria->addSelectColumn(SectionPeer::NAME);

		$criteria->addSelectColumn(SectionPeer::TITLE);

		$criteria->addSelectColumn(SectionPeer::PRIORITY);

		$criteria->addSelectColumn(SectionPeer::DESCRIPTION);

		$criteria->addSelectColumn(SectionPeer::COMMENT);

		$criteria->addSelectColumn(SectionPeer::IS_PUBLISHED);

		$criteria->addSelectColumn(SectionPeer::MULTIMEDIA_ID);

		$criteria->addSelectColumn(SectionPeer::SECTION_ID);

		$criteria->addSelectColumn(SectionPeer::TEMPLATE_ID);

		$criteria->addSelectColumn(SectionPeer::ARTICLE_ID);

		$criteria->addSelectColumn(SectionPeer::LAYOUT_ID);

		$criteria->addSelectColumn(SectionPeer::COLOR);

		$criteria->addSelectColumn(SectionPeer::ARTICLE_GROUP_ID);

	}

	const COUNT = 'COUNT(section.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT section.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SectionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SectionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = SectionPeer::doSelectRS($criteria, $con);
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
		$objects = SectionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return SectionPeer::populateObjects(SectionPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSectionPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseSectionPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			SectionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = SectionPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinMultimedia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SectionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SectionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SectionPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = SectionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTemplate(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SectionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SectionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SectionPeer::TEMPLATE_ID, TemplatePeer::ID);

		$rs = SectionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinArticle(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SectionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SectionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SectionPeer::ARTICLE_ID, ArticlePeer::ID);

		$rs = SectionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLayout(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SectionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SectionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SectionPeer::LAYOUT_ID, LayoutPeer::ID);

		$rs = SectionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinArticleGroup(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SectionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SectionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SectionPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);

		$rs = SectionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinMultimedia(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SectionPeer::addSelectColumns($c);
		$startcol = (SectionPeer::NUM_COLUMNS - SectionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		MultimediaPeer::addSelectColumns($c);

		$c->addJoin(SectionPeer::MULTIMEDIA_ID, MultimediaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SectionPeer::getOMClass();

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
										$temp_obj2->addSection($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSections();
				$obj2->addSection($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTemplate(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SectionPeer::addSelectColumns($c);
		$startcol = (SectionPeer::NUM_COLUMNS - SectionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TemplatePeer::addSelectColumns($c);

		$c->addJoin(SectionPeer::TEMPLATE_ID, TemplatePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SectionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TemplatePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTemplate(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addSection($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSections();
				$obj2->addSection($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinArticle(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SectionPeer::addSelectColumns($c);
		$startcol = (SectionPeer::NUM_COLUMNS - SectionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ArticlePeer::addSelectColumns($c);

		$c->addJoin(SectionPeer::ARTICLE_ID, ArticlePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SectionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ArticlePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getArticle(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addSection($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSections();
				$obj2->addSection($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLayout(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SectionPeer::addSelectColumns($c);
		$startcol = (SectionPeer::NUM_COLUMNS - SectionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LayoutPeer::addSelectColumns($c);

		$c->addJoin(SectionPeer::LAYOUT_ID, LayoutPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SectionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LayoutPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLayout(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addSection($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSections();
				$obj2->addSection($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinArticleGroup(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SectionPeer::addSelectColumns($c);
		$startcol = (SectionPeer::NUM_COLUMNS - SectionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ArticleGroupPeer::addSelectColumns($c);

		$c->addJoin(SectionPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SectionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ArticleGroupPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getArticleGroup(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addSection($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSections();
				$obj2->addSection($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SectionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SectionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SectionPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(SectionPeer::TEMPLATE_ID, TemplatePeer::ID);

		$criteria->addJoin(SectionPeer::ARTICLE_ID, ArticlePeer::ID);

		$criteria->addJoin(SectionPeer::LAYOUT_ID, LayoutPeer::ID);

		$criteria->addJoin(SectionPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);

		$rs = SectionPeer::doSelectRS($criteria, $con);
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

		SectionPeer::addSelectColumns($c);
		$startcol2 = (SectionPeer::NUM_COLUMNS - SectionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		TemplatePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TemplatePeer::NUM_COLUMNS;

		ArticlePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ArticlePeer::NUM_COLUMNS;

		LayoutPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + LayoutPeer::NUM_COLUMNS;

		ArticleGroupPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ArticleGroupPeer::NUM_COLUMNS;

		$c->addJoin(SectionPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(SectionPeer::TEMPLATE_ID, TemplatePeer::ID);

		$c->addJoin(SectionPeer::ARTICLE_ID, ArticlePeer::ID);

		$c->addJoin(SectionPeer::LAYOUT_ID, LayoutPeer::ID);

		$c->addJoin(SectionPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SectionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = MultimediaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getMultimedia(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSection($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initSections();
				$obj2->addSection($obj1);
			}


					
			$omClass = TemplatePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTemplate(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addSection($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initSections();
				$obj3->addSection($obj1);
			}


					
			$omClass = ArticlePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getArticle(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addSection($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initSections();
				$obj4->addSection($obj1);
			}


					
			$omClass = LayoutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getLayout(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addSection($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initSections();
				$obj5->addSection($obj1);
			}


					
			$omClass = ArticleGroupPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getArticleGroup(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addSection($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initSections();
				$obj6->addSection($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptMultimedia(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SectionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SectionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SectionPeer::TEMPLATE_ID, TemplatePeer::ID);

		$criteria->addJoin(SectionPeer::ARTICLE_ID, ArticlePeer::ID);

		$criteria->addJoin(SectionPeer::LAYOUT_ID, LayoutPeer::ID);

		$criteria->addJoin(SectionPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);

		$rs = SectionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptSectionRelatedBySectionId(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SectionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SectionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SectionPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(SectionPeer::TEMPLATE_ID, TemplatePeer::ID);

		$criteria->addJoin(SectionPeer::ARTICLE_ID, ArticlePeer::ID);

		$criteria->addJoin(SectionPeer::LAYOUT_ID, LayoutPeer::ID);

		$criteria->addJoin(SectionPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);

		$rs = SectionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTemplate(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SectionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SectionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SectionPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(SectionPeer::ARTICLE_ID, ArticlePeer::ID);

		$criteria->addJoin(SectionPeer::LAYOUT_ID, LayoutPeer::ID);

		$criteria->addJoin(SectionPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);

		$rs = SectionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptArticle(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SectionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SectionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SectionPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(SectionPeer::TEMPLATE_ID, TemplatePeer::ID);

		$criteria->addJoin(SectionPeer::LAYOUT_ID, LayoutPeer::ID);

		$criteria->addJoin(SectionPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);

		$rs = SectionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptLayout(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SectionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SectionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SectionPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(SectionPeer::TEMPLATE_ID, TemplatePeer::ID);

		$criteria->addJoin(SectionPeer::ARTICLE_ID, ArticlePeer::ID);

		$criteria->addJoin(SectionPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);

		$rs = SectionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptArticleGroup(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SectionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SectionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SectionPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(SectionPeer::TEMPLATE_ID, TemplatePeer::ID);

		$criteria->addJoin(SectionPeer::ARTICLE_ID, ArticlePeer::ID);

		$criteria->addJoin(SectionPeer::LAYOUT_ID, LayoutPeer::ID);

		$rs = SectionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptMultimedia(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SectionPeer::addSelectColumns($c);
		$startcol2 = (SectionPeer::NUM_COLUMNS - SectionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TemplatePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TemplatePeer::NUM_COLUMNS;

		ArticlePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ArticlePeer::NUM_COLUMNS;

		LayoutPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + LayoutPeer::NUM_COLUMNS;

		ArticleGroupPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ArticleGroupPeer::NUM_COLUMNS;

		$c->addJoin(SectionPeer::TEMPLATE_ID, TemplatePeer::ID);

		$c->addJoin(SectionPeer::ARTICLE_ID, ArticlePeer::ID);

		$c->addJoin(SectionPeer::LAYOUT_ID, LayoutPeer::ID);

		$c->addJoin(SectionPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SectionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TemplatePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTemplate(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSections();
				$obj2->addSection($obj1);
			}

			$omClass = ArticlePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getArticle(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initSections();
				$obj3->addSection($obj1);
			}

			$omClass = LayoutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getLayout(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initSections();
				$obj4->addSection($obj1);
			}

			$omClass = ArticleGroupPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getArticleGroup(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initSections();
				$obj5->addSection($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptSectionRelatedBySectionId(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SectionPeer::addSelectColumns($c);
		$startcol2 = (SectionPeer::NUM_COLUMNS - SectionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		TemplatePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TemplatePeer::NUM_COLUMNS;

		ArticlePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ArticlePeer::NUM_COLUMNS;

		LayoutPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + LayoutPeer::NUM_COLUMNS;

		ArticleGroupPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + ArticleGroupPeer::NUM_COLUMNS;

		$c->addJoin(SectionPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(SectionPeer::TEMPLATE_ID, TemplatePeer::ID);

		$c->addJoin(SectionPeer::ARTICLE_ID, ArticlePeer::ID);

		$c->addJoin(SectionPeer::LAYOUT_ID, LayoutPeer::ID);

		$c->addJoin(SectionPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SectionPeer::getOMClass();

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
					$temp_obj2->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSections();
				$obj2->addSection($obj1);
			}

			$omClass = TemplatePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTemplate(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initSections();
				$obj3->addSection($obj1);
			}

			$omClass = ArticlePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getArticle(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initSections();
				$obj4->addSection($obj1);
			}

			$omClass = LayoutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getLayout(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initSections();
				$obj5->addSection($obj1);
			}

			$omClass = ArticleGroupPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6  = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getArticleGroup(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj6->initSections();
				$obj6->addSection($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTemplate(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SectionPeer::addSelectColumns($c);
		$startcol2 = (SectionPeer::NUM_COLUMNS - SectionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		ArticlePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ArticlePeer::NUM_COLUMNS;

		LayoutPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + LayoutPeer::NUM_COLUMNS;

		ArticleGroupPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ArticleGroupPeer::NUM_COLUMNS;

		$c->addJoin(SectionPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(SectionPeer::ARTICLE_ID, ArticlePeer::ID);

		$c->addJoin(SectionPeer::LAYOUT_ID, LayoutPeer::ID);

		$c->addJoin(SectionPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SectionPeer::getOMClass();

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
					$temp_obj2->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSections();
				$obj2->addSection($obj1);
			}

			$omClass = ArticlePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getArticle(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initSections();
				$obj3->addSection($obj1);
			}

			$omClass = LayoutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getLayout(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initSections();
				$obj4->addSection($obj1);
			}

			$omClass = ArticleGroupPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getArticleGroup(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initSections();
				$obj5->addSection($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptArticle(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SectionPeer::addSelectColumns($c);
		$startcol2 = (SectionPeer::NUM_COLUMNS - SectionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		TemplatePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TemplatePeer::NUM_COLUMNS;

		LayoutPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + LayoutPeer::NUM_COLUMNS;

		ArticleGroupPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ArticleGroupPeer::NUM_COLUMNS;

		$c->addJoin(SectionPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(SectionPeer::TEMPLATE_ID, TemplatePeer::ID);

		$c->addJoin(SectionPeer::LAYOUT_ID, LayoutPeer::ID);

		$c->addJoin(SectionPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SectionPeer::getOMClass();

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
					$temp_obj2->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSections();
				$obj2->addSection($obj1);
			}

			$omClass = TemplatePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTemplate(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initSections();
				$obj3->addSection($obj1);
			}

			$omClass = LayoutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getLayout(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initSections();
				$obj4->addSection($obj1);
			}

			$omClass = ArticleGroupPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getArticleGroup(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initSections();
				$obj5->addSection($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLayout(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SectionPeer::addSelectColumns($c);
		$startcol2 = (SectionPeer::NUM_COLUMNS - SectionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		TemplatePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TemplatePeer::NUM_COLUMNS;

		ArticlePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ArticlePeer::NUM_COLUMNS;

		ArticleGroupPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + ArticleGroupPeer::NUM_COLUMNS;

		$c->addJoin(SectionPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(SectionPeer::TEMPLATE_ID, TemplatePeer::ID);

		$c->addJoin(SectionPeer::ARTICLE_ID, ArticlePeer::ID);

		$c->addJoin(SectionPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SectionPeer::getOMClass();

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
					$temp_obj2->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSections();
				$obj2->addSection($obj1);
			}

			$omClass = TemplatePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTemplate(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initSections();
				$obj3->addSection($obj1);
			}

			$omClass = ArticlePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getArticle(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initSections();
				$obj4->addSection($obj1);
			}

			$omClass = ArticleGroupPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getArticleGroup(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initSections();
				$obj5->addSection($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptArticleGroup(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SectionPeer::addSelectColumns($c);
		$startcol2 = (SectionPeer::NUM_COLUMNS - SectionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		TemplatePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TemplatePeer::NUM_COLUMNS;

		ArticlePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + ArticlePeer::NUM_COLUMNS;

		LayoutPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + LayoutPeer::NUM_COLUMNS;

		$c->addJoin(SectionPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(SectionPeer::TEMPLATE_ID, TemplatePeer::ID);

		$c->addJoin(SectionPeer::ARTICLE_ID, ArticlePeer::ID);

		$c->addJoin(SectionPeer::LAYOUT_ID, LayoutPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SectionPeer::getOMClass();

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
					$temp_obj2->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSections();
				$obj2->addSection($obj1);
			}

			$omClass = TemplatePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTemplate(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initSections();
				$obj3->addSection($obj1);
			}

			$omClass = ArticlePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getArticle(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initSections();
				$obj4->addSection($obj1);
			}

			$omClass = LayoutPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getLayout(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addSection($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initSections();
				$obj5->addSection($obj1);
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
		return SectionPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSectionPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseSectionPeer', $values, $con);
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

		$criteria->remove(SectionPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseSectionPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseSectionPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseSectionPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseSectionPeer', $values, $con);
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
			$comparison = $criteria->getComparison(SectionPeer::ID);
			$selectCriteria->add(SectionPeer::ID, $criteria->remove(SectionPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseSectionPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseSectionPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(SectionPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(SectionPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Section) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(SectionPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Section $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SectionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SectionPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(SectionPeer::DATABASE_NAME, SectionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = SectionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(SectionPeer::DATABASE_NAME);

		$criteria->add(SectionPeer::ID, $pk);


		$v = SectionPeer::doSelect($criteria, $con);

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
			$criteria->add(SectionPeer::ID, $pks, Criteria::IN);
			$objs = SectionPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseSectionPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/SectionMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.SectionMapBuilder');
}
