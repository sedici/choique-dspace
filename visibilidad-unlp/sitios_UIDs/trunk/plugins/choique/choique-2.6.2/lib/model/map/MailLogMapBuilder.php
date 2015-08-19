<?php



class MailLogMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.MailLogMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('mail_log');
		$tMap->setPhpName('MailLog');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('MAIL_FROM', 'MailFrom', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('MAIL_TO', 'MailTo', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('SUBJECT', 'Subject', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('BODY', 'Body', 'string', CreoleTypes::LONGVARCHAR, true, null);

		$tMap->addColumn('SENDER_NAME', 'SenderName', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('SECTION_NAME', 'SectionName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('ARTICLE_NAME', 'ArticleName', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 