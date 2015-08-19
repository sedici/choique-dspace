<?php


abstract class BaseMultimediaGallery extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $multimedia_id;


	
	protected $gallery_id;


	
	protected $priority = 0;


	
	protected $id;

	
	protected $aMultimedia;

	
	protected $aGallery;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getMultimediaId()
	{

		return $this->multimedia_id;
	}

	
	public function getGalleryId()
	{

		return $this->gallery_id;
	}

	
	public function getPriority()
	{

		return $this->priority;
	}

	
	public function getId()
	{

		return $this->id;
	}

	
	public function setMultimediaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->multimedia_id !== $v) {
			$this->multimedia_id = $v;
			$this->modifiedColumns[] = MultimediaGalleryPeer::MULTIMEDIA_ID;
		}

		if ($this->aMultimedia !== null && $this->aMultimedia->getId() !== $v) {
			$this->aMultimedia = null;
		}

	} 
	
	public function setGalleryId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->gallery_id !== $v) {
			$this->gallery_id = $v;
			$this->modifiedColumns[] = MultimediaGalleryPeer::GALLERY_ID;
		}

		if ($this->aGallery !== null && $this->aGallery->getId() !== $v) {
			$this->aGallery = null;
		}

	} 
	
	public function setPriority($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->priority !== $v || $v === 0) {
			$this->priority = $v;
			$this->modifiedColumns[] = MultimediaGalleryPeer::PRIORITY;
		}

	} 
	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = MultimediaGalleryPeer::ID;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->multimedia_id = $rs->getInt($startcol + 0);

			$this->gallery_id = $rs->getInt($startcol + 1);

			$this->priority = $rs->getInt($startcol + 2);

			$this->id = $rs->getInt($startcol + 3);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating MultimediaGallery object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseMultimediaGallery:delete:pre') as $callable)
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
			$con = Propel::getConnection(MultimediaGalleryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MultimediaGalleryPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseMultimediaGallery:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseMultimediaGallery:save:pre') as $callable)
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
			$con = Propel::getConnection(MultimediaGalleryPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseMultimediaGallery:save:post') as $callable)
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


												
			if ($this->aMultimedia !== null) {
				if ($this->aMultimedia->isModified()) {
					$affectedRows += $this->aMultimedia->save($con);
				}
				$this->setMultimedia($this->aMultimedia);
			}

			if ($this->aGallery !== null) {
				if ($this->aGallery->isModified()) {
					$affectedRows += $this->aGallery->save($con);
				}
				$this->setGallery($this->aGallery);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MultimediaGalleryPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MultimediaGalleryPeer::doUpdate($this, $con);
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


												
			if ($this->aMultimedia !== null) {
				if (!$this->aMultimedia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aMultimedia->getValidationFailures());
				}
			}

			if ($this->aGallery !== null) {
				if (!$this->aGallery->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aGallery->getValidationFailures());
				}
			}


			if (($retval = MultimediaGalleryPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MultimediaGalleryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getMultimediaId();
				break;
			case 1:
				return $this->getGalleryId();
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
		$keys = MultimediaGalleryPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getMultimediaId(),
			$keys[1] => $this->getGalleryId(),
			$keys[2] => $this->getPriority(),
			$keys[3] => $this->getId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MultimediaGalleryPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setMultimediaId($value);
				break;
			case 1:
				$this->setGalleryId($value);
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
		$keys = MultimediaGalleryPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setMultimediaId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setGalleryId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPriority($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setId($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MultimediaGalleryPeer::DATABASE_NAME);

		if ($this->isColumnModified(MultimediaGalleryPeer::MULTIMEDIA_ID)) $criteria->add(MultimediaGalleryPeer::MULTIMEDIA_ID, $this->multimedia_id);
		if ($this->isColumnModified(MultimediaGalleryPeer::GALLERY_ID)) $criteria->add(MultimediaGalleryPeer::GALLERY_ID, $this->gallery_id);
		if ($this->isColumnModified(MultimediaGalleryPeer::PRIORITY)) $criteria->add(MultimediaGalleryPeer::PRIORITY, $this->priority);
		if ($this->isColumnModified(MultimediaGalleryPeer::ID)) $criteria->add(MultimediaGalleryPeer::ID, $this->id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MultimediaGalleryPeer::DATABASE_NAME);

		$criteria->add(MultimediaGalleryPeer::ID, $this->id);

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

		$copyObj->setMultimediaId($this->multimedia_id);

		$copyObj->setGalleryId($this->gallery_id);

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
			self::$peer = new MultimediaGalleryPeer();
		}
		return self::$peer;
	}

	
	public function setMultimedia($v)
	{


		if ($v === null) {
			$this->setMultimediaId(NULL);
		} else {
			$this->setMultimediaId($v->getId());
		}


		$this->aMultimedia = $v;
	}


	
	public function getMultimedia($con = null)
	{
		if ($this->aMultimedia === null && ($this->multimedia_id !== null)) {
						include_once 'lib/model/om/BaseMultimediaPeer.php';

			$this->aMultimedia = MultimediaPeer::retrieveByPK($this->multimedia_id, $con);

			
		}
		return $this->aMultimedia;
	}

	
	public function setGallery($v)
	{


		if ($v === null) {
			$this->setGalleryId(NULL);
		} else {
			$this->setGalleryId($v->getId());
		}


		$this->aGallery = $v;
	}


	
	public function getGallery($con = null)
	{
		if ($this->aGallery === null && ($this->gallery_id !== null)) {
						include_once 'lib/model/om/BaseGalleryPeer.php';

			$this->aGallery = GalleryPeer::retrieveByPK($this->gallery_id, $con);

			
		}
		return $this->aGallery;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseMultimediaGallery:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseMultimediaGallery::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 