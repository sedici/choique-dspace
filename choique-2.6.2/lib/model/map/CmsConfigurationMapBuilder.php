<?php



class CmsConfigurationMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CmsConfigurationMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('cms_configuration');
		$tMap->setPhpName('CmsConfiguration');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CONFIGURATION_KEY', 'ConfigurationKey', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('CONFIGURATION_VALUE', 'ConfigurationValue', 'string', CreoleTypes::LONGVARCHAR, false, null);

	} 
} 