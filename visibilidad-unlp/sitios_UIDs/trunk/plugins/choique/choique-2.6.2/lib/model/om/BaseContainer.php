<?php


abstract class BaseContainer extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;

	
	protected $collContainerSlotlets;

	
	protected $lastContainerSlotletCriteria = null;

	
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

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ContainerPeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = ContainerPeer::NAME;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Container object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseContainer:delete:pre') as $callable)
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
			$con = Propel::getConnection(ContainerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ContainerPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseContainer:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseContainer:save:pre') as $callable)
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
			$con = Propel::getConnection(ContainerPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseContainer:save:post') as $callable)
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ContainerPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ContainerPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collContainerSlotlets !== null) {
				foreach($this->collContainerSlotlets as $referrerFK) {
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


			if (($retval = ContainerPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collContainerSlotlets !== null) {
					foreach($this->collContainerSlotlets as $referrerFK) {
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
		$pos = ContainerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContainerPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContainerPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContainerPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ContainerPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContainerPeer::ID)) $criteria->add(ContainerPeer::ID, $this->id);
		if ($this->isColumnModified(ContainerPeer::NAME)) $criteria->add(ContainerPeer::NAME, $this->name);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContainerPeer::DATABASE_NAME);

		$criteria->add(ContainerPeer::ID, $this->id);

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


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getContainerSlotlets() as $relObj) {
				$copyObj->addContainerSlotlet($relObj->copy($deepCopy));
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
			self::$peer = new ContainerPeer();
		}
		return self::$peer;
	}

	
	public function initContainerSlotlets()
	{
		if ($this->collContainerSlotlets === null) {
			$this->collContainerSlotlets = array();
		}
	}

	
	public function getContainerSlotlets($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseContainerSlotletPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContainerSlotlets === null) {
			if ($this->isNew()) {
			   $this->collContainerSlotlets = array();
			} else {

				$criteria->add(ContainerSlotletPeer::CONTAINER_ID, $this->getId());

				ContainerSlotletPeer::addSelectColumns($criteria);
				$this->collContainerSlotlets = ContainerSlotletPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ContainerSlotletPeer::CONTAINER_ID, $this->getId());

				ContainerSlotletPeer::addSelectColumns($criteria);
				if (!isset($this->lastContainerSlotletCriteria) || !$this->lastContainerSlotletCriteria->equals($criteria)) {
					$this->collContainerSlotlets = ContainerSlotletPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastContainerSlotletCriteria = $criteria;
		return $this->collContainerSlotlets;
	}

	
	public function countContainerSlotlets($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseContainerSlotletPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ContainerSlotletPeer::CONTAINER_ID, $this->getId());

		return ContainerSlotletPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addContainerSlotlet(ContainerSlotlet $l)
	{
		$this->collContainerSlotlets[] = $l;
		$l->setContainer($this);
	}


	
	public function getContainerSlotletsJoinSlotlet($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseContainerSlotletPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContainerSlotlets === null) {
			if ($this->isNew()) {
				$this->collContainerSlotlets = array();
			} else {

				$criteria->add(ContainerSlotletPeer::CONTAINER_ID, $this->getId());

				$this->collContainerSlotlets = ContainerSlotletPeer::doSelectJoinSlotlet($criteria, $con);
			}
		} else {
									
			$criteria->add(ContainerSlotletPeer::CONTAINER_ID, $this->getId());

			if (!isset($this->lastContainerSlotletCriteria) || !$this->lastContainerSlotletCriteria->equals($criteria)) {
				$this->collContainerSlotlets = ContainerSlotletPeer::doSelectJoinSlotlet($criteria, $con);
			}
		}
		$this->lastContainerSlotletCriteria = $criteria;

		return $this->collContainerSlotlets;
	}


	
	public function getContainerSlotletsJoinRssChannel($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseContainerSlotletPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collContainerSlotlets === null) {
			if ($this->isNew()) {
				$this->collContainerSlotlets = array();
			} else {

				$criteria->add(ContainerSlotletPeer::CONTAINER_ID, $this->getId());

				$this->collContainerSlotlets = ContainerSlotletPeer::doSelectJoinRssChannel($criteria, $con);
			}
		} else {
									
			$criteria->add(ContainerSlotletPeer::CONTAINER_ID, $this->getId());

			if (!isset($this->lastContainerSlotletCriteria) || !$this->lastContainerSlotletCriteria->equals($criteria)) {
				$this->collContainerSlotlets = ContainerSlotletPeer::doSelectJoinRssChannel($criteria, $con);
			}
		}
		$this->lastContainerSlotletCriteria = $criteria;

		return $this->collContainerSlotlets;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseContainer:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseContainer::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 