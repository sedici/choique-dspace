<?php


abstract class BaseTag extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $description;


	
	protected $comment;

	
	protected $collMultimediaTags;

	
	protected $lastMultimediaTagCriteria = null;

	
	protected $collSectionTags;

	
	protected $lastSectionTagCriteria = null;

	
	protected $collArticleTags;

	
	protected $lastArticleTagCriteria = null;

	
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
			$this->modifiedColumns[] = TagPeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = TagPeer::NAME;
		}

	} 
	
	public function setDescription($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = TagPeer::DESCRIPTION;
		}

	} 
	
	public function setComment($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = TagPeer::COMMENT;
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
			throw new PropelException("Error populating Tag object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseTag:delete:pre') as $callable)
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
			$con = Propel::getConnection(TagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TagPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseTag:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseTag:save:pre') as $callable)
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
			$con = Propel::getConnection(TagPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseTag:save:post') as $callable)
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
					$pk = TagPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TagPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collMultimediaTags !== null) {
				foreach($this->collMultimediaTags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSectionTags !== null) {
				foreach($this->collSectionTags as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticleTags !== null) {
				foreach($this->collArticleTags as $referrerFK) {
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


			if (($retval = TagPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collMultimediaTags !== null) {
					foreach($this->collMultimediaTags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSectionTags !== null) {
					foreach($this->collSectionTags as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticleTags !== null) {
					foreach($this->collArticleTags as $referrerFK) {
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
		$pos = TagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = TagPeer::getFieldNames($keyType);
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
		$pos = TagPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = TagPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setComment($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TagPeer::DATABASE_NAME);

		if ($this->isColumnModified(TagPeer::ID)) $criteria->add(TagPeer::ID, $this->id);
		if ($this->isColumnModified(TagPeer::NAME)) $criteria->add(TagPeer::NAME, $this->name);
		if ($this->isColumnModified(TagPeer::DESCRIPTION)) $criteria->add(TagPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(TagPeer::COMMENT)) $criteria->add(TagPeer::COMMENT, $this->comment);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TagPeer::DATABASE_NAME);

		$criteria->add(TagPeer::ID, $this->id);

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

			foreach($this->getMultimediaTags() as $relObj) {
				$copyObj->addMultimediaTag($relObj->copy($deepCopy));
			}

			foreach($this->getSectionTags() as $relObj) {
				$copyObj->addSectionTag($relObj->copy($deepCopy));
			}

			foreach($this->getArticleTags() as $relObj) {
				$copyObj->addArticleTag($relObj->copy($deepCopy));
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
			self::$peer = new TagPeer();
		}
		return self::$peer;
	}

	
	public function initMultimediaTags()
	{
		if ($this->collMultimediaTags === null) {
			$this->collMultimediaTags = array();
		}
	}

	
	public function getMultimediaTags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMultimediaTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMultimediaTags === null) {
			if ($this->isNew()) {
			   $this->collMultimediaTags = array();
			} else {

				$criteria->add(MultimediaTagPeer::TAG_ID, $this->getId());

				MultimediaTagPeer::addSelectColumns($criteria);
				$this->collMultimediaTags = MultimediaTagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MultimediaTagPeer::TAG_ID, $this->getId());

				MultimediaTagPeer::addSelectColumns($criteria);
				if (!isset($this->lastMultimediaTagCriteria) || !$this->lastMultimediaTagCriteria->equals($criteria)) {
					$this->collMultimediaTags = MultimediaTagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMultimediaTagCriteria = $criteria;
		return $this->collMultimediaTags;
	}

	
	public function countMultimediaTags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMultimediaTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MultimediaTagPeer::TAG_ID, $this->getId());

		return MultimediaTagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMultimediaTag(MultimediaTag $l)
	{
		$this->collMultimediaTags[] = $l;
		$l->setTag($this);
	}


	
	public function getMultimediaTagsJoinMultimedia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMultimediaTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMultimediaTags === null) {
			if ($this->isNew()) {
				$this->collMultimediaTags = array();
			} else {

				$criteria->add(MultimediaTagPeer::TAG_ID, $this->getId());

				$this->collMultimediaTags = MultimediaTagPeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(MultimediaTagPeer::TAG_ID, $this->getId());

			if (!isset($this->lastMultimediaTagCriteria) || !$this->lastMultimediaTagCriteria->equals($criteria)) {
				$this->collMultimediaTags = MultimediaTagPeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastMultimediaTagCriteria = $criteria;

		return $this->collMultimediaTags;
	}

	
	public function initSectionTags()
	{
		if ($this->collSectionTags === null) {
			$this->collSectionTags = array();
		}
	}

	
	public function getSectionTags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionTags === null) {
			if ($this->isNew()) {
			   $this->collSectionTags = array();
			} else {

				$criteria->add(SectionTagPeer::TAG_ID, $this->getId());

				SectionTagPeer::addSelectColumns($criteria);
				$this->collSectionTags = SectionTagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SectionTagPeer::TAG_ID, $this->getId());

				SectionTagPeer::addSelectColumns($criteria);
				if (!isset($this->lastSectionTagCriteria) || !$this->lastSectionTagCriteria->equals($criteria)) {
					$this->collSectionTags = SectionTagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSectionTagCriteria = $criteria;
		return $this->collSectionTags;
	}

	
	public function countSectionTags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSectionTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SectionTagPeer::TAG_ID, $this->getId());

		return SectionTagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSectionTag(SectionTag $l)
	{
		$this->collSectionTags[] = $l;
		$l->setTag($this);
	}


	
	public function getSectionTagsJoinSection($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSectionTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSectionTags === null) {
			if ($this->isNew()) {
				$this->collSectionTags = array();
			} else {

				$criteria->add(SectionTagPeer::TAG_ID, $this->getId());

				$this->collSectionTags = SectionTagPeer::doSelectJoinSection($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionTagPeer::TAG_ID, $this->getId());

			if (!isset($this->lastSectionTagCriteria) || !$this->lastSectionTagCriteria->equals($criteria)) {
				$this->collSectionTags = SectionTagPeer::doSelectJoinSection($criteria, $con);
			}
		}
		$this->lastSectionTagCriteria = $criteria;

		return $this->collSectionTags;
	}

	
	public function initArticleTags()
	{
		if ($this->collArticleTags === null) {
			$this->collArticleTags = array();
		}
	}

	
	public function getArticleTags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleTags === null) {
			if ($this->isNew()) {
			   $this->collArticleTags = array();
			} else {

				$criteria->add(ArticleTagPeer::TAG_ID, $this->getId());

				ArticleTagPeer::addSelectColumns($criteria);
				$this->collArticleTags = ArticleTagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleTagPeer::TAG_ID, $this->getId());

				ArticleTagPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleTagCriteria) || !$this->lastArticleTagCriteria->equals($criteria)) {
					$this->collArticleTags = ArticleTagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleTagCriteria = $criteria;
		return $this->collArticleTags;
	}

	
	public function countArticleTags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleTagPeer::TAG_ID, $this->getId());

		return ArticleTagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleTag(ArticleTag $l)
	{
		$this->collArticleTags[] = $l;
		$l->setTag($this);
	}


	
	public function getArticleTagsJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleTags === null) {
			if ($this->isNew()) {
				$this->collArticleTags = array();
			} else {

				$criteria->add(ArticleTagPeer::TAG_ID, $this->getId());

				$this->collArticleTags = ArticleTagPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleTagPeer::TAG_ID, $this->getId());

			if (!isset($this->lastArticleTagCriteria) || !$this->lastArticleTagCriteria->equals($criteria)) {
				$this->collArticleTags = ArticleTagPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastArticleTagCriteria = $criteria;

		return $this->collArticleTags;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseTag:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseTag::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 