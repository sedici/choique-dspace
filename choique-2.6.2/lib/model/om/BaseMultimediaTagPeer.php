<?php


abstract class BaseMultimediaTagPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'multimedia_tag';

	
	const CLASS_DEFAULT = 'lib.model.MultimediaTag';

	
	const NUM_COLUMNS = 3;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const MULTIMEDIA_ID = 'multimedia_tag.MULTIMEDIA_ID';

	
	const TAG_ID = 'multimedia_tag.TAG_ID';

	
	const ID = 'multimedia_tag.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('MultimediaId', 'TagId', 'Id', ),
		BasePeer::TYPE_COLNAME => array (MultimediaTagPeer::MULTIMEDIA_ID, MultimediaTagPeer::TAG_ID, MultimediaTagPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('multimedia_id', 'tag_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('MultimediaId' => 0, 'TagId' => 1, 'Id' => 2, ),
		BasePeer::TYPE_COLNAME => array (MultimediaTagPeer::MULTIMEDIA_ID => 0, MultimediaTagPeer::TAG_ID => 1, MultimediaTagPeer::ID => 2, ),
		BasePeer::TYPE_FIELDNAME => array ('multimedia_id' => 0, 'tag_id' => 1, 'id' => 2, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MultimediaTagMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MultimediaTagMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MultimediaTagPeer::getTableMap();
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
		return str_replace(MultimediaTagPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MultimediaTagPeer::MULTIMEDIA_ID);

		$criteria->addSelectColumn(MultimediaTagPeer::TAG_ID);

		$criteria->addSelectColumn(MultimediaTagPeer::ID);

	}

	const COUNT = 'COUNT(multimedia_tag.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT multimedia_tag.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MultimediaTagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MultimediaTagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MultimediaTagPeer::doSelectRS($criteria, $con);
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
		$objects = MultimediaTagPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MultimediaTagPeer::populateObjects(MultimediaTagPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMultimediaTagPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseMultimediaTagPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MultimediaTagPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MultimediaTagPeer::getOMClass();
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
			$criteria->addSelectColumn(MultimediaTagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MultimediaTagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MultimediaTagPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = MultimediaTagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinTag(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MultimediaTagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MultimediaTagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MultimediaTagPeer::TAG_ID, TagPeer::ID);

		$rs = MultimediaTagPeer::doSelectRS($criteria, $con);
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

		MultimediaTagPeer::addSelectColumns($c);
		$startcol = (MultimediaTagPeer::NUM_COLUMNS - MultimediaTagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		MultimediaPeer::addSelectColumns($c);

		$c->addJoin(MultimediaTagPeer::MULTIMEDIA_ID, MultimediaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MultimediaTagPeer::getOMClass();

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
										$temp_obj2->addMultimediaTag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMultimediaTags();
				$obj2->addMultimediaTag($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinTag(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MultimediaTagPeer::addSelectColumns($c);
		$startcol = (MultimediaTagPeer::NUM_COLUMNS - MultimediaTagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TagPeer::addSelectColumns($c);

		$c->addJoin(MultimediaTagPeer::TAG_ID, TagPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MultimediaTagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addMultimediaTag($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMultimediaTags();
				$obj2->addMultimediaTag($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MultimediaTagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MultimediaTagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MultimediaTagPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$criteria->addJoin(MultimediaTagPeer::TAG_ID, TagPeer::ID);

		$rs = MultimediaTagPeer::doSelectRS($criteria, $con);
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

		MultimediaTagPeer::addSelectColumns($c);
		$startcol2 = (MultimediaTagPeer::NUM_COLUMNS - MultimediaTagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		TagPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + TagPeer::NUM_COLUMNS;

		$c->addJoin(MultimediaTagPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$c->addJoin(MultimediaTagPeer::TAG_ID, TagPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MultimediaTagPeer::getOMClass();


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
					$temp_obj2->addMultimediaTag($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initMultimediaTags();
				$obj2->addMultimediaTag($obj1);
			}


					
			$omClass = TagPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getTag(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addMultimediaTag($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initMultimediaTags();
				$obj3->addMultimediaTag($obj1);
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
			$criteria->addSelectColumn(MultimediaTagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MultimediaTagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MultimediaTagPeer::TAG_ID, TagPeer::ID);

		$rs = MultimediaTagPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptTag(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MultimediaTagPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MultimediaTagPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MultimediaTagPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = MultimediaTagPeer::doSelectRS($criteria, $con);
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

		MultimediaTagPeer::addSelectColumns($c);
		$startcol2 = (MultimediaTagPeer::NUM_COLUMNS - MultimediaTagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TagPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TagPeer::NUM_COLUMNS;

		$c->addJoin(MultimediaTagPeer::TAG_ID, TagPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MultimediaTagPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TagPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTag(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addMultimediaTag($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initMultimediaTags();
				$obj2->addMultimediaTag($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptTag(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MultimediaTagPeer::addSelectColumns($c);
		$startcol2 = (MultimediaTagPeer::NUM_COLUMNS - MultimediaTagPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		$c->addJoin(MultimediaTagPeer::MULTIMEDIA_ID, MultimediaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MultimediaTagPeer::getOMClass();

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
					$temp_obj2->addMultimediaTag($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initMultimediaTags();
				$obj2->addMultimediaTag($obj1);
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
		return MultimediaTagPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMultimediaTagPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseMultimediaTagPeer', $values, $con);
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

		$criteria->remove(MultimediaTagPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseMultimediaTagPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseMultimediaTagPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMultimediaTagPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseMultimediaTagPeer', $values, $con);
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
			$comparison = $criteria->getComparison(MultimediaTagPeer::ID);
			$selectCriteria->add(MultimediaTagPeer::ID, $criteria->remove(MultimediaTagPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseMultimediaTagPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseMultimediaTagPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(MultimediaTagPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MultimediaTagPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MultimediaTag) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MultimediaTagPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MultimediaTag $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MultimediaTagPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MultimediaTagPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(MultimediaTagPeer::DATABASE_NAME, MultimediaTagPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MultimediaTagPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(MultimediaTagPeer::DATABASE_NAME);

		$criteria->add(MultimediaTagPeer::ID, $pk);


		$v = MultimediaTagPeer::doSelect($criteria, $con);

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
			$criteria->add(MultimediaTagPeer::ID, $pks, Criteria::IN);
			$objs = MultimediaTagPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMultimediaTagPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MultimediaTagMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MultimediaTagMapBuilder');
}
