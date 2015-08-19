<?php


abstract class BaseLink extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $uri;


	
	protected $url;


	
	protected $created_by;


	
	protected $created_at;


	
	protected $updated_by;


	
	protected $updated_at;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $collArticles;

	
	protected $lastArticleCriteria = null;

	
	protected $collLinkGroupLinks;

	
	protected $lastLinkGroupLinkCriteria = null;

	
	protected $collSectionLinks;

	
	protected $lastSectionLinkCriteria = null;

	
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

	
	public function getUri()
	{

		return $this->uri;
	}

	
	public function getUrl()
	{

		return $this->url;
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
			$this->modifiedColumns[] = LinkPeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = LinkPeer::NAME;
		}

	} 
	
	public function setUri($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->uri !== $v) {
			$this->uri = $v;
			$this->modifiedColumns[] = LinkPeer::URI;
		}

	} 
	
	public function setUrl($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->url !== $v) {
			$this->url = $v;
			$this->modifiedColumns[] = LinkPeer::URL;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = LinkPeer::CREATED_BY;
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
			$this->modifiedColumns[] = LinkPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = LinkPeer::UPDATED_BY;
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
			$this->modifiedColumns[] = LinkPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->uri = $rs->getString($startcol + 2);

			$this->url = $rs->getString($startcol + 3);

			$this->created_by = $rs->getInt($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_by = $rs->getInt($startcol + 6);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Link object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseLink:delete:pre') as $callable)
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
			$con = Propel::getConnection(LinkPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LinkPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseLink:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseLink:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(LinkPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(LinkPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LinkPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseLink:save:post') as $callable)
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
					$pk = LinkPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LinkPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collArticles !== null) {
				foreach($this->collArticles as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLinkGroupLinks !== null) {
				foreach($this->collLinkGroupLinks as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSectionLinks !== null) {
				foreach($this->collSectionLinks as $referrerFK) {
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


			if (($retval = LinkPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collArticles !== null) {
					foreach($this->collArticles as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLinkGroupLinks !== null) {
					foreach($this->collLinkGroupLinks as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSectionLinks !== null) {
					foreach($this->collSectionLinks as $referrerFK) {
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
		$pos = LinkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getUri();
				break;
			case 3:
				return $this->getUrl();
				break;
			case 4:
				return $this->getCreatedBy();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getUpdatedBy();
				break;
			case 7:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LinkPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getUri(),
			$keys[3] => $this->getUrl(),
			$keys[4] => $this->getCreatedBy(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedBy(),
			$keys[7] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LinkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setUri($value);
				break;
			case 3:
				$this->setUrl($value);
				break;
			case 4:
				$this->setCreatedBy($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setUpdatedBy($value);
				break;
			case 7:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LinkPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setUri($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUrl($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedBy($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LinkPeer::DATABASE_NAME);

		if ($this->isColumnModified(LinkPeer::ID)) $criteria->add(LinkPeer::ID, $this->id);
		if ($this->isColumnModified(LinkPeer::NAME)) $criteria->add(LinkPeer::NAME, $this->name);
		if ($this->isColumnModified(LinkPeer::URI)) $criteria->add(LinkPeer::URI, $this->uri);
		if ($this->isColumnModified(LinkPeer::URL)) $criteria->add(LinkPeer::URL, $this->url);
		if ($this->isColumnModified(LinkPeer::CREATED_BY)) $criteria->add(LinkPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(LinkPeer::CREATED_AT)) $criteria->add(LinkPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(LinkPeer::UPDATED_BY)) $criteria->add(LinkPeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(LinkPeer::UPDATED_AT)) $criteria->add(LinkPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LinkPeer::DATABASE_NAME);

		$criteria->add(LinkPeer::ID, $this->id);

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

		$copyObj->setUri($this->uri);

		$copyObj->setUrl($this->url);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getArticles() as $relObj) {
				$copyObj->addArticle($relObj->copy($deepCopy));
			}

			foreach($this->getLinkGroupLinks() as $relObj) {
				$copyObj->addLinkGroupLink($relObj->copy($deepCopy));
			}

			foreach($this->getSectionLinks() as $relObj) {
				$copyObj->addSectionLink($relObj->copy($deepCopy));
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
			self::$peer = new LinkPeer();
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

				$criteria->add(ArticlePeer::LINK_ID, $this->getId());

				ArticlePeer::addSelectColumns($criteria);
				$this->collArticles = ArticlePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticlePeer::LINK_ID, $this->getId());

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

		$criteria->add(ArticlePeer::LINK_ID, $this->getId());

		return ArticlePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticle(Article $l)
	{
		$this->collArticles[] = $l;
		$l->setLink($this);
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

				$criteria->add(ArticlePeer::LINK_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::LINK_ID, $this->getId());

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

				$criteria->add(ArticlePeer::LINK_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::LINK_ID, $this->getId());

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

				$criteria->add(ArticlePeer::LINK_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::LINK_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinGallery($criteria = null, $con = null)
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

				$criteria->add(ArticlePeer::LINK_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinGallery($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::LINK_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinGallery($criteria, $con);
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

				$criteria->add(ArticlePeer::LINK_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinSource($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::LINK_ID, $this->getId());

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

				$criteria->add(ArticlePeer::LINK_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinSection($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::LINK_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinSection($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}

	
	public function initLinkGroupLinks()
	{
		if ($this->collLinkGroupLinks === null) {
			$this->collLinkGroupLinks = array();
		}
	}

	
	public function getLinkGroupLinks($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLinkGroupLinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLinkGroupLinks === null) {
			if ($this->isNew()) {
			   $this->collLinkGroupLinks = array();
			} else {

				$criteria->add(LinkGroupLinkPeer::LINK_ID, $this->getId());

				LinkGroupLinkPeer::addSelectColumns($criteria);
				$this->collLinkGroupLinks = LinkGroupLinkPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LinkGroupLinkPeer::LINK_ID, $this->getId());

				LinkGroupLinkPeer::addSelectColumns($criteria);
				if (!isset($this->lastLinkGroupLinkCriteria) || !$this->lastLinkGroupLinkCriteria->equals($criteria)) {
					$this->collLinkGroupLinks = LinkGroupLinkPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLinkGroupLinkCriteria = $criteria;
		return $this->collLinkGroupLinks;
	}

	
	public function countLinkGroupLinks($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLinkGroupLinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LinkGroupLinkPeer::LINK_ID, $this->getId());

		return LinkGroupLinkPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLinkGroupLink(LinkGroupLink $l)
	{
		$this->collLinkGroupLinks[] = $l;
		$l->setLink($this);
	}


	
	public function getLinkGroupLinksJoinLinkGroup($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLinkGroupLinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLinkGroupLinks === null) {
			if ($this->isNew()) {
				$this->collLinkGroupLinks = array();
			} else {

				$criteria->add(LinkGroupLinkPeer::LINK_ID, $this->getId());

				$this->collLinkGroupLinks = LinkGroupLinkPeer::doSelectJoinLinkGroup($criteria, $con);
			}
		} else {
									
			$criteria->add(LinkGroupLinkPeer::LINK_ID, $this->getId());

			if (!isset($this->lastLinkGroupLinkCriteria) || !$this->lastLinkGroupLinkCriteria->equals($criteria)) {
				$this->collLinkGroupLinks = LinkGroupLinkPeer::doSelectJoinLinkGroup($criteria, $con);
			}
		}
		$this->lastLinkGroupLinkCriteria = $criteria;

		return $this->collLinkGroupLinks;
	}

	
	public function initSectionLinks()
	{
		if ($this->collSectionLinks === null) {
			$this->collSectionLinks = array();
		}
	}

	
	public function getSectionLinks($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionLinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionLinks === null) {
			if ($this->isNew()) {
			   $this->collSectionLinks = array();
			} else {

				$criteria->add(SectionLinkPeer::LINK_ID, $this->getId());

				SectionLinkPeer::addSelectColumns($criteria);
				$this->collSectionLinks = SectionLinkPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SectionLinkPeer::LINK_ID, $this->getId());

				SectionLinkPeer::addSelectColumns($criteria);
				if (!isset($this->lastSectionLinkCriteria) || !$this->lastSectionLinkCriteria->equals($criteria)) {
					$this->collSectionLinks = SectionLinkPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSectionLinkCriteria = $criteria;
		return $this->collSectionLinks;
	}

	
	public function countSectionLinks($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSectionLinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SectionLinkPeer::LINK_ID, $this->getId());

		return SectionLinkPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSectionLink(SectionLink $l)
	{
		$this->collSectionLinks[] = $l;
		$l->setLink($this);
	}


	
	public function getSectionLinksJoinSection($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionLinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionLinks === null) {
			if ($this->isNew()) {
				$this->collSectionLinks = array();
			} else {

				$criteria->add(SectionLinkPeer::LINK_ID, $this->getId());

				$this->collSectionLinks = SectionLinkPeer::doSelectJoinSection($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionLinkPeer::LINK_ID, $this->getId());

			if (!isset($this->lastSectionLinkCriteria) || !$this->lastSectionLinkCriteria->equals($criteria)) {
				$this->collSectionLinks = SectionLinkPeer::doSelectJoinSection($criteria, $con);
			}
		}
		$this->lastSectionLinkCriteria = $criteria;

		return $this->collSectionLinks;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseLink:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseLink::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 