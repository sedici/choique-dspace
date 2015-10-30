<?php


abstract class BaseTemplate extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $public_name;


	
	protected $comment;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $created_by;


	
	protected $updated_by;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $collNewsSpaces;

	
	protected $lastNewsSpaceCriteria = null;

	
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

	
	public function getPublicName()
	{

		return $this->public_name;
	}

	
	public function getComment()
	{

		return $this->comment;
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
			$this->modifiedColumns[] = TemplatePeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = TemplatePeer::NAME;
		}

	} 
	
	public function setPublicName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->public_name !== $v) {
			$this->public_name = $v;
			$this->modifiedColumns[] = TemplatePeer::PUBLIC_NAME;
		}

	} 
	
	public function setComment($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = TemplatePeer::COMMENT;
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
			$this->modifiedColumns[] = TemplatePeer::CREATED_AT;
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
			$this->modifiedColumns[] = TemplatePeer::UPDATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = TemplatePeer::CREATED_BY;
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
			$this->modifiedColumns[] = TemplatePeer::UPDATED_BY;
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

			$this->public_name = $rs->getString($startcol + 2);

			$this->comment = $rs->getString($startcol + 3);

			$this->created_at = $rs->getTimestamp($startcol + 4, null);

			$this->updated_at = $rs->getTimestamp($startcol + 5, null);

			$this->created_by = $rs->getInt($startcol + 6);

			$this->updated_by = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Template object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseTemplate:delete:pre') as $callable)
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
			$con = Propel::getConnection(TemplatePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			TemplatePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseTemplate:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseTemplate:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(TemplatePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(TemplatePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(TemplatePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseTemplate:save:post') as $callable)
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
					$pk = TemplatePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += TemplatePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collNewsSpaces !== null) {
				foreach($this->collNewsSpaces as $referrerFK) {
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


			if (($retval = TemplatePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collNewsSpaces !== null) {
					foreach($this->collNewsSpaces as $referrerFK) {
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
		$pos = TemplatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getPublicName();
				break;
			case 3:
				return $this->getComment();
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
		$keys = TemplatePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getPublicName(),
			$keys[3] => $this->getComment(),
			$keys[4] => $this->getCreatedAt(),
			$keys[5] => $this->getUpdatedAt(),
			$keys[6] => $this->getCreatedBy(),
			$keys[7] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = TemplatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setPublicName($value);
				break;
			case 3:
				$this->setComment($value);
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
		$keys = TemplatePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPublicName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setComment($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setCreatedAt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setUpdatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedBy($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedBy($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(TemplatePeer::DATABASE_NAME);

		if ($this->isColumnModified(TemplatePeer::ID)) $criteria->add(TemplatePeer::ID, $this->id);
		if ($this->isColumnModified(TemplatePeer::NAME)) $criteria->add(TemplatePeer::NAME, $this->name);
		if ($this->isColumnModified(TemplatePeer::PUBLIC_NAME)) $criteria->add(TemplatePeer::PUBLIC_NAME, $this->public_name);
		if ($this->isColumnModified(TemplatePeer::COMMENT)) $criteria->add(TemplatePeer::COMMENT, $this->comment);
		if ($this->isColumnModified(TemplatePeer::CREATED_AT)) $criteria->add(TemplatePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(TemplatePeer::UPDATED_AT)) $criteria->add(TemplatePeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(TemplatePeer::CREATED_BY)) $criteria->add(TemplatePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(TemplatePeer::UPDATED_BY)) $criteria->add(TemplatePeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(TemplatePeer::DATABASE_NAME);

		$criteria->add(TemplatePeer::ID, $this->id);

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

		$copyObj->setPublicName($this->public_name);

		$copyObj->setComment($this->comment);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedBy($this->updated_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getNewsSpaces() as $relObj) {
				$copyObj->addNewsSpace($relObj->copy($deepCopy));
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
			self::$peer = new TemplatePeer();
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

	
	public function initNewsSpaces()
	{
		if ($this->collNewsSpaces === null) {
			$this->collNewsSpaces = array();
		}
	}

	
	public function getNewsSpaces($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseNewsSpacePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNewsSpaces === null) {
			if ($this->isNew()) {
			   $this->collNewsSpaces = array();
			} else {

				$criteria->add(NewsSpacePeer::TEMPLATE_ID, $this->getId());

				NewsSpacePeer::addSelectColumns($criteria);
				$this->collNewsSpaces = NewsSpacePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(NewsSpacePeer::TEMPLATE_ID, $this->getId());

				NewsSpacePeer::addSelectColumns($criteria);
				if (!isset($this->lastNewsSpaceCriteria) || !$this->lastNewsSpaceCriteria->equals($criteria)) {
					$this->collNewsSpaces = NewsSpacePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastNewsSpaceCriteria = $criteria;
		return $this->collNewsSpaces;
	}

	
	public function countNewsSpaces($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseNewsSpacePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(NewsSpacePeer::TEMPLATE_ID, $this->getId());

		return NewsSpacePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addNewsSpace(NewsSpace $l)
	{
		$this->collNewsSpaces[] = $l;
		$l->setTemplate($this);
	}


	
	public function getNewsSpacesJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseNewsSpacePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNewsSpaces === null) {
			if ($this->isNew()) {
				$this->collNewsSpaces = array();
			} else {

				$criteria->add(NewsSpacePeer::TEMPLATE_ID, $this->getId());

				$this->collNewsSpaces = NewsSpacePeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(NewsSpacePeer::TEMPLATE_ID, $this->getId());

			if (!isset($this->lastNewsSpaceCriteria) || !$this->lastNewsSpaceCriteria->equals($criteria)) {
				$this->collNewsSpaces = NewsSpacePeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastNewsSpaceCriteria = $criteria;

		return $this->collNewsSpaces;
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

				$criteria->add(SectionPeer::TEMPLATE_ID, $this->getId());

				SectionPeer::addSelectColumns($criteria);
				$this->collSections = SectionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SectionPeer::TEMPLATE_ID, $this->getId());

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

		$criteria->add(SectionPeer::TEMPLATE_ID, $this->getId());

		return SectionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSection(Section $l)
	{
		$this->collSections[] = $l;
		$l->setTemplate($this);
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

				$criteria->add(SectionPeer::TEMPLATE_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::TEMPLATE_ID, $this->getId());

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

				$criteria->add(SectionPeer::TEMPLATE_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinSectionRelatedBySectionId($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::TEMPLATE_ID, $this->getId());

			if (!isset($this->lastSectionCriteria) || !$this->lastSectionCriteria->equals($criteria)) {
				$this->collSections = SectionPeer::doSelectJoinSectionRelatedBySectionId($criteria, $con);
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

				$criteria->add(SectionPeer::TEMPLATE_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::TEMPLATE_ID, $this->getId());

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

				$criteria->add(SectionPeer::TEMPLATE_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinLayout($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::TEMPLATE_ID, $this->getId());

			if (!isset($this->lastSectionCriteria) || !$this->lastSectionCriteria->equals($criteria)) {
				$this->collSections = SectionPeer::doSelectJoinLayout($criteria, $con);
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

				$criteria->add(SectionPeer::TEMPLATE_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinArticleGroup($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::TEMPLATE_ID, $this->getId());

			if (!isset($this->lastSectionCriteria) || !$this->lastSectionCriteria->equals($criteria)) {
				$this->collSections = SectionPeer::doSelectJoinArticleGroup($criteria, $con);
			}
		}
		$this->lastSectionCriteria = $criteria;

		return $this->collSections;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseTemplate:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseTemplate::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 