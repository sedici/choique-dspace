<?php



class FieldMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.FieldMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('field');
		$tMap->setPhpName('Field');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('LABEL', 'Label', 'string', CreoleTypes::VARCHAR, false, 256);

		$tMap->addColumn('TYPE', 'Type', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('IS_REQUIRED', 'IsRequired', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DEFAULT_VALUE', 'DefaultValue', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('SORT', 'Sort', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('FORM_ID', 'FormId', 'int', CreoleTypes::INTEGER, 'form', 'ID', false, null);

	} 
} 