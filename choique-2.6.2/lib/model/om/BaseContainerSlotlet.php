<?php


abstract class BaseContainerSlotlet extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $container_id;


	
	protected $slotlet_id;


	
	protected $name;


	
	protected $priority = 0;


	
	protected $rss_channel_id;


	
	protected $visible_rss = 3;

	
	protected $aContainer;

	
	protected $aSlotlet;

	
	protected $aRssChannel;

	
	protected $collShortcuts;

	
	protected $lastShortcutCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getContainerId()
	{

		return $this->container_id;
	}

	
	public function getSlotletId()
	{

		return $this->slotlet_id;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getPriority()
	{

		return $this->priority;
	}

	
	public function getRssChannelId()
	{

		return $this->rss_channel_id;
	}

	
	public function getVisibleRss()
	{

		return $this->visible_rss;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ContainerSlotletPeer::ID;
		}

	} 
	
	public function setContainerId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->container_id !== $v) {
			$this->container_id = $v;
			$this->modifiedColumns[] = ContainerSlotletPeer::CONTAINER_ID;
		}

		if ($this->aContainer !== null && $this->aContainer->getId() !== $v) {
			$this->aContainer = null;
		}

	} 
	
	public function setSlotletId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->slotlet_id !== $v) {
			$this->slotlet_id = $v;
			$this->modifiedColumns[] = ContainerSlotletPeer::SLOTLET_ID;
		}

		if ($this->aSlotlet !== null && $this->aSlotlet->getId() !== $v) {
			$this->aSlotlet = null;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = ContainerSlotletPeer::NAME;
		}

	} 
	
	public function setPriority($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->priority !== $v || $v === 0) {
			$this->priority = $v;
			$this->modifiedColumns[] = ContainerSlotletPeer::PRIORITY;
		}

	} 
	
	public function setRssChannelId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->rss_channel_id !== $v) {
			$this->rss_channel_id = $v;
			$this->modifiedColumns[] = ContainerSlotletPeer::RSS_CHANNEL_ID;
		}

		if ($this->aRssChannel !== null && $this->aRssChannel->getId() !== $v) {
			$this->aRssChannel = null;
		}

	} 
	
	public function setVisibleRss($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->visible_rss !== $v || $v === 3) {
			$this->visible_rss = $v;
			$this->modifiedColumns[] = ContainerSlotletPeer::VISIBLE_RSS;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->container_id = $rs->getInt($startcol + 1);

			$this->slotlet_id = $rs->getInt($startcol + 2);

			$this->name = $rs->getString($startcol + 3);

			$this->priority = $rs->getInt($startcol + 4);

			$this->rss_channel_id = $rs->getInt($startcol + 5);

			$this->visible_rss = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ContainerSlotlet object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseContainerSlotlet:delete:pre') as $callable)
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
			$con = Propel::getConnection(ContainerSlotletPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ContainerSlotletPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseContainerSlotlet:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseContainerSlotlet:save:pre') as $callable)
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
			$con = Propel::getConnection(ContainerSlotletPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseContainerSlotlet:save:post') as $callable)
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


												
			if ($this->aContainer !== null) {
				if ($this->aContainer->isModified()) {
					$affectedRows += $this->aContainer->save($con);
				}
				$this->setContainer($this->aContainer);
			}

			if ($this->aSlotlet !== null) {
				if ($this->aSlotlet->isModified()) {
					$affectedRows += $this->aSlotlet->save($con);
				}
				$this->setSlotlet($this->aSlotlet);
			}

			if ($this->aRssChannel !== null) {
				if ($this->aRssChannel->isModified()) {
					$affectedRows += $this->aRssChannel->save($con);
				}
				$this->setRssChannel($this->aRssChannel);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ContainerSlotletPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ContainerSlotletPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collShortcuts !== null) {
				foreach($this->collShortcuts as $referrerFK) {
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


												
			if ($this->aContainer !== null) {
				if (!$this->aContainer->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContainer->getValidationFailures());
				}
			}

			if ($this->aSlotlet !== null) {
				if (!$this->aSlotlet->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSlotlet->getValidationFailures());
				}
			}

			if ($this->aRssChannel !== null) {
				if (!$this->aRssChannel->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRssChannel->getValidationFailures());
				}
			}


			if (($retval = ContainerSlotletPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collShortcuts !== null) {
					foreach($this->collShortcuts as $referrerFK) {
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
		$pos = ContainerSlotletPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getContainerId();
				break;
			case 2:
				return $this->getSlotletId();
				break;
			case 3:
				return $this->getName();
				break;
			case 4:
				return $this->getPriority();
				break;
			case 5:
				return $this->getRssChannelId();
				break;
			case 6:
				return $this->getVisibleRss();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContainerSlotletPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getContainerId(),
			$keys[2] => $this->getSlotletId(),
			$keys[3] => $this->getName(),
			$keys[4] => $this->getPriority(),
			$keys[5] => $this->getRssChannelId(),
			$keys[6] => $this->getVisibleRss(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ContainerSlotletPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setContainerId($value);
				break;
			case 2:
				$this->setSlotletId($value);
				break;
			case 3:
				$this->setName($value);
				break;
			case 4:
				$this->setPriority($value);
				break;
			case 5:
				$this->setRssChannelId($value);
				break;
			case 6:
				$this->setVisibleRss($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ContainerSlotletPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setContainerId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setSlotletId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setName($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPriority($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRssChannelId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setVisibleRss($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ContainerSlotletPeer::DATABASE_NAME);

		if ($this->isColumnModified(ContainerSlotletPeer::ID)) $criteria->add(ContainerSlotletPeer::ID, $this->id);
		if ($this->isColumnModified(ContainerSlotletPeer::CONTAINER_ID)) $criteria->add(ContainerSlotletPeer::CONTAINER_ID, $this->container_id);
		if ($this->isColumnModified(ContainerSlotletPeer::SLOTLET_ID)) $criteria->add(ContainerSlotletPeer::SLOTLET_ID, $this->slotlet_id);
		if ($this->isColumnModified(ContainerSlotletPeer::NAME)) $criteria->add(ContainerSlotletPeer::NAME, $this->name);
		if ($this->isColumnModified(ContainerSlotletPeer::PRIORITY)) $criteria->add(ContainerSlotletPeer::PRIORITY, $this->priority);
		if ($this->isColumnModified(ContainerSlotletPeer::RSS_CHANNEL_ID)) $criteria->add(ContainerSlotletPeer::RSS_CHANNEL_ID, $this->rss_channel_id);
		if ($this->isColumnModified(ContainerSlotletPeer::VISIBLE_RSS)) $criteria->add(ContainerSlotletPeer::VISIBLE_RSS, $this->visible_rss);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ContainerSlotletPeer::DATABASE_NAME);

		$criteria->add(ContainerSlotletPeer::ID, $this->id);

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

		$copyObj->setContainerId($this->container_id);

		$copyObj->setSlotletId($this->slotlet_id);

		$copyObj->setName($this->name);

		$copyObj->setPriority($this->priority);

		$copyObj->setRssChannelId($this->rss_channel_id);

		$copyObj->setVisibleRss($this->visible_rss);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getShortcuts() as $relObj) {
				$copyObj->addShortcut($relObj->copy($deepCopy));
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
			self::$peer = new ContainerSlotletPeer();
		}
		return self::$peer;
	}

	
	public function setContainer($v)
	{


		if ($v === null) {
			$this->setContainerId(NULL);
		} else {
			$this->setContainerId($v->getId());
		}


		$this->aContainer = $v;
	}


	
	public function getContainer($con = null)
	{
		if ($this->aContainer === null && ($this->container_id !== null)) {
						include_once 'lib/model/om/BaseContainerPeer.php';

			$this->aContainer = ContainerPeer::retrieveByPK($this->container_id, $con);

			
		}
		return $this->aContainer;
	}

	
	public function setSlotlet($v)
	{


		if ($v === null) {
			$this->setSlotletId(NULL);
		} else {
			$this->setSlotletId($v->getId());
		}


		$this->aSlotlet = $v;
	}


	
	public function getSlotlet($con = null)
	{
		if ($this->aSlotlet === null && ($this->slotlet_id !== null)) {
						include_once 'lib/model/om/BaseSlotletPeer.php';

			$this->aSlotlet = SlotletPeer::retrieveByPK($this->slotlet_id, $con);

			
		}
		return $this->aSlotlet;
	}

	
	public function setRssChannel($v)
	{


		if ($v === null) {
			$this->setRssChannelId(NULL);
		} else {
			$this->setRssChannelId($v->getId());
		}


		$this->aRssChannel = $v;
	}


	
	public function getRssChannel($con = null)
	{
		if ($this->aRssChannel === null && ($this->rss_channel_id !== null)) {
						include_once 'lib/model/om/BaseRssChannelPeer.php';

			$this->aRssChannel = RssChannelPeer::retrieveByPK($this->rss_channel_id, $con);

			
		}
		return $this->aRssChannel;
	}

	
	public function initShortcuts()
	{
		if ($this->collShortcuts === null) {
			$this->collShortcuts = array();
		}
	}

	
	public function getShortcuts($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShortcuts === null) {
			if ($this->isNew()) {
			   $this->collShortcuts = array();
			} else {

				$criteria->add(ShortcutPeer::CONTAINER_SLOTLET_ID, $this->getId());

				ShortcutPeer::addSelectColumns($criteria);
				$this->collShortcuts = ShortcutPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ShortcutPeer::CONTAINER_SLOTLET_ID, $this->getId());

				ShortcutPeer::addSelectColumns($criteria);
				if (!isset($this->lastShortcutCriteria) || !$this->lastShortcutCriteria->equals($criteria)) {
					$this->collShortcuts = ShortcutPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastShortcutCriteria = $criteria;
		return $this->collShortcuts;
	}

	
	public function countShortcuts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ShortcutPeer::CONTAINER_SLOTLET_ID, $this->getId());

		return ShortcutPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addShortcut(Shortcut $l)
	{
		$this->collShortcuts[] = $l;
		$l->setContainerSlotlet($this);
	}


	
	public function getShortcutsJoinMultimedia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShortcuts === null) {
			if ($this->isNew()) {
				$this->collShortcuts = array();
			} else {

				$criteria->add(ShortcutPeer::CONTAINER_SLOTLET_ID, $this->getId());

				$this->collShortcuts = ShortcutPeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(ShortcutPeer::CONTAINER_SLOTLET_ID, $this->getId());

			if (!isset($this->lastShortcutCriteria) || !$this->lastShortcutCriteria->equals($criteria)) {
				$this->collShortcuts = ShortcutPeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastShortcutCriteria = $criteria;

		return $this->collShortcuts;
	}


	
	public function getShortcutsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShortcuts === null) {
			if ($this->isNew()) {
				$this->collShortcuts = array();
			} else {

				$criteria->add(ShortcutPeer::CONTAINER_SLOTLET_ID, $this->getId());

				$this->collShortcuts = ShortcutPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ShortcutPeer::CONTAINER_SLOTLET_ID, $this->getId());

			if (!isset($this->lastShortcutCriteria) || !$this->lastShortcutCriteria->equals($criteria)) {
				$this->collShortcuts = ShortcutPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastShortcutCriteria = $criteria;

		return $this->collShortcuts;
	}


	
	public function getShortcutsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShortcuts === null) {
			if ($this->isNew()) {
				$this->collShortcuts = array();
			} else {

				$criteria->add(ShortcutPeer::CONTAINER_SLOTLET_ID, $this->getId());

				$this->collShortcuts = ShortcutPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ShortcutPeer::CONTAINER_SLOTLET_ID, $this->getId());

			if (!isset($this->lastShortcutCriteria) || !$this->lastShortcutCriteria->equals($criteria)) {
				$this->collShortcuts = ShortcutPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastShortcutCriteria = $criteria;

		return $this->collShortcuts;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseContainerSlotlet:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseContainerSlotlet::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 