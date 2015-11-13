<?php
// auto-generated by sfRoutingConfigHandler
// date: 2015/11/10 10:39:01
$routes = sfRouting::getInstance();
$routes->setRoutes(
array (
  'homepage' => 
  array (
    0 => '/',
    1 => '/^[\\/]*$/',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'article',
      'action' => 'index',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'default_symfony' => 
  array (
    0 => '/symfony/:action/*',
    1 => '#^/symfony(?:\\/([^\\/]+))?(?:\\/(.*))?$#',
    2 => 
    array (
      0 => 'action',
    ),
    3 => 
    array (
      'action' => 1,
    ),
    4 => 
    array (
      'module' => 'default',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'ajax_article' => 
  array (
    0 => '/ajax/article/:type/:id',
    1 => '#^/ajax/article(?:\\/([^\\/]+))?(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'type',
      1 => 'id',
    ),
    3 => 
    array (
      'type' => 1,
      'id' => 1,
    ),
    4 => 
    array (
      'module' => 'ajax',
      'action' => 'getArticleById',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'article_shortcut' => 
  array (
    0 => '/article/:year/:month/:day/:name',
    1 => '#^/article(?:\\/([^\\/]+))?(?:\\/([^\\/]+))?(?:\\/([^\\/]+))?(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'year',
      1 => 'month',
      2 => 'day',
      3 => 'name',
    ),
    3 => 
    array (
      'year' => 1,
      'month' => 1,
      'day' => 1,
      'name' => 1,
    ),
    4 => 
    array (
      'module' => 'ajax',
      'action' => 'getArticleByName',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'show_all' => 
  array (
    0 => '/todasLasNoticias',
    1 => '#^/todasLasNoticias$#',
    2 => 
    array (
    ),
    3 => 
    array (
    ),
    4 => 
    array (
      'module' => 'article',
      'action' => 'showAll',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'default_index' => 
  array (
    0 => '/:module',
    1 => '#^(?:\\/([^\\/]+))?$#',
    2 => 
    array (
      0 => 'module',
    ),
    3 => 
    array (
      'module' => 1,
    ),
    4 => 
    array (
      'action' => 'index',
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
  'default' => 
  array (
    0 => '/:module/:action/*',
    1 => '#^(?:\\/([^\\/]+))?(?:\\/([^\\/]+))?(?:\\/(.*))?$#',
    2 => 
    array (
      0 => 'module',
      1 => 'action',
    ),
    3 => 
    array (
      'module' => 1,
      'action' => 1,
    ),
    4 => 
    array (
    ),
    5 => 
    array (
    ),
    6 => '',
  ),
)
);
