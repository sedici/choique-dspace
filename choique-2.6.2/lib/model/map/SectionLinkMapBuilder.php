<?php



class SectionLinkMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SectionLinkMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('section_link');
		$tMap->setPhpName('SectionLink');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('SECTION_ID', 'SectionId', 'int', CreoleTypes::INTEGER, 'section', 'ID', true, null);

		$tMap->addForeignKey('LINK_ID', 'LinkId', 'int', CreoleTypes::INTEGER, 'link', 'ID', true, null);

		$tMap->addColumn('TARGET_BLANK', 'TargetBlank', 'int', CreoleTypes::TINYINT, false, null);

	} 
} 