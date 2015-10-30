<?php


abstract class BaseArticle extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $type;


	
	protected $name;


	
	protected $title;


	
	protected $heading;


	
	protected $comment;


	
	protected $description;


	
	protected $upper_description;


	
	protected $body;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $created_by;


	
	protected $updated_by;


	
	protected $is_published;


	
	protected $is_archived;


	
	protected $published_at;


	
	protected $archived_at;


	
	protected $signature;


	
	protected $contact;


	
	protected $zoomable_multimedia;


	
	protected $multimedia_id;


	
	protected $main_gallery_id;


	
	protected $link_id;


	
	protected $source_id;


	
	protected $section_id;


	
	protected $reference;


	
	protected $reference_type = 0;


	
	protected $open_reference_new_window = 0;


	
	protected $times_read;


	
	protected $rating;


	
	protected $open_as_popup = 0;


	
	protected $auto_publish_at;


	
	protected $auto_unpublish_at;

	
	protected $asfGuardUserRelatedByCreatedBy;

	
	protected $asfGuardUserRelatedByUpdatedBy;

	
	protected $aMultimedia;

	
	protected $aGallery;

	
	protected $aLink;

	
	protected $aSource;

	
	protected $aSection;

	
	protected $collArticleArticlesRelatedByArticleRefererId;

	
	protected $lastArticleArticleRelatedByArticleRefererIdCriteria = null;

	
	protected $collArticleArticlesRelatedByArticleRefereeId;

	
	protected $lastArticleArticleRelatedByArticleRefereeIdCriteria = null;

	
	protected $collArticleArticleGroups;

	
	protected $lastArticleArticleGroupCriteria = null;

	
	protected $collArticleDocuments;

	
	protected $lastArticleDocumentCriteria = null;

	
	protected $collArticleForms;

	
	protected $lastArticleFormCriteria = null;

	
	protected $collArticleGallerys;

	
	protected $lastArticleGalleryCriteria = null;

	
	protected $collArticleLinkGroups;

	
	protected $lastArticleLinkGroupCriteria = null;

	
	protected $collArticleMultimedias;

	
	protected $lastArticleMultimediaCriteria = null;

	
	protected $collArticleRssChannels;

	
	protected $lastArticleRssChannelCriteria = null;

	
	protected $collArticleSections;

	
	protected $lastArticleSectionCriteria = null;

	
	protected $collArticleTags;

	
	protected $lastArticleTagCriteria = null;

	
	protected $collEvents;

	
	protected $lastEventCriteria = null;

	
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

	
	public function getType()
	{

		return $this->type;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getTitle()
	{

		return $this->title;
	}

	
	public function getHeading()
	{

		return $this->heading;
	}

	
	public function getComment()
	{

		return $this->comment;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function getUpperDescription()
	{

		return $this->upper_description;
	}

	
	public function getBody()
	{

		return $this->body;
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

	
	public function getIsPublished()
	{

		return $this->is_published;
	}

	
	public function getIsArchived()
	{

		return $this->is_archived;
	}

	
	public function getPublishedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->published_at === null || $this->published_at === '') {
			return null;
		} elseif (!is_int($this->published_at)) {
						$ts = strtotime($this->published_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [published_at] as date/time value: " . var_export($this->published_at, true));
			}
		} else {
			$ts = $this->published_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getArchivedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->archived_at === null || $this->archived_at === '') {
			return null;
		} elseif (!is_int($this->archived_at)) {
						$ts = strtotime($this->archived_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [archived_at] as date/time value: " . var_export($this->archived_at, true));
			}
		} else {
			$ts = $this->archived_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getSignature()
	{

		return $this->signature;
	}

	
	public function getContact()
	{

		return $this->contact;
	}

	
	public function getZoomableMultimedia()
	{

		return $this->zoomable_multimedia;
	}

	
	public function getMultimediaId()
	{

		return $this->multimedia_id;
	}

	
	public function getMainGalleryId()
	{

		return $this->main_gallery_id;
	}

	
	public function getLinkId()
	{

		return $this->link_id;
	}

	
	public function getSourceId()
	{

		return $this->source_id;
	}

	
	public function getSectionId()
	{

		return $this->section_id;
	}

	
	public function getReference()
	{

		return $this->reference;
	}

	
	public function getReferenceType()
	{

		return $this->reference_type;
	}

	
	public function getOpenReferenceNewWindow()
	{

		return $this->open_reference_new_window;
	}

	
	public function getTimesRead()
	{

		return $this->times_read;
	}

	
	public function getRating()
	{

		return $this->rating;
	}

	
	public function getOpenAsPopup()
	{

		return $this->open_as_popup;
	}

	
	public function getAutoPublishAt($format = 'Y-m-d H:i:s')
	{

		if ($this->auto_publish_at === null || $this->auto_publish_at === '') {
			return null;
		} elseif (!is_int($this->auto_publish_at)) {
						$ts = strtotime($this->auto_publish_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [auto_publish_at] as date/time value: " . var_export($this->auto_publish_at, true));
			}
		} else {
			$ts = $this->auto_publish_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getAutoUnpublishAt($format = 'Y-m-d H:i:s')
	{

		if ($this->auto_unpublish_at === null || $this->auto_unpublish_at === '') {
			return null;
		} elseif (!is_int($this->auto_unpublish_at)) {
						$ts = strtotime($this->auto_unpublish_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [auto_unpublish_at] as date/time value: " . var_export($this->auto_unpublish_at, true));
			}
		} else {
			$ts = $this->auto_unpublish_at;
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
			$this->modifiedColumns[] = ArticlePeer::ID;
		}

	} 
	
	public function setType($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->type !== $v) {
			$this->type = $v;
			$this->modifiedColumns[] = ArticlePeer::TYPE;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = ArticlePeer::NAME;
		}

	} 
	
	public function setTitle($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->title !== $v) {
			$this->title = $v;
			$this->modifiedColumns[] = ArticlePeer::TITLE;
		}

	} 
	
	public function setHeading($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->heading !== $v) {
			$this->heading = $v;
			$this->modifiedColumns[] = ArticlePeer::HEADING;
		}

	} 
	
	public function setComment($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->comment !== $v) {
			$this->comment = $v;
			$this->modifiedColumns[] = ArticlePeer::COMMENT;
		}

	} 
	
	public function setDescription($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = ArticlePeer::DESCRIPTION;
		}

	} 
	
	public function setUpperDescription($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->upper_description !== $v) {
			$this->upper_description = $v;
			$this->modifiedColumns[] = ArticlePeer::UPPER_DESCRIPTION;
		}

	} 
	
	public function setBody($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->body !== $v) {
			$this->body = $v;
			$this->modifiedColumns[] = ArticlePeer::BODY;
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
			$this->modifiedColumns[] = ArticlePeer::CREATED_AT;
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
			$this->modifiedColumns[] = ArticlePeer::UPDATED_AT;
		}

	} 
	
	public function setCreatedBy($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[] = ArticlePeer::CREATED_BY;
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
			$this->modifiedColumns[] = ArticlePeer::UPDATED_BY;
		}

		if ($this->asfGuardUserRelatedByUpdatedBy !== null && $this->asfGuardUserRelatedByUpdatedBy->getId() !== $v) {
			$this->asfGuardUserRelatedByUpdatedBy = null;
		}

	} 
	
	public function setIsPublished($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_published !== $v) {
			$this->is_published = $v;
			$this->modifiedColumns[] = ArticlePeer::IS_PUBLISHED;
		}

	} 
	
	public function setIsArchived($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_archived !== $v) {
			$this->is_archived = $v;
			$this->modifiedColumns[] = ArticlePeer::IS_ARCHIVED;
		}

	} 
	
	public function setPublishedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [published_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->published_at !== $ts) {
			$this->published_at = $ts;
			$this->modifiedColumns[] = ArticlePeer::PUBLISHED_AT;
		}

	} 
	
	public function setArchivedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [archived_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->archived_at !== $ts) {
			$this->archived_at = $ts;
			$this->modifiedColumns[] = ArticlePeer::ARCHIVED_AT;
		}

	} 
	
	public function setSignature($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->signature !== $v) {
			$this->signature = $v;
			$this->modifiedColumns[] = ArticlePeer::SIGNATURE;
		}

	} 
	
	public function setContact($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->contact !== $v) {
			$this->contact = $v;
			$this->modifiedColumns[] = ArticlePeer::CONTACT;
		}

	} 
	
	public function setZoomableMultimedia($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->zoomable_multimedia !== $v) {
			$this->zoomable_multimedia = $v;
			$this->modifiedColumns[] = ArticlePeer::ZOOMABLE_MULTIMEDIA;
		}

	} 
	
	public function setMultimediaId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->multimedia_id !== $v) {
			$this->multimedia_id = $v;
			$this->modifiedColumns[] = ArticlePeer::MULTIMEDIA_ID;
		}

		if ($this->aMultimedia !== null && $this->aMultimedia->getId() !== $v) {
			$this->aMultimedia = null;
		}

	} 
	
	public function setMainGalleryId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->main_gallery_id !== $v) {
			$this->main_gallery_id = $v;
			$this->modifiedColumns[] = ArticlePeer::MAIN_GALLERY_ID;
		}

		if ($this->aGallery !== null && $this->aGallery->getId() !== $v) {
			$this->aGallery = null;
		}

	} 
	
	public function setLinkId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->link_id !== $v) {
			$this->link_id = $v;
			$this->modifiedColumns[] = ArticlePeer::LINK_ID;
		}

		if ($this->aLink !== null && $this->aLink->getId() !== $v) {
			$this->aLink = null;
		}

	} 
	
	public function setSourceId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->source_id !== $v) {
			$this->source_id = $v;
			$this->modifiedColumns[] = ArticlePeer::SOURCE_ID;
		}

		if ($this->aSource !== null && $this->aSource->getId() !== $v) {
			$this->aSource = null;
		}

	} 
	
	public function setSectionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->section_id !== $v) {
			$this->section_id = $v;
			$this->modifiedColumns[] = ArticlePeer::SECTION_ID;
		}

		if ($this->aSection !== null && $this->aSection->getId() !== $v) {
			$this->aSection = null;
		}

	} 
	
	public function setReference($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->reference !== $v) {
			$this->reference = $v;
			$this->modifiedColumns[] = ArticlePeer::REFERENCE;
		}

	} 
	
	public function setReferenceType($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->reference_type !== $v || $v === 0) {
			$this->reference_type = $v;
			$this->modifiedColumns[] = ArticlePeer::REFERENCE_TYPE;
		}

	} 
	
	public function setOpenReferenceNewWindow($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->open_reference_new_window !== $v || $v === 0) {
			$this->open_reference_new_window = $v;
			$this->modifiedColumns[] = ArticlePeer::OPEN_REFERENCE_NEW_WINDOW;
		}

	} 
	
	public function setTimesRead($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->times_read !== $v) {
			$this->times_read = $v;
			$this->modifiedColumns[] = ArticlePeer::TIMES_READ;
		}

	} 
	
	public function setRating($v)
	{

		if ($this->rating !== $v) {
			$this->rating = $v;
			$this->modifiedColumns[] = ArticlePeer::RATING;
		}

	} 
	
	public function setOpenAsPopup($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->open_as_popup !== $v || $v === 0) {
			$this->open_as_popup = $v;
			$this->modifiedColumns[] = ArticlePeer::OPEN_AS_POPUP;
		}

	} 
	
	public function setAutoPublishAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [auto_publish_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->auto_publish_at !== $ts) {
			$this->auto_publish_at = $ts;
			$this->modifiedColumns[] = ArticlePeer::AUTO_PUBLISH_AT;
		}

	} 
	
	public function setAutoUnpublishAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [auto_unpublish_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->auto_unpublish_at !== $ts) {
			$this->auto_unpublish_at = $ts;
			$this->modifiedColumns[] = ArticlePeer::AUTO_UNPUBLISH_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->type = $rs->getInt($startcol + 1);

			$this->name = $rs->getString($startcol + 2);

			$this->title = $rs->getString($startcol + 3);

			$this->heading = $rs->getString($startcol + 4);

			$this->comment = $rs->getString($startcol + 5);

			$this->description = $rs->getString($startcol + 6);

			$this->upper_description = $rs->getString($startcol + 7);

			$this->body = $rs->getString($startcol + 8);

			$this->created_at = $rs->getTimestamp($startcol + 9, null);

			$this->updated_at = $rs->getTimestamp($startcol + 10, null);

			$this->created_by = $rs->getInt($startcol + 11);

			$this->updated_by = $rs->getInt($startcol + 12);

			$this->is_published = $rs->getInt($startcol + 13);

			$this->is_archived = $rs->getInt($startcol + 14);

			$this->published_at = $rs->getTimestamp($startcol + 15, null);

			$this->archived_at = $rs->getTimestamp($startcol + 16, null);

			$this->signature = $rs->getString($startcol + 17);

			$this->contact = $rs->getString($startcol + 18);

			$this->zoomable_multimedia = $rs->getInt($startcol + 19);

			$this->multimedia_id = $rs->getInt($startcol + 20);

			$this->main_gallery_id = $rs->getInt($startcol + 21);

			$this->link_id = $rs->getInt($startcol + 22);

			$this->source_id = $rs->getInt($startcol + 23);

			$this->section_id = $rs->getInt($startcol + 24);

			$this->reference = $rs->getString($startcol + 25);

			$this->reference_type = $rs->getInt($startcol + 26);

			$this->open_reference_new_window = $rs->getInt($startcol + 27);

			$this->times_read = $rs->getString($startcol + 28);

			$this->rating = $rs->getFloat($startcol + 29);

			$this->open_as_popup = $rs->getInt($startcol + 30);

			$this->auto_publish_at = $rs->getTimestamp($startcol + 31, null);

			$this->auto_unpublish_at = $rs->getTimestamp($startcol + 32, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 33; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Article object", $e);
		}
	}

	
	public function delete($con = null)
	{

    foreach (sfMixer::getCallables('BaseArticle:delete:pre') as $callable)
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
			$con = Propel::getConnection(ArticlePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			ArticlePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	

    foreach (sfMixer::getCallables('BaseArticle:delete:post') as $callable)
    {
      call_user_func($callable, $this, $con);
    }

  }
	
	public function save($con = null)
	{

    foreach (sfMixer::getCallables('BaseArticle:save:pre') as $callable)
    {
      $affectedRows = call_user_func($callable, $this, $con);
      if (is_int($affectedRows))
      {
        return $affectedRows;
      }
    }


    if ($this->isNew() && !$this->isColumnModified(ArticlePeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(ArticlePeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ArticlePeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
    foreach (sfMixer::getCallables('BaseArticle:save:post') as $callable)
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

			if ($this->aLink !== null) {
				if ($this->aLink->isModified()) {
					$affectedRows += $this->aLink->save($con);
				}
				$this->setLink($this->aLink);
			}

			if ($this->aSource !== null) {
				if ($this->aSource->isModified()) {
					$affectedRows += $this->aSource->save($con);
				}
				$this->setSource($this->aSource);
			}

			if ($this->aSection !== null) {
				if ($this->aSection->isModified()) {
					$affectedRows += $this->aSection->save($con);
				}
				$this->setSection($this->aSection);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ArticlePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ArticlePeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collArticleArticlesRelatedByArticleRefererId !== null) {
				foreach($this->collArticleArticlesRelatedByArticleRefererId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticleArticlesRelatedByArticleRefereeId !== null) {
				foreach($this->collArticleArticlesRelatedByArticleRefereeId as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticleArticleGroups !== null) {
				foreach($this->collArticleArticleGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticleDocuments !== null) {
				foreach($this->collArticleDocuments as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticleForms !== null) {
				foreach($this->collArticleForms as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticleGallerys !== null) {
				foreach($this->collArticleGallerys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticleLinkGroups !== null) {
				foreach($this->collArticleLinkGroups as $referrerFK) {
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

			if ($this->collArticleRssChannels !== null) {
				foreach($this->collArticleRssChannels as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticleSections !== null) {
				foreach($this->collArticleSections as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collArticleTags !== null) {
				foreach($this->collArticleTags as $referrerFK) {
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

			if ($this->aLink !== null) {
				if (!$this->aLink->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLink->getValidationFailures());
				}
			}

			if ($this->aSource !== null) {
				if (!$this->aSource->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSource->getValidationFailures());
				}
			}

			if ($this->aSection !== null) {
				if (!$this->aSection->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSection->getValidationFailures());
				}
			}


			if (($retval = ArticlePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collArticleArticlesRelatedByArticleRefererId !== null) {
					foreach($this->collArticleArticlesRelatedByArticleRefererId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticleArticlesRelatedByArticleRefereeId !== null) {
					foreach($this->collArticleArticlesRelatedByArticleRefereeId as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticleArticleGroups !== null) {
					foreach($this->collArticleArticleGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticleDocuments !== null) {
					foreach($this->collArticleDocuments as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticleForms !== null) {
					foreach($this->collArticleForms as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticleGallerys !== null) {
					foreach($this->collArticleGallerys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticleLinkGroups !== null) {
					foreach($this->collArticleLinkGroups as $referrerFK) {
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

				if ($this->collArticleRssChannels !== null) {
					foreach($this->collArticleRssChannels as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticleSections !== null) {
					foreach($this->collArticleSections as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collArticleTags !== null) {
					foreach($this->collArticleTags as $referrerFK) {
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
		$pos = ArticlePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getName();
				break;
			case 3:
				return $this->getTitle();
				break;
			case 4:
				return $this->getHeading();
				break;
			case 5:
				return $this->getComment();
				break;
			case 6:
				return $this->getDescription();
				break;
			case 7:
				return $this->getUpperDescription();
				break;
			case 8:
				return $this->getBody();
				break;
			case 9:
				return $this->getCreatedAt();
				break;
			case 10:
				return $this->getUpdatedAt();
				break;
			case 11:
				return $this->getCreatedBy();
				break;
			case 12:
				return $this->getUpdatedBy();
				break;
			case 13:
				return $this->getIsPublished();
				break;
			case 14:
				return $this->getIsArchived();
				break;
			case 15:
				return $this->getPublishedAt();
				break;
			case 16:
				return $this->getArchivedAt();
				break;
			case 17:
				return $this->getSignature();
				break;
			case 18:
				return $this->getContact();
				break;
			case 19:
				return $this->getZoomableMultimedia();
				break;
			case 20:
				return $this->getMultimediaId();
				break;
			case 21:
				return $this->getMainGalleryId();
				break;
			case 22:
				return $this->getLinkId();
				break;
			case 23:
				return $this->getSourceId();
				break;
			case 24:
				return $this->getSectionId();
				break;
			case 25:
				return $this->getReference();
				break;
			case 26:
				return $this->getReferenceType();
				break;
			case 27:
				return $this->getOpenReferenceNewWindow();
				break;
			case 28:
				return $this->getTimesRead();
				break;
			case 29:
				return $this->getRating();
				break;
			case 30:
				return $this->getOpenAsPopup();
				break;
			case 31:
				return $this->getAutoPublishAt();
				break;
			case 32:
				return $this->getAutoUnpublishAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArticlePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getType(),
			$keys[2] => $this->getName(),
			$keys[3] => $this->getTitle(),
			$keys[4] => $this->getHeading(),
			$keys[5] => $this->getComment(),
			$keys[6] => $this->getDescription(),
			$keys[7] => $this->getUpperDescription(),
			$keys[8] => $this->getBody(),
			$keys[9] => $this->getCreatedAt(),
			$keys[10] => $this->getUpdatedAt(),
			$keys[11] => $this->getCreatedBy(),
			$keys[12] => $this->getUpdatedBy(),
			$keys[13] => $this->getIsPublished(),
			$keys[14] => $this->getIsArchived(),
			$keys[15] => $this->getPublishedAt(),
			$keys[16] => $this->getArchivedAt(),
			$keys[17] => $this->getSignature(),
			$keys[18] => $this->getContact(),
			$keys[19] => $this->getZoomableMultimedia(),
			$keys[20] => $this->getMultimediaId(),
			$keys[21] => $this->getMainGalleryId(),
			$keys[22] => $this->getLinkId(),
			$keys[23] => $this->getSourceId(),
			$keys[24] => $this->getSectionId(),
			$keys[25] => $this->getReference(),
			$keys[26] => $this->getReferenceType(),
			$keys[27] => $this->getOpenReferenceNewWindow(),
			$keys[28] => $this->getTimesRead(),
			$keys[29] => $this->getRating(),
			$keys[30] => $this->getOpenAsPopup(),
			$keys[31] => $this->getAutoPublishAt(),
			$keys[32] => $this->getAutoUnpublishAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ArticlePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setName($value);
				break;
			case 3:
				$this->setTitle($value);
				break;
			case 4:
				$this->setHeading($value);
				break;
			case 5:
				$this->setComment($value);
				break;
			case 6:
				$this->setDescription($value);
				break;
			case 7:
				$this->setUpperDescription($value);
				break;
			case 8:
				$this->setBody($value);
				break;
			case 9:
				$this->setCreatedAt($value);
				break;
			case 10:
				$this->setUpdatedAt($value);
				break;
			case 11:
				$this->setCreatedBy($value);
				break;
			case 12:
				$this->setUpdatedBy($value);
				break;
			case 13:
				$this->setIsPublished($value);
				break;
			case 14:
				$this->setIsArchived($value);
				break;
			case 15:
				$this->setPublishedAt($value);
				break;
			case 16:
				$this->setArchivedAt($value);
				break;
			case 17:
				$this->setSignature($value);
				break;
			case 18:
				$this->setContact($value);
				break;
			case 19:
				$this->setZoomableMultimedia($value);
				break;
			case 20:
				$this->setMultimediaId($value);
				break;
			case 21:
				$this->setMainGalleryId($value);
				break;
			case 22:
				$this->setLinkId($value);
				break;
			case 23:
				$this->setSourceId($value);
				break;
			case 24:
				$this->setSectionId($value);
				break;
			case 25:
				$this->setReference($value);
				break;
			case 26:
				$this->setReferenceType($value);
				break;
			case 27:
				$this->setOpenReferenceNewWindow($value);
				break;
			case 28:
				$this->setTimesRead($value);
				break;
			case 29:
				$this->setRating($value);
				break;
			case 30:
				$this->setOpenAsPopup($value);
				break;
			case 31:
				$this->setAutoPublishAt($value);
				break;
			case 32:
				$this->setAutoUnpublishAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ArticlePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setType($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setName($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTitle($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setHeading($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setComment($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDescription($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpperDescription($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setBody($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setCreatedBy($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setUpdatedBy($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setIsPublished($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setIsArchived($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setPublishedAt($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setArchivedAt($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setSignature($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setContact($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setZoomableMultimedia($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setMultimediaId($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setMainGalleryId($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setLinkId($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setSourceId($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setSectionId($arr[$keys[24]]);
		if (array_key_exists($keys[25], $arr)) $this->setReference($arr[$keys[25]]);
		if (array_key_exists($keys[26], $arr)) $this->setReferenceType($arr[$keys[26]]);
		if (array_key_exists($keys[27], $arr)) $this->setOpenReferenceNewWindow($arr[$keys[27]]);
		if (array_key_exists($keys[28], $arr)) $this->setTimesRead($arr[$keys[28]]);
		if (array_key_exists($keys[29], $arr)) $this->setRating($arr[$keys[29]]);
		if (array_key_exists($keys[30], $arr)) $this->setOpenAsPopup($arr[$keys[30]]);
		if (array_key_exists($keys[31], $arr)) $this->setAutoPublishAt($arr[$keys[31]]);
		if (array_key_exists($keys[32], $arr)) $this->setAutoUnpublishAt($arr[$keys[32]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ArticlePeer::DATABASE_NAME);

		if ($this->isColumnModified(ArticlePeer::ID)) $criteria->add(ArticlePeer::ID, $this->id);
		if ($this->isColumnModified(ArticlePeer::TYPE)) $criteria->add(ArticlePeer::TYPE, $this->type);
		if ($this->isColumnModified(ArticlePeer::NAME)) $criteria->add(ArticlePeer::NAME, $this->name);
		if ($this->isColumnModified(ArticlePeer::TITLE)) $criteria->add(ArticlePeer::TITLE, $this->title);
		if ($this->isColumnModified(ArticlePeer::HEADING)) $criteria->add(ArticlePeer::HEADING, $this->heading);
		if ($this->isColumnModified(ArticlePeer::COMMENT)) $criteria->add(ArticlePeer::COMMENT, $this->comment);
		if ($this->isColumnModified(ArticlePeer::DESCRIPTION)) $criteria->add(ArticlePeer::DESCRIPTION, $this->description);
		if ($this->isColumnModified(ArticlePeer::UPPER_DESCRIPTION)) $criteria->add(ArticlePeer::UPPER_DESCRIPTION, $this->upper_description);
		if ($this->isColumnModified(ArticlePeer::BODY)) $criteria->add(ArticlePeer::BODY, $this->body);
		if ($this->isColumnModified(ArticlePeer::CREATED_AT)) $criteria->add(ArticlePeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(ArticlePeer::UPDATED_AT)) $criteria->add(ArticlePeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(ArticlePeer::CREATED_BY)) $criteria->add(ArticlePeer::CREATED_BY, $this->created_by);
		if ($this->isColumnModified(ArticlePeer::UPDATED_BY)) $criteria->add(ArticlePeer::UPDATED_BY, $this->updated_by);
		if ($this->isColumnModified(ArticlePeer::IS_PUBLISHED)) $criteria->add(ArticlePeer::IS_PUBLISHED, $this->is_published);
		if ($this->isColumnModified(ArticlePeer::IS_ARCHIVED)) $criteria->add(ArticlePeer::IS_ARCHIVED, $this->is_archived);
		if ($this->isColumnModified(ArticlePeer::PUBLISHED_AT)) $criteria->add(ArticlePeer::PUBLISHED_AT, $this->published_at);
		if ($this->isColumnModified(ArticlePeer::ARCHIVED_AT)) $criteria->add(ArticlePeer::ARCHIVED_AT, $this->archived_at);
		if ($this->isColumnModified(ArticlePeer::SIGNATURE)) $criteria->add(ArticlePeer::SIGNATURE, $this->signature);
		if ($this->isColumnModified(ArticlePeer::CONTACT)) $criteria->add(ArticlePeer::CONTACT, $this->contact);
		if ($this->isColumnModified(ArticlePeer::ZOOMABLE_MULTIMEDIA)) $criteria->add(ArticlePeer::ZOOMABLE_MULTIMEDIA, $this->zoomable_multimedia);
		if ($this->isColumnModified(ArticlePeer::MULTIMEDIA_ID)) $criteria->add(ArticlePeer::MULTIMEDIA_ID, $this->multimedia_id);
		if ($this->isColumnModified(ArticlePeer::MAIN_GALLERY_ID)) $criteria->add(ArticlePeer::MAIN_GALLERY_ID, $this->main_gallery_id);
		if ($this->isColumnModified(ArticlePeer::LINK_ID)) $criteria->add(ArticlePeer::LINK_ID, $this->link_id);
		if ($this->isColumnModified(ArticlePeer::SOURCE_ID)) $criteria->add(ArticlePeer::SOURCE_ID, $this->source_id);
		if ($this->isColumnModified(ArticlePeer::SECTION_ID)) $criteria->add(ArticlePeer::SECTION_ID, $this->section_id);
		if ($this->isColumnModified(ArticlePeer::REFERENCE)) $criteria->add(ArticlePeer::REFERENCE, $this->reference);
		if ($this->isColumnModified(ArticlePeer::REFERENCE_TYPE)) $criteria->add(ArticlePeer::REFERENCE_TYPE, $this->reference_type);
		if ($this->isColumnModified(ArticlePeer::OPEN_REFERENCE_NEW_WINDOW)) $criteria->add(ArticlePeer::OPEN_REFERENCE_NEW_WINDOW, $this->open_reference_new_window);
		if ($this->isColumnModified(ArticlePeer::TIMES_READ)) $criteria->add(ArticlePeer::TIMES_READ, $this->times_read);
		if ($this->isColumnModified(ArticlePeer::RATING)) $criteria->add(ArticlePeer::RATING, $this->rating);
		if ($this->isColumnModified(ArticlePeer::OPEN_AS_POPUP)) $criteria->add(ArticlePeer::OPEN_AS_POPUP, $this->open_as_popup);
		if ($this->isColumnModified(ArticlePeer::AUTO_PUBLISH_AT)) $criteria->add(ArticlePeer::AUTO_PUBLISH_AT, $this->auto_publish_at);
		if ($this->isColumnModified(ArticlePeer::AUTO_UNPUBLISH_AT)) $criteria->add(ArticlePeer::AUTO_UNPUBLISH_AT, $this->auto_unpublish_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ArticlePeer::DATABASE_NAME);

		$criteria->add(ArticlePeer::ID, $this->id);

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

		$copyObj->setName($this->name);

		$copyObj->setTitle($this->title);

		$copyObj->setHeading($this->heading);

		$copyObj->setComment($this->comment);

		$copyObj->setDescription($this->description);

		$copyObj->setUpperDescription($this->upper_description);

		$copyObj->setBody($this->body);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setCreatedBy($this->created_by);

		$copyObj->setUpdatedBy($this->updated_by);

		$copyObj->setIsPublished($this->is_published);

		$copyObj->setIsArchived($this->is_archived);

		$copyObj->setPublishedAt($this->published_at);

		$copyObj->setArchivedAt($this->archived_at);

		$copyObj->setSignature($this->signature);

		$copyObj->setContact($this->contact);

		$copyObj->setZoomableMultimedia($this->zoomable_multimedia);

		$copyObj->setMultimediaId($this->multimedia_id);

		$copyObj->setMainGalleryId($this->main_gallery_id);

		$copyObj->setLinkId($this->link_id);

		$copyObj->setSourceId($this->source_id);

		$copyObj->setSectionId($this->section_id);

		$copyObj->setReference($this->reference);

		$copyObj->setReferenceType($this->reference_type);

		$copyObj->setOpenReferenceNewWindow($this->open_reference_new_window);

		$copyObj->setTimesRead($this->times_read);

		$copyObj->setRating($this->rating);

		$copyObj->setOpenAsPopup($this->open_as_popup);

		$copyObj->setAutoPublishAt($this->auto_publish_at);

		$copyObj->setAutoUnpublishAt($this->auto_unpublish_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getArticleArticlesRelatedByArticleRefererId() as $relObj) {
				$copyObj->addArticleArticleRelatedByArticleRefererId($relObj->copy($deepCopy));
			}

			foreach($this->getArticleArticlesRelatedByArticleRefereeId() as $relObj) {
				$copyObj->addArticleArticleRelatedByArticleRefereeId($relObj->copy($deepCopy));
			}

			foreach($this->getArticleArticleGroups() as $relObj) {
				$copyObj->addArticleArticleGroup($relObj->copy($deepCopy));
			}

			foreach($this->getArticleDocuments() as $relObj) {
				$copyObj->addArticleDocument($relObj->copy($deepCopy));
			}

			foreach($this->getArticleForms() as $relObj) {
				$copyObj->addArticleForm($relObj->copy($deepCopy));
			}

			foreach($this->getArticleGallerys() as $relObj) {
				$copyObj->addArticleGallery($relObj->copy($deepCopy));
			}

			foreach($this->getArticleLinkGroups() as $relObj) {
				$copyObj->addArticleLinkGroup($relObj->copy($deepCopy));
			}

			foreach($this->getArticleMultimedias() as $relObj) {
				$copyObj->addArticleMultimedia($relObj->copy($deepCopy));
			}

			foreach($this->getArticleRssChannels() as $relObj) {
				$copyObj->addArticleRssChannel($relObj->copy($deepCopy));
			}

			foreach($this->getArticleSections() as $relObj) {
				$copyObj->addArticleSection($relObj->copy($deepCopy));
			}

			foreach($this->getArticleTags() as $relObj) {
				$copyObj->addArticleTag($relObj->copy($deepCopy));
			}

			foreach($this->getEvents() as $relObj) {
				$copyObj->addEvent($relObj->copy($deepCopy));
			}

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
			self::$peer = new ArticlePeer();
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
			$this->setMainGalleryId(NULL);
		} else {
			$this->setMainGalleryId($v->getId());
		}


		$this->aGallery = $v;
	}


	
	public function getGallery($con = null)
	{
		if ($this->aGallery === null && ($this->main_gallery_id !== null)) {
						include_once 'lib/model/om/BaseGalleryPeer.php';

			$this->aGallery = GalleryPeer::retrieveByPK($this->main_gallery_id, $con);

			
		}
		return $this->aGallery;
	}

	
	public function setLink($v)
	{


		if ($v === null) {
			$this->setLinkId(NULL);
		} else {
			$this->setLinkId($v->getId());
		}


		$this->aLink = $v;
	}


	
	public function getLink($con = null)
	{
		if ($this->aLink === null && ($this->link_id !== null)) {
						include_once 'lib/model/om/BaseLinkPeer.php';

			$this->aLink = LinkPeer::retrieveByPK($this->link_id, $con);

			
		}
		return $this->aLink;
	}

	
	public function setSource($v)
	{


		if ($v === null) {
			$this->setSourceId(NULL);
		} else {
			$this->setSourceId($v->getId());
		}


		$this->aSource = $v;
	}


	
	public function getSource($con = null)
	{
		if ($this->aSource === null && ($this->source_id !== null)) {
						include_once 'lib/model/om/BaseSourcePeer.php';

			$this->aSource = SourcePeer::retrieveByPK($this->source_id, $con);

			
		}
		return $this->aSource;
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

	
	public function initArticleArticlesRelatedByArticleRefererId()
	{
		if ($this->collArticleArticlesRelatedByArticleRefererId === null) {
			$this->collArticleArticlesRelatedByArticleRefererId = array();
		}
	}

	
	public function getArticleArticlesRelatedByArticleRefererId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleArticlesRelatedByArticleRefererId === null) {
			if ($this->isNew()) {
			   $this->collArticleArticlesRelatedByArticleRefererId = array();
			} else {

				$criteria->add(ArticleArticlePeer::ARTICLE_REFERER_ID, $this->getId());

				ArticleArticlePeer::addSelectColumns($criteria);
				$this->collArticleArticlesRelatedByArticleRefererId = ArticleArticlePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleArticlePeer::ARTICLE_REFERER_ID, $this->getId());

				ArticleArticlePeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleArticleRelatedByArticleRefererIdCriteria) || !$this->lastArticleArticleRelatedByArticleRefererIdCriteria->equals($criteria)) {
					$this->collArticleArticlesRelatedByArticleRefererId = ArticleArticlePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleArticleRelatedByArticleRefererIdCriteria = $criteria;
		return $this->collArticleArticlesRelatedByArticleRefererId;
	}

	
	public function countArticleArticlesRelatedByArticleRefererId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleArticlePeer::ARTICLE_REFERER_ID, $this->getId());

		return ArticleArticlePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleArticleRelatedByArticleRefererId(ArticleArticle $l)
	{
		$this->collArticleArticlesRelatedByArticleRefererId[] = $l;
		$l->setArticleRelatedByArticleRefererId($this);
	}

	
	public function initArticleArticlesRelatedByArticleRefereeId()
	{
		if ($this->collArticleArticlesRelatedByArticleRefereeId === null) {
			$this->collArticleArticlesRelatedByArticleRefereeId = array();
		}
	}

	
	public function getArticleArticlesRelatedByArticleRefereeId($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleArticlesRelatedByArticleRefereeId === null) {
			if ($this->isNew()) {
			   $this->collArticleArticlesRelatedByArticleRefereeId = array();
			} else {

				$criteria->add(ArticleArticlePeer::ARTICLE_REFEREE_ID, $this->getId());

				ArticleArticlePeer::addSelectColumns($criteria);
				$this->collArticleArticlesRelatedByArticleRefereeId = ArticleArticlePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleArticlePeer::ARTICLE_REFEREE_ID, $this->getId());

				ArticleArticlePeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleArticleRelatedByArticleRefereeIdCriteria) || !$this->lastArticleArticleRelatedByArticleRefereeIdCriteria->equals($criteria)) {
					$this->collArticleArticlesRelatedByArticleRefereeId = ArticleArticlePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleArticleRelatedByArticleRefereeIdCriteria = $criteria;
		return $this->collArticleArticlesRelatedByArticleRefereeId;
	}

	
	public function countArticleArticlesRelatedByArticleRefereeId($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleArticlePeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleArticlePeer::ARTICLE_REFEREE_ID, $this->getId());

		return ArticleArticlePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleArticleRelatedByArticleRefereeId(ArticleArticle $l)
	{
		$this->collArticleArticlesRelatedByArticleRefereeId[] = $l;
		$l->setArticleRelatedByArticleRefereeId($this);
	}

	
	public function initArticleArticleGroups()
	{
		if ($this->collArticleArticleGroups === null) {
			$this->collArticleArticleGroups = array();
		}
	}

	
	public function getArticleArticleGroups($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleArticleGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleArticleGroups === null) {
			if ($this->isNew()) {
			   $this->collArticleArticleGroups = array();
			} else {

				$criteria->add(ArticleArticleGroupPeer::ARTICLE_ID, $this->getId());

				ArticleArticleGroupPeer::addSelectColumns($criteria);
				$this->collArticleArticleGroups = ArticleArticleGroupPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleArticleGroupPeer::ARTICLE_ID, $this->getId());

				ArticleArticleGroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleArticleGroupCriteria) || !$this->lastArticleArticleGroupCriteria->equals($criteria)) {
					$this->collArticleArticleGroups = ArticleArticleGroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleArticleGroupCriteria = $criteria;
		return $this->collArticleArticleGroups;
	}

	
	public function countArticleArticleGroups($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleArticleGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleArticleGroupPeer::ARTICLE_ID, $this->getId());

		return ArticleArticleGroupPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleArticleGroup(ArticleArticleGroup $l)
	{
		$this->collArticleArticleGroups[] = $l;
		$l->setArticle($this);
	}


	
	public function getArticleArticleGroupsJoinArticleGroup($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleArticleGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleArticleGroups === null) {
			if ($this->isNew()) {
				$this->collArticleArticleGroups = array();
			} else {

				$criteria->add(ArticleArticleGroupPeer::ARTICLE_ID, $this->getId());

				$this->collArticleArticleGroups = ArticleArticleGroupPeer::doSelectJoinArticleGroup($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleArticleGroupPeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastArticleArticleGroupCriteria) || !$this->lastArticleArticleGroupCriteria->equals($criteria)) {
				$this->collArticleArticleGroups = ArticleArticleGroupPeer::doSelectJoinArticleGroup($criteria, $con);
			}
		}
		$this->lastArticleArticleGroupCriteria = $criteria;

		return $this->collArticleArticleGroups;
	}

	
	public function initArticleDocuments()
	{
		if ($this->collArticleDocuments === null) {
			$this->collArticleDocuments = array();
		}
	}

	
	public function getArticleDocuments($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleDocuments === null) {
			if ($this->isNew()) {
			   $this->collArticleDocuments = array();
			} else {

				$criteria->add(ArticleDocumentPeer::ARTICLE_ID, $this->getId());

				ArticleDocumentPeer::addSelectColumns($criteria);
				$this->collArticleDocuments = ArticleDocumentPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleDocumentPeer::ARTICLE_ID, $this->getId());

				ArticleDocumentPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleDocumentCriteria) || !$this->lastArticleDocumentCriteria->equals($criteria)) {
					$this->collArticleDocuments = ArticleDocumentPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleDocumentCriteria = $criteria;
		return $this->collArticleDocuments;
	}

	
	public function countArticleDocuments($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleDocumentPeer::ARTICLE_ID, $this->getId());

		return ArticleDocumentPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleDocument(ArticleDocument $l)
	{
		$this->collArticleDocuments[] = $l;
		$l->setArticle($this);
	}


	
	public function getArticleDocumentsJoinDocument($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleDocumentPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleDocuments === null) {
			if ($this->isNew()) {
				$this->collArticleDocuments = array();
			} else {

				$criteria->add(ArticleDocumentPeer::ARTICLE_ID, $this->getId());

				$this->collArticleDocuments = ArticleDocumentPeer::doSelectJoinDocument($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleDocumentPeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastArticleDocumentCriteria) || !$this->lastArticleDocumentCriteria->equals($criteria)) {
				$this->collArticleDocuments = ArticleDocumentPeer::doSelectJoinDocument($criteria, $con);
			}
		}
		$this->lastArticleDocumentCriteria = $criteria;

		return $this->collArticleDocuments;
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

				$criteria->add(ArticleFormPeer::ARTICLE_ID, $this->getId());

				ArticleFormPeer::addSelectColumns($criteria);
				$this->collArticleForms = ArticleFormPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleFormPeer::ARTICLE_ID, $this->getId());

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

		$criteria->add(ArticleFormPeer::ARTICLE_ID, $this->getId());

		return ArticleFormPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleForm(ArticleForm $l)
	{
		$this->collArticleForms[] = $l;
		$l->setArticle($this);
	}


	
	public function getArticleFormsJoinForm($criteria = null, $con = null)
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

				$criteria->add(ArticleFormPeer::ARTICLE_ID, $this->getId());

				$this->collArticleForms = ArticleFormPeer::doSelectJoinForm($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleFormPeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastArticleFormCriteria) || !$this->lastArticleFormCriteria->equals($criteria)) {
				$this->collArticleForms = ArticleFormPeer::doSelectJoinForm($criteria, $con);
			}
		}
		$this->lastArticleFormCriteria = $criteria;

		return $this->collArticleForms;
	}

	
	public function initArticleGallerys()
	{
		if ($this->collArticleGallerys === null) {
			$this->collArticleGallerys = array();
		}
	}

	
	public function getArticleGallerys($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleGallerys === null) {
			if ($this->isNew()) {
			   $this->collArticleGallerys = array();
			} else {

				$criteria->add(ArticleGalleryPeer::ARTICLE_ID, $this->getId());

				ArticleGalleryPeer::addSelectColumns($criteria);
				$this->collArticleGallerys = ArticleGalleryPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleGalleryPeer::ARTICLE_ID, $this->getId());

				ArticleGalleryPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleGalleryCriteria) || !$this->lastArticleGalleryCriteria->equals($criteria)) {
					$this->collArticleGallerys = ArticleGalleryPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleGalleryCriteria = $criteria;
		return $this->collArticleGallerys;
	}

	
	public function countArticleGallerys($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleGalleryPeer::ARTICLE_ID, $this->getId());

		return ArticleGalleryPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleGallery(ArticleGallery $l)
	{
		$this->collArticleGallerys[] = $l;
		$l->setArticle($this);
	}


	
	public function getArticleGallerysJoinGallery($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleGalleryPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleGallerys === null) {
			if ($this->isNew()) {
				$this->collArticleGallerys = array();
			} else {

				$criteria->add(ArticleGalleryPeer::ARTICLE_ID, $this->getId());

				$this->collArticleGallerys = ArticleGalleryPeer::doSelectJoinGallery($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleGalleryPeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastArticleGalleryCriteria) || !$this->lastArticleGalleryCriteria->equals($criteria)) {
				$this->collArticleGallerys = ArticleGalleryPeer::doSelectJoinGallery($criteria, $con);
			}
		}
		$this->lastArticleGalleryCriteria = $criteria;

		return $this->collArticleGallerys;
	}

	
	public function initArticleLinkGroups()
	{
		if ($this->collArticleLinkGroups === null) {
			$this->collArticleLinkGroups = array();
		}
	}

	
	public function getArticleLinkGroups($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleLinkGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleLinkGroups === null) {
			if ($this->isNew()) {
			   $this->collArticleLinkGroups = array();
			} else {

				$criteria->add(ArticleLinkGroupPeer::ARTICLE_ID, $this->getId());

				ArticleLinkGroupPeer::addSelectColumns($criteria);
				$this->collArticleLinkGroups = ArticleLinkGroupPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleLinkGroupPeer::ARTICLE_ID, $this->getId());

				ArticleLinkGroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleLinkGroupCriteria) || !$this->lastArticleLinkGroupCriteria->equals($criteria)) {
					$this->collArticleLinkGroups = ArticleLinkGroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleLinkGroupCriteria = $criteria;
		return $this->collArticleLinkGroups;
	}

	
	public function countArticleLinkGroups($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleLinkGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleLinkGroupPeer::ARTICLE_ID, $this->getId());

		return ArticleLinkGroupPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleLinkGroup(ArticleLinkGroup $l)
	{
		$this->collArticleLinkGroups[] = $l;
		$l->setArticle($this);
	}


	
	public function getArticleLinkGroupsJoinLinkGroup($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleLinkGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleLinkGroups === null) {
			if ($this->isNew()) {
				$this->collArticleLinkGroups = array();
			} else {

				$criteria->add(ArticleLinkGroupPeer::ARTICLE_ID, $this->getId());

				$this->collArticleLinkGroups = ArticleLinkGroupPeer::doSelectJoinLinkGroup($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleLinkGroupPeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastArticleLinkGroupCriteria) || !$this->lastArticleLinkGroupCriteria->equals($criteria)) {
				$this->collArticleLinkGroups = ArticleLinkGroupPeer::doSelectJoinLinkGroup($criteria, $con);
			}
		}
		$this->lastArticleLinkGroupCriteria = $criteria;

		return $this->collArticleLinkGroups;
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

				$criteria->add(ArticleMultimediaPeer::ARTICLE_ID, $this->getId());

				ArticleMultimediaPeer::addSelectColumns($criteria);
				$this->collArticleMultimedias = ArticleMultimediaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleMultimediaPeer::ARTICLE_ID, $this->getId());

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

		$criteria->add(ArticleMultimediaPeer::ARTICLE_ID, $this->getId());

		return ArticleMultimediaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleMultimedia(ArticleMultimedia $l)
	{
		$this->collArticleMultimedias[] = $l;
		$l->setArticle($this);
	}


	
	public function getArticleMultimediasJoinMultimedia($criteria = null, $con = null)
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

				$criteria->add(ArticleMultimediaPeer::ARTICLE_ID, $this->getId());

				$this->collArticleMultimedias = ArticleMultimediaPeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleMultimediaPeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastArticleMultimediaCriteria) || !$this->lastArticleMultimediaCriteria->equals($criteria)) {
				$this->collArticleMultimedias = ArticleMultimediaPeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastArticleMultimediaCriteria = $criteria;

		return $this->collArticleMultimedias;
	}

	
	public function initArticleRssChannels()
	{
		if ($this->collArticleRssChannels === null) {
			$this->collArticleRssChannels = array();
		}
	}

	
	public function getArticleRssChannels($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleRssChannelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleRssChannels === null) {
			if ($this->isNew()) {
			   $this->collArticleRssChannels = array();
			} else {

				$criteria->add(ArticleRssChannelPeer::ARTICLE_ID, $this->getId());

				ArticleRssChannelPeer::addSelectColumns($criteria);
				$this->collArticleRssChannels = ArticleRssChannelPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleRssChannelPeer::ARTICLE_ID, $this->getId());

				ArticleRssChannelPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleRssChannelCriteria) || !$this->lastArticleRssChannelCriteria->equals($criteria)) {
					$this->collArticleRssChannels = ArticleRssChannelPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleRssChannelCriteria = $criteria;
		return $this->collArticleRssChannels;
	}

	
	public function countArticleRssChannels($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleRssChannelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleRssChannelPeer::ARTICLE_ID, $this->getId());

		return ArticleRssChannelPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleRssChannel(ArticleRssChannel $l)
	{
		$this->collArticleRssChannels[] = $l;
		$l->setArticle($this);
	}


	
	public function getArticleRssChannelsJoinRssChannel($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleRssChannelPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleRssChannels === null) {
			if ($this->isNew()) {
				$this->collArticleRssChannels = array();
			} else {

				$criteria->add(ArticleRssChannelPeer::ARTICLE_ID, $this->getId());

				$this->collArticleRssChannels = ArticleRssChannelPeer::doSelectJoinRssChannel($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleRssChannelPeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastArticleRssChannelCriteria) || !$this->lastArticleRssChannelCriteria->equals($criteria)) {
				$this->collArticleRssChannels = ArticleRssChannelPeer::doSelectJoinRssChannel($criteria, $con);
			}
		}
		$this->lastArticleRssChannelCriteria = $criteria;

		return $this->collArticleRssChannels;
	}

	
	public function initArticleSections()
	{
		if ($this->collArticleSections === null) {
			$this->collArticleSections = array();
		}
	}

	
	public function getArticleSections($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleSections === null) {
			if ($this->isNew()) {
			   $this->collArticleSections = array();
			} else {

				$criteria->add(ArticleSectionPeer::ARTICLE_ID, $this->getId());

				ArticleSectionPeer::addSelectColumns($criteria);
				$this->collArticleSections = ArticleSectionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleSectionPeer::ARTICLE_ID, $this->getId());

				ArticleSectionPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleSectionCriteria) || !$this->lastArticleSectionCriteria->equals($criteria)) {
					$this->collArticleSections = ArticleSectionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleSectionCriteria = $criteria;
		return $this->collArticleSections;
	}

	
	public function countArticleSections($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleSectionPeer::ARTICLE_ID, $this->getId());

		return ArticleSectionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleSection(ArticleSection $l)
	{
		$this->collArticleSections[] = $l;
		$l->setArticle($this);
	}


	
	public function getArticleSectionsJoinSection($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleSectionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleSections === null) {
			if ($this->isNew()) {
				$this->collArticleSections = array();
			} else {

				$criteria->add(ArticleSectionPeer::ARTICLE_ID, $this->getId());

				$this->collArticleSections = ArticleSectionPeer::doSelectJoinSection($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleSectionPeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastArticleSectionCriteria) || !$this->lastArticleSectionCriteria->equals($criteria)) {
				$this->collArticleSections = ArticleSectionPeer::doSelectJoinSection($criteria, $con);
			}
		}
		$this->lastArticleSectionCriteria = $criteria;

		return $this->collArticleSections;
	}

	
	public function initArticleTags()
	{
		if ($this->collArticleTags === null) {
			$this->collArticleTags = array();
		}
	}

	
	public function getArticleTags($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleTags === null) {
			if ($this->isNew()) {
			   $this->collArticleTags = array();
			} else {

				$criteria->add(ArticleTagPeer::ARTICLE_ID, $this->getId());

				ArticleTagPeer::addSelectColumns($criteria);
				$this->collArticleTags = ArticleTagPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ArticleTagPeer::ARTICLE_ID, $this->getId());

				ArticleTagPeer::addSelectColumns($criteria);
				if (!isset($this->lastArticleTagCriteria) || !$this->lastArticleTagCriteria->equals($criteria)) {
					$this->collArticleTags = ArticleTagPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastArticleTagCriteria = $criteria;
		return $this->collArticleTags;
	}

	
	public function countArticleTags($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseArticleTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(ArticleTagPeer::ARTICLE_ID, $this->getId());

		return ArticleTagPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addArticleTag(ArticleTag $l)
	{
		$this->collArticleTags[] = $l;
		$l->setArticle($this);
	}


	
	public function getArticleTagsJoinTag($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseArticleTagPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collArticleTags === null) {
			if ($this->isNew()) {
				$this->collArticleTags = array();
			} else {

				$criteria->add(ArticleTagPeer::ARTICLE_ID, $this->getId());

				$this->collArticleTags = ArticleTagPeer::doSelectJoinTag($criteria, $con);
			}
		} else {
									
			$criteria->add(ArticleTagPeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastArticleTagCriteria) || !$this->lastArticleTagCriteria->equals($criteria)) {
				$this->collArticleTags = ArticleTagPeer::doSelectJoinTag($criteria, $con);
			}
		}
		$this->lastArticleTagCriteria = $criteria;

		return $this->collArticleTags;
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

				$criteria->add(EventPeer::ARTICLE_ID, $this->getId());

				EventPeer::addSelectColumns($criteria);
				$this->collEvents = EventPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(EventPeer::ARTICLE_ID, $this->getId());

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

		$criteria->add(EventPeer::ARTICLE_ID, $this->getId());

		return EventPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addEvent(Event $l)
	{
		$this->collEvents[] = $l;
		$l->setArticle($this);
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

				$criteria->add(EventPeer::ARTICLE_ID, $this->getId());

				$this->collEvents = EventPeer::doSelectJoinsfGuardUserRelatedByAuthor($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastEventCriteria) || !$this->lastEventCriteria->equals($criteria)) {
				$this->collEvents = EventPeer::doSelectJoinsfGuardUserRelatedByAuthor($criteria, $con);
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

				$criteria->add(EventPeer::ARTICLE_ID, $this->getId());

				$this->collEvents = EventPeer::doSelectJoinEventType($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeer::ARTICLE_ID, $this->getId());

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

				$criteria->add(EventPeer::ARTICLE_ID, $this->getId());

				$this->collEvents = EventPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastEventCriteria) || !$this->lastEventCriteria->equals($criteria)) {
				$this->collEvents = EventPeer::doSelectJoinsfGuardUserRelatedByUpdatedBy($criteria, $con);
			}
		}
		$this->lastEventCriteria = $criteria;

		return $this->collEvents;
	}


	
	public function getEventsJoinMultimedia($criteria = null, $con = null)
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

				$criteria->add(EventPeer::ARTICLE_ID, $this->getId());

				$this->collEvents = EventPeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(EventPeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastEventCriteria) || !$this->lastEventCriteria->equals($criteria)) {
				$this->collEvents = EventPeer::doSelectJoinMultimedia($criteria, $con);
			}
		}
		$this->lastEventCriteria = $criteria;

		return $this->collEvents;
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

				$criteria->add(NewsSpacePeer::ARTICLE_ID, $this->getId());

				NewsSpacePeer::addSelectColumns($criteria);
				$this->collNewsSpaces = NewsSpacePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(NewsSpacePeer::ARTICLE_ID, $this->getId());

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

		$criteria->add(NewsSpacePeer::ARTICLE_ID, $this->getId());

		return NewsSpacePeer::doCount($criteria, $distinct, $con);
	}

	
	public function addNewsSpace(NewsSpace $l)
	{
		$this->collNewsSpaces[] = $l;
		$l->setArticle($this);
	}


	
	public function getNewsSpacesJoinTemplate($criteria = null, $con = null)
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

				$criteria->add(NewsSpacePeer::ARTICLE_ID, $this->getId());

				$this->collNewsSpaces = NewsSpacePeer::doSelectJoinTemplate($criteria, $con);
			}
		} else {
									
			$criteria->add(NewsSpacePeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastNewsSpaceCriteria) || !$this->lastNewsSpaceCriteria->equals($criteria)) {
				$this->collNewsSpaces = NewsSpacePeer::doSelectJoinTemplate($criteria, $con);
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

				$criteria->add(SectionPeer::ARTICLE_ID, $this->getId());

				SectionPeer::addSelectColumns($criteria);
				$this->collSections = SectionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SectionPeer::ARTICLE_ID, $this->getId());

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

		$criteria->add(SectionPeer::ARTICLE_ID, $this->getId());

		return SectionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSection(Section $l)
	{
		$this->collSections[] = $l;
		$l->setArticle($this);
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

				$criteria->add(SectionPeer::ARTICLE_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinMultimedia($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::ARTICLE_ID, $this->getId());

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

				$criteria->add(SectionPeer::ARTICLE_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinSectionRelatedBySectionId($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::ARTICLE_ID, $this->getId());

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

				$criteria->add(SectionPeer::ARTICLE_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinTemplate($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastSectionCriteria) || !$this->lastSectionCriteria->equals($criteria)) {
				$this->collSections = SectionPeer::doSelectJoinTemplate($criteria, $con);
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

				$criteria->add(SectionPeer::ARTICLE_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinLayout($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::ARTICLE_ID, $this->getId());

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

				$criteria->add(SectionPeer::ARTICLE_ID, $this->getId());

				$this->collSections = SectionPeer::doSelectJoinArticleGroup($criteria, $con);
			}
		} else {
									
			$criteria->add(SectionPeer::ARTICLE_ID, $this->getId());

			if (!isset($this->lastSectionCriteria) || !$this->lastSectionCriteria->equals($criteria)) {
				$this->collSections = SectionPeer::doSelectJoinArticleGroup($criteria, $con);
			}
		}
		$this->lastSectionCriteria = $criteria;

		return $this->collSections;
	}


  public function __call($method, $arguments)
  {
    if (!$callable = sfMixer::getCallable('BaseArticle:'.$method))
    {
      throw new sfException(sprintf('Call to undefined method BaseArticle::%s', $method));
    }

    array_unshift($arguments, $this);

    return call_user_func_array($callable, $arguments);
  }


} 