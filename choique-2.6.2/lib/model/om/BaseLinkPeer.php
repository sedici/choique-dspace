<?php


abstract class BaseLinkPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'link';

	
	const CLASS_DEFAULT = 'lib.model.Link';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'link.ID';

	
	const NAME = 'link.NAME';

	
	const URI = 'link.URI';

	
	const URL = 'link.URL';

	
	const CREATED_BY = 'link.CREATED_BY';

	
	const CREATED_AT = 'link.CREATED_AT';

	
	const UPDATED_BY = 'link.UPDATED_BY';

	
	const UPDATED_AT = 'link.UPDATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'Uri', 'Url', 'CreatedBy', 'CreatedAt', 'UpdatedBy', 'UpdatedAt', ),
		BasePeer::TYPE_COLNAME => array (LinkPeer::ID, LinkPeer::NAME, LinkPeer::URI, LinkPeer::URL, LinkPeer::CREATED_BY, LinkPeer::CREATED_AT, LinkPeer::UPDATED_BY, LinkPeer::UPDATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'uri', 'url', 'created_by', 'created_at', 'updated_by', 'updated_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'Uri' => 2, 'Url' => 3, 'CreatedBy' => 4, 'CreatedAt' => 5, 'UpdatedBy' => 6, 'UpdatedAt' => 7, ),
		BasePeer::TYPE_COLNAME => array (LinkPeer::ID => 0, LinkPeer::NAME => 1, LinkPeer::URI => 2, LinkPeer::URL => 3, LinkPeer::CREATED_BY => 4, LinkPeer::CREATED_AT => 5, LinkPeer::UPDATED_BY => 6, LinkPeer::UPDATED_AT => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'uri' => 2, 'url' => 3, 'created_by' => 4, 'created_at' => 5, 'updated_by' => 6, 'updated_at' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/LinkMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.LinkMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = LinkPeer::getTableMap();
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
		return str_replace(LinkPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(LinkPeer::ID);

		$criteria->addSelectColumn(LinkPeer::NAME);

		$criteria->addSelectColumn(LinkPeer::URI);

		$criteria->addSelectColumn(LinkPeer::URL);

		$criteria->addSelectColumn(LinkPeer::CREATED_BY);

		$criteria->addSelectColumn(LinkPeer::CREATED_AT);

		$criteria->addSelectColumn(LinkPeer::UPDATED_BY);

		$criteria->addSelectColumn(LinkPeer::UPDATED_AT);

	}

	const COUNT = 'COUNT(link.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT link.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LinkPeer::doSelectRS($criteria, $con);
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
		$objects = LinkPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return LinkPeer::populateObjects(LinkPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseLinkPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseLinkPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			LinkPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = LinkPeer::getOMClass();
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
			$criteria->addSelectColumn(LinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LinkPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = LinkPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LinkPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = LinkPeer::doSelectRS($criteria, $con);
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

		LinkPeer::addSelectColumns($c);
		$startcol = (LinkPeer::NUM_COLUMNS - LinkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(LinkPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LinkPeer::getOMClass();

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
										$temp_obj2->addLinkRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLinksRelatedByCreatedBy();
				$obj2->addLinkRelatedByCreatedBy($obj1); 			}
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

		LinkPeer::addSelectColumns($c);
		$startcol = (LinkPeer::NUM_COLUMNS - LinkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(LinkPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LinkPeer::getOMClass();

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
										$temp_obj2->addLinkRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initLinksRelatedByUpdatedBy();
				$obj2->addLinkRelatedByUpdatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(LinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(LinkPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(LinkPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = LinkPeer::doSelectRS($criteria, $con);
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

		LinkPeer::addSelectColumns($c);
		$startcol2 = (LinkPeer::NUM_COLUMNS - LinkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(LinkPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(LinkPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LinkPeer::getOMClass();


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
					$temp_obj2->addLinkRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initLinksRelatedByCreatedBy();
				$obj2->addLinkRelatedByCreatedBy($obj1);
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
					$temp_obj3->addLinkRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initLinksRelatedByUpdatedBy();
				$obj3->addLinkRelatedByUpdatedBy($obj1);
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
			$criteria->addSelectColumn(LinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LinkPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(LinkPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(LinkPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = LinkPeer::doSelectRS($criteria, $con);
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

		LinkPeer::addSelectColumns($c);
		$startcol2 = (LinkPeer::NUM_COLUMNS - LinkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LinkPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

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

		LinkPeer::addSelectColumns($c);
		$startcol2 = (LinkPeer::NUM_COLUMNS - LinkPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = LinkPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

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
		return LinkPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseLinkPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseLinkPeer', $values, $con);
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

		$criteria->remove(LinkPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseLinkPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseLinkPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseLinkPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseLinkPeer', $values, $con);
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
			$comparison = $criteria->getComparison(LinkPeer::ID);
			$selectCriteria->add(LinkPeer::ID, $criteria->remove(LinkPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseLinkPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseLinkPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(LinkPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(LinkPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Link) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(LinkPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Link $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(LinkPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(LinkPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(LinkPeer::DATABASE_NAME, LinkPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = LinkPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(LinkPeer::DATABASE_NAME);

		$criteria->add(LinkPeer::ID, $pk);


		$v = LinkPeer::doSelect($criteria, $con);

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
			$criteria->add(LinkPeer::ID, $pks, Criteria::IN);
			$objs = LinkPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseLinkPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/LinkMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.LinkMapBuilder');
}
