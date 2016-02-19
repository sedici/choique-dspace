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

function Allsubtypes(){
    // Return all document subtypes in a dictionary
    return (
           array(
            'article' => 'Articulo',
            'book' => 'Libro',
            'working_paper' =>  "Documento de trabajo",
            'technical_report' => "Informe tecnico",
            'conference_object' => "Objeto de conferencia",
            'revision' => "Revision",
            'work_specialization' => "Trabajo de especializacion",
            'licentiate_thesis'=>"Tesis de grado",
            'master_thesis'=>  "Tesis de maestria",
            'phD_thesis'=>"Tesis de doctorado",
            'preprint' => 'Preprint')
            );
}