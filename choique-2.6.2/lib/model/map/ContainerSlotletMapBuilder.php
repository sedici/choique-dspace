<?php



class ContainerSlotletMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ContainerSlotletMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('container_slotlet');
		$tMap->setPhpName('ContainerSlotlet');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('CONTAINER_ID', 'ContainerId', 'int', CreoleTypes::INTEGER, 'container', 'ID', false, null);

		$tMap->addForeignKey('SLOTLET_ID', 'SlotletId', 'int', CreoleTypes::INTEGER, 'slotlet', 'ID', false, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 256);

		$tMap->addColumn('PRIORITY', 'Priority', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('RSS_CHANNEL_ID', 'RssChannelId', 'int', CreoleTypes::INTEGER, 'rss_channel', 'ID', false, null);

		$tMap->addColumn('VISIBLE_RSS', 'VisibleRss', 'int', CreoleTypes::INTEGER, false, null);

	} 
} 