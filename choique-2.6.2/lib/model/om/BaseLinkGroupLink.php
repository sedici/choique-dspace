<?php


abstract class BaseLinkGroupLink extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $link_group_id;


	
	protected $link_id;


	
	protected $id;

	
	protected $aLinkGroup;

	
	protected $aLink;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getLinkGroupId()
	{

		return $this->link_group_id;
	}

	
	public function getLinkId()
	{

		return $this->link_id;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setLinkGroupId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->link_group_id !== $v) {
			$this->link_group_id = $v;
			$this->modifiedColumns[] = LinkGroupLinkPeer::LINK_GROUP_ID;
		}

		if ($this->aLinkGroup !== null && $this->aLinkGroup->getId() !== $v) {
			$this->aLinkGroup = null;
		}

	} 
	
	public function setLinkId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->link_id !== $v) {
			$this->link_id = $v;
			$this->modifiedColumns[] = LinkGroupLinkPeer::LINK_ID;
		}

		if ($this->aLink !== null && $this->aLink->getId() !== $v) {
			$this->aLink = null;
		}

	} 
	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LinkGroupLinkPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->link_group_id = $rs->getInt($startcol + 0);

			$this->link_id = $rs->getInt($startcol + 1);

			$this->id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating LinkGroupLink object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseLinkGroupLink:delete:pre') as $callable)
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
			$con = Propel::getConnection(LinkGroupLinkPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LinkGroupLinkPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseLinkGroupLink:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseLinkGroupLink:save:pre') as $callable)
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
			$con = Propel::getConnection(LinkGroupLinkPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseLinkGroupLink:save:post') as $callable)
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


												
			if ($this->aLinkGroup !== null) {
				if ($this->aLinkGroup->isModified()) {
					$affectedRows += $this->aLinkGroup->save($con);
				}
				$this->setLinkGroup($this->aLinkGroup);
			}

			if ($this->aLink !== null) {
				if ($this->aLink->isModified()) {
					$affectedRows += $this->aLink->save($con);
				}
				$this->setLink($this->aLink);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LinkGroupLinkPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LinkGroupLinkPeer::doUpdate($this, $con);
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


												
			if ($this->aLinkGroup !== null) {
				if (!$this->aLinkGroup->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLinkGroup->getValidationFailures());
				}
			}

			if ($this->aLink !== null) {
				if (!$this->aLink->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLink->getValidationFailures());
				}
			}


			if (($retval = LinkGroupLinkPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LinkGroupLinkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getLinkGroupId();
				break;
			case 1:
				return $this->getLinkId();
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
		$keys = LinkGroupLinkPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getLinkGroupId(),
			$keys[1] => $this->getLinkId(),
			$keys[2] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LinkGroupLinkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setLinkGroupId($value);
				break;
			case 1:
				$this->setLinkId($value);
				break;
			case 2:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LinkGroupLinkPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setLinkGroupId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLinkId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LinkGroupLinkPeer::DATABASE_NAME);

		if ($this->isColumnModified(LinkGroupLinkPeer::LINK_GROUP_ID)) $criteria->add(LinkGroupLinkPeer::LINK_GROUP_ID, $this->link_group_id);
		if ($this->isColumnModified(LinkGroupLinkPeer::LINK_ID)) $criteria->add(LinkGroupLinkPeer::LINK_ID, $this->link_id);
		if ($this->isColumnModified(LinkGroupLinkPeer::ID)) $criteria->add(LinkGroupLinkPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LinkGroupLinkPeer::DATABASE_NAME);

		$criteria->add(LinkGroupLinkPeer::ID, $this->id);

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

		$copyObj->setLinkGroupId($this->link_group_id);

		$copyObj->setLinkId($this->link_id);


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
			self::$peer = new LinkGroupLinkPeer();
		}
		return self::$peer;
	}

	
	public function setLinkGroup($v)
	{


		if ($v === null) {
			$this->setLinkGroupId(NULL);
		} else {
			$this->setLinkGroupId($v->getId());
		}


		$this->aLinkGroup = $v;
	}


	
	public function getLinkGroup($con = null)
	{
		if ($this->aLinkGroup === null && ($this->link_group_id !== null)) {
						include_once 'lib/model/om/BaseLinkGroupPeer.php';

			$this->aLinkGroup = LinkGroupPeer::retrieveByPK($this->link_group_id, $con);

			
		}
		return $this->aLinkGroup;
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
    if (!$callable = sfMixer::getCallable('BaseLinkGroupLink:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseLinkGroupLink::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 