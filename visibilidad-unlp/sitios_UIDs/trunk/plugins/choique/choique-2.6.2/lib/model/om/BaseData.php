<?php


abstract class BaseData extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $row;


	
	protected $data;


	
	protected $field_id;

	
	protected $aField;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getRow()
	{

		return $this->row;
	}

	
	public function getData()
	{

		return $this->data;
	}

	
	public function getFieldId()
	{

		return $this->field_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DataPeer::ID;
		}

	} 
	
	public function setRow($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->row !== $v) {
			$this->row = $v;
			$this->modifiedColumns[] = DataPeer::ROW;
		}

	} 
	
	public function setData($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->data !== $v) {
			$this->data = $v;
			$this->modifiedColumns[] = DataPeer::DATA;
		}

	} 
	
	public function setFieldId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->field_id !== $v) {
			$this->field_id = $v;
			$this->modifiedColumns[] = DataPeer::FIELD_ID;
		}

		if ($this->aField !== null && $this->aField->getId() !== $v) {
			$this->aField = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->row = $rs->getInt($startcol + 1);

			$this->data = $rs->getString($startcol + 2);

			$this->field_id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Data object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseData:delete:pre') as $callable)
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
			$con = Propel::getConnection(DataPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DataPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseData:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseData:save:pre') as $callable)
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
			$con = Propel::getConnection(DataPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseData:save:post') as $callable)
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


												
			if ($this->aField !== null) {
				if ($this->aField->isModified()) {
					$affectedRows += $this->aField->save($con);
				}
				$this->setField($this->aField);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DataPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DataPeer::doUpdate($this, $con);
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


												
			if ($this->aField !== null) {
				if (!$this->aField->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aField->getValidationFailures());
				}
			}


			if (($retval = DataPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DataPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getRow();
				break;
			case 2:
				return $this->getData();
				break;
			case 3:
				return $this->getFieldId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DataPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getRow(),
			$keys[2] => $this->getData(),
			$keys[3] => $this->getFieldId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DataPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setRow($value);
				break;
			case 2:
				$this->setData($value);
				break;
			case 3:
				$this->setFieldId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DataPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRow($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setData($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFieldId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DataPeer::DATABASE_NAME);

		if ($this->isColumnModified(DataPeer::ID)) $criteria->add(DataPeer::ID, $this->id);
		if ($this->isColumnModified(DataPeer::ROW)) $criteria->add(DataPeer::ROW, $this->row);
		if ($this->isColumnModified(DataPeer::DATA)) $criteria->add(DataPeer::DATA, $this->data);
		if ($this->isColumnModified(DataPeer::FIELD_ID)) $criteria->add(DataPeer::FIELD_ID, $this->field_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DataPeer::DATABASE_NAME);

		$criteria->add(DataPeer::ID, $this->id);

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

		$copyObj->setRow($this->row);

		$copyObj->setData($this->data);

		$copyObj->setFieldId($this->field_id);


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
			self::$peer = new DataPeer();
		}
		return self::$peer;
	}

	
	public function setField($v)
	{


		if ($v === null) {
			$this->setFieldId(NULL);
		} else {
			$this->setFieldId($v->getId());
		}


		$this->aField = $v;
	}


	
	public function getField($con = null)
	{
		if ($this->aField === null && ($this->field_id !== null)) {
						include_once 'lib/model/om/BaseFieldPeer.php';

			$this->aField = FieldPeer::retrieveByPK($this->field_id, $con);

			
		}
		return $this->aField;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseData:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseData::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 