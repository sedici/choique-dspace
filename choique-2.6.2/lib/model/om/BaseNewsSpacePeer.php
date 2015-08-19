<?php


abstract class BaseNewsSpacePeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'news_space';

	
	const CLASS_DEFAULT = 'lib.model.NewsSpace';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'news_space.ID';

	
	const TYPE = 'news_space.TYPE';

	
	const COMMENT = 'news_space.COMMENT';

	
	const ROW_NUMBER = 'news_space.ROW_NUMBER';

	
	const COLUMN_NUMBER = 'news_space.COLUMN_NUMBER';

	
	const TEMPLATE_ID = 'news_space.TEMPLATE_ID';

	
	const ARTICLE_ID = 'news_space.ARTICLE_ID';

	
	const WIDTH = 'news_space.WIDTH';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Type', 'Comment', 'RowNumber', 'ColumnNumber', 'TemplateId', 'ArticleId', 'Width', ),
		BasePeer::TYPE_COLNAME => array (NewsSpacePeer::ID, NewsSpacePeer::TYPE, NewsSpacePeer::COMMENT, NewsSpacePeer::ROW_NUMBER, NewsSpacePeer::COLUMN_NUMBER, NewsSpacePeer::TEMPLATE_ID, NewsSpacePeer::ARTICLE_ID, NewsSpacePeer::WIDTH, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'type', 'comment', 'row_number', 'column_number', 'template_id', 'article_id', 'width', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Type' => 1, 'Comment' => 2, 'RowNumber' => 3, 'ColumnNumber' => 4, 'TemplateId' => 5, 'ArticleId' => 6, 'Width' => 7, ),
		BasePeer::TYPE_COLNAME => array (NewsSpacePeer::ID => 0, NewsSpacePeer::TYPE => 1, NewsSpacePeer::COMMENT => 2, NewsSpacePeer::ROW_NUMBER => 3, NewsSpacePeer::COLUMN_NUMBER => 4, NewsSpacePeer::TEMPLATE_ID => 5, NewsSpacePeer::ARTICLE_ID => 6, NewsSpacePeer::WIDTH => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'type' => 1, 'comment' => 2, 'row_number' => 3, 'column_number' => 4, 'template_id' => 5, 'article_id' => 6, 'width' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/NewsSpaceMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.NewsSpaceMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = NewsSpacePeer::getTableMap();
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
		return str_replace(NewsSpacePeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(NewsSpacePeer::ID);

		$criteria->addSelectColumn(NewsSpacePeer::TYPE);

		$criteria->addSelectColumn(NewsSpacePeer::COMMENT);

		$criteria->addSelectColumn(NewsSpacePeer::ROW_NUMBER);

		$criteria->addSelectColumn(NewsSpacePeer::COLUMN_NUMBER);

		$criteria->addSelectColumn(NewsSpacePeer::TEMPLATE_ID);

		$criteria->addSelectColumn(NewsSpacePeer::ARTICLE_ID);

		$criteria->addSelectColumn(NewsSpacePeer::WIDTH);

	}

	const COUNT = 'COUNT(news_space.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT news_space.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NewsSpacePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NewsSpacePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = NewsSpacePeer::doSelectRS($criteria, $con);
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
		$objects = NewsSpacePeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return NewsSpacePeer::populateObjects(NewsSpacePeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseNewsSpacePeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseNewsSpacePeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			NewsSpacePeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = NewsSpacePeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinTemplate(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NewsSpacePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NewsSpacePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(NewsSpacePeer::TEMPLATE_ID, TemplatePeer::ID);

		$rs = NewsSpacePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinArticle(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NewsSpacePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NewsSpacePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(NewsSpacePeer::ARTICLE_ID, ArticlePeer::ID);

		$rs = NewsSpacePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinTemplate(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		NewsSpacePeer::addSelectColumns($c);
		$startcol = (NewsSpacePeer::NUM_COLUMNS - NewsSpacePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		TemplatePeer::addSelectColumns($c);

		$c->addJoin(NewsSpacePeer::TEMPLATE_ID, TemplatePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = NewsSpacePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TemplatePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getTemplate(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addNewsSpace($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initNewsSpaces();
				$obj2->addNewsSpace($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinArticle(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		NewsSpacePeer::addSelectColumns($c);
		$startcol = (NewsSpacePeer::NUM_COLUMNS - NewsSpacePeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		ArticlePeer::addSelectColumns($c);

		$c->addJoin(NewsSpacePeer::ARTICLE_ID, ArticlePeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = NewsSpacePeer::getOMClass();

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
										$temp_obj2->addNewsSpace($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initNewsSpaces();
				$obj2->addNewsSpace($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NewsSpacePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NewsSpacePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(NewsSpacePeer::TEMPLATE_ID, TemplatePeer::ID);

		$criteria->addJoin(NewsSpacePeer::ARTICLE_ID, ArticlePeer::ID);

		$rs = NewsSpacePeer::doSelectRS($criteria, $con);
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

		NewsSpacePeer::addSelectColumns($c);
		$startcol2 = (NewsSpacePeer::NUM_COLUMNS - NewsSpacePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TemplatePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TemplatePeer::NUM_COLUMNS;

		ArticlePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + ArticlePeer::NUM_COLUMNS;

		$c->addJoin(NewsSpacePeer::TEMPLATE_ID, TemplatePeer::ID);

		$c->addJoin(NewsSpacePeer::ARTICLE_ID, ArticlePeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = NewsSpacePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = TemplatePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTemplate(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addNewsSpace($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initNewsSpaces();
				$obj2->addNewsSpace($obj1);
			}


					
			$omClass = ArticlePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getArticle(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addNewsSpace($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initNewsSpaces();
				$obj3->addNewsSpace($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptTemplate(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NewsSpacePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NewsSpacePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(NewsSpacePeer::ARTICLE_ID, ArticlePeer::ID);

		$rs = NewsSpacePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptArticle(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(NewsSpacePeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(NewsSpacePeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(NewsSpacePeer::TEMPLATE_ID, TemplatePeer::ID);

		$rs = NewsSpacePeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptTemplate(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		NewsSpacePeer::addSelectColumns($c);
		$startcol2 = (NewsSpacePeer::NUM_COLUMNS - NewsSpacePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		ArticlePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + ArticlePeer::NUM_COLUMNS;

		$c->addJoin(NewsSpacePeer::ARTICLE_ID, ArticlePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = NewsSpacePeer::getOMClass();

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
					$temp_obj2->addNewsSpace($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initNewsSpaces();
				$obj2->addNewsSpace($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptArticle(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		NewsSpacePeer::addSelectColumns($c);
		$startcol2 = (NewsSpacePeer::NUM_COLUMNS - NewsSpacePeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		TemplatePeer::addSelectColumns($c);
		$startcol3 = $startcol2 + TemplatePeer::NUM_COLUMNS;

		$c->addJoin(NewsSpacePeer::TEMPLATE_ID, TemplatePeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = NewsSpacePeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = TemplatePeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getTemplate(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addNewsSpace($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initNewsSpaces();
				$obj2->addNewsSpace($obj1);
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
		return NewsSpacePeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseNewsSpacePeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseNewsSpacePeer', $values, $con);
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

		$criteria->remove(NewsSpacePeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseNewsSpacePeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseNewsSpacePeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseNewsSpacePeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseNewsSpacePeer', $values, $con);
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
			$comparison = $criteria->getComparison(NewsSpacePeer::ID);
			$selectCriteria->add(NewsSpacePeer::ID, $criteria->remove(NewsSpacePeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseNewsSpacePeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseNewsSpacePeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(NewsSpacePeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(NewsSpacePeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof NewsSpace) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(NewsSpacePeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(NewsSpace $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(NewsSpacePeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(NewsSpacePeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(NewsSpacePeer::DATABASE_NAME, NewsSpacePeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = NewsSpacePeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(NewsSpacePeer::DATABASE_NAME);

		$criteria->add(NewsSpacePeer::ID, $pk);


		$v = NewsSpacePeer::doSelect($criteria, $con);

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
			$criteria->add(NewsSpacePeer::ID, $pks, Criteria::IN);
			$objs = NewsSpacePeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseNewsSpacePeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/NewsSpaceMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.NewsSpaceMapBuilder');
}
