<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  $r = sfRouting::getInstance();
  $r->prependRoute('pre_view', '/pre_view', array('module' => 'sfDspaceMenu', 'action' => 'preview'));
