<?php


abstract class BaseShortcutPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'shortcut';

	
	const CLASS_DEFAULT = 'lib.model.Shortcut';

	
	const NUM_COLUMNS = 15;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'shortcut.ID';

	
	const MULTIMEDIA_ID = 'shortcut.MULTIMEDIA_ID';

	
	const CONTAINER_SLOTLET_ID = 'shortcut.CONTAINER_SLOTLET_ID';

	
	const TITLE = 'shortcut.TITLE';

	
	const BODY = 'shortcut.BODY';

	
	const REFERENCE = 'shortcut.REFERENCE';

	
	const REFERENCE_TYPE = 'shortcut.REFERENCE_TYPE';

	
	const OPEN_IN_NEW_WINDOW = 'shortcut.OPEN_IN_NEW_WINDOW';

	
	const PRIORITY = 'shortcut.PRIORITY';

	
	const COMMENT = 'shortcut.COMMENT';

	
	const IS_PUBLISHED = 'shortcut.IS_PUBLISHED';

	
	const CREATED_BY = 'shortcut.CREATED_BY';

	
	const CREATED_AT = 'shortcut.CREATED_AT';

	
	const UPDATED_BY = 'shortcut.UPDATED_BY';

	
	const UPDATED_AT = 'shortcut.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'MultimediaId', 'ContainerSlotletId', 'Title', 'Body', 'Reference', 'ReferenceType', 'OpenInNewWindow', 'Priority', 'Comment', 'IsPublished', 'CreatedBy', 'CreatedAt', 'UpdatedBy', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (ShortcutPeer::ID, ShortcutPeer::MULTIMEDIA_ID, ShortcutPeer::CONTAINER_SLOTLET_ID, ShortcutPeer::TITLE, ShortcutPeer::BODY, ShortcutPeer::REFERENCE, ShortcutPeer::REFERENCE_TYPE, ShortcutPeer::OPEN_IN_NEW_WINDOW, ShortcutPeer::PRIORITY, ShortcutPeer::COMMENT, ShortcutPeer::IS_PUBLISHED, ShortcutPeer::CREATED_BY, ShortcutPeer::CREATED_AT, ShortcutPeer::UPDATED_BY, ShortcutPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'multimedia_id', 'container_slotlet_id', 'title', 'body', 'reference', 'reference_type', 'open_in_new_window', 'priority', 'comment', 'is_published', 'created_by', 'created_at', 'updated_by', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'MultimediaId' => 1, 'ContainerSlotletId' => 2, 'Title' => 3, 'Body' => 4, 'Reference' => 5, 'ReferenceType' => 6, 'OpenInNewWindow' => 7, 'Priority' => 8, 'Comment' => 9, 'IsPublished' => 10, 'CreatedBy' => 11, 'CreatedAt' => 12, 'UpdatedBy' => 13, 'UpdatedAt' => 14, ),
		BasePeer::TYPE_COLNAME => array (ShortcutPeer::ID => 0, ShortcutPeer::MULTIMEDIA_ID => 1, ShortcutPeer::CONTAINER_SLOTLET_ID => 2, ShortcutPeer::TITLE => 3, ShortcutPeer::BODY => 4, ShortcutPeer::REFERENCE => 5, ShortcutPeer::REFERENCE_TYPE => 6, ShortcutPeer::OPEN_IN_NEW_WINDOW => 7, ShortcutPeer::PRIORITY => 8, ShortcutPeer::COMMENT => 9, ShortcutPeer::IS_PUBLISHED => 10, ShortcutPeer::CREATED_BY => 11, ShortcutPeer::CREATED_AT => 12, ShortcutPeer::UPDATED_BY => 13, ShortcutPeer::UPDATED_AT => 14, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'multimedia_id' => 1, 'container_slotlet_id' => 2, 'title' => 3, 'body' => 4, 'reference' => 5, 'reference_type' => 6, 'open_in_new_window' => 7, 'priority' => 8, 'comment' => 9, 'is_published' => 10, 'created_by' => 11, 'created_at' => 12, 'updated_by' => 13, 'updated_at' => 14, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ShortcutMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ShortcutMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ShortcutPeer::getTableMap();
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
		return str_replace(ShortcutPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ShortcutPeer::ID);

		$criteria->addSelectColumn(ShortcutPeer::MULTIMEDIA_ID);

		$criteria->addSelectColumn(ShortcutPeer::CONTAINER_SLOTLET_ID);

		$criteria->addSelectColumn(ShortcutPeer::TITLE);

		$criteria->addSelectColumn(ShortcutPeer::BODY);

		$criteria->addSelectColumn(ShortcutPeer::REFERENCE);

		$criteria->addSelectColumn(ShortcutPeer::REFERENCE_TYPE);

		$criteria->addSelectColumn(ShortcutPeer::OPEN_IN_NEW_WINDOW);

		$criteria->addSelectColumn(ShortcutPeer::PRIORITY);

		$criteria->addSelectColumn(ShortcutPeer::COMMENT);

		$criteria->addSelectColumn(ShortcutPeer::IS_PUBLISHED);

		$criteria->addSelectColumn(ShortcutPeer::CREATED_BY);

		$criteria->addSelectColumn(ShortcutPeer::CREATED_AT);

		$criteria->addSelectColumn(ShortcutPeer::UPDATED_BY);

		$criteria->addSelectColumn(ShortcutPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(shortcut.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT shortcut.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ShortcutPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ShortcutPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ShortcutPeer::doSelectRS($criteria, $con);
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
		$objects = ShortcutPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ShortcutPeer::populateObjects(ShortcutPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseShortcutPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseShortcutPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ShortcutPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ShortcutPeer::getOMClass();
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
			$criteria->addSelectColumn(ShortcutPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ShortcutPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ShortcutPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = ShortcutPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinContainerSlotlet(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ShortcutPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ShortcutPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ShortcutPeer::CONTAINER_SLOTLET_ID, ContainerSlotletPeer::ID);

		$rs = ShortcutPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ShortcutPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ShortcutPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ShortcutPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = ShortcutPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ShortcutPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ShortcutPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ShortcutPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = ShortcutPeer::doSelectRS($criteria, $con);
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

		ShortcutPeer::addSelectColumns($c);
		$startcol = (ShortcutPeer::NUM_COLUMNS - ShortcutPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		MultimediaPeer::addSelectColumns($c);

		$c->addJoin(ShortcutPeer::MULTIMEDIA_ID, MultimediaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ShortcutPeer::getOMClass();

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
										$temp_obj2->addShortcut($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initShortcuts();
				$obj2->addShortcut($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinContainerSlotlet(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ShortcutPeer::addSelectColumns($c);
		$startcol = (ShortcutPeer::NUM_COLUMNS - ShortcutPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ContainerSlotletPeer::addSelectColumns($c);

		$c->addJoin(ShortcutPeer::CONTAINER_SLOTLET_ID, ContainerSlotletPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ShortcutPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ContainerSlotletPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getContainerSlotlet(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addShortcut($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initShortcuts();
				$obj2->addShortcut($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ShortcutPeer::addSelectColumns($c);
		$startcol = (ShortcutPeer::NUM_COLUMNS - ShortcutPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ShortcutPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ShortcutPeer::getOMClass();

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
										$temp_obj2->addShortcutRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initShortcutsRelatedByCreatedBy();
				$obj2->addShortcutRelatedByCreatedBy($obj1); 			}
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

		ShortcutPeer::addSelectColumns($c);
		$startcol = (ShortcutPeer::NUM_COLUMNS - ShortcutPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ShortcutPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ShortcutPeer::getOMClass();

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
										$temp_obj2->addShortcutRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initShortcutsRelatedByUpdatedBy();
				$obj2->addShortcutRelatedByUpdatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ShortcutPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ShortcutPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ShortcutPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(ShortcutPeer::CONTAINER_SLOTLET_ID, ContainerSlotletPeer::ID);

		$criteria->addJoin(ShortcutPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ShortcutPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = ShortcutPeer::doSelectRS($criteria, $con);
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

		ShortcutPeer::addSelectColumns($c);
		$startcol2 = (ShortcutPeer::NUM_COLUMNS - ShortcutPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		ContainerSlotletPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ContainerSlotletPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ShortcutPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(ShortcutPeer::CONTAINER_SLOTLET_ID, ContainerSlotletPeer::ID);

		$c->addJoin(ShortcutPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ShortcutPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ShortcutPeer::getOMClass();


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
					$temp_obj2->addShortcut($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initShortcuts();
				$obj2->addShortcut($obj1);
			}


					
			$omClass = ContainerSlotletPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getContainerSlotlet(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addShortcut($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initShortcuts();
				$obj3->addShortcut($obj1);
			}


					
			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addShortcutRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initShortcutsRelatedByCreatedBy();
				$obj4->addShortcutRelatedByCreatedBy($obj1);
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
					$temp_obj5->addShortcutRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj5->initShortcutsRelatedByUpdatedBy();
				$obj5->addShortcutRelatedByUpdatedBy($obj1);
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
			$criteria->addSelectColumn(ShortcutPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ShortcutPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ShortcutPeer::CONTAINER_SLOTLET_ID, ContainerSlotletPeer::ID);

		$criteria->addJoin(ShortcutPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ShortcutPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = ShortcutPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptContainerSlotlet(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ShortcutPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ShortcutPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ShortcutPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(ShortcutPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ShortcutPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = ShortcutPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ShortcutPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ShortcutPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ShortcutPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(ShortcutPeer::CONTAINER_SLOTLET_ID, ContainerSlotletPeer::ID);

		$rs = ShortcutPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ShortcutPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ShortcutPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ShortcutPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(ShortcutPeer::CONTAINER_SLOTLET_ID, ContainerSlotletPeer::ID);

		$rs = ShortcutPeer::doSelectRS($criteria, $con);
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

		ShortcutPeer::addSelectColumns($c);
		$startcol2 = (ShortcutPeer::NUM_COLUMNS - ShortcutPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ContainerSlotletPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ContainerSlotletPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ShortcutPeer::CONTAINER_SLOTLET_ID, ContainerSlotletPeer::ID);

		$c->addJoin(ShortcutPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ShortcutPeer::UPDATED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ShortcutPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ContainerSlotletPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getContainerSlotlet(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addShortcut($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initShortcuts();
				$obj2->addShortcut($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addShortcutRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initShortcutsRelatedByCreatedBy();
				$obj3->addShortcutRelatedByCreatedBy($obj1);
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
					$temp_obj4->addShortcutRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initShortcutsRelatedByUpdatedBy();
				$obj4->addShortcutRelatedByUpdatedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptContainerSlotlet(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ShortcutPeer::addSelectColumns($c);
		$startcol2 = (ShortcutPeer::NUM_COLUMNS - ShortcutPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ShortcutPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(ShortcutPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ShortcutPeer::UPDATED_BY, sfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ShortcutPeer::getOMClass();

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
					$temp_obj2->addShortcut($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initShortcuts();
				$obj2->addShortcut($obj1);
			}

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getsfGuardUserRelatedByCreatedBy(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addShortcutRelatedByCreatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initShortcutsRelatedByCreatedBy();
				$obj3->addShortcutRelatedByCreatedBy($obj1);
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
					$temp_obj4->addShortcutRelatedByUpdatedBy($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj4->initShortcutsRelatedByUpdatedBy();
				$obj4->addShortcutRelatedByUpdatedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByCreatedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ShortcutPeer::addSelectColumns($c);
		$startcol2 = (ShortcutPeer::NUM_COLUMNS - ShortcutPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		ContainerSlotletPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ContainerSlotletPeer::NUM_COLUMNS;

		$c->addJoin(ShortcutPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(ShortcutPeer::CONTAINER_SLOTLET_ID, ContainerSlotletPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ShortcutPeer::getOMClass();

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
					$temp_obj2->addShortcut($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initShortcuts();
				$obj2->addShortcut($obj1);
			}

			$omClass = ContainerSlotletPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getContainerSlotlet(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addShortcut($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initShortcuts();
				$obj3->addShortcut($obj1);
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

		ShortcutPeer::addSelectColumns($c);
		$startcol2 = (ShortcutPeer::NUM_COLUMNS - ShortcutPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		ContainerSlotletPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ContainerSlotletPeer::NUM_COLUMNS;

		$c->addJoin(ShortcutPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(ShortcutPeer::CONTAINER_SLOTLET_ID, ContainerSlotletPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ShortcutPeer::getOMClass();

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
					$temp_obj2->addShortcut($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initShortcuts();
				$obj2->addShortcut($obj1);
			}

			$omClass = ContainerSlotletPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getContainerSlotlet(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addShortcut($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initShortcuts();
				$obj3->addShortcut($obj1);
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
		return ShortcutPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseShortcutPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseShortcutPeer', $values, $con);
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

		$criteria->remove(ShortcutPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseShortcutPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseShortcutPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseShortcutPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseShortcutPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ShortcutPeer::ID);
			$selectCriteria->add(ShortcutPeer::ID, $criteria->remove(ShortcutPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseShortcutPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseShortcutPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ShortcutPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ShortcutPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Shortcut) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ShortcutPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Shortcut $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ShortcutPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ShortcutPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ShortcutPeer::DATABASE_NAME, ShortcutPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ShortcutPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ShortcutPeer::DATABASE_NAME);

		$criteria->add(ShortcutPeer::ID, $pk);


		$v = ShortcutPeer::doSelect($criteria, $con);

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
			$criteria->add(ShortcutPeer::ID, $pks, Criteria::IN);
			$objs = ShortcutPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseShortcutPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ShortcutMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ShortcutMapBuilder');
}
