<?php



class NewsSpaceMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.NewsSpaceMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('news_space');
		$tMap->setPhpName('NewsSpace');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TYPE', 'Type', 'int', CreoleTypes::TINYINT, false, null);

		$tMap->addColumn('COMMENT', 'Comment', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('ROW_NUMBER', 'RowNumber', 'int', CreoleTypes::TINYINT, false, null);

		$tMap->addColumn('COLUMN_NUMBER', 'ColumnNumber', 'int', CreoleTypes::TINYINT, false, null);

		$tMap->addForeignKey('TEMPLATE_ID', 'TemplateId', 'int', CreoleTypes::INTEGER, 'template', 'ID', false, null);

		$tMap->addForeignKey('ARTICLE_ID', 'ArticleId', 'int', CreoleTypes::INTEGER, 'article', 'ID', false, null);

		$tMap->addColumn('WIDTH', 'Width', 'double', CreoleTypes::FLOAT, false, null);

	} 
} 