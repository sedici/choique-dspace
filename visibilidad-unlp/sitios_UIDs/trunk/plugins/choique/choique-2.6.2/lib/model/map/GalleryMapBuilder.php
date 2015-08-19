<?php



class GalleryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.GalleryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('gallery');
		$tMap->setPhpName('Gallery');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 256);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('COMMENT', 'Comment', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('IS_HORIZONTAL', 'IsHorizontal', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('VISIBLE_ITEMS', 'VisibleItems', 'int', CreoleTypes::TINYINT, false, null);

		$tMap->addColumn('IS_PUBLISHED', 'IsPublished', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('PUBLISHED_AT', 'PublishedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addForeignKey('PUBLISHED_BY', 'PublishedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

	} 
} 