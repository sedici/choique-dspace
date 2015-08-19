<?php



class SectionDocumentMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SectionDocumentMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('section_document');
		$tMap->setPhpName('SectionDocument');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('SECTION_ID', 'SectionId', 'int', CreoleTypes::INTEGER, 'section', 'ID', true, null);

		$tMap->addForeignKey('DOCUMENT_ID', 'DocumentId', 'int', CreoleTypes::INTEGER, 'document', 'ID', true, null);

	} 
} 