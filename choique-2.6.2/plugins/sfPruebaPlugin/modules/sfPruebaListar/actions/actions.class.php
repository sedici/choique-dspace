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
        protected $max_lenght_text;
	protected $query;
	protected $one_day;
	protected $cache_days;
	protected $total_results;	
	public function Query() {
		$this->query = get_base_url () . "?rpp=" . RPP . "&format=" . FORMAT . "&sort_by=" . SORTBY . "&order=" . ORDER . "&start=";
		$this->cache_days = array (7,1,3,14);
		$this->one_day = 86400;
		$this->total_results = array(0,10,25,50,100);
		$this->max_lenght_text = 150;
	}
	public function max_lenght_text(){
		return $this->max_lenght_text;
	}
	public function one_day(){
		return $this->one_day;
	}
	public function cache_days(){
		return $this->cache_days;
	}
	public function total_results() {
		return  $this->total_results;
	}
    
    
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
	function queryAllHandle($start, $context) {
		//all results of query handle
		$query = $this->query;
		$query .= $start . "&scope=" . $context;
		return $query;
	}
	function queryHandle($start, $context, $subtypes) {
		//weapon query handle for publications particular subtype
		$i = 1;
		$query = $this->query;
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
	function queryAuthor($start, $context) {
		//query for author
		$consulta = $this->query;
		$consulta .= $start . "&query=sedici.creator.person:\"$context\"";
		return $consulta;
	}
        function queryFree($start, $context) {
		//query for free search
		$consulta = $this->query;
		$consulta .= $start . "&query=\"$context\"";
		return $consulta;
	}
        
    function group_subtypes($type, $all, $context, $selected_subtypes, $groups,$cache) {
		$start = 0; 
		$count = 0;
		$model = new SimplepieModel();
		do {
			if ($type == "handle") {
				if ($all) {
					$query = $this->queryAllHandle ( $start, $context );
				} else {
					$query = $this->queryHandle ( $start, $context, $selected_subtypes );
				}
			} else {
                            if ($type == "author"){
				$query = $this->queryAuthor ( $start, $context );
                            }
                            else {
                                //Is free search
                                $query = $this->queryFree($start, $context);
                            }
			}
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
			'show_author' => $obj->getShowAuthor()
	));
    }
        
  function group_attributes($description, $date, $show_author, $context, $maxlenght) {
		return ( array (
				'description' => $description,
				'show_author' => $show_author,
				'context' => $context,
				'max_lenght' => $maxlenght,
				'date' => $date 
		));
	}  
    
   public function executeIndex()
  {
    $this->Query();
    $instance = $this->indexar();
    If ( $instance ['description']) {
	if ($instance ['summary']) {
            $description = "summary"; 
	// checkbox description and summary ON
	} else {
            $description = "description";
            // checkbox description ON, summary OFF
		}
    }
    if ('on' == $instance ['limit']){
	//shorten text
	$maxlenght = $instance ['max_lenght'];
	if ($maxlenght == 0){
            $maxlenght = 150;
            //default lenght
	}
    } else { $maxlenght = 0; }
    $selected_subtypes = array (); 
			// $selected_subtypes: subtypes selected by the user
    $groups = array ();
    // $groups: groups publications by subtype
    $groups = $this->group_subtypes ( $instance['type'], $instance['all'], $instance['context'], $selected_subtypes, $groups, $instance['cache'] );
    $attributes = $this->group_attributes ( $description, $instance['date'], $instance['show_author'], $instance['context']  , $maxlenght);
    if ($instance['type'] != 'author')  $attributes['show_author'] = TRUE;
    $this->groups=$groups;
    $this->attributes=$attributes;
    $this->type=$instance['type'];
    $this->all=$instance['all'];
  }
  
}
