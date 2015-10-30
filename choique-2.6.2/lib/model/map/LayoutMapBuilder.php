<?php



class LayoutMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LayoutMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('layout');
		$tMap->setPhpName('Layout');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('ARTICLE_LAYOUT', 'ArticleLayout', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('TEMPLATE_LAYOUT', 'TemplateLayout', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('IS_DEFAULT', 'IsDefault', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('VIRTUAL_SECTION_ID', 'VirtualSectionId', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 