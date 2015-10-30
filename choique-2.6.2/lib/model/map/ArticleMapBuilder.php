<?php



class ArticleMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ArticleMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('article');
		$tMap->setPhpName('Article');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('TYPE', 'Type', 'int', CreoleTypes::TINYINT, false, null);

		$tMap->addColumn('NAME', 'Name', 'string', CreoleTypes::VARCHAR, true, 256);

		$tMap->addColumn('TITLE', 'Title', 'string', CreoleTypes::VARCHAR, true, 256);

		$tMap->addColumn('HEADING', 'Heading', 'string', CreoleTypes::VARCHAR, false, 512);

		$tMap->addColumn('COMMENT', 'Comment', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('DESCRIPTION', 'Description', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('UPPER_DESCRIPTION', 'UpperDescription', 'string', CreoleTypes::VARCHAR, false, 256);

		$tMap->addColumn('BODY', 'Body', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addForeignKey('CREATED_BY', 'CreatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addForeignKey('UPDATED_BY', 'UpdatedBy', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', false, null);

		$tMap->addColumn('IS_PUBLISHED', 'IsPublished', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('IS_ARCHIVED', 'IsArchived', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('PUBLISHED_AT', 'PublishedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('ARCHIVED_AT', 'ArchivedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('SIGNATURE', 'Signature', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CONTACT', 'Contact', 'string', CreoleTypes::VARCHAR, false, 256);

		$tMap->addColumn('ZOOMABLE_MULTIMEDIA', 'ZoomableMultimedia', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addForeignKey('MULTIMEDIA_ID', 'MultimediaId', 'int', CreoleTypes::INTEGER, 'multimedia', 'ID', false, null);

		$tMap->addForeignKey('MAIN_GALLERY_ID', 'MainGalleryId', 'int', CreoleTypes::INTEGER, 'gallery', 'ID', false, null);

		$tMap->addForeignKey('LINK_ID', 'LinkId', 'int', CreoleTypes::INTEGER, 'link', 'ID', false, null);

		$tMap->addForeignKey('SOURCE_ID', 'SourceId', 'int', CreoleTypes::INTEGER, 'source', 'ID', false, null);

		$tMap->addForeignKey('SECTION_ID', 'SectionId', 'int', CreoleTypes::INTEGER, 'section', 'ID', false, null);

		$tMap->addColumn('REFERENCE', 'Reference', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('REFERENCE_TYPE', 'ReferenceType', 'int', CreoleTypes::TINYINT, false, null);

		$tMap->addColumn('OPEN_REFERENCE_NEW_WINDOW', 'OpenReferenceNewWindow', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('TIMES_READ', 'TimesRead', 'string', CreoleTypes::BIGINT, false, null);

		$tMap->addColumn('RATING', 'Rating', 'double', CreoleTypes::DECIMAL, false, 10);

		$tMap->addColumn('OPEN_AS_POPUP', 'OpenAsPopup', 'int', CreoleTypes::INTEGER, false, null);

		$tMap->addColumn('AUTO_PUBLISH_AT', 'AutoPublishAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('AUTO_UNPUBLISH_AT', 'AutoUnpublishAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 