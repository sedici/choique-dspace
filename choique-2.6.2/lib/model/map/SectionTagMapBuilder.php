<?php



class SectionTagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SectionTagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('section_tag');
		$tMap->setPhpName('SectionTag');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('SECTION_ID', 'SectionId', 'int', CreoleTypes::INTEGER, 'section', 'ID', false, null);

		$tMap->addForeignKey('TAG_ID', 'TagId', 'int', CreoleTypes::INTEGER, 'tag', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 