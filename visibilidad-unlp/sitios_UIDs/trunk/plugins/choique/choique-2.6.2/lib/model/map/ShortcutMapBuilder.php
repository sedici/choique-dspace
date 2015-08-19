<?php



class ShortcutMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ShortcutMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('shortcut');
		$tMap->setPhpName('Shortcut');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('MULTIMEDIA_ID', 'MultimediaId', 'int', CreoleTypes::INTEGER, 'multimedia', 'ID', false, null);

		$tMap->addForeignKey('CONTAINER_SLOTLET_ID', 'ContainerSlotletId', 'int', CreoleTypes::INTEGER, 'container_slotlet', 'ID', false, null);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, true, 256);

		$tMap->addColumn('BODY', 'Body', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('REFERENCE', 'Reference', 'string', CreoleTypes::VARCHAR, true, 256);

		$tMap->addColumn('REFERENCE_TYPE', 'ReferenceType', 'int', CreoleTypes::TINYINT, false, null);

		$tMap->addColumn('OPEN_IN_NEW_WINDOW', 'OpenInNewWindow', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addColumn('PRIORITY', 'Priority', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('COMMENT', 'Comment', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('IS_PUBLISHED', 'IsPublished', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 