<?php


abstract class BaseArticleGroup extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $description;


	
	protected $comment;


	
	protected $visible_items = 0;


	
	protected $is_published;


	
	protected $created_at;


	
	protected $published_at;


	
	protected $created_by;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $collArticleArticleGroups;

	
	protected $lastArticleArticleGroupCriteria = null;

	
	protected $collSections;

	
	protected $lastSectionCriteria = null;

	
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

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ArticleGroupPeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = ArticleGroupPeer::NAME;
		}

	} 
	
	public function setDescription($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = ArticleGroupPeer::DESCRIPTION;
		}

	} 
	
	public function setComment($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = ArticleGroupPeer::COMMENT;
		}

	} 
	
	public function setVisibleItems($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->visible_items !== $v || $v === 0) {
			$this->visible_items = $v;
			$this->modifiedColumns[] = ArticleGroupPeer::VISIBLE_ITEMS;
		}

	} 
	
	public function setIsPublished($v)
	{

		if ($this->is_published !== $v) {
			$this->is_published = $v;
			$this->modifiedColumns[] = ArticleGroupPeer::IS_PUBLISHED;
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
			$this->modifiedColumns[] = ArticleGroupPeer::CREATED_AT;
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
			$this->modifiedColumns[] = ArticleGroupPeer::PUBLISHED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ArticleGroupPeer::CREATED_BY;
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
			$this->modifiedColumns[] = ArticleGroupPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = ArticleGroupPeer::UPDATED_BY;
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

			$this->description = $rs->getString($startcol + 2);

			$this->comment = $rs->getString($startcol + 3);

			$this->visible_items = $rs->getInt($startcol + 4);

			$this->is_published = $rs->getBoolean($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->published_at = $rs->getTimestamp($startcol + 7, null);

			$this->created_by = $rs->getInt($startcol + 8);

			$this->updated_at = $rs->getTimestamp($startcol + 9, null);

			$this->updated_by = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ArticleGroup object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleGroup:delete:pre') as $callable)
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
			$con = Propel::getConnection(ArticleGroupPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ArticleGroupPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseArticleGroup:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleGroup:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(ArticleGroupPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ArticleGroupPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArticleGroupPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseArticleGroup:save:post') as $callable)
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ArticleGroupPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ArticleGroupPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collArticleArticleGroups !== null) {
				foreach($this->collArticleArticleGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSections !== null) {
				foreach($this->collSections as $referrerFK) {
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


			if (($retval = ArticleGroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collArticleArticleGroups !== null) {
					foreach($this->collArticleArticleGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSections !== null) {
					foreach($this->collSections as $referrerFK) {
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
		$pos = ArticleGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getVisibleItems();
				break;
			case 5:
				return $this->getIsPublished();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getPublishedAt();
				break;
			case 8:
				return $this->getCreatedBy();
				break;
			case 9:
				return $this->getUpdatedAt();
				break;
			case 10:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArticleGroupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getDescription(),
			$keys[3] => $this->getComment(),
			$keys[4] => $this->getVisibleItems(),
			$keys[5] => $this->getIsPublished(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getPublishedAt(),
			$keys[8] => $this->getCreatedBy(),
			$keys[9] => $this->getUpdatedAt(),
			$keys[10] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticleGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setVisibleItems($value);
				break;
			case 5:
				$this->setIsPublished($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setPublishedAt($value);
				break;
			case 8:
				$this->setCreatedBy($value);
				break;
			case 9:
				$this->setUpdatedAt($value);
				break;
			case 10:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArticleGroupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setComment($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setVisibleItems($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIsPublished($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setPublishedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedBy($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedBy($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ArticleGroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(ArticleGroupPeer::ID)) $criteria->add(ArticleGroupPeer::ID, $this->id);
		if ($this->isColumnModified(ArticleGroupPeer::NAME)) $criteria->add(ArticleGroupPeer::NAME, $this->name);
		if ($this->isColumnModified(ArticleGroupPeer::DESCRIPTION)) $criteria->add(ArticleGroupPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(ArticleGroupPeer::COMMENT)) $criteria->add(ArticleGroupPeer::COMMENT, $this->comment);
		if ($this->isColumnModified(ArticleGroupPeer::VISIBLE_ITEMS)) $criteria->add(ArticleGroupPeer::VISIBLE_ITEMS, $this->visible_items);
		if ($this->isColumnModified(ArticleGroupPeer::IS_PUBLISHED)) $criteria->add(ArticleGroupPeer::IS_PUBLISHED, $this->is_published);
		if ($this->isColumnModified(ArticleGroupPeer::CREATED_AT)) $criteria->add(ArticleGroupPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ArticleGroupPeer::PUBLISHED_AT)) $criteria->add(ArticleGroupPeer::PUBLISHED_AT, $this->published_at);
		if ($this->isColumnModified(ArticleGroupPeer::CREATED_BY)) $criteria->add(ArticleGroupPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ArticleGroupPeer::UPDATED_AT)) $criteria->add(ArticleGroupPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ArticleGroupPeer::UPDATED_BY)) $criteria->add(ArticleGroupPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ArticleGroupPeer::DATABASE_NAME);

		$criteria->add(ArticleGroupPeer::ID, $this->id);

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

		$copyObj->setVisibleItems($this->visible_items);

		$copyObj->setIsPublished($this->is_published);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setPublishedAt($this->published_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getArticleArticleGroups() as $relObj) {
				$copyObj->addArticleArticleGroup($relObj->copy($deepCopy));
			}

			foreach($this->getSections() as $relObj) {
				$copyObj->addSection($relObj->copy($deepCopy));
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
			self::$peer = new ArticleGroupPeer();
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

	
	public function initArticleArticleGroups()
	{
		if ($this->collArticleArticleGroups === null) {
			$this->collArticleArticleGroups = array();
		}
	}

	
	public function getArticleArticleGroups($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleArticleGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleArticleGroups === null) {
			if ($this->isNew()) {
			   $this->collArticleArticleGroups = array();
			} else {

				$criteria->add(ArticleArticleGroupPeer::ARTICLE_GROUP_ID, $this->getId());

				ArticleArticleGroupPeer::addSelectColumns($criteria);
				$this->collArticleArticleGroups = ArticleArticleGroupPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleArticleGroupPeer::ARTICLE_GROUP_ID, $this->getId());

				ArticleArticleGroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleArticleGroupCriteria) || !$this->lastArticleArticleGroupCriteria->equals($criteria)) {
					$this->collArticleArticleGroups = ArticleArticleGroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleArticleGroupCriteria = $criteria;
		return $this->collArticleArticleGroups;
	}

	
	public function countArticleArticleGroups($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleArticleGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleArticleGroupPeer::ARTICLE_GROUP_ID, $this->getId());

		return ArticleArticleGroupPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleArticleGroup(ArticleArticleGroup $l)
	{
		$this->collArticleArticleGroups[] = $l;
		$l->setArticleGroup($this);
	}


	
	public function getArticleArticleGroupsJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleArticleGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleArticleGroups === null) {
			if ($this->isNew()) {
				$this->collArticleArticleGroups = array();
			} else {

				$criteria->add(ArticleArticleGroupPeer::ARTICLE_GROUP_ID, $this->getId());

				$this->collArticleArticleGroups = ArticleArticleGroupPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleArticleGroupPeer::ARTICLE_GROUP_ID, $this->getId());

			if (!isset($this->lastArticleArticleGroupCriteria) || !$this->lastArticleArticleGroupCriteria->equals($criteria)) {
				$this->collArticleArticleGroups = ArticleArticleGroupPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastArticleArticleGroupCriteria = $criteria;

		return $this->collArticleArticleGroups;
	}

	
	public function initSections()
	{
		if ($this->collSections === null) {
			$this->collSections = array();
		}
	}

	
	public function getSections($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSections === null) {
			if ($this->isNew()) {
			   $this->collSections = array();
			} else {

				$criteria->add(SectionPeer::ARTICLE_GROUP_ID, $this->getId());

				SectionPeer::addSelectColumns($criteria);
				$this->collSections = SectionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SectionPeer::ARTICLE_GROUP_ID, $this->getId());

				SectionPeer::addSelectColumns($criteria);
				if (!isset($this->lastSectionCriteria) || !$this->lastSectionCriteria->equals($criteria)) {
					$this->collSections = SectionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSectionCriteria = $criteria;
		return $this->collSections;
	}

	
	public function countSections($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SectionPeer::ARTICLE_GROUP_ID, $this->getId());

		return SectionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSection(Section $l)
	{
		$this->collSections[] = $l;
		$l->setArticleGroup($this);
	}


	
	public function getSectionsJoinMultimedia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSections === null) {
			if ($this->isNew()) {
				$this->collSections = array();
			} else {

				$criteria->add(SectionPeer::ARTICLE_GROUP_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::ARTICLE_GROUP_ID, $this->getId());

			if (!isset($this->lastSectionCriteria) || !$this->lastSectionCriteria->equals($criteria)) {
				$this->collSections = SectionPeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastSectionCriteria = $criteria;

		return $this->collSections;
	}


	
	public function getSectionsJoinSectionRelatedBySectionId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSections === null) {
			if ($this->isNew()) {
				$this->collSections = array();
			} else {

				$criteria->add(SectionPeer::ARTICLE_GROUP_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinSectionRelatedBySectionId($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::ARTICLE_GROUP_ID, $this->getId());

			if (!isset($this->lastSectionCriteria) || !$this->lastSectionCriteria->equals($criteria)) {
				$this->collSections = SectionPeer::doSelectJoinSectionRelatedBySectionId($criteria, $con);
			}
		}
		$this->lastSectionCriteria = $criteria;

		return $this->collSections;
	}


	
	public function getSectionsJoinTemplate($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSections === null) {
			if ($this->isNew()) {
				$this->collSections = array();
			} else {

				$criteria->add(SectionPeer::ARTICLE_GROUP_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinTemplate($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::ARTICLE_GROUP_ID, $this->getId());

			if (!isset($this->lastSectionCriteria) || !$this->lastSectionCriteria->equals($criteria)) {
				$this->collSections = SectionPeer::doSelectJoinTemplate($criteria, $con);
			}
		}
		$this->lastSectionCriteria = $criteria;

		return $this->collSections;
	}


	
	public function getSectionsJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSections === null) {
			if ($this->isNew()) {
				$this->collSections = array();
			} else {

				$criteria->add(SectionPeer::ARTICLE_GROUP_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::ARTICLE_GROUP_ID, $this->getId());

			if (!isset($this->lastSectionCriteria) || !$this->lastSectionCriteria->equals($criteria)) {
				$this->collSections = SectionPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastSectionCriteria = $criteria;

		return $this->collSections;
	}


	
	public function getSectionsJoinLayout($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSections === null) {
			if ($this->isNew()) {
				$this->collSections = array();
			} else {

				$criteria->add(SectionPeer::ARTICLE_GROUP_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinLayout($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::ARTICLE_GROUP_ID, $this->getId());

			if (!isset($this->lastSectionCriteria) || !$this->lastSectionCriteria->equals($criteria)) {
				$this->collSections = SectionPeer::doSelectJoinLayout($criteria, $con);
			}
		}
		$this->lastSectionCriteria = $criteria;

		return $this->collSections;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseArticleGroup:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseArticleGroup::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 