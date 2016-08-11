<?php

/**
 * Plugin Name: Sedici-Plugin
 * Plugin URI: http://sedici.unlp.edu.ar/
 * Description: This plugin connects the repository SEDICI in choique, with the purpose of showing the publications of authors or institutions
 * Version: 1.0
 * Author: SEDICI - Paula Salamone Lacunza
 * Author URI: http://sedici.unlp.edu.ar/
 * Copyright (c) 2016 SEDICI UNLP, http://sedici.unlp.edu.ar
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 */
if (in_array('sfDspace', sfConfig::get('sf_enabled_modules', array()))){
  $r = sfRouting::getInstance();
  $r->prependRoute('pre_view', '/pre_view', array('module' => 'sfDspaceMenu', 'action' => 'preview'));
}