<?php


abstract class BaseLinkGroup extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;

	
	protected $collArticleLinkGroups;

	
	protected $lastArticleLinkGroupCriteria = null;

	
	protected $collLinkGroupLinks;

	
	protected $lastLinkGroupLinkCriteria = null;

	
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
			$this->modifiedColumns[] = LinkGroupPeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = LinkGroupPeer::NAME;
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
			throw new PropelException("Error populating LinkGroup object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseLinkGroup:delete:pre') as $callable)
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
			$con = Propel::getConnection(LinkGroupPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LinkGroupPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseLinkGroup:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseLinkGroup:save:pre') as $callable)
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
			$con = Propel::getConnection(LinkGroupPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseLinkGroup:save:post') as $callable)
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
					$pk = LinkGroupPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LinkGroupPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collArticleLinkGroups !== null) {
				foreach($this->collArticleLinkGroups as $referrerFK) {
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


			if (($retval = LinkGroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collArticleLinkGroups !== null) {
					foreach($this->collArticleLinkGroups as $referrerFK) {
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


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LinkGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = LinkGroupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LinkGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = LinkGroupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LinkGroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(LinkGroupPeer::ID)) $criteria->add(LinkGroupPeer::ID, $this->id);
		if ($this->isColumnModified(LinkGroupPeer::NAME)) $criteria->add(LinkGroupPeer::NAME, $this->name);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LinkGroupPeer::DATABASE_NAME);

		$criteria->add(LinkGroupPeer::ID, $this->id);

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

			foreach($this->getArticleLinkGroups() as $relObj) {
				$copyObj->addArticleLinkGroup($relObj->copy($deepCopy));
			}

			foreach($this->getLinkGroupLinks() as $relObj) {
				$copyObj->addLinkGroupLink($relObj->copy($deepCopy));
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
			self::$peer = new LinkGroupPeer();
		}
		return self::$peer;
	}

	
	public function initArticleLinkGroups()
	{
		if ($this->collArticleLinkGroups === null) {
			$this->collArticleLinkGroups = array();
		}
	}

	
	public function getArticleLinkGroups($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleLinkGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleLinkGroups === null) {
			if ($this->isNew()) {
			   $this->collArticleLinkGroups = array();
			} else {

				$criteria->add(ArticleLinkGroupPeer::LINK_GROUP_ID, $this->getId());

				ArticleLinkGroupPeer::addSelectColumns($criteria);
				$this->collArticleLinkGroups = ArticleLinkGroupPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleLinkGroupPeer::LINK_GROUP_ID, $this->getId());

				ArticleLinkGroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleLinkGroupCriteria) || !$this->lastArticleLinkGroupCriteria->equals($criteria)) {
					$this->collArticleLinkGroups = ArticleLinkGroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleLinkGroupCriteria = $criteria;
		return $this->collArticleLinkGroups;
	}

	
	public function countArticleLinkGroups($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleLinkGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleLinkGroupPeer::LINK_GROUP_ID, $this->getId());

		return ArticleLinkGroupPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleLinkGroup(ArticleLinkGroup $l)
	{
		$this->collArticleLinkGroups[] = $l;
		$l->setLinkGroup($this);
	}


	
	public function getArticleLinkGroupsJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleLinkGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleLinkGroups === null) {
			if ($this->isNew()) {
				$this->collArticleLinkGroups = array();
			} else {

				$criteria->add(ArticleLinkGroupPeer::LINK_GROUP_ID, $this->getId());

				$this->collArticleLinkGroups = ArticleLinkGroupPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleLinkGroupPeer::LINK_GROUP_ID, $this->getId());

			if (!isset($this->lastArticleLinkGroupCriteria) || !$this->lastArticleLinkGroupCriteria->equals($criteria)) {
				$this->collArticleLinkGroups = ArticleLinkGroupPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastArticleLinkGroupCriteria = $criteria;

		return $this->collArticleLinkGroups;
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

				$criteria->add(LinkGroupLinkPeer::LINK_GROUP_ID, $this->getId());

				LinkGroupLinkPeer::addSelectColumns($criteria);
				$this->collLinkGroupLinks = LinkGroupLinkPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LinkGroupLinkPeer::LINK_GROUP_ID, $this->getId());

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

		$criteria->add(LinkGroupLinkPeer::LINK_GROUP_ID, $this->getId());

		return LinkGroupLinkPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLinkGroupLink(LinkGroupLink $l)
	{
		$this->collLinkGroupLinks[] = $l;
		$l->setLinkGroup($this);
	}


	
	public function getLinkGroupLinksJoinLink($criteria = null, $con = null)
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

				$criteria->add(LinkGroupLinkPeer::LINK_GROUP_ID, $this->getId());

				$this->collLinkGroupLinks = LinkGroupLinkPeer::doSelectJoinLink($criteria, $con);
			}
		} else {
									
			$criteria->add(LinkGroupLinkPeer::LINK_GROUP_ID, $this->getId());

			if (!isset($this->lastLinkGroupLinkCriteria) || !$this->lastLinkGroupLinkCriteria->equals($criteria)) {
				$this->collLinkGroupLinks = LinkGroupLinkPeer::doSelectJoinLink($criteria, $con);
			}
		}
		$this->lastLinkGroupLinkCriteria = $criteria;

		return $this->collLinkGroupLinks;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseLinkGroup:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseLinkGroup::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 