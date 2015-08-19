<?php


abstract class BaseLayout extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $article_layout;


	
	protected $template_layout;


	
	protected $is_default = false;


	
	protected $virtual_section_id;


	
	protected $created_at;


	
	protected $updated_at;

	
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

	
	public function getArticleLayout()
	{

		return $this->article_layout;
	}

	
	public function getTemplateLayout()
	{

		return $this->template_layout;
	}

	
	public function getIsDefault()
	{

		return $this->is_default;
	}

	
	public function getVirtualSectionId()
	{

		return $this->virtual_section_id;
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

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LayoutPeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = LayoutPeer::NAME;
		}

	} 
	
	public function setArticleLayout($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->article_layout !== $v) {
			$this->article_layout = $v;
			$this->modifiedColumns[] = LayoutPeer::ARTICLE_LAYOUT;
		}

	} 
	
	public function setTemplateLayout($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->template_layout !== $v) {
			$this->template_layout = $v;
			$this->modifiedColumns[] = LayoutPeer::TEMPLATE_LAYOUT;
		}

	} 
	
	public function setIsDefault($v)
	{

		if ($this->is_default !== $v || $v === false) {
			$this->is_default = $v;
			$this->modifiedColumns[] = LayoutPeer::IS_DEFAULT;
		}

	} 
	
	public function setVirtualSectionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->virtual_section_id !== $v) {
			$this->virtual_section_id = $v;
			$this->modifiedColumns[] = LayoutPeer::VIRTUAL_SECTION_ID;
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
			$this->modifiedColumns[] = LayoutPeer::CREATED_AT;
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
			$this->modifiedColumns[] = LayoutPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->article_layout = $rs->getString($startcol + 2);

			$this->template_layout = $rs->getString($startcol + 3);

			$this->is_default = $rs->getBoolean($startcol + 4);

			$this->virtual_section_id = $rs->getInt($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Layout object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseLayout:delete:pre') as $callable)
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
			$con = Propel::getConnection(LayoutPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LayoutPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseLayout:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseLayout:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(LayoutPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(LayoutPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LayoutPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseLayout:save:post') as $callable)
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
					$pk = LayoutPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LayoutPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


			if (($retval = LayoutPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
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
		$pos = LayoutPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getArticleLayout();
				break;
			case 3:
				return $this->getTemplateLayout();
				break;
			case 4:
				return $this->getIsDefault();
				break;
			case 5:
				return $this->getVirtualSectionId();
				break;
			case 6:
				return $this->getCreatedAt();
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
		$keys = LayoutPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getArticleLayout(),
			$keys[3] => $this->getTemplateLayout(),
			$keys[4] => $this->getIsDefault(),
			$keys[5] => $this->getVirtualSectionId(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LayoutPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setArticleLayout($value);
				break;
			case 3:
				$this->setTemplateLayout($value);
				break;
			case 4:
				$this->setIsDefault($value);
				break;
			case 5:
				$this->setVirtualSectionId($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LayoutPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setArticleLayout($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTemplateLayout($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setIsDefault($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setVirtualSectionId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LayoutPeer::DATABASE_NAME);

		if ($this->isColumnModified(LayoutPeer::ID)) $criteria->add(LayoutPeer::ID, $this->id);
		if ($this->isColumnModified(LayoutPeer::NAME)) $criteria->add(LayoutPeer::NAME, $this->name);
		if ($this->isColumnModified(LayoutPeer::ARTICLE_LAYOUT)) $criteria->add(LayoutPeer::ARTICLE_LAYOUT, $this->article_layout);
		if ($this->isColumnModified(LayoutPeer::TEMPLATE_LAYOUT)) $criteria->add(LayoutPeer::TEMPLATE_LAYOUT, $this->template_layout);
		if ($this->isColumnModified(LayoutPeer::IS_DEFAULT)) $criteria->add(LayoutPeer::IS_DEFAULT, $this->is_default);
		if ($this->isColumnModified(LayoutPeer::VIRTUAL_SECTION_ID)) $criteria->add(LayoutPeer::VIRTUAL_SECTION_ID, $this->virtual_section_id);
		if ($this->isColumnModified(LayoutPeer::CREATED_AT)) $criteria->add(LayoutPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(LayoutPeer::UPDATED_AT)) $criteria->add(LayoutPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LayoutPeer::DATABASE_NAME);

		$criteria->add(LayoutPeer::ID, $this->id);

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

		$copyObj->setArticleLayout($this->article_layout);

		$copyObj->setTemplateLayout($this->template_layout);

		$copyObj->setIsDefault($this->is_default);

		$copyObj->setVirtualSectionId($this->virtual_section_id);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

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
			self::$peer = new LayoutPeer();
		}
		return self::$peer;
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

				$criteria->add(SectionPeer::LAYOUT_ID, $this->getId());

				SectionPeer::addSelectColumns($criteria);
				$this->collSections = SectionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SectionPeer::LAYOUT_ID, $this->getId());

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

		$criteria->add(SectionPeer::LAYOUT_ID, $this->getId());

		return SectionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSection(Section $l)
	{
		$this->collSections[] = $l;
		$l->setLayout($this);
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

				$criteria->add(SectionPeer::LAYOUT_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::LAYOUT_ID, $this->getId());

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

				$criteria->add(SectionPeer::LAYOUT_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinSectionRelatedBySectionId($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::LAYOUT_ID, $this->getId());

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

				$criteria->add(SectionPeer::LAYOUT_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinTemplate($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::LAYOUT_ID, $this->getId());

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

				$criteria->add(SectionPeer::LAYOUT_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::LAYOUT_ID, $this->getId());

			if (!isset($this->lastSectionCriteria) || !$this->lastSectionCriteria->equals($criteria)) {
				$this->collSections = SectionPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastSectionCriteria = $criteria;

		return $this->collSections;
	}


	
	public function getSectionsJoinArticleGroup($criteria = null, $con = null)
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

				$criteria->add(SectionPeer::LAYOUT_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinArticleGroup($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::LAYOUT_ID, $this->getId());

			if (!isset($this->lastSectionCriteria) || !$this->lastSectionCriteria->equals($criteria)) {
				$this->collSections = SectionPeer::doSelectJoinArticleGroup($criteria, $con);
			}
		}
		$this->lastSectionCriteria = $criteria;

		return $this->collSections;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseLayout:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseLayout::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 