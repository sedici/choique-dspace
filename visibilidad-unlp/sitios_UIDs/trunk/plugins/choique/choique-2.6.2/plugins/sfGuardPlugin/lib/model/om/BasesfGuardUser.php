<?php


abstract class BasesfGuardUser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $email;


	
	protected $username;


	
	protected $algorithm = 'sha1';


	
	protected $salt;


	
	protected $password;


	
	protected $created_at;


	
	protected $last_login;


	
	protected $is_active = true;


	
	protected $is_super_admin = false;


	
	protected $change_password_at;


	
	protected $must_change_password = false;


	
	protected $section_id;

	
	protected $aSection;

	
	protected $collsfGuardUserPermissions;

	
	protected $lastsfGuardUserPermissionCriteria = null;

	
	protected $collsfGuardUserGroups;

	
	protected $lastsfGuardUserGroupCriteria = null;

	
	protected $collsfGuardRememberKeys;

	
	protected $lastsfGuardRememberKeyCriteria = null;

	
	protected $collArticlesRelatedByCreatedBy;

	
	protected $lastArticleRelatedByCreatedByCriteria = null;

	
	protected $collArticlesRelatedByUpdatedBy;

	
	protected $lastArticleRelatedByUpdatedByCriteria = null;

	
	protected $collDocumentsRelatedByUploadedBy;

	
	protected $lastDocumentRelatedByUploadedByCriteria = null;

	
	protected $collDocumentsRelatedByUpdatedBy;

	
	protected $lastDocumentRelatedByUpdatedByCriteria = null;

	
	protected $collEventsRelatedByAuthor;

	
	protected $lastEventRelatedByAuthorCriteria = null;

	
	protected $collEventsRelatedByUpdatedBy;

	
	protected $lastEventRelatedByUpdatedByCriteria = null;

	
	protected $collFormsRelatedByCreatedBy;

	
	protected $lastFormRelatedByCreatedByCriteria = null;

	
	protected $collFormsRelatedByUpdatedBy;

	
	protected $lastFormRelatedByUpdatedByCriteria = null;

	
	protected $collGallerysRelatedByCreatedBy;

	
	protected $lastGalleryRelatedByCreatedByCriteria = null;

	
	protected $collGallerysRelatedByUpdatedBy;

	
	protected $lastGalleryRelatedByUpdatedByCriteria = null;

	
	protected $collGallerysRelatedByPublishedBy;

	
	protected $lastGalleryRelatedByPublishedByCriteria = null;

	
	protected $collArticleGroupsRelatedByCreatedBy;

	
	protected $lastArticleGroupRelatedByCreatedByCriteria = null;

	
	protected $collArticleGroupsRelatedByUpdatedBy;

	
	protected $lastArticleGroupRelatedByUpdatedByCriteria = null;

	
	protected $collLinksRelatedByCreatedBy;

	
	protected $lastLinkRelatedByCreatedByCriteria = null;

	
	protected $collLinksRelatedByUpdatedBy;

	
	protected $lastLinkRelatedByUpdatedByCriteria = null;

	
	protected $collMultimediasRelatedByUploadedBy;

	
	protected $lastMultimediaRelatedByUploadedByCriteria = null;

	
	protected $collMultimediasRelatedByUpdatedBy;

	
	protected $lastMultimediaRelatedByUpdatedByCriteria = null;

	
	protected $collShortcutsRelatedByCreatedBy;

	
	protected $lastShortcutRelatedByCreatedByCriteria = null;

	
	protected $collShortcutsRelatedByUpdatedBy;

	
	protected $lastShortcutRelatedByUpdatedByCriteria = null;

	
	protected $collTemplatesRelatedByCreatedBy;

	
	protected $lastTemplateRelatedByCreatedByCriteria = null;

	
	protected $collTemplatesRelatedByUpdatedBy;

	
	protected $lastTemplateRelatedByUpdatedByCriteria = null;

	
	protected $collRssChannelsRelatedByCreatedBy;

	
	protected $lastRssChannelRelatedByCreatedByCriteria = null;

	
	protected $collRssChannelsRelatedByUpdatedBy;

	
	protected $lastRssChannelRelatedByUpdatedByCriteria = null;

	
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

	
	public function getEmail()
	{

		return $this->email;
	}

	
	public function getUsername()
	{

		return $this->username;
	}

	
	public function getAlgorithm()
	{

		return $this->algorithm;
	}

	
	public function getSalt()
	{

		return $this->salt;
	}

	
	public function getPassword()
	{

		return $this->password;
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

	
	public function getLastLogin($format = 'Y-m-d H:i:s')
	{

		if ($this->last_login === null || $this->last_login === '') {
			return null;
		} elseif (!is_int($this->last_login)) {
						$ts = strtotime($this->last_login);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [last_login] as date/time value: " . var_export($this->last_login, true));
			}
		} else {
			$ts = $this->last_login;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getIsActive()
	{

		return $this->is_active;
	}

	
	public function getIsSuperAdmin()
	{

		return $this->is_super_admin;
	}

	
	public function getChangePasswordAt($format = 'Y-m-d H:i:s')
	{

		if ($this->change_password_at === null || $this->change_password_at === '') {
			return null;
		} elseif (!is_int($this->change_password_at)) {
						$ts = strtotime($this->change_password_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [change_password_at] as date/time value: " . var_export($this->change_password_at, true));
			}
		} else {
			$ts = $this->change_password_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getMustChangePassword()
	{

		return $this->must_change_password;
	}

	
	public function getSectionId()
	{

		return $this->section_id;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::NAME;
		}

	} 
	
	public function setEmail($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::EMAIL;
		}

	} 
	
	public function setUsername($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::USERNAME;
		}

	} 
	
	public function setAlgorithm($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->algorithm !== $v || $v === 'sha1') {
			$this->algorithm = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::ALGORITHM;
		}

	} 
	
	public function setSalt($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->salt !== $v) {
			$this->salt = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::SALT;
		}

	} 
	
	public function setPassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::PASSWORD;
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
			$this->modifiedColumns[] = sfGuardUserPeer::CREATED_AT;
		}

	} 
	
	public function setLastLogin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [last_login] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->last_login !== $ts) {
			$this->last_login = $ts;
			$this->modifiedColumns[] = sfGuardUserPeer::LAST_LOGIN;
		}

	} 
	
	public function setIsActive($v)
	{

		if ($this->is_active !== $v || $v === true) {
			$this->is_active = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::IS_ACTIVE;
		}

	} 
	
	public function setIsSuperAdmin($v)
	{

		if ($this->is_super_admin !== $v || $v === false) {
			$this->is_super_admin = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::IS_SUPER_ADMIN;
		}

	} 
	
	public function setChangePasswordAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [change_password_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->change_password_at !== $ts) {
			$this->change_password_at = $ts;
			$this->modifiedColumns[] = sfGuardUserPeer::CHANGE_PASSWORD_AT;
		}

	} 
	
	public function setMustChangePassword($v)
	{

		if ($this->must_change_password !== $v || $v === false) {
			$this->must_change_password = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::MUST_CHANGE_PASSWORD;
		}

	} 
	
	public function setSectionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->section_id !== $v) {
			$this->section_id = $v;
			$this->modifiedColumns[] = sfGuardUserPeer::SECTION_ID;
		}

		if ($this->aSection !== null && $this->aSection->getId() !== $v) {
			$this->aSection = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->email = $rs->getString($startcol + 2);

			$this->username = $rs->getString($startcol + 3);

			$this->algorithm = $rs->getString($startcol + 4);

			$this->salt = $rs->getString($startcol + 5);

			$this->password = $rs->getString($startcol + 6);

			$this->created_at = $rs->getTimestamp($startcol + 7, null);

			$this->last_login = $rs->getTimestamp($startcol + 8, null);

			$this->is_active = $rs->getBoolean($startcol + 9);

			$this->is_super_admin = $rs->getBoolean($startcol + 10);

			$this->change_password_at = $rs->getTimestamp($startcol + 11, null);

			$this->must_change_password = $rs->getBoolean($startcol + 12);

			$this->section_id = $rs->getInt($startcol + 13);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 14; 
		} catch (Exception $e) {
			throw new PropelException("Error populating sfGuardUser object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUser:delete:pre') as $callable)
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
			$con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			sfGuardUserPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BasesfGuardUser:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BasesfGuardUser:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(sfGuardUserPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(sfGuardUserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BasesfGuardUser:save:post') as $callable)
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


												
			if ($this->aSection !== null) {
				if ($this->aSection->isModified()) {
					$affectedRows += $this->aSection->save($con);
				}
				$this->setSection($this->aSection);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = sfGuardUserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += sfGuardUserPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collsfGuardUserPermissions !== null) {
				foreach($this->collsfGuardUserPermissions as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardUserGroups !== null) {
				foreach($this->collsfGuardUserGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collsfGuardRememberKeys !== null) {
				foreach($this->collsfGuardRememberKeys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticlesRelatedByCreatedBy !== null) {
				foreach($this->collArticlesRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticlesRelatedByUpdatedBy !== null) {
				foreach($this->collArticlesRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDocumentsRelatedByUploadedBy !== null) {
				foreach($this->collDocumentsRelatedByUploadedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDocumentsRelatedByUpdatedBy !== null) {
				foreach($this->collDocumentsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEventsRelatedByAuthor !== null) {
				foreach($this->collEventsRelatedByAuthor as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collEventsRelatedByUpdatedBy !== null) {
				foreach($this->collEventsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFormsRelatedByCreatedBy !== null) {
				foreach($this->collFormsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collFormsRelatedByUpdatedBy !== null) {
				foreach($this->collFormsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collGallerysRelatedByCreatedBy !== null) {
				foreach($this->collGallerysRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collGallerysRelatedByUpdatedBy !== null) {
				foreach($this->collGallerysRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collGallerysRelatedByPublishedBy !== null) {
				foreach($this->collGallerysRelatedByPublishedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticleGroupsRelatedByCreatedBy !== null) {
				foreach($this->collArticleGroupsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticleGroupsRelatedByUpdatedBy !== null) {
				foreach($this->collArticleGroupsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLinksRelatedByCreatedBy !== null) {
				foreach($this->collLinksRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLinksRelatedByUpdatedBy !== null) {
				foreach($this->collLinksRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMultimediasRelatedByUploadedBy !== null) {
				foreach($this->collMultimediasRelatedByUploadedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collMultimediasRelatedByUpdatedBy !== null) {
				foreach($this->collMultimediasRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collShortcutsRelatedByCreatedBy !== null) {
				foreach($this->collShortcutsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collShortcutsRelatedByUpdatedBy !== null) {
				foreach($this->collShortcutsRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTemplatesRelatedByCreatedBy !== null) {
				foreach($this->collTemplatesRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collTemplatesRelatedByUpdatedBy !== null) {
				foreach($this->collTemplatesRelatedByUpdatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRssChannelsRelatedByCreatedBy !== null) {
				foreach($this->collRssChannelsRelatedByCreatedBy as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRssChannelsRelatedByUpdatedBy !== null) {
				foreach($this->collRssChannelsRelatedByUpdatedBy as $referrerFK) {
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


												
			if ($this->aSection !== null) {
				if (!$this->aSection->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSection->getValidationFailures());
				}
			}


			if (($retval = sfGuardUserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collsfGuardUserPermissions !== null) {
					foreach($this->collsfGuardUserPermissions as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardUserGroups !== null) {
					foreach($this->collsfGuardUserGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collsfGuardRememberKeys !== null) {
					foreach($this->collsfGuardRememberKeys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticlesRelatedByCreatedBy !== null) {
					foreach($this->collArticlesRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticlesRelatedByUpdatedBy !== null) {
					foreach($this->collArticlesRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDocumentsRelatedByUploadedBy !== null) {
					foreach($this->collDocumentsRelatedByUploadedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDocumentsRelatedByUpdatedBy !== null) {
					foreach($this->collDocumentsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEventsRelatedByAuthor !== null) {
					foreach($this->collEventsRelatedByAuthor as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collEventsRelatedByUpdatedBy !== null) {
					foreach($this->collEventsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFormsRelatedByCreatedBy !== null) {
					foreach($this->collFormsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collFormsRelatedByUpdatedBy !== null) {
					foreach($this->collFormsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGallerysRelatedByCreatedBy !== null) {
					foreach($this->collGallerysRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGallerysRelatedByUpdatedBy !== null) {
					foreach($this->collGallerysRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collGallerysRelatedByPublishedBy !== null) {
					foreach($this->collGallerysRelatedByPublishedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticleGroupsRelatedByCreatedBy !== null) {
					foreach($this->collArticleGroupsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticleGroupsRelatedByUpdatedBy !== null) {
					foreach($this->collArticleGroupsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLinksRelatedByCreatedBy !== null) {
					foreach($this->collLinksRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLinksRelatedByUpdatedBy !== null) {
					foreach($this->collLinksRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMultimediasRelatedByUploadedBy !== null) {
					foreach($this->collMultimediasRelatedByUploadedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collMultimediasRelatedByUpdatedBy !== null) {
					foreach($this->collMultimediasRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collShortcutsRelatedByCreatedBy !== null) {
					foreach($this->collShortcutsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collShortcutsRelatedByUpdatedBy !== null) {
					foreach($this->collShortcutsRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTemplatesRelatedByCreatedBy !== null) {
					foreach($this->collTemplatesRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collTemplatesRelatedByUpdatedBy !== null) {
					foreach($this->collTemplatesRelatedByUpdatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRssChannelsRelatedByCreatedBy !== null) {
					foreach($this->collRssChannelsRelatedByCreatedBy as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRssChannelsRelatedByUpdatedBy !== null) {
					foreach($this->collRssChannelsRelatedByUpdatedBy as $referrerFK) {
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
		$pos = sfGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getEmail();
				break;
			case 3:
				return $this->getUsername();
				break;
			case 4:
				return $this->getAlgorithm();
				break;
			case 5:
				return $this->getSalt();
				break;
			case 6:
				return $this->getPassword();
				break;
			case 7:
				return $this->getCreatedAt();
				break;
			case 8:
				return $this->getLastLogin();
				break;
			case 9:
				return $this->getIsActive();
				break;
			case 10:
				return $this->getIsSuperAdmin();
				break;
			case 11:
				return $this->getChangePasswordAt();
				break;
			case 12:
				return $this->getMustChangePassword();
				break;
			case 13:
				return $this->getSectionId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardUserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getEmail(),
			$keys[3] => $this->getUsername(),
			$keys[4] => $this->getAlgorithm(),
			$keys[5] => $this->getSalt(),
			$keys[6] => $this->getPassword(),
			$keys[7] => $this->getCreatedAt(),
			$keys[8] => $this->getLastLogin(),
			$keys[9] => $this->getIsActive(),
			$keys[10] => $this->getIsSuperAdmin(),
			$keys[11] => $this->getChangePasswordAt(),
			$keys[12] => $this->getMustChangePassword(),
			$keys[13] => $this->getSectionId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = sfGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setEmail($value);
				break;
			case 3:
				$this->setUsername($value);
				break;
			case 4:
				$this->setAlgorithm($value);
				break;
			case 5:
				$this->setSalt($value);
				break;
			case 6:
				$this->setPassword($value);
				break;
			case 7:
				$this->setCreatedAt($value);
				break;
			case 8:
				$this->setLastLogin($value);
				break;
			case 9:
				$this->setIsActive($value);
				break;
			case 10:
				$this->setIsSuperAdmin($value);
				break;
			case 11:
				$this->setChangePasswordAt($value);
				break;
			case 12:
				$this->setMustChangePassword($value);
				break;
			case 13:
				$this->setSectionId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = sfGuardUserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setEmail($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUsername($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAlgorithm($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setSalt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setPassword($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setCreatedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLastLogin($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setIsActive($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIsSuperAdmin($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setChangePasswordAt($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setMustChangePassword($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setSectionId($arr[$keys[13]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);

		if ($this->isColumnModified(sfGuardUserPeer::ID)) $criteria->add(sfGuardUserPeer::ID, $this->id);
		if ($this->isColumnModified(sfGuardUserPeer::NAME)) $criteria->add(sfGuardUserPeer::NAME, $this->name);
		if ($this->isColumnModified(sfGuardUserPeer::EMAIL)) $criteria->add(sfGuardUserPeer::EMAIL, $this->email);
		if ($this->isColumnModified(sfGuardUserPeer::USERNAME)) $criteria->add(sfGuardUserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(sfGuardUserPeer::ALGORITHM)) $criteria->add(sfGuardUserPeer::ALGORITHM, $this->algorithm);
		if ($this->isColumnModified(sfGuardUserPeer::SALT)) $criteria->add(sfGuardUserPeer::SALT, $this->salt);
		if ($this->isColumnModified(sfGuardUserPeer::PASSWORD)) $criteria->add(sfGuardUserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(sfGuardUserPeer::CREATED_AT)) $criteria->add(sfGuardUserPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(sfGuardUserPeer::LAST_LOGIN)) $criteria->add(sfGuardUserPeer::LAST_LOGIN, $this->last_login);
		if ($this->isColumnModified(sfGuardUserPeer::IS_ACTIVE)) $criteria->add(sfGuardUserPeer::IS_ACTIVE, $this->is_active);
		if ($this->isColumnModified(sfGuardUserPeer::IS_SUPER_ADMIN)) $criteria->add(sfGuardUserPeer::IS_SUPER_ADMIN, $this->is_super_admin);
		if ($this->isColumnModified(sfGuardUserPeer::CHANGE_PASSWORD_AT)) $criteria->add(sfGuardUserPeer::CHANGE_PASSWORD_AT, $this->change_password_at);
		if ($this->isColumnModified(sfGuardUserPeer::MUST_CHANGE_PASSWORD)) $criteria->add(sfGuardUserPeer::MUST_CHANGE_PASSWORD, $this->must_change_password);
		if ($this->isColumnModified(sfGuardUserPeer::SECTION_ID)) $criteria->add(sfGuardUserPeer::SECTION_ID, $this->section_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(sfGuardUserPeer::DATABASE_NAME);

		$criteria->add(sfGuardUserPeer::ID, $this->id);

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

		$copyObj->setEmail($this->email);

		$copyObj->setUsername($this->username);

		$copyObj->setAlgorithm($this->algorithm);

		$copyObj->setSalt($this->salt);

		$copyObj->setPassword($this->password);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setLastLogin($this->last_login);

		$copyObj->setIsActive($this->is_active);

		$copyObj->setIsSuperAdmin($this->is_super_admin);

		$copyObj->setChangePasswordAt($this->change_password_at);

		$copyObj->setMustChangePassword($this->must_change_password);

		$copyObj->setSectionId($this->section_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getsfGuardUserPermissions() as $relObj) {
				$copyObj->addsfGuardUserPermission($relObj->copy($deepCopy));
			}

			foreach($this->getsfGuardUserGroups() as $relObj) {
				$copyObj->addsfGuardUserGroup($relObj->copy($deepCopy));
			}

			foreach($this->getsfGuardRememberKeys() as $relObj) {
				$copyObj->addsfGuardRememberKey($relObj->copy($deepCopy));
			}

			foreach($this->getArticlesRelatedByCreatedBy() as $relObj) {
				$copyObj->addArticleRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getArticlesRelatedByUpdatedBy() as $relObj) {
				$copyObj->addArticleRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getDocumentsRelatedByUploadedBy() as $relObj) {
				$copyObj->addDocumentRelatedByUploadedBy($relObj->copy($deepCopy));
			}

			foreach($this->getDocumentsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addDocumentRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getEventsRelatedByAuthor() as $relObj) {
				$copyObj->addEventRelatedByAuthor($relObj->copy($deepCopy));
			}

			foreach($this->getEventsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addEventRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getFormsRelatedByCreatedBy() as $relObj) {
				$copyObj->addFormRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getFormsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addFormRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getGallerysRelatedByCreatedBy() as $relObj) {
				$copyObj->addGalleryRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getGallerysRelatedByUpdatedBy() as $relObj) {
				$copyObj->addGalleryRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getGallerysRelatedByPublishedBy() as $relObj) {
				$copyObj->addGalleryRelatedByPublishedBy($relObj->copy($deepCopy));
			}

			foreach($this->getArticleGroupsRelatedByCreatedBy() as $relObj) {
				$copyObj->addArticleGroupRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getArticleGroupsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addArticleGroupRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getLinksRelatedByCreatedBy() as $relObj) {
				$copyObj->addLinkRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getLinksRelatedByUpdatedBy() as $relObj) {
				$copyObj->addLinkRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getMultimediasRelatedByUploadedBy() as $relObj) {
				$copyObj->addMultimediaRelatedByUploadedBy($relObj->copy($deepCopy));
			}

			foreach($this->getMultimediasRelatedByUpdatedBy() as $relObj) {
				$copyObj->addMultimediaRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getShortcutsRelatedByCreatedBy() as $relObj) {
				$copyObj->addShortcutRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getShortcutsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addShortcutRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getTemplatesRelatedByCreatedBy() as $relObj) {
				$copyObj->addTemplateRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getTemplatesRelatedByUpdatedBy() as $relObj) {
				$copyObj->addTemplateRelatedByUpdatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getRssChannelsRelatedByCreatedBy() as $relObj) {
				$copyObj->addRssChannelRelatedByCreatedBy($relObj->copy($deepCopy));
			}

			foreach($this->getRssChannelsRelatedByUpdatedBy() as $relObj) {
				$copyObj->addRssChannelRelatedByUpdatedBy($relObj->copy($deepCopy));
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
			self::$peer = new sfGuardUserPeer();
		}
		return self::$peer;
	}

	
	public function setSection($v)
	{


		if ($v === null) {
			$this->setSectionId(NULL);
		} else {
			$this->setSectionId($v->getId());
		}


		$this->aSection = $v;
	}


	
	public function getSection($con = null)
	{
		if ($this->aSection === null && ($this->section_id !== null)) {
						include_once 'lib/model/om/BaseSectionPeer.php';

			$this->aSection = SectionPeer::retrieveByPK($this->section_id, $con);

			
		}
		return $this->aSection;
	}

	
	public function initsfGuardUserPermissions()
	{
		if ($this->collsfGuardUserPermissions === null) {
			$this->collsfGuardUserPermissions = array();
		}
	}

	
	public function getsfGuardUserPermissions($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserPermissions === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUserPermissions = array();
			} else {

				$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

				sfGuardUserPermissionPeer::addSelectColumns($criteria);
				$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

				sfGuardUserPermissionPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserPermissionCriteria) || !$this->lastsfGuardUserPermissionCriteria->equals($criteria)) {
					$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserPermissionCriteria = $criteria;
		return $this->collsfGuardUserPermissions;
	}

	
	public function countsfGuardUserPermissions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

		return sfGuardUserPermissionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserPermission(sfGuardUserPermission $l)
	{
		$this->collsfGuardUserPermissions[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getsfGuardUserPermissionsJoinsfGuardPermission($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserPermissions === null) {
			if ($this->isNew()) {
				$this->collsfGuardUserPermissions = array();
			} else {

				$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

				$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelectJoinsfGuardPermission($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserPermissionPeer::USER_ID, $this->getId());

			if (!isset($this->lastsfGuardUserPermissionCriteria) || !$this->lastsfGuardUserPermissionCriteria->equals($criteria)) {
				$this->collsfGuardUserPermissions = sfGuardUserPermissionPeer::doSelectJoinsfGuardPermission($criteria, $con);
			}
		}
		$this->lastsfGuardUserPermissionCriteria = $criteria;

		return $this->collsfGuardUserPermissions;
	}

	
	public function initsfGuardUserGroups()
	{
		if ($this->collsfGuardUserGroups === null) {
			$this->collsfGuardUserGroups = array();
		}
	}

	
	public function getsfGuardUserGroups($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserGroups === null) {
			if ($this->isNew()) {
			   $this->collsfGuardUserGroups = array();
			} else {

				$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

				sfGuardUserGroupPeer::addSelectColumns($criteria);
				$this->collsfGuardUserGroups = sfGuardUserGroupPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

				sfGuardUserGroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardUserGroupCriteria) || !$this->lastsfGuardUserGroupCriteria->equals($criteria)) {
					$this->collsfGuardUserGroups = sfGuardUserGroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardUserGroupCriteria = $criteria;
		return $this->collsfGuardUserGroups;
	}

	
	public function countsfGuardUserGroups($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

		return sfGuardUserGroupPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardUserGroup(sfGuardUserGroup $l)
	{
		$this->collsfGuardUserGroups[] = $l;
		$l->setsfGuardUser($this);
	}


	
	public function getsfGuardUserGroupsJoinsfGuardGroup($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardUserGroups === null) {
			if ($this->isNew()) {
				$this->collsfGuardUserGroups = array();
			} else {

				$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

				$this->collsfGuardUserGroups = sfGuardUserGroupPeer::doSelectJoinsfGuardGroup($criteria, $con);
			}
		} else {
									
			$criteria->add(sfGuardUserGroupPeer::USER_ID, $this->getId());

			if (!isset($this->lastsfGuardUserGroupCriteria) || !$this->lastsfGuardUserGroupCriteria->equals($criteria)) {
				$this->collsfGuardUserGroups = sfGuardUserGroupPeer::doSelectJoinsfGuardGroup($criteria, $con);
			}
		}
		$this->lastsfGuardUserGroupCriteria = $criteria;

		return $this->collsfGuardUserGroups;
	}

	
	public function initsfGuardRememberKeys()
	{
		if ($this->collsfGuardRememberKeys === null) {
			$this->collsfGuardRememberKeys = array();
		}
	}

	
	public function getsfGuardRememberKeys($criteria = null, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardRememberKeyPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collsfGuardRememberKeys === null) {
			if ($this->isNew()) {
			   $this->collsfGuardRememberKeys = array();
			} else {

				$criteria->add(sfGuardRememberKeyPeer::USER_ID, $this->getId());

				sfGuardRememberKeyPeer::addSelectColumns($criteria);
				$this->collsfGuardRememberKeys = sfGuardRememberKeyPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(sfGuardRememberKeyPeer::USER_ID, $this->getId());

				sfGuardRememberKeyPeer::addSelectColumns($criteria);
				if (!isset($this->lastsfGuardRememberKeyCriteria) || !$this->lastsfGuardRememberKeyCriteria->equals($criteria)) {
					$this->collsfGuardRememberKeys = sfGuardRememberKeyPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastsfGuardRememberKeyCriteria = $criteria;
		return $this->collsfGuardRememberKeys;
	}

	
	public function countsfGuardRememberKeys($criteria = null, $distinct = false, $con = null)
	{
				include_once 'plugins/sfGuardPlugin/lib/model/om/BasesfGuardRememberKeyPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(sfGuardRememberKeyPeer::USER_ID, $this->getId());

		return sfGuardRememberKeyPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addsfGuardRememberKey(sfGuardRememberKey $l)
	{
		$this->collsfGuardRememberKeys[] = $l;
		$l->setsfGuardUser($this);
	}

	
	public function initArticlesRelatedByCreatedBy()
	{
		if ($this->collArticlesRelatedByCreatedBy === null) {
			$this->collArticlesRelatedByCreatedBy = array();
		}
	}

	
	public function getArticlesRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticlesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collArticlesRelatedByCreatedBy = array();
			} else {

				$criteria->add(ArticlePeer::CREATED_BY, $this->getId());

				ArticlePeer::addSelectColumns($criteria);
				$this->collArticlesRelatedByCreatedBy = ArticlePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticlePeer::CREATED_BY, $this->getId());

				ArticlePeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleRelatedByCreatedByCriteria) || !$this->lastArticleRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collArticlesRelatedByCreatedBy = ArticlePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleRelatedByCreatedByCriteria = $criteria;
		return $this->collArticlesRelatedByCreatedBy;
	}

	
	public function countArticlesRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticlePeer::CREATED_BY, $this->getId());

		return ArticlePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleRelatedByCreatedBy(Article $l)
	{
		$this->collArticlesRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getArticlesRelatedByCreatedByJoinMultimedia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticlesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collArticlesRelatedByCreatedBy = array();
			} else {

				$criteria->add(ArticlePeer::CREATED_BY, $this->getId());

				$this->collArticlesRelatedByCreatedBy = ArticlePeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastArticleRelatedByCreatedByCriteria) || !$this->lastArticleRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collArticlesRelatedByCreatedBy = ArticlePeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastArticleRelatedByCreatedByCriteria = $criteria;

		return $this->collArticlesRelatedByCreatedBy;
	}


	
	public function getArticlesRelatedByCreatedByJoinGallery($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticlesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collArticlesRelatedByCreatedBy = array();
			} else {

				$criteria->add(ArticlePeer::CREATED_BY, $this->getId());

				$this->collArticlesRelatedByCreatedBy = ArticlePeer::doSelectJoinGallery($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastArticleRelatedByCreatedByCriteria) || !$this->lastArticleRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collArticlesRelatedByCreatedBy = ArticlePeer::doSelectJoinGallery($criteria, $con);
			}
		}
		$this->lastArticleRelatedByCreatedByCriteria = $criteria;

		return $this->collArticlesRelatedByCreatedBy;
	}


	
	public function getArticlesRelatedByCreatedByJoinLink($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticlesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collArticlesRelatedByCreatedBy = array();
			} else {

				$criteria->add(ArticlePeer::CREATED_BY, $this->getId());

				$this->collArticlesRelatedByCreatedBy = ArticlePeer::doSelectJoinLink($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastArticleRelatedByCreatedByCriteria) || !$this->lastArticleRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collArticlesRelatedByCreatedBy = ArticlePeer::doSelectJoinLink($criteria, $con);
			}
		}
		$this->lastArticleRelatedByCreatedByCriteria = $criteria;

		return $this->collArticlesRelatedByCreatedBy;
	}


	
	public function getArticlesRelatedByCreatedByJoinSource($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticlesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collArticlesRelatedByCreatedBy = array();
			} else {

				$criteria->add(ArticlePeer::CREATED_BY, $this->getId());

				$this->collArticlesRelatedByCreatedBy = ArticlePeer::doSelectJoinSource($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastArticleRelatedByCreatedByCriteria) || !$this->lastArticleRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collArticlesRelatedByCreatedBy = ArticlePeer::doSelectJoinSource($criteria, $con);
			}
		}
		$this->lastArticleRelatedByCreatedByCriteria = $criteria;

		return $this->collArticlesRelatedByCreatedBy;
	}


	
	public function getArticlesRelatedByCreatedByJoinSection($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticlesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collArticlesRelatedByCreatedBy = array();
			} else {

				$criteria->add(ArticlePeer::CREATED_BY, $this->getId());

				$this->collArticlesRelatedByCreatedBy = ArticlePeer::doSelectJoinSection($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::CREATED_BY, $this->getId());

			if (!isset($this->lastArticleRelatedByCreatedByCriteria) || !$this->lastArticleRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collArticlesRelatedByCreatedBy = ArticlePeer::doSelectJoinSection($criteria, $con);
			}
		}
		$this->lastArticleRelatedByCreatedByCriteria = $criteria;

		return $this->collArticlesRelatedByCreatedBy;
	}

	
	public function initArticlesRelatedByUpdatedBy()
	{
		if ($this->collArticlesRelatedByUpdatedBy === null) {
			$this->collArticlesRelatedByUpdatedBy = array();
		}
	}

	
	public function getArticlesRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticlesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collArticlesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ArticlePeer::UPDATED_BY, $this->getId());

				ArticlePeer::addSelectColumns($criteria);
				$this->collArticlesRelatedByUpdatedBy = ArticlePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticlePeer::UPDATED_BY, $this->getId());

				ArticlePeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleRelatedByUpdatedByCriteria) || !$this->lastArticleRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collArticlesRelatedByUpdatedBy = ArticlePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleRelatedByUpdatedByCriteria = $criteria;
		return $this->collArticlesRelatedByUpdatedBy;
	}

	
	public function countArticlesRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticlePeer::UPDATED_BY, $this->getId());

		return ArticlePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleRelatedByUpdatedBy(Article $l)
	{
		$this->collArticlesRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getArticlesRelatedByUpdatedByJoinMultimedia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticlesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collArticlesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ArticlePeer::UPDATED_BY, $this->getId());

				$this->collArticlesRelatedByUpdatedBy = ArticlePeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastArticleRelatedByUpdatedByCriteria) || !$this->lastArticleRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collArticlesRelatedByUpdatedBy = ArticlePeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastArticleRelatedByUpdatedByCriteria = $criteria;

		return $this->collArticlesRelatedByUpdatedBy;
	}


	
	public function getArticlesRelatedByUpdatedByJoinGallery($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticlesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collArticlesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ArticlePeer::UPDATED_BY, $this->getId());

				$this->collArticlesRelatedByUpdatedBy = ArticlePeer::doSelectJoinGallery($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastArticleRelatedByUpdatedByCriteria) || !$this->lastArticleRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collArticlesRelatedByUpdatedBy = ArticlePeer::doSelectJoinGallery($criteria, $con);
			}
		}
		$this->lastArticleRelatedByUpdatedByCriteria = $criteria;

		return $this->collArticlesRelatedByUpdatedBy;
	}


	
	public function getArticlesRelatedByUpdatedByJoinLink($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticlesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collArticlesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ArticlePeer::UPDATED_BY, $this->getId());

				$this->collArticlesRelatedByUpdatedBy = ArticlePeer::doSelectJoinLink($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastArticleRelatedByUpdatedByCriteria) || !$this->lastArticleRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collArticlesRelatedByUpdatedBy = ArticlePeer::doSelectJoinLink($criteria, $con);
			}
		}
		$this->lastArticleRelatedByUpdatedByCriteria = $criteria;

		return $this->collArticlesRelatedByUpdatedBy;
	}


	
	public function getArticlesRelatedByUpdatedByJoinSource($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticlesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collArticlesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ArticlePeer::UPDATED_BY, $this->getId());

				$this->collArticlesRelatedByUpdatedBy = ArticlePeer::doSelectJoinSource($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastArticleRelatedByUpdatedByCriteria) || !$this->lastArticleRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collArticlesRelatedByUpdatedBy = ArticlePeer::doSelectJoinSource($criteria, $con);
			}
		}
		$this->lastArticleRelatedByUpdatedByCriteria = $criteria;

		return $this->collArticlesRelatedByUpdatedBy;
	}


	
	public function getArticlesRelatedByUpdatedByJoinSection($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticlesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collArticlesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ArticlePeer::UPDATED_BY, $this->getId());

				$this->collArticlesRelatedByUpdatedBy = ArticlePeer::doSelectJoinSection($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticlePeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastArticleRelatedByUpdatedByCriteria) || !$this->lastArticleRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collArticlesRelatedByUpdatedBy = ArticlePeer::doSelectJoinSection($criteria, $con);
			}
		}
		$this->lastArticleRelatedByUpdatedByCriteria = $criteria;

		return $this->collArticlesRelatedByUpdatedBy;
	}

	
	public function initDocumentsRelatedByUploadedBy()
	{
		if ($this->collDocumentsRelatedByUploadedBy === null) {
			$this->collDocumentsRelatedByUploadedBy = array();
		}
	}

	
	public function getDocumentsRelatedByUploadedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocumentsRelatedByUploadedBy === null) {
			if ($this->isNew()) {
			   $this->collDocumentsRelatedByUploadedBy = array();
			} else {

				$criteria->add(DocumentPeer::UPLOADED_BY, $this->getId());

				DocumentPeer::addSelectColumns($criteria);
				$this->collDocumentsRelatedByUploadedBy = DocumentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DocumentPeer::UPLOADED_BY, $this->getId());

				DocumentPeer::addSelectColumns($criteria);
				if (!isset($this->lastDocumentRelatedByUploadedByCriteria) || !$this->lastDocumentRelatedByUploadedByCriteria->equals($criteria)) {
					$this->collDocumentsRelatedByUploadedBy = DocumentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDocumentRelatedByUploadedByCriteria = $criteria;
		return $this->collDocumentsRelatedByUploadedBy;
	}

	
	public function countDocumentsRelatedByUploadedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DocumentPeer::UPLOADED_BY, $this->getId());

		return DocumentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDocumentRelatedByUploadedBy(Document $l)
	{
		$this->collDocumentsRelatedByUploadedBy[] = $l;
		$l->setsfGuardUserRelatedByUploadedBy($this);
	}

	
	public function initDocumentsRelatedByUpdatedBy()
	{
		if ($this->collDocumentsRelatedByUpdatedBy === null) {
			$this->collDocumentsRelatedByUpdatedBy = array();
		}
	}

	
	public function getDocumentsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDocumentsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collDocumentsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(DocumentPeer::UPDATED_BY, $this->getId());

				DocumentPeer::addSelectColumns($criteria);
				$this->collDocumentsRelatedByUpdatedBy = DocumentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DocumentPeer::UPDATED_BY, $this->getId());

				DocumentPeer::addSelectColumns($criteria);
				if (!isset($this->lastDocumentRelatedByUpdatedByCriteria) || !$this->lastDocumentRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collDocumentsRelatedByUpdatedBy = DocumentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDocumentRelatedByUpdatedByCriteria = $criteria;
		return $this->collDocumentsRelatedByUpdatedBy;
	}

	
	public function countDocumentsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DocumentPeer::UPDATED_BY, $this->getId());

		return DocumentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDocumentRelatedByUpdatedBy(Document $l)
	{
		$this->collDocumentsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}

	
	public function initEventsRelatedByAuthor()
	{
		if ($this->collEventsRelatedByAuthor === null) {
			$this->collEventsRelatedByAuthor = array();
		}
	}

	
	public function getEventsRelatedByAuthor($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventsRelatedByAuthor === null) {
			if ($this->isNew()) {
			   $this->collEventsRelatedByAuthor = array();
			} else {

				$criteria->add(EventPeer::AUTHOR, $this->getId());

				EventPeer::addSelectColumns($criteria);
				$this->collEventsRelatedByAuthor = EventPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EventPeer::AUTHOR, $this->getId());

				EventPeer::addSelectColumns($criteria);
				if (!isset($this->lastEventRelatedByAuthorCriteria) || !$this->lastEventRelatedByAuthorCriteria->equals($criteria)) {
					$this->collEventsRelatedByAuthor = EventPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEventRelatedByAuthorCriteria = $criteria;
		return $this->collEventsRelatedByAuthor;
	}

	
	public function countEventsRelatedByAuthor($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EventPeer::AUTHOR, $this->getId());

		return EventPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEventRelatedByAuthor(Event $l)
	{
		$this->collEventsRelatedByAuthor[] = $l;
		$l->setsfGuardUserRelatedByAuthor($this);
	}


	
	public function getEventsRelatedByAuthorJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventsRelatedByAuthor === null) {
			if ($this->isNew()) {
				$this->collEventsRelatedByAuthor = array();
			} else {

				$criteria->add(EventPeer::AUTHOR, $this->getId());

				$this->collEventsRelatedByAuthor = EventPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeer::AUTHOR, $this->getId());

			if (!isset($this->lastEventRelatedByAuthorCriteria) || !$this->lastEventRelatedByAuthorCriteria->equals($criteria)) {
				$this->collEventsRelatedByAuthor = EventPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastEventRelatedByAuthorCriteria = $criteria;

		return $this->collEventsRelatedByAuthor;
	}


	
	public function getEventsRelatedByAuthorJoinEventType($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventsRelatedByAuthor === null) {
			if ($this->isNew()) {
				$this->collEventsRelatedByAuthor = array();
			} else {

				$criteria->add(EventPeer::AUTHOR, $this->getId());

				$this->collEventsRelatedByAuthor = EventPeer::doSelectJoinEventType($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeer::AUTHOR, $this->getId());

			if (!isset($this->lastEventRelatedByAuthorCriteria) || !$this->lastEventRelatedByAuthorCriteria->equals($criteria)) {
				$this->collEventsRelatedByAuthor = EventPeer::doSelectJoinEventType($criteria, $con);
			}
		}
		$this->lastEventRelatedByAuthorCriteria = $criteria;

		return $this->collEventsRelatedByAuthor;
	}


	
	public function getEventsRelatedByAuthorJoinMultimedia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventsRelatedByAuthor === null) {
			if ($this->isNew()) {
				$this->collEventsRelatedByAuthor = array();
			} else {

				$criteria->add(EventPeer::AUTHOR, $this->getId());

				$this->collEventsRelatedByAuthor = EventPeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeer::AUTHOR, $this->getId());

			if (!isset($this->lastEventRelatedByAuthorCriteria) || !$this->lastEventRelatedByAuthorCriteria->equals($criteria)) {
				$this->collEventsRelatedByAuthor = EventPeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastEventRelatedByAuthorCriteria = $criteria;

		return $this->collEventsRelatedByAuthor;
	}

	
	public function initEventsRelatedByUpdatedBy()
	{
		if ($this->collEventsRelatedByUpdatedBy === null) {
			$this->collEventsRelatedByUpdatedBy = array();
		}
	}

	
	public function getEventsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collEventsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(EventPeer::UPDATED_BY, $this->getId());

				EventPeer::addSelectColumns($criteria);
				$this->collEventsRelatedByUpdatedBy = EventPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EventPeer::UPDATED_BY, $this->getId());

				EventPeer::addSelectColumns($criteria);
				if (!isset($this->lastEventRelatedByUpdatedByCriteria) || !$this->lastEventRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collEventsRelatedByUpdatedBy = EventPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastEventRelatedByUpdatedByCriteria = $criteria;
		return $this->collEventsRelatedByUpdatedBy;
	}

	
	public function countEventsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(EventPeer::UPDATED_BY, $this->getId());

		return EventPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEventRelatedByUpdatedBy(Event $l)
	{
		$this->collEventsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getEventsRelatedByUpdatedByJoinArticle($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collEventsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(EventPeer::UPDATED_BY, $this->getId());

				$this->collEventsRelatedByUpdatedBy = EventPeer::doSelectJoinArticle($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastEventRelatedByUpdatedByCriteria) || !$this->lastEventRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collEventsRelatedByUpdatedBy = EventPeer::doSelectJoinArticle($criteria, $con);
			}
		}
		$this->lastEventRelatedByUpdatedByCriteria = $criteria;

		return $this->collEventsRelatedByUpdatedBy;
	}


	
	public function getEventsRelatedByUpdatedByJoinEventType($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collEventsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(EventPeer::UPDATED_BY, $this->getId());

				$this->collEventsRelatedByUpdatedBy = EventPeer::doSelectJoinEventType($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastEventRelatedByUpdatedByCriteria) || !$this->lastEventRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collEventsRelatedByUpdatedBy = EventPeer::doSelectJoinEventType($criteria, $con);
			}
		}
		$this->lastEventRelatedByUpdatedByCriteria = $criteria;

		return $this->collEventsRelatedByUpdatedBy;
	}


	
	public function getEventsRelatedByUpdatedByJoinMultimedia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseEventPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collEventsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collEventsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(EventPeer::UPDATED_BY, $this->getId());

				$this->collEventsRelatedByUpdatedBy = EventPeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastEventRelatedByUpdatedByCriteria) || !$this->lastEventRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collEventsRelatedByUpdatedBy = EventPeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastEventRelatedByUpdatedByCriteria = $criteria;

		return $this->collEventsRelatedByUpdatedBy;
	}

	
	public function initFormsRelatedByCreatedBy()
	{
		if ($this->collFormsRelatedByCreatedBy === null) {
			$this->collFormsRelatedByCreatedBy = array();
		}
	}

	
	public function getFormsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFormPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFormsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collFormsRelatedByCreatedBy = array();
			} else {

				$criteria->add(FormPeer::CREATED_BY, $this->getId());

				FormPeer::addSelectColumns($criteria);
				$this->collFormsRelatedByCreatedBy = FormPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FormPeer::CREATED_BY, $this->getId());

				FormPeer::addSelectColumns($criteria);
				if (!isset($this->lastFormRelatedByCreatedByCriteria) || !$this->lastFormRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collFormsRelatedByCreatedBy = FormPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFormRelatedByCreatedByCriteria = $criteria;
		return $this->collFormsRelatedByCreatedBy;
	}

	
	public function countFormsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFormPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FormPeer::CREATED_BY, $this->getId());

		return FormPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFormRelatedByCreatedBy(Form $l)
	{
		$this->collFormsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}

	
	public function initFormsRelatedByUpdatedBy()
	{
		if ($this->collFormsRelatedByUpdatedBy === null) {
			$this->collFormsRelatedByUpdatedBy = array();
		}
	}

	
	public function getFormsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseFormPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collFormsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collFormsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(FormPeer::UPDATED_BY, $this->getId());

				FormPeer::addSelectColumns($criteria);
				$this->collFormsRelatedByUpdatedBy = FormPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(FormPeer::UPDATED_BY, $this->getId());

				FormPeer::addSelectColumns($criteria);
				if (!isset($this->lastFormRelatedByUpdatedByCriteria) || !$this->lastFormRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collFormsRelatedByUpdatedBy = FormPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastFormRelatedByUpdatedByCriteria = $criteria;
		return $this->collFormsRelatedByUpdatedBy;
	}

	
	public function countFormsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseFormPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(FormPeer::UPDATED_BY, $this->getId());

		return FormPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addFormRelatedByUpdatedBy(Form $l)
	{
		$this->collFormsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}

	
	public function initGallerysRelatedByCreatedBy()
	{
		if ($this->collGallerysRelatedByCreatedBy === null) {
			$this->collGallerysRelatedByCreatedBy = array();
		}
	}

	
	public function getGallerysRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGallerysRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collGallerysRelatedByCreatedBy = array();
			} else {

				$criteria->add(GalleryPeer::CREATED_BY, $this->getId());

				GalleryPeer::addSelectColumns($criteria);
				$this->collGallerysRelatedByCreatedBy = GalleryPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GalleryPeer::CREATED_BY, $this->getId());

				GalleryPeer::addSelectColumns($criteria);
				if (!isset($this->lastGalleryRelatedByCreatedByCriteria) || !$this->lastGalleryRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collGallerysRelatedByCreatedBy = GalleryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGalleryRelatedByCreatedByCriteria = $criteria;
		return $this->collGallerysRelatedByCreatedBy;
	}

	
	public function countGallerysRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(GalleryPeer::CREATED_BY, $this->getId());

		return GalleryPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGalleryRelatedByCreatedBy(Gallery $l)
	{
		$this->collGallerysRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}

	
	public function initGallerysRelatedByUpdatedBy()
	{
		if ($this->collGallerysRelatedByUpdatedBy === null) {
			$this->collGallerysRelatedByUpdatedBy = array();
		}
	}

	
	public function getGallerysRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGallerysRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collGallerysRelatedByUpdatedBy = array();
			} else {

				$criteria->add(GalleryPeer::UPDATED_BY, $this->getId());

				GalleryPeer::addSelectColumns($criteria);
				$this->collGallerysRelatedByUpdatedBy = GalleryPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GalleryPeer::UPDATED_BY, $this->getId());

				GalleryPeer::addSelectColumns($criteria);
				if (!isset($this->lastGalleryRelatedByUpdatedByCriteria) || !$this->lastGalleryRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collGallerysRelatedByUpdatedBy = GalleryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGalleryRelatedByUpdatedByCriteria = $criteria;
		return $this->collGallerysRelatedByUpdatedBy;
	}

	
	public function countGallerysRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(GalleryPeer::UPDATED_BY, $this->getId());

		return GalleryPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGalleryRelatedByUpdatedBy(Gallery $l)
	{
		$this->collGallerysRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}

	
	public function initGallerysRelatedByPublishedBy()
	{
		if ($this->collGallerysRelatedByPublishedBy === null) {
			$this->collGallerysRelatedByPublishedBy = array();
		}
	}

	
	public function getGallerysRelatedByPublishedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collGallerysRelatedByPublishedBy === null) {
			if ($this->isNew()) {
			   $this->collGallerysRelatedByPublishedBy = array();
			} else {

				$criteria->add(GalleryPeer::PUBLISHED_BY, $this->getId());

				GalleryPeer::addSelectColumns($criteria);
				$this->collGallerysRelatedByPublishedBy = GalleryPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(GalleryPeer::PUBLISHED_BY, $this->getId());

				GalleryPeer::addSelectColumns($criteria);
				if (!isset($this->lastGalleryRelatedByPublishedByCriteria) || !$this->lastGalleryRelatedByPublishedByCriteria->equals($criteria)) {
					$this->collGallerysRelatedByPublishedBy = GalleryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastGalleryRelatedByPublishedByCriteria = $criteria;
		return $this->collGallerysRelatedByPublishedBy;
	}

	
	public function countGallerysRelatedByPublishedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(GalleryPeer::PUBLISHED_BY, $this->getId());

		return GalleryPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addGalleryRelatedByPublishedBy(Gallery $l)
	{
		$this->collGallerysRelatedByPublishedBy[] = $l;
		$l->setsfGuardUserRelatedByPublishedBy($this);
	}

	
	public function initArticleGroupsRelatedByCreatedBy()
	{
		if ($this->collArticleGroupsRelatedByCreatedBy === null) {
			$this->collArticleGroupsRelatedByCreatedBy = array();
		}
	}

	
	public function getArticleGroupsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleGroupsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collArticleGroupsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ArticleGroupPeer::CREATED_BY, $this->getId());

				ArticleGroupPeer::addSelectColumns($criteria);
				$this->collArticleGroupsRelatedByCreatedBy = ArticleGroupPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleGroupPeer::CREATED_BY, $this->getId());

				ArticleGroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleGroupRelatedByCreatedByCriteria) || !$this->lastArticleGroupRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collArticleGroupsRelatedByCreatedBy = ArticleGroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleGroupRelatedByCreatedByCriteria = $criteria;
		return $this->collArticleGroupsRelatedByCreatedBy;
	}

	
	public function countArticleGroupsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleGroupPeer::CREATED_BY, $this->getId());

		return ArticleGroupPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleGroupRelatedByCreatedBy(ArticleGroup $l)
	{
		$this->collArticleGroupsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}

	
	public function initArticleGroupsRelatedByUpdatedBy()
	{
		if ($this->collArticleGroupsRelatedByUpdatedBy === null) {
			$this->collArticleGroupsRelatedByUpdatedBy = array();
		}
	}

	
	public function getArticleGroupsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleGroupsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collArticleGroupsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ArticleGroupPeer::UPDATED_BY, $this->getId());

				ArticleGroupPeer::addSelectColumns($criteria);
				$this->collArticleGroupsRelatedByUpdatedBy = ArticleGroupPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleGroupPeer::UPDATED_BY, $this->getId());

				ArticleGroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleGroupRelatedByUpdatedByCriteria) || !$this->lastArticleGroupRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collArticleGroupsRelatedByUpdatedBy = ArticleGroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleGroupRelatedByUpdatedByCriteria = $criteria;
		return $this->collArticleGroupsRelatedByUpdatedBy;
	}

	
	public function countArticleGroupsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleGroupPeer::UPDATED_BY, $this->getId());

		return ArticleGroupPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleGroupRelatedByUpdatedBy(ArticleGroup $l)
	{
		$this->collArticleGroupsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}

	
	public function initLinksRelatedByCreatedBy()
	{
		if ($this->collLinksRelatedByCreatedBy === null) {
			$this->collLinksRelatedByCreatedBy = array();
		}
	}

	
	public function getLinksRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLinksRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collLinksRelatedByCreatedBy = array();
			} else {

				$criteria->add(LinkPeer::CREATED_BY, $this->getId());

				LinkPeer::addSelectColumns($criteria);
				$this->collLinksRelatedByCreatedBy = LinkPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LinkPeer::CREATED_BY, $this->getId());

				LinkPeer::addSelectColumns($criteria);
				if (!isset($this->lastLinkRelatedByCreatedByCriteria) || !$this->lastLinkRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collLinksRelatedByCreatedBy = LinkPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLinkRelatedByCreatedByCriteria = $criteria;
		return $this->collLinksRelatedByCreatedBy;
	}

	
	public function countLinksRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LinkPeer::CREATED_BY, $this->getId());

		return LinkPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLinkRelatedByCreatedBy(Link $l)
	{
		$this->collLinksRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}

	
	public function initLinksRelatedByUpdatedBy()
	{
		if ($this->collLinksRelatedByUpdatedBy === null) {
			$this->collLinksRelatedByUpdatedBy = array();
		}
	}

	
	public function getLinksRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseLinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLinksRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collLinksRelatedByUpdatedBy = array();
			} else {

				$criteria->add(LinkPeer::UPDATED_BY, $this->getId());

				LinkPeer::addSelectColumns($criteria);
				$this->collLinksRelatedByUpdatedBy = LinkPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LinkPeer::UPDATED_BY, $this->getId());

				LinkPeer::addSelectColumns($criteria);
				if (!isset($this->lastLinkRelatedByUpdatedByCriteria) || !$this->lastLinkRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collLinksRelatedByUpdatedBy = LinkPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLinkRelatedByUpdatedByCriteria = $criteria;
		return $this->collLinksRelatedByUpdatedBy;
	}

	
	public function countLinksRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseLinkPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(LinkPeer::UPDATED_BY, $this->getId());

		return LinkPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addLinkRelatedByUpdatedBy(Link $l)
	{
		$this->collLinksRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}

	
	public function initMultimediasRelatedByUploadedBy()
	{
		if ($this->collMultimediasRelatedByUploadedBy === null) {
			$this->collMultimediasRelatedByUploadedBy = array();
		}
	}

	
	public function getMultimediasRelatedByUploadedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMultimediaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMultimediasRelatedByUploadedBy === null) {
			if ($this->isNew()) {
			   $this->collMultimediasRelatedByUploadedBy = array();
			} else {

				$criteria->add(MultimediaPeer::UPLOADED_BY, $this->getId());

				MultimediaPeer::addSelectColumns($criteria);
				$this->collMultimediasRelatedByUploadedBy = MultimediaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MultimediaPeer::UPLOADED_BY, $this->getId());

				MultimediaPeer::addSelectColumns($criteria);
				if (!isset($this->lastMultimediaRelatedByUploadedByCriteria) || !$this->lastMultimediaRelatedByUploadedByCriteria->equals($criteria)) {
					$this->collMultimediasRelatedByUploadedBy = MultimediaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMultimediaRelatedByUploadedByCriteria = $criteria;
		return $this->collMultimediasRelatedByUploadedBy;
	}

	
	public function countMultimediasRelatedByUploadedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMultimediaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MultimediaPeer::UPLOADED_BY, $this->getId());

		return MultimediaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMultimediaRelatedByUploadedBy(Multimedia $l)
	{
		$this->collMultimediasRelatedByUploadedBy[] = $l;
		$l->setsfGuardUserRelatedByUploadedBy($this);
	}

	
	public function initMultimediasRelatedByUpdatedBy()
	{
		if ($this->collMultimediasRelatedByUpdatedBy === null) {
			$this->collMultimediasRelatedByUpdatedBy = array();
		}
	}

	
	public function getMultimediasRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseMultimediaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collMultimediasRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collMultimediasRelatedByUpdatedBy = array();
			} else {

				$criteria->add(MultimediaPeer::UPDATED_BY, $this->getId());

				MultimediaPeer::addSelectColumns($criteria);
				$this->collMultimediasRelatedByUpdatedBy = MultimediaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(MultimediaPeer::UPDATED_BY, $this->getId());

				MultimediaPeer::addSelectColumns($criteria);
				if (!isset($this->lastMultimediaRelatedByUpdatedByCriteria) || !$this->lastMultimediaRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collMultimediasRelatedByUpdatedBy = MultimediaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastMultimediaRelatedByUpdatedByCriteria = $criteria;
		return $this->collMultimediasRelatedByUpdatedBy;
	}

	
	public function countMultimediasRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseMultimediaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(MultimediaPeer::UPDATED_BY, $this->getId());

		return MultimediaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addMultimediaRelatedByUpdatedBy(Multimedia $l)
	{
		$this->collMultimediasRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}

	
	public function initShortcutsRelatedByCreatedBy()
	{
		if ($this->collShortcutsRelatedByCreatedBy === null) {
			$this->collShortcutsRelatedByCreatedBy = array();
		}
	}

	
	public function getShortcutsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShortcutsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collShortcutsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ShortcutPeer::CREATED_BY, $this->getId());

				ShortcutPeer::addSelectColumns($criteria);
				$this->collShortcutsRelatedByCreatedBy = ShortcutPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ShortcutPeer::CREATED_BY, $this->getId());

				ShortcutPeer::addSelectColumns($criteria);
				if (!isset($this->lastShortcutRelatedByCreatedByCriteria) || !$this->lastShortcutRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collShortcutsRelatedByCreatedBy = ShortcutPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastShortcutRelatedByCreatedByCriteria = $criteria;
		return $this->collShortcutsRelatedByCreatedBy;
	}

	
	public function countShortcutsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ShortcutPeer::CREATED_BY, $this->getId());

		return ShortcutPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addShortcutRelatedByCreatedBy(Shortcut $l)
	{
		$this->collShortcutsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}


	
	public function getShortcutsRelatedByCreatedByJoinMultimedia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShortcutsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collShortcutsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ShortcutPeer::CREATED_BY, $this->getId());

				$this->collShortcutsRelatedByCreatedBy = ShortcutPeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(ShortcutPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastShortcutRelatedByCreatedByCriteria) || !$this->lastShortcutRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collShortcutsRelatedByCreatedBy = ShortcutPeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastShortcutRelatedByCreatedByCriteria = $criteria;

		return $this->collShortcutsRelatedByCreatedBy;
	}


	
	public function getShortcutsRelatedByCreatedByJoinContainerSlotlet($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShortcutsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
				$this->collShortcutsRelatedByCreatedBy = array();
			} else {

				$criteria->add(ShortcutPeer::CREATED_BY, $this->getId());

				$this->collShortcutsRelatedByCreatedBy = ShortcutPeer::doSelectJoinContainerSlotlet($criteria, $con);
			}
		} else {
									
			$criteria->add(ShortcutPeer::CREATED_BY, $this->getId());

			if (!isset($this->lastShortcutRelatedByCreatedByCriteria) || !$this->lastShortcutRelatedByCreatedByCriteria->equals($criteria)) {
				$this->collShortcutsRelatedByCreatedBy = ShortcutPeer::doSelectJoinContainerSlotlet($criteria, $con);
			}
		}
		$this->lastShortcutRelatedByCreatedByCriteria = $criteria;

		return $this->collShortcutsRelatedByCreatedBy;
	}

	
	public function initShortcutsRelatedByUpdatedBy()
	{
		if ($this->collShortcutsRelatedByUpdatedBy === null) {
			$this->collShortcutsRelatedByUpdatedBy = array();
		}
	}

	
	public function getShortcutsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShortcutsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collShortcutsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ShortcutPeer::UPDATED_BY, $this->getId());

				ShortcutPeer::addSelectColumns($criteria);
				$this->collShortcutsRelatedByUpdatedBy = ShortcutPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ShortcutPeer::UPDATED_BY, $this->getId());

				ShortcutPeer::addSelectColumns($criteria);
				if (!isset($this->lastShortcutRelatedByUpdatedByCriteria) || !$this->lastShortcutRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collShortcutsRelatedByUpdatedBy = ShortcutPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastShortcutRelatedByUpdatedByCriteria = $criteria;
		return $this->collShortcutsRelatedByUpdatedBy;
	}

	
	public function countShortcutsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ShortcutPeer::UPDATED_BY, $this->getId());

		return ShortcutPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addShortcutRelatedByUpdatedBy(Shortcut $l)
	{
		$this->collShortcutsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


	
	public function getShortcutsRelatedByUpdatedByJoinMultimedia($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShortcutsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collShortcutsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ShortcutPeer::UPDATED_BY, $this->getId());

				$this->collShortcutsRelatedByUpdatedBy = ShortcutPeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(ShortcutPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastShortcutRelatedByUpdatedByCriteria) || !$this->lastShortcutRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collShortcutsRelatedByUpdatedBy = ShortcutPeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastShortcutRelatedByUpdatedByCriteria = $criteria;

		return $this->collShortcutsRelatedByUpdatedBy;
	}


	
	public function getShortcutsRelatedByUpdatedByJoinContainerSlotlet($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseShortcutPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collShortcutsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
				$this->collShortcutsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(ShortcutPeer::UPDATED_BY, $this->getId());

				$this->collShortcutsRelatedByUpdatedBy = ShortcutPeer::doSelectJoinContainerSlotlet($criteria, $con);
			}
		} else {
									
			$criteria->add(ShortcutPeer::UPDATED_BY, $this->getId());

			if (!isset($this->lastShortcutRelatedByUpdatedByCriteria) || !$this->lastShortcutRelatedByUpdatedByCriteria->equals($criteria)) {
				$this->collShortcutsRelatedByUpdatedBy = ShortcutPeer::doSelectJoinContainerSlotlet($criteria, $con);
			}
		}
		$this->lastShortcutRelatedByUpdatedByCriteria = $criteria;

		return $this->collShortcutsRelatedByUpdatedBy;
	}

	
	public function initTemplatesRelatedByCreatedBy()
	{
		if ($this->collTemplatesRelatedByCreatedBy === null) {
			$this->collTemplatesRelatedByCreatedBy = array();
		}
	}

	
	public function getTemplatesRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTemplatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTemplatesRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collTemplatesRelatedByCreatedBy = array();
			} else {

				$criteria->add(TemplatePeer::CREATED_BY, $this->getId());

				TemplatePeer::addSelectColumns($criteria);
				$this->collTemplatesRelatedByCreatedBy = TemplatePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TemplatePeer::CREATED_BY, $this->getId());

				TemplatePeer::addSelectColumns($criteria);
				if (!isset($this->lastTemplateRelatedByCreatedByCriteria) || !$this->lastTemplateRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collTemplatesRelatedByCreatedBy = TemplatePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTemplateRelatedByCreatedByCriteria = $criteria;
		return $this->collTemplatesRelatedByCreatedBy;
	}

	
	public function countTemplatesRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTemplatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TemplatePeer::CREATED_BY, $this->getId());

		return TemplatePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTemplateRelatedByCreatedBy(Template $l)
	{
		$this->collTemplatesRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}

	
	public function initTemplatesRelatedByUpdatedBy()
	{
		if ($this->collTemplatesRelatedByUpdatedBy === null) {
			$this->collTemplatesRelatedByUpdatedBy = array();
		}
	}

	
	public function getTemplatesRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseTemplatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collTemplatesRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collTemplatesRelatedByUpdatedBy = array();
			} else {

				$criteria->add(TemplatePeer::UPDATED_BY, $this->getId());

				TemplatePeer::addSelectColumns($criteria);
				$this->collTemplatesRelatedByUpdatedBy = TemplatePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(TemplatePeer::UPDATED_BY, $this->getId());

				TemplatePeer::addSelectColumns($criteria);
				if (!isset($this->lastTemplateRelatedByUpdatedByCriteria) || !$this->lastTemplateRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collTemplatesRelatedByUpdatedBy = TemplatePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastTemplateRelatedByUpdatedByCriteria = $criteria;
		return $this->collTemplatesRelatedByUpdatedBy;
	}

	
	public function countTemplatesRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseTemplatePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(TemplatePeer::UPDATED_BY, $this->getId());

		return TemplatePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addTemplateRelatedByUpdatedBy(Template $l)
	{
		$this->collTemplatesRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}

	
	public function initRssChannelsRelatedByCreatedBy()
	{
		if ($this->collRssChannelsRelatedByCreatedBy === null) {
			$this->collRssChannelsRelatedByCreatedBy = array();
		}
	}

	
	public function getRssChannelsRelatedByCreatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRssChannelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRssChannelsRelatedByCreatedBy === null) {
			if ($this->isNew()) {
			   $this->collRssChannelsRelatedByCreatedBy = array();
			} else {

				$criteria->add(RssChannelPeer::CREATED_BY, $this->getId());

				RssChannelPeer::addSelectColumns($criteria);
				$this->collRssChannelsRelatedByCreatedBy = RssChannelPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RssChannelPeer::CREATED_BY, $this->getId());

				RssChannelPeer::addSelectColumns($criteria);
				if (!isset($this->lastRssChannelRelatedByCreatedByCriteria) || !$this->lastRssChannelRelatedByCreatedByCriteria->equals($criteria)) {
					$this->collRssChannelsRelatedByCreatedBy = RssChannelPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRssChannelRelatedByCreatedByCriteria = $criteria;
		return $this->collRssChannelsRelatedByCreatedBy;
	}

	
	public function countRssChannelsRelatedByCreatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRssChannelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RssChannelPeer::CREATED_BY, $this->getId());

		return RssChannelPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRssChannelRelatedByCreatedBy(RssChannel $l)
	{
		$this->collRssChannelsRelatedByCreatedBy[] = $l;
		$l->setsfGuardUserRelatedByCreatedBy($this);
	}

	
	public function initRssChannelsRelatedByUpdatedBy()
	{
		if ($this->collRssChannelsRelatedByUpdatedBy === null) {
			$this->collRssChannelsRelatedByUpdatedBy = array();
		}
	}

	
	public function getRssChannelsRelatedByUpdatedBy($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseRssChannelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRssChannelsRelatedByUpdatedBy === null) {
			if ($this->isNew()) {
			   $this->collRssChannelsRelatedByUpdatedBy = array();
			} else {

				$criteria->add(RssChannelPeer::UPDATED_BY, $this->getId());

				RssChannelPeer::addSelectColumns($criteria);
				$this->collRssChannelsRelatedByUpdatedBy = RssChannelPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RssChannelPeer::UPDATED_BY, $this->getId());

				RssChannelPeer::addSelectColumns($criteria);
				if (!isset($this->lastRssChannelRelatedByUpdatedByCriteria) || !$this->lastRssChannelRelatedByUpdatedByCriteria->equals($criteria)) {
					$this->collRssChannelsRelatedByUpdatedBy = RssChannelPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRssChannelRelatedByUpdatedByCriteria = $criteria;
		return $this->collRssChannelsRelatedByUpdatedBy;
	}

	
	public function countRssChannelsRelatedByUpdatedBy($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseRssChannelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(RssChannelPeer::UPDATED_BY, $this->getId());

		return RssChannelPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addRssChannelRelatedByUpdatedBy(RssChannel $l)
	{
		$this->collRssChannelsRelatedByUpdatedBy[] = $l;
		$l->setsfGuardUserRelatedByUpdatedBy($this);
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BasesfGuardUser:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BasesfGuardUser::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 