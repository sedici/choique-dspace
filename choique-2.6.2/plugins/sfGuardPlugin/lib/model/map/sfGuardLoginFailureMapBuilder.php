<?php



class sfGuardLoginFailureMapBuilder {

	
	const CLASS_NAME = 'plugins.sfGuardPlugin.lib.model.map.sfGuardLoginFailureMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_guard_login_failure');
		$tMap->setPhpName('sfGuardLoginFailure');

		$tMap->setUseIdGenerator(true);

		$tMap->addColumn('USERNAME', 'Username', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('IP_ADDRESS', 'IpAddress', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('COOKIE_ID', 'CookieId', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('AT', 'At', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 