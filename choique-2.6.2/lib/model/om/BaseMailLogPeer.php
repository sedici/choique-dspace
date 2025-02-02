<?php


abstract class BaseMailLogPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'mail_log';

	
	const CLASS_DEFAULT = 'lib.model.MailLog';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'mail_log.ID';

	
	const MAIL_FROM = 'mail_log.MAIL_FROM';

	
	const MAIL_TO = 'mail_log.MAIL_TO';

	
	const SUBJECT = 'mail_log.SUBJECT';

	
	const BODY = 'mail_log.BODY';

	
	const SENDER_NAME = 'mail_log.SENDER_NAME';

	
	const SECTION_NAME = 'mail_log.SECTION_NAME';

	
	const ARTICLE_NAME = 'mail_log.ARTICLE_NAME';

	
	const CREATED_AT = 'mail_log.CREATED_AT';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'MailFrom', 'MailTo', 'Subject', 'Body', 'SenderName', 'SectionName', 'ArticleName', 'CreatedAt', ),
		BasePeer::TYPE_COLNAME => array (MailLogPeer::ID, MailLogPeer::MAIL_FROM, MailLogPeer::MAIL_TO, MailLogPeer::SUBJECT, MailLogPeer::BODY, MailLogPeer::SENDER_NAME, MailLogPeer::SECTION_NAME, MailLogPeer::ARTICLE_NAME, MailLogPeer::CREATED_AT, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'mail_from', 'mail_to', 'subject', 'body', 'sender_name', 'section_name', 'article_name', 'created_at', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'MailFrom' => 1, 'MailTo' => 2, 'Subject' => 3, 'Body' => 4, 'SenderName' => 5, 'SectionName' => 6, 'ArticleName' => 7, 'CreatedAt' => 8, ),
		BasePeer::TYPE_COLNAME => array (MailLogPeer::ID => 0, MailLogPeer::MAIL_FROM => 1, MailLogPeer::MAIL_TO => 2, MailLogPeer::SUBJECT => 3, MailLogPeer::BODY => 4, MailLogPeer::SENDER_NAME => 5, MailLogPeer::SECTION_NAME => 6, MailLogPeer::ARTICLE_NAME => 7, MailLogPeer::CREATED_AT => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'mail_from' => 1, 'mail_to' => 2, 'subject' => 3, 'body' => 4, 'sender_name' => 5, 'section_name' => 6, 'article_name' => 7, 'created_at' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MailLogMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MailLogMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MailLogPeer::getTableMap();
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
		return str_replace(MailLogPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MailLogPeer::ID);

		$criteria->addSelectColumn(MailLogPeer::MAIL_FROM);

		$criteria->addSelectColumn(MailLogPeer::MAIL_TO);

		$criteria->addSelectColumn(MailLogPeer::SUBJECT);

		$criteria->addSelectColumn(MailLogPeer::BODY);

		$criteria->addSelectColumn(MailLogPeer::SENDER_NAME);

		$criteria->addSelectColumn(MailLogPeer::SECTION_NAME);

		$criteria->addSelectColumn(MailLogPeer::ARTICLE_NAME);

		$criteria->addSelectColumn(MailLogPeer::CREATED_AT);

	}

	const COUNT = 'COUNT(mail_log.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT mail_log.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MailLogPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MailLogPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MailLogPeer::doSelectRS($criteria, $con);
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
		$objects = MailLogPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MailLogPeer::populateObjects(MailLogPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMailLogPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseMailLogPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MailLogPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MailLogPeer::getOMClass();
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
		return MailLogPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMailLogPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseMailLogPeer', $values, $con);
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

		$criteria->remove(MailLogPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseMailLogPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseMailLogPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMailLogPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseMailLogPeer', $values, $con);
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
			$comparison = $criteria->getComparison(MailLogPeer::ID);
			$selectCriteria->add(MailLogPeer::ID, $criteria->remove(MailLogPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseMailLogPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseMailLogPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(MailLogPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MailLogPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof MailLog) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MailLogPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(MailLog $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MailLogPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MailLogPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(MailLogPeer::DATABASE_NAME, MailLogPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MailLogPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(MailLogPeer::DATABASE_NAME);

		$criteria->add(MailLogPeer::ID, $pk);


		$v = MailLogPeer::doSelect($criteria, $con);

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
			$criteria->add(MailLogPeer::ID, $pks, Criteria::IN);
			$objs = MailLogPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMailLogPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MailLogMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MailLogMapBuilder');
}
