<?php


abstract class BasesfGuardUserPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_guard_user';

	
	const CLASS_DEFAULT = 'plugins.sfGuardPlugin.lib.model.sfGuardUser';

	
	const NUM_COLUMNS = 14;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'sf_guard_user.ID';

	
	const NAME = 'sf_guard_user.NAME';

	
	const EMAIL = 'sf_guard_user.EMAIL';

	
	const USERNAME = 'sf_guard_user.USERNAME';

	
	const ALGORITHM = 'sf_guard_user.ALGORITHM';

	
	const SALT = 'sf_guard_user.SALT';

	
	const PASSWORD = 'sf_guard_user.PASSWORD';

	
	const CREATED_AT = 'sf_guard_user.CREATED_AT';

	
	const LAST_LOGIN = 'sf_guard_user.LAST_LOGIN';

	
	const IS_ACTIVE = 'sf_guard_user.IS_ACTIVE';

	
	const IS_SUPER_ADMIN = 'sf_guard_user.IS_SUPER_ADMIN';

	
	const CHANGE_PASSWORD_AT = 'sf_guard_user.CHANGE_PASSWORD_AT';

	
	const MUST_CHANGE_PASSWORD = 'sf_guard_user.MUST_CHANGE_PASSWORD';

	
	const SECTION_ID = 'sf_guard_user.SECTION_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'Email', 'Username', 'Algorithm', 'Salt', 'Password', 'CreatedAt', 'LastLogin', 'IsActive', 'IsSuperAdmin', 'ChangePasswordAt', 'MustChangePassword', 'SectionId', ),
		BasePeer::TYPE_COLNAME => array (sfGuardUserPeer::ID, sfGuardUserPeer::NAME, sfGuardUserPeer::EMAIL, sfGuardUserPeer::USERNAME, sfGuardUserPeer::ALGORITHM, sfGuardUserPeer::SALT, sfGuardUserPeer::PASSWORD, sfGuardUserPeer::CREATED_AT, sfGuardUserPeer::LAST_LOGIN, sfGuardUserPeer::IS_ACTIVE, sfGuardUserPeer::IS_SUPER_ADMIN, sfGuardUserPeer::CHANGE_PASSWORD_AT, sfGuardUserPeer::MUST_CHANGE_PASSWORD, sfGuardUserPeer::SECTION_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'email', 'username', 'algorithm', 'salt', 'password', 'created_at', 'last_login', 'is_active', 'is_super_admin', 'change_password_at', 'must_change_password', 'section_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'Email' => 2, 'Username' => 3, 'Algorithm' => 4, 'Salt' => 5, 'Password' => 6, 'CreatedAt' => 7, 'LastLogin' => 8, 'IsActive' => 9, 'IsSuperAdmin' => 10, 'ChangePasswordAt' => 11, 'MustChangePassword' => 12, 'SectionId' => 13, ),
		BasePeer::TYPE_COLNAME => array (sfGuardUserPeer::ID => 0, sfGuardUserPeer::NAME => 1, sfGuardUserPeer::EMAIL => 2, sfGuardUserPeer::USERNAME => 3, sfGuardUserPeer::ALGORITHM => 4, sfGuardUserPeer::SALT => 5, sfGuardUserPeer::PASSWORD => 6, sfGuardUserPeer::CREATED_AT => 7, sfGuardUserPeer::LAST_LOGIN => 8, sfGuardUserPeer::IS_ACTIVE => 9, sfGuardUserPeer::IS_SUPER_ADMIN => 10, sfGuardUserPeer::CHANGE_PASSWORD_AT => 11, sfGuardUserPeer::MUST_CHANGE_PASSWORD => 12, sfGuardUserPeer::SECTION_ID => 13, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'email' => 2, 'username' => 3, 'algorithm' => 4, 'salt' => 5, 'password' => 6, 'created_at' => 7, 'last_login' => 8, 'is_active' => 9, 'is_super_admin' => 10, 'change_password_at' => 11, 'must_change_password' => 12, 'section_id' => 13, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'plugins/sfGuardPlugin/lib/model/map/sfGuardUserMapBuilder.php';
		return BasePeer::getMapBuilder('plugins.sfGuardPlugin.lib.model.map.sfGuardUserMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = sfGuardUserPeer::getTableMap();
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
		return str_replace(sfGuardUserPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(sfGuardUserPeer::ID);

		$criteria->addSelectColumn(sfGuardUserPeer::NAME);

		$criteria->addSelectColumn(sfGuardUserPeer::EMAIL);

		$criteria->addSelectColumn(sfGuardUserPeer::USERNAME);

		$criteria->addSelectColumn(sfGuardUserPeer::ALGORITHM);

		$criteria->addSelectColumn(sfGuardUserPeer::SALT);

		$criteria->addSelectColumn(sfGuardUserPeer::PASSWORD);

		$criteria->addSelectColumn(sfGuardUserPeer::CREATED_AT);

		$criteria->addSelectColumn(sfGuardUserPeer::LAST_LOGIN);

		$criteria->addSelectColumn(sfGuardUserPeer::IS_ACTIVE);

		$criteria->addSelectColumn(sfGuardUserPeer::IS_SUPER_ADMIN);

		$criteria->addSelectColumn(sfGuardUserPeer::CHANGE_PASSWORD_AT);

		$criteria->addSelectColumn(sfGuardUserPeer::MUST_CHANGE_PASSWORD);

		$criteria->addSelectColumn(sfGuardUserPeer::SECTION_ID);

	}

	const COUNT = 'COUNT(sf_guard_user.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_guard_user.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = sfGuardUserPeer::doSelectRS($criteria, $con);
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
		$objects = sfGuardUserPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return sfGuardUserPeer::populateObjects(sfGuardUserPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			sfGuardUserPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = sfGuardUserPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinSection(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserPeer::SECTION_ID, SectionPeer::ID);

		$rs = sfGuardUserPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinSection(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		sfGuardUserPeer::addSelectColumns($c);
		$startcol = (sfGuardUserPeer::NUM_COLUMNS - sfGuardUserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SectionPeer::addSelectColumns($c);

		$c->addJoin(sfGuardUserPeer::SECTION_ID, SectionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserPeer::getOMClass();

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
										$temp_obj2->addsfGuardUser($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initsfGuardUsers();
				$obj2->addsfGuardUser($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(sfGuardUserPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(sfGuardUserPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(sfGuardUserPeer::SECTION_ID, SectionPeer::ID);

		$rs = sfGuardUserPeer::doSelectRS($criteria, $con);
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

		sfGuardUserPeer::addSelectColumns($c);
		$startcol2 = (sfGuardUserPeer::NUM_COLUMNS - sfGuardUserPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SectionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SectionPeer::NUM_COLUMNS;

		$c->addJoin(sfGuardUserPeer::SECTION_ID, SectionPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = sfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = SectionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSection(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addsfGuardUser($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initsfGuardUsers();
				$obj2->addsfGuardUser($obj1);
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
		return sfGuardUserPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfGuardUserPeer', $values, $con);
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

		$criteria->remove(sfGuardUserPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BasesfGuardUserPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUserPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BasesfGuardUserPeer', $values, $con);
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
			$comparison = $criteria->getComparison(sfGuardUserPeer::ID);
			$selectCriteria->add(sfGuardUserPeer::ID, $criteria->remove(sfGuardUserPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BasesfGuardUserPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BasesfGuardUserPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(sfGuardUserPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof sfGuardUser) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(sfGuardUserPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(sfGuardUser $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(sfGuardUserPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(sfGuardUserPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(sfGuardUserPeer::DATABASE_NAME, sfGuardUserPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = sfGuardUserPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);

		$criteria->add(sfGuardUserPeer::ID, $pk);


		$v = sfGuardUserPeer::doSelect($criteria, $con);

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
			$criteria->add(sfGuardUserPeer::ID, $pks, Criteria::IN);
			$objs = sfGuardUserPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasesfGuardUserPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'plugins/sfGuardPlugin/lib/model/map/sfGuardUserMapBuilder.php';
	Propel::registerMapBuilder('plugins.sfGuardPlugin.lib.model.map.sfGuardUserMapBuilder');
}
