<?php


abstract class BaseForm extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $title;


	
	protected $name;


	
	protected $description;


	
	protected $comment;


	
	protected $rows;


	
	protected $is_poll;


	
	protected $is_active;


	
	protected $success_msg;


	
	protected $email;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $created_by;


	
	protected $updated_by;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $collArticleForms;

	
	protected $lastArticleFormCriteria = null;

	
	protected $collFields;

	
	protected $lastFieldCriteria = null;

	
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

	
	public function getRows()
	{

		return $this->rows;
	}

	
	public function getIsPoll()
	{

		return $this->is_poll;
	}

	
	public function getIsActive()
	{

		return $this->is_active;
	}

	
	public function getSuccessMsg()
	{

		return $this->success_msg;
	}

	
	public function getEmail()
	{

		return $this->email;
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
			$this->modifiedColumns[] = FormPeer::ID;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = FormPeer::TITLE;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = FormPeer::NAME;
		}

	} 
	
	public function setDescription($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = FormPeer::DESCRIPTION;
		}

	} 
	
	public function setComment($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = FormPeer::COMMENT;
		}

	} 
	
	public function setRows($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->rows !== $v) {
			$this->rows = $v;
			$this->modifiedColumns[] = FormPeer::ROWS;
		}

	} 
	
	public function setIsPoll($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_poll !== $v) {
			$this->is_poll = $v;
			$this->modifiedColumns[] = FormPeer::IS_POLL;
		}

	} 
	
	public function setIsActive($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_active !== $v) {
			$this->is_active = $v;
			$this->modifiedColumns[] = FormPeer::IS_ACTIVE;
		}

	} 
	
	public function setSuccessMsg($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->success_msg !== $v) {
			$this->success_msg = $v;
			$this->modifiedColumns[] = FormPeer::SUCCESS_MSG;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = FormPeer::EMAIL;
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
			$this->modifiedColumns[] = FormPeer::CREATED_AT;
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
			$this->modifiedColumns[] = FormPeer::UPDATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = FormPeer::CREATED_BY;
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
			$this->modifiedColumns[] = FormPeer::UPDATED_BY;
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

			$this->name = $rs->getString($startcol + 2);

			$this->description = $rs->getString($startcol + 3);

			$this->comment = $rs->getString($startcol + 4);

			$this->rows = $rs->getInt($startcol + 5);

			$this->is_poll = $rs->getInt($startcol + 6);

			$this->is_active = $rs->getInt($startcol + 7);

			$this->success_msg = $rs->getString($startcol + 8);

			$this->email = $rs->getString($startcol + 9);

			$this->created_at = $rs->getTimestamp($startcol + 10, null);

			$this->updated_at = $rs->getTimestamp($startcol + 11, null);

			$this->created_by = $rs->getInt($startcol + 12);

			$this->updated_by = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Form object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseForm:delete:pre') as $callable)
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
			$con = Propel::getConnection(FormPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FormPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseForm:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseForm:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(FormPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(FormPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(FormPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseForm:save:post') as $callable)
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
					$pk = FormPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FormPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collArticleForms !== null) {
				foreach($this->collArticleForms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFields !== null) {
				foreach($this->collFields as $referrerFK) {
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


			if (($retval = FormPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collArticleForms !== null) {
					foreach($this->collArticleForms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFields !== null) {
					foreach($this->collFields as $referrerFK) {
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
		$pos = FormPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getName();
				break;
			case 3:
				return $this->getDescription();
				break;
			case 4:
				return $this->getComment();
				break;
			case 5:
				return $this->getRows();
				break;
			case 6:
				return $this->getIsPoll();
				break;
			case 7:
				return $this->getIsActive();
				break;
			case 8:
				return $this->getSuccessMsg();
				break;
			case 9:
				return $this->getEmail();
				break;
			case 10:
				return $this->getCreatedAt();
				break;
			case 11:
				return $this->getUpdatedAt();
				break;
			case 12:
				return $this->getCreatedBy();
				break;
			case 13:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FormPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getTitle(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getDescription(),
			$keys[4] => $this->getComment(),
			$keys[5] => $this->getRows(),
			$keys[6] => $this->getIsPoll(),
			$keys[7] => $this->getIsActive(),
			$keys[8] => $this->getSuccessMsg(),
			$keys[9] => $this->getEmail(),
			$keys[10] => $this->getCreatedAt(),
			$keys[11] => $this->getUpdatedAt(),
			$keys[12] => $this->getCreatedBy(),
			$keys[13] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FormPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setName($value);
				break;
			case 3:
				$this->setDescription($value);
				break;
			case 4:
				$this->setComment($value);
				break;
			case 5:
				$this->setRows($value);
				break;
			case 6:
				$this->setIsPoll($value);
				break;
			case 7:
				$this->setIsActive($value);
				break;
			case 8:
				$this->setSuccessMsg($value);
				break;
			case 9:
				$this->setEmail($value);
				break;
			case 10:
				$this->setCreatedAt($value);
				break;
			case 11:
				$this->setUpdatedAt($value);
				break;
			case 12:
				$this->setCreatedBy($value);
				break;
			case 13:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FormPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setTitle($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setComment($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setRows($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setIsPoll($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIsActive($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setSuccessMsg($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setEmail($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setCreatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setUpdatedAt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setCreatedBy($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setUpdatedBy($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FormPeer::DATABASE_NAME);

		if ($this->isColumnModified(FormPeer::ID)) $criteria->add(FormPeer::ID, $this->id);
		if ($this->isColumnModified(FormPeer::TITLE)) $criteria->add(FormPeer::TITLE, $this->title);
		if ($this->isColumnModified(FormPeer::NAME)) $criteria->add(FormPeer::NAME, $this->name);
		if ($this->isColumnModified(FormPeer::DESCRIPTION)) $criteria->add(FormPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(FormPeer::COMMENT)) $criteria->add(FormPeer::COMMENT, $this->comment);
		if ($this->isColumnModified(FormPeer::ROWS)) $criteria->add(FormPeer::ROWS, $this->rows);
		if ($this->isColumnModified(FormPeer::IS_POLL)) $criteria->add(FormPeer::IS_POLL, $this->is_poll);
		if ($this->isColumnModified(FormPeer::IS_ACTIVE)) $criteria->add(FormPeer::IS_ACTIVE, $this->is_active);
		if ($this->isColumnModified(FormPeer::SUCCESS_MSG)) $criteria->add(FormPeer::SUCCESS_MSG, $this->success_msg);
		if ($this->isColumnModified(FormPeer::EMAIL)) $criteria->add(FormPeer::EMAIL, $this->email);
		if ($this->isColumnModified(FormPeer::CREATED_AT)) $criteria->add(FormPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(FormPeer::UPDATED_AT)) $criteria->add(FormPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(FormPeer::CREATED_BY)) $criteria->add(FormPeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(FormPeer::UPDATED_BY)) $criteria->add(FormPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FormPeer::DATABASE_NAME);

		$criteria->add(FormPeer::ID, $this->id);

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

		$copyObj->setName($this->name);

		$copyObj->setDescription($this->description);

		$copyObj->setComment($this->comment);

		$copyObj->setRows($this->rows);

		$copyObj->setIsPoll($this->is_poll);

		$copyObj->setIsActive($this->is_active);

		$copyObj->setSuccessMsg($this->success_msg);

		$copyObj->setEmail($this->email);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedBy($this->updated_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getArticleForms() as $relObj) {
				$copyObj->addArticleForm($relObj->copy($deepCopy));
			}

			foreach($this->getFields() as $relObj) {
				$copyObj->addField($relObj->copy($deepCopy));
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
			self::$peer = new FormPeer();
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

	
	public function initArticleForms()
	{
		if ($this->collArticleForms === null) {
			$this->collArticleForms = array();
		}
	}

	
	public function getArticleForms($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleFormPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleForms === null) {
			if ($this->isNew()) {
			   $this->collArticleForms = array();
			} else {

				$criteria->add(ArticleFormPeer::FORM_ID, $this->getId());

				ArticleFormPeer::addSelectColumns($criteria);
				$this->collArticleForms = ArticleFormPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleFormPeer::FORM_ID, $this->getId());

				ArticleFormPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleFormCriteria) || !$this->lastArticleFormCriteria->equals($criteria)) {
					$this->collArticleForms = ArticleFormPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleFormCriteria = $criteria;
		return $this->collArticleForms;
	}

	
	public function countArticleForms($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleFormPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleFormPeer::FORM_ID, $this->getId());

		return ArticleFormPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleForm(ArticleForm $l)
	{
		$this->collArticleForms[] = $l;
		$l->setForm($this);
	}


	
	public function getArticleFormsJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleFormPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleForms === null) {
			if ($this->isNew()) {
				$this->collArticleForms = array();
			} else {

				$criteria->add(ArticleFormPeer::FORM_ID, $this->getId());

				$this->collArticleForms = ArticleFormPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleFormPeer::FORM_ID, $this->getId());

			if (!isset($this->lastArticleFormCriteria) || !$this->lastArticleFormCriteria->equals($criteria)) {
				$this->collArticleForms = ArticleFormPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastArticleFormCriteria = $criteria;

		return $this->collArticleForms;
	}

	
	public function initFields()
	{
		if ($this->collFields === null) {
			$this->collFields = array();
		}
	}

	
	public function getFields($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFieldPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFields === null) {
			if ($this->isNew()) {
			   $this->collFields = array();
			} else {

				$criteria->add(FieldPeer::FORM_ID, $this->getId());

				FieldPeer::addSelectColumns($criteria);
				$this->collFields = FieldPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FieldPeer::FORM_ID, $this->getId());

				FieldPeer::addSelectColumns($criteria);
				if (!isset($this->lastFieldCriteria) || !$this->lastFieldCriteria->equals($criteria)) {
					$this->collFields = FieldPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFieldCriteria = $criteria;
		return $this->collFields;
	}

	
	public function countFields($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFieldPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FieldPeer::FORM_ID, $this->getId());

		return FieldPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addField(Field $l)
	{
		$this->collFields[] = $l;
		$l->setForm($this);
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseForm:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseForm::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 