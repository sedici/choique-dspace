<?php



class ArticleTagMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ArticleTagMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('article_tag');
		$tMap->setPhpName('ArticleTag');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('ARTICLE_ID', 'ArticleId', 'int', CreoleTypes::INTEGER, 'article', 'ID', false, null);

		$tMap->addForeignKey('TAG_ID', 'TagId', 'int', CreoleTypes::INTEGER, 'tag', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 