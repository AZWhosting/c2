<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Categories extends REST_Controller {
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
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Category(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value['operator'])){
					$obj->{$value['operator']}($value["field"], $value["dir"]);
				}else{
					$obj->order_by($value["field"], $value["dir"]);
				}
			}
		}
		
		//Filter		
		if(!empty($filter['filters']) && isset($filter['filters'])){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		//Results
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}

		if($obj->exists()){
			foreach ($obj as $value) {				
				//Results				
				$data["results"][] = array(
					"id" 			=> $value->id,					
					"sub_of" 		=> $value->sub_of,
					"item_type_id" 	=> $value->item_type_id,
					"item_id" 		=> $value->item_id,
					"code" 			=> $value->code,
					"name" 	 		=> $value->name,
					"abbr" 			=> $value->abbr,
					"is_system"		=> $value->is_system,

					"item_type" 	=> $value->item_type->get_raw()->result()	
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
			$obj = new Category(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			
			isset($value->sub_of) 		? $obj->sub_of 			= $value->sub_of : "";
			isset($value->item_type_id) ? $obj->item_type_id	= $value->item_type_id : "";
			isset($value->item_id) 		? $obj->item_id 		= $value->item_id : "";
			isset($value->abbr) 		? $obj->abbr 			= $value->abbr : "";
			isset($value->name) 		? $obj->name 			= $value->name : "";
			isset($value->is_system) 	? $obj->is_system 		= $value->is_system : "";
						
			if($obj->save()){
				//Add pattern
				$defaultPatterns = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$defaultPatterns->where("item_type_id", $obj->item_type_id);
				$defaultPatterns->where("is_pattern", 1);
				$defaultPatterns->limit(1);
				$defaultPatterns->get();

				$patterns = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$patterns->item_type_id  = $obj->item_type_id;
                $patterns->category_id   = $obj->id;
                $patterns->is_pattern    = 1;
                $patterns->status        = 1;

                if($defaultPatterns->exists()){
					$patterns->income_account_id 		= $defaultPatterns->income_account_id;
				   	$patterns->expense_account_id		= $defaultPatterns->expense_account_id;
				   	$patterns->inventory_account_id		= $defaultPatterns->inventory_account_id;

				   	$patterns->locale					= $defaultPatterns->locale;
				}

                $patterns->save();

                //Update pattern_id to category
                $patternCategorys = new Category(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$patternCategorys->get_by_id($obj->id);
				$patternCategorys->item_id = $patterns->id;
				$patternCategorys->save();

				$data["results"][] = array(
					"id" 			=> $obj->id,					
					"sub_of" 		=> $obj->sub_of,
					"item_type_id" 	=> $obj->item_type_id,
					"item_id" 		=> $patterns->id,
					"code" 			=> $obj->code,
					"name" 	 		=> $obj->name,
					"abbr" 			=> $obj->abbr,
					"is_system"		=> $obj->is_system,

					"item_type" 	=> $obj->item_type->get_raw()->result()	
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
			$obj = new Category(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->sub_of) 		? $obj->sub_of 			= $value->sub_of : "";
			isset($value->item_type_id) ? $obj->item_type_id	= $value->item_type_id : "";
			isset($value->item_id) 		? $obj->item_id 		= $value->item_id : "";
			isset($value->abbr) 		? $obj->abbr 			= $value->abbr : "";
			isset($value->name) 		? $obj->name 			= $value->name : "";
			isset($value->is_system) 	? $obj->is_system 		= $value->is_system : "";

			if($obj->save()){				
				$data["results"][] = array(
					"id" 			=> $obj->id,					
					"sub_of" 		=> $obj->sub_of,
					"item_type_id" 	=> $obj->item_type_id,
					"item_id" 		=> $obj->item_id,
					"code" 			=> $obj->code,
					"name" 	 		=> $obj->name,
					"abbr" 			=> $obj->abbr,
					"is_system"		=> $obj->is_system,

					"item_type" 	=> $obj->item_type->get_raw()->result()	
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
			$obj = new Category(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file categories.php */
/* Location: ./application/controllers/api/categories.php */