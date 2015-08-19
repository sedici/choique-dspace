<?php



class ArticleArticleMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ArticleArticleMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('article_article');
		$tMap->setPhpName('ArticleArticle');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ARTICLE_REFERER_ID', 'ArticleRefererId', 'int', CreoleTypes::INTEGER, 'article', 'ID', false, null);

		$tMap->addForeignKey('ARTICLE_REFEREE_ID', 'ArticleRefereeId', 'int', CreoleTypes::INTEGER, 'article', 'ID', false, null);

	} 
} 