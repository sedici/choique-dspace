<?php


abstract class BaseLinkGroupLinkPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'link_group_link';

	
	const CLASS_DEFAULT = 'lib.model.LinkGroupLink';

	
	const NUM_COLUMNS = 3;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const LINK_GROUP_ID = 'link_group_link.LINK_GROUP_ID';

	
	const LINK_ID = 'link_group_link.LINK_ID';

	
	const ID = 'link_group_link.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('LinkGroupId', 'LinkId', 'Id', ),
		BasePeer::TYPE_COLNAME => array (LinkGroupLinkPeer::LINK_GROUP_ID, LinkGroupLinkPeer::LINK_ID, LinkGroupLinkPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('link_group_id', 'link_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('LinkGroupId' => 0, 'LinkId' => 1, 'Id' => 2, ),
		BasePeer::TYPE_COLNAME => array (LinkGroupLinkPeer::LINK_GROUP_ID => 0, LinkGroupLinkPeer::LINK_ID => 1, LinkGroupLinkPeer::ID => 2, ),
		BasePeer::TYPE_FIELDNAME => array ('link_group_id' => 0, 'link_id' => 1, 'id' => 2, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LinkGroupLinkMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LinkGroupLinkMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LinkGroupLinkPeer::getTableMap();
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
		return str_replace(LinkGroupLinkPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LinkGroupLinkPeer::LINK_GROUP_ID);

		$criteria->addSelectColumn(LinkGroupLinkPeer::LINK_ID);

		$criteria->addSelectColumn(LinkGroupLinkPeer::ID);

	}

	const COUNT = 'COUNT(link_group_link.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT link_group_link.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LinkGroupLinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinkGroupLinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LinkGroupLinkPeer::doSelectRS($criteria, $con);
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
		$objects = LinkGroupLinkPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LinkGroupLinkPeer::populateObjects(LinkGroupLinkPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseLinkGroupLinkPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseLinkGroupLinkPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LinkGroupLinkPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LinkGroupLinkPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinLinkGroup(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LinkGroupLinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinkGroupLinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LinkGroupLinkPeer::LINK_GROUP_ID, LinkGroupPeer::ID);

		$rs = LinkGroupLinkPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LinkGroupLinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinkGroupLinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LinkGroupLinkPeer::LINK_ID, LinkPeer::ID);

		$rs = LinkGroupLinkPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinLinkGroup(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LinkGroupLinkPeer::addSelectColumns($c);
		$startcol = (LinkGroupLinkPeer::NUM_COLUMNS - LinkGroupLinkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LinkGroupPeer::addSelectColumns($c);

		$c->addJoin(LinkGroupLinkPeer::LINK_GROUP_ID, LinkGroupPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LinkGroupLinkPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LinkGroupPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLinkGroup(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addLinkGroupLink($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLinkGroupLinks();
				$obj2->addLinkGroupLink($obj1); 			}
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

		LinkGroupLinkPeer::addSelectColumns($c);
		$startcol = (LinkGroupLinkPeer::NUM_COLUMNS - LinkGroupLinkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LinkPeer::addSelectColumns($c);

		$c->addJoin(LinkGroupLinkPeer::LINK_ID, LinkPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LinkGroupLinkPeer::getOMClass();

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
										$temp_obj2->addLinkGroupLink($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLinkGroupLinks();
				$obj2->addLinkGroupLink($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LinkGroupLinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinkGroupLinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LinkGroupLinkPeer::LINK_GROUP_ID, LinkGroupPeer::ID);

		$criteria->addJoin(LinkGroupLinkPeer::LINK_ID, LinkPeer::ID);

		$rs = LinkGroupLinkPeer::doSelectRS($criteria, $con);
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

		LinkGroupLinkPeer::addSelectColumns($c);
		$startcol2 = (LinkGroupLinkPeer::NUM_COLUMNS - LinkGroupLinkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LinkGroupPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LinkGroupPeer::NUM_COLUMNS;

		LinkPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LinkPeer::NUM_COLUMNS;

		$c->addJoin(LinkGroupLinkPeer::LINK_GROUP_ID, LinkGroupPeer::ID);

		$c->addJoin(LinkGroupLinkPeer::LINK_ID, LinkPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LinkGroupLinkPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = LinkGroupPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLinkGroup(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLinkGroupLink($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initLinkGroupLinks();
				$obj2->addLinkGroupLink($obj1);
			}


					
			$omClass = LinkPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLink(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addLinkGroupLink($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initLinkGroupLinks();
				$obj3->addLinkGroupLink($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptLinkGroup(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LinkGroupLinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinkGroupLinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LinkGroupLinkPeer::LINK_ID, LinkPeer::ID);

		$rs = LinkGroupLinkPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LinkGroupLinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinkGroupLinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LinkGroupLinkPeer::LINK_GROUP_ID, LinkGroupPeer::ID);

		$rs = LinkGroupLinkPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptLinkGroup(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		LinkGroupLinkPeer::addSelectColumns($c);
		$startcol2 = (LinkGroupLinkPeer::NUM_COLUMNS - LinkGroupLinkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LinkPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LinkPeer::NUM_COLUMNS;

		$c->addJoin(LinkGroupLinkPeer::LINK_ID, LinkPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LinkGroupLinkPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LinkPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLink(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLinkGroupLink($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initLinkGroupLinks();
				$obj2->addLinkGroupLink($obj1);
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

		LinkGroupLinkPeer::addSelectColumns($c);
		$startcol2 = (LinkGroupLinkPeer::NUM_COLUMNS - LinkGroupLinkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LinkGroupPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LinkGroupPeer::NUM_COLUMNS;

		$c->addJoin(LinkGroupLinkPeer::LINK_GROUP_ID, LinkGroupPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LinkGroupLinkPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LinkGroupPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLinkGroup(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addLinkGroupLink($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initLinkGroupLinks();
				$obj2->addLinkGroupLink($obj1);
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
		return LinkGroupLinkPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseLinkGroupLinkPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseLinkGroupLinkPeer', $values, $con);
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

		$criteria->remove(LinkGroupLinkPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseLinkGroupLinkPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseLinkGroupLinkPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseLinkGroupLinkPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseLinkGroupLinkPeer', $values, $con);
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
			$comparison = $criteria->getComparison(LinkGroupLinkPeer::ID);
			$selectCriteria->add(LinkGroupLinkPeer::ID, $criteria->remove(LinkGroupLinkPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseLinkGroupLinkPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseLinkGroupLinkPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(LinkGroupLinkPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LinkGroupLinkPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof LinkGroupLink) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LinkGroupLinkPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(LinkGroupLink $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LinkGroupLinkPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LinkGroupLinkPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LinkGroupLinkPeer::DATABASE_NAME, LinkGroupLinkPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LinkGroupLinkPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LinkGroupLinkPeer::DATABASE_NAME);

		$criteria->add(LinkGroupLinkPeer::ID, $pk);


		$v = LinkGroupLinkPeer::doSelect($criteria, $con);

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
			$criteria->add(LinkGroupLinkPeer::ID, $pks, Criteria::IN);
			$objs = LinkGroupLinkPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLinkGroupLinkPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LinkGroupLinkMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LinkGroupLinkMapBuilder');
}
