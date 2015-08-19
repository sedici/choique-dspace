<?php



class TemporaryLayoutMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.TemporaryLayoutMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('temporary_layout');
		$tMap->setPhpName('TemporaryLayout');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('LAYOUT', 'Layout', 'string', CreoleTypes::LONGVARCHAR, false, null);

	} 
} 