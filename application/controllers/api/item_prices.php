<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Item_prices extends REST_Controller {	
	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$institute = new Institute();
		$institute->where('id', $this->input->get_request_header('Institute'))->get();
		if($institute->exists()) {
			$conn = $institute->connection->get();
			$this->server_host = $conn->server_name;
			$this->server_user = $conn->username;
			$this->server_pwd = $conn->password;	
			$this->_database = $conn->inst_database;
		}
	}
	
	//GET 
	function index_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);		    			    		
		    		}else{
		    			$obj->where($value["field"], $value["value"]);
		    		}
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}									 			
		}		

		//Result		
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;				

		if($obj->result_count()>0){			
			foreach ($obj as $value) {							
				$data["results"][] = array(
					"id" 				=> $value->id,					
					"item_id" 			=> $value->item_id,
					"assembly_id" 		=> $value->assembly_id,
					"measurement_id" 	=> $value->measurement_id,
					"quantity" 			=> floatval($value->quantity),					
					"unit_value" 		=> floatval($value->unit_value),
					"price" 			=> floatval($value->price),
					"amount" 			=> floatval($value->amount),					
					"locale" 			=> $value->locale,					
					"measurement" 		=> $value->measurement->get()->name					
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
	
	//POST
	function index_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			isset($value->item_id) 			? $obj->item_id 		= $value->item_id : "";
			isset($value->assembly_id) 		? $obj->assembly_id 	= $value->assembly_id : "";
			isset($value->measurement_id) 	? $obj->measurement_id 	= $value->measurement_id : "";
			isset($value->quantity) 		? $obj->quantity 		= $value->quantity : "";
			isset($value->unit_value) 		? $obj->unit_value 		= $value->unit_value : "";
			isset($value->price) 			? $obj->price 			= $value->price : "";			
			isset($value->amount) 			? $obj->amount 			= $value->amount : "";			
			isset($value->locale) 			? $obj->locale 			= $value->locale : "";

			if($obj->save()){				
				//Respsone
				$data["results"][] = array(
					"id" 				=> $obj->id,					
					"item_id" 			=> $obj->item_id,
					"assembly_id" 		=> $obj->assembly_id,
					"measurement_id" 	=> $obj->measurement_id,
					"quantity" 			=> floatval($obj->quantity),					
					"unit_value" 		=> floatval($obj->unit_value),
					"price" 			=> floatval($obj->price),
					"amount" 			=> floatval($obj->amount),					
					"locale" 			=> $obj->locale,					
					"measurement" 		=> $obj->measurement->get()->name
				);				
			}			
		}
		$data["count"] = count($data["results"]);
		
		$this->response($data, 201);						
	}

	//PUT
	function index_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			isset($value->item_id) 			? $obj->item_id 		= $value->item_id : "";
			isset($value->assembly_id) 		? $obj->assembly_id 	= $value->assembly_id : "";
			isset($value->measurement_id) 	? $obj->measurement_id 	= $value->measurement_id : "";
			isset($value->quantity) 		? $obj->quantity 		= $value->quantity : "";
			isset($value->unit_value) 		? $obj->unit_value 		= $value->unit_value : "";
			isset($value->price) 			? $obj->price 			= $value->price : "";			
			isset($value->amount) 			? $obj->amount 			= $value->amount : "";			
			isset($value->locale) 			? $obj->locale 			= $value->locale : "";			

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,					
					"item_id" 			=> $obj->item_id,
					"assembly_id" 		=> $obj->assembly_id,
					"measurement_id" 	=> $obj->measurement_id,
					"quantity" 			=> floatval($obj->quantity),					
					"unit_value" 		=> floatval($obj->unit_value),
					"price" 			=> floatval($obj->price),
					"amount" 			=> floatval($obj->amount),					
					"locale" 			=> $obj->locale,					
					"measurement" 		=> $obj->measurement->get()->name
				);						
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE
	function index_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
							
		}

		//Response data
		$this->response($data, 200);
	}    
	
}
/* End of file item_price.php */
/* Location: ./application/controllers/api/item_price.php */