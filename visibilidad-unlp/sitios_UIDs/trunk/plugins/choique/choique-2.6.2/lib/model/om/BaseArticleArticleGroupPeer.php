<?php


abstract class BaseArticleArticleGroupPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'article_article_group';

	
	const CLASS_DEFAULT = 'lib.model.ArticleArticleGroup';

	
	const NUM_COLUMNS = 4;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ARTICLE_ID = 'article_article_group.ARTICLE_ID';

	
	const ARTICLE_GROUP_ID = 'article_article_group.ARTICLE_GROUP_ID';

	
	const PRIORITY = 'article_article_group.PRIORITY';

	
	const ID = 'article_article_group.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('ArticleId', 'ArticleGroupId', 'Priority', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ArticleArticleGroupPeer::ARTICLE_ID, ArticleArticleGroupPeer::ARTICLE_GROUP_ID, ArticleArticleGroupPeer::PRIORITY, ArticleArticleGroupPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('article_id', 'article_group_id', 'priority', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('ArticleId' => 0, 'ArticleGroupId' => 1, 'Priority' => 2, 'Id' => 3, ),
		BasePeer::TYPE_COLNAME => array (ArticleArticleGroupPeer::ARTICLE_ID => 0, ArticleArticleGroupPeer::ARTICLE_GROUP_ID => 1, ArticleArticleGroupPeer::PRIORITY => 2, ArticleArticleGroupPeer::ID => 3, ),
		BasePeer::TYPE_FIELDNAME => array ('article_id' => 0, 'article_group_id' => 1, 'priority' => 2, 'id' => 3, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ArticleArticleGroupMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ArticleArticleGroupMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ArticleArticleGroupPeer::getTableMap();
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
		return str_replace(ArticleArticleGroupPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ArticleArticleGroupPeer::ARTICLE_ID);

		$criteria->addSelectColumn(ArticleArticleGroupPeer::ARTICLE_GROUP_ID);

		$criteria->addSelectColumn(ArticleArticleGroupPeer::PRIORITY);

		$criteria->addSelectColumn(ArticleArticleGroupPeer::ID);

	}

	const COUNT = 'COUNT(article_article_group.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT article_article_group.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticleArticleGroupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleArticleGroupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ArticleArticleGroupPeer::doSelectRS($criteria, $con);
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
		$objects = ArticleArticleGroupPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ArticleArticleGroupPeer::populateObjects(ArticleArticleGroupPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleArticleGroupPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseArticleArticleGroupPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ArticleArticleGroupPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ArticleArticleGroupPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinArticle(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticleArticleGroupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleArticleGroupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticleArticleGroupPeer::ARTICLE_ID, ArticlePeer::ID);

		$rs = ArticleArticleGroupPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ArticleArticleGroupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleArticleGroupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticleArticleGroupPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);

		$rs = ArticleArticleGroupPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinArticle(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticleArticleGroupPeer::addSelectColumns($c);
		$startcol = (ArticleArticleGroupPeer::NUM_COLUMNS - ArticleArticleGroupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ArticlePeer::addSelectColumns($c);

		$c->addJoin(ArticleArticleGroupPeer::ARTICLE_ID, ArticlePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleArticleGroupPeer::getOMClass();

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
										$temp_obj2->addArticleArticleGroup($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticleArticleGroups();
				$obj2->addArticleArticleGroup($obj1); 			}
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

		ArticleArticleGroupPeer::addSelectColumns($c);
		$startcol = (ArticleArticleGroupPeer::NUM_COLUMNS - ArticleArticleGroupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ArticleGroupPeer::addSelectColumns($c);

		$c->addJoin(ArticleArticleGroupPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleArticleGroupPeer::getOMClass();

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
										$temp_obj2->addArticleArticleGroup($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticleArticleGroups();
				$obj2->addArticleArticleGroup($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticleArticleGroupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleArticleGroupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticleArticleGroupPeer::ARTICLE_ID, ArticlePeer::ID);

		$criteria->addJoin(ArticleArticleGroupPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);

		$rs = ArticleArticleGroupPeer::doSelectRS($criteria, $con);
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

		ArticleArticleGroupPeer::addSelectColumns($c);
		$startcol2 = (ArticleArticleGroupPeer::NUM_COLUMNS - ArticleArticleGroupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticlePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticlePeer::NUM_COLUMNS;

		ArticleGroupPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ArticleGroupPeer::NUM_COLUMNS;

		$c->addJoin(ArticleArticleGroupPeer::ARTICLE_ID, ArticlePeer::ID);

		$c->addJoin(ArticleArticleGroupPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleArticleGroupPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = ArticlePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getArticle(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticleArticleGroup($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initArticleArticleGroups();
				$obj2->addArticleArticleGroup($obj1);
			}


					
			$omClass = ArticleGroupPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getArticleGroup(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addArticleArticleGroup($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initArticleArticleGroups();
				$obj3->addArticleArticleGroup($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptArticle(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticleArticleGroupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleArticleGroupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticleArticleGroupPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);

		$rs = ArticleArticleGroupPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ArticleArticleGroupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleArticleGroupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticleArticleGroupPeer::ARTICLE_ID, ArticlePeer::ID);

		$rs = ArticleArticleGroupPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptArticle(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ArticleArticleGroupPeer::addSelectColumns($c);
		$startcol2 = (ArticleArticleGroupPeer::NUM_COLUMNS - ArticleArticleGroupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticleGroupPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticleGroupPeer::NUM_COLUMNS;

		$c->addJoin(ArticleArticleGroupPeer::ARTICLE_GROUP_ID, ArticleGroupPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleArticleGroupPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = ArticleGroupPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getArticleGroup(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addArticleArticleGroup($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticleArticleGroups();
				$obj2->addArticleArticleGroup($obj1);
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

		ArticleArticleGroupPeer::addSelectColumns($c);
		$startcol2 = (ArticleArticleGroupPeer::NUM_COLUMNS - ArticleArticleGroupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticlePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticlePeer::NUM_COLUMNS;

		$c->addJoin(ArticleArticleGroupPeer::ARTICLE_ID, ArticlePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleArticleGroupPeer::getOMClass();

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
					$temp_obj2->addArticleArticleGroup($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticleArticleGroups();
				$obj2->addArticleArticleGroup($obj1);
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
		return ArticleArticleGroupPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleArticleGroupPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseArticleArticleGroupPeer', $values, $con);
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

		$criteria->remove(ArticleArticleGroupPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseArticleArticleGroupPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseArticleArticleGroupPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleArticleGroupPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseArticleArticleGroupPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ArticleArticleGroupPeer::ID);
			$selectCriteria->add(ArticleArticleGroupPeer::ID, $criteria->remove(ArticleArticleGroupPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseArticleArticleGroupPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseArticleArticleGroupPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ArticleArticleGroupPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ArticleArticleGroupPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ArticleArticleGroup) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ArticleArticleGroupPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ArticleArticleGroup $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ArticleArticleGroupPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ArticleArticleGroupPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ArticleArticleGroupPeer::DATABASE_NAME, ArticleArticleGroupPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ArticleArticleGroupPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ArticleArticleGroupPeer::DATABASE_NAME);

		$criteria->add(ArticleArticleGroupPeer::ID, $pk);


		$v = ArticleArticleGroupPeer::doSelect($criteria, $con);

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
			$criteria->add(ArticleArticleGroupPeer::ID, $pks, Criteria::IN);
			$objs = ArticleArticleGroupPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseArticleArticleGroupPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ArticleArticleGroupMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ArticleArticleGroupMapBuilder');
}
