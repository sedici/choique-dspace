<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define ('CANT' , 5);
define ('ONEDAY' , 86400);
define ( 'RPP', '100' );
define ( 'FORMAT', 'atom' );
define ( 'SORTBY', '0' );
define ( 'ORDER', 'desc' );
define ( 'CONECTOR2', '%5C' );
define ( 'CONECTOR3', '%7C' );
define ( '_PROTOCOL', "http://" );
define ( '_DOMAIN', "sedici.unlp.edu.ar" );
define ( '_BASE_PATH', "/open-search/discover" );
define ('MAX_LENGHT', 150);

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
function query() {
    return ( get_base_url () . "?rpp=" . RPP . "&format=" . FORMAT . "&sort_by=" . SORTBY . "&order=" . ORDER . "&start=" );
}

function max_lenght(){
    return (MAX_LENGHT);
}

function modulesView(){
    return (CANT);
}

function oneDay(){
    return (ONEDAY);
}

function cacheDays(){
    $day = oneDay();
return (array(
        $day  => '1',
        $day * 3    => '3',
        $day * 7 => '7',
        $day * 14    => '14',
    )          
  );
}

function totalResults(){
    return ( array(
        0 => "Todos",
        10=>10,
        25=>25,
        50=>50,
        100=>100));
}

function Allsubtypes (){
    return ( array ("article" => "Articulo",
                             "book" => "Libro",
                             "working_paper" =>"Documento de trabajo",
                             "technical_report" =>"Informe tecnico",
                             "conference_object" =>"Objeto de conferencia",
                             "revision" =>"Revision",
                             "work_specialization" =>"Trabajo de especializacion",
                             "phD_thesis" =>"Tesis de doctorado",
                             "licentiate_thesis" =>"Tesis de grado",
                             "master_thesis" =>"Tesis de maestria",
                             "preprint" => "Preprint"
		));
}

