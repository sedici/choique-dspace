<?php


abstract class BaseDocument extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $title;


	
	protected $uri;


	
	protected $uploaded_by;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $asfGuardUserRelatedByUploadedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $collArticleDocuments;

	
	protected $lastArticleDocumentCriteria = null;

	
	protected $collSectionDocuments;

	
	protected $lastSectionDocumentCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getUri()
	{

		return $this->uri;
	}

	
	public function getUploadedBy()
	{

		return $this->uploaded_by;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedBy()
	{

		return $this->updated_by;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DocumentPeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = DocumentPeer::NAME;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = DocumentPeer::TITLE;
		}

	} 
	
	public function setUri($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uri !== $v) {
			$this->uri = $v;
			$this->modifiedColumns[] = DocumentPeer::URI;
		}

	} 
	
	public function setUploadedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->uploaded_by !== $v) {
			$this->uploaded_by = $v;
			$this->modifiedColumns[] = DocumentPeer::UPLOADED_BY;
		}

		if ($this->asfGuardUserRelatedByUploadedBy !== null && $this->asfGuardUserRelatedByUploadedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByUploadedBy = null;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = DocumentPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = DocumentPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = DocumentPeer::UPDATED_BY;
		}

		if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->asfGuardUserRelatedByUpdatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByUpdatedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->title = $rs->getString($startcol + 2);

			$this->uri = $rs->getString($startcol + 3);

			$this->uploaded_by = $rs->getInt($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_by = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Document object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseDocument:delete:pre') as $callable)
    {
      $ret = call_user_func($callable, $this, $con);
      if ($ret)
      {
        return;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DocumentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DocumentPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseDocument:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseDocument:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(DocumentPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(DocumentPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DocumentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseDocument:save:post') as $callable)
    {
      call_user_func($callable, $this, $con, $affectedRows);
    }

			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->asfGuardUserRelatedByUploadedBy !== null) {
				if ($this->asfGuardUserRelatedByUploadedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByUploadedBy->save($con);
				}
				$this->setsfGuardUserRelatedByUploadedBy($this->asfGuardUserRelatedByUploadedBy);
			}

			if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
				if ($this->asfGuardUserRelatedByUpdatedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByUpdatedBy->save($con);
				}
				$this->setsfGuardUserRelatedByUpdatedBy($this->asfGuardUserRelatedByUpdatedBy);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DocumentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DocumentPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collArticleDocuments !== null) {
				foreach($this->collArticleDocuments as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSectionDocuments !== null) {
				foreach($this->collSectionDocuments as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->asfGuardUserRelatedByUploadedBy !== null) {
				if (!$this->asfGuardUserRelatedByUploadedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByUploadedBy->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
				if (!$this->asfGuardUserRelatedByUpdatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByUpdatedBy->getValidationFailures());
				}
			}


			if (($retval = DocumentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collArticleDocuments !== null) {
					foreach($this->collArticleDocuments as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSectionDocuments !== null) {
					foreach($this->collSectionDocuments as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DocumentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getTitle();
				break;
			case 3:
				return $this->getUri();
				break;
			case 4:
				return $this->getUploadedBy();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			case 7:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DocumentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getTitle(),
			$keys[3] => $this->getUri(),
			$keys[4] => $this->getUploadedBy(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DocumentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setTitle($value);
				break;
			case 3:
				$this->setUri($value);
				break;
			case 4:
				$this->setUploadedBy($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
			case 7:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DocumentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitle($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUri($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setUploadedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DocumentPeer::DATABASE_NAME);

		if ($this->isColumnModified(DocumentPeer::ID)) $criteria->add(DocumentPeer::ID, $this->id);
		if ($this->isColumnModified(DocumentPeer::NAME)) $criteria->add(DocumentPeer::NAME, $this->name);
		if ($this->isColumnModified(DocumentPeer::TITLE)) $criteria->add(DocumentPeer::TITLE, $this->title);
		if ($this->isColumnModified(DocumentPeer::URI)) $criteria->add(DocumentPeer::URI, $this->uri);
		if ($this->isColumnModified(DocumentPeer::UPLOADED_BY)) $criteria->add(DocumentPeer::UPLOADED_BY, $this->uploaded_by);
		if ($this->isColumnModified(DocumentPeer::CREATED_AT)) $criteria->add(DocumentPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(DocumentPeer::UPDATED_AT)) $criteria->add(DocumentPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(DocumentPeer::UPDATED_BY)) $criteria->add(DocumentPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DocumentPeer::DATABASE_NAME);

		$criteria->add(DocumentPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setName($this->name);

		$copyObj->setTitle($this->title);

		$copyObj->setUri($this->uri);

		$copyObj->setUploadedBy($this->uploaded_by);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getArticleDocuments() as $relObj) {
				$copyObj->addArticleDocument($relObj->copy($deepCopy));
			}

			foreach($this->getSectionDocuments() as $relObj) {
				$copyObj->addSectionDocument($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new DocumentPeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUserRelatedByUploadedBy($v)
	{


		if ($v === null) {
			$this->setUploadedBy(NULL);
		} else {
			$this->setUploadedBy($v->getId());
		}


		$this->asfGuardUserRelatedByUploadedBy = $v;
	}


	
	public function getsfGuardUserRelatedByUploadedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByUploadedBy === null && ($this->uploaded_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByUploadedBy = sfGuardUserPeer::retrieveByPK($this->uploaded_by, $con);

			
		}
		return $this->asfGuardUserRelatedByUploadedBy;
	}

	
	public function setsfGuardUserRelatedByUpdatedBy($v)
	{


		if ($v === null) {
			$this->setUpdatedBy(NULL);
		} else {
			$this->setUpdatedBy($v->getId());
		}


		$this->asfGuardUserRelatedByUpdatedBy = $v;
	}


	
	public function getsfGuardUserRelatedByUpdatedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByUpdatedBy === null && ($this->updated_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByUpdatedBy = sfGuardUserPeer::retrieveByPK($this->updated_by, $con);

			
		}
		return $this->asfGuardUserRelatedByUpdatedBy;
	}

	
	public function initArticleDocuments()
	{
		if ($this->collArticleDocuments === null) {
			$this->collArticleDocuments = array();
		}
	}

	
	public function getArticleDocuments($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleDocuments === null) {
			if ($this->isNew()) {
			   $this->collArticleDocuments = array();
			} else {

				$criteria->add(ArticleDocumentPeer::DOCUMENT_ID, $this->getId());

				ArticleDocumentPeer::addSelectColumns($criteria);
				$this->collArticleDocuments = ArticleDocumentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleDocumentPeer::DOCUMENT_ID, $this->getId());

				ArticleDocumentPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleDocumentCriteria) || !$this->lastArticleDocumentCriteria->equals($criteria)) {
					$this->collArticleDocuments = ArticleDocumentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleDocumentCriteria = $criteria;
		return $this->collArticleDocuments;
	}

	
	public function countArticleDocuments($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleDocumentPeer::DOCUMENT_ID, $this->getId());

		return ArticleDocumentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleDocument(ArticleDocument $l)
	{
		$this->collArticleDocuments[] = $l;
		$l->setDocument($this);
	}


	
	public function getArticleDocumentsJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleDocuments === null) {
			if ($this->isNew()) {
				$this->collArticleDocuments = array();
			} else {

				$criteria->add(ArticleDocumentPeer::DOCUMENT_ID, $this->getId());

				$this->collArticleDocuments = ArticleDocumentPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleDocumentPeer::DOCUMENT_ID, $this->getId());

			if (!isset($this->lastArticleDocumentCriteria) || !$this->lastArticleDocumentCriteria->equals($criteria)) {
				$this->collArticleDocuments = ArticleDocumentPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastArticleDocumentCriteria = $criteria;

		return $this->collArticleDocuments;
	}

	
	public function initSectionDocuments()
	{
		if ($this->collSectionDocuments === null) {
			$this->collSectionDocuments = array();
		}
	}

	
	public function getSectionDocuments($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionDocuments === null) {
			if ($this->isNew()) {
			   $this->collSectionDocuments = array();
			} else {

				$criteria->add(SectionDocumentPeer::DOCUMENT_ID, $this->getId());

				SectionDocumentPeer::addSelectColumns($criteria);
				$this->collSectionDocuments = SectionDocumentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SectionDocumentPeer::DOCUMENT_ID, $this->getId());

				SectionDocumentPeer::addSelectColumns($criteria);
				if (!isset($this->lastSectionDocumentCriteria) || !$this->lastSectionDocumentCriteria->equals($criteria)) {
					$this->collSectionDocuments = SectionDocumentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSectionDocumentCriteria = $criteria;
		return $this->collSectionDocuments;
	}

	
	public function countSectionDocuments($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSectionDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SectionDocumentPeer::DOCUMENT_ID, $this->getId());

		return SectionDocumentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSectionDocument(SectionDocument $l)
	{
		$this->collSectionDocuments[] = $l;
		$l->setDocument($this);
	}


	
	public function getSectionDocumentsJoinSection($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionDocuments === null) {
			if ($this->isNew()) {
				$this->collSectionDocuments = array();
			} else {

				$criteria->add(SectionDocumentPeer::DOCUMENT_ID, $this->getId());

				$this->collSectionDocuments = SectionDocumentPeer::doSelectJoinSection($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionDocumentPeer::DOCUMENT_ID, $this->getId());

			if (!isset($this->lastSectionDocumentCriteria) || !$this->lastSectionDocumentCriteria->equals($criteria)) {
				$this->collSectionDocuments = SectionDocumentPeer::doSelectJoinSection($criteria, $con);
			}
		}
		$this->lastSectionDocumentCriteria = $criteria;

		return $this->collSectionDocuments;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseDocument:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseDocument::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 