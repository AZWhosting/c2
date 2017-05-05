<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

/* for creating and editing company and their database */

class Customers extends REST_Controller {
	
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

	public function index_get($id = NULL, $resource = NULL) {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') == TRUE ? $this->get('page'): 1;
		$limit 		= $this->get('limit') == TRUE ? $this->get('limit'): 50;
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$types = array();

		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$type->select('id')->where('parent_id', 1)->get_iterated();
		foreach($type as $t) {
			$types[] = $t->id;
		}
		$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where_in('contact_type_id', $types);

		if(isset($id)) {
			$obj->where('id', $id);
			// if(isset($resource)) {
			// 	$obj->include_related("$resource", NULL, TRUE, TRUE);
			// }
			$obj->limit(1);
		} else {
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
			if(!empty($filter) && isset($filter)){
		    	foreach ($filter['filters'] as $value) {
		    		if(isset($value['operator'])) {
						$obj->{$value['operator']}($value['field'], $value['value']);
					} else {
		    			$obj->where($value["field"], $value["value"]);
					}
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
			if(isset($resource)) {
				foreach($obj as $row) {
					$rs = null;
					switch ($resource) {
						case "invoice":
							$query = $row->transaction->select('id, number, amount')->where('deleted', 0)->where('type like ', "%Invoice")->get_paged_iterated($page, $limit);
							if($query->exists()) {
								foreach($query as $q) {
									$rs['items'][] = array(
										'url' => base_url() . "v1/invoices/index/" . $q->id,
										"number"=> $q->number,
										"amount"=> floatval($q->amount)
									);
								}
								$rs['count'] = $query->paged->total_rows;
							} else {
								$rs = array();
							}
								
							break;
						case "sale_order":
							$query = $row->transaction->select('id, amount, type, number')->where('type', 'Sale_Order')->get_paged_iterated($page, $limit);
							if($query->exists()) {
								foreach($query as $q) {
									$rs['items'][] = array(
										'url' => base_url() . "v1/invoices/index/" . $q->id,
										"number"=> $q->number,
										"amount"=> floatval($q->amount)
									);
								}
								$rs['count'] = $query->paged->total_rows;
							} else {
								$rs = array();
							}
							break;
						case "deposit":
							$query = $row->transaction->select('id, amount, type, number')->where('type', 'Customer_Deposit')->get_paged_iterated($page, $limit);
							if($query->exists()) {
								foreach($query as $q) {
									$rs['items'][] = array(
										'url' => base_url() . "v1/invoices/index/" . $q->id,
										"number"=> $q->number,
										"amount"=> floatval($q->amount)
									);
								}
								$rs['count'] = $query->paged->total_rows;
							} else {
								$rs = array();
							}
							break;
					}
					
					// $row->{$resource}->get_raw();
					$data['results'][] = array(
						'id' => $row->id,
						'number' => "$row->abbr" ."-". "$row->number",
						'name' => $row->name,
						'phone'=> $row->phone,
						'email'=> $row->email,
						'city' => $row->city,
						'postCode' => $row->post_code,
						"$resource".'s' => $rs
					);
				}
			} else {
				foreach($obj as $row) {
					$data['results'][] = array(
						'id' => $row->id,
						'number' => "$row->abbr" ."-". "$row->number",
						'name' => $row->name,
						'phone'=> $row->phone,
						'email'=> $row->email,
						'city' => $row->city,
						'postCode' => $row->post_code
					);
				}
			}
			
		}

		$this->response($data, 200);
	}

	// public function index_post() {
	// 	//
	// }

	// public function index_put($id = NULL) {
	// 	//
	// }
	
	// public function index_delete($id = NULL) {
	// 	//
	// }

	public function inst_get() {
		$institutes = new Institute(null);
		$institutes->include_related('user', 'username');
		

		echo $institutes->get_sql();

	}
}
