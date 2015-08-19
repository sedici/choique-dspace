<?php


abstract class BaseSectionLink extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $section_id;


	
	protected $link_id;


	
	protected $target_blank = 1;

	
	protected $aSection;

	
	protected $aLink;

	
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

	
	public function getLinkId()
	{

		return $this->link_id;
	}

	
	public function getTargetBlank()
	{

		return $this->target_blank;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SectionLinkPeer::ID;
		}

	} 
	
	public function setSectionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->section_id !== $v) {
			$this->section_id = $v;
			$this->modifiedColumns[] = SectionLinkPeer::SECTION_ID;
		}

		if ($this->aSection !== null && $this->aSection->getId() !== $v) {
			$this->aSection = null;
		}

	} 
	
	public function setLinkId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->link_id !== $v) {
			$this->link_id = $v;
			$this->modifiedColumns[] = SectionLinkPeer::LINK_ID;
		}

		if ($this->aLink !== null && $this->aLink->getId() !== $v) {
			$this->aLink = null;
		}

	} 
	
	public function setTargetBlank($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->target_blank !== $v || $v === 1) {
			$this->target_blank = $v;
			$this->modifiedColumns[] = SectionLinkPeer::TARGET_BLANK;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->section_id = $rs->getInt($startcol + 1);

			$this->link_id = $rs->getInt($startcol + 2);

			$this->target_blank = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SectionLink object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseSectionLink:delete:pre') as $callable)
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
			$con = Propel::getConnection(SectionLinkPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SectionLinkPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseSectionLink:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseSectionLink:save:pre') as $callable)
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
			$con = Propel::getConnection(SectionLinkPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseSectionLink:save:post') as $callable)
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

			if ($this->aLink !== null) {
				if ($this->aLink->isModified()) {
					$affectedRows += $this->aLink->save($con);
				}
				$this->setLink($this->aLink);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SectionLinkPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SectionLinkPeer::doUpdate($this, $con);
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

			if ($this->aLink !== null) {
				if (!$this->aLink->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLink->getValidationFailures());
				}
			}


			if (($retval = SectionLinkPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SectionLinkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getLinkId();
				break;
			case 3:
				return $this->getTargetBlank();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SectionLinkPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getSectionId(),
			$keys[2] => $this->getLinkId(),
			$keys[3] => $this->getTargetBlank(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SectionLinkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setLinkId($value);
				break;
			case 3:
				$this->setTargetBlank($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SectionLinkPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSectionId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLinkId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTargetBlank($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SectionLinkPeer::DATABASE_NAME);

		if ($this->isColumnModified(SectionLinkPeer::ID)) $criteria->add(SectionLinkPeer::ID, $this->id);
		if ($this->isColumnModified(SectionLinkPeer::SECTION_ID)) $criteria->add(SectionLinkPeer::SECTION_ID, $this->section_id);
		if ($this->isColumnModified(SectionLinkPeer::LINK_ID)) $criteria->add(SectionLinkPeer::LINK_ID, $this->link_id);
		if ($this->isColumnModified(SectionLinkPeer::TARGET_BLANK)) $criteria->add(SectionLinkPeer::TARGET_BLANK, $this->target_blank);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SectionLinkPeer::DATABASE_NAME);

		$criteria->add(SectionLinkPeer::ID, $this->id);

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

		$copyObj->setLinkId($this->link_id);

		$copyObj->setTargetBlank($this->target_blank);


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
			self::$peer = new SectionLinkPeer();
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

	
	public function setLink($v)
	{


		if ($v === null) {
			$this->setLinkId(NULL);
		} else {
			$this->setLinkId($v->getId());
		}


		$this->aLink = $v;
	}


	
	public function getLink($con = null)
	{
		if ($this->aLink === null && ($this->link_id !== null)) {
						include_once 'lib/model/om/BaseLinkPeer.php';

			$this->aLink = LinkPeer::retrieveByPK($this->link_id, $con);

			
		}
		return $this->aLink;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseSectionLink:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseSectionLink::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 