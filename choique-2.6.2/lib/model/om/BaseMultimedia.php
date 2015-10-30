<?php


abstract class BaseMultimedia extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $title;


	
	protected $description;


	
	protected $comment;


	
	protected $is_deleted;


	
	protected $small_uri;


	
	protected $medium_uri;


	
	protected $large_uri = 'null';


	
	protected $author;


	
	protected $uploaded_by;


	
	protected $copyright;


	
	protected $type;


	
	protected $language;


	
	protected $duration;


	
	protected $location;


	
	protected $subject;


	
	protected $topics;


	
	protected $height;


	
	protected $width;


	
	protected $mime_type;


	
	protected $created_at;


	
	protected $flv_params;


	
	protected $is_external = 0;


	
	protected $player_id;


	
	protected $external_uri;


	
	protected $times_seen;


	
	protected $rating;


	
	protected $times_rated;


	
	protected $times_downloaded;


	
	protected $longdesc_uri;


	
	protected $updated_at;


	
	protected $updated_by;

	
	protected $asfGuardUserRelatedByUploadedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $collArticles;

	
	protected $lastArticleCriteria = null;

	
	protected $collArticleMultimedias;

	
	protected $lastArticleMultimediaCriteria = null;

	
	protected $collEvents;

	
	protected $lastEventCriteria = null;

	
	protected $collMultimediaGallerys;

	
	protected $lastMultimediaGalleryCriteria = null;

	
	protected $collMultimediaTags;

	
	protected $lastMultimediaTagCriteria = null;

	
	protected $collSections;

	
	protected $lastSectionCriteria = null;

	
	protected $collShortcuts;

	
	protected $lastShortcutCriteria = null;

	
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

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getComment()
	{

		return $this->comment;
	}

	
	public function getIsDeleted()
	{

		return $this->is_deleted;
	}

	
	public function getSmallUri()
	{

		return $this->small_uri;
	}

	
	public function getMediumUri()
	{

		return $this->medium_uri;
	}

	
	public function getLargeUri()
	{

		return $this->large_uri;
	}

	
	public function getAuthor()
	{

		return $this->author;
	}

	
	public function getUploadedBy()
	{

		return $this->uploaded_by;
	}

	
	public function getCopyright()
	{

		return $this->copyright;
	}

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getLanguage()
	{

		return $this->language;
	}

	
	public function getDuration()
	{

		return $this->duration;
	}

	
	public function getLocation()
	{

		return $this->location;
	}

	
	public function getSubject()
	{

		return $this->subject;
	}

	
	public function getTopics()
	{

		return $this->topics;
	}

	
	public function getHeight()
	{

		return $this->height;
	}

	
	public function getWidth()
	{

		return $this->width;
	}

	
	public function getMimeType()
	{

		return $this->mime_type;
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

	
	public function getFlvParams()
	{

		return $this->flv_params;
	}

	
	public function getIsExternal()
	{

		return $this->is_external;
	}

	
	public function getPlayerId()
	{

		return $this->player_id;
	}

	
	public function getExternalUri()
	{

		return $this->external_uri;
	}

	
	public function getTimesSeen()
	{

		return $this->times_seen;
	}

	
	public function getRating()
	{

		return $this->rating;
	}

	
	public function getTimesRated()
	{

		return $this->times_rated;
	}

	
	public function getTimesDownloaded()
	{

		return $this->times_downloaded;
	}

	
	public function getLongdescUri()
	{

		return $this->longdesc_uri;
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
			$this->modifiedColumns[] = MultimediaPeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = MultimediaPeer::NAME;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = MultimediaPeer::TITLE;
		}

	} 
	
	public function setDescription($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = MultimediaPeer::DESCRIPTION;
		}

	} 
	
	public function setComment($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = MultimediaPeer::COMMENT;
		}

	} 
	
	public function setIsDeleted($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_deleted !== $v) {
			$this->is_deleted = $v;
			$this->modifiedColumns[] = MultimediaPeer::IS_DELETED;
		}

	} 
	
	public function setSmallUri($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->small_uri !== $v) {
			$this->small_uri = $v;
			$this->modifiedColumns[] = MultimediaPeer::SMALL_URI;
		}

	} 
	
	public function setMediumUri($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->medium_uri !== $v) {
			$this->medium_uri = $v;
			$this->modifiedColumns[] = MultimediaPeer::MEDIUM_URI;
		}

	} 
	
	public function setLargeUri($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->large_uri !== $v || $v === 'null') {
			$this->large_uri = $v;
			$this->modifiedColumns[] = MultimediaPeer::LARGE_URI;
		}

	} 
	
	public function setAuthor($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->author !== $v) {
			$this->author = $v;
			$this->modifiedColumns[] = MultimediaPeer::AUTHOR;
		}

	} 
	
	public function setUploadedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->uploaded_by !== $v) {
			$this->uploaded_by = $v;
			$this->modifiedColumns[] = MultimediaPeer::UPLOADED_BY;
		}

		if ($this->asfGuardUserRelatedByUploadedBy !== null && $this->asfGuardUserRelatedByUploadedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByUploadedBy = null;
		}

	} 
	
	public function setCopyright($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->copyright !== $v) {
			$this->copyright = $v;
			$this->modifiedColumns[] = MultimediaPeer::COPYRIGHT;
		}

	} 
	
	public function setType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = MultimediaPeer::TYPE;
		}

	} 
	
	public function setLanguage($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->language !== $v) {
			$this->language = $v;
			$this->modifiedColumns[] = MultimediaPeer::LANGUAGE;
		}

	} 
	
	public function setDuration($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->duration !== $v) {
			$this->duration = $v;
			$this->modifiedColumns[] = MultimediaPeer::DURATION;
		}

	} 
	
	public function setLocation($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->location !== $v) {
			$this->location = $v;
			$this->modifiedColumns[] = MultimediaPeer::LOCATION;
		}

	} 
	
	public function setSubject($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->subject !== $v) {
			$this->subject = $v;
			$this->modifiedColumns[] = MultimediaPeer::SUBJECT;
		}

	} 
	
	public function setTopics($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->topics !== $v) {
			$this->topics = $v;
			$this->modifiedColumns[] = MultimediaPeer::TOPICS;
		}

	} 
	
	public function setHeight($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->height !== $v) {
			$this->height = $v;
			$this->modifiedColumns[] = MultimediaPeer::HEIGHT;
		}

	} 
	
	public function setWidth($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->width !== $v) {
			$this->width = $v;
			$this->modifiedColumns[] = MultimediaPeer::WIDTH;
		}

	} 
	
	public function setMimeType($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->mime_type !== $v) {
			$this->mime_type = $v;
			$this->modifiedColumns[] = MultimediaPeer::MIME_TYPE;
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
			$this->modifiedColumns[] = MultimediaPeer::CREATED_AT;
		}

	} 
	
	public function setFlvParams($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->flv_params !== $v) {
			$this->flv_params = $v;
			$this->modifiedColumns[] = MultimediaPeer::FLV_PARAMS;
		}

	} 
	
	public function setIsExternal($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_external !== $v || $v === 0) {
			$this->is_external = $v;
			$this->modifiedColumns[] = MultimediaPeer::IS_EXTERNAL;
		}

	} 
	
	public function setPlayerId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->player_id !== $v) {
			$this->player_id = $v;
			$this->modifiedColumns[] = MultimediaPeer::PLAYER_ID;
		}

	} 
	
	public function setExternalUri($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->external_uri !== $v) {
			$this->external_uri = $v;
			$this->modifiedColumns[] = MultimediaPeer::EXTERNAL_URI;
		}

	} 
	
	public function setTimesSeen($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->times_seen !== $v) {
			$this->times_seen = $v;
			$this->modifiedColumns[] = MultimediaPeer::TIMES_SEEN;
		}

	} 
	
	public function setRating($v)
	{

		if ($this->rating !== $v) {
			$this->rating = $v;
			$this->modifiedColumns[] = MultimediaPeer::RATING;
		}

	} 
	
	public function setTimesRated($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->times_rated !== $v) {
			$this->times_rated = $v;
			$this->modifiedColumns[] = MultimediaPeer::TIMES_RATED;
		}

	} 
	
	public function setTimesDownloaded($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->times_downloaded !== $v) {
			$this->times_downloaded = $v;
			$this->modifiedColumns[] = MultimediaPeer::TIMES_DOWNLOADED;
		}

	} 
	
	public function setLongdescUri($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->longdesc_uri !== $v) {
			$this->longdesc_uri = $v;
			$this->modifiedColumns[] = MultimediaPeer::LONGDESC_URI;
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
			$this->modifiedColumns[] = MultimediaPeer::UPDATED_AT;
		}

	} 
	
	public function setUpdatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->updated_by !== $v) {
			$this->updated_by = $v;
			$this->modifiedColumns[] = MultimediaPeer::UPDATED_BY;
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

			$this->title = $rs->getString($startcol + 2);

			$this->description = $rs->getString($startcol + 3);

			$this->comment = $rs->getString($startcol + 4);

			$this->is_deleted = $rs->getInt($startcol + 5);

			$this->small_uri = $rs->getString($startcol + 6);

			$this->medium_uri = $rs->getString($startcol + 7);

			$this->large_uri = $rs->getString($startcol + 8);

			$this->author = $rs->getString($startcol + 9);

			$this->uploaded_by = $rs->getInt($startcol + 10);

			$this->copyright = $rs->getString($startcol + 11);

			$this->type = $rs->getString($startcol + 12);

			$this->language = $rs->getString($startcol + 13);

			$this->duration = $rs->getInt($startcol + 14);

			$this->location = $rs->getString($startcol + 15);

			$this->subject = $rs->getString($startcol + 16);

			$this->topics = $rs->getString($startcol + 17);

			$this->height = $rs->getString($startcol + 18);

			$this->width = $rs->getString($startcol + 19);

			$this->mime_type = $rs->getString($startcol + 20);

			$this->created_at = $rs->getTimestamp($startcol + 21, null);

			$this->flv_params = $rs->getString($startcol + 22);

			$this->is_external = $rs->getInt($startcol + 23);

			$this->player_id = $rs->getInt($startcol + 24);

			$this->external_uri = $rs->getString($startcol + 25);

			$this->times_seen = $rs->getInt($startcol + 26);

			$this->rating = $rs->getFloat($startcol + 27);

			$this->times_rated = $rs->getInt($startcol + 28);

			$this->times_downloaded = $rs->getInt($startcol + 29);

			$this->longdesc_uri = $rs->getString($startcol + 30);

			$this->updated_at = $rs->getTimestamp($startcol + 31, null);

			$this->updated_by = $rs->getInt($startcol + 32);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 33; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Multimedia object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseMultimedia:delete:pre') as $callable)
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
			$con = Propel::getConnection(MultimediaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			MultimediaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseMultimedia:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseMultimedia:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(MultimediaPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(MultimediaPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(MultimediaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseMultimedia:save:post') as $callable)
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


												
			if ($this->asfGuardUserRelatedByUploadedBy !== null) {
				if ($this->asfGuardUserRelatedByUploadedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByUploadedBy->save($con);
				}
				$this->setsfGuardUserRelatedByUploadedBy($this->asfGuardUserRelatedByUploadedBy);
			}

			if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
				if ($this->asfGuardUserRelatedByUpdatedBy->isModified()) {
					$affectedRows += $this->asfGuardUserRelatedByUpdatedBy->save($con);
				}
				$this->setsfGuardUserRelatedByUpdatedBy($this->asfGuardUserRelatedByUpdatedBy);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = MultimediaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += MultimediaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collArticles !== null) {
				foreach($this->collArticles as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticleMultimedias !== null) {
				foreach($this->collArticleMultimedias as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEvents !== null) {
				foreach($this->collEvents as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMultimediaGallerys !== null) {
				foreach($this->collMultimediaGallerys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMultimediaTags !== null) {
				foreach($this->collMultimediaTags as $referrerFK) {
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

			if ($this->collShortcuts !== null) {
				foreach($this->collShortcuts as $referrerFK) {
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


												
			if ($this->asfGuardUserRelatedByUploadedBy !== null) {
				if (!$this->asfGuardUserRelatedByUploadedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByUploadedBy->getValidationFailures());
				}
			}

			if ($this->asfGuardUserRelatedByUpdatedBy !== null) {
				if (!$this->asfGuardUserRelatedByUpdatedBy->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->asfGuardUserRelatedByUpdatedBy->getValidationFailures());
				}
			}


			if (($retval = MultimediaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collArticles !== null) {
					foreach($this->collArticles as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticleMultimedias !== null) {
					foreach($this->collArticleMultimedias as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEvents !== null) {
					foreach($this->collEvents as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMultimediaGallerys !== null) {
					foreach($this->collMultimediaGallerys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMultimediaTags !== null) {
					foreach($this->collMultimediaTags as $referrerFK) {
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

				if ($this->collShortcuts !== null) {
					foreach($this->collShortcuts as $referrerFK) {
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
		$pos = MultimediaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getTitle();
				break;
			case 3:
				return $this->getDescription();
				break;
			case 4:
				return $this->getComment();
				break;
			case 5:
				return $this->getIsDeleted();
				break;
			case 6:
				return $this->getSmallUri();
				break;
			case 7:
				return $this->getMediumUri();
				break;
			case 8:
				return $this->getLargeUri();
				break;
			case 9:
				return $this->getAuthor();
				break;
			case 10:
				return $this->getUploadedBy();
				break;
			case 11:
				return $this->getCopyright();
				break;
			case 12:
				return $this->getType();
				break;
			case 13:
				return $this->getLanguage();
				break;
			case 14:
				return $this->getDuration();
				break;
			case 15:
				return $this->getLocation();
				break;
			case 16:
				return $this->getSubject();
				break;
			case 17:
				return $this->getTopics();
				break;
			case 18:
				return $this->getHeight();
				break;
			case 19:
				return $this->getWidth();
				break;
			case 20:
				return $this->getMimeType();
				break;
			case 21:
				return $this->getCreatedAt();
				break;
			case 22:
				return $this->getFlvParams();
				break;
			case 23:
				return $this->getIsExternal();
				break;
			case 24:
				return $this->getPlayerId();
				break;
			case 25:
				return $this->getExternalUri();
				break;
			case 26:
				return $this->getTimesSeen();
				break;
			case 27:
				return $this->getRating();
				break;
			case 28:
				return $this->getTimesRated();
				break;
			case 29:
				return $this->getTimesDownloaded();
				break;
			case 30:
				return $this->getLongdescUri();
				break;
			case 31:
				return $this->getUpdatedAt();
				break;
			case 32:
				return $this->getUpdatedBy();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MultimediaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getTitle(),
			$keys[3] => $this->getDescription(),
			$keys[4] => $this->getComment(),
			$keys[5] => $this->getIsDeleted(),
			$keys[6] => $this->getSmallUri(),
			$keys[7] => $this->getMediumUri(),
			$keys[8] => $this->getLargeUri(),
			$keys[9] => $this->getAuthor(),
			$keys[10] => $this->getUploadedBy(),
			$keys[11] => $this->getCopyright(),
			$keys[12] => $this->getType(),
			$keys[13] => $this->getLanguage(),
			$keys[14] => $this->getDuration(),
			$keys[15] => $this->getLocation(),
			$keys[16] => $this->getSubject(),
			$keys[17] => $this->getTopics(),
			$keys[18] => $this->getHeight(),
			$keys[19] => $this->getWidth(),
			$keys[20] => $this->getMimeType(),
			$keys[21] => $this->getCreatedAt(),
			$keys[22] => $this->getFlvParams(),
			$keys[23] => $this->getIsExternal(),
			$keys[24] => $this->getPlayerId(),
			$keys[25] => $this->getExternalUri(),
			$keys[26] => $this->getTimesSeen(),
			$keys[27] => $this->getRating(),
			$keys[28] => $this->getTimesRated(),
			$keys[29] => $this->getTimesDownloaded(),
			$keys[30] => $this->getLongdescUri(),
			$keys[31] => $this->getUpdatedAt(),
			$keys[32] => $this->getUpdatedBy(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = MultimediaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setTitle($value);
				break;
			case 3:
				$this->setDescription($value);
				break;
			case 4:
				$this->setComment($value);
				break;
			case 5:
				$this->setIsDeleted($value);
				break;
			case 6:
				$this->setSmallUri($value);
				break;
			case 7:
				$this->setMediumUri($value);
				break;
			case 8:
				$this->setLargeUri($value);
				break;
			case 9:
				$this->setAuthor($value);
				break;
			case 10:
				$this->setUploadedBy($value);
				break;
			case 11:
				$this->setCopyright($value);
				break;
			case 12:
				$this->setType($value);
				break;
			case 13:
				$this->setLanguage($value);
				break;
			case 14:
				$this->setDuration($value);
				break;
			case 15:
				$this->setLocation($value);
				break;
			case 16:
				$this->setSubject($value);
				break;
			case 17:
				$this->setTopics($value);
				break;
			case 18:
				$this->setHeight($value);
				break;
			case 19:
				$this->setWidth($value);
				break;
			case 20:
				$this->setMimeType($value);
				break;
			case 21:
				$this->setCreatedAt($value);
				break;
			case 22:
				$this->setFlvParams($value);
				break;
			case 23:
				$this->setIsExternal($value);
				break;
			case 24:
				$this->setPlayerId($value);
				break;
			case 25:
				$this->setExternalUri($value);
				break;
			case 26:
				$this->setTimesSeen($value);
				break;
			case 27:
				$this->setRating($value);
				break;
			case 28:
				$this->setTimesRated($value);
				break;
			case 29:
				$this->setTimesDownloaded($value);
				break;
			case 30:
				$this->setLongdescUri($value);
				break;
			case 31:
				$this->setUpdatedAt($value);
				break;
			case 32:
				$this->setUpdatedBy($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = MultimediaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTitle($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDescription($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setComment($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIsDeleted($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setSmallUri($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setMediumUri($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLargeUri($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setAuthor($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUploadedBy($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCopyright($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setType($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setLanguage($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setDuration($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setLocation($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setSubject($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setTopics($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setHeight($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setWidth($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setMimeType($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setCreatedAt($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFlvParams($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setIsExternal($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setPlayerId($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setExternalUri($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setTimesSeen($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setRating($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setTimesRated($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setTimesDownloaded($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setLongdescUri($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setUpdatedAt($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setUpdatedBy($arr[$keys[32]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(MultimediaPeer::DATABASE_NAME);

		if ($this->isColumnModified(MultimediaPeer::ID)) $criteria->add(MultimediaPeer::ID, $this->id);
		if ($this->isColumnModified(MultimediaPeer::NAME)) $criteria->add(MultimediaPeer::NAME, $this->name);
		if ($this->isColumnModified(MultimediaPeer::TITLE)) $criteria->add(MultimediaPeer::TITLE, $this->title);
		if ($this->isColumnModified(MultimediaPeer::DESCRIPTION)) $criteria->add(MultimediaPeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(MultimediaPeer::COMMENT)) $criteria->add(MultimediaPeer::COMMENT, $this->comment);
		if ($this->isColumnModified(MultimediaPeer::IS_DELETED)) $criteria->add(MultimediaPeer::IS_DELETED, $this->is_deleted);
		if ($this->isColumnModified(MultimediaPeer::SMALL_URI)) $criteria->add(MultimediaPeer::SMALL_URI, $this->small_uri);
		if ($this->isColumnModified(MultimediaPeer::MEDIUM_URI)) $criteria->add(MultimediaPeer::MEDIUM_URI, $this->medium_uri);
		if ($this->isColumnModified(MultimediaPeer::LARGE_URI)) $criteria->add(MultimediaPeer::LARGE_URI, $this->large_uri);
		if ($this->isColumnModified(MultimediaPeer::AUTHOR)) $criteria->add(MultimediaPeer::AUTHOR, $this->author);
		if ($this->isColumnModified(MultimediaPeer::UPLOADED_BY)) $criteria->add(MultimediaPeer::UPLOADED_BY, $this->uploaded_by);
		if ($this->isColumnModified(MultimediaPeer::COPYRIGHT)) $criteria->add(MultimediaPeer::COPYRIGHT, $this->copyright);
		if ($this->isColumnModified(MultimediaPeer::TYPE)) $criteria->add(MultimediaPeer::TYPE, $this->type);
		if ($this->isColumnModified(MultimediaPeer::LANGUAGE)) $criteria->add(MultimediaPeer::LANGUAGE, $this->language);
		if ($this->isColumnModified(MultimediaPeer::DURATION)) $criteria->add(MultimediaPeer::DURATION, $this->duration);
		if ($this->isColumnModified(MultimediaPeer::LOCATION)) $criteria->add(MultimediaPeer::LOCATION, $this->location);
		if ($this->isColumnModified(MultimediaPeer::SUBJECT)) $criteria->add(MultimediaPeer::SUBJECT, $this->subject);
		if ($this->isColumnModified(MultimediaPeer::TOPICS)) $criteria->add(MultimediaPeer::TOPICS, $this->topics);
		if ($this->isColumnModified(MultimediaPeer::HEIGHT)) $criteria->add(MultimediaPeer::HEIGHT, $this->height);
		if ($this->isColumnModified(MultimediaPeer::WIDTH)) $criteria->add(MultimediaPeer::WIDTH, $this->width);
		if ($this->isColumnModified(MultimediaPeer::MIME_TYPE)) $criteria->add(MultimediaPeer::MIME_TYPE, $this->mime_type);
		if ($this->isColumnModified(MultimediaPeer::CREATED_AT)) $criteria->add(MultimediaPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(MultimediaPeer::FLV_PARAMS)) $criteria->add(MultimediaPeer::FLV_PARAMS, $this->flv_params);
		if ($this->isColumnModified(MultimediaPeer::IS_EXTERNAL)) $criteria->add(MultimediaPeer::IS_EXTERNAL, $this->is_external);
		if ($this->isColumnModified(MultimediaPeer::PLAYER_ID)) $criteria->add(MultimediaPeer::PLAYER_ID, $this->player_id);
		if ($this->isColumnModified(MultimediaPeer::EXTERNAL_URI)) $criteria->add(MultimediaPeer::EXTERNAL_URI, $this->external_uri);
		if ($this->isColumnModified(MultimediaPeer::TIMES_SEEN)) $criteria->add(MultimediaPeer::TIMES_SEEN, $this->times_seen);
		if ($this->isColumnModified(MultimediaPeer::RATING)) $criteria->add(MultimediaPeer::RATING, $this->rating);
		if ($this->isColumnModified(MultimediaPeer::TIMES_RATED)) $criteria->add(MultimediaPeer::TIMES_RATED, $this->times_rated);
		if ($this->isColumnModified(MultimediaPeer::TIMES_DOWNLOADED)) $criteria->add(MultimediaPeer::TIMES_DOWNLOADED, $this->times_downloaded);
		if ($this->isColumnModified(MultimediaPeer::LONGDESC_URI)) $criteria->add(MultimediaPeer::LONGDESC_URI, $this->longdesc_uri);
		if ($this->isColumnModified(MultimediaPeer::UPDATED_AT)) $criteria->add(MultimediaPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(MultimediaPeer::UPDATED_BY)) $criteria->add(MultimediaPeer::UPDATED_BY, $this->updated_by);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(MultimediaPeer::DATABASE_NAME);

		$criteria->add(MultimediaPeer::ID, $this->id);

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

		$copyObj->setTitle($this->title);

		$copyObj->setDescription($this->description);

		$copyObj->setComment($this->comment);

		$copyObj->setIsDeleted($this->is_deleted);

		$copyObj->setSmallUri($this->small_uri);

		$copyObj->setMediumUri($this->medium_uri);

		$copyObj->setLargeUri($this->large_uri);

		$copyObj->setAuthor($this->author);

		$copyObj->setUploadedBy($this->uploaded_by);

		$copyObj->setCopyright($this->copyright);

		$copyObj->setType($this->type);

		$copyObj->setLanguage($this->language);

		$copyObj->setDuration($this->duration);

		$copyObj->setLocation($this->location);

		$copyObj->setSubject($this->subject);

		$copyObj->setTopics($this->topics);

		$copyObj->setHeight($this->height);

		$copyObj->setWidth($this->width);

		$copyObj->setMimeType($this->mime_type);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setFlvParams($this->flv_params);

		$copyObj->setIsExternal($this->is_external);

		$copyObj->setPlayerId($this->player_id);

		$copyObj->setExternalUri($this->external_uri);

		$copyObj->setTimesSeen($this->times_seen);

		$copyObj->setRating($this->rating);

		$copyObj->setTimesRated($this->times_rated);

		$copyObj->setTimesDownloaded($this->times_downloaded);

		$copyObj->setLongdescUri($this->longdesc_uri);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setUpdatedBy($this->updated_by);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getArticles() as $relObj) {
				$copyObj->addArticle($relObj->copy($deepCopy));
			}

			foreach($this->getArticleMultimedias() as $relObj) {
				$copyObj->addArticleMultimedia($relObj->copy($deepCopy));
			}

			foreach($this->getEvents() as $relObj) {
				$copyObj->addEvent($relObj->copy($deepCopy));
			}

			foreach($this->getMultimediaGallerys() as $relObj) {
				$copyObj->addMultimediaGallery($relObj->copy($deepCopy));
			}

			foreach($this->getMultimediaTags() as $relObj) {
				$copyObj->addMultimediaTag($relObj->copy($deepCopy));
			}

			foreach($this->getSections() as $relObj) {
				$copyObj->addSection($relObj->copy($deepCopy));
			}

			foreach($this->getShortcuts() as $relObj) {
				$copyObj->addShortcut($relObj->copy($deepCopy));
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
			self::$peer = new MultimediaPeer();
		}
		return self::$peer;
	}

	
	public function setsfGuardUserRelatedByUploadedBy($v)
	{


		if ($v === null) {
			$this->setUploadedBy(NULL);
		} else {
			$this->setUploadedBy($v->getId());
		}


		$this->asfGuardUserRelatedByUploadedBy = $v;
	}


	
	public function getsfGuardUserRelatedByUploadedBy($con = null)
	{
		if ($this->asfGuardUserRelatedByUploadedBy === null && ($this->uploaded_by !== null)) {
						include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPeer.php';

			$this->asfGuardUserRelatedByUploadedBy = sfGuardUserPeer::retrieveByPK($this->uploaded_by, $con);

			
		}
		return $this->asfGuardUserRelatedByUploadedBy;
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

	
	public function initArticles()
	{
		if ($this->collArticles === null) {
			$this->collArticles = array();
		}
	}

	
	public function getArticles($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
			   $this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

				ArticlePeer::addSelectColumns($criteria);
				$this->collArticles = ArticlePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

				ArticlePeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
					$this->collArticles = ArticlePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleCriteria = $criteria;
		return $this->collArticles;
	}

	
	public function countArticles($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

		return ArticlePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticle(Article $l)
	{
		$this->collArticles[] = $l;
		$l->setMultimedia($this);
	}


	
	public function getArticlesJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinGallery($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinGallery($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinGallery($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinLink($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinLink($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinLink($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinSource($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinSource($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinSource($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}


	
	public function getArticlesJoinSection($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticles === null) {
			if ($this->isNew()) {
				$this->collArticles = array();
			} else {

				$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

				$this->collArticles = ArticlePeer::doSelectJoinSection($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastArticleCriteria) || !$this->lastArticleCriteria->equals($criteria)) {
				$this->collArticles = ArticlePeer::doSelectJoinSection($criteria, $con);
			}
		}
		$this->lastArticleCriteria = $criteria;

		return $this->collArticles;
	}

	
	public function initArticleMultimedias()
	{
		if ($this->collArticleMultimedias === null) {
			$this->collArticleMultimedias = array();
		}
	}

	
	public function getArticleMultimedias($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleMultimediaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleMultimedias === null) {
			if ($this->isNew()) {
			   $this->collArticleMultimedias = array();
			} else {

				$criteria->add(ArticleMultimediaPeer::MULTIMEDIA_ID, $this->getId());

				ArticleMultimediaPeer::addSelectColumns($criteria);
				$this->collArticleMultimedias = ArticleMultimediaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleMultimediaPeer::MULTIMEDIA_ID, $this->getId());

				ArticleMultimediaPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleMultimediaCriteria) || !$this->lastArticleMultimediaCriteria->equals($criteria)) {
					$this->collArticleMultimedias = ArticleMultimediaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleMultimediaCriteria = $criteria;
		return $this->collArticleMultimedias;
	}

	
	public function countArticleMultimedias($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleMultimediaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleMultimediaPeer::MULTIMEDIA_ID, $this->getId());

		return ArticleMultimediaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleMultimedia(ArticleMultimedia $l)
	{
		$this->collArticleMultimedias[] = $l;
		$l->setMultimedia($this);
	}


	
	public function getArticleMultimediasJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleMultimediaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleMultimedias === null) {
			if ($this->isNew()) {
				$this->collArticleMultimedias = array();
			} else {

				$criteria->add(ArticleMultimediaPeer::MULTIMEDIA_ID, $this->getId());

				$this->collArticleMultimedias = ArticleMultimediaPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleMultimediaPeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastArticleMultimediaCriteria) || !$this->lastArticleMultimediaCriteria->equals($criteria)) {
				$this->collArticleMultimedias = ArticleMultimediaPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastArticleMultimediaCriteria = $criteria;

		return $this->collArticleMultimedias;
	}

	
	public function initEvents()
	{
		if ($this->collEvents === null) {
			$this->collEvents = array();
		}
	}

	
	public function getEvents($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEvents === null) {
			if ($this->isNew()) {
			   $this->collEvents = array();
			} else {

				$criteria->add(EventPeer::MULTIMEDIA_ID, $this->getId());

				EventPeer::addSelectColumns($criteria);
				$this->collEvents = EventPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EventPeer::MULTIMEDIA_ID, $this->getId());

				EventPeer::addSelectColumns($criteria);
				if (!isset($this->lastEventCriteria) || !$this->lastEventCriteria->equals($criteria)) {
					$this->collEvents = EventPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEventCriteria = $criteria;
		return $this->collEvents;
	}

	
	public function countEvents($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EventPeer::MULTIMEDIA_ID, $this->getId());

		return EventPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEvent(Event $l)
	{
		$this->collEvents[] = $l;
		$l->setMultimedia($this);
	}


	
	public function getEventsJoinsfGuardUserRelatedByAuthor($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEvents === null) {
			if ($this->isNew()) {
				$this->collEvents = array();
			} else {

				$criteria->add(EventPeer::MULTIMEDIA_ID, $this->getId());

				$this->collEvents = EventPeer::doSelectJoinsfGuardUserRelatedByAuthor($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastEventCriteria) || !$this->lastEventCriteria->equals($criteria)) {
				$this->collEvents = EventPeer::doSelectJoinsfGuardUserRelatedByAuthor($criteria, $con);
			}
		}
		$this->lastEventCriteria = $criteria;

		return $this->collEvents;
	}


	
	public function getEventsJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEvents === null) {
			if ($this->isNew()) {
				$this->collEvents = array();
			} else {

				$criteria->add(EventPeer::MULTIMEDIA_ID, $this->getId());

				$this->collEvents = EventPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastEventCriteria) || !$this->lastEventCriteria->equals($criteria)) {
				$this->collEvents = EventPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastEventCriteria = $criteria;

		return $this->collEvents;
	}


	
	public function getEventsJoinEventType($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEvents === null) {
			if ($this->isNew()) {
				$this->collEvents = array();
			} else {

				$criteria->add(EventPeer::MULTIMEDIA_ID, $this->getId());

				$this->collEvents = EventPeer::doSelectJoinEventType($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastEventCriteria) || !$this->lastEventCriteria->equals($criteria)) {
				$this->collEvents = EventPeer::doSelectJoinEventType($criteria, $con);
			}
		}
		$this->lastEventCriteria = $criteria;

		return $this->collEvents;
	}


	
	public function getEventsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEvents === null) {
			if ($this->isNew()) {
				$this->collEvents = array();
			} else {

				$criteria->add(EventPeer::MULTIMEDIA_ID, $this->getId());

				$this->collEvents = EventPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastEventCriteria) || !$this->lastEventCriteria->equals($criteria)) {
				$this->collEvents = EventPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastEventCriteria = $criteria;

		return $this->collEvents;
	}

	
	public function initMultimediaGallerys()
	{
		if ($this->collMultimediaGallerys === null) {
			$this->collMultimediaGallerys = array();
		}
	}

	
	public function getMultimediaGallerys($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMultimediaGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMultimediaGallerys === null) {
			if ($this->isNew()) {
			   $this->collMultimediaGallerys = array();
			} else {

				$criteria->add(MultimediaGalleryPeer::MULTIMEDIA_ID, $this->getId());

				MultimediaGalleryPeer::addSelectColumns($criteria);
				$this->collMultimediaGallerys = MultimediaGalleryPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MultimediaGalleryPeer::MULTIMEDIA_ID, $this->getId());

				MultimediaGalleryPeer::addSelectColumns($criteria);
				if (!isset($this->lastMultimediaGalleryCriteria) || !$this->lastMultimediaGalleryCriteria->equals($criteria)) {
					$this->collMultimediaGallerys = MultimediaGalleryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMultimediaGalleryCriteria = $criteria;
		return $this->collMultimediaGallerys;
	}

	
	public function countMultimediaGallerys($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMultimediaGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MultimediaGalleryPeer::MULTIMEDIA_ID, $this->getId());

		return MultimediaGalleryPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMultimediaGallery(MultimediaGallery $l)
	{
		$this->collMultimediaGallerys[] = $l;
		$l->setMultimedia($this);
	}


	
	public function getMultimediaGallerysJoinGallery($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMultimediaGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMultimediaGallerys === null) {
			if ($this->isNew()) {
				$this->collMultimediaGallerys = array();
			} else {

				$criteria->add(MultimediaGalleryPeer::MULTIMEDIA_ID, $this->getId());

				$this->collMultimediaGallerys = MultimediaGalleryPeer::doSelectJoinGallery($criteria, $con);
			}
		} else {
									
			$criteria->add(MultimediaGalleryPeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastMultimediaGalleryCriteria) || !$this->lastMultimediaGalleryCriteria->equals($criteria)) {
				$this->collMultimediaGallerys = MultimediaGalleryPeer::doSelectJoinGallery($criteria, $con);
			}
		}
		$this->lastMultimediaGalleryCriteria = $criteria;

		return $this->collMultimediaGallerys;
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

				$criteria->add(MultimediaTagPeer::MULTIMEDIA_ID, $this->getId());

				MultimediaTagPeer::addSelectColumns($criteria);
				$this->collMultimediaTags = MultimediaTagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MultimediaTagPeer::MULTIMEDIA_ID, $this->getId());

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

		$criteria->add(MultimediaTagPeer::MULTIMEDIA_ID, $this->getId());

		return MultimediaTagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMultimediaTag(MultimediaTag $l)
	{
		$this->collMultimediaTags[] = $l;
		$l->setMultimedia($this);
	}


	
	public function getMultimediaTagsJoinTag($criteria = null, $con = null)
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

				$criteria->add(MultimediaTagPeer::MULTIMEDIA_ID, $this->getId());

				$this->collMultimediaTags = MultimediaTagPeer::doSelectJoinTag($criteria, $con);
			}
		} else {
									
			$criteria->add(MultimediaTagPeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastMultimediaTagCriteria) || !$this->lastMultimediaTagCriteria->equals($criteria)) {
				$this->collMultimediaTags = MultimediaTagPeer::doSelectJoinTag($criteria, $con);
			}
		}
		$this->lastMultimediaTagCriteria = $criteria;

		return $this->collMultimediaTags;
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

				$criteria->add(SectionPeer::MULTIMEDIA_ID, $this->getId());

				SectionPeer::addSelectColumns($criteria);
				$this->collSections = SectionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SectionPeer::MULTIMEDIA_ID, $this->getId());

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

		$criteria->add(SectionPeer::MULTIMEDIA_ID, $this->getId());

		return SectionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSection(Section $l)
	{
		$this->collSections[] = $l;
		$l->setMultimedia($this);
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

				$criteria->add(SectionPeer::MULTIMEDIA_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinSectionRelatedBySectionId($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::MULTIMEDIA_ID, $this->getId());

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

				$criteria->add(SectionPeer::MULTIMEDIA_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinTemplate($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::MULTIMEDIA_ID, $this->getId());

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

				$criteria->add(SectionPeer::MULTIMEDIA_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::MULTIMEDIA_ID, $this->getId());

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

				$criteria->add(SectionPeer::MULTIMEDIA_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinLayout($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::MULTIMEDIA_ID, $this->getId());

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

				$criteria->add(SectionPeer::MULTIMEDIA_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinArticleGroup($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastSectionCriteria) || !$this->lastSectionCriteria->equals($criteria)) {
				$this->collSections = SectionPeer::doSelectJoinArticleGroup($criteria, $con);
			}
		}
		$this->lastSectionCriteria = $criteria;

		return $this->collSections;
	}

	
	public function initShortcuts()
	{
		if ($this->collShortcuts === null) {
			$this->collShortcuts = array();
		}
	}

	
	public function getShortcuts($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShortcuts === null) {
			if ($this->isNew()) {
			   $this->collShortcuts = array();
			} else {

				$criteria->add(ShortcutPeer::MULTIMEDIA_ID, $this->getId());

				ShortcutPeer::addSelectColumns($criteria);
				$this->collShortcuts = ShortcutPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ShortcutPeer::MULTIMEDIA_ID, $this->getId());

				ShortcutPeer::addSelectColumns($criteria);
				if (!isset($this->lastShortcutCriteria) || !$this->lastShortcutCriteria->equals($criteria)) {
					$this->collShortcuts = ShortcutPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastShortcutCriteria = $criteria;
		return $this->collShortcuts;
	}

	
	public function countShortcuts($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ShortcutPeer::MULTIMEDIA_ID, $this->getId());

		return ShortcutPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addShortcut(Shortcut $l)
	{
		$this->collShortcuts[] = $l;
		$l->setMultimedia($this);
	}


	
	public function getShortcutsJoinContainerSlotlet($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShortcuts === null) {
			if ($this->isNew()) {
				$this->collShortcuts = array();
			} else {

				$criteria->add(ShortcutPeer::MULTIMEDIA_ID, $this->getId());

				$this->collShortcuts = ShortcutPeer::doSelectJoinContainerSlotlet($criteria, $con);
			}
		} else {
									
			$criteria->add(ShortcutPeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastShortcutCriteria) || !$this->lastShortcutCriteria->equals($criteria)) {
				$this->collShortcuts = ShortcutPeer::doSelectJoinContainerSlotlet($criteria, $con);
			}
		}
		$this->lastShortcutCriteria = $criteria;

		return $this->collShortcuts;
	}


	
	public function getShortcutsJoinsfGuardUserRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShortcuts === null) {
			if ($this->isNew()) {
				$this->collShortcuts = array();
			} else {

				$criteria->add(ShortcutPeer::MULTIMEDIA_ID, $this->getId());

				$this->collShortcuts = ShortcutPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ShortcutPeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastShortcutCriteria) || !$this->lastShortcutCriteria->equals($criteria)) {
				$this->collShortcuts = ShortcutPeer::doSelectJoinsfGuardUserRelatedByCreatedBy($criteria, $con);
			}
		}
		$this->lastShortcutCriteria = $criteria;

		return $this->collShortcuts;
	}


	
	public function getShortcutsJoinsfGuardUserRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShortcuts === null) {
			if ($this->isNew()) {
				$this->collShortcuts = array();
			} else {

				$criteria->add(ShortcutPeer::MULTIMEDIA_ID, $this->getId());

				$this->collShortcuts = ShortcutPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(ShortcutPeer::MULTIMEDIA_ID, $this->getId());

			if (!isset($this->lastShortcutCriteria) || !$this->lastShortcutCriteria->equals($criteria)) {
				$this->collShortcuts = ShortcutPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastShortcutCriteria = $criteria;

		return $this->collShortcuts;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseMultimedia:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseMultimedia::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 