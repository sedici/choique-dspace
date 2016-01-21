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
   
    public function indexarView(){
        $obj = sediciPeer::retrieveByPK(1);
        return ( array (
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
	));
        } 
    public function indexarSubtype(){
        $obj = subtiposPeer::retrieveByPK(1);
        return (array (
            'article' => $obj->getArticle(),
            'book' => $obj->getBook(),
            'preprint'=>$obj->getPreprint()
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
        return( array(
            'article' => $article,
            'book' => $book,
            'preprint' => $preprint
        ));  
    }
    
    public function setParametersSt($st){
        $obj = subtiposPeer::retrieveByPK(1);
        $obj->setArticle($st['article']);
        $obj->setBook($st['book']);
        $obj->setPreprint($st['preprint']);
        $obj->save();
    }
    
    public function setParameters($value){
        $prueba = sediciPeer::retrieveByPK(1);
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
    $un_dia=86400;
    $valores=array(
        $un_dia  => '1',
        $un_dia * 3    => '3',
        $un_dia * 7 => '7',
        $un_dia * 14    => '14',
    );          
    $this->un_dia=$un_dia;
    $this->valores=$valores;
    $this->total_results = array(
        0 => "Todos",
        10=>10,
        25=>25,
        50=>50,
        100=>100);
    $this->subtypes = array ("article" => "Artículo",
                             "book" => "Libro",
                             "preprint" => "Preprint"
		);
    $this->st = $this->indexarSubtype();
    $this->value = $this->indexarView();
  }
  
 
  
  public function executeSave()
  {            
    $value = $this->indexarSave();
    $st = $this->indexarSaveST();
    $this->setParameters($value);
    $this->setParametersST($st);
    choiqueFlavors::getInstance()->clearCache('all');
    return $this->redirect("sfPrueba/index");
  }
  
}
