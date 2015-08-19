<?php


abstract class BaseArticleGroupPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'article_group';

	
	const CLASS_DEFAULT = 'lib.model.ArticleGroup';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'article_group.ID';

	
	const NAME = 'article_group.NAME';

	
	const DESCRIPTION = 'article_group.DESCRIPTION';

	
	const COMMENT = 'article_group.COMMENT';

	
	const VISIBLE_ITEMS = 'article_group.VISIBLE_ITEMS';

	
	const IS_PUBLISHED = 'article_group.IS_PUBLISHED';

	
	const CREATED_AT = 'article_group.CREATED_AT';

	
	const PUBLISHED_AT = 'article_group.PUBLISHED_AT';

	
	const CREATED_BY = 'article_group.CREATED_BY';

	
	const UPDATED_AT = 'article_group.UPDATED_AT';

	
	const UPDATED_BY = 'article_group.UPDATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'Description', 'Comment', 'VisibleItems', 'IsPublished', 'CreatedAt', 'PublishedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', ),
		BasePeer::TYPE_COLNAME => array (ArticleGroupPeer::ID, ArticleGroupPeer::NAME, ArticleGroupPeer::DESCRIPTION, ArticleGroupPeer::COMMENT, ArticleGroupPeer::VISIBLE_ITEMS, ArticleGroupPeer::IS_PUBLISHED, ArticleGroupPeer::CREATED_AT, ArticleGroupPeer::PUBLISHED_AT, ArticleGroupPeer::CREATED_BY, ArticleGroupPeer::UPDATED_AT, ArticleGroupPeer::UPDATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'description', 'comment', 'visible_items', 'is_published', 'created_at', 'published_at', 'created_by', 'updated_at', 'updated_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'Description' => 2, 'Comment' => 3, 'VisibleItems' => 4, 'IsPublished' => 5, 'CreatedAt' => 6, 'PublishedAt' => 7, 'CreatedBy' => 8, 'UpdatedAt' => 9, 'UpdatedBy' => 10, ),
		BasePeer::TYPE_COLNAME => array (ArticleGroupPeer::ID => 0, ArticleGroupPeer::NAME => 1, ArticleGroupPeer::DESCRIPTION => 2, ArticleGroupPeer::COMMENT => 3, ArticleGroupPeer::VISIBLE_ITEMS => 4, ArticleGroupPeer::IS_PUBLISHED => 5, ArticleGroupPeer::CREATED_AT => 6, ArticleGroupPeer::PUBLISHED_AT => 7, ArticleGroupPeer::CREATED_BY => 8, ArticleGroupPeer::UPDATED_AT => 9, ArticleGroupPeer::UPDATED_BY => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'description' => 2, 'comment' => 3, 'visible_items' => 4, 'is_published' => 5, 'created_at' => 6, 'published_at' => 7, 'created_by' => 8, 'updated_at' => 9, 'updated_by' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/ArticleGroupMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.ArticleGroupMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = ArticleGroupPeer::getTableMap();
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
		return str_replace(ArticleGroupPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ArticleGroupPeer::ID);

		$criteria->addSelectColumn(ArticleGroupPeer::NAME);

		$criteria->addSelectColumn(ArticleGroupPeer::DESCRIPTION);

		$criteria->addSelectColumn(ArticleGroupPeer::COMMENT);

		$criteria->addSelectColumn(ArticleGroupPeer::VISIBLE_ITEMS);

		$criteria->addSelectColumn(ArticleGroupPeer::IS_PUBLISHED);

		$criteria->addSelectColumn(ArticleGroupPeer::CREATED_AT);

		$criteria->addSelectColumn(ArticleGroupPeer::PUBLISHED_AT);

		$criteria->addSelectColumn(ArticleGroupPeer::CREATED_BY);

		$criteria->addSelectColumn(ArticleGroupPeer::UPDATED_AT);

		$criteria->addSelectColumn(ArticleGroupPeer::UPDATED_BY);

	}

	const COUNT = 'COUNT(article_group.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT article_group.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticleGroupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleGroupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ArticleGroupPeer::doSelectRS($criteria, $con);
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
		$objects = ArticleGroupPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return ArticleGroupPeer::populateObjects(ArticleGroupPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleGroupPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseArticleGroupPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			ArticleGroupPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = ArticleGroupPeer::getOMClass();
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
			$criteria->addSelectColumn(ArticleGroupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleGroupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticleGroupPeer::CREATED_BY, sfGuardUserPeer::ID);

		$rs = ArticleGroupPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ArticleGroupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleGroupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticleGroupPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = ArticleGroupPeer::doSelectRS($criteria, $con);
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

		ArticleGroupPeer::addSelectColumns($c);
		$startcol = (ArticleGroupPeer::NUM_COLUMNS - ArticleGroupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ArticleGroupPeer::CREATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleGroupPeer::getOMClass();

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
										$temp_obj2->addArticleGroupRelatedByCreatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticleGroupsRelatedByCreatedBy();
				$obj2->addArticleGroupRelatedByCreatedBy($obj1); 			}
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

		ArticleGroupPeer::addSelectColumns($c);
		$startcol = (ArticleGroupPeer::NUM_COLUMNS - ArticleGroupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(ArticleGroupPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleGroupPeer::getOMClass();

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
										$temp_obj2->addArticleGroupRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initArticleGroupsRelatedByUpdatedBy();
				$obj2->addArticleGroupRelatedByUpdatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(ArticleGroupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleGroupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(ArticleGroupPeer::CREATED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(ArticleGroupPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = ArticleGroupPeer::doSelectRS($criteria, $con);
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

		ArticleGroupPeer::addSelectColumns($c);
		$startcol2 = (ArticleGroupPeer::NUM_COLUMNS - ArticleGroupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(ArticleGroupPeer::CREATED_BY, sfGuardUserPeer::ID);

		$c->addJoin(ArticleGroupPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleGroupPeer::getOMClass();


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
					$temp_obj2->addArticleGroupRelatedByCreatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initArticleGroupsRelatedByCreatedBy();
				$obj2->addArticleGroupRelatedByCreatedBy($obj1);
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
					$temp_obj3->addArticleGroupRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initArticleGroupsRelatedByUpdatedBy();
				$obj3->addArticleGroupRelatedByUpdatedBy($obj1);
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
			$criteria->addSelectColumn(ArticleGroupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleGroupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ArticleGroupPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(ArticleGroupPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(ArticleGroupPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = ArticleGroupPeer::doSelectRS($criteria, $con);
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

		ArticleGroupPeer::addSelectColumns($c);
		$startcol2 = (ArticleGroupPeer::NUM_COLUMNS - ArticleGroupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleGroupPeer::getOMClass();

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

		ArticleGroupPeer::addSelectColumns($c);
		$startcol2 = (ArticleGroupPeer::NUM_COLUMNS - ArticleGroupPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = ArticleGroupPeer::getOMClass();

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
		return ArticleGroupPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleGroupPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseArticleGroupPeer', $values, $con);
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

		$criteria->remove(ArticleGroupPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseArticleGroupPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseArticleGroupPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleGroupPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseArticleGroupPeer', $values, $con);
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
			$comparison = $criteria->getComparison(ArticleGroupPeer::ID);
			$selectCriteria->add(ArticleGroupPeer::ID, $criteria->remove(ArticleGroupPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseArticleGroupPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseArticleGroupPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(ArticleGroupPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(ArticleGroupPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof ArticleGroup) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ArticleGroupPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(ArticleGroup $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ArticleGroupPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ArticleGroupPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(ArticleGroupPeer::DATABASE_NAME, ArticleGroupPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ArticleGroupPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(ArticleGroupPeer::DATABASE_NAME);

		$criteria->add(ArticleGroupPeer::ID, $pk);


		$v = ArticleGroupPeer::doSelect($criteria, $con);

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
			$criteria->add(ArticleGroupPeer::ID, $pks, Criteria::IN);
			$objs = ArticleGroupPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseArticleGroupPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/ArticleGroupMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.ArticleGroupMapBuilder');
}
