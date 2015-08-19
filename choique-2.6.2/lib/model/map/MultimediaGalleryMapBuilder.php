<?php



class MultimediaGalleryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MultimediaGalleryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('multimedia_gallery');
		$tMap->setPhpName('MultimediaGallery');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('MULTIMEDIA_ID', 'MultimediaId', 'int', CreoleTypes::INTEGER, 'multimedia', 'ID', false, null);

		$tMap->addForeignKey('GALLERY_ID', 'GalleryId', 'int', CreoleTypes::INTEGER, 'gallery', 'ID', false, null);

		$tMap->addColumn('PRIORITY', 'Priority', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 