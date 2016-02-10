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
require_once 'config-file.php';
class sfDspaceMenuActions extends sfActions {
    
    public function indexarView(){
        
        $views= modulesView();
        $menu = array ($views);
        for ($i = 1; $i <= $views; $i++) {
        $obj = sediciPeer::retrieveByPK($i);
        $menu[$i] = array (
                        'id' => $obj->getId(),
			'type' => $obj->getType(),
			'context' => $obj->getContext(),
                        'description' => $obj->getDescription(),
                        'summary' => $obj->getSummary(),
                        'all' => $obj->getAllr(),
                        'cache' => $obj->getCache(),
                        'limit' => $obj->getLimitt(),
                        'max_lenght' => $obj->getMaxLenght(),
                        'date' => $obj->getDate(),
                        'max_results' => $obj->getMaxResults(),
			'show_author' => $obj->getShowAuthor()
	);
        }
        return($menu);
    }
    public function indexarSubtype(){
        $views= modulesView();
        $menu = array ($views);
        for ($i = 1; $i <= $views; $i++) {
        $obj = subtiposPeer::retrieveByPK($i);
         $subtype = array (
            'id' => $obj->getId(),
            'article' => $obj->getArticle(),
            'book' => $obj->getBook(),
            'working_paper' => $obj->getWorkingPaper(),
            'technical_report' => $obj->getTechnicalReport(),
            'conference_object' => $obj->getConferenceObject(),
            'revision' => $obj->getRevision(),
            'work_specialization' => $obj->getWorkSpecialization(),
            'licentiate' => $obj->getLicentiate(),
            'master' => $obj->getMaster(),
            'phd' => $obj->getPhd(),
            'preprint'=>$obj->getPreprint()
        );
        array_push ( $menu, $subtype );
        }
        return $menu;
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
        $licentiate = $this->On($this->getRequestParameter('licentiate'));
        $master = $this->On($this->getRequestParameter('master'));
        $phd = $this->On($this->getRequestParameter('phd'));
        return( array(
            'id' => $this->getRequestParameter('id'),
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
        $obj = subtiposPeer::retrieveByPK($st['id']);
        $obj->setArticle($st['article']);
        $obj->setBook($st['book']);
        $obj->setPreprint($st['preprint']);
        $obj->setWorkingPaper($st['working_paper']);
        $obj->setTechnicalReport($st['technical_report']);
        $obj->setConferenceObject($st['conference_object']);
        $obj->setRevision($st['revision']);
        $obj->setWorkSpecialization($st['work_specialization']);
        $obj->setLicentiate($st['licentiate']);
        $obj->setMaster($st['master']);
        $obj->setPhd($st['phd']);
        $obj->save();
    }
    
    public function setParameters($value){
        $prueba = sediciPeer::retrieveByPK($value['id']);
        $prueba->setType($value['type']);
        $prueba->setShowAuthor($value['show_author']);
        $prueba->setContext($value['context']);
        $prueba->setDescription($value['description']);
        $prueba->setSummary($value['summary']);
        $prueba->setLimitt($value['limit']);
        $prueba->setMaxLenght($value['max_lenght']);
        $prueba->setCache($value['cache']);
        $prueba->setAllr($value['all']);
        $prueba->setDate($value['date']);
        $prueba->setMaxResults($value['max_results']);
        $prueba->save();
    }
    
    public function executeIndex()
  {
    $this->un_dia=  oneDay();
    $this->valores=  cacheDays();
    $this->total_results = totalResults();
    $this->subtypes = subtypes();
    $this->st = $this->indexarSubtype();
    $this->value = $this->indexarView();
    $this->cant = modulesView();
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
