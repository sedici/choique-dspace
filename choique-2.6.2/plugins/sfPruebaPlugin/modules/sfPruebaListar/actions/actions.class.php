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
define ( 'RPP', '100' );
define ( 'FORMAT', 'atom' );
define ( 'SORTBY', '0' );
define ( 'ORDER', 'desc' );
define ( 'CONECTOR2', '%5C' );
define ( 'CONECTOR3', '%7C' );
define ( '_PROTOCOL', "http://" );
define ( '_DOMAIN', "sedici.unlp.edu.ar" );
define ( '_BASE_PATH', "/open-search/discover" );
function conector() {
	return CONECTOR2 . '+';
}
function get_conector() {
	return (CONECTOR2 . CONECTOR3 . CONECTOR2 . CONECTOR3 . CONECTOR2 . CONECTOR3);
}
function get_base_url() {
	return _PROTOCOL . _DOMAIN . _BASE_PATH;
}
function get_protocol_domain() {
	return _PROTOCOL . _DOMAIN;
}

require_once(dirname(__FILE__).'/../lib/model/SimplepieModel.php');
class sfPruebaListarActions extends sfActions {    
    public function Query() {
		$query = get_base_url () . "?rpp=" . RPP . "&format=" . FORMAT . "&sort_by=" . SORTBY . "&order=" . ORDER . "&start=";
		return $query;
	}    
    
    function queryAuthor($start, $context) {
		//query for author
		$consulta = $this->Query();
		$consulta .= $start . "&query=sedici.creator.person:\"$context\"";
		return $consulta;
	}
    
    
   public function executeIndex()
  {
    $prueba = sediciPeer::retrieveByPK(1);
    $context = $prueba->getName();
    $count = 0; $start=0;
    $groups = array ();
    $model = new SimplepieModel();
    do {	
	$query = $this->queryAuthor ( $start, $context );
	$xpath = $model->loadPath ( $query, 604800 );
	$count += $model->itemQuantity ( $xpath ); // number of entrys
	$totalResults = $model->totalResults ( $xpath );
	$entry = $model->entry ( $xpath ); //all documents
	$start += 100;
	array_push ( $groups, $entry );	
    } while ( $count < $totalResults );
    $this->name = $context;
    $this->groups = $groups;
       
  }
  
}
