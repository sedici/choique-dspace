<?php


abstract class BaseNewsSpace extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $type;


	
	protected $comment;


	
	protected $row_number;


	
	protected $column_number;


	
	protected $template_id;


	
	protected $article_id;


	
	protected $width;

	
	protected $aTemplate;

	
	protected $aArticle;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getComment()
	{

		return $this->comment;
	}

	
	public function getRowNumber()
	{

		return $this->row_number;
	}

	
	public function getColumnNumber()
	{

		return $this->column_number;
	}

	
	public function getTemplateId()
	{

		return $this->template_id;
	}

	
	public function getArticleId()
	{

		return $this->article_id;
	}

	
	public function getWidth()
	{

		return $this->width;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NewsSpacePeer::ID;
		}

	} 
	
	public function setType($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = NewsSpacePeer::TYPE;
		}

	} 
	
	public function setComment($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = NewsSpacePeer::COMMENT;
		}

	} 
	
	public function setRowNumber($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->row_number !== $v) {
			$this->row_number = $v;
			$this->modifiedColumns[] = NewsSpacePeer::ROW_NUMBER;
		}

	} 
	
	public function setColumnNumber($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->column_number !== $v) {
			$this->column_number = $v;
			$this->modifiedColumns[] = NewsSpacePeer::COLUMN_NUMBER;
		}

	} 
	
	public function setTemplateId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->template_id !== $v) {
			$this->template_id = $v;
			$this->modifiedColumns[] = NewsSpacePeer::TEMPLATE_ID;
		}

		if ($this->aTemplate !== null && $this->aTemplate->getId() !== $v) {
			$this->aTemplate = null;
		}

	} 
	
	public function setArticleId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->article_id !== $v) {
			$this->article_id = $v;
			$this->modifiedColumns[] = NewsSpacePeer::ARTICLE_ID;
		}

		if ($this->aArticle !== null && $this->aArticle->getId() !== $v) {
			$this->aArticle = null;
		}

	} 
	
	public function setWidth($v)
	{

		if ($this->width !== $v) {
			$this->width = $v;
			$this->modifiedColumns[] = NewsSpacePeer::WIDTH;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->type = $rs->getInt($startcol + 1);

			$this->comment = $rs->getString($startcol + 2);

			$this->row_number = $rs->getInt($startcol + 3);

			$this->column_number = $rs->getInt($startcol + 4);

			$this->template_id = $rs->getInt($startcol + 5);

			$this->article_id = $rs->getInt($startcol + 6);

			$this->width = $rs->getFloat($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating NewsSpace object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseNewsSpace:delete:pre') as $callable)
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
			$con = Propel::getConnection(NewsSpacePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			NewsSpacePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseNewsSpace:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseNewsSpace:save:pre') as $callable)
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
			$con = Propel::getConnection(NewsSpacePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseNewsSpace:save:post') as $callable)
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


												
			if ($this->aTemplate !== null) {
				if ($this->aTemplate->isModified()) {
					$affectedRows += $this->aTemplate->save($con);
				}
				$this->setTemplate($this->aTemplate);
			}

			if ($this->aArticle !== null) {
				if ($this->aArticle->isModified()) {
					$affectedRows += $this->aArticle->save($con);
				}
				$this->setArticle($this->aArticle);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = NewsSpacePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NewsSpacePeer::doUpdate($this, $con);
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


												
			if ($this->aTemplate !== null) {
				if (!$this->aTemplate->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTemplate->getValidationFailures());
				}
			}

			if ($this->aArticle !== null) {
				if (!$this->aArticle->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aArticle->getValidationFailures());
				}
			}


			if (($retval = NewsSpacePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NewsSpacePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getType();
				break;
			case 2:
				return $this->getComment();
				break;
			case 3:
				return $this->getRowNumber();
				break;
			case 4:
				return $this->getColumnNumber();
				break;
			case 5:
				return $this->getTemplateId();
				break;
			case 6:
				return $this->getArticleId();
				break;
			case 7:
				return $this->getWidth();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NewsSpacePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getType(),
			$keys[2] => $this->getComment(),
			$keys[3] => $this->getRowNumber(),
			$keys[4] => $this->getColumnNumber(),
			$keys[5] => $this->getTemplateId(),
			$keys[6] => $this->getArticleId(),
			$keys[7] => $this->getWidth(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NewsSpacePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setType($value);
				break;
			case 2:
				$this->setComment($value);
				break;
			case 3:
				$this->setRowNumber($value);
				break;
			case 4:
				$this->setColumnNumber($value);
				break;
			case 5:
				$this->setTemplateId($value);
				break;
			case 6:
				$this->setArticleId($value);
				break;
			case 7:
				$this->setWidth($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NewsSpacePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setType($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setComment($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRowNumber($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setColumnNumber($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setTemplateId($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setArticleId($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setWidth($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NewsSpacePeer::DATABASE_NAME);

		if ($this->isColumnModified(NewsSpacePeer::ID)) $criteria->add(NewsSpacePeer::ID, $this->id);
		if ($this->isColumnModified(NewsSpacePeer::TYPE)) $criteria->add(NewsSpacePeer::TYPE, $this->type);
		if ($this->isColumnModified(NewsSpacePeer::COMMENT)) $criteria->add(NewsSpacePeer::COMMENT, $this->comment);
		if ($this->isColumnModified(NewsSpacePeer::ROW_NUMBER)) $criteria->add(NewsSpacePeer::ROW_NUMBER, $this->row_number);
		if ($this->isColumnModified(NewsSpacePeer::COLUMN_NUMBER)) $criteria->add(NewsSpacePeer::COLUMN_NUMBER, $this->column_number);
		if ($this->isColumnModified(NewsSpacePeer::TEMPLATE_ID)) $criteria->add(NewsSpacePeer::TEMPLATE_ID, $this->template_id);
		if ($this->isColumnModified(NewsSpacePeer::ARTICLE_ID)) $criteria->add(NewsSpacePeer::ARTICLE_ID, $this->article_id);
		if ($this->isColumnModified(NewsSpacePeer::WIDTH)) $criteria->add(NewsSpacePeer::WIDTH, $this->width);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NewsSpacePeer::DATABASE_NAME);

		$criteria->add(NewsSpacePeer::ID, $this->id);

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

		$copyObj->setType($this->type);

		$copyObj->setComment($this->comment);

		$copyObj->setRowNumber($this->row_number);

		$copyObj->setColumnNumber($this->column_number);

		$copyObj->setTemplateId($this->template_id);

		$copyObj->setArticleId($this->article_id);

		$copyObj->setWidth($this->width);


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
			self::$peer = new NewsSpacePeer();
		}
		return self::$peer;
	}

	
	public function setTemplate($v)
	{


		if ($v === null) {
			$this->setTemplateId(NULL);
		} else {
			$this->setTemplateId($v->getId());
		}


		$this->aTemplate = $v;
	}


	
	public function getTemplate($con = null)
	{
		if ($this->aTemplate === null && ($this->template_id !== null)) {
						include_once 'lib/model/om/BaseTemplatePeer.php';

			$this->aTemplate = TemplatePeer::retrieveByPK($this->template_id, $con);

			
		}
		return $this->aTemplate;
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


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseNewsSpace:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseNewsSpace::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 