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
    $this->show_author=$prueba->getPrueba();
    $this->type = $prueba->getName();
  }
  
  public function executeSave()
  {            
    $name = $this->getRequestParameter('type');
    $show_author=$this->getRequestParameter('show_author');
    if ($show_author) $show_author=1;
            else $show_author=0;
    $prueba = sediciPeer::retrieveByPK(1);
    $prueba->setName($name);
    $prueba->setPrueba($show_author);
    $prueba->save();
    
    choiqueFlavors::getInstance()->clearCache('all');
    return $this->redirect("sfPrueba/index");
  }
  
}
