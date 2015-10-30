<?php



class EventMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EventMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('event');
		$tMap->setPhpName('Event');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('IS_PUBLISHED', 'IsPublished', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, true, 256);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('LOCATION', 'Location', 'string', CreoleTypes::VARCHAR, false, 256);

		$tMap->addColumn('CONTACT', 'Contact', 'string', CreoleTypes::VARCHAR, false, 256);

		$tMap->addColumn('ORGANIZER', 'Organizer', 'string', CreoleTypes::VARCHAR, false, 256);

		$tMap->addForeignKey('AUTHOR', 'Author', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('COMMENT', 'Comment', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('BEGINS_AT', 'BeginsAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('ENDS_AT', 'EndsAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('ARTICLE_ID', 'ArticleId', 'int', CreoleTypes::INTEGER, 'article', 'ID', false, null);

		$tMap->addForeignKey('EVENT_TYPE_ID', 'EventTypeId', 'int', CreoleTypes::INTEGER, 'event_type', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('MULTIMEDIA_ID', 'MultimediaId', 'int', CreoleTypes::INTEGER, 'multimedia', 'ID', false, null);

	} 
} 