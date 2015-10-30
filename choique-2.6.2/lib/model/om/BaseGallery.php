<?php


abstract class BaseGallery extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $description;


	
	protected $comment;


	
	protected $is_horizontal = 1;


	
	protected $visible_items = 0;


	
	protected $is_published;


	
	protected $created_at;


	
	protected $published_at;


	
	protected $created_by;


	
	protected $updated_at;


	
	protected $updated_by;


	
	protected $published_by;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $asfGuardUserRelatedByPublishedBy;

	
	protected $collArticles;

	
	protected $lastArticleCriteria = null;

	
	protected $collArticleGallerys;

	
	protected $lastArticleGalleryCriteria = null;

	
	protected $collMultimediaGallerys;

	
	protected $lastMultimediaGalleryCriteria = null;

	
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

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getComment()
	{

		return $this->comment;
	}

	
	public function getIsHorizontal()
	{

		return $this->is_horizontal;
	}

	
	public function getVisibleItems()
	{

		return $this->visible_items;
	}

	
	public function getIsPublished()
	{

		return $this->is_published;
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

	
	public function getPublishedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->published_at === null || $this->published_at === '') {
			return null;
		} elseif (!is_int($this->published_at)) {
						$ts = strtotime($this->published_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [published_at] as date/time value: " . var_export($this->published_at, true));
			}
		} else {
			$ts = $this->published_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getCreatedBy()
	{

		return $this->created_by;
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

	
	public function getPublishedBy()
	{

		return $this->published_by;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = GalleryPeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = GalleryPeer::NAME;
		}

	} 
	
	public function setDescription($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = GalleryPeer::DESCRIPTION;
		}

	} 
	
	public function setComment($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = GalleryPeer::COMMENT;
		}

	} 
	
	public function setIsHorizontal($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_horizontal !== $v || $v === 1) {
			$this->is_horizontal = $v;
			$this->modifiedColumns[] = GalleryPeer::IS_HORIZONTAL;
		}

	} 
	
	public function setVisibleItems($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->visible_items !== $v || $v === 0) {
			$this->visible_items = $v;
			$this->modifiedColumns[] = GalleryPeer::VISIBLE_ITEMS;
		}

	} 
	
	public function setIsPublished($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_published !== $v) {
			$this->is_published = $v;
			$this->modifiedColumns[] = GalleryPeer::IS_PUBLISHED;
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
			$this->modifiedColumns[] = GalleryPeer::CREATED_AT;
		}

	} 
	
	public function setPublishedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [published_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->published_at !== $ts) {
			$this->published_at = $ts;
			$this->modifiedColumns[] = GalleryPeer::PUBLISHED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = GalleryPeer::CREATED_BY;
		}

		if ($this->asfGuardUserRelatedByCreatedBy !== null && $this->asfGuardUserRelatedByCreatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByCreatedBy = null;
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
			$this->modifiedColumns[] = GalleryPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = GalleryPeer::UPDATED_BY;
		}

		if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->asfGuardUserRelatedByUpdatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByUpdatedBy = null;
		}

	} 
	
	public function setPublishedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->published_by !== $v) {
			$this->published_by = $v;
			$this->modifiedColumns[] = GalleryPeer::PUBLISHED_BY;
		}

		if ($this->asfGuardUserRelatedByPublishedBy !== null && $this->asfGuardUserRelatedByPublishedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByPublishedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->description = $rs->getString($startcol + 2);

			$this->comment = $rs->getString($startcol + 3);

			$this->is_horizontal = $rs->getInt($startcol + 4);

			$this->visible_items = $rs->getInt($startcol + 5);

			$this->is_published = $rs->getInt($startcol + 6);

			$this->created_at = $rs->getTimestamp($startcol + 7, null);

			$this->published_at = $rs->getTimestamp($startcol + 8, null);

			$this->created_by = $rs->getInt($startcol + 9);

			$this->updated_at = $rs->getTimestamp($startcol + 10, null);

			$this->updated_by = $rs->getInt($startcol + 11);

			$this->published_by = $rs->getInt($startcol + 12);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Gallery object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseGallery:delete:pre') as $callable)
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
			$con = Propel::getConnection(GalleryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			GalleryPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseGallery:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseGallery:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(GalleryPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(GalleryPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(GalleryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseGallery:save:post') as $callable)
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

			if ($this->asfGuardUserRelatedByPublishedBy !== null) {
				if ($this->asfGuardUserRelatedByPublishedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByPublishedBy->save($con);
				}
				$this->setsfGuardUserRelatedByPublishedBy($this->asfGuardUserRelatedByPublishedBy);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = GalleryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += GalleryPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collArticles !== null) {
				foreach($this->collArticles as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticleGallerys !== null) {
				foreach($this->collArticleGallerys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMultimediaGallerys !== null) {
				foreach($this->collMultimediaGallerys as $referrerFK) {
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

			if ($this->asfGuardUserRelatedByPublishedBy !== null) {
				if (!$this->asfGuardUserRelatedByPublishedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByPublishedBy->getValidationFailures());
				}
			}


			if (($retval = GalleryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collArticles !== null) {
					foreach($this->collArticles as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticleGallerys !== null) {
					foreach($this->collArticleGallerys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMultimediaGallerys !== null) {
					foreach($this->collMultimediaGallerys as $referrerFK) {
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
		$pos = GalleryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDescription();
				break;
			case 3:
				return $this->getComment();
				break;
			case 4:
				return $this->getIsHorizontal();
				break;
			case 5:
				return $this->getVisibleItems();
				break;
			case 6:
				return $this->getIsPublished();
				break;
			case 7:
				return $this->getCreatedAt();
				break;
			case 8:
				return $this->getPublishedAt();
				break;
			case 9:
				return $this->getCreatedBy();
				break;
			case 10:
				return $this->getUpdatedAt();
				break;
			case 11:
				return $this->getUpdatedBy();
				break;
			case 12:
				return $this->getPublishedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GalleryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getDescription(),
			$keys[3] => $this->getComment(),
			$keys[4] => $this->getIsHorizontal(),
			$keys[5] => $this->getVisibleItems(),
			$keys[6] => $this->getIsPublished(),
			$keys[7] => $this->getCreatedAt(),
			$keys[8] => $this->getPublishedAt(),
			$keys[9] => $this->getCreatedBy(),
			$keys[10] => $this->getUpdatedAt(),
			$keys[11] => $this->getUpdatedBy(),
			$keys[12] => $this->getPublishedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = GalleryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDescription($value);
				break;
			case 3:
				$this->setComment($value);
				break;
			case 4:
				$this->setIsHorizontal($value);
				break;
			case 5:
				$this->setVisibleItems($value);
				break;
			case 6:
				$this->setIsPublished($value);
				break;
			case 7:
				$this->setCreatedAt($value);
				break;
			case 8:
				$this->setPublishedAt($value);
				break;
			case 9:
				$this->setCreatedBy($value);
				break;
			case 10:
				$this->setUpdatedAt($value);
				break;
			case 11:
				$this->setUpdatedBy($value);
				break;
			case 12:
				$this->setPublishedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = GalleryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setComment($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIsHorizontal($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setVisibleItems($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIsPublished($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPublishedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedBy($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setPublishedBy($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(GalleryPeer::DATABASE_NAME);

		if ($this->isColumnModified(GalleryPeer::ID)) $criteria->add(GalleryPeer::ID, $this->id);
		if ($this->isColumnModified(GalleryPeer::NAME)) $criteria->add(GalleryPeer::NAME, $this->name);
		if ($this->isColumnModified(GalleryPeer::DESCRIPTION)) $criteria->add(GalleryPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(GalleryPeer::COMMENT)) $criteria->add(GalleryPeer::COMMENT, $this->comment);
		if ($this->isColumnModified(GalleryPeer::IS_HORIZONTAL)) $criteria->add(GalleryPeer::IS_HORIZONTAL, $this->is_horizontal);
		if ($this->isColumnModified(GalleryPeer::VISIBLE_ITEMS)) $criteria->add(GalleryPeer::VISIBLE_ITEMS, $this->visible_items);
		if ($this->isColumnModified(GalleryPeer::IS_PUBLISHED)) $criteria->add(GalleryPeer::IS_PUBLISHED, $this->is_published);
		if ($this->isColumnModified(GalleryPeer::CREATED_AT)) $criteria->add(GalleryPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(GalleryPeer::PUBLISHED_AT)) $criteria->add(GalleryPeer::PUBLISHED_AT, $this->published_at);
		if ($this->isColumnModified(GalleryPeer::CREATED_BY)) $criteria->add(GalleryPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(GalleryPeer::UPDATED_AT)) $criteria->add(GalleryPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(GalleryPeer::UPDATED_BY)) $criteria->add(GalleryPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(GalleryPeer::PUBLISHED_BY)) $criteria->add(GalleryPeer::PUBLISHED_BY, $this->published_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(GalleryPeer::DATABASE_NAME);

		$criteria->add(GalleryPeer::ID, $this->id);

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

		$copyObj->setDescription($this->description);

		$copyObj->setComment($this->comment);

		$copyObj->setIsHorizontal($this->is_horizontal);

		$copyObj->setVisibleItems($this->visible_items);

		$copyObj->setIsPublished($this->is_published);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setPublishedAt($this->published_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setPublishedBy($this->published_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getArticles() as $relObj) {
				$copyObj->addArticle($relObj->copy($deepCopy));
			}

			foreach($this->getArticleGallerys() as $relObj) {
				$copyObj->addArticleGallery($relObj->copy($deepCopy));
			}

			foreach($this->getMultimediaGallerys() as $relObj) {
				$copyObj->addMultimediaGallery($relObj->copy($deepCopy));
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
			self::$peer = new GalleryPeer();
		}
		return self::$peer;
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

	
	public function setsfGuardUserRelatedByPublishedBy($v)
	{


		if ($v === null) {
			$this->setPublishedBy(NULL);
		} else {
			$this->setPublishedBy($v->getId());
		}


		$this->asfGuardUserRelatedByPublishedBy = $v;
	}


	
	public function getsfGuardUserRelatedByPublishedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByPublishedBy === null && ($this->published_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByPublishedBy = sfGuardUserPeer::retrieveByPK($this->published_by, $con);

			
		}
		return $this->asfGuardUserRelatedByPublishedBy;
	}

	
	public function initArticles()
	{
		if ($this->collArticles === null) {
			$this->collArticles = array();
		}
	}

	
	public function getArticles($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
			   $this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

				ArticlePeer::addSelectColumns($criteria);
				$this->collArticles = ArticlePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

				ArticlePeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
					$this->collArticles = ArticlePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleCriteria = $criteria;
		return $this->collArticles;
	}

	
	public function countArticles($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

		return ArticlePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticle(Article $l)
	{
		$this->collArticles[] = $l;
		$l->setGallery($this);
	}


	
	public function getArticlesJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinMultimedia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinLink($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinLink($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinLink($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinSource($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinSource($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinSource($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinSection($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinSection($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinSection($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}

	
	public function initArticleGallerys()
	{
		if ($this->collArticleGallerys === null) {
			$this->collArticleGallerys = array();
		}
	}

	
	public function getArticleGallerys($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleGallerys === null) {
			if ($this->isNew()) {
			   $this->collArticleGallerys = array();
			} else {

				$criteria->add(ArticleGalleryPeer::GALLERY_ID, $this->getId());

				ArticleGalleryPeer::addSelectColumns($criteria);
				$this->collArticleGallerys = ArticleGalleryPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleGalleryPeer::GALLERY_ID, $this->getId());

				ArticleGalleryPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleGalleryCriteria) || !$this->lastArticleGalleryCriteria->equals($criteria)) {
					$this->collArticleGallerys = ArticleGalleryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleGalleryCriteria = $criteria;
		return $this->collArticleGallerys;
	}

	
	public function countArticleGallerys($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleGalleryPeer::GALLERY_ID, $this->getId());

		return ArticleGalleryPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleGallery(ArticleGallery $l)
	{
		$this->collArticleGallerys[] = $l;
		$l->setGallery($this);
	}


	
	public function getArticleGallerysJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleGallerys === null) {
			if ($this->isNew()) {
				$this->collArticleGallerys = array();
			} else {

				$criteria->add(ArticleGalleryPeer::GALLERY_ID, $this->getId());

				$this->collArticleGallerys = ArticleGalleryPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleGalleryPeer::GALLERY_ID, $this->getId());

			if (!isset($this->lastArticleGalleryCriteria) || !$this->lastArticleGalleryCriteria->equals($criteria)) {
				$this->collArticleGallerys = ArticleGalleryPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastArticleGalleryCriteria = $criteria;

		return $this->collArticleGallerys;
	}

	
	public function initMultimediaGallerys()
	{
		if ($this->collMultimediaGallerys === null) {
			$this->collMultimediaGallerys = array();
		}
	}

	
	public function getMultimediaGallerys($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMultimediaGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMultimediaGallerys === null) {
			if ($this->isNew()) {
			   $this->collMultimediaGallerys = array();
			} else {

				$criteria->add(MultimediaGalleryPeer::GALLERY_ID, $this->getId());

				MultimediaGalleryPeer::addSelectColumns($criteria);
				$this->collMultimediaGallerys = MultimediaGalleryPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MultimediaGalleryPeer::GALLERY_ID, $this->getId());

				MultimediaGalleryPeer::addSelectColumns($criteria);
				if (!isset($this->lastMultimediaGalleryCriteria) || !$this->lastMultimediaGalleryCriteria->equals($criteria)) {
					$this->collMultimediaGallerys = MultimediaGalleryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMultimediaGalleryCriteria = $criteria;
		return $this->collMultimediaGallerys;
	}

	
	public function countMultimediaGallerys($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMultimediaGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MultimediaGalleryPeer::GALLERY_ID, $this->getId());

		return MultimediaGalleryPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMultimediaGallery(MultimediaGallery $l)
	{
		$this->collMultimediaGallerys[] = $l;
		$l->setGallery($this);
	}


	
	public function getMultimediaGallerysJoinMultimedia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMultimediaGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMultimediaGallerys === null) {
			if ($this->isNew()) {
				$this->collMultimediaGallerys = array();
			} else {

				$criteria->add(MultimediaGalleryPeer::GALLERY_ID, $this->getId());

				$this->collMultimediaGallerys = MultimediaGalleryPeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(MultimediaGalleryPeer::GALLERY_ID, $this->getId());

			if (!isset($this->lastMultimediaGalleryCriteria) || !$this->lastMultimediaGalleryCriteria->equals($criteria)) {
				$this->collMultimediaGallerys = MultimediaGalleryPeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastMultimediaGalleryCriteria = $criteria;

		return $this->collMultimediaGallerys;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseGallery:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseGallery::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 