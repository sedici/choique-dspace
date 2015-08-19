<?php


abstract class BaseArticleSection extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $article_id;


	
	protected $section_id;


	
	protected $priority = 0;


	
	protected $id;

	
	protected $aArticle;

	
	protected $aSection;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getArticleId()
	{

		return $this->article_id;
	}

	
	public function getSectionId()
	{

		return $this->section_id;
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
			$this->modifiedColumns[] = ArticleSectionPeer::ARTICLE_ID;
		}

		if ($this->aArticle !== null && $this->aArticle->getId() !== $v) {
			$this->aArticle = null;
		}

	} 
	
	public function setSectionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->section_id !== $v) {
			$this->section_id = $v;
			$this->modifiedColumns[] = ArticleSectionPeer::SECTION_ID;
		}

		if ($this->aSection !== null && $this->aSection->getId() !== $v) {
			$this->aSection = null;
		}

	} 
	
	public function setPriority($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->priority !== $v || $v === 0) {
			$this->priority = $v;
			$this->modifiedColumns[] = ArticleSectionPeer::PRIORITY;
		}

	} 
	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ArticleSectionPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->article_id = $rs->getInt($startcol + 0);

			$this->section_id = $rs->getInt($startcol + 1);

			$this->priority = $rs->getInt($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating ArticleSection object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleSection:delete:pre') as $callable)
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
			$con = Propel::getConnection(ArticleSectionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ArticleSectionPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseArticleSection:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseArticleSection:save:pre') as $callable)
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
			$con = Propel::getConnection(ArticleSectionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseArticleSection:save:post') as $callable)
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

			if ($this->aSection !== null) {
				if ($this->aSection->isModified()) {
					$affectedRows += $this->aSection->save($con);
				}
				$this->setSection($this->aSection);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ArticleSectionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ArticleSectionPeer::doUpdate($this, $con);
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

			if ($this->aSection !== null) {
				if (!$this->aSection->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSection->getValidationFailures());
				}
			}


			if (($retval = ArticleSectionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticleSectionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getArticleId();
				break;
			case 1:
				return $this->getSectionId();
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
		$keys = ArticleSectionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getArticleId(),
			$keys[1] => $this->getSectionId(),
			$keys[2] => $this->getPriority(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticleSectionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setArticleId($value);
				break;
			case 1:
				$this->setSectionId($value);
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
		$keys = ArticleSectionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setArticleId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setSectionId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPriority($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ArticleSectionPeer::DATABASE_NAME);

		if ($this->isColumnModified(ArticleSectionPeer::ARTICLE_ID)) $criteria->add(ArticleSectionPeer::ARTICLE_ID, $this->article_id);
		if ($this->isColumnModified(ArticleSectionPeer::SECTION_ID)) $criteria->add(ArticleSectionPeer::SECTION_ID, $this->section_id);
		if ($this->isColumnModified(ArticleSectionPeer::PRIORITY)) $criteria->add(ArticleSectionPeer::PRIORITY, $this->priority);
		if ($this->isColumnModified(ArticleSectionPeer::ID)) $criteria->add(ArticleSectionPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ArticleSectionPeer::DATABASE_NAME);

		$criteria->add(ArticleSectionPeer::ID, $this->id);

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

		$copyObj->setSectionId($this->section_id);

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
			self::$peer = new ArticleSectionPeer();
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

	
	public function setSection($v)
	{


		if ($v === null) {
			$this->setSectionId(NULL);
		} else {
			$this->setSectionId($v->getId());
		}


		$this->aSection = $v;
	}


	
	public function getSection($con = null)
	{
		if ($this->aSection === null && ($this->section_id !== null)) {
						include_once 'lib/model/om/BaseSectionPeer.php';

			$this->aSection = SectionPeer::retrieveByPK($this->section_id, $con);

			
		}
		return $this->aSection;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseArticleSection:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseArticleSection::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 