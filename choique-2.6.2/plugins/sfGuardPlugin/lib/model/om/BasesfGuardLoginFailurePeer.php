<?php


abstract class BasesfGuardLoginFailurePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_guard_login_failure';

	
	const CLASS_DEFAULT = 'plugins.sfGuardPlugin.lib.model.sfGuardLoginFailure';

	
	const NUM_COLUMNS = 5;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const USERNAME = 'sf_guard_login_failure.USERNAME';

	
	const IP_ADDRESS = 'sf_guard_login_failure.IP_ADDRESS';

	
	const COOKIE_ID = 'sf_guard_login_failure.COOKIE_ID';

	
	const AT = 'sf_guard_login_failure.AT';

	
	const ID = 'sf_guard_login_failure.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Username', 'IpAddress', 'CookieId', 'At', 'Id', ),
		BasePeer::TYPE_COLNAME => array (sfGuardLoginFailurePeer::USERNAME, sfGuardLoginFailurePeer::IP_ADDRESS, sfGuardLoginFailurePeer::COOKIE_ID, sfGuardLoginFailurePeer::AT, sfGuardLoginFailurePeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('username', 'ip_address', 'cookie_id', 'at', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Username' => 0, 'IpAddress' => 1, 'CookieId' => 2, 'At' => 3, 'Id' => 4, ),
		BasePeer::TYPE_COLNAME => array (sfGuardLoginFailurePeer::USERNAME => 0, sfGuardLoginFailurePeer::IP_ADDRESS => 1, sfGuardLoginFailurePeer::COOKIE_ID => 2, sfGuardLoginFailurePeer::AT => 3, sfGuardLoginFailurePeer::ID => 4, ),
		BasePeer::TYPE_FIELDNAME => array ('username' => 0, 'ip_address' => 1, 'cookie_id' => 2, 'at' => 3, 'id' => 4, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'plugins/sfGuardPlugin/lib/model/map/sfGuardLoginFailureMapBuilder.php';
		return BasePeer::getMapBuilder('plugins.sfGuardPlugin.lib.model.map.sfGuardLoginFailureMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfGuardLoginFailurePeer::getTableMap();
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
		return str_replace(sfGuardLoginFailurePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfGuardLoginFailurePeer::USERNAME);

		$criteria->addSelectColumn(sfGuardLoginFailurePeer::IP_ADDRESS);

		$criteria->addSelectColumn(sfGuardLoginFailurePeer::COOKIE_ID);

		$criteria->addSelectColumn(sfGuardLoginFailurePeer::AT);

		$criteria->addSelectColumn(sfGuardLoginFailurePeer::ID);

	}

	const COUNT = 'COUNT(sf_guard_login_failure.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_guard_login_failure.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardLoginFailurePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardLoginFailurePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfGuardLoginFailurePeer::doSelectRS($criteria, $con);
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
		$objects = sfGuardLoginFailurePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfGuardLoginFailurePeer::populateObjects(sfGuardLoginFailurePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardLoginFailurePeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfGuardLoginFailurePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfGuardLoginFailurePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfGuardLoginFailurePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return sfGuardLoginFailurePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardLoginFailurePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfGuardLoginFailurePeer', $values, $con);
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

		$criteria->remove(sfGuardLoginFailurePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfGuardLoginFailurePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfGuardLoginFailurePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardLoginFailurePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfGuardLoginFailurePeer', $values, $con);
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
			$comparison = $criteria->getComparison(sfGuardLoginFailurePeer::ID);
			$selectCriteria->add(sfGuardLoginFailurePeer::ID, $criteria->remove(sfGuardLoginFailurePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfGuardLoginFailurePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfGuardLoginFailurePeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(sfGuardLoginFailurePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(sfGuardLoginFailurePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfGuardLoginFailure) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfGuardLoginFailurePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(sfGuardLoginFailure $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfGuardLoginFailurePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfGuardLoginFailurePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfGuardLoginFailurePeer::DATABASE_NAME, sfGuardLoginFailurePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfGuardLoginFailurePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(sfGuardLoginFailurePeer::DATABASE_NAME);

		$criteria->add(sfGuardLoginFailurePeer::ID, $pk);


		$v = sfGuardLoginFailurePeer::doSelect($criteria, $con);

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
			$criteria->add(sfGuardLoginFailurePeer::ID, $pks, Criteria::IN);
			$objs = sfGuardLoginFailurePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasesfGuardLoginFailurePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'plugins/sfGuardPlugin/lib/model/map/sfGuardLoginFailureMapBuilder.php';
	Propel::registerMapBuilder('plugins.sfGuardPlugin.lib.model.map.sfGuardLoginFailureMapBuilder');
}
