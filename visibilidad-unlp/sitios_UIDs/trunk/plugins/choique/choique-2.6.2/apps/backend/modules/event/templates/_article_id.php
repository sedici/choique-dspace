<?php 
/*
 * Choique CMS - A Content Management System.
 * Copyright (C) 2012 CeSPI - UNLP <desarrollo@cespi.unlp.edu.ar>
 * 
 * This file is part of Choique CMS.
 * 
 * Choique CMS is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License v2.0 as published by
 * the Free Software Foundation.
 * 
 * Choique CMS is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with Choique CMS.  If not, see <http://www.gnu.org/licenses/gpl-2.0.html>.
 */ ?>
<?php use_helper('Javascript') ?>

<?php echo input_hidden_tag('event[article_id]', ($event->isNew() ? null : $event->getArticleId())) ?>
<?php echo input_auto_complete_tag('article_id_search',
                                   ($event->isNew() ? '' : strval($event->getArticle())),
                                   'event/autocompleteArticle?_csrf_token='.csrf_token(),
                                   array('size' => '80'),
                                   array('use_style' => true,
                                         'after_update_element' => "function(inputField, selectedItem) { $('event_article_id').value = selectedItem.id; }",
                                         'indicator' => 'searching')) ?>

<?php echo link_to_function(__('Limpiar campo'), "$('event_article_id').value = ''; $('article_id_search').value = '';") ?>

<span id="searching" style="display:none;">
  <?php echo image_tag('common/indicator.gif') ?> <?php echo __('Buscando...') ?>
</span>