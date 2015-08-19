<?php



class EventSectionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EventSectionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('event_section');
		$tMap->setPhpName('EventSection');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('EVENT_ID', 'EventId', 'int', CreoleTypes::INTEGER, 'event', 'ID', true, null);

		$tMap->addForeignKey('SECTION_ID', 'SectionId', 'int', CreoleTypes::INTEGER, 'section', 'ID', true, null);

	} 
} 