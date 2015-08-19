<?php


abstract class BaseArticleArticleGroup extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $article_id;


	
	protected $article_group_id;


	
	protected $priority = 0;


	
	protected $id;

	
	protected $aArticle;

	
	protected $aArticleGroup;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getArticleId()
	{

		return $this->article_id;
	}

	
	public function getArticleGroupId()
	{

		return $this->article_group_id;
	}

	
	public function getPriority()
	{

		return $this->priority;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setArticleId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->article_id !== $v) {
			$this->article_id = $v;
			$this->modifiedColumns[] = ArticleArticleGroupPeer::ARTICLE_ID;
		}

		if ($this->aArticle !== null && $this->aArticle->getId() !== $v) {
			$this->aArticle = null;
		}

	} 
	
	public function setArticleGroupId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->article_group_id !== $v) {
			$this->article_group_id = $v;
			$this->modifiedColumns[] = ArticleArticleGroupPeer::ARTICLE_GROUP_ID;
		}

		if ($this->aArticleGroup !== null && $this->aArticleGroup->getId() !== $v) {
			$this->aArticleGroup = null;
		}

	} 
	
	public function setPriority($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->priority !== $v || $v === 0) {
			$this->priority = $v;
			$this->modifiedColumns[] = ArticleArticleGroupPeer::PRIORITY;
		}

	} 
	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ArticleArticleGroupPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->article_id = $rs->getInt($startcol + 0);

			$this->article_group_id = $rs->getInt($startcol + 1);

			$this->priority = $rs->getInt($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ArticleArticleGroup object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleArticleGroup:delete:pre') as $callable)
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
			$con = Propel::getConnection(ArticleArticleGroupPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ArticleArticleGroupPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseArticleArticleGroup:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleArticleGroup:save:pre') as $callable)
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
			$con = Propel::getConnection(ArticleArticleGroupPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseArticleArticleGroup:save:post') as $callable)
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


												
			if ($this->aArticle !== null) {
				if ($this->aArticle->isModified()) {
					$affectedRows += $this->aArticle->save($con);
				}
				$this->setArticle($this->aArticle);
			}

			if ($this->aArticleGroup !== null) {
				if ($this->aArticleGroup->isModified()) {
					$affectedRows += $this->aArticleGroup->save($con);
				}
				$this->setArticleGroup($this->aArticleGroup);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ArticleArticleGroupPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ArticleArticleGroupPeer::doUpdate($this, $con);
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


												
			if ($this->aArticle !== null) {
				if (!$this->aArticle->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArticle->getValidationFailures());
				}
			}

			if ($this->aArticleGroup !== null) {
				if (!$this->aArticleGroup->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArticleGroup->getValidationFailures());
				}
			}


			if (($retval = ArticleArticleGroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticleArticleGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getArticleId();
				break;
			case 1:
				return $this->getArticleGroupId();
				break;
			case 2:
				return $this->getPriority();
				break;
			case 3:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArticleArticleGroupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getArticleId(),
			$keys[1] => $this->getArticleGroupId(),
			$keys[2] => $this->getPriority(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticleArticleGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setArticleId($value);
				break;
			case 1:
				$this->setArticleGroupId($value);
				break;
			case 2:
				$this->setPriority($value);
				break;
			case 3:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArticleArticleGroupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setArticleId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setArticleGroupId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPriority($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ArticleArticleGroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(ArticleArticleGroupPeer::ARTICLE_ID)) $criteria->add(ArticleArticleGroupPeer::ARTICLE_ID, $this->article_id);
		if ($this->isColumnModified(ArticleArticleGroupPeer::ARTICLE_GROUP_ID)) $criteria->add(ArticleArticleGroupPeer::ARTICLE_GROUP_ID, $this->article_group_id);
		if ($this->isColumnModified(ArticleArticleGroupPeer::PRIORITY)) $criteria->add(ArticleArticleGroupPeer::PRIORITY, $this->priority);
		if ($this->isColumnModified(ArticleArticleGroupPeer::ID)) $criteria->add(ArticleArticleGroupPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ArticleArticleGroupPeer::DATABASE_NAME);

		$criteria->add(ArticleArticleGroupPeer::ID, $this->id);

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

		$copyObj->setArticleId($this->article_id);

		$copyObj->setArticleGroupId($this->article_group_id);

		$copyObj->setPriority($this->priority);


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
			self::$peer = new ArticleArticleGroupPeer();
		}
		return self::$peer;
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

	
	public function setArticleGroup($v)
	{


		if ($v === null) {
			$this->setArticleGroupId(NULL);
		} else {
			$this->setArticleGroupId($v->getId());
		}


		$this->aArticleGroup = $v;
	}


	
	public function getArticleGroup($con = null)
	{
		if ($this->aArticleGroup === null && ($this->article_group_id !== null)) {
						include_once 'lib/model/om/BaseArticleGroupPeer.php';

			$this->aArticleGroup = ArticleGroupPeer::retrieveByPK($this->article_group_id, $con);

			
		}
		return $this->aArticleGroup;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseArticleArticleGroup:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseArticleArticleGroup::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 