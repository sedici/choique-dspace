<?php


abstract class BaseMultimediaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'multimedia';

	
	const CLASS_DEFAULT = 'lib.model.Multimedia';

	
	const NUM_COLUMNS = 33;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'multimedia.ID';

	
	const NAME = 'multimedia.NAME';

	
	const TITLE = 'multimedia.TITLE';

	
	const DESCRIPTION = 'multimedia.DESCRIPTION';

	
	const COMMENT = 'multimedia.COMMENT';

	
	const IS_DELETED = 'multimedia.IS_DELETED';

	
	const SMALL_URI = 'multimedia.SMALL_URI';

	
	const MEDIUM_URI = 'multimedia.MEDIUM_URI';

	
	const LARGE_URI = 'multimedia.LARGE_URI';

	
	const AUTHOR = 'multimedia.AUTHOR';

	
	const UPLOADED_BY = 'multimedia.UPLOADED_BY';

	
	const COPYRIGHT = 'multimedia.COPYRIGHT';

	
	const TYPE = 'multimedia.TYPE';

	
	const LANGUAGE = 'multimedia.LANGUAGE';

	
	const DURATION = 'multimedia.DURATION';

	
	const LOCATION = 'multimedia.LOCATION';

	
	const SUBJECT = 'multimedia.SUBJECT';

	
	const TOPICS = 'multimedia.TOPICS';

	
	const HEIGHT = 'multimedia.HEIGHT';

	
	const WIDTH = 'multimedia.WIDTH';

	
	const MIME_TYPE = 'multimedia.MIME_TYPE';

	
	const CREATED_AT = 'multimedia.CREATED_AT';

	
	const FLV_PARAMS = 'multimedia.FLV_PARAMS';

	
	const IS_EXTERNAL = 'multimedia.IS_EXTERNAL';

	
	const PLAYER_ID = 'multimedia.PLAYER_ID';

	
	const EXTERNAL_URI = 'multimedia.EXTERNAL_URI';

	
	const TIMES_SEEN = 'multimedia.TIMES_SEEN';

	
	const RATING = 'multimedia.RATING';

	
	const TIMES_RATED = 'multimedia.TIMES_RATED';

	
	const TIMES_DOWNLOADED = 'multimedia.TIMES_DOWNLOADED';

	
	const LONGDESC_URI = 'multimedia.LONGDESC_URI';

	
	const UPDATED_AT = 'multimedia.UPDATED_AT';

	
	const UPDATED_BY = 'multimedia.UPDATED_BY';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'Name', 'Title', 'Description', 'Comment', 'IsDeleted', 'SmallUri', 'MediumUri', 'LargeUri', 'Author', 'UploadedBy', 'Copyright', 'Type', 'Language', 'Duration', 'Location', 'Subject', 'Topics', 'Height', 'Width', 'MimeType', 'CreatedAt', 'FlvParams', 'IsExternal', 'PlayerId', 'ExternalUri', 'TimesSeen', 'Rating', 'TimesRated', 'TimesDownloaded', 'LongdescUri', 'UpdatedAt', 'UpdatedBy', ),
		BasePeer::TYPE_COLNAME => array (MultimediaPeer::ID, MultimediaPeer::NAME, MultimediaPeer::TITLE, MultimediaPeer::DESCRIPTION, MultimediaPeer::COMMENT, MultimediaPeer::IS_DELETED, MultimediaPeer::SMALL_URI, MultimediaPeer::MEDIUM_URI, MultimediaPeer::LARGE_URI, MultimediaPeer::AUTHOR, MultimediaPeer::UPLOADED_BY, MultimediaPeer::COPYRIGHT, MultimediaPeer::TYPE, MultimediaPeer::LANGUAGE, MultimediaPeer::DURATION, MultimediaPeer::LOCATION, MultimediaPeer::SUBJECT, MultimediaPeer::TOPICS, MultimediaPeer::HEIGHT, MultimediaPeer::WIDTH, MultimediaPeer::MIME_TYPE, MultimediaPeer::CREATED_AT, MultimediaPeer::FLV_PARAMS, MultimediaPeer::IS_EXTERNAL, MultimediaPeer::PLAYER_ID, MultimediaPeer::EXTERNAL_URI, MultimediaPeer::TIMES_SEEN, MultimediaPeer::RATING, MultimediaPeer::TIMES_RATED, MultimediaPeer::TIMES_DOWNLOADED, MultimediaPeer::LONGDESC_URI, MultimediaPeer::UPDATED_AT, MultimediaPeer::UPDATED_BY, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'name', 'title', 'description', 'comment', 'is_deleted', 'small_uri', 'medium_uri', 'large_uri', 'author', 'uploaded_by', 'copyright', 'type', 'language', 'duration', 'location', 'subject', 'topics', 'height', 'width', 'mime_type', 'created_at', 'flv_params', 'is_external', 'player_id', 'external_uri', 'times_seen', 'rating', 'times_rated', 'times_downloaded', 'longdesc_uri', 'updated_at', 'updated_by', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'Name' => 1, 'Title' => 2, 'Description' => 3, 'Comment' => 4, 'IsDeleted' => 5, 'SmallUri' => 6, 'MediumUri' => 7, 'LargeUri' => 8, 'Author' => 9, 'UploadedBy' => 10, 'Copyright' => 11, 'Type' => 12, 'Language' => 13, 'Duration' => 14, 'Location' => 15, 'Subject' => 16, 'Topics' => 17, 'Height' => 18, 'Width' => 19, 'MimeType' => 20, 'CreatedAt' => 21, 'FlvParams' => 22, 'IsExternal' => 23, 'PlayerId' => 24, 'ExternalUri' => 25, 'TimesSeen' => 26, 'Rating' => 27, 'TimesRated' => 28, 'TimesDownloaded' => 29, 'LongdescUri' => 30, 'UpdatedAt' => 31, 'UpdatedBy' => 32, ),
		BasePeer::TYPE_COLNAME => array (MultimediaPeer::ID => 0, MultimediaPeer::NAME => 1, MultimediaPeer::TITLE => 2, MultimediaPeer::DESCRIPTION => 3, MultimediaPeer::COMMENT => 4, MultimediaPeer::IS_DELETED => 5, MultimediaPeer::SMALL_URI => 6, MultimediaPeer::MEDIUM_URI => 7, MultimediaPeer::LARGE_URI => 8, MultimediaPeer::AUTHOR => 9, MultimediaPeer::UPLOADED_BY => 10, MultimediaPeer::COPYRIGHT => 11, MultimediaPeer::TYPE => 12, MultimediaPeer::LANGUAGE => 13, MultimediaPeer::DURATION => 14, MultimediaPeer::LOCATION => 15, MultimediaPeer::SUBJECT => 16, MultimediaPeer::TOPICS => 17, MultimediaPeer::HEIGHT => 18, MultimediaPeer::WIDTH => 19, MultimediaPeer::MIME_TYPE => 20, MultimediaPeer::CREATED_AT => 21, MultimediaPeer::FLV_PARAMS => 22, MultimediaPeer::IS_EXTERNAL => 23, MultimediaPeer::PLAYER_ID => 24, MultimediaPeer::EXTERNAL_URI => 25, MultimediaPeer::TIMES_SEEN => 26, MultimediaPeer::RATING => 27, MultimediaPeer::TIMES_RATED => 28, MultimediaPeer::TIMES_DOWNLOADED => 29, MultimediaPeer::LONGDESC_URI => 30, MultimediaPeer::UPDATED_AT => 31, MultimediaPeer::UPDATED_BY => 32, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'name' => 1, 'title' => 2, 'description' => 3, 'comment' => 4, 'is_deleted' => 5, 'small_uri' => 6, 'medium_uri' => 7, 'large_uri' => 8, 'author' => 9, 'uploaded_by' => 10, 'copyright' => 11, 'type' => 12, 'language' => 13, 'duration' => 14, 'location' => 15, 'subject' => 16, 'topics' => 17, 'height' => 18, 'width' => 19, 'mime_type' => 20, 'created_at' => 21, 'flv_params' => 22, 'is_external' => 23, 'player_id' => 24, 'external_uri' => 25, 'times_seen' => 26, 'rating' => 27, 'times_rated' => 28, 'times_downloaded' => 29, 'longdesc_uri' => 30, 'updated_at' => 31, 'updated_by' => 32, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/MultimediaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.MultimediaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = MultimediaPeer::getTableMap();
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
		return str_replace(MultimediaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(MultimediaPeer::ID);

		$criteria->addSelectColumn(MultimediaPeer::NAME);

		$criteria->addSelectColumn(MultimediaPeer::TITLE);

		$criteria->addSelectColumn(MultimediaPeer::DESCRIPTION);

		$criteria->addSelectColumn(MultimediaPeer::COMMENT);

		$criteria->addSelectColumn(MultimediaPeer::IS_DELETED);

		$criteria->addSelectColumn(MultimediaPeer::SMALL_URI);

		$criteria->addSelectColumn(MultimediaPeer::MEDIUM_URI);

		$criteria->addSelectColumn(MultimediaPeer::LARGE_URI);

		$criteria->addSelectColumn(MultimediaPeer::AUTHOR);

		$criteria->addSelectColumn(MultimediaPeer::UPLOADED_BY);

		$criteria->addSelectColumn(MultimediaPeer::COPYRIGHT);

		$criteria->addSelectColumn(MultimediaPeer::TYPE);

		$criteria->addSelectColumn(MultimediaPeer::LANGUAGE);

		$criteria->addSelectColumn(MultimediaPeer::DURATION);

		$criteria->addSelectColumn(MultimediaPeer::LOCATION);

		$criteria->addSelectColumn(MultimediaPeer::SUBJECT);

		$criteria->addSelectColumn(MultimediaPeer::TOPICS);

		$criteria->addSelectColumn(MultimediaPeer::HEIGHT);

		$criteria->addSelectColumn(MultimediaPeer::WIDTH);

		$criteria->addSelectColumn(MultimediaPeer::MIME_TYPE);

		$criteria->addSelectColumn(MultimediaPeer::CREATED_AT);

		$criteria->addSelectColumn(MultimediaPeer::FLV_PARAMS);

		$criteria->addSelectColumn(MultimediaPeer::IS_EXTERNAL);

		$criteria->addSelectColumn(MultimediaPeer::PLAYER_ID);

		$criteria->addSelectColumn(MultimediaPeer::EXTERNAL_URI);

		$criteria->addSelectColumn(MultimediaPeer::TIMES_SEEN);

		$criteria->addSelectColumn(MultimediaPeer::RATING);

		$criteria->addSelectColumn(MultimediaPeer::TIMES_RATED);

		$criteria->addSelectColumn(MultimediaPeer::TIMES_DOWNLOADED);

		$criteria->addSelectColumn(MultimediaPeer::LONGDESC_URI);

		$criteria->addSelectColumn(MultimediaPeer::UPDATED_AT);

		$criteria->addSelectColumn(MultimediaPeer::UPDATED_BY);

	}

	const COUNT = 'COUNT(multimedia.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT multimedia.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MultimediaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MultimediaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MultimediaPeer::doSelectRS($criteria, $con);
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
		$objects = MultimediaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return MultimediaPeer::populateObjects(MultimediaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMultimediaPeer:addDoSelectRS:addDoSelectRS') as $callable)
    {
      call_user_func($callable, 'BaseMultimediaPeer', $criteria, $con);
    }


		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			MultimediaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = MultimediaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinsfGuardUserRelatedByUploadedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MultimediaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MultimediaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MultimediaPeer::UPLOADED_BY, sfGuardUserPeer::ID);

		$rs = MultimediaPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(MultimediaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MultimediaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MultimediaPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = MultimediaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinsfGuardUserRelatedByUploadedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MultimediaPeer::addSelectColumns($c);
		$startcol = (MultimediaPeer::NUM_COLUMNS - MultimediaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(MultimediaPeer::UPLOADED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MultimediaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = sfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByUploadedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addMultimediaRelatedByUploadedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMultimediasRelatedByUploadedBy();
				$obj2->addMultimediaRelatedByUploadedBy($obj1); 			}
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

		MultimediaPeer::addSelectColumns($c);
		$startcol = (MultimediaPeer::NUM_COLUMNS - MultimediaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		sfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(MultimediaPeer::UPDATED_BY, sfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MultimediaPeer::getOMClass();

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
										$temp_obj2->addMultimediaRelatedByUpdatedBy($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initMultimediasRelatedByUpdatedBy();
				$obj2->addMultimediaRelatedByUpdatedBy($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MultimediaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MultimediaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(MultimediaPeer::UPLOADED_BY, sfGuardUserPeer::ID);

		$criteria->addJoin(MultimediaPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = MultimediaPeer::doSelectRS($criteria, $con);
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

		MultimediaPeer::addSelectColumns($c);
		$startcol2 = (MultimediaPeer::NUM_COLUMNS - MultimediaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + sfGuardUserPeer::NUM_COLUMNS;

		sfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + sfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(MultimediaPeer::UPLOADED_BY, sfGuardUserPeer::ID);

		$c->addJoin(MultimediaPeer::UPDATED_BY, sfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MultimediaPeer::getOMClass();


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
				$temp_obj2 = $temp_obj1->getsfGuardUserRelatedByUploadedBy(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addMultimediaRelatedByUploadedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initMultimediasRelatedByUploadedBy();
				$obj2->addMultimediaRelatedByUploadedBy($obj1);
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
					$temp_obj3->addMultimediaRelatedByUpdatedBy($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initMultimediasRelatedByUpdatedBy();
				$obj3->addMultimediaRelatedByUpdatedBy($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptsfGuardUserRelatedByUploadedBy(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(MultimediaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MultimediaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MultimediaPeer::doSelectRS($criteria, $con);
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
			$criteria->addSelectColumn(MultimediaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(MultimediaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = MultimediaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptsfGuardUserRelatedByUploadedBy(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		MultimediaPeer::addSelectColumns($c);
		$startcol2 = (MultimediaPeer::NUM_COLUMNS - MultimediaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MultimediaPeer::getOMClass();

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

		MultimediaPeer::addSelectColumns($c);
		$startcol2 = (MultimediaPeer::NUM_COLUMNS - MultimediaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = MultimediaPeer::getOMClass();

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
		return MultimediaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMultimediaPeer:doInsert:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseMultimediaPeer', $values, $con);
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

		$criteria->remove(MultimediaPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		
    foreach (sfMixer::getCallables('BaseMultimediaPeer:doInsert:post') as $callable)
    {
      call_user_func($callable, 'BaseMultimediaPeer', $values, $con, $pk);
    }

    return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{

    foreach (sfMixer::getCallables('BaseMultimediaPeer:doUpdate:pre') as $callable)
    {
      $ret = call_user_func($callable, 'BaseMultimediaPeer', $values, $con);
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
			$comparison = $criteria->getComparison(MultimediaPeer::ID);
			$selectCriteria->add(MultimediaPeer::ID, $criteria->remove(MultimediaPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		$ret = BasePeer::doUpdate($selectCriteria, $criteria, $con);
	

    foreach (sfMixer::getCallables('BaseMultimediaPeer:doUpdate:post') as $callable)
    {
      call_user_func($callable, 'BaseMultimediaPeer', $values, $con, $ret);
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
			$affectedRows += BasePeer::doDeleteAll(MultimediaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(MultimediaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Multimedia) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(MultimediaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(Multimedia $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(MultimediaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(MultimediaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(MultimediaPeer::DATABASE_NAME, MultimediaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = MultimediaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(MultimediaPeer::DATABASE_NAME);

		$criteria->add(MultimediaPeer::ID, $pk);


		$v = MultimediaPeer::doSelect($criteria, $con);

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
			$criteria->add(MultimediaPeer::ID, $pks, Criteria::IN);
			$objs = MultimediaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseMultimediaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/MultimediaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.MultimediaMapBuilder');
}
