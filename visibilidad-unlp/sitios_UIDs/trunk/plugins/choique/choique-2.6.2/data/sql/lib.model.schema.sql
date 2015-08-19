
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- article
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `article`;


CREATE TABLE `article`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`type` TINYINT,
	`name` VARCHAR(256)  NOT NULL,
	`title` VARCHAR(256)  NOT NULL,
	`heading` VARCHAR(512),
	`comment` TEXT,
	`description` TEXT,
	`upper_description` VARCHAR(256),
	`body` TEXT  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`created_by` INTEGER,
	`updated_by` INTEGER,
	`is_published` INTEGER,
	`is_archived` INTEGER,
	`published_at` DATETIME,
	`archived_at` DATETIME,
	`signature` TEXT,
	`contact` VARCHAR(256),
	`zoomable_multimedia` INTEGER,
	`multimedia_id` INTEGER,
	`main_gallery_id` INTEGER,
	`link_id` INTEGER,
	`source_id` INTEGER,
	`section_id` INTEGER,
	`reference` VARCHAR(255),
	`reference_type` TINYINT default 0,
	`open_reference_new_window` INTEGER default 0,
	`times_read` BIGINT,
	`rating` DECIMAL,
	`open_as_popup` INTEGER default 0,
	`auto_publish_at` DATETIME,
	`auto_unpublish_at` DATETIME,
	PRIMARY KEY (`id`),
	KEY `name_publmished_at_index`(`name`, `published_at`),
	INDEX `article_FI_1` (`created_by`),
	CONSTRAINT `article_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `article_FI_2` (`updated_by`),
	CONSTRAINT `article_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `article_FI_3` (`multimedia_id`),
	CONSTRAINT `article_FK_3`
		FOREIGN KEY (`multimedia_id`)
		REFERENCES `multimedia` (`id`)
		ON DELETE SET NULL,
	INDEX `article_FI_4` (`main_gallery_id`),
	CONSTRAINT `article_FK_4`
		FOREIGN KEY (`main_gallery_id`)
		REFERENCES `gallery` (`id`)
		ON DELETE SET NULL,
	INDEX `article_FI_5` (`link_id`),
	CONSTRAINT `article_FK_5`
		FOREIGN KEY (`link_id`)
		REFERENCES `link` (`id`)
		ON DELETE SET NULL,
	INDEX `article_FI_6` (`source_id`),
	CONSTRAINT `article_FK_6`
		FOREIGN KEY (`source_id`)
		REFERENCES `source` (`id`)
		ON DELETE SET NULL,
	INDEX `article_FI_7` (`section_id`),
	CONSTRAINT `article_FK_7`
		FOREIGN KEY (`section_id`)
		REFERENCES `section` (`id`)
		ON DELETE SET NULL
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- article_article
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `article_article`;


CREATE TABLE `article_article`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`article_referer_id` INTEGER,
	`article_referee_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `article_article_FI_1` (`article_referer_id`),
	CONSTRAINT `article_article_FK_1`
		FOREIGN KEY (`article_referer_id`)
		REFERENCES `article` (`id`)
		ON DELETE CASCADE,
	INDEX `article_article_FI_2` (`article_referee_id`),
	CONSTRAINT `article_article_FK_2`
		FOREIGN KEY (`article_referee_id`)
		REFERENCES `article` (`id`)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- cms_configuration
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `cms_configuration`;


CREATE TABLE `cms_configuration`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`configuration_key` VARCHAR(255)  NOT NULL,
	`configuration_value` TEXT,
	PRIMARY KEY (`id`),
	KEY `configuration_key_index`(`configuration_key`)
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- data
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `data`;


CREATE TABLE `data`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`row` INTEGER,
	`data` TEXT,
	`field_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `data_FI_1` (`field_id`),
	CONSTRAINT `data_FK_1`
		FOREIGN KEY (`field_id`)
		REFERENCES `field` (`id`)
		ON DELETE CASCADE
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- document
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `document`;


CREATE TABLE `document`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256)  NOT NULL,
	`title` VARCHAR(256)  NOT NULL,
	`uri` VARCHAR(256)  NOT NULL,
	`uploaded_by` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `document_FI_1` (`uploaded_by`),
	CONSTRAINT `document_FK_1`
		FOREIGN KEY (`uploaded_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL,
	INDEX `document_FI_2` (`updated_by`),
	CONSTRAINT `document_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- article_document
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `article_document`;


CREATE TABLE `article_document`
(
	`article_id` INTEGER,
	`document_id` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `article_document_FI_1` (`article_id`),
	CONSTRAINT `article_document_FK_1`
		FOREIGN KEY (`article_id`)
		REFERENCES `article` (`id`)
		ON DELETE CASCADE,
	INDEX `article_document_FI_2` (`document_id`),
	CONSTRAINT `article_document_FK_2`
		FOREIGN KEY (`document_id`)
		REFERENCES `document` (`id`)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- event
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `event`;


CREATE TABLE `event`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`is_published` INTEGER,
	`title` VARCHAR(256)  NOT NULL,
	`description` TEXT,
	`location` VARCHAR(256),
	`contact` VARCHAR(256),
	`organizer` VARCHAR(256),
	`author` INTEGER,
	`comment` TEXT,
	`begins_at` DATETIME,
	`ends_at` DATETIME,
	`article_id` INTEGER,
	`event_type_id` INTEGER,
	`created_at` DATETIME,
	`updated_by` INTEGER,
	`updated_at` DATETIME,
	`multimedia_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `event_FI_1` (`author`),
	CONSTRAINT `event_FK_1`
		FOREIGN KEY (`author`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `event_FI_2` (`article_id`),
	CONSTRAINT `event_FK_2`
		FOREIGN KEY (`article_id`)
		REFERENCES `article` (`id`)
		ON DELETE RESTRICT,
	INDEX `event_FI_3` (`event_type_id`),
	CONSTRAINT `event_FK_3`
		FOREIGN KEY (`event_type_id`)
		REFERENCES `event_type` (`id`)
		ON DELETE SET NULL,
	INDEX `event_FI_4` (`updated_by`),
	CONSTRAINT `event_FK_4`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `event_FI_5` (`multimedia_id`),
	CONSTRAINT `event_FK_5`
		FOREIGN KEY (`multimedia_id`)
		REFERENCES `multimedia` (`id`)
		ON DELETE SET NULL
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- event_type
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `event_type`;


CREATE TABLE `event_type`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(256)  NOT NULL,
	`description` TEXT,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- event_section
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `event_section`;


CREATE TABLE `event_section`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`event_id` INTEGER  NOT NULL,
	`section_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `unique_event_section` (`event_id`, `section_id`),
	CONSTRAINT `event_section_FK_1`
		FOREIGN KEY (`event_id`)
		REFERENCES `event` (`id`)
		ON DELETE CASCADE,
	INDEX `event_section_FI_2` (`section_id`),
	CONSTRAINT `event_section_FK_2`
		FOREIGN KEY (`section_id`)
		REFERENCES `section` (`id`)
		ON DELETE CASCADE
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- field
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `field`;


CREATE TABLE `field`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`label` VARCHAR(256),
	`type` INTEGER,
	`is_required` INTEGER,
	`default_value` TEXT,
	`sort` INTEGER,
	`form_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `field_FI_1` (`form_id`),
	CONSTRAINT `field_FK_1`
		FOREIGN KEY (`form_id`)
		REFERENCES `form` (`id`)
		ON DELETE CASCADE
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- form
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `form`;


CREATE TABLE `form`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(256)  NOT NULL,
	`name` VARCHAR(256),
	`description` TEXT,
	`comment` TEXT,
	`rows` INTEGER,
	`is_poll` INTEGER,
	`is_active` INTEGER,
	`success_msg` VARCHAR(256),
	`email` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`created_by` INTEGER,
	`updated_by` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `form_FI_1` (`created_by`),
	CONSTRAINT `form_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT,
	INDEX `form_FI_2` (`updated_by`),
	CONSTRAINT `form_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON UPDATE CASCADE
		ON DELETE RESTRICT
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- article_form
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `article_form`;


CREATE TABLE `article_form`
(
	`article_id` INTEGER,
	`form_id` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `article_form_FI_1` (`article_id`),
	CONSTRAINT `article_form_FK_1`
		FOREIGN KEY (`article_id`)
		REFERENCES `article` (`id`)
		ON DELETE CASCADE,
	INDEX `article_form_FI_2` (`form_id`),
	CONSTRAINT `article_form_FK_2`
		FOREIGN KEY (`form_id`)
		REFERENCES `form` (`id`)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- gallery
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `gallery`;


CREATE TABLE `gallery`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256)  NOT NULL,
	`description` TEXT,
	`comment` TEXT,
	`is_horizontal` INTEGER default 1,
	`visible_items` TINYINT default 0,
	`is_published` INTEGER,
	`created_at` DATETIME,
	`published_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	`published_by` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `gallery_FI_1` (`created_by`),
	CONSTRAINT `gallery_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL,
	INDEX `gallery_FI_2` (`updated_by`),
	CONSTRAINT `gallery_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL,
	INDEX `gallery_FI_3` (`published_by`),
	CONSTRAINT `gallery_FK_3`
		FOREIGN KEY (`published_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- article_gallery
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `article_gallery`;


CREATE TABLE `article_gallery`
(
	`article_id` INTEGER,
	`gallery_id` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `article_gallery_FI_1` (`article_id`),
	CONSTRAINT `article_gallery_FK_1`
		FOREIGN KEY (`article_id`)
		REFERENCES `article` (`id`)
		ON DELETE CASCADE,
	INDEX `article_gallery_FI_2` (`gallery_id`),
	CONSTRAINT `article_gallery_FK_2`
		FOREIGN KEY (`gallery_id`)
		REFERENCES `gallery` (`id`)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- article_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `article_group`;


CREATE TABLE `article_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256)  NOT NULL,
	`description` TEXT,
	`comment` TEXT,
	`visible_items` TINYINT default 0,
	`is_published` INTEGER,
	`created_at` DATETIME,
	`published_at` DATETIME,
	`created_by` INTEGER,
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `article_group_FI_1` (`created_by`),
	CONSTRAINT `article_group_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL,
	INDEX `article_group_FI_2` (`updated_by`),
	CONSTRAINT `article_group_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- article_article_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `article_article_group`;


CREATE TABLE `article_article_group`
(
	`article_id` INTEGER,
	`article_group_id` INTEGER,
	`priority` INTEGER default 0,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `article_article_group_FI_1` (`article_id`),
	CONSTRAINT `article_article_group_FK_1`
		FOREIGN KEY (`article_id`)
		REFERENCES `article` (`id`)
		ON DELETE CASCADE,
	INDEX `article_article_group_FI_2` (`article_group_id`),
	CONSTRAINT `article_article_group_FK_2`
		FOREIGN KEY (`article_group_id`)
		REFERENCES `article_group` (`id`)
		ON DELETE CASCADE
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- link
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `link`;


CREATE TABLE `link`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256),
	`uri` VARCHAR(256),
	`url` VARCHAR(256),
	`created_by` INTEGER,
	`created_at` DATETIME,
	`updated_by` INTEGER,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `link_FI_1` (`created_by`),
	CONSTRAINT `link_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `link_FI_2` (`updated_by`),
	CONSTRAINT `link_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- link_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `link_group`;


CREATE TABLE `link_group`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256),
	PRIMARY KEY (`id`)
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- article_link_group
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `article_link_group`;


CREATE TABLE `article_link_group`
(
	`article_id` INTEGER,
	`link_group_id` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `article_link_group_FI_1` (`article_id`),
	CONSTRAINT `article_link_group_FK_1`
		FOREIGN KEY (`article_id`)
		REFERENCES `article` (`id`)
		ON DELETE CASCADE,
	INDEX `article_link_group_FI_2` (`link_group_id`),
	CONSTRAINT `article_link_group_FK_2`
		FOREIGN KEY (`link_group_id`)
		REFERENCES `link_group` (`id`)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- link_group_link
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `link_group_link`;


CREATE TABLE `link_group_link`
(
	`link_group_id` INTEGER,
	`link_id` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `link_group_link_FI_1` (`link_group_id`),
	CONSTRAINT `link_group_link_FK_1`
		FOREIGN KEY (`link_group_id`)
		REFERENCES `link_group` (`id`)
		ON DELETE CASCADE,
	INDEX `link_group_link_FI_2` (`link_id`),
	CONSTRAINT `link_group_link_FK_2`
		FOREIGN KEY (`link_id`)
		REFERENCES `link` (`id`)
		ON DELETE CASCADE
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- mail_log
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `mail_log`;


CREATE TABLE `mail_log`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`mail_from` VARCHAR(255)  NOT NULL,
	`mail_to` VARCHAR(255)  NOT NULL,
	`subject` VARCHAR(255)  NOT NULL,
	`body` TEXT  NOT NULL,
	`sender_name` VARCHAR(255)  NOT NULL,
	`section_name` VARCHAR(255),
	`article_name` VARCHAR(255),
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- multimedia
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `multimedia`;


CREATE TABLE `multimedia`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256)  NOT NULL,
	`title` VARCHAR(256)  NOT NULL,
	`description` TEXT,
	`comment` TEXT,
	`is_deleted` INTEGER,
	`small_uri` VARCHAR(256),
	`medium_uri` VARCHAR(256),
	`large_uri` VARCHAR(256) default '' NOT NULL,
	`author` VARCHAR(256),
	`uploaded_by` INTEGER,
	`copyright` VARCHAR(256),
	`type` VARCHAR(20),
	`language` VARCHAR(5),
	`duration` TINYINT,
	`location` VARCHAR(256),
	`subject` VARCHAR(256),
	`topics` VARCHAR(256),
	`height` BIGINT,
	`width` BIGINT,
	`mime_type` VARCHAR(256)  NOT NULL,
	`created_at` DATETIME,
	`flv_params` TEXT,
	`is_external` INTEGER default 0,
	`player_id` INTEGER,
	`external_uri` TEXT,
	`times_seen` INTEGER,
	`rating` DECIMAL,
	`times_rated` INTEGER,
	`times_downloaded` INTEGER,
	`longdesc_uri` VARCHAR(256),
	`updated_at` DATETIME,
	`updated_by` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `multimedia_FI_1` (`uploaded_by`),
	CONSTRAINT `multimedia_FK_1`
		FOREIGN KEY (`uploaded_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL,
	INDEX `multimedia_FI_2` (`updated_by`),
	CONSTRAINT `multimedia_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- article_multimedia
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `article_multimedia`;


CREATE TABLE `article_multimedia`
(
	`article_id` INTEGER,
	`multimedia_id` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `article_multimedia_FI_1` (`article_id`),
	CONSTRAINT `article_multimedia_FK_1`
		FOREIGN KEY (`article_id`)
		REFERENCES `article` (`id`)
		ON DELETE CASCADE,
	INDEX `article_multimedia_FI_2` (`multimedia_id`),
	CONSTRAINT `article_multimedia_FK_2`
		FOREIGN KEY (`multimedia_id`)
		REFERENCES `multimedia` (`id`)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- multimedia_gallery
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `multimedia_gallery`;


CREATE TABLE `multimedia_gallery`
(
	`multimedia_id` INTEGER,
	`gallery_id` INTEGER,
	`priority` INTEGER default 0,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `multimedia_gallery_FI_1` (`multimedia_id`),
	CONSTRAINT `multimedia_gallery_FK_1`
		FOREIGN KEY (`multimedia_id`)
		REFERENCES `multimedia` (`id`)
		ON DELETE CASCADE,
	INDEX `multimedia_gallery_FI_2` (`gallery_id`),
	CONSTRAINT `multimedia_gallery_FK_2`
		FOREIGN KEY (`gallery_id`)
		REFERENCES `gallery` (`id`)
		ON DELETE CASCADE
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- multimedia_tag
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `multimedia_tag`;


CREATE TABLE `multimedia_tag`
(
	`multimedia_id` INTEGER,
	`tag_id` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `multimedia_tag_FI_1` (`multimedia_id`),
	CONSTRAINT `multimedia_tag_FK_1`
		FOREIGN KEY (`multimedia_id`)
		REFERENCES `multimedia` (`id`)
		ON DELETE CASCADE,
	INDEX `multimedia_tag_FI_2` (`tag_id`),
	CONSTRAINT `multimedia_tag_FK_2`
		FOREIGN KEY (`tag_id`)
		REFERENCES `tag` (`id`)
		ON DELETE CASCADE
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- article_section
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `article_section`;


CREATE TABLE `article_section`
(
	`article_id` INTEGER,
	`section_id` INTEGER,
	`priority` INTEGER default 0,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `article_section_FI_1` (`article_id`),
	CONSTRAINT `article_section_FK_1`
		FOREIGN KEY (`article_id`)
		REFERENCES `article` (`id`)
		ON DELETE CASCADE,
	INDEX `article_section_FI_2` (`section_id`),
	CONSTRAINT `article_section_FK_2`
		FOREIGN KEY (`section_id`)
		REFERENCES `section` (`id`)
		ON DELETE CASCADE
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- shortcut
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `shortcut`;


CREATE TABLE `shortcut`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`multimedia_id` INTEGER,
	`container_slotlet_id` INTEGER,
	`title` VARCHAR(256)  NOT NULL,
	`body` TEXT,
	`reference` VARCHAR(256)  NOT NULL,
	`reference_type` TINYINT default 0,
	`open_in_new_window` INTEGER default 0,
	`priority` INTEGER default 0,
	`comment` TEXT,
	`is_published` INTEGER default 0,
	`created_by` INTEGER,
	`created_at` DATETIME,
	`updated_by` INTEGER,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `shortcut_FI_1` (`multimedia_id`),
	CONSTRAINT `shortcut_FK_1`
		FOREIGN KEY (`multimedia_id`)
		REFERENCES `multimedia` (`id`)
		ON DELETE RESTRICT,
	INDEX `shortcut_FI_2` (`container_slotlet_id`),
	CONSTRAINT `shortcut_FK_2`
		FOREIGN KEY (`container_slotlet_id`)
		REFERENCES `container_slotlet` (`id`)
		ON DELETE SET NULL,
	INDEX `shortcut_FI_3` (`created_by`),
	CONSTRAINT `shortcut_FK_3`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `shortcut_FI_4` (`updated_by`),
	CONSTRAINT `shortcut_FK_4`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- slotlet
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `slotlet`;


CREATE TABLE `slotlet`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256)  NOT NULL,
	`cls` VARCHAR(256)  NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- container
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `container`;


CREATE TABLE `container`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256)  NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- container_slotlet
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `container_slotlet`;


CREATE TABLE `container_slotlet`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`container_id` INTEGER,
	`slotlet_id` INTEGER,
	`name` VARCHAR(256)  NOT NULL,
	`priority` INTEGER default 0,
	`rss_channel_id` INTEGER,
	`visible_rss` INTEGER default 3,
	PRIMARY KEY (`id`),
	INDEX `container_slotlet_FI_1` (`container_id`),
	CONSTRAINT `container_slotlet_FK_1`
		FOREIGN KEY (`container_id`)
		REFERENCES `container` (`id`)
		ON DELETE CASCADE,
	INDEX `container_slotlet_FI_2` (`slotlet_id`),
	CONSTRAINT `container_slotlet_FK_2`
		FOREIGN KEY (`slotlet_id`)
		REFERENCES `slotlet` (`id`)
		ON DELETE RESTRICT,
	INDEX `container_slotlet_FI_3` (`rss_channel_id`),
	CONSTRAINT `container_slotlet_FK_3`
		FOREIGN KEY (`rss_channel_id`)
		REFERENCES `rss_channel` (`id`)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- source
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `source`;


CREATE TABLE `source`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256)  NOT NULL,
	`description` TEXT,
	`comment` TEXT,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- tag
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tag`;


CREATE TABLE `tag`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256)  NOT NULL,
	`description` TEXT,
	`comment` TEXT,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- section_tag
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `section_tag`;


CREATE TABLE `section_tag`
(
	`section_id` INTEGER,
	`tag_id` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `section_tag_FI_1` (`section_id`),
	CONSTRAINT `section_tag_FK_1`
		FOREIGN KEY (`section_id`)
		REFERENCES `section` (`id`)
		ON DELETE CASCADE,
	INDEX `section_tag_FI_2` (`tag_id`),
	CONSTRAINT `section_tag_FK_2`
		FOREIGN KEY (`tag_id`)
		REFERENCES `tag` (`id`)
		ON DELETE CASCADE
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- article_tag
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `article_tag`;


CREATE TABLE `article_tag`
(
	`article_id` INTEGER,
	`tag_id` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `article_tag_FI_1` (`article_id`),
	CONSTRAINT `article_tag_FK_1`
		FOREIGN KEY (`article_id`)
		REFERENCES `article` (`id`)
		ON DELETE CASCADE,
	INDEX `article_tag_FI_2` (`tag_id`),
	CONSTRAINT `article_tag_FK_2`
		FOREIGN KEY (`tag_id`)
		REFERENCES `tag` (`id`)
		ON DELETE CASCADE
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- template
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `template`;


CREATE TABLE `template`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256)  NOT NULL,
	`public_name` VARCHAR(255),
	`comment` TEXT,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`created_by` INTEGER,
	`updated_by` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `template_FI_1` (`created_by`),
	CONSTRAINT `template_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`),
	INDEX `template_FI_2` (`updated_by`),
	CONSTRAINT `template_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- section
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `section`;


CREATE TABLE `section`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(256)  NOT NULL,
	`title` TEXT  NOT NULL,
	`priority` INTEGER default 0,
	`description` TEXT,
	`comment` TEXT,
	`is_published` INTEGER default 0,
	`multimedia_id` INTEGER,
	`section_id` INTEGER,
	`template_id` INTEGER,
	`article_id` INTEGER,
	`layout_id` INTEGER,
	`color` VARCHAR(7),
	`article_group_id` INTEGER,
	PRIMARY KEY (`id`),
	KEY `name_index`(`name`),
	INDEX `section_FI_1` (`multimedia_id`),
	CONSTRAINT `section_FK_1`
		FOREIGN KEY (`multimedia_id`)
		REFERENCES `multimedia` (`id`)
		ON DELETE SET NULL,
	INDEX `section_FI_2` (`section_id`),
	CONSTRAINT `section_FK_2`
		FOREIGN KEY (`section_id`)
		REFERENCES `section` (`id`)
		ON DELETE RESTRICT,
	INDEX `section_FI_3` (`template_id`),
	CONSTRAINT `section_FK_3`
		FOREIGN KEY (`template_id`)
		REFERENCES `template` (`id`)
		ON DELETE SET NULL,
	INDEX `section_FI_4` (`article_id`),
	CONSTRAINT `section_FK_4`
		FOREIGN KEY (`article_id`)
		REFERENCES `article` (`id`)
		ON DELETE RESTRICT,
	INDEX `section_FI_5` (`layout_id`),
	CONSTRAINT `section_FK_5`
		FOREIGN KEY (`layout_id`)
		REFERENCES `layout` (`id`)
		ON DELETE SET NULL,
	INDEX `section_FI_6` (`article_group_id`),
	CONSTRAINT `section_FK_6`
		FOREIGN KEY (`article_group_id`)
		REFERENCES `article_group` (`id`)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- news_space
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `news_space`;


CREATE TABLE `news_space`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`type` TINYINT,
	`comment` TEXT,
	`row_number` TINYINT,
	`column_number` TINYINT,
	`template_id` INTEGER,
	`article_id` INTEGER,
	`width` FLOAT,
	PRIMARY KEY (`id`),
	INDEX `news_space_FI_1` (`template_id`),
	CONSTRAINT `news_space_FK_1`
		FOREIGN KEY (`template_id`)
		REFERENCES `template` (`id`)
		ON DELETE CASCADE,
	INDEX `news_space_FI_2` (`article_id`),
	CONSTRAINT `news_space_FK_2`
		FOREIGN KEY (`article_id`)
		REFERENCES `article` (`id`)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- rss_channel
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rss_channel`;


CREATE TABLE `rss_channel`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255)  NOT NULL,
	`link` VARCHAR(255)  NOT NULL,
	`is_active` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`created_by` INTEGER,
	`updated_by` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `rss_channel_FI_1` (`created_by`),
	CONSTRAINT `rss_channel_FK_1`
		FOREIGN KEY (`created_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE RESTRICT,
	INDEX `rss_channel_FI_2` (`updated_by`),
	CONSTRAINT `rss_channel_FK_2`
		FOREIGN KEY (`updated_by`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- article_rss_channel
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `article_rss_channel`;


CREATE TABLE `article_rss_channel`
(
	`article_id` INTEGER,
	`rss_channel_id` INTEGER,
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	PRIMARY KEY (`id`),
	INDEX `article_rss_channel_FI_1` (`article_id`),
	CONSTRAINT `article_rss_channel_FK_1`
		FOREIGN KEY (`article_id`)
		REFERENCES `article` (`id`)
		ON DELETE CASCADE,
	INDEX `article_rss_channel_FI_2` (`rss_channel_id`),
	CONSTRAINT `article_rss_channel_FK_2`
		FOREIGN KEY (`rss_channel_id`)
		REFERENCES `rss_channel` (`id`)
		ON DELETE RESTRICT
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- layout
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `layout`;


CREATE TABLE `layout`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`article_layout` TEXT,
	`template_layout` TEXT,
	`is_default` INTEGER default 0,
	`virtual_section_id` INTEGER,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `layout_name_unique` (`name`)
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- temporary_layout
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `temporary_layout`;


CREATE TABLE `temporary_layout`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`layout` TEXT,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- section_link
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `section_link`;


CREATE TABLE `section_link`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`section_id` INTEGER  NOT NULL,
	`link_id` INTEGER  NOT NULL,
	`target_blank` TINYINT default 1,
	PRIMARY KEY (`id`),
	UNIQUE KEY `unique_section_link` (`section_id`, `link_id`),
	CONSTRAINT `section_link_FK_1`
		FOREIGN KEY (`section_id`)
		REFERENCES `section` (`id`)
		ON DELETE CASCADE,
	INDEX `section_link_FI_2` (`link_id`),
	CONSTRAINT `section_link_FK_2`
		FOREIGN KEY (`link_id`)
		REFERENCES `link` (`id`)
		ON DELETE CASCADE
)ENGINE=InnoDB;

#-----------------------------------------------------------------------------
#-- section_document
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `section_document`;


CREATE TABLE `section_document`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`section_id` INTEGER  NOT NULL,
	`document_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE KEY `unique_section_document` (`section_id`, `document_id`),
	CONSTRAINT `section_document_FK_1`
		FOREIGN KEY (`section_id`)
		REFERENCES `section` (`id`)
		ON DELETE CASCADE,
	INDEX `section_document_FI_2` (`document_id`),
	CONSTRAINT `section_document_FK_2`
		FOREIGN KEY (`document_id`)
		REFERENCES `document` (`id`)
		ON DELETE CASCADE
)ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
