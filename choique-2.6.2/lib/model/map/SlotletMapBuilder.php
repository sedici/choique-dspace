<?php



class SlotletMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SlotletMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('slotlet');
		$tMap->setPhpName('Slotlet');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 256);

		$tMap->addColumn('CLS', 'Cls', 'string', CreoleTypes::VARCHAR, true, 256);

	} 
} 