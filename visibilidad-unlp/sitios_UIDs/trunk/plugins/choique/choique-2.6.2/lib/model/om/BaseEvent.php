<?php


abstract class BaseEvent extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $is_published;


	
	protected $title;


	
	protected $description;


	
	protected $location;


	
	protected $contact;


	
	protected $organizer;


	
	protected $author;


	
	protected $comment;


	
	protected $begins_at;


	
	protected $ends_at;


	
	protected $article_id;


	
	protected $event_type_id;


	
	protected $created_at;


	
	protected $updated_by;


	
	protected $updated_at;


	
	protected $multimedia_id;

	
	protected $asfGuardUserRelatedByAuthor;

	
	protected $aArticle;

	
	protected $aEventType;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $aMultimedia;

	
	protected $collEventSections;

	
	protected $lastEventSectionCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIsPublished()
	{

		return $this->is_published;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getLocation()
	{

		return $this->location;
	}

	
	public function getContact()
	{

		return $this->contact;
	}

	
	public function getOrganizer()
	{

		return $this->organizer;
	}

	
	public function getAuthor()
	{

		return $this->author;
	}

	
	public function getComment()
	{

		return $this->comment;
	}

	
	public function getBeginsAt($format = 'Y-m-d H:i:s')
	{

		if ($this->begins_at === null || $this->begins_at === '') {
			return null;
		} elseif (!is_int($this->begins_at)) {
						$ts = strtotime($this->begins_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [begins_at] as date/time value: " . var_export($this->begins_at, true));
			}
		} else {
			$ts = $this->begins_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getEndsAt($format = 'Y-m-d H:i:s')
	{

		if ($this->ends_at === null || $this->ends_at === '') {
			return null;
		} elseif (!is_int($this->ends_at)) {
						$ts = strtotime($this->ends_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [ends_at] as date/time value: " . var_export($this->ends_at, true));
			}
		} else {
			$ts = $this->ends_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getArticleId()
	{

		return $this->article_id;
	}

	
	public function getEventTypeId()
	{

		return $this->event_type_id;
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

	
	public function getMultimediaId()
	{

		return $this->multimedia_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EventPeer::ID;
		}

	} 
	
	public function setIsPublished($v)
	{

		if ($this->is_published !== $v) {
			$this->is_published = $v;
			$this->modifiedColumns[] = EventPeer::IS_PUBLISHED;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = EventPeer::TITLE;
		}

	} 
	
	public function setDescription($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = EventPeer::DESCRIPTION;
		}

	} 
	
	public function setLocation($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->location !== $v) {
			$this->location = $v;
			$this->modifiedColumns[] = EventPeer::LOCATION;
		}

	} 
	
	public function setContact($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact !== $v) {
			$this->contact = $v;
			$this->modifiedColumns[] = EventPeer::CONTACT;
		}

	} 
	
	public function setOrganizer($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->organizer !== $v) {
			$this->organizer = $v;
			$this->modifiedColumns[] = EventPeer::ORGANIZER;
		}

	} 
	
	public function setAuthor($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->author !== $v) {
			$this->author = $v;
			$this->modifiedColumns[] = EventPeer::AUTHOR;
		}

		if ($this->asfGuardUserRelatedByAuthor !== null && $this->asfGuardUserRelatedByAuthor->getId() !== $v) {
			$this->asfGuardUserRelatedByAuthor = null;
		}

	} 
	
	public function setComment($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = EventPeer::COMMENT;
		}

	} 
	
	public function setBeginsAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [begins_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->begins_at !== $ts) {
			$this->begins_at = $ts;
			$this->modifiedColumns[] = EventPeer::BEGINS_AT;
		}

	} 
	
	public function setEndsAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [ends_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->ends_at !== $ts) {
			$this->ends_at = $ts;
			$this->modifiedColumns[] = EventPeer::ENDS_AT;
		}

	} 
	
	public function setArticleId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->article_id !== $v) {
			$this->article_id = $v;
			$this->modifiedColumns[] = EventPeer::ARTICLE_ID;
		}

		if ($this->aArticle !== null && $this->aArticle->getId() !== $v) {
			$this->aArticle = null;
		}

	} 
	
	public function setEventTypeId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->event_type_id !== $v) {
			$this->event_type_id = $v;
			$this->modifiedColumns[] = EventPeer::EVENT_TYPE_ID;
		}

		if ($this->aEventType !== null && $this->aEventType->getId() !== $v) {
			$this->aEventType = null;
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
			$this->modifiedColumns[] = EventPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = EventPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = EventPeer::UPDATED_AT;
		}

	} 
	
	public function setMultimediaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->multimedia_id !== $v) {
			$this->multimedia_id = $v;
			$this->modifiedColumns[] = EventPeer::MULTIMEDIA_ID;
		}

		if ($this->aMultimedia !== null && $this->aMultimedia->getId() !== $v) {
			$this->aMultimedia = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->is_published = $rs->getBoolean($startcol + 1);

			$this->title = $rs->getString($startcol + 2);

			$this->description = $rs->getString($startcol + 3);

			$this->location = $rs->getString($startcol + 4);

			$this->contact = $rs->getString($startcol + 5);

			$this->organizer = $rs->getString($startcol + 6);

			$this->author = $rs->getInt($startcol + 7);

			$this->comment = $rs->getString($startcol + 8);

			$this->begins_at = $rs->getTimestamp($startcol + 9, null);

			$this->ends_at = $rs->getTimestamp($startcol + 10, null);

			$this->article_id = $rs->getInt($startcol + 11);

			$this->event_type_id = $rs->getInt($startcol + 12);

			$this->created_at = $rs->getTimestamp($startcol + 13, null);

			$this->updated_by = $rs->getInt($startcol + 14);

			$this->updated_at = $rs->getTimestamp($startcol + 15, null);

			$this->multimedia_id = $rs->getInt($startcol + 16);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 17; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Event object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseEvent:delete:pre') as $callable)
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
			$con = Propel::getConnection(EventPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			EventPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseEvent:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseEvent:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(EventPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(EventPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EventPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseEvent:save:post') as $callable)
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


												
			if ($this->asfGuardUserRelatedByAuthor !== null) {
				if ($this->asfGuardUserRelatedByAuthor->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByAuthor->save($con);
				}
				$this->setsfGuardUserRelatedByAuthor($this->asfGuardUserRelatedByAuthor);
			}

			if ($this->aArticle !== null) {
				if ($this->aArticle->isModified()) {
					$affectedRows += $this->aArticle->save($con);
				}
				$this->setArticle($this->aArticle);
			}

			if ($this->aEventType !== null) {
				if ($this->aEventType->isModified()) {
					$affectedRows += $this->aEventType->save($con);
				}
				$this->setEventType($this->aEventType);
			}

			if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
				if ($this->asfGuardUserRelatedByUpdatedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByUpdatedBy->save($con);
				}
				$this->setsfGuardUserRelatedByUpdatedBy($this->asfGuardUserRelatedByUpdatedBy);
			}

			if ($this->aMultimedia !== null) {
				if ($this->aMultimedia->isModified()) {
					$affectedRows += $this->aMultimedia->save($con);
				}
				$this->setMultimedia($this->aMultimedia);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EventPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EventPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collEventSections !== null) {
				foreach($this->collEventSections as $referrerFK) {
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


												
			if ($this->asfGuardUserRelatedByAuthor !== null) {
				if (!$this->asfGuardUserRelatedByAuthor->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByAuthor->getValidationFailures());
				}
			}

			if ($this->aArticle !== null) {
				if (!$this->aArticle->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArticle->getValidationFailures());
				}
			}

			if ($this->aEventType !== null) {
				if (!$this->aEventType->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEventType->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
				if (!$this->asfGuardUserRelatedByUpdatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByUpdatedBy->getValidationFailures());
				}
			}

			if ($this->aMultimedia !== null) {
				if (!$this->aMultimedia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMultimedia->getValidationFailures());
				}
			}


			if (($retval = EventPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collEventSections !== null) {
					foreach($this->collEventSections as $referrerFK) {
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
		$pos = EventPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIsPublished();
				break;
			case 2:
				return $this->getTitle();
				break;
			case 3:
				return $this->getDescription();
				break;
			case 4:
				return $this->getLocation();
				break;
			case 5:
				return $this->getContact();
				break;
			case 6:
				return $this->getOrganizer();
				break;
			case 7:
				return $this->getAuthor();
				break;
			case 8:
				return $this->getComment();
				break;
			case 9:
				return $this->getBeginsAt();
				break;
			case 10:
				return $this->getEndsAt();
				break;
			case 11:
				return $this->getArticleId();
				break;
			case 12:
				return $this->getEventTypeId();
				break;
			case 13:
				return $this->getCreatedAt();
				break;
			case 14:
				return $this->getUpdatedBy();
				break;
			case 15:
				return $this->getUpdatedAt();
				break;
			case 16:
				return $this->getMultimediaId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EventPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIsPublished(),
			$keys[2] => $this->getTitle(),
			$keys[3] => $this->getDescription(),
			$keys[4] => $this->getLocation(),
			$keys[5] => $this->getContact(),
			$keys[6] => $this->getOrganizer(),
			$keys[7] => $this->getAuthor(),
			$keys[8] => $this->getComment(),
			$keys[9] => $this->getBeginsAt(),
			$keys[10] => $this->getEndsAt(),
			$keys[11] => $this->getArticleId(),
			$keys[12] => $this->getEventTypeId(),
			$keys[13] => $this->getCreatedAt(),
			$keys[14] => $this->getUpdatedBy(),
			$keys[15] => $this->getUpdatedAt(),
			$keys[16] => $this->getMultimediaId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EventPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIsPublished($value);
				break;
			case 2:
				$this->setTitle($value);
				break;
			case 3:
				$this->setDescription($value);
				break;
			case 4:
				$this->setLocation($value);
				break;
			case 5:
				$this->setContact($value);
				break;
			case 6:
				$this->setOrganizer($value);
				break;
			case 7:
				$this->setAuthor($value);
				break;
			case 8:
				$this->setComment($value);
				break;
			case 9:
				$this->setBeginsAt($value);
				break;
			case 10:
				$this->setEndsAt($value);
				break;
			case 11:
				$this->setArticleId($value);
				break;
			case 12:
				$this->setEventTypeId($value);
				break;
			case 13:
				$this->setCreatedAt($value);
				break;
			case 14:
				$this->setUpdatedBy($value);
				break;
			case 15:
				$this->setUpdatedAt($value);
				break;
			case 16:
				$this->setMultimediaId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EventPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIsPublished($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitle($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLocation($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setContact($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setOrganizer($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAuthor($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setComment($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setBeginsAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setEndsAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setArticleId($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setEventTypeId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setCreatedAt($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setUpdatedBy($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setUpdatedAt($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setMultimediaId($arr[$keys[16]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EventPeer::DATABASE_NAME);

		if ($this->isColumnModified(EventPeer::ID)) $criteria->add(EventPeer::ID, $this->id);
		if ($this->isColumnModified(EventPeer::IS_PUBLISHED)) $criteria->add(EventPeer::IS_PUBLISHED, $this->is_published);
		if ($this->isColumnModified(EventPeer::TITLE)) $criteria->add(EventPeer::TITLE, $this->title);
		if ($this->isColumnModified(EventPeer::DESCRIPTION)) $criteria->add(EventPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(EventPeer::LOCATION)) $criteria->add(EventPeer::LOCATION, $this->location);
		if ($this->isColumnModified(EventPeer::CONTACT)) $criteria->add(EventPeer::CONTACT, $this->contact);
		if ($this->isColumnModified(EventPeer::ORGANIZER)) $criteria->add(EventPeer::ORGANIZER, $this->organizer);
		if ($this->isColumnModified(EventPeer::AUTHOR)) $criteria->add(EventPeer::AUTHOR, $this->author);
		if ($this->isColumnModified(EventPeer::COMMENT)) $criteria->add(EventPeer::COMMENT, $this->comment);
		if ($this->isColumnModified(EventPeer::BEGINS_AT)) $criteria->add(EventPeer::BEGINS_AT, $this->begins_at);
		if ($this->isColumnModified(EventPeer::ENDS_AT)) $criteria->add(EventPeer::ENDS_AT, $this->ends_at);
		if ($this->isColumnModified(EventPeer::ARTICLE_ID)) $criteria->add(EventPeer::ARTICLE_ID, $this->article_id);
		if ($this->isColumnModified(EventPeer::EVENT_TYPE_ID)) $criteria->add(EventPeer::EVENT_TYPE_ID, $this->event_type_id);
		if ($this->isColumnModified(EventPeer::CREATED_AT)) $criteria->add(EventPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(EventPeer::UPDATED_BY)) $criteria->add(EventPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(EventPeer::UPDATED_AT)) $criteria->add(EventPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(EventPeer::MULTIMEDIA_ID)) $criteria->add(EventPeer::MULTIMEDIA_ID, $this->multimedia_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EventPeer::DATABASE_NAME);

		$criteria->add(EventPeer::ID, $this->id);

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

		$copyObj->setIsPublished($this->is_published);

		$copyObj->setTitle($this->title);

		$copyObj->setDescription($this->description);

		$copyObj->setLocation($this->location);

		$copyObj->setContact($this->contact);

		$copyObj->setOrganizer($this->organizer);

		$copyObj->setAuthor($this->author);

		$copyObj->setComment($this->comment);

		$copyObj->setBeginsAt($this->begins_at);

		$copyObj->setEndsAt($this->ends_at);

		$copyObj->setArticleId($this->article_id);

		$copyObj->setEventTypeId($this->event_type_id);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setMultimediaId($this->multimedia_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getEventSections() as $relObj) {
				$copyObj->addEventSection($relObj->copy($deepCopy));
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
			self::$peer = new EventPeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUserRelatedByAuthor($v)
	{


		if ($v === null) {
			$this->setAuthor(NULL);
		} else {
			$this->setAuthor($v->getId());
		}


		$this->asfGuardUserRelatedByAuthor = $v;
	}


	
	public function getsfGuardUserRelatedByAuthor($con = null)
	{
		if ($this->asfGuardUserRelatedByAuthor === null && ($this->author !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByAuthor = sfGuardUserPeer::retrieveByPK($this->author, $con);

			
		}
		return $this->asfGuardUserRelatedByAuthor;
	}

	
	public function setArticle($v)
	{


		if ($v === null) {
			$this->setArticleId(NULL);
		} else {
			$this->setArticleId($v->getId());
		}


		$this->aArticle = $v;
	}


	
	public function getArticle($con = null)
	{
		if ($this->aArticle === null && ($this->article_id !== null)) {
						include_once 'lib/model/om/BaseArticlePeer.php';

			$this->aArticle = ArticlePeer::retrieveByPK($this->article_id, $con);

			
		}
		return $this->aArticle;
	}

	
	public function setEventType($v)
	{


		if ($v === null) {
			$this->setEventTypeId(NULL);
		} else {
			$this->setEventTypeId($v->getId());
		}


		$this->aEventType = $v;
	}


	
	public function getEventType($con = null)
	{
		if ($this->aEventType === null && ($this->event_type_id !== null)) {
						include_once 'lib/model/om/BaseEventTypePeer.php';

			$this->aEventType = EventTypePeer::retrieveByPK($this->event_type_id, $con);

			
		}
		return $this->aEventType;
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

	
	public function initEventSections()
	{
		if ($this->collEventSections === null) {
			$this->collEventSections = array();
		}
	}

	
	public function getEventSections($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventSections === null) {
			if ($this->isNew()) {
			   $this->collEventSections = array();
			} else {

				$criteria->add(EventSectionPeer::EVENT_ID, $this->getId());

				EventSectionPeer::addSelectColumns($criteria);
				$this->collEventSections = EventSectionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EventSectionPeer::EVENT_ID, $this->getId());

				EventSectionPeer::addSelectColumns($criteria);
				if (!isset($this->lastEventSectionCriteria) || !$this->lastEventSectionCriteria->equals($criteria)) {
					$this->collEventSections = EventSectionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEventSectionCriteria = $criteria;
		return $this->collEventSections;
	}

	
	public function countEventSections($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEventSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EventSectionPeer::EVENT_ID, $this->getId());

		return EventSectionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEventSection(EventSection $l)
	{
		$this->collEventSections[] = $l;
		$l->setEvent($this);
	}


	
	public function getEventSectionsJoinSection($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventSections === null) {
			if ($this->isNew()) {
				$this->collEventSections = array();
			} else {

				$criteria->add(EventSectionPeer::EVENT_ID, $this->getId());

				$this->collEventSections = EventSectionPeer::doSelectJoinSection($criteria, $con);
			}
		} else {
									
			$criteria->add(EventSectionPeer::EVENT_ID, $this->getId());

			if (!isset($this->lastEventSectionCriteria) || !$this->lastEventSectionCriteria->equals($criteria)) {
				$this->collEventSections = EventSectionPeer::doSelectJoinSection($criteria, $con);
			}
		}
		$this->lastEventSectionCriteria = $criteria;

		return $this->collEventSections;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseEvent:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseEvent::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 