<?php


abstract class BaseSectionTag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $section_id;


	
	protected $tag_id;


	
	protected $id;

	
	protected $aSection;

	
	protected $aTag;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getSectionId()
	{

		return $this->section_id;
	}

	
	public function getTagId()
	{

		return $this->tag_id;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setSectionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->section_id !== $v) {
			$this->section_id = $v;
			$this->modifiedColumns[] = SectionTagPeer::SECTION_ID;
		}

		if ($this->aSection !== null && $this->aSection->getId() !== $v) {
			$this->aSection = null;
		}

	} 
	
	public function setTagId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tag_id !== $v) {
			$this->tag_id = $v;
			$this->modifiedColumns[] = SectionTagPeer::TAG_ID;
		}

		if ($this->aTag !== null && $this->aTag->getId() !== $v) {
			$this->aTag = null;
		}

	} 
	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SectionTagPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->section_id = $rs->getInt($startcol + 0);

			$this->tag_id = $rs->getInt($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SectionTag object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseSectionTag:delete:pre') as $callable)
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
			$con = Propel::getConnection(SectionTagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SectionTagPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseSectionTag:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseSectionTag:save:pre') as $callable)
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
			$con = Propel::getConnection(SectionTagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseSectionTag:save:post') as $callable)
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

			if ($this->aTag !== null) {
				if ($this->aTag->isModified()) {
					$affectedRows += $this->aTag->save($con);
				}
				$this->setTag($this->aTag);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SectionTagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SectionTagPeer::doUpdate($this, $con);
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

			if ($this->aTag !== null) {
				if (!$this->aTag->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTag->getValidationFailures());
				}
			}


			if (($retval = SectionTagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SectionTagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getSectionId();
				break;
			case 1:
				return $this->getTagId();
				break;
			case 2:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SectionTagPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getSectionId(),
			$keys[1] => $this->getTagId(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SectionTagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setSectionId($value);
				break;
			case 1:
				$this->setTagId($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SectionTagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setSectionId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTagId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SectionTagPeer::DATABASE_NAME);

		if ($this->isColumnModified(SectionTagPeer::SECTION_ID)) $criteria->add(SectionTagPeer::SECTION_ID, $this->section_id);
		if ($this->isColumnModified(SectionTagPeer::TAG_ID)) $criteria->add(SectionTagPeer::TAG_ID, $this->tag_id);
		if ($this->isColumnModified(SectionTagPeer::ID)) $criteria->add(SectionTagPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SectionTagPeer::DATABASE_NAME);

		$criteria->add(SectionTagPeer::ID, $this->id);

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

		$copyObj->setTagId($this->tag_id);


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
			self::$peer = new SectionTagPeer();
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

	
	public function setTag($v)
	{


		if ($v === null) {
			$this->setTagId(NULL);
		} else {
			$this->setTagId($v->getId());
		}


		$this->aTag = $v;
	}


	
	public function getTag($con = null)
	{
		if ($this->aTag === null && ($this->tag_id !== null)) {
						include_once 'lib/model/om/BaseTagPeer.php';

			$this->aTag = TagPeer::retrieveByPK($this->tag_id, $con);

			
		}
		return $this->aTag;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseSectionTag:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseSectionTag::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 