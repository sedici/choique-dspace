<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define ('CANT' , 10);
define ('ONEDAY' , 86400);

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

function subtypes (){
    return ( array ("article" => "Artículo",
                             "book" => "Libro",
                             "working_paper" =>"Documento de trabajo",
                             "technical_report" =>"Informe tecnico",
                             "conference_object" =>"Objeto de conferencia",
                             "revision" =>"Revisión",
                             "work_specialization" =>"Trabajo de especialización",
                             "phd" =>"Tesis de doctorado",
                             "licentiate" =>"Tesis de grado",
                             "master" =>"Tesis de maestria",
                             "preprint" => "Preprint"
		));
}

