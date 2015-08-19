<?php



class ArticleDocumentMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ArticleDocumentMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('article_document');
		$tMap->setPhpName('ArticleDocument');

		$tMap->setUseIdGenerator(true);

		$tMap->addForeignKey('ARTICLE_ID', 'ArticleId', 'int', CreoleTypes::INTEGER, 'article', 'ID', false, null);

		$tMap->addForeignKey('DOCUMENT_ID', 'DocumentId', 'int', CreoleTypes::INTEGER, 'document', 'ID', false, null);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 