<?php
// auto-generated by sfViewConfigHandler
// date: 2015/08/19 15:53:27
$context  = $this->getContext();
$response = $context->getResponse();


  $templateName = $response->getParameter($this->moduleName.'_'.$this->actionName.'_template', $this->actionName, 'symfony/action/view');
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (!$context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);
  $response->addMeta('title', 'ChoiqueCMS | Administración', false, false);
  $response->addMeta('robots', 'index, follow', false, false);
  $response->addMeta('description', 'symfony project', false, false);
  $response->addMeta('keywords', 'symfony, project', false, false);
  $response->addMeta('language', 'es', false, false);

  $response->addStylesheet('backend/main', '', array ());
  $response->addStylesheet('backend/login', '', array ());
  $response->addStylesheet('backend/backend', '', array ());
  $response->addJavascript('jquery-1.4.2.min.js', '');
  $response->addJavascript('no-conflict.js', '');
  $response->addJavascript('/sfPrototypePlugin/js/prototype.js', '');
  $response->addJavascript('/sfPrototypePlugin/js/effects.js', '');
  $response->addJavascript('/sfPrototypePlugin/js/controls.js', '');
  $response->addJavascript('/sfPrototypePlugin/js/scriptaculous.js', '');


