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
require_once(dirname(__FILE__).'/../lib/model/SimplepieModel.php');
require_once (__DIR__).'/config/Query.php';
include_once (__DIR__).'/config/config.php';
require_once (__DIR__).'/config/Filter.php';
class previewActions extends sfActions {
        
   public function indexar($modulo){
        $module = sediciPeer::retrieveByPK($modulo);
        return ( array (
			'handle' => $module->getHandle(),
			'author' => $module->getAuthor(),
                        'key_words' => $module->getKeyWords(),
                        'description' => $module->getDescription(),
                        'summary' => $module->getSummary(),
                        'all' => $module->getAllResults(),
                        'cache' => $module->getCache(),
                        'limit' => $module->getLimitText(),
                        'max_lenght' => $module->getMaxLenght(),
                        'date' => $module->getDate(),
                        'max_results' => $module->getMaxResults(),
			'show_author' => $module->getShowAuthor()
	));
    }
    public function subtypes($modulo){
        $subtypesSelected = subtiposPeer::retrieveByPK($modulo);
        return ( array(
            'article' => $subtypesSelected->getArticle(),
            'book' => $subtypesSelected->getBook(),
            'working_paper' =>  $subtypesSelected->getWorkingPaper(),
            'technical_report' => $subtypesSelected->getTechnicalReport(),
            'conference_object' => $subtypesSelected->getConferenceObject(),
            'revision' => $subtypesSelected->getRevision(),
            'work_specialization' => $subtypesSelected->getWorkSpecialization(),
            'licentiate_thesis'=>$subtypesSelected->getLicentiate(),
            'master_thesis'=> $subtypesSelected->getMaster(),
            'phD_thesis'=>$subtypesSelected->getPhd(),
            'preprint' => $subtypesSelected->getPreprint()
        ) );
    }  
    
    
    public function description($description,$summary){
            If ($description) {
		if ($summary ) {
                    return "summary"; 
                    // checkbox description and summary ON
                } else { return "description"; } // checkbox description ON, summary OFF
            } else { return false;}
        }
    public function limit_text($limit,$max){
            if ($limit){
                if ( (empty($max)) || ($max < min_results())){
                    $max =  show_text(); //default lenght
                }
            } else { $max = null; }
            return $max;
        }
   function querySubtypes ($instance,$all) {
            //this function returns all active subtypes
            if (!$all){
             $groups = array ();
             $filter = new Filter ();
             $subtypes = $filter->subtypes ();
			// $subtypes: all names of subtypes
			foreach ($subtypes as $key => $subtype){
				// compares the user marked subtypes, if TRUE, save the subtype.
				if ($instance [$key]) {
                                    array_push($groups, $subtype);
				}
			}
                return $groups;
             }
            else { return; }   
        }
        
   public function executePreview()
  {       
    $modulo = $this->getRequestParameter('modulo'); 
    $instance = $this->indexar($modulo);
    
    $util = new Query();
    if ($util->validete($instance['author'],$instance['handle'],$instance['key_words'])){
        $selected_subtypes = $this->subtypes($modulo);
        $description = $this->description($instance ['description'], $instance ['summary']);
        $maxlenght = $this->limit_text($instance ['limit'], $instance ['max_lenght']);
        $subtypes = $this->querySubtypes($selected_subtypes,$instance['all']);
        
        $queryStandar = $util->standarQuery($instance['handle'], $instance['author'], $instance['key_words'], $instance['max_results']);
        $groups = $util->getPublications($instance['all'], $queryStandar, $instance['cache'], $subtypes);
        $attributes = $util->group_attributes ( $description, $instance['date'], $instance['show_author'], $maxlenght);
        
        $cultura = $this->getRequest()->getLanguages();
        $this->getUser()->setCulture($cultura[0]);
        
        $this->util=$util;
        $this->attributes=$attributes;
        $this->groups=$groups;
        $this->all=$instance['all']; 
    }
  }  
}
