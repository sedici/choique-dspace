<?php
// auto-generated by sfViewConfigHandler
// date: 2015/10/30 11:28:05
$context  = $this->getContext();
$response = $context->getResponse();


  $templateName = $response->getParameter($this->moduleName.'_'.$this->actionName.'_template', $this->actionName, 'symfony/action/view');
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (!$context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('robots', 'index, follow', false, false);
  $response->addMeta('keywords', ', Inicio, Pagina, inicio', false, false);
  $response->addMeta('language', 'es_AR', false, false);
  $response->addMeta('title', 'Choique CMS', false, false);
  $response->addMeta('description', 'Choique CMS | Un manejador de contenidos a medida', false, false);
  $response->addMeta('viewport', 'width=device-width; initial-scale=1.0; maximum-scale=1.0;', false, false);

  $response->addStylesheet('frontend/main', '', array ());
  $response->addJavascript('common', '');
  $response->addJavascript('jquery-1.4.2.min.js', '');
  $response->addJavascript('jquery-ui.min.js', '');
  $response->addJavascript('no-conflict.js', '');
  $response->addJavascript('/sfPrototypePlugin/js/prototype', '');


