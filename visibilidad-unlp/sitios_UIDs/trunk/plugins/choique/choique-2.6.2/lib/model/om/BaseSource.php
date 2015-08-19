<?php


abstract class BaseSource extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $description;


	
	protected $comment;

	
	protected $collArticles;

	
	protected $lastArticleCriteria = null;

	
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

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SourcePeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = SourcePeer::NAME;
		}

	} 
	
	public function setDescription($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = SourcePeer::DESCRIPTION;
		}

	} 
	
	public function setComment($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = SourcePeer::COMMENT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->description = $rs->getString($startcol + 2);

			$this->comment = $rs->getString($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Source object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseSource:delete:pre') as $callable)
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
			$con = Propel::getConnection(SourcePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SourcePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseSource:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseSource:save:pre') as $callable)
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
			$con = Propel::getConnection(SourcePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseSource:save:post') as $callable)
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
					$pk = SourcePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SourcePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collArticles !== null) {
				foreach($this->collArticles as $referrerFK) {
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


			if (($retval = SourcePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collArticles !== null) {
					foreach($this->collArticles as $referrerFK) {
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
		$pos = SourcePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SourcePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getDescription(),
			$keys[3] => $this->getComment(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SourcePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SourcePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setComment($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SourcePeer::DATABASE_NAME);

		if ($this->isColumnModified(SourcePeer::ID)) $criteria->add(SourcePeer::ID, $this->id);
		if ($this->isColumnModified(SourcePeer::NAME)) $criteria->add(SourcePeer::NAME, $this->name);
		if ($this->isColumnModified(SourcePeer::DESCRIPTION)) $criteria->add(SourcePeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(SourcePeer::COMMENT)) $criteria->add(SourcePeer::COMMENT, $this->comment);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SourcePeer::DATABASE_NAME);

		$criteria->add(SourcePeer::ID, $this->id);

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


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getArticles() as $relObj) {
				$copyObj->addArticle($relObj->copy($deepCopy));
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
			self::$peer = new SourcePeer();
		}
		return self::$peer;
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

				$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

				ArticlePeer::addSelectColumns($criteria);
				$this->collArticles = ArticlePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

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

		$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

		return ArticlePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticle(Article $l)
	{
		$this->collArticles[] = $l;
		$l->setSource($this);
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

				$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

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

				$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

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

				$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

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

				$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinGallery($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinGallery($criteria, $con);
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

				$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinLink($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinLink($criteria, $con);
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

				$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinSection($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::SOURCE_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinSection($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseSource:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseSource::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 