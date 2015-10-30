<?php


abstract class BaseRssChannel extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $title;


	
	protected $link;


	
	protected $is_active;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $created_by;


	
	protected $updated_by;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $collArticleRssChannels;

	
	protected $lastArticleRssChannelCriteria = null;

	
	protected $collContainerSlotlets;

	
	protected $lastContainerSlotletCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getLink()
	{

		return $this->link;
	}

	
	public function getIsActive()
	{

		return $this->is_active;
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

	
	public function getCreatedBy()
	{

		return $this->created_by;
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
			$this->modifiedColumns[] = RssChannelPeer::ID;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = RssChannelPeer::TITLE;
		}

	} 
	
	public function setLink($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->link !== $v) {
			$this->link = $v;
			$this->modifiedColumns[] = RssChannelPeer::LINK;
		}

	} 
	
	public function setIsActive($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_active !== $v) {
			$this->is_active = $v;
			$this->modifiedColumns[] = RssChannelPeer::IS_ACTIVE;
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
			$this->modifiedColumns[] = RssChannelPeer::CREATED_AT;
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
			$this->modifiedColumns[] = RssChannelPeer::UPDATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = RssChannelPeer::CREATED_BY;
		}

		if ($this->asfGuardUserRelatedByCreatedBy !== null && $this->asfGuardUserRelatedByCreatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByCreatedBy = null;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = RssChannelPeer::UPDATED_BY;
		}

		if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->asfGuardUserRelatedByUpdatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByUpdatedBy = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->title = $rs->getString($startcol + 1);

			$this->link = $rs->getString($startcol + 2);

			$this->is_active = $rs->getInt($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->updated_at = $rs->getTimestamp($startcol + 5, null);

			$this->created_by = $rs->getInt($startcol + 6);

			$this->updated_by = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating RssChannel object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseRssChannel:delete:pre') as $callable)
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
			$con = Propel::getConnection(RssChannelPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			RssChannelPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseRssChannel:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseRssChannel:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(RssChannelPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(RssChannelPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RssChannelPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseRssChannel:save:post') as $callable)
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
					$pk = RssChannelPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RssChannelPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collArticleRssChannels !== null) {
				foreach($this->collArticleRssChannels as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = RssChannelPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collArticleRssChannels !== null) {
					foreach($this->collArticleRssChannels as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = RssChannelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getTitle();
				break;
			case 2:
				return $this->getLink();
				break;
			case 3:
				return $this->getIsActive();
				break;
			case 4:
				return $this->getCreatedAt();
				break;
			case 5:
				return $this->getUpdatedAt();
				break;
			case 6:
				return $this->getCreatedBy();
				break;
			case 7:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RssChannelPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTitle(),
			$keys[2] => $this->getLink(),
			$keys[3] => $this->getIsActive(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getUpdatedAt(),
			$keys[6] => $this->getCreatedBy(),
			$keys[7] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RssChannelPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setTitle($value);
				break;
			case 2:
				$this->setLink($value);
				break;
			case 3:
				$this->setIsActive($value);
				break;
			case 4:
				$this->setCreatedAt($value);
				break;
			case 5:
				$this->setUpdatedAt($value);
				break;
			case 6:
				$this->setCreatedBy($value);
				break;
			case 7:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RssChannelPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLink($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIsActive($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RssChannelPeer::DATABASE_NAME);

		if ($this->isColumnModified(RssChannelPeer::ID)) $criteria->add(RssChannelPeer::ID, $this->id);
		if ($this->isColumnModified(RssChannelPeer::TITLE)) $criteria->add(RssChannelPeer::TITLE, $this->title);
		if ($this->isColumnModified(RssChannelPeer::LINK)) $criteria->add(RssChannelPeer::LINK, $this->link);
		if ($this->isColumnModified(RssChannelPeer::IS_ACTIVE)) $criteria->add(RssChannelPeer::IS_ACTIVE, $this->is_active);
		if ($this->isColumnModified(RssChannelPeer::CREATED_AT)) $criteria->add(RssChannelPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(RssChannelPeer::UPDATED_AT)) $criteria->add(RssChannelPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(RssChannelPeer::CREATED_BY)) $criteria->add(RssChannelPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(RssChannelPeer::UPDATED_BY)) $criteria->add(RssChannelPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RssChannelPeer::DATABASE_NAME);

		$criteria->add(RssChannelPeer::ID, $this->id);

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

		$copyObj->setTitle($this->title);

		$copyObj->setLink($this->link);

		$copyObj->setIsActive($this->is_active);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedBy($this->updated_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getArticleRssChannels() as $relObj) {
				$copyObj->addArticleRssChannel($relObj->copy($deepCopy));
			}

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
			self::$peer = new RssChannelPeer();
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

	
	public function initArticleRssChannels()
	{
		if ($this->collArticleRssChannels === null) {
			$this->collArticleRssChannels = array();
		}
	}

	
	public function getArticleRssChannels($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleRssChannelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleRssChannels === null) {
			if ($this->isNew()) {
			   $this->collArticleRssChannels = array();
			} else {

				$criteria->add(ArticleRssChannelPeer::RSS_CHANNEL_ID, $this->getId());

				ArticleRssChannelPeer::addSelectColumns($criteria);
				$this->collArticleRssChannels = ArticleRssChannelPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleRssChannelPeer::RSS_CHANNEL_ID, $this->getId());

				ArticleRssChannelPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleRssChannelCriteria) || !$this->lastArticleRssChannelCriteria->equals($criteria)) {
					$this->collArticleRssChannels = ArticleRssChannelPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleRssChannelCriteria = $criteria;
		return $this->collArticleRssChannels;
	}

	
	public function countArticleRssChannels($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleRssChannelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleRssChannelPeer::RSS_CHANNEL_ID, $this->getId());

		return ArticleRssChannelPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleRssChannel(ArticleRssChannel $l)
	{
		$this->collArticleRssChannels[] = $l;
		$l->setRssChannel($this);
	}


	
	public function getArticleRssChannelsJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleRssChannelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleRssChannels === null) {
			if ($this->isNew()) {
				$this->collArticleRssChannels = array();
			} else {

				$criteria->add(ArticleRssChannelPeer::RSS_CHANNEL_ID, $this->getId());

				$this->collArticleRssChannels = ArticleRssChannelPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleRssChannelPeer::RSS_CHANNEL_ID, $this->getId());

			if (!isset($this->lastArticleRssChannelCriteria) || !$this->lastArticleRssChannelCriteria->equals($criteria)) {
				$this->collArticleRssChannels = ArticleRssChannelPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastArticleRssChannelCriteria = $criteria;

		return $this->collArticleRssChannels;
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

				$criteria->add(ContainerSlotletPeer::RSS_CHANNEL_ID, $this->getId());

				ContainerSlotletPeer::addSelectColumns($criteria);
				$this->collContainerSlotlets = ContainerSlotletPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ContainerSlotletPeer::RSS_CHANNEL_ID, $this->getId());

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

		$criteria->add(ContainerSlotletPeer::RSS_CHANNEL_ID, $this->getId());

		return ContainerSlotletPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addContainerSlotlet(ContainerSlotlet $l)
	{
		$this->collContainerSlotlets[] = $l;
		$l->setRssChannel($this);
	}


	
	public function getContainerSlotletsJoinContainer($criteria = null, $con = null)
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

				$criteria->add(ContainerSlotletPeer::RSS_CHANNEL_ID, $this->getId());

				$this->collContainerSlotlets = ContainerSlotletPeer::doSelectJoinContainer($criteria, $con);
			}
		} else {
									
			$criteria->add(ContainerSlotletPeer::RSS_CHANNEL_ID, $this->getId());

			if (!isset($this->lastContainerSlotletCriteria) || !$this->lastContainerSlotletCriteria->equals($criteria)) {
				$this->collContainerSlotlets = ContainerSlotletPeer::doSelectJoinContainer($criteria, $con);
			}
		}
		$this->lastContainerSlotletCriteria = $criteria;

		return $this->collContainerSlotlets;
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

				$criteria->add(ContainerSlotletPeer::RSS_CHANNEL_ID, $this->getId());

				$this->collContainerSlotlets = ContainerSlotletPeer::doSelectJoinSlotlet($criteria, $con);
			}
		} else {
									
			$criteria->add(ContainerSlotletPeer::RSS_CHANNEL_ID, $this->getId());

			if (!isset($this->lastContainerSlotletCriteria) || !$this->lastContainerSlotletCriteria->equals($criteria)) {
				$this->collContainerSlotlets = ContainerSlotletPeer::doSelectJoinSlotlet($criteria, $con);
			}
		}
		$this->lastContainerSlotletCriteria = $criteria;

		return $this->collContainerSlotlets;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseRssChannel:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseRssChannel::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 