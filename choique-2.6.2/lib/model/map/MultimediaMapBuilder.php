<?php



class MultimediaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MultimediaMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('multimedia');
		$tMap->setPhpName('Multimedia');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 256);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, true, 256);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('COMMENT', 'Comment', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('IS_DELETED', 'IsDeleted', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('SMALL_URI', 'SmallUri', 'string', CreoleTypes::VARCHAR, false, 256);

		$tMap->addColumn('MEDIUM_URI', 'MediumUri', 'string', CreoleTypes::VARCHAR, false, 256);

		$tMap->addColumn('LARGE_URI', 'LargeUri', 'string', CreoleTypes::VARCHAR, true, 256);

		$tMap->addColumn('AUTHOR', 'Author', 'string', CreoleTypes::VARCHAR, false, 256);

		$tMap->addForeignKey('UPLOADED_BY', 'UploadedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('COPYRIGHT', 'Copyright', 'string', CreoleTypes::VARCHAR, false, 256);

		$tMap->addColumn('TYPE', 'Type', 'string', CreoleTypes::VARCHAR, false, 20);

		$tMap->addColumn('LANGUAGE', 'Language', 'string', CreoleTypes::VARCHAR, false, 5);

		$tMap->addColumn('DURATION', 'Duration', 'int', CreoleTypes::TINYINT, false, null);

		$tMap->addColumn('LOCATION', 'Location', 'string', CreoleTypes::VARCHAR, false, 256);

		$tMap->addColumn('SUBJECT', 'Subject', 'string', CreoleTypes::VARCHAR, false, 256);

		$tMap->addColumn('TOPICS', 'Topics', 'string', CreoleTypes::VARCHAR, false, 256);

		$tMap->addColumn('HEIGHT', 'Height', 'string', CreoleTypes::BIGINT, false, null);

		$tMap->addColumn('WIDTH', 'Width', 'string', CreoleTypes::BIGINT, false, null);

		$tMap->addColumn('MIME_TYPE', 'MimeType', 'string', CreoleTypes::VARCHAR, true, 256);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('FLV_PARAMS', 'FlvParams', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('IS_EXTERNAL', 'IsExternal', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PLAYER_ID', 'PlayerId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('EXTERNAL_URI', 'ExternalUri', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('TIMES_SEEN', 'TimesSeen', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('RATING', 'Rating', 'double', CreoleTypes::DECIMAL, false, null);

		$tMap->addColumn('TIMES_RATED', 'TimesRated', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TIMES_DOWNLOADED', 'TimesDownloaded', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('LONGDESC_URI', 'LongdescUri', 'string', CreoleTypes::VARCHAR, false, 256);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 