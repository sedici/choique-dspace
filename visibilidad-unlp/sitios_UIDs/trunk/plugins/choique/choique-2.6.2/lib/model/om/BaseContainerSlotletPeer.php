<?php


abstract class BaseContainerSlotletPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'container_slotlet';

	
	const CLASS_DEFAULT = 'lib.model.ContainerSlotlet';

	
	const NUM_COLUMNS = 7;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'container_slotlet.ID';

	
	const CONTAINER_ID = 'container_slotlet.CONTAINER_ID';

	
	const SLOTLET_ID = 'container_slotlet.SLOTLET_ID';

	
	const NAME = 'container_slotlet.NAME';

	
	const PRIORITY = 'container_slotlet.PRIORITY';

	
	const RSS_CHANNEL_ID = 'container_slotlet.RSS_CHANNEL_ID';

	
	const VISIBLE_RSS = 'container_slotlet.VISIBLE_RSS';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'ContainerId', 'SlotletId', 'Name', 'Priority', 'RssChannelId', 'VisibleRss', ),
		BasePeer::TYPE_COLNAME => array (ContainerSlotletPeer::ID, ContainerSlotletPeer::CONTAINER_ID, ContainerSlotletPeer::SLOTLET_ID, ContainerSlotletPeer::NAME, ContainerSlotletPeer::PRIORITY, ContainerSlotletPeer::RSS_CHANNEL_ID, ContainerSlotletPeer::VISIBLE_RSS, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'container_id', 'slotlet_id', 'name', 'priority', 'rss_channel_id', 'visible_rss', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'ContainerId' => 1, 'SlotletId' => 2, 'Name' => 3, 'Priority' => 4, 'RssChannelId' => 5, 'VisibleRss' => 6, ),
		BasePeer::TYPE_COLNAME => array (ContainerSlotletPeer::ID => 0, ContainerSlotletPeer::CONTAINER_ID => 1, ContainerSlotletPeer::SLOTLET_ID => 2, ContainerSlotletPeer::NAME => 3, ContainerSlotletPeer::PRIORITY => 4, ContainerSlotletPeer::RSS_CHANNEL_ID => 5, ContainerSlotletPeer::VISIBLE_RSS => 6, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'container_id' => 1, 'slotlet_id' => 2, 'name' => 3, 'priority' => 4, 'rss_channel_id' => 5, 'visible_rss' => 6, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ContainerSlotletMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ContainerSlotletMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ContainerSlotletPeer::getTableMap();
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
		return str_replace(ContainerSlotletPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ContainerSlotletPeer::ID);

		$criteria->addSelectColumn(ContainerSlotletPeer::CONTAINER_ID);

		$criteria->addSelectColumn(ContainerSlotletPeer::SLOTLET_ID);

		$criteria->addSelectColumn(ContainerSlotletPeer::NAME);

		$criteria->addSelectColumn(ContainerSlotletPeer::PRIORITY);

		$criteria->addSelectColumn(ContainerSlotletPeer::RSS_CHANNEL_ID);

		$criteria->addSelectColumn(ContainerSlotletPeer::VISIBLE_RSS);

	}

	const COUNT = 'COUNT(container_slotlet.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT container_slotlet.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ContainerSlotletPeer::doSelectRS($criteria, $con);
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
		$objects = ContainerSlotletPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ContainerSlotletPeer::populateObjects(ContainerSlotletPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContainerSlotletPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseContainerSlotletPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ContainerSlotletPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ContainerSlotletPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinContainer(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ContainerSlotletPeer::CONTAINER_ID, ContainerPeer::ID);

		$rs = ContainerSlotletPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinSlotlet(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ContainerSlotletPeer::SLOTLET_ID, SlotletPeer::ID);

		$rs = ContainerSlotletPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinRssChannel(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ContainerSlotletPeer::RSS_CHANNEL_ID, RssChannelPeer::ID);

		$rs = ContainerSlotletPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinContainer(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ContainerSlotletPeer::addSelectColumns($c);
		$startcol = (ContainerSlotletPeer::NUM_COLUMNS - ContainerSlotletPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ContainerPeer::addSelectColumns($c);

		$c->addJoin(ContainerSlotletPeer::CONTAINER_ID, ContainerPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ContainerSlotletPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ContainerPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getContainer(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addContainerSlotlet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initContainerSlotlets();
				$obj2->addContainerSlotlet($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinSlotlet(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ContainerSlotletPeer::addSelectColumns($c);
		$startcol = (ContainerSlotletPeer::NUM_COLUMNS - ContainerSlotletPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SlotletPeer::addSelectColumns($c);

		$c->addJoin(ContainerSlotletPeer::SLOTLET_ID, SlotletPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ContainerSlotletPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SlotletPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getSlotlet(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addContainerSlotlet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initContainerSlotlets();
				$obj2->addContainerSlotlet($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinRssChannel(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ContainerSlotletPeer::addSelectColumns($c);
		$startcol = (ContainerSlotletPeer::NUM_COLUMNS - ContainerSlotletPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		RssChannelPeer::addSelectColumns($c);

		$c->addJoin(ContainerSlotletPeer::RSS_CHANNEL_ID, RssChannelPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ContainerSlotletPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = RssChannelPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getRssChannel(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addContainerSlotlet($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initContainerSlotlets();
				$obj2->addContainerSlotlet($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ContainerSlotletPeer::CONTAINER_ID, ContainerPeer::ID);

		$criteria->addJoin(ContainerSlotletPeer::SLOTLET_ID, SlotletPeer::ID);

		$criteria->addJoin(ContainerSlotletPeer::RSS_CHANNEL_ID, RssChannelPeer::ID);

		$rs = ContainerSlotletPeer::doSelectRS($criteria, $con);
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

		ContainerSlotletPeer::addSelectColumns($c);
		$startcol2 = (ContainerSlotletPeer::NUM_COLUMNS - ContainerSlotletPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ContainerPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ContainerPeer::NUM_COLUMNS;

		SlotletPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + SlotletPeer::NUM_COLUMNS;

		RssChannelPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + RssChannelPeer::NUM_COLUMNS;

		$c->addJoin(ContainerSlotletPeer::CONTAINER_ID, ContainerPeer::ID);

		$c->addJoin(ContainerSlotletPeer::SLOTLET_ID, SlotletPeer::ID);

		$c->addJoin(ContainerSlotletPeer::RSS_CHANNEL_ID, RssChannelPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ContainerSlotletPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ContainerPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getContainer(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addContainerSlotlet($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initContainerSlotlets();
				$obj2->addContainerSlotlet($obj1);
			}


					
			$omClass = SlotletPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getSlotlet(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addContainerSlotlet($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initContainerSlotlets();
				$obj3->addContainerSlotlet($obj1);
			}


					
			$omClass = RssChannelPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj4 = new $cls();
			$obj4->hydrate($rs, $startcol4);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj4 = $temp_obj1->getRssChannel(); 				if ($temp_obj4->getPrimaryKey() === $obj4->getPrimaryKey()) {
					$newObject = false;
					$temp_obj4->addContainerSlotlet($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj4->initContainerSlotlets();
				$obj4->addContainerSlotlet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptContainer(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ContainerSlotletPeer::SLOTLET_ID, SlotletPeer::ID);

		$criteria->addJoin(ContainerSlotletPeer::RSS_CHANNEL_ID, RssChannelPeer::ID);

		$rs = ContainerSlotletPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptSlotlet(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ContainerSlotletPeer::CONTAINER_ID, ContainerPeer::ID);

		$criteria->addJoin(ContainerSlotletPeer::RSS_CHANNEL_ID, RssChannelPeer::ID);

		$rs = ContainerSlotletPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptRssChannel(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ContainerSlotletPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ContainerSlotletPeer::CONTAINER_ID, ContainerPeer::ID);

		$criteria->addJoin(ContainerSlotletPeer::SLOTLET_ID, SlotletPeer::ID);

		$rs = ContainerSlotletPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptContainer(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ContainerSlotletPeer::addSelectColumns($c);
		$startcol2 = (ContainerSlotletPeer::NUM_COLUMNS - ContainerSlotletPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SlotletPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SlotletPeer::NUM_COLUMNS;

		RssChannelPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + RssChannelPeer::NUM_COLUMNS;

		$c->addJoin(ContainerSlotletPeer::SLOTLET_ID, SlotletPeer::ID);

		$c->addJoin(ContainerSlotletPeer::RSS_CHANNEL_ID, RssChannelPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ContainerSlotletPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SlotletPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSlotlet(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addContainerSlotlet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initContainerSlotlets();
				$obj2->addContainerSlotlet($obj1);
			}

			$omClass = RssChannelPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getRssChannel(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addContainerSlotlet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initContainerSlotlets();
				$obj3->addContainerSlotlet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptSlotlet(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ContainerSlotletPeer::addSelectColumns($c);
		$startcol2 = (ContainerSlotletPeer::NUM_COLUMNS - ContainerSlotletPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ContainerPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ContainerPeer::NUM_COLUMNS;

		RssChannelPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + RssChannelPeer::NUM_COLUMNS;

		$c->addJoin(ContainerSlotletPeer::CONTAINER_ID, ContainerPeer::ID);

		$c->addJoin(ContainerSlotletPeer::RSS_CHANNEL_ID, RssChannelPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ContainerSlotletPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ContainerPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getContainer(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addContainerSlotlet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initContainerSlotlets();
				$obj2->addContainerSlotlet($obj1);
			}

			$omClass = RssChannelPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getRssChannel(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addContainerSlotlet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initContainerSlotlets();
				$obj3->addContainerSlotlet($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptRssChannel(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ContainerSlotletPeer::addSelectColumns($c);
		$startcol2 = (ContainerSlotletPeer::NUM_COLUMNS - ContainerSlotletPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ContainerPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ContainerPeer::NUM_COLUMNS;

		SlotletPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + SlotletPeer::NUM_COLUMNS;

		$c->addJoin(ContainerSlotletPeer::CONTAINER_ID, ContainerPeer::ID);

		$c->addJoin(ContainerSlotletPeer::SLOTLET_ID, SlotletPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ContainerSlotletPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ContainerPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getContainer(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addContainerSlotlet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initContainerSlotlets();
				$obj2->addContainerSlotlet($obj1);
			}

			$omClass = SlotletPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3  = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getSlotlet(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addContainerSlotlet($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj3->initContainerSlotlets();
				$obj3->addContainerSlotlet($obj1);
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
		return ContainerSlotletPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContainerSlotletPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseContainerSlotletPeer', $values, $con);
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

		$criteria->remove(ContainerSlotletPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseContainerSlotletPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseContainerSlotletPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseContainerSlotletPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseContainerSlotletPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ContainerSlotletPeer::ID);
			$selectCriteria->add(ContainerSlotletPeer::ID, $criteria->remove(ContainerSlotletPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseContainerSlotletPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseContainerSlotletPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ContainerSlotletPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ContainerSlotletPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ContainerSlotlet) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ContainerSlotletPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ContainerSlotlet $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ContainerSlotletPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ContainerSlotletPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ContainerSlotletPeer::DATABASE_NAME, ContainerSlotletPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ContainerSlotletPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ContainerSlotletPeer::DATABASE_NAME);

		$criteria->add(ContainerSlotletPeer::ID, $pk);


		$v = ContainerSlotletPeer::doSelect($criteria, $con);

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
			$criteria->add(ContainerSlotletPeer::ID, $pks, Criteria::IN);
			$objs = ContainerSlotletPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseContainerSlotletPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ContainerSlotletMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ContainerSlotletMapBuilder');
}
