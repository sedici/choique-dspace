<?php


abstract class BaseShortcut extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $multimedia_id;


	
	protected $container_slotlet_id;


	
	protected $title;


	
	protected $body;


	
	protected $reference;


	
	protected $reference_type = 0;


	
	protected $open_in_new_window = 0;


	
	protected $priority = 0;


	
	protected $comment;


	
	protected $is_published = 0;


	
	protected $created_by;


	
	protected $created_at;


	
	protected $updated_by;


	
	protected $updated_at;

	
	protected $aMultimedia;

	
	protected $aContainerSlotlet;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getMultimediaId()
	{

		return $this->multimedia_id;
	}

	
	public function getContainerSlotletId()
	{

		return $this->container_slotlet_id;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getBody()
	{

		return $this->body;
	}

	
	public function getReference()
	{

		return $this->reference;
	}

	
	public function getReferenceType()
	{

		return $this->reference_type;
	}

	
	public function getOpenInNewWindow()
	{

		return $this->open_in_new_window;
	}

	
	public function getPriority()
	{

		return $this->priority;
	}

	
	public function getComment()
	{

		return $this->comment;
	}

	
	public function getIsPublished()
	{

		return $this->is_published;
	}

	
	public function getCreatedBy()
	{

		return $this->created_by;
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

	
	public function getUpdatedBy()
	{

		return $this->updated_by;
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

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ShortcutPeer::ID;
		}

	} 
	
	public function setMultimediaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->multimedia_id !== $v) {
			$this->multimedia_id = $v;
			$this->modifiedColumns[] = ShortcutPeer::MULTIMEDIA_ID;
		}

		if ($this->aMultimedia !== null && $this->aMultimedia->getId() !== $v) {
			$this->aMultimedia = null;
		}

	} 
	
	public function setContainerSlotletId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->container_slotlet_id !== $v) {
			$this->container_slotlet_id = $v;
			$this->modifiedColumns[] = ShortcutPeer::CONTAINER_SLOTLET_ID;
		}

		if ($this->aContainerSlotlet !== null && $this->aContainerSlotlet->getId() !== $v) {
			$this->aContainerSlotlet = null;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = ShortcutPeer::TITLE;
		}

	} 
	
	public function setBody($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->body !== $v) {
			$this->body = $v;
			$this->modifiedColumns[] = ShortcutPeer::BODY;
		}

	} 
	
	public function setReference($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->reference !== $v) {
			$this->reference = $v;
			$this->modifiedColumns[] = ShortcutPeer::REFERENCE;
		}

	} 
	
	public function setReferenceType($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->reference_type !== $v || $v === 0) {
			$this->reference_type = $v;
			$this->modifiedColumns[] = ShortcutPeer::REFERENCE_TYPE;
		}

	} 
	
	public function setOpenInNewWindow($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->open_in_new_window !== $v || $v === 0) {
			$this->open_in_new_window = $v;
			$this->modifiedColumns[] = ShortcutPeer::OPEN_IN_NEW_WINDOW;
		}

	} 
	
	public function setPriority($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->priority !== $v || $v === 0) {
			$this->priority = $v;
			$this->modifiedColumns[] = ShortcutPeer::PRIORITY;
		}

	} 
	
	public function setComment($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = ShortcutPeer::COMMENT;
		}

	} 
	
	public function setIsPublished($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_published !== $v || $v === 0) {
			$this->is_published = $v;
			$this->modifiedColumns[] = ShortcutPeer::IS_PUBLISHED;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ShortcutPeer::CREATED_BY;
		}

		if ($this->asfGuardUserRelatedByCreatedBy !== null && $this->asfGuardUserRelatedByCreatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByCreatedBy = null;
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
			$this->modifiedColumns[] = ShortcutPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = ShortcutPeer::UPDATED_BY;
		}

		if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->asfGuardUserRelatedByUpdatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByUpdatedBy = null;
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
			$this->modifiedColumns[] = ShortcutPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->multimedia_id = $rs->getInt($startcol + 1);

			$this->container_slotlet_id = $rs->getInt($startcol + 2);

			$this->title = $rs->getString($startcol + 3);

			$this->body = $rs->getString($startcol + 4);

			$this->reference = $rs->getString($startcol + 5);

			$this->reference_type = $rs->getInt($startcol + 6);

			$this->open_in_new_window = $rs->getInt($startcol + 7);

			$this->priority = $rs->getInt($startcol + 8);

			$this->comment = $rs->getString($startcol + 9);

			$this->is_published = $rs->getInt($startcol + 10);

			$this->created_by = $rs->getInt($startcol + 11);

			$this->created_at = $rs->getTimestamp($startcol + 12, null);

			$this->updated_by = $rs->getInt($startcol + 13);

			$this->updated_at = $rs->getTimestamp($startcol + 14, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 15; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Shortcut object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseShortcut:delete:pre') as $callable)
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
			$con = Propel::getConnection(ShortcutPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ShortcutPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseShortcut:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseShortcut:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(ShortcutPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ShortcutPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ShortcutPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseShortcut:save:post') as $callable)
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


												
			if ($this->aMultimedia !== null) {
				if ($this->aMultimedia->isModified()) {
					$affectedRows += $this->aMultimedia->save($con);
				}
				$this->setMultimedia($this->aMultimedia);
			}

			if ($this->aContainerSlotlet !== null) {
				if ($this->aContainerSlotlet->isModified()) {
					$affectedRows += $this->aContainerSlotlet->save($con);
				}
				$this->setContainerSlotlet($this->aContainerSlotlet);
			}

			if ($this->asfGuardUserRelatedByCreatedBy !== null) {
				if ($this->asfGuardUserRelatedByCreatedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByCreatedBy->save($con);
				}
				$this->setsfGuardUserRelatedByCreatedBy($this->asfGuardUserRelatedByCreatedBy);
			}

			if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
				if ($this->asfGuardUserRelatedByUpdatedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByUpdatedBy->save($con);
				}
				$this->setsfGuardUserRelatedByUpdatedBy($this->asfGuardUserRelatedByUpdatedBy);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ShortcutPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ShortcutPeer::doUpdate($this, $con);
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


												
			if ($this->aMultimedia !== null) {
				if (!$this->aMultimedia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMultimedia->getValidationFailures());
				}
			}

			if ($this->aContainerSlotlet !== null) {
				if (!$this->aContainerSlotlet->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aContainerSlotlet->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByCreatedBy !== null) {
				if (!$this->asfGuardUserRelatedByCreatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByCreatedBy->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
				if (!$this->asfGuardUserRelatedByUpdatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByUpdatedBy->getValidationFailures());
				}
			}


			if (($retval = ShortcutPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ShortcutPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getMultimediaId();
				break;
			case 2:
				return $this->getContainerSlotletId();
				break;
			case 3:
				return $this->getTitle();
				break;
			case 4:
				return $this->getBody();
				break;
			case 5:
				return $this->getReference();
				break;
			case 6:
				return $this->getReferenceType();
				break;
			case 7:
				return $this->getOpenInNewWindow();
				break;
			case 8:
				return $this->getPriority();
				break;
			case 9:
				return $this->getComment();
				break;
			case 10:
				return $this->getIsPublished();
				break;
			case 11:
				return $this->getCreatedBy();
				break;
			case 12:
				return $this->getCreatedAt();
				break;
			case 13:
				return $this->getUpdatedBy();
				break;
			case 14:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ShortcutPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMultimediaId(),
			$keys[2] => $this->getContainerSlotletId(),
			$keys[3] => $this->getTitle(),
			$keys[4] => $this->getBody(),
			$keys[5] => $this->getReference(),
			$keys[6] => $this->getReferenceType(),
			$keys[7] => $this->getOpenInNewWindow(),
			$keys[8] => $this->getPriority(),
			$keys[9] => $this->getComment(),
			$keys[10] => $this->getIsPublished(),
			$keys[11] => $this->getCreatedBy(),
			$keys[12] => $this->getCreatedAt(),
			$keys[13] => $this->getUpdatedBy(),
			$keys[14] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ShortcutPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMultimediaId($value);
				break;
			case 2:
				$this->setContainerSlotletId($value);
				break;
			case 3:
				$this->setTitle($value);
				break;
			case 4:
				$this->setBody($value);
				break;
			case 5:
				$this->setReference($value);
				break;
			case 6:
				$this->setReferenceType($value);
				break;
			case 7:
				$this->setOpenInNewWindow($value);
				break;
			case 8:
				$this->setPriority($value);
				break;
			case 9:
				$this->setComment($value);
				break;
			case 10:
				$this->setIsPublished($value);
				break;
			case 11:
				$this->setCreatedBy($value);
				break;
			case 12:
				$this->setCreatedAt($value);
				break;
			case 13:
				$this->setUpdatedBy($value);
				break;
			case 14:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ShortcutPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMultimediaId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setContainerSlotletId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTitle($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBody($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setReference($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setReferenceType($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setOpenInNewWindow($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPriority($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setComment($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIsPublished($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedAt($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUpdatedBy($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedAt($arr[$keys[14]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ShortcutPeer::DATABASE_NAME);

		if ($this->isColumnModified(ShortcutPeer::ID)) $criteria->add(ShortcutPeer::ID, $this->id);
		if ($this->isColumnModified(ShortcutPeer::MULTIMEDIA_ID)) $criteria->add(ShortcutPeer::MULTIMEDIA_ID, $this->multimedia_id);
		if ($this->isColumnModified(ShortcutPeer::CONTAINER_SLOTLET_ID)) $criteria->add(ShortcutPeer::CONTAINER_SLOTLET_ID, $this->container_slotlet_id);
		if ($this->isColumnModified(ShortcutPeer::TITLE)) $criteria->add(ShortcutPeer::TITLE, $this->title);
		if ($this->isColumnModified(ShortcutPeer::BODY)) $criteria->add(ShortcutPeer::BODY, $this->body);
		if ($this->isColumnModified(ShortcutPeer::REFERENCE)) $criteria->add(ShortcutPeer::REFERENCE, $this->reference);
		if ($this->isColumnModified(ShortcutPeer::REFERENCE_TYPE)) $criteria->add(ShortcutPeer::REFERENCE_TYPE, $this->reference_type);
		if ($this->isColumnModified(ShortcutPeer::OPEN_IN_NEW_WINDOW)) $criteria->add(ShortcutPeer::OPEN_IN_NEW_WINDOW, $this->open_in_new_window);
		if ($this->isColumnModified(ShortcutPeer::PRIORITY)) $criteria->add(ShortcutPeer::PRIORITY, $this->priority);
		if ($this->isColumnModified(ShortcutPeer::COMMENT)) $criteria->add(ShortcutPeer::COMMENT, $this->comment);
		if ($this->isColumnModified(ShortcutPeer::IS_PUBLISHED)) $criteria->add(ShortcutPeer::IS_PUBLISHED, $this->is_published);
		if ($this->isColumnModified(ShortcutPeer::CREATED_BY)) $criteria->add(ShortcutPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ShortcutPeer::CREATED_AT)) $criteria->add(ShortcutPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ShortcutPeer::UPDATED_BY)) $criteria->add(ShortcutPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(ShortcutPeer::UPDATED_AT)) $criteria->add(ShortcutPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ShortcutPeer::DATABASE_NAME);

		$criteria->add(ShortcutPeer::ID, $this->id);

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

		$copyObj->setMultimediaId($this->multimedia_id);

		$copyObj->setContainerSlotletId($this->container_slotlet_id);

		$copyObj->setTitle($this->title);

		$copyObj->setBody($this->body);

		$copyObj->setReference($this->reference);

		$copyObj->setReferenceType($this->reference_type);

		$copyObj->setOpenInNewWindow($this->open_in_new_window);

		$copyObj->setPriority($this->priority);

		$copyObj->setComment($this->comment);

		$copyObj->setIsPublished($this->is_published);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedAt($this->updated_at);


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
			self::$peer = new ShortcutPeer();
		}
		return self::$peer;
	}

	
	public function setMultimedia($v)
	{


		if ($v === null) {
			$this->setMultimediaId(NULL);
		} else {
			$this->setMultimediaId($v->getId());
		}


		$this->aMultimedia = $v;
	}


	
	public function getMultimedia($con = null)
	{
		if ($this->aMultimedia === null && ($this->multimedia_id !== null)) {
						include_once 'lib/model/om/BaseMultimediaPeer.php';

			$this->aMultimedia = MultimediaPeer::retrieveByPK($this->multimedia_id, $con);

			
		}
		return $this->aMultimedia;
	}

	
	public function setContainerSlotlet($v)
	{


		if ($v === null) {
			$this->setContainerSlotletId(NULL);
		} else {
			$this->setContainerSlotletId($v->getId());
		}


		$this->aContainerSlotlet = $v;
	}


	
	public function getContainerSlotlet($con = null)
	{
		if ($this->aContainerSlotlet === null && ($this->container_slotlet_id !== null)) {
						include_once 'lib/model/om/BaseContainerSlotletPeer.php';

			$this->aContainerSlotlet = ContainerSlotletPeer::retrieveByPK($this->container_slotlet_id, $con);

			
		}
		return $this->aContainerSlotlet;
	}

	
	public function setsfGuardUserRelatedByCreatedBy($v)
	{


		if ($v === null) {
			$this->setCreatedBy(NULL);
		} else {
			$this->setCreatedBy($v->getId());
		}


		$this->asfGuardUserRelatedByCreatedBy = $v;
	}


	
	public function getsfGuardUserRelatedByCreatedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByCreatedBy === null && ($this->created_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByCreatedBy = sfGuardUserPeer::retrieveByPK($this->created_by, $con);

			
		}
		return $this->asfGuardUserRelatedByCreatedBy;
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


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseShortcut:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseShortcut::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 