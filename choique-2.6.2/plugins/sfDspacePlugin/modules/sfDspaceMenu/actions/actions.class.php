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
require_once 'previewActions.class.php';
require_once 'config-file.php';
class sfDspaceMenuActions extends previewActions {
    
    public function ValideteCant(){
        $views= modulesView();
        $menu = array ($views);
        $c = new Criteria();
        $module = sediciPeer::doSelect($c);
        $size = count($module);
        if ($size < $views ) $views=$size;
        return $views;
    }
    
    public function indexarView(){
        $views= modulesView();
        $menu = array ($views);
        $c = new Criteria();
        $module = sediciPeer::doSelect($c);
        $size = count($module);
        if ($size < $views ) $views=$size;
        for ($i = 0; $i < $views; $i++) {
        $subtypes = $this->indexarSubtype($module[$i]->getId());  
        $menu[$i] = array (
                        'id' => $module[$i]->getId(),
			'type' => $module[$i]->getType(),
			'context' => $module[$i]->getContext(),
                        'description' => $module[$i]->getDescription(),
                        'summary' => $module[$i]->getSummary(),
                        'all' => $module[$i]->getAllResults(),
                        'cache' => $module[$i]->getCache(),
                        'limit' => $module[$i]->getLimitText(),
                        'max_lenght' => $module[$i]->getMaxLenght(),
                        'date' => $module[$i]->getDate(),
                        'max_results' => $module[$i]->getMaxResults(),
			'show_author' => $module[$i]->getShowAuthor(),
                        'subtypes'=>$subtypes
	);
        }
        return($menu);
    }
    public function indexarSubtype($i){        
        $c = new Criteria();
        $c->add(subtiposPeer::ID_SEDICI, $i);
        $subtypesSelected = subtiposPeer::doSelectOne($c);
        return(array (
            'article' => $subtypesSelected->getArticle(),
            'book' => $subtypesSelected->getBook(),
            'working_paper' => $subtypesSelected->getWorkingPaper(),
            'technical_report' => $subtypesSelected->getTechnicalReport(),
            'conference_object' => $subtypesSelected->getConferenceObject(),
            'revision' => $subtypesSelected->getRevision(),
            'work_specialization' => $subtypesSelected->getWorkSpecialization(),
            'licentiate_thesis' => $subtypesSelected->getLicentiate(),
            'master_thesis' => $subtypesSelected->getMaster(),
            'phD_thesis' => $subtypesSelected->getPhd(),
            'preprint'=>$subtypesSelected->getPreprint()
        ));
    }    
        
    public function indexarSave(){
            $show_author=$this->getRequestParameter('show_author');
            $show_author=($show_author=="on") ;
            $description =$this->getRequestParameter('description');
            $description= ($description == "on");
            $summary =$this->getRequestParameter('summary');
            $summary= ($summary == "on");
            $date =$this->getRequestParameter('date');
            $date= ($date == "on");
            $limit =$this->getRequestParameter('limit');
            $limit= ($limit == "on");
            $all =$this->getRequestParameter('all');
            $all= ($all == "on");
            $max_results = $this->getRequestParameter('max_results');
            return ( array (
                        'id' => $this->getRequestParameter('id'),
			'type' => $this->getRequestParameter('type'),
			'context' => $this->getRequestParameter('context'),
                        'description' => $description,
                        'summary' => $summary,
                        'date' => $date,
                        'limit' => $limit,
                        'max_lenght' => $this->getRequestParameter('max_lenght'),
                        'cache'  => $this->getRequestParameter('cache'),
                        'all' => $all,
                        'max_results' => $max_results,
			'show_author' => $show_author
	));
    }
    public function On($value){
        if($value == "on") return (true);
        else return (false);
    }
    
    public function indexarSaveST(){
        $article=  $this->On ($this->getRequestParameter('article'));
        $book= $this->On( $this->getRequestParameter('book'));
        $preprint=$this->On($this->getRequestParameter('preprint'));
        $working_paper=$this->On($this->getRequestParameter('working_paper'));
        $technical_report=$this->On($this->getRequestParameter('technical_report'));
        $conference_object=$this->On($this->getRequestParameter('conference_object'));
        $revision=$this->On($this->getRequestParameter('revision'));
        $work_specialization=$this->On($this->getRequestParameter('work_specialization'));
        $licentiate = $this->On($this->getRequestParameter('licentiate_thesis'));
        $master = $this->On($this->getRequestParameter('master_thesis'));
        $phd = $this->On($this->getRequestParameter('phD_thesis'));
        return( array(
            'id_sedici' => $this->getRequestParameter('id'),
            'article' => $article,
            'book' => $book,
            'working_paper' => $working_paper,
            'technical_report' => $technical_report,
            'conference_object' => $conference_object,
            'revision' => $revision,
            'work_specialization' => $work_specialization,
            'licentiate'=> $licentiate,
            'master'=> $master,
            'phd'=> $phd,
            'preprint' => $preprint
        ));  
    }
    
    public function setParametersSt($st){
        $c = new Criteria();
        $c->add(subtiposPeer::ID_SEDICI, $st['id_sedici']);
        $subtypes =  subtiposPeer::doSelectOne($c);
        $subtypes->setArticle($st['article']);
        $subtypes->setBook($st['book']);
        $subtypes->setPreprint($st['preprint']);
        $subtypes->setWorkingPaper($st['working_paper']);
        $subtypes->setTechnicalReport($st['technical_report']);
        $subtypes->setConferenceObject($st['conference_object']);
        $subtypes->setRevision($st['revision']);
        $subtypes->setWorkSpecialization($st['work_specialization']);
        $subtypes->setLicentiate($st['licentiate']);
        $subtypes->setMaster($st['master']);
        $subtypes->setPhd($st['phd']);
        $subtypes->save();
    }
    
    public function setParameters($value){
        $module = sediciPeer::retrieveByPK($value['id']);
        $module->setType($value['type']);
        $module->setShowAuthor($value['show_author']);
        $module->setContext($value['context']);
        $module->setDescription($value['description']);
        $module->setSummary($value['summary']);
        $module->setLimitText($value['limit']);
        $module->setMaxLenght($value['max_lenght']);
        $module->setCache($value['cache']);
        $module->setAllResults($value['all']);
        $module->setDate($value['date']);
        $module->setMaxResults($value['max_results']);
        $module->save();
    }
    
    public function executeIndex()
  {
    $cultura = $this->getRequest()->getLanguages();
    $this->getUser()->setCulture($cultura[0]);
    $this->un_dia=  oneDay();
    $this->valores=  cacheDays();
    $this->total_results = totalResults();
    $this->subtypes = Allsubtypes();
    $this->value = $this->indexarView();
    $this->cant = $this->ValideteCant();
  }
  
 
  
  public function executeSave()
  {            
    $value = $this->indexarSave();
    $st = $this->indexarSaveST();
    $this->setParameters($value);
    $this->setParametersST($st);
    choiqueFlavors::getInstance()->clearCache('all');
    return $this->redirect("sfDspaceMenu/index");
  }
  
}
