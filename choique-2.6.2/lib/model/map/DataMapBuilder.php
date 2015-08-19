<?php



class DataMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DataMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('data');
		$tMap->setPhpName('Data');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('ROW', 'Row', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DATA', 'Data', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addForeignKey('FIELD_ID', 'FieldId', 'int', CreoleTypes::INTEGER, 'field', 'ID', false, null);

	} 
} 