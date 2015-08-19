<?php



class ArticleRssChannelMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ArticleRssChannelMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('article_rss_channel');
		$tMap->setPhpName('ArticleRssChannel');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('ARTICLE_ID', 'ArticleId', 'int', CreoleTypes::INTEGER, 'article', 'ID', false, null);

		$tMap->addForeignKey('RSS_CHANNEL_ID', 'RssChannelId', 'int', CreoleTypes::INTEGER, 'rss_channel', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 