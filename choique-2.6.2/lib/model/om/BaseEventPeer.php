<?php


abstract class BaseEventPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'event';

	
	const CLASS_DEFAULT = 'lib.model.Event';

	
	const NUM_COLUMNS = 17;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'event.ID';

	
	const IS_PUBLISHED = 'event.IS_PUBLISHED';

	
	const TITLE = 'event.TITLE';

	
	const DESCRIPTION = 'event.DESCRIPTION';

	
	const LOCATION = 'event.LOCATION';

	
	const CONTACT = 'event.CONTACT';

	
	const ORGANIZER = 'event.ORGANIZER';

	
	const AUTHOR = 'event.AUTHOR';

	
	const COMMENT = 'event.COMMENT';

	
	const BEGINS_AT = 'event.BEGINS_AT';

	
	const ENDS_AT = 'event.ENDS_AT';

	
	const ARTICLE_ID = 'event.ARTICLE_ID';

	
	const EVENT_TYPE_ID = 'event.EVENT_TYPE_ID';

	
	const CREATED_AT = 'event.CREATED_AT';

	
	const UPDATED_BY = 'event.UPDATED_BY';

	
	const UPDATED_AT = 'event.UPDATED_AT';

	
	const MULTIMEDIA_ID = 'event.MULTIMEDIA_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'IsPublished', 'Title', 'Description', 'Location', 'Contact', 'Organizer', 'Author', 'Comment', 'BeginsAt', 'EndsAt', 'ArticleId', 'EventTypeId', 'CreatedAt', 'UpdatedBy', 'UpdatedAt', 'MultimediaId', ),
		BasePeer::TYPE_COLNAME => array (EventPeer::ID, EventPeer::IS_PUBLISHED, EventPeer::TITLE, EventPeer::DESCRIPTION, EventPeer::LOCATION, EventPeer::CONTACT, EventPeer::ORGANIZER, EventPeer::AUTHOR, EventPeer::COMMENT, EventPeer::BEGINS_AT, EventPeer::ENDS_AT, EventPeer::ARTICLE_ID, EventPeer::EVENT_TYPE_ID, EventPeer::CREATED_AT, EventPeer::UPDATED_BY, EventPeer::UPDATED_AT, EventPeer::MULTIMEDIA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'is_published', 'title', 'description', 'location', 'contact', 'organizer', 'author', 'comment', 'begins_at', 'ends_at', 'article_id', 'event_type_id', 'created_at', 'updated_by', 'updated_at', 'multimedia_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'IsPublished' => 1, 'Title' => 2, 'Description' => 3, 'Location' => 4, 'Contact' => 5, 'Organizer' => 6, 'Author' => 7, 'Comment' => 8, 'BeginsAt' => 9, 'EndsAt' => 10, 'ArticleId' => 11, 'EventTypeId' => 12, 'CreatedAt' => 13, 'UpdatedBy' => 14, 'UpdatedAt' => 15, 'MultimediaId' => 16, ),
		BasePeer::TYPE_COLNAME => array (EventPeer::ID => 0, EventPeer::IS_PUBLISHED => 1, EventPeer::TITLE => 2, EventPeer::DESCRIPTION => 3, EventPeer::LOCATION => 4, EventPeer::CONTACT => 5, EventPeer::ORGANIZER => 6, EventPeer::AUTHOR => 7, EventPeer::COMMENT => 8, EventPeer::BEGINS_AT => 9, EventPeer::ENDS_AT => 10, EventPeer::ARTICLE_ID => 11, EventPeer::EVENT_TYPE_ID => 12, EventPeer::CREATED_AT => 13, EventPeer::UPDATED_BY => 14, EventPeer::UPDATED_AT => 15, EventPeer::MULTIMEDIA_ID => 16, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'is_published' => 1, 'title' => 2, 'description' => 3, 'location' => 4, 'contact' => 5, 'organizer' => 6, 'author' => 7, 'comment' => 8, 'begins_at' => 9, 'ends_at' => 10, 'article_id' => 11, 'event_type_id' => 12, 'created_at' => 13, 'updated_by' => 14, 'updated_at' => 15, 'multimedia_id' => 16, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/EventMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.EventMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = EventPeer::getTableMap();
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
		return str_replace(EventPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(EventPeer::ID);

		$criteria->addSelectColumn(EventPeer::IS_PUBLISHED);

		$criteria->addSelectColumn(EventPeer::TITLE);

		$criteria->addSelectColumn(EventPeer::DESCRIPTION);

		$criteria->addSelectColumn(EventPeer::LOCATION);

		$criteria->addSelectColumn(EventPeer::CONTACT);

		$criteria->addSelectColumn(EventPeer::ORGANIZER);

		$criteria->addSelectColumn(EventPeer::AUTHOR);

		$criteria->addSelectColumn(EventPeer::COMMENT);

		$criteria->addSelectColumn(EventPeer::BEGINS_AT);

		$criteria->addSelectColumn(EventPeer::ENDS_AT);

		$criteria->addSelectColumn(EventPeer::ARTICLE_ID);

		$criteria->addSelectColumn(EventPeer::EVENT_TYPE_ID);

		$criteria->addSelectColumn(EventPeer::CREATED_AT);

		$criteria->addSelectColumn(EventPeer::UPDATED_BY);

		$criteria->addSelectColumn(EventPeer::UPDATED_AT);

		$criteria->addSelectColumn(EventPeer::MULTIMEDIA_ID);

	}

	const COUNT = 'COUNT(event.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT event.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = EventPeer::doSelectRS($criteria, $con);
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
		$objects = EventPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return EventPeer::populateObjects(EventPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseEventPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseEventPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			EventPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = EventPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUserRelatedByAuthor(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EventPeer::AUTHOR, sfGuardUserPeer::ID);

		$rs = EventPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(EventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EventPeer::ARTICLE_ID, ArticlePeer::ID);

		$rs = EventPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinEventType(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID);

		$rs = EventPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(EventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EventPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = EventPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(EventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EventPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = EventPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUserRelatedByAuthor(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EventPeer::addSelectColumns($c);
		$startcol = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(EventPeer::AUTHOR, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EventPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByAuthor(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEventRelatedByAuthor($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEventsRelatedByAuthor();
				$obj2->addEventRelatedByAuthor($obj1); 			}
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

		EventPeer::addSelectColumns($c);
		$startcol = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ArticlePeer::addSelectColumns($c);

		$c->addJoin(EventPeer::ARTICLE_ID, ArticlePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EventPeer::getOMClass();

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
										$temp_obj2->addEvent($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEvents();
				$obj2->addEvent($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinEventType(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EventPeer::addSelectColumns($c);
		$startcol = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		EventTypePeer::addSelectColumns($c);

		$c->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EventPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = EventTypePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getEventType(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addEvent($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEvents();
				$obj2->addEvent($obj1); 			}
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

		EventPeer::addSelectColumns($c);
		$startcol = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(EventPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EventPeer::getOMClass();

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
										$temp_obj2->addEventRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEventsRelatedByUpdatedBy();
				$obj2->addEventRelatedByUpdatedBy($obj1); 			}
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

		EventPeer::addSelectColumns($c);
		$startcol = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		MultimediaPeer::addSelectColumns($c);

		$c->addJoin(EventPeer::MULTIMEDIA_ID, MultimediaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EventPeer::getOMClass();

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
										$temp_obj2->addEvent($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initEvents();
				$obj2->addEvent($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EventPeer::AUTHOR, sfGuardUserPeer::ID);

		$criteria->addJoin(EventPeer::ARTICLE_ID, ArticlePeer::ID);

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID);

		$criteria->addJoin(EventPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(EventPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = EventPeer::doSelectRS($criteria, $con);
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

		EventPeer::addSelectColumns($c);
		$startcol2 = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ArticlePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ArticlePeer::NUM_COLUMNS;

		EventTypePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + EventTypePeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		MultimediaPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + MultimediaPeer::NUM_COLUMNS;

		$c->addJoin(EventPeer::AUTHOR, sfGuardUserPeer::ID);

		$c->addJoin(EventPeer::ARTICLE_ID, ArticlePeer::ID);

		$c->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID);

		$c->addJoin(EventPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(EventPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EventPeer::getOMClass();


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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByAuthor(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEventRelatedByAuthor($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initEventsRelatedByAuthor();
				$obj2->addEventRelatedByAuthor($obj1);
			}


					
			$omClass = ArticlePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getArticle(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEvent($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initEvents();
				$obj3->addEvent($obj1);
			}


					
			$omClass = EventTypePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getEventType(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addEvent($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initEvents();
				$obj4->addEvent($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5 = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addEventRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initEventsRelatedByUpdatedBy();
				$obj5->addEventRelatedByUpdatedBy($obj1);
			}


					
			$omClass = MultimediaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj6 = new $cls();
			$obj6->hydrate($rs, $startcol6);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj6 = $temp_obj1->getMultimedia(); 				if ($temp_obj6->getPrimaryKey() === $obj6->getPrimaryKey()) {
					$newObject = false;
					$temp_obj6->addEvent($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj6->initEvents();
				$obj6->addEvent($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByAuthor(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EventPeer::ARTICLE_ID, ArticlePeer::ID);

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID);

		$criteria->addJoin(EventPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = EventPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(EventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EventPeer::AUTHOR, sfGuardUserPeer::ID);

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID);

		$criteria->addJoin(EventPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(EventPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = EventPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptEventType(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(EventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EventPeer::AUTHOR, sfGuardUserPeer::ID);

		$criteria->addJoin(EventPeer::ARTICLE_ID, ArticlePeer::ID);

		$criteria->addJoin(EventPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(EventPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = EventPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(EventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EventPeer::ARTICLE_ID, ArticlePeer::ID);

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID);

		$criteria->addJoin(EventPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = EventPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(EventPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(EventPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(EventPeer::AUTHOR, sfGuardUserPeer::ID);

		$criteria->addJoin(EventPeer::ARTICLE_ID, ArticlePeer::ID);

		$criteria->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID);

		$criteria->addJoin(EventPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = EventPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByAuthor(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EventPeer::addSelectColumns($c);
		$startcol2 = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticlePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticlePeer::NUM_COLUMNS;

		EventTypePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EventTypePeer::NUM_COLUMNS;

		MultimediaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + MultimediaPeer::NUM_COLUMNS;

		$c->addJoin(EventPeer::ARTICLE_ID, ArticlePeer::ID);

		$c->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID);

		$c->addJoin(EventPeer::MULTIMEDIA_ID, MultimediaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EventPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ArticlePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getArticle(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEvent($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEvents();
				$obj2->addEvent($obj1);
			}

			$omClass = EventTypePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEventType(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEvent($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initEvents();
				$obj3->addEvent($obj1);
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
					$temp_obj4->addEvent($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initEvents();
				$obj4->addEvent($obj1);
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

		EventPeer::addSelectColumns($c);
		$startcol2 = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		EventTypePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EventTypePeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		MultimediaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + MultimediaPeer::NUM_COLUMNS;

		$c->addJoin(EventPeer::AUTHOR, sfGuardUserPeer::ID);

		$c->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID);

		$c->addJoin(EventPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(EventPeer::MULTIMEDIA_ID, MultimediaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EventPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByAuthor(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEventRelatedByAuthor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEventsRelatedByAuthor();
				$obj2->addEventRelatedByAuthor($obj1);
			}

			$omClass = EventTypePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEventType(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEvent($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initEvents();
				$obj3->addEvent($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addEventRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initEventsRelatedByUpdatedBy();
				$obj4->addEventRelatedByUpdatedBy($obj1);
			}

			$omClass = MultimediaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getMultimedia(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addEvent($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initEvents();
				$obj5->addEvent($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptEventType(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		EventPeer::addSelectColumns($c);
		$startcol2 = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ArticlePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ArticlePeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		MultimediaPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + MultimediaPeer::NUM_COLUMNS;

		$c->addJoin(EventPeer::AUTHOR, sfGuardUserPeer::ID);

		$c->addJoin(EventPeer::ARTICLE_ID, ArticlePeer::ID);

		$c->addJoin(EventPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(EventPeer::MULTIMEDIA_ID, MultimediaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EventPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByAuthor(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEventRelatedByAuthor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEventsRelatedByAuthor();
				$obj2->addEventRelatedByAuthor($obj1);
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
					$temp_obj3->addEvent($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initEvents();
				$obj3->addEvent($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addEventRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initEventsRelatedByUpdatedBy();
				$obj4->addEventRelatedByUpdatedBy($obj1);
			}

			$omClass = MultimediaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getMultimedia(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addEvent($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initEvents();
				$obj5->addEvent($obj1);
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

		EventPeer::addSelectColumns($c);
		$startcol2 = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticlePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticlePeer::NUM_COLUMNS;

		EventTypePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + EventTypePeer::NUM_COLUMNS;

		MultimediaPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + MultimediaPeer::NUM_COLUMNS;

		$c->addJoin(EventPeer::ARTICLE_ID, ArticlePeer::ID);

		$c->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID);

		$c->addJoin(EventPeer::MULTIMEDIA_ID, MultimediaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EventPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ArticlePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getArticle(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEvent($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEvents();
				$obj2->addEvent($obj1);
			}

			$omClass = EventTypePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getEventType(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addEvent($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initEvents();
				$obj3->addEvent($obj1);
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
					$temp_obj4->addEvent($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initEvents();
				$obj4->addEvent($obj1);
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

		EventPeer::addSelectColumns($c);
		$startcol2 = (EventPeer::NUM_COLUMNS - EventPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		ArticlePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ArticlePeer::NUM_COLUMNS;

		EventTypePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + EventTypePeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(EventPeer::AUTHOR, sfGuardUserPeer::ID);

		$c->addJoin(EventPeer::ARTICLE_ID, ArticlePeer::ID);

		$c->addJoin(EventPeer::EVENT_TYPE_ID, EventTypePeer::ID);

		$c->addJoin(EventPeer::UPDATED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = EventPeer::getOMClass();

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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByAuthor(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addEventRelatedByAuthor($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initEventsRelatedByAuthor();
				$obj2->addEventRelatedByAuthor($obj1);
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
					$temp_obj3->addEvent($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initEvents();
				$obj3->addEvent($obj1);
			}

			$omClass = EventTypePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4  = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getEventType(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addEvent($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initEvents();
				$obj4->addEvent($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj5  = new $cls();
			$obj5->hydrate($rs, $startcol5);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj5 = $temp_obj1->getsfGuardUserRelatedByUpdatedBy(); 				if ($temp_obj5->getPrimaryKey() === $obj5->getPrimaryKey()) {
					$newObject = false;
					$temp_obj5->addEventRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj5->initEventsRelatedByUpdatedBy();
				$obj5->addEventRelatedByUpdatedBy($obj1);
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
		return EventPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseEventPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseEventPeer', $values, $con);
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

		$criteria->remove(EventPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseEventPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseEventPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseEventPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseEventPeer', $values, $con);
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
			$comparison = $criteria->getComparison(EventPeer::ID);
			$selectCriteria->add(EventPeer::ID, $criteria->remove(EventPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseEventPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseEventPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(EventPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(EventPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Event) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(EventPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Event $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(EventPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(EventPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(EventPeer::DATABASE_NAME, EventPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = EventPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(EventPeer::DATABASE_NAME);

		$criteria->add(EventPeer::ID, $pk);


		$v = EventPeer::doSelect($criteria, $con);

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
			$criteria->add(EventPeer::ID, $pks, Criteria::IN);
			$objs = EventPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseEventPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/EventMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.EventMapBuilder');
}
