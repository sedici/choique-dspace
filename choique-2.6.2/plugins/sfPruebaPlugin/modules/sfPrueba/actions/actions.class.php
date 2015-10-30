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
    $this->prueba = $prueba->getName();
  }
  
  public function executeSave()
  {            
    $name = $this->getRequestParameter('name');

    $prueba = sediciPeer::retrieveByPK(1);
    $prueba->setName($name);
    $prueba->save();
    
    choiqueFlavors::getInstance()->clearCache('all');
    return $this->redirect("sfPrueba/index");
  }
  
}
