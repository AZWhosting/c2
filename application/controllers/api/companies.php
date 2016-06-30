<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Companies extends REST_Controller {
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
	
    function index_get() {
		$requested_data = $this->get("filter");
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') ? $this->get('limit'): 50;
		$offset= $this->get('offset')? $this->get('offset'): null;
		$c = new Company(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		// if(isset($filters)) {
		// 	foreach($filters as $f) {
		// 		$c->where($f['field'], $f['value']);
		// 	}	
		// }
		$c->get_paged($offset, $limit);
		if($c->exists()) {
			foreach($c as $row) {
				$currency = $row->currency->get();
				$data[] = array(
					"id" => $row->id,
					"name" => $row->name,
					"currency" => array(
						'id' => $currency->id,
						'code' => $currency->code
					),
					"legal_name" => $row->legal_name,
					"email" => $row->email,
					"phone" => $row->phone,
					"address"=>$row->address,
					"year_founded" => $row->year_founded,
					"fiscal_date" => $row->fiscal_date,
					"ap_account" => $row->ap_account_id,
					"ar_account" => $row->ar_account_id,
					"vat_no" => $row->vat_no,
					"cash_account" => $row->cash_account_id,
					"logo"	=> $row->image_url,
					"main" => $row->main,
					"operation_license" => $row->operation_license
				);
			}
			
		}
		$this->response(array('results'=>$data), 200);	
    }
	
	function index_post() {
		$posted_data =  json_decode($this->post('models'));
		$ids = array();

		// $u = new User();
		// ap, ar, currency
		foreach($posted_data as $row) {
			$c = new Company(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$c->currency_id = $row->currency->id;
			$c->name = $row->name;
			$c->legal_name = $row->legal_name;
			// $c->representative = $row->representative;
			$c->email = $row->email;
			// $c->mobile = $row->mobile;
			$c->phone = $row->phone;
			$c->address = $row->address;
			$c->year_founded = $row->year_founded;
			$c->fiscal_date = $row->fiscal_date;
			$c->operation_license = $row->operation_license;
			$c->vat_no = $row->vat_no;
			$c->term_of_condition = $row->tos;
			// $c->image_url = $row->image_url;
			$c->ap_account_id = $row->ap_account->id;
			$c->ar_account_id = $row->ar_account->id;
			$c->cash_account_id=$row->cash_account->id;

			if($c->save()){
				$ids[] = $c;
			}			
		}
		foreach($ids as $row) {
			$currency = $row->currency->get();
			$data[] = array(
				"id" => $row->id,
				"name" => $row->name,
				"currency" => array(
					'id' => $currency->id,
					'code' => $currency->code
				),
				"legal_name" => $row->legal_name,
				"email" => $row->email,
				"phone" => $row->phone,
				"address"=>$row->address,
				"year_founded" => $row->year_founded,
				"fiscal_date" => $row->fiscal_date,
				"ap_account" => array('id' =>$row->ap_account_id),
				"ar_account" => array('id' =>$row->ar_account_id),
				"vat_no" => $row->vat_no,
				"cash_account" => array('id' => $row->cash_account_id),
				"main" => $row->main,
				"tos" => $row->term_of_condition,
				"operation_license" => $row->operation_license
			);
 		}

 		$this->response(array('results'=>$data), 201);
	}
	
	function index_put() {
		$posted_data =  json_decode($this->put('models'));
		$ids = array();

		// $u = new User();
		// ap, ar, currency
		foreach($posted_data as $row) {
			$c = new Company(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$c->where('id', $row->id)->get();
			$c->currency_id = $row->currency->id;
			$c->name = $row->name;
			$c->legal_name = $row->legal_name;
			// $c->representative = $row->representative;
			$c->email = $row->email;
			// $c->mobile = $row->mobile;
			$c->phone = $row->phone;
			$c->address = $row->address;
			$c->year_founded = $row->year_founded;
			$c->fiscal_date = $row->fiscal_date;
			$c->operation_license = $row->operation_license;
			$c->vat_no = $row->vat_no;
			$c->term_of_condition = $row->tos;
			// $c->image_url = $row->image_url;
			$c->ap_account_id = isset($row->ap_account->id) ? $row->ap_account->id : $row->ap_account;
			$c->ar_account_id = isset($row->ar_account->id) ? $row->ar_account->id : $row->ar_account;
			$c->cash_account_id=isset($row->cash_account->id) ?$row->cash_account->id : $row->cash_account;

			if($c->save()){
				$ids[] = $c;
			}			
		}
		foreach($ids as $row) {
			$currency = $row->currency->get();
			$data[] = array(
				"id" => $row->id,
				"name" => $row->name,
				"currency" => array(
					'id' => $currency->id,
					'code' => $currency->code
				),
				"legal_name" => $row->legal_name,
				"email" => $row->email,
				"phone" => $row->phone,
				"address"=>$row->address,
				"year_founded" => $row->year_founded,
				"fiscal_date" => $row->fiscal_date,
				"ap_account" => $row->ap_account_id,
				"ar_account" => $row->ar_account_id,
				"vat_no" => $row->vat_no,
				"cash_account" => $row->cash_account_id,
				"main" => $row->main,
				// "tos" => $row->term_of_condition,
				"operation_license" => $row->operation_license
			);
 		}

 		$this->response(array('results'=>$data), 201);
	}

}