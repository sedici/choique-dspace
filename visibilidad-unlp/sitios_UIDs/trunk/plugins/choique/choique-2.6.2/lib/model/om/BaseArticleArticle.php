<?php


abstract class BaseArticleArticle extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $article_referer_id;


	
	protected $article_referee_id;

	
	protected $aArticleRelatedByArticleRefererId;

	
	protected $aArticleRelatedByArticleRefereeId;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getArticleRefererId()
	{

		return $this->article_referer_id;
	}

	
	public function getArticleRefereeId()
	{

		return $this->article_referee_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ArticleArticlePeer::ID;
		}

	} 
	
	public function setArticleRefererId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->article_referer_id !== $v) {
			$this->article_referer_id = $v;
			$this->modifiedColumns[] = ArticleArticlePeer::ARTICLE_REFERER_ID;
		}

		if ($this->aArticleRelatedByArticleRefererId !== null && $this->aArticleRelatedByArticleRefererId->getId() !== $v) {
			$this->aArticleRelatedByArticleRefererId = null;
		}

	} 
	
	public function setArticleRefereeId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->article_referee_id !== $v) {
			$this->article_referee_id = $v;
			$this->modifiedColumns[] = ArticleArticlePeer::ARTICLE_REFEREE_ID;
		}

		if ($this->aArticleRelatedByArticleRefereeId !== null && $this->aArticleRelatedByArticleRefereeId->getId() !== $v) {
			$this->aArticleRelatedByArticleRefereeId = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->article_referer_id = $rs->getInt($startcol + 1);

			$this->article_referee_id = $rs->getInt($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ArticleArticle object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleArticle:delete:pre') as $callable)
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
			$con = Propel::getConnection(ArticleArticlePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ArticleArticlePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseArticleArticle:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleArticle:save:pre') as $callable)
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
			$con = Propel::getConnection(ArticleArticlePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseArticleArticle:save:post') as $callable)
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


												
			if ($this->aArticleRelatedByArticleRefererId !== null) {
				if ($this->aArticleRelatedByArticleRefererId->isModified()) {
					$affectedRows += $this->aArticleRelatedByArticleRefererId->save($con);
				}
				$this->setArticleRelatedByArticleRefererId($this->aArticleRelatedByArticleRefererId);
			}

			if ($this->aArticleRelatedByArticleRefereeId !== null) {
				if ($this->aArticleRelatedByArticleRefereeId->isModified()) {
					$affectedRows += $this->aArticleRelatedByArticleRefereeId->save($con);
				}
				$this->setArticleRelatedByArticleRefereeId($this->aArticleRelatedByArticleRefereeId);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ArticleArticlePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ArticleArticlePeer::doUpdate($this, $con);
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


												
			if ($this->aArticleRelatedByArticleRefererId !== null) {
				if (!$this->aArticleRelatedByArticleRefererId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArticleRelatedByArticleRefererId->getValidationFailures());
				}
			}

			if ($this->aArticleRelatedByArticleRefereeId !== null) {
				if (!$this->aArticleRelatedByArticleRefereeId->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArticleRelatedByArticleRefereeId->getValidationFailures());
				}
			}


			if (($retval = ArticleArticlePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticleArticlePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getArticleRefererId();
				break;
			case 2:
				return $this->getArticleRefereeId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArticleArticlePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getArticleRefererId(),
			$keys[2] => $this->getArticleRefereeId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticleArticlePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setArticleRefererId($value);
				break;
			case 2:
				$this->setArticleRefereeId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArticleArticlePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setArticleRefererId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setArticleRefereeId($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ArticleArticlePeer::DATABASE_NAME);

		if ($this->isColumnModified(ArticleArticlePeer::ID)) $criteria->add(ArticleArticlePeer::ID, $this->id);
		if ($this->isColumnModified(ArticleArticlePeer::ARTICLE_REFERER_ID)) $criteria->add(ArticleArticlePeer::ARTICLE_REFERER_ID, $this->article_referer_id);
		if ($this->isColumnModified(ArticleArticlePeer::ARTICLE_REFEREE_ID)) $criteria->add(ArticleArticlePeer::ARTICLE_REFEREE_ID, $this->article_referee_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ArticleArticlePeer::DATABASE_NAME);

		$criteria->add(ArticleArticlePeer::ID, $this->id);

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

		$copyObj->setArticleRefererId($this->article_referer_id);

		$copyObj->setArticleRefereeId($this->article_referee_id);


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
			self::$peer = new ArticleArticlePeer();
		}
		return self::$peer;
	}

	
	public function setArticleRelatedByArticleRefererId($v)
	{


		if ($v === null) {
			$this->setArticleRefererId(NULL);
		} else {
			$this->setArticleRefererId($v->getId());
		}


		$this->aArticleRelatedByArticleRefererId = $v;
	}


	
	public function getArticleRelatedByArticleRefererId($con = null)
	{
		if ($this->aArticleRelatedByArticleRefererId === null && ($this->article_referer_id !== null)) {
						include_once 'lib/model/om/BaseArticlePeer.php';

			$this->aArticleRelatedByArticleRefererId = ArticlePeer::retrieveByPK($this->article_referer_id, $con);

			
		}
		return $this->aArticleRelatedByArticleRefererId;
	}

	
	public function setArticleRelatedByArticleRefereeId($v)
	{


		if ($v === null) {
			$this->setArticleRefereeId(NULL);
		} else {
			$this->setArticleRefereeId($v->getId());
		}


		$this->aArticleRelatedByArticleRefereeId = $v;
	}


	
	public function getArticleRelatedByArticleRefereeId($con = null)
	{
		if ($this->aArticleRelatedByArticleRefereeId === null && ($this->article_referee_id !== null)) {
						include_once 'lib/model/om/BaseArticlePeer.php';

			$this->aArticleRelatedByArticleRefereeId = ArticlePeer::retrieveByPK($this->article_referee_id, $con);

			
		}
		return $this->aArticleRelatedByArticleRefereeId;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseArticleArticle:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseArticleArticle::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 