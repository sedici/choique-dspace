<?php


abstract class BaseSectionDocument extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $section_id;


	
	protected $document_id;

	
	protected $aSection;

	
	protected $aDocument;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getSectionId()
	{

		return $this->section_id;
	}

	
	public function getDocumentId()
	{

		return $this->document_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SectionDocumentPeer::ID;
		}

	} 
	
	public function setSectionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->section_id !== $v) {
			$this->section_id = $v;
			$this->modifiedColumns[] = SectionDocumentPeer::SECTION_ID;
		}

		if ($this->aSection !== null && $this->aSection->getId() !== $v) {
			$this->aSection = null;
		}

	} 
	
	public function setDocumentId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->document_id !== $v) {
			$this->document_id = $v;
			$this->modifiedColumns[] = SectionDocumentPeer::DOCUMENT_ID;
		}

		if ($this->aDocument !== null && $this->aDocument->getId() !== $v) {
			$this->aDocument = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->section_id = $rs->getInt($startcol + 1);

			$this->document_id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SectionDocument object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseSectionDocument:delete:pre') as $callable)
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
			$con = Propel::getConnection(SectionDocumentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SectionDocumentPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseSectionDocument:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseSectionDocument:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SectionDocumentPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseSectionDocument:save:post') as $callable)
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


												
			if ($this->aSection !== null) {
				if ($this->aSection->isModified()) {
					$affectedRows += $this->aSection->save($con);
				}
				$this->setSection($this->aSection);
			}

			if ($this->aDocument !== null) {
				if ($this->aDocument->isModified()) {
					$affectedRows += $this->aDocument->save($con);
				}
				$this->setDocument($this->aDocument);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SectionDocumentPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SectionDocumentPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aSection !== null) {
				if (!$this->aSection->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSection->getValidationFailures());
				}
			}

			if ($this->aDocument !== null) {
				if (!$this->aDocument->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDocument->getValidationFailures());
				}
			}


			if (($retval = SectionDocumentPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SectionDocumentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getSectionId();
				break;
			case 2:
				return $this->getDocumentId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SectionDocumentPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSectionId(),
			$keys[2] => $this->getDocumentId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SectionDocumentPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setSectionId($value);
				break;
			case 2:
				$this->setDocumentId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SectionDocumentPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSectionId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDocumentId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SectionDocumentPeer::DATABASE_NAME);

		if ($this->isColumnModified(SectionDocumentPeer::ID)) $criteria->add(SectionDocumentPeer::ID, $this->id);
		if ($this->isColumnModified(SectionDocumentPeer::SECTION_ID)) $criteria->add(SectionDocumentPeer::SECTION_ID, $this->section_id);
		if ($this->isColumnModified(SectionDocumentPeer::DOCUMENT_ID)) $criteria->add(SectionDocumentPeer::DOCUMENT_ID, $this->document_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SectionDocumentPeer::DATABASE_NAME);

		$criteria->add(SectionDocumentPeer::ID, $this->id);

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

		$copyObj->setSectionId($this->section_id);

		$copyObj->setDocumentId($this->document_id);


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
			self::$peer = new SectionDocumentPeer();
		}
		return self::$peer;
	}

	
	public function setSection($v)
	{


		if ($v === null) {
			$this->setSectionId(NULL);
		} else {
			$this->setSectionId($v->getId());
		}


		$this->aSection = $v;
	}


	
	public function getSection($con = null)
	{
		if ($this->aSection === null && ($this->section_id !== null)) {
						include_once 'lib/model/om/BaseSectionPeer.php';

			$this->aSection = SectionPeer::retrieveByPK($this->section_id, $con);

			
		}
		return $this->aSection;
	}

	
	public function setDocument($v)
	{


		if ($v === null) {
			$this->setDocumentId(NULL);
		} else {
			$this->setDocumentId($v->getId());
		}


		$this->aDocument = $v;
	}


	
	public function getDocument($con = null)
	{
		if ($this->aDocument === null && ($this->document_id !== null)) {
						include_once 'lib/model/om/BaseDocumentPeer.php';

			$this->aDocument = DocumentPeer::retrieveByPK($this->document_id, $con);

			
		}
		return $this->aDocument;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseSectionDocument:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseSectionDocument::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 