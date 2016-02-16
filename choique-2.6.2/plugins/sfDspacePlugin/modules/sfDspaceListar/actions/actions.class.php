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


require_once(dirname(__FILE__).'/../lib/model/SimplepieModel1.php');
require_once 'config-file.php';


class sfDspaceListarActions extends sfActions {            
    function UrlSedici($filter, $handle) {
		//URL : go to sedici by subtype and handle
		$filter = strtolower ( $filter ); 
		$word = explode ( " ", $filter ); 
		$url = get_protocol_domain () . "/handle/" . $handle . "/discover?fq=type_filter%3A";
		$cant = count ( $word ); 
		$url = $url . $word [0]; 
		for($i = 1; $i < $cant; $i ++) {
			$url = $url . conector () . $word [$i];
		}
		$uppercase  = ucfirst ( $filter );
		$word = explode ( " ", $uppercase  );
		$url = $url . get_conector ();
		$cant = count ( $word );
		$url = $url . $word [0];
		for($i = 1; $i < $cant; $i ++) {
			$url = $url . conector () . $word [$i];
		}
		return $url;
	}
	function queryAllHandle($start, $context, $subtypes) {
		//all results of query handle
		$query = query();
		$query .= $start . "&scope=" . $context;
		return $query;
	}
	function queryHandle($start, $context, $subtypes) {
		//weapon query handle for publications particular subtype
		$i = 1;
		$query = query();
		$query .= $start . "&scope=" . $context . "&query=sedici.subtype:";
		$count_filter = count ( $subtypes );
		foreach ( $subtypes as $f ) {
			$query .= "\"" . $f . "\"";
			if ($i != $count_filter) {
				$query .= "%20OR%20sedici.subtype:";
			}
			$i ++;
		}
		return $query;
	}
	function queryAuthor($start, $context, $subtypes) {
		//query for author
		$consulta = query();
		$consulta .= $start . "&query=sedici.creator.person:\"$context\"";
		return $consulta;
	}
        function queryFree($start, $context, $subtypes) {
		//query for free search
		$consulta = query();
		$consulta .= $start . "&query=\"$context\"";
		return $consulta;
	}
        
    public function convertirEspIng($filtro) {
		//Pasa los subtipos al ingles para la comparacion con el shortcode
		$subtypes = subtypes();
		return ($subtypes[$filtro]);
	}    
        
    public function typeOfQuery($type,$all){
        if ($type == "handle") {
            if ($all) {
		return ('queryAllHandle');
            } else {
		return ('queryHandle');
            }
	} else {
        if ($type == "author"){
            return ('queryAuthor');
        }
            else {
            //Is free search
                return ('queryFree');
            }
	}
    }    
        
    function group_subtypes($type, $all, $context, $selected_subtypes, $groups,$cache) {
		$start = 0; 
		$count = 0;
		$model = new SimplepieModel1();
                $TypeQuery = $this->typeOfQuery($type, $all); 
		do {
			call_user_func($TypeQuery, array($start, $context, $selected_subtypes) );
                        $query = $this->$TypeQuery($start , $context , $selected_subtypes  );
			$xpath = $model->loadPath ( $query, $cache );
			$count += $model->itemQuantity ( $xpath ); // number of entrys
			$totalResults = $model->totalResults ( $xpath );
			$entry = $model->entry ( $xpath ); //all documents
			$start += 100;	
			if ($all) {
				array_push ( $groups, $entry );
			} else {
				foreach ( $entry as $e ) {
					$subtype = $model->type ( $e ); // document subtype
					if (array_key_exists ( $subtype, $groups )) {
						array_push ( $groups [$subtype], $e );
					}
				}
			}
		} while ( $count < $totalResults );
		return ($groups);
	}
        
   public function indexar(){
        $obj = sediciPeer::retrieveByPK($this->getRequest()->getParameterHolder()->get('id'));
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
    public function subtypes(){
        $obj = subtiposPeer::retrieveByPK($this->getRequest()->getParameterHolder()->get('id'));
        return ( array(
            'article' => $obj->getArticle(),
            'book' => $obj->getBook(),
            'working_paper' =>  $obj->getWorkingPaper(),
            'technical_report' => $obj->getTechnicalReport(),
            'conference_object' => $obj->getConferenceObject(),
            'revision' => $obj->getRevision(),
            'work_specialization' => $obj->getWorkSpecialization(),
            'licentiate'=>$obj->getLicentiate(),
            'master'=>  $obj->getMaster(),
            'phd'=>$obj->getPhd(),
            'preprint' => $obj->getPreprint()
        ) );
    }
        
  function group_attributes($description, $date, $show_author, $context, $maxlenght, $maxresults) {
		return ( array (
				'description' => $description,
				'show_author' => $show_author,
				'context' => $context,
				'max_lenght' => $maxlenght,
                                'max_results' => $maxresults,
				'date' => $date 
		));
	}  
    function view_subtypes($selected_subtypes, $type ,$context) {
		$publications = array (); // documents for the view
		while ( list ( $key, $val ) = each ( $selected_subtypes ) ) {
			// $val: all documents by subtype
			$elements = count ( $val );
			if ($elements > 0) {
				// $key: document subtype
				if ($type == 'handle') {
					$url = $this->UrlSedici ( $key, $context );
					$colection = array (
							'view' => $val,
							'url' => $url,
							'filter' => $key 
					);
				} else { // author and free search
					$colection = array (
							'view' => $val,
							'filter' => $key 
					);
				}
				array_push ( $publications, $colection );
			}
		}
		return ($publications);
	}    
    
   public function executeIndex()
  {       
    $instance = $this->indexar();
    $subtypes = $this->subtypes();
    If ( $instance ['description']) {
	if ($instance ['summary']) {
            $description = "summary"; 
	// checkbox description and summary ON
	} else {
            $description = "description";
            // checkbox description ON, summary OFF
		}
    } else { $description = false;}
    if ('on' == $instance ['limit']){
	//shorten text
	$maxlenght = $instance ['max_lenght'];
	if ($maxlenght == 0){
            $maxlenght = max_lenght();
            //default lenght
	}
    } else { $maxlenght = 0; }
    $selected_subtypes = array (); 
			// $selected_subtypes: subtypes selected by the user
    $groups = array ();
    // $groups: groups publications by subtype
    foreach ($subtypes as $key => $val){
				//compares the user marked subtypes, if ON, save the subtype.
				if ($val) {
                                        $keyEsp = $this->convertirEspIng($key);
					array_push ( $selected_subtypes, $keyEsp );
					$groups [$keyEsp] = array ();
				}
			}
    
    $groups = $this->group_subtypes ( $instance['type'], $instance['all'], $instance['context'], $selected_subtypes, $groups, $instance['cache'] );
    if (! $instance['all']) {
	//elements to view publications by subtypes
	$groups = $this->view_subtypes ( $groups, $instance['type'], $instance['context'] );
    }
    
    $attributes = $this->group_attributes ( $description, $instance['date'], $instance['show_author'], $instance['context']  , $maxlenght,$instance['max_results'] );
    if ($instance['type'] != 'author')  $attributes['show_author'] = TRUE;
    $this->groups=$groups;
    $this->attributes=$attributes;
    $this->type=$instance['type'];
    $this->all=$instance['all'];
  }
  
}
