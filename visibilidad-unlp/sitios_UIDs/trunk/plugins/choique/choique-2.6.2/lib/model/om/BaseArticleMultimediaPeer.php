<?php


abstract class BaseArticleMultimediaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'article_multimedia';

	
	const CLASS_DEFAULT = 'lib.model.ArticleMultimedia';

	
	const NUM_COLUMNS = 3;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ARTICLE_ID = 'article_multimedia.ARTICLE_ID';

	
	const MULTIMEDIA_ID = 'article_multimedia.MULTIMEDIA_ID';

	
	const ID = 'article_multimedia.ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('ArticleId', 'MultimediaId', 'Id', ),
		BasePeer::TYPE_COLNAME => array (ArticleMultimediaPeer::ARTICLE_ID, ArticleMultimediaPeer::MULTIMEDIA_ID, ArticleMultimediaPeer::ID, ),
		BasePeer::TYPE_FIELDNAME => array ('article_id', 'multimedia_id', 'id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('ArticleId' => 0, 'MultimediaId' => 1, 'Id' => 2, ),
		BasePeer::TYPE_COLNAME => array (ArticleMultimediaPeer::ARTICLE_ID => 0, ArticleMultimediaPeer::MULTIMEDIA_ID => 1, ArticleMultimediaPeer::ID => 2, ),
		BasePeer::TYPE_FIELDNAME => array ('article_id' => 0, 'multimedia_id' => 1, 'id' => 2, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ArticleMultimediaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ArticleMultimediaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ArticleMultimediaPeer::getTableMap();
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
		return str_replace(ArticleMultimediaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ArticleMultimediaPeer::ARTICLE_ID);

		$criteria->addSelectColumn(ArticleMultimediaPeer::MULTIMEDIA_ID);

		$criteria->addSelectColumn(ArticleMultimediaPeer::ID);

	}

	const COUNT = 'COUNT(article_multimedia.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT article_multimedia.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticleMultimediaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleMultimediaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ArticleMultimediaPeer::doSelectRS($criteria, $con);
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
		$objects = ArticleMultimediaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ArticleMultimediaPeer::populateObjects(ArticleMultimediaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleMultimediaPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseArticleMultimediaPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ArticleMultimediaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ArticleMultimediaPeer::getOMClass();
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
			$criteria->addSelectColumn(ArticleMultimediaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleMultimediaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticleMultimediaPeer::ARTICLE_ID, ArticlePeer::ID);

		$rs = ArticleMultimediaPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ArticleMultimediaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleMultimediaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticleMultimediaPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = ArticleMultimediaPeer::doSelectRS($criteria, $con);
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

		ArticleMultimediaPeer::addSelectColumns($c);
		$startcol = (ArticleMultimediaPeer::NUM_COLUMNS - ArticleMultimediaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ArticlePeer::addSelectColumns($c);

		$c->addJoin(ArticleMultimediaPeer::ARTICLE_ID, ArticlePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleMultimediaPeer::getOMClass();

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
										$temp_obj2->addArticleMultimedia($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticleMultimedias();
				$obj2->addArticleMultimedia($obj1); 			}
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

		ArticleMultimediaPeer::addSelectColumns($c);
		$startcol = (ArticleMultimediaPeer::NUM_COLUMNS - ArticleMultimediaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		MultimediaPeer::addSelectColumns($c);

		$c->addJoin(ArticleMultimediaPeer::MULTIMEDIA_ID, MultimediaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleMultimediaPeer::getOMClass();

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
										$temp_obj2->addArticleMultimedia($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticleMultimedias();
				$obj2->addArticleMultimedia($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticleMultimediaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleMultimediaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticleMultimediaPeer::ARTICLE_ID, ArticlePeer::ID);

		$criteria->addJoin(ArticleMultimediaPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = ArticleMultimediaPeer::doSelectRS($criteria, $con);
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

		ArticleMultimediaPeer::addSelectColumns($c);
		$startcol2 = (ArticleMultimediaPeer::NUM_COLUMNS - ArticleMultimediaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticlePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticlePeer::NUM_COLUMNS;

		MultimediaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + MultimediaPeer::NUM_COLUMNS;

		$c->addJoin(ArticleMultimediaPeer::ARTICLE_ID, ArticlePeer::ID);

		$c->addJoin(ArticleMultimediaPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleMultimediaPeer::getOMClass();


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
					$temp_obj2->addArticleMultimedia($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initArticleMultimedias();
				$obj2->addArticleMultimedia($obj1);
			}


					
			$omClass = MultimediaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getMultimedia(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addArticleMultimedia($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initArticleMultimedias();
				$obj3->addArticleMultimedia($obj1);
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
			$criteria->addSelectColumn(ArticleMultimediaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleMultimediaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticleMultimediaPeer::MULTIMEDIA_ID, MultimediaPeer::ID);

		$rs = ArticleMultimediaPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ArticleMultimediaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleMultimediaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticleMultimediaPeer::ARTICLE_ID, ArticlePeer::ID);

		$rs = ArticleMultimediaPeer::doSelectRS($criteria, $con);
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

		ArticleMultimediaPeer::addSelectColumns($c);
		$startcol2 = (ArticleMultimediaPeer::NUM_COLUMNS - ArticleMultimediaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		MultimediaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + MultimediaPeer::NUM_COLUMNS;

		$c->addJoin(ArticleMultimediaPeer::MULTIMEDIA_ID, MultimediaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleMultimediaPeer::getOMClass();

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
					$temp_obj2->addArticleMultimedia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticleMultimedias();
				$obj2->addArticleMultimedia($obj1);
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

		ArticleMultimediaPeer::addSelectColumns($c);
		$startcol2 = (ArticleMultimediaPeer::NUM_COLUMNS - ArticleMultimediaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticlePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticlePeer::NUM_COLUMNS;

		$c->addJoin(ArticleMultimediaPeer::ARTICLE_ID, ArticlePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleMultimediaPeer::getOMClass();

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
					$temp_obj2->addArticleMultimedia($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initArticleMultimedias();
				$obj2->addArticleMultimedia($obj1);
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
		return ArticleMultimediaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleMultimediaPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseArticleMultimediaPeer', $values, $con);
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

		$criteria->remove(ArticleMultimediaPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseArticleMultimediaPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseArticleMultimediaPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleMultimediaPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseArticleMultimediaPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ArticleMultimediaPeer::ID);
			$selectCriteria->add(ArticleMultimediaPeer::ID, $criteria->remove(ArticleMultimediaPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseArticleMultimediaPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseArticleMultimediaPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ArticleMultimediaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ArticleMultimediaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ArticleMultimedia) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ArticleMultimediaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ArticleMultimedia $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ArticleMultimediaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ArticleMultimediaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ArticleMultimediaPeer::DATABASE_NAME, ArticleMultimediaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ArticleMultimediaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ArticleMultimediaPeer::DATABASE_NAME);

		$criteria->add(ArticleMultimediaPeer::ID, $pk);


		$v = ArticleMultimediaPeer::doSelect($criteria, $con);

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
			$criteria->add(ArticleMultimediaPeer::ID, $pks, Criteria::IN);
			$objs = ArticleMultimediaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseArticleMultimediaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ArticleMultimediaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ArticleMultimediaMapBuilder');
}
