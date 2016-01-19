<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of actions
 *
 * @author paw
 */
class sfPruebaActions extends sfActions {
   
   public function executeIndex()
  {
    $prueba = sediciPeer::retrieveByPK(1);
    $this->type=$prueba->getType();
    $this->show_author = $prueba->getShowAuthor();
  }
  
  public function executeSave()
  {            
    $type= $this->getRequestParameter('type');
    $show_author=$this->getRequestParameter('show_author');
    if($show_author=="on") $show_author=true;
    else $show_author=false;
    $prueba = sediciPeer::retrieveByPK(1);
    $prueba->setType($type);
    $prueba->setShowAuthor($show_author);
    $prueba->save();
    
    choiqueFlavors::getInstance()->clearCache('all');
    return $this->redirect("sfPrueba/index");
  }
  
}
