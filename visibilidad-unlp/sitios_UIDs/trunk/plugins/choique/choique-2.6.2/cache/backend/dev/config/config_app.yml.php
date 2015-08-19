<?php
// auto-generated by sfDefineEnvironmentConfigHandler
// date: 2015/08/19 15:58:17
sfConfig::add(array(
  'app_choique_version' => '2.6.0',
  'app_choique_instance_name' => 'Choique CMS',
  'app_choique_url' => array (
  'frontend' => '/home/virtual/choique/choique-2.6.2/web-frontend',
  'backend' => '/home/virtual/choique/choique-2.6.2/web-backend',
),
  'app_choique_default_flavor_dir' => '/home/virtual/choique/choique-2.6.2/data/default-flavor',
  'app_choique_testing' => false,
  'app_choique_testing_text' => 'Version de PRUEBA',
  'app_lucene_index' => 'CMSIndex',
  'app_lucene_advanced' => false,
  'app_lucene_categories' => false,
  'app_lucene_per_page' => 20,
  'app_lucene_pager_radius' => 10,
  'app_lucene_result_size' => 200,
  'app_lucene_result_highlighter' => '<strong class="highlight">%s</strong>',
  'app_lucene_extractors' => array (
  'doc' => '/usr/bin/catdoc %s',
  'pdf' => '/usr/bin/pdftotext %s -',
  'ppt' => '/usr/bin/catppt %s',
  'xls' => '/usr/bin/xls2csv %s',
  'odt' => '/usr/bin/odt2txt %s',
  'ods' => '/usr/bin/ods2txt %s',
  'odp' => '/usr/bin/odp2txt %s',
),
  'app_valid_mime_types_text' => array (
  'txt' => 'text/plain',
),
  'app_valid_mime_types_editor' => array (
  'css' => 
  array (
    'css' => 
    array (
      0 => 'text/plain',
      1 => 'text/x-c charset=us-ascii',
      2 => 'text/plain charset=us-ascii',
    ),
  ),
  'images' => 
  array (
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'png' => 'image/png',
    'gif' => 'image/gif',
    'ico' => 
    array (
      0 => 'image/png',
      1 => 'image/gif',
      2 => 'image/x-ico',
    ),
  ),
),
  'app_valid_mime_types_link' => array (
  'swf' => 'application/x-shockwave-flash',
  'jpg' => 'image/jpeg',
  'jpeg' => 'image/jpeg',
  'png' => 'image/png',
  'gif' => 'image/gif',
),
  'app_valid_mime_types_document' => array (
  'doc' => 
  array (
    0 => 'application/msword',
    1 => 'application/vnd.ms-office',
  ),
  'docx' => 'application/zip',
  'xls' => 'application/vnd.ms-excel',
  'ppt' => 'application/vnd.ms-office',
  'pps' => 'application/vnd.ms-office',
  'pdf' => 'application/pdf',
  'rar' => 'application/x-rar',
  'zip' => 'application/zip',
  'rtf' => 'text/rtf',
),
  'app_valid_mime_types_multimedia' => array (
  'images' => 
  array (
    'jpg' => 
    array (
      0 => 'image/jpeg',
    ),
    'jpeg' => 
    array (
      0 => 'image/jpeg',
    ),
    'png' => 
    array (
      0 => 'image/png',
    ),
    'gif' => 
    array (
      0 => 'image/gif',
    ),
  ),
  'videos' => 
  array (
    'mpg' => 
    array (
      0 => 'video/mpeg',
    ),
    'mpeg' => 
    array (
      0 => 'video/mpeg',
    ),
    'flv' => 
    array (
      0 => 'video/x-flv',
    ),
    'swf' => 
    array (
      0 => 'application/x-shockwave-flash',
    ),
  ),
  'audio' => 
  array (
    'mp3' => 
    array (
      0 => 'application/octet-stream',
      1 => 'audio/mpeg',
    ),
    'mp2' => 
    array (
      0 => 'audio/mpeg',
    ),
    'wav' => 
    array (
      0 => 'audio/x-wav',
    ),
  ),
),
  'app_sf_guard_plugin_success_signin_url' => '@homepage',
  'app_sf_guard_plugin_success_signout_url' => '@homepage',
  'app_sf_captchagd_image_width' => 150,
  'app_sf_captchagd_routes_register' => false,
  'app_sf_captchagd_image_height' => 70,
  'app_sf_captchagd_chars' => '123456789',
  'app_sf_captchagd_length' => 5,
  'app_sf_captchagd_font_size' => 24,
  'app_sf_captchagd_font_color' => array (
  0 => '252525',
  1 => '8b8787',
  2 => '550707',
  3 => '3526E6',
  4 => '88531E',
),
  'app_sf_captchagd_fonts' => array (
  0 => 'akbar/akbar.ttf',
  1 => 'brushcut/BRUSHCUT.TTF',
  2 => 'molten/molten.ttf',
  3 => 'planet_benson/Planetbe.ttf',
  4 => 'whoobub/WHOOBUB_.TTF',
),
  'app_sf_captchagd_background_color' => 'DDDDDD',
  'app_sf_captchagd_border_color' => 0,
));
