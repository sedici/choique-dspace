<?php



class LinkGroupLinkMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LinkGroupLinkMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('link_group_link');
		$tMap->setPhpName('LinkGroupLink');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('LINK_GROUP_ID', 'LinkGroupId', 'int', CreoleTypes::INTEGER, 'link_group', 'ID', false, null);

		$tMap->addForeignKey('LINK_ID', 'LinkId', 'int', CreoleTypes::INTEGER, 'link', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 