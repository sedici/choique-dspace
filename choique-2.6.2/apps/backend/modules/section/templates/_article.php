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
<?php if ($section->hasArticle()): ?>
  <?php $article = $section->getArticle() ?>
  <?php echo link_to($article->__toString() . ' ' . image_tag('/sf/sf_admin/images/filter.png', array('alt' => '')),
                     'article/show?id=' . $article->getId(),
                     array('popup' => true,
                           'title' => __('Ver artículo (abre en una nueva ventana)'))) ?>
<?php else: ?>
  <?php echo __("La sección no posee un artículo por defecto") ?>
<?php endif ?>
