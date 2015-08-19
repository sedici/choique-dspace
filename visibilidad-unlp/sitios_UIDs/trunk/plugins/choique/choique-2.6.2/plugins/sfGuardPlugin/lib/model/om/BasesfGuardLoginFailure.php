<?php


abstract class BasesfGuardLoginFailure extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $username;


	
	protected $ip_address;


	
	protected $cookie_id;


	
	protected $at;


	
	protected $id;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getUsername()
	{

		return $this->username;
	}

	
	public function getIpAddress()
	{

		return $this->ip_address;
	}

	
	public function getCookieId()
	{

		return $this->cookie_id;
	}

	
	public function getAt($format = 'Y-m-d H:i:s')
	{

		if ($this->at === null || $this->at === '') {
			return null;
		} elseif (!is_int($this->at)) {
						$ts = strtotime($this->at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [at] as date/time value: " . var_export($this->at, true));
			}
		} else {
			$ts = $this->at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setUsername($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = sfGuardLoginFailurePeer::USERNAME;
		}

	} 
	
	public function setIpAddress($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ip_address !== $v) {
			$this->ip_address = $v;
			$this->modifiedColumns[] = sfGuardLoginFailurePeer::IP_ADDRESS;
		}

	} 
	
	public function setCookieId($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->cookie_id !== $v) {
			$this->cookie_id = $v;
			$this->modifiedColumns[] = sfGuardLoginFailurePeer::COOKIE_ID;
		}

	} 
	
	public function setAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->at !== $ts) {
			$this->at = $ts;
			$this->modifiedColumns[] = sfGuardLoginFailurePeer::AT;
		}

	} 
	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = sfGuardLoginFailurePeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->username = $rs->getString($startcol + 0);

			$this->ip_address = $rs->getString($startcol + 1);

			$this->cookie_id = $rs->getString($startcol + 2);

			$this->at = $rs->getTimestamp($startcol + 3, null);

			$this->id = $rs->getInt($startcol + 4);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 5; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfGuardLoginFailure object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardLoginFailure:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfGuardLoginFailurePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfGuardLoginFailurePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfGuardLoginFailure:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardLoginFailure:save:pre') as $callable)
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
			$con = Propel::getConnection(sfGuardLoginFailurePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfGuardLoginFailure:save:post') as $callable)
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
					$pk = sfGuardLoginFailurePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfGuardLoginFailurePeer::doUpdate($this, $con);
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


			if (($retval = sfGuardLoginFailurePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfGuardLoginFailurePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getUsername();
				break;
			case 1:
				return $this->getIpAddress();
				break;
			case 2:
				return $this->getCookieId();
				break;
			case 3:
				return $this->getAt();
				break;
			case 4:
				return $this->getId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardLoginFailurePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUsername(),
			$keys[1] => $this->getIpAddress(),
			$keys[2] => $this->getCookieId(),
			$keys[3] => $this->getAt(),
			$keys[4] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfGuardLoginFailurePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setUsername($value);
				break;
			case 1:
				$this->setIpAddress($value);
				break;
			case 2:
				$this->setCookieId($value);
				break;
			case 3:
				$this->setAt($value);
				break;
			case 4:
				$this->setId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardLoginFailurePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUsername($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIpAddress($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setCookieId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setId($arr[$keys[4]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfGuardLoginFailurePeer::DATABASE_NAME);

		if ($this->isColumnModified(sfGuardLoginFailurePeer::USERNAME)) $criteria->add(sfGuardLoginFailurePeer::USERNAME, $this->username);
		if ($this->isColumnModified(sfGuardLoginFailurePeer::IP_ADDRESS)) $criteria->add(sfGuardLoginFailurePeer::IP_ADDRESS, $this->ip_address);
		if ($this->isColumnModified(sfGuardLoginFailurePeer::COOKIE_ID)) $criteria->add(sfGuardLoginFailurePeer::COOKIE_ID, $this->cookie_id);
		if ($this->isColumnModified(sfGuardLoginFailurePeer::AT)) $criteria->add(sfGuardLoginFailurePeer::AT, $this->at);
		if ($this->isColumnModified(sfGuardLoginFailurePeer::ID)) $criteria->add(sfGuardLoginFailurePeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfGuardLoginFailurePeer::DATABASE_NAME);

		$criteria->add(sfGuardLoginFailurePeer::ID, $this->id);

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

		$copyObj->setUsername($this->username);

		$copyObj->setIpAddress($this->ip_address);

		$copyObj->setCookieId($this->cookie_id);

		$copyObj->setAt($this->at);


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
			self::$peer = new sfGuardLoginFailurePeer();
		}
		return self::$peer;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfGuardLoginFailure:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfGuardLoginFailure::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 