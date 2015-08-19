<?php



class ArticleLinkGroupMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ArticleLinkGroupMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('article_link_group');
		$tMap->setPhpName('ArticleLinkGroup');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('ARTICLE_ID', 'ArticleId', 'int', CreoleTypes::INTEGER, 'article', 'ID', false, null);

		$tMap->addForeignKey('LINK_GROUP_ID', 'LinkGroupId', 'int', CreoleTypes::INTEGER, 'link_group', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 