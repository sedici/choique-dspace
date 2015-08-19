<?php



class ArticleGalleryMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ArticleGalleryMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('article_gallery');
		$tMap->setPhpName('ArticleGallery');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('ARTICLE_ID', 'ArticleId', 'int', CreoleTypes::INTEGER, 'article', 'ID', false, null);

		$tMap->addForeignKey('GALLERY_ID', 'GalleryId', 'int', CreoleTypes::INTEGER, 'gallery', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 