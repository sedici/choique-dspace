<?php


abstract class BaseMailLog extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $mail_from;


	
	protected $mail_to;


	
	protected $subject;


	
	protected $body;


	
	protected $sender_name;


	
	protected $section_name;


	
	protected $article_name;


	
	protected $created_at;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getMailFrom()
	{

		return $this->mail_from;
	}

	
	public function getMailTo()
	{

		return $this->mail_to;
	}

	
	public function getSubject()
	{

		return $this->subject;
	}

	
	public function getBody()
	{

		return $this->body;
	}

	
	public function getSenderName()
	{

		return $this->sender_name;
	}

	
	public function getSectionName()
	{

		return $this->section_name;
	}

	
	public function getArticleName()
	{

		return $this->article_name;
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

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = MailLogPeer::ID;
		}

	} 
	
	public function setMailFrom($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mail_from !== $v) {
			$this->mail_from = $v;
			$this->modifiedColumns[] = MailLogPeer::MAIL_FROM;
		}

	} 
	
	public function setMailTo($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mail_to !== $v) {
			$this->mail_to = $v;
			$this->modifiedColumns[] = MailLogPeer::MAIL_TO;
		}

	} 
	
	public function setSubject($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->subject !== $v) {
			$this->subject = $v;
			$this->modifiedColumns[] = MailLogPeer::SUBJECT;
		}

	} 
	
	public function setBody($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->body !== $v) {
			$this->body = $v;
			$this->modifiedColumns[] = MailLogPeer::BODY;
		}

	} 
	
	public function setSenderName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->sender_name !== $v) {
			$this->sender_name = $v;
			$this->modifiedColumns[] = MailLogPeer::SENDER_NAME;
		}

	} 
	
	public function setSectionName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->section_name !== $v) {
			$this->section_name = $v;
			$this->modifiedColumns[] = MailLogPeer::SECTION_NAME;
		}

	} 
	
	public function setArticleName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->article_name !== $v) {
			$this->article_name = $v;
			$this->modifiedColumns[] = MailLogPeer::ARTICLE_NAME;
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
			$this->modifiedColumns[] = MailLogPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->mail_from = $rs->getString($startcol + 1);

			$this->mail_to = $rs->getString($startcol + 2);

			$this->subject = $rs->getString($startcol + 3);

			$this->body = $rs->getString($startcol + 4);

			$this->sender_name = $rs->getString($startcol + 5);

			$this->section_name = $rs->getString($startcol + 6);

			$this->article_name = $rs->getString($startcol + 7);

			$this->created_at = $rs->getTimestamp($startcol + 8, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MailLog object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseMailLog:delete:pre') as $callable)
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
			$con = Propel::getConnection(MailLogPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MailLogPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseMailLog:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseMailLog:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(MailLogPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MailLogPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseMailLog:save:post') as $callable)
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
					$pk = MailLogPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MailLogPeer::doUpdate($this, $con);
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


			if (($retval = MailLogPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MailLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getMailFrom();
				break;
			case 2:
				return $this->getMailTo();
				break;
			case 3:
				return $this->getSubject();
				break;
			case 4:
				return $this->getBody();
				break;
			case 5:
				return $this->getSenderName();
				break;
			case 6:
				return $this->getSectionName();
				break;
			case 7:
				return $this->getArticleName();
				break;
			case 8:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MailLogPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMailFrom(),
			$keys[2] => $this->getMailTo(),
			$keys[3] => $this->getSubject(),
			$keys[4] => $this->getBody(),
			$keys[5] => $this->getSenderName(),
			$keys[6] => $this->getSectionName(),
			$keys[7] => $this->getArticleName(),
			$keys[8] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MailLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMailFrom($value);
				break;
			case 2:
				$this->setMailTo($value);
				break;
			case 3:
				$this->setSubject($value);
				break;
			case 4:
				$this->setBody($value);
				break;
			case 5:
				$this->setSenderName($value);
				break;
			case 6:
				$this->setSectionName($value);
				break;
			case 7:
				$this->setArticleName($value);
				break;
			case 8:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MailLogPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMailFrom($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setMailTo($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSubject($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setBody($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSenderName($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSectionName($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setArticleName($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MailLogPeer::DATABASE_NAME);

		if ($this->isColumnModified(MailLogPeer::ID)) $criteria->add(MailLogPeer::ID, $this->id);
		if ($this->isColumnModified(MailLogPeer::MAIL_FROM)) $criteria->add(MailLogPeer::MAIL_FROM, $this->mail_from);
		if ($this->isColumnModified(MailLogPeer::MAIL_TO)) $criteria->add(MailLogPeer::MAIL_TO, $this->mail_to);
		if ($this->isColumnModified(MailLogPeer::SUBJECT)) $criteria->add(MailLogPeer::SUBJECT, $this->subject);
		if ($this->isColumnModified(MailLogPeer::BODY)) $criteria->add(MailLogPeer::BODY, $this->body);
		if ($this->isColumnModified(MailLogPeer::SENDER_NAME)) $criteria->add(MailLogPeer::SENDER_NAME, $this->sender_name);
		if ($this->isColumnModified(MailLogPeer::SECTION_NAME)) $criteria->add(MailLogPeer::SECTION_NAME, $this->section_name);
		if ($this->isColumnModified(MailLogPeer::ARTICLE_NAME)) $criteria->add(MailLogPeer::ARTICLE_NAME, $this->article_name);
		if ($this->isColumnModified(MailLogPeer::CREATED_AT)) $criteria->add(MailLogPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MailLogPeer::DATABASE_NAME);

		$criteria->add(MailLogPeer::ID, $this->id);

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

		$copyObj->setMailFrom($this->mail_from);

		$copyObj->setMailTo($this->mail_to);

		$copyObj->setSubject($this->subject);

		$copyObj->setBody($this->body);

		$copyObj->setSenderName($this->sender_name);

		$copyObj->setSectionName($this->section_name);

		$copyObj->setArticleName($this->article_name);

		$copyObj->setCreatedAt($this->created_at);


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
			self::$peer = new MailLogPeer();
		}
		return self::$peer;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseMailLog:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseMailLog::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 