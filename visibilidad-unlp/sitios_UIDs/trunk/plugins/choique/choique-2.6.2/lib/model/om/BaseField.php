<?php


abstract class BaseField extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $label;


	
	protected $type;


	
	protected $is_required;


	
	protected $default_value;


	
	protected $sort;


	
	protected $form_id;

	
	protected $aForm;

	
	protected $collDatas;

	
	protected $lastDataCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getLabel()
	{

		return $this->label;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getIsRequired()
	{

		return $this->is_required;
	}

	
	public function getDefaultValue()
	{

		return $this->default_value;
	}

	
	public function getSort()
	{

		return $this->sort;
	}

	
	public function getFormId()
	{

		return $this->form_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = FieldPeer::ID;
		}

	} 
	
	public function setLabel($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->label !== $v) {
			$this->label = $v;
			$this->modifiedColumns[] = FieldPeer::LABEL;
		}

	} 
	
	public function setType($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = FieldPeer::TYPE;
		}

	} 
	
	public function setIsRequired($v)
	{

		if ($this->is_required !== $v) {
			$this->is_required = $v;
			$this->modifiedColumns[] = FieldPeer::IS_REQUIRED;
		}

	} 
	
	public function setDefaultValue($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->default_value !== $v) {
			$this->default_value = $v;
			$this->modifiedColumns[] = FieldPeer::DEFAULT_VALUE;
		}

	} 
	
	public function setSort($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->sort !== $v) {
			$this->sort = $v;
			$this->modifiedColumns[] = FieldPeer::SORT;
		}

	} 
	
	public function setFormId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->form_id !== $v) {
			$this->form_id = $v;
			$this->modifiedColumns[] = FieldPeer::FORM_ID;
		}

		if ($this->aForm !== null && $this->aForm->getId() !== $v) {
			$this->aForm = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->label = $rs->getString($startcol + 1);

			$this->type = $rs->getInt($startcol + 2);

			$this->is_required = $rs->getBoolean($startcol + 3);

			$this->default_value = $rs->getString($startcol + 4);

			$this->sort = $rs->getInt($startcol + 5);

			$this->form_id = $rs->getInt($startcol + 6);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Field object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseField:delete:pre') as $callable)
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
			$con = Propel::getConnection(FieldPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			FieldPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseField:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseField:save:pre') as $callable)
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
			$con = Propel::getConnection(FieldPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseField:save:post') as $callable)
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


												
			if ($this->aForm !== null) {
				if ($this->aForm->isModified()) {
					$affectedRows += $this->aForm->save($con);
				}
				$this->setForm($this->aForm);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = FieldPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += FieldPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collDatas !== null) {
				foreach($this->collDatas as $referrerFK) {
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


												
			if ($this->aForm !== null) {
				if (!$this->aForm->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aForm->getValidationFailures());
				}
			}


			if (($retval = FieldPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDatas !== null) {
					foreach($this->collDatas as $referrerFK) {
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
		$pos = FieldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getLabel();
				break;
			case 2:
				return $this->getType();
				break;
			case 3:
				return $this->getIsRequired();
				break;
			case 4:
				return $this->getDefaultValue();
				break;
			case 5:
				return $this->getSort();
				break;
			case 6:
				return $this->getFormId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FieldPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getLabel(),
			$keys[2] => $this->getType(),
			$keys[3] => $this->getIsRequired(),
			$keys[4] => $this->getDefaultValue(),
			$keys[5] => $this->getSort(),
			$keys[6] => $this->getFormId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = FieldPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setLabel($value);
				break;
			case 2:
				$this->setType($value);
				break;
			case 3:
				$this->setIsRequired($value);
				break;
			case 4:
				$this->setDefaultValue($value);
				break;
			case 5:
				$this->setSort($value);
				break;
			case 6:
				$this->setFormId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = FieldPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLabel($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setType($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIsRequired($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDefaultValue($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSort($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFormId($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(FieldPeer::DATABASE_NAME);

		if ($this->isColumnModified(FieldPeer::ID)) $criteria->add(FieldPeer::ID, $this->id);
		if ($this->isColumnModified(FieldPeer::LABEL)) $criteria->add(FieldPeer::LABEL, $this->label);
		if ($this->isColumnModified(FieldPeer::TYPE)) $criteria->add(FieldPeer::TYPE, $this->type);
		if ($this->isColumnModified(FieldPeer::IS_REQUIRED)) $criteria->add(FieldPeer::IS_REQUIRED, $this->is_required);
		if ($this->isColumnModified(FieldPeer::DEFAULT_VALUE)) $criteria->add(FieldPeer::DEFAULT_VALUE, $this->default_value);
		if ($this->isColumnModified(FieldPeer::SORT)) $criteria->add(FieldPeer::SORT, $this->sort);
		if ($this->isColumnModified(FieldPeer::FORM_ID)) $criteria->add(FieldPeer::FORM_ID, $this->form_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(FieldPeer::DATABASE_NAME);

		$criteria->add(FieldPeer::ID, $this->id);

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

		$copyObj->setLabel($this->label);

		$copyObj->setType($this->type);

		$copyObj->setIsRequired($this->is_required);

		$copyObj->setDefaultValue($this->default_value);

		$copyObj->setSort($this->sort);

		$copyObj->setFormId($this->form_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getDatas() as $relObj) {
				$copyObj->addData($relObj->copy($deepCopy));
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
			self::$peer = new FieldPeer();
		}
		return self::$peer;
	}

	
	public function setForm($v)
	{


		if ($v === null) {
			$this->setFormId(NULL);
		} else {
			$this->setFormId($v->getId());
		}


		$this->aForm = $v;
	}


	
	public function getForm($con = null)
	{
		if ($this->aForm === null && ($this->form_id !== null)) {
						include_once 'lib/model/om/BaseFormPeer.php';

			$this->aForm = FormPeer::retrieveByPK($this->form_id, $con);

			
		}
		return $this->aForm;
	}

	
	public function initDatas()
	{
		if ($this->collDatas === null) {
			$this->collDatas = array();
		}
	}

	
	public function getDatas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDataPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDatas === null) {
			if ($this->isNew()) {
			   $this->collDatas = array();
			} else {

				$criteria->add(DataPeer::FIELD_ID, $this->getId());

				DataPeer::addSelectColumns($criteria);
				$this->collDatas = DataPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DataPeer::FIELD_ID, $this->getId());

				DataPeer::addSelectColumns($criteria);
				if (!isset($this->lastDataCriteria) || !$this->lastDataCriteria->equals($criteria)) {
					$this->collDatas = DataPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDataCriteria = $criteria;
		return $this->collDatas;
	}

	
	public function countDatas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDataPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DataPeer::FIELD_ID, $this->getId());

		return DataPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addData(Data $l)
	{
		$this->collDatas[] = $l;
		$l->setField($this);
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseField:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseField::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 