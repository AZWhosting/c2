<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Reconciles extends REST_Controller {	
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

		$obj = new Reconcile(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter		
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {				
		 		$data["results"][] = array(
		 			"id" 						=> $value->id,
					"company_id" 				=> $value->company_id,
					"transfer_account_id" 		=> $value->transfer_account_id,			   			   						   
				   	"cashier" 					=> $value->cashier,				   	
				   	"rate" 						=> $value->rate,
				   	"received_amount" 			=> $value->received_amount,
				   	"previous_amount" 			=> $value->previous_amount,
				   	"total_cash1" 				=> $value->total_cash1,
				   	"usd_amount" 				=> $value->usd_amount,
				   	"usd2khr_amount" 			=> $value->usd2khr_amount,
				   	"khr_amount" 				=> $value->khr_amount,
				   	"total_cash2" 				=> $value->total_cash2,				   
				   	"reconciled_amount" 		=> $value->reconciled_amount,
				   	"transfer_usd" 				=> $value->transfer_usd,
				   	"usd2khr_transfer_amount"	=> $value->usd2khr_transfer_amount,
				   	"transfer_khr" 				=> $value->transfer_khr,				   	
				   	"transfered_amount" 		=> $value->transfered_amount,
				   	"balance" 					=> $value->balance,
				   	"memo" 						=> $value->memo,
				   	"reconciled_date" 			=> $value->reconciled_date,
				   	"status" 					=> $value->status
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
			$obj = new Reconcile(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->company_id 				= $value->company_id;
			$obj->transfer_account_id 		= $value->transfer_account_id;			
			$obj->cashier 					= $value->cashier;
			$obj->rate 						= $value->rate;
			$obj->received_amount 			= $value->received_amount;
			$obj->previous_amount 			= $value->previous_amount;			
			$obj->total_cash1 				= $value->total_cash1;
			$obj->usd_amount 				= $value->usd_amount;
			$obj->usd2khr_amount 			= $value->usd2khr_amount;
			$obj->khr_amount 				= $value->khr_amount;
			$obj->total_cash2 				= $value->total_cash2;			
			$obj->reconciled_amount 		= $value->reconciled_amount;
			$obj->transfer_usd 				= $value->transfer_usd;
			$obj->usd2khr_transfer_amount 	= $value->usd2khr_transfer_amount;
			$obj->transfer_khr 				= $value->transfer_khr;
			$obj->transfered_amount 		= $value->transfered_amount;			
			$obj->balance 					= $value->balance;
			$obj->memo 						= $value->memo;
			$obj->reconciled_date 			= $value->reconciled_date;
			$obj->status 					= $value->status;			

			if($obj->save()){
				//Respsone				
				$data["results"][] = array(					
					"id" 						=> $obj->id,
					"company_id" 				=> $obj->company_id,
					"transfer_account_id" 		=> $obj->transfer_account_id,			   			   						   
				   	"cashier" 					=> $obj->cashier,				   	
				   	"rate" 						=> $obj->rate,
				   	"received_amount" 			=> $obj->received_amount,
				   	"previous_amount" 			=> $obj->previous_amount,
				   	"total_cash1" 				=> $obj->total_cash1,
				   	"usd_amount" 				=> $obj->usd_amount,
				   	"usd2khr_amount" 			=> $obj->usd2khr_amount,
				   	"khr_amount" 				=> $obj->khr_amount,
				   	"total_cash2" 				=> $obj->total_cash2,				   
				   	"reconciled_amount" 		=> $obj->reconciled_amount,
				   	"transfer_usd" 				=> $obj->transfer_usd,
				   	"usd2khr_transfer_amount"	=> $obj->usd2khr_transfer_amount,
				   	"transfer_khr" 				=> $obj->transfer_khr,				   	
				   	"transfered_amount" 		=> $obj->transfered_amount,
				   	"balance" 					=> $obj->balance,
				   	"memo" 						=> $obj->memo,
				   	"reconciled_date" 			=> $obj->reconciled_date,
				   	"status" 					=> $obj->status
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
			$obj = new Reconcile(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			
			$obj->company_id 				= $value->company_id;
			$obj->transfer_account_id 		= $value->transfer_account_id;			
			$obj->cashier 					= $value->cashier;
			$obj->rate 						= $value->rate;
			$obj->received_amount 			= $value->received_amount;
			$obj->previous_amount 			= $value->previous_amount;			
			$obj->total_cash1 				= $value->total_cash1;
			$obj->usd_amount 				= $value->usd_amount;
			$obj->usd2khr_amount 			= $value->usd2khr_amount;
			$obj->khr_amount 				= $value->khr_amount;
			$obj->total_cash2 				= $value->total_cash2;			
			$obj->reconciled_amount 		= $value->reconciled_amount;
			$obj->transfer_usd 				= $value->transfer_usd;
			$obj->usd2khr_transfer_amount 	= $value->usd2khr_transfer_amount;
			$obj->transfer_khr 				= $value->transfer_khr;
			$obj->transfered_amount 		= $value->transfered_amount;			
			$obj->balance 					= $value->balance;
			$obj->memo 						= $value->memo;
			$obj->reconciled_date 			= $value->reconciled_date;
			$obj->status 					= $value->status;

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 						=> $obj->id,
					"company_id" 				=> $obj->company_id,
					"transfer_account_id" 		=> $obj->transfer_account_id,			   			   						   
				   	"cashier" 					=> $obj->cashier,				   	
				   	"rate" 						=> $obj->rate,
				   	"received_amount" 			=> $obj->received_amount,
				   	"previous_amount" 			=> $obj->previous_amount,
				   	"total_cash1" 				=> $obj->total_cash1,
				   	"usd_amount" 				=> $obj->usd_amount,
				   	"usd2khr_amount" 			=> $obj->usd2khr_amount,
				   	"khr_amount" 				=> $obj->khr_amount,
				   	"total_cash2" 				=> $obj->total_cash2,				   
				   	"reconciled_amount" 		=> $obj->reconciled_amount,
				   	"transfer_usd" 				=> $obj->transfer_usd,
				   	"usd2khr_transfer_amount"	=> $obj->usd2khr_transfer_amount,
				   	"transfer_khr" 				=> $obj->transfer_khr,				   	
				   	"transfered_amount" 		=> $obj->transfered_amount,
				   	"balance" 					=> $obj->balance,
				   	"memo" 						=> $obj->memo,
				   	"reconciled_date" 			=> $obj->reconciled_date,
				   	"status" 					=> $obj->status
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
			$obj = new Reconcile(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	}


	//GET ITEM
	function item_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Reconcile_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		//Filter		
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		
		
		if($obj->result_count()>0){
			foreach ($obj as $value) {				
		 		$data["results"][] = array(
		 			"id" 					=> $value->id,
					"reconcile_id" 			=> $value->reconcile_id,
					"denomination" 			=> $value->denomination,			   			   						   
				   	"khr_qty" 				=> $value->khr_qty,
				   	"khr_amount"			=> $value->khr_amount,		   	
				   	"usd_qty" 				=> $value->usd_qty,
				   	"usd_amount"			=> $value->usd_amount,
				   	"khr_transfer" 			=> $value->khr_transfer,
				   	"khr_transfer_amount" 	=> $value->khr_transfer_amount,
				   	"usd_transfer" 			=> $value->usd_transfer,
				   	"usd_transfer_amount" 	=> $value->usd_transfer_amount
		 		);
			}
		}

		//Response Data		
		$this->response($data, 200);			
	}
	
	//POST ITEM
	function item_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Reconcile_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->reconcile_id 			= $value->reconcile_id;
			$obj->denomination 			= $value->denomination;			
			$obj->khr_qty 				= $value->khr_qty;
			$obj->khr_amount 			= $value->khr_amount;
			$obj->usd_qty 				= $value->usd_qty;
			$obj->usd_amount 			= $value->usd_amount;
			$obj->khr_transfer 			= $value->khr_transfer;
			$obj->khr_transfer_amount 	= $value->khr_transfer_amount;
			$obj->usd_transfer 			= $value->usd_transfer;
			$obj->usd_transfer_amount 	= $value->usd_transfer_amount;						

			if($obj->save()){
				//Respsone				
				$data["results"][] = array(					
					"id" 					=> $obj->id,
					"reconcile_id" 			=> $obj->reconcile_id,
					"denomination" 			=> $obj->denomination,			   			   						   
				   	"khr_qty" 				=> $obj->khr_qty,
				   	"khr_amount"			=> $obj->khr_amount,		   	
				   	"usd_qty" 				=> $obj->usd_qty,
				   	"usd_amount"			=> $obj->usd_amount,
				   	"khr_transfer" 			=> $obj->khr_transfer,
				   	"khr_transfer_amount" 	=> $obj->khr_transfer_amount,
				   	"usd_transfer" 			=> $obj->usd_transfer,
				   	"usd_transfer_amount" 	=> $obj->usd_transfer_amount	
				);				
			}		
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 201);
	}
	
	//PUT ITEM
	function item_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Reconcile_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$obj->reconcile_id 			= $value->reconcile_id;
			$obj->denomination 			= $value->denomination;			
			$obj->khr_qty 				= $value->khr_qty;
			$obj->khr_amount 			= $value->khr_amount;
			$obj->usd_qty 				= $value->usd_qty;
			$obj->usd_amount 			= $value->usd_amount;
			$obj->khr_transfer 			= $value->khr_transfer;
			$obj->khr_transfer_amount 	= $value->khr_transfer_amount;
			$obj->usd_transfer 			= $value->usd_transfer;
			$obj->usd_transfer_amount 	= $value->usd_transfer_amount;	

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 					=> $obj->id,
					"reconcile_id" 			=> $obj->reconcile_id,
					"denomination" 			=> $obj->denomination,			   			   						   
				   	"khr_qty" 				=> $obj->khr_qty,
				   	"khr_amount"			=> $obj->khr_amount,		   	
				   	"usd_qty" 				=> $obj->usd_qty,
				   	"usd_amount"			=> $obj->usd_amount,
				   	"khr_transfer" 			=> $obj->khr_transfer,
				   	"khr_transfer_amount" 	=> $obj->khr_transfer_amount,
				   	"usd_transfer" 			=> $obj->usd_transfer,
				   	"usd_transfer_amount" 	=> $obj->usd_transfer_amount
				);						
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE ITEM
	function item_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Reconcile_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
/* End of file reconciles.php */
/* Location: ./application/controllers/api/reconciles.php */