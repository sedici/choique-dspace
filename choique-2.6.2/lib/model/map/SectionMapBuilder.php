<?php



class SectionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SectionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('section');
		$tMap->setPhpName('Section');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 256);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('PRIORITY', 'Priority', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('COMMENT', 'Comment', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('IS_PUBLISHED', 'IsPublished', 'boolean', CreoleTypes::BOOLEAN, false, null);

		$tMap->addForeignKey('MULTIMEDIA_ID', 'MultimediaId', 'int', CreoleTypes::INTEGER, 'multimedia', 'ID', false, null);

		$tMap->addForeignKey('SECTION_ID', 'SectionId', 'int', CreoleTypes::INTEGER, 'section', 'ID', false, null);

		$tMap->addForeignKey('TEMPLATE_ID', 'TemplateId', 'int', CreoleTypes::INTEGER, 'template', 'ID', false, null);

		$tMap->addForeignKey('ARTICLE_ID', 'ArticleId', 'int', CreoleTypes::INTEGER, 'article', 'ID', false, null);

		$tMap->addForeignKey('LAYOUT_ID', 'LayoutId', 'int', CreoleTypes::INTEGER, 'layout', 'ID', false, null);

		$tMap->addColumn('COLOR', 'Color', 'string', CreoleTypes::VARCHAR, false, 7);

		$tMap->addForeignKey('ARTICLE_GROUP_ID', 'ArticleGroupId', 'int', CreoleTypes::INTEGER, 'article_group', 'ID', false, null);

	} 
} 