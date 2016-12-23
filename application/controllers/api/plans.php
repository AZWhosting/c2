<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Plans extends REST_Controller {
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
		$getData = $this->get('filter');
		$filters = $getData['filters'];
		$table = new Plan(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$data = array();

		if(isset($filters)) {
			foreach($filters as $filter) {
				if(isset($filter['operator'])) {
					$table->{$filter['operator']}($filter['field'], $filter['value']);
				} else {
					$table->where($filter['field'], $filter['value']);
				}
			}
		}

		$table->get();

		if($table->exists()) {
			foreach($table as $value) {
				$items = $value->plan_item->select('id as item, account_id, name, is_flat, type, unit, amount')->get_raw();
				$currency= $value->currency->get();
				$data[] = array(
					'id' => $value->id,
					"currency_id"			=> $value->currency_id,
					"_currency"				=> array(
												"id" => $currency->id,
												"code" => $currency->code,
												"locale" => $currency->locale
					),
					'code' => $value->code,
					'name' => $value->name,
					'items' => $items->result()
				);
			}
		}

		$this->response(array('results' => $data, 'count' => count($data)), 200);
	}

	function index_post() {
		$requestedData = json_decode($this->post('models'));
		$data = array();
		foreach($requestedData as $row) {
			$table = new Plan(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$table->currency_id = $row->currency_id;
			$table->code = $row->code;
			$table->name = $row->name;
			if($table->save()) {
				$items = array();

				foreach($row->items as $item) {
					$related_table = new Plan_item(null, null, null, null, $this->_database);
					$related_table->where('id', $item->item)->get();
					if($table->save($related_table)) {
						$items[] = array(
							'id' => $related_table->id,
							'is_flat' => $related_table->is_flat,
							'unit' => $related_table->unit,
							'type' => $related_table->type,
							'amount' => $related_table->amount,
							'usage' => $related_table->usage
						);
					}
				}
				$data[] = array(
					'id' => $table->id,
					'code' => $table->code,
					'name' => $table->name,
					'items' => $items
				);
			}
		}

		$this->response(array('results'=> $data, 'count' => count($data)), 201);
	}

	function index_put() {
		$requestedData = json_decode($this->put('models'));
		$data = array();
		foreach($requestedData as $row) {
			$table = new Plan(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$table->where('id', $row->id)->get();
			$deleted_table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$deleted_table->where_related_plan('id', $table->id)->get();
			$table->delete($deleted_table->all);
			$table->currency_id = $row->currency_id;
			$table->code = $row->code;
			$table->name = $row->name;
			if($table->save()) {
				$items = array();
				foreach($row->items as $item) {
					$related_table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$related_table->where('id', $item->item)->get();
					if($related_table->save($table)) {
						$items[] = array(
							'id' => $related_table->id,
							'is_flat' => $related_table->is_flat,
							'unit' => $related_table->unit,
							'type' => $related_table->type,
							'amount' => $related_table->amount,
							'usage' => $related_table->usage
						);
					}
				}
				$data[] = array(
					'id' => $table->id,
					'code' => $table->code,
					'name' => $table->name,
					'items' => $items
				);
			}
		}

		$this->response(array('results'=> $data, 'count' => count($data)), 201);
	}

	function index_delete() {
		$requestedData = json_decode($this->put('models'));
		$data = array();
		foreach($requestedData as $row) {
			$table = new Plan(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$table->where('id', $row->id)->get();

			$table->is_deleted = 1;
			if($table->save()) {
				$items = array();
				foreach($row->items as $item) {
					$related_table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$related_table->where($item->id)->get();
					if($related_table->exits()) {
						$items[] = array(
							'id' => $related_table->id,
							'is_flat' => $related_table->is_flat,
							'unit' => $related_table->unit,
							'type' => $related_table->type,
							'amount' => $related_table->amount,
							'usage' => $related_table->usage
						);
					}
				}
				$data[] = array(
					'id' => $table->id,
					'code' => $table->code,
					'name' => $table->name,
					'items' => $items
				);
			}
		}

		$this->response(array('results'=> $data, 'count' => count($data)), 201);
	}

	function items_get() {
		$getData = $this->get('filter');
		$filters = $getData['filters'];
		$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$data = array();

		if(isset($filters)) {
			foreach($filters as $filter) {
				if(isset($filter['operator'])) {
					$table->{$filter['operator']}($filter['field'], $filter['value']);
				} else {
					$table->where($filter['field'], $filter['value']);
				}
			}
		}
		$table->where('is_deleted', 0);
		$table->where('tariff_id', 0);
		$table->get();

		if($table->exists()) {
			foreach($table as $value) {
				$account = $value->account->get();
				$currency= $value->currency->get();
				$data[] = array(
					"id"  	  => $value->id,
					"currency"			=> $value->currency_id,
					"_currency"				=> array(
												"id" => $currency->id,
												"code" => $currency->code,
												"locale" => $currency->locale
					),
					"is_flat" => $value->is_flat,
					"type" 	  => $value->type,
					"unit" 	  => $value->unit,
					"amount"  => $value->amount,
					"usage"   => $value->usage,
					"name" 	  => $value->name,
					"account" => array('id' => $account->id, 'name' => $account->name),
					"is_active"=>$value->is_active == 1 ? TRUE:FALSE
				);
			}
		}		
		if(count($data)>0) {
			$this->response(array('results' => $data, 'count' => count($data)), 200);
		} else {
			$this->response(array('results' => $data, 'count' => count($data)), 400);
		}
	}


	function items_put() {
		$requestedData = json_decode($this->put('models'));
		$array = array();

		foreach($requestedData as $row) {
			$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$table->where('id', $row->id)->get();
			$table->currency_id = $row->currency;
			$table->is_flat = isset($row->is_flat) ? $row->is_flat : 0;
			$table->type = $row->type;
			$table->unit = isset($row->unit) ? $row->unit: 0;
			$table->amount = isset($row->amount) ? $row->amount : 0;
			$table->usage = isset($row->usage)?$row->usage:0;
			$table->name = isset($row->name)?$row->name:null;
			$table->account_id = isset($row->account->id)?$row->account->id:0;
			$table->is_active = isset($row->is_active) ? $row->is_active : 1;
			$table->is_deleted = 0;

			if($table->save()) {
				$currency= $table->currency->get();
				$data[] = array(
					"id"  	  => $table->id,
					"is_flat" => $table->is_flat,
					"currency"=> $table->currency_id,
					"_currency"				=> array(
												"id" => $currency->id,
												"code" => $currency->code,
												"locale" => $currency->locale
					),
					"type" 	  => $table->type,
					"unit" 	  => $table->unit,
					"amount"  => $table->amount,
					"usage"   => $table->usage,
					"name" 	  => $table->name,
					"acount"  => $row->account,
					"is_active"=>$table->is_active == 1 ? TRUE:FALSE
				);
			}
		}

		if(count($data)>0) {
			$this->response(array('results' => $data, 'count' => count($data)), 201);
		} else {
			$this->response(array('results' => $data, 'count' => count($data)), 200);
		}
	}

	function items_post() {
		$requestedData = json_decode($this->post('models'));
		$array = array();

		foreach($requestedData as $row) {
			$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			//$tmp = isset($row->is_flat) ? $row->is_flat:FALSE;
			$table->is_flat = isset($row->is_flat) ? $row->is_flat : 0;
			$table->currency_id = $row->currency;
			$table->type = $row->type;
			$table->unit = isset($row->unit)?$row->unit:0;
			$table->amount = isset($row->amount) ? $row->amount : 0;
			$table->usage = isset($row->usage) ? $row->usage: 0;
			$table->name = isset($row->name)?$row->name:null;
			$table->account_id = isset($row->account->id)?$row->account->id:0;
			$table->is_active = isset($row->is_active) ? $row->is_active : 1;
			$table->is_deleted = 0;
			$table->tariff_id = isset($row->tariff_id) ? $row->tariff_id : 0;

			if($table->save()) {
				$currency= $table->currency->get();
				$data[] = array(
					"id"  	  => $table->id,
					"is_flat" => $table->is_flat,
					"currency"=> $table->currency_id,
					"_currency"				=> array(
												"id" => $currency->id,
												"code" => $currency->code,
												"locale" => $currency->locale
					),
					"tariff_id" => $table->tariff_id,
					"type" 	  => $table->type,
					"unit" 	  => $table->unit,
					"amount"  => $table->amount,
					"usage" 	  => $table->usage,
					"name" 	  => $table->name,
					"acount"  => $row->account,
					"is_active"=>$table->is_active == 1 ? TRUE:FALSE
				);
			}
		}

		if(count($data)>0) {
			$this->response(array('results' => $data, 'count' => count($data)), 201);
		} else {
			$this->response(array('results' => $data, 'count' => count($data)), 200);
		}
	}

	function items_delete() {
		$requestedData = json_decode($this->delete('models'));
		$data = array();

		foreach($requestedData as $row) {
			$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$table->where('id',  $row->id)->get();
			$table->is_deleted = 1;

			if($table->save()) {
				$data[] = array(
					"is_flat" => $table->is_flat,
					"type" 	  => $table->type,
					"unit" 	  => $table->unit,
					"amount"  => $table->amount,
					"usage" 	  => $table->usage,
					"is_active"=>$table->is_active == 1 ? TRUE:FALSE
				);
			}
		}

		if(count($data)>0) {
			$this->response(array('results' => $data, 'count' => count($data)), 201);
		} else {
			$this->response(array('results' => $data, 'count' => count($data)), 200);
		}
	}

	function tariff_get() {
		$getData = $this->get('filter');
		$filters = $getData['filters'];
		$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$data = array();

		if(isset($filters)) {
			foreach($filters as $filter) {
				if(isset($filter['operator'])) {
					$table->{$filter['operator']}($filter['field'], $filter['value']);
				} else {
					$table->where($filter['field'], $filter['value']);
				}
			}
		}
		$table->where('is_deleted', 0);
		$table->get();
		if($table->exists()) {
			$data = array();
			foreach($table as $row) {
				$account = $row->account->get();
				$currency= $value->currency->get();
				$data[] = array(
					'id' => $row->id,
					"currency"				=> $value->currency_id,
					"_currency"				=> array(
												"id" => $currency->id,
												"code" => $currency->code,
												"locale" => $currency->locale
					),
					'name' => $row->name,
					'is_flat' => $row->is_flat,
					'type' => $row->type,
					'usage' 	=> $row->usage,
					"account" => array('id' => $account->id, 'name' => $account->name),
					'amount'=> $row->amount
				);
			}
			$this->response(array('results'=> $data, 'count' => count($data)), 200);
		} else {
			$this->response(array('results'=> array(), 'count' => 0), 400);
		}
	}

	function tariff_post() {
		$requestedData = json_decode($this->post('models'));
		$array = array();

		foreach($requestedData as $row) {
			$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$table->is_flat = isset($row->is_flat) ? $row->is_flat : 0;
			$table->currency_id = isset($row->currency) ? $row->currency : 1;
			$table->type = isset($row->type) ? $row->type : null;
			$table->unit = isset($row->unit)?$row->unit:null;
			$table->amount = isset($row->amount) ? $row->amount : 0;
			$table->usage = isset($row->usage)?$row->usage:0;
			$table->name = isset($row->name)?$row->name:null;
			$table->account_id = isset($row->account->id)?$row->account->id:0;
			$table->is_active = isset($row->is_active) ? $row->is_active : 1;
			$table->is_deleted = 0;
			$table->tariff_id = $row->tariff_id;
			if($table->save()) {
				$currency= $table->currency->get();
				$data[] = array(
					"id"  	  => $table->id,
					"is_flat" => $table->is_flat,
					"currency"				=> $value->currency_id,
					"_currency"				=> array(
												"id" => $currency->id,
												"code" => $currency->code,
												"locale" => $currency->locale
					),
					"tariff_id" => $table->tariff_id,
					"type" 	  => $table->type,
					"unit" 	  => $table->unit,
					"amount"  => $table->amount,
					"account" => $row->account,
					"usage"   => $table->usage,
					"is_active"=>$table->is_active == 1 ? TRUE:FALSE
				);
			}
		}

		if(count($data)>0) {
			$this->response(array('results' => $data, 'count' => count($data)), 201);
		} else {
			$this->response(array('results' => $data, 'count' => count($data)), 200);
		}
	}

	function tariff_put() {
		$requestedData = json_decode($this->put('models'));
		$array = array();

		foreach($requestedData as $row) {
			$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$table->where('id', $row->id)->get();
			$table->currency_id = $row->currency;
			$table->is_flat = isset($row->is_flat) ? $row->is_flat : 0;
			$table->type = isset($row->type) ? $row->type : null;
			$table->unit = isset($row->unit)?$row->unit:null;
			$table->amount = isset($row->amount) ? $row->amount : 0;
			$table->usage = isset($row->usage)?$row->usage:0;
			$table->name = isset($row->name)?$row->name:null;
			$table->account_id = isset($row->account->id)?$row->account->id:0;
			$table->is_active = isset($row->is_active) ? $row->is_active : 1;
			$table->is_deleted = 0;
			if($table->save()) {
				$currency= $table->currency->get();
				$data[] = array(
					"id"  	  => $table->id,
					"is_flat" => $table->is_flat,
					"currency"				=> $value->currency_id,
					"_currency"				=> array(
												"id" => $currency->id,
												"code" => $currency->code,
												"locale" => $currency->locale
					),
					"tariff_id" => $table->tariff_id,
					"type" 	  => $table->type,
					"unit" 	  => $table->unit,
					"amount"  => $table->amount,
					"usage"   => $table->usage,
					"account" => $row->account,
					"is_active"=>$table->is_active == 1 ? TRUE:FALSE
				);
			}
		}

		if(count($data)>0) {
			$this->response(array('results' => $data, 'count' => count($data)), 201);
		} else {
			$this->response(array('results' => $data, 'count' => count($data)), 200);
		}
	}

	function tariff_delete() {
		$requestedData = json_decode($this->delete('models'));
		$array = array();

		foreach($requestedData as $row) {
			$table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$table->where('id', $row->id)->get();
			// $tmp = isset($row->is_flat) ? $row->is_flat:FALSE;
			// $table->is_flat = $tmp == TRUE ? 1 : 0;
			// $table->type = isset($row->type) ? $row->type : null;
			// $table->unit = isset($row->unit)?$row->unit:null;
			// $table->amount = isset($row->amount) ? $row->amount : 0;
			// $table->to = isset($row->to)?$row->to:null;
			// $table->from = isset($row->from)?$row->from:null;
			// $table->name = isset($row->name)?$row->name:null;
			// $table->is_active = isset($row->is_active) ? $row->is_active : 1;
			$table->is_deleted = 1;

			if($table->save()) {
				$data[] = array(
					"id"  	  => $table->id,
					"is_flat" => $table->is_flat,
					"type" 	  => $table->type,
					"unit" 	  => $table->unit,
					"amount"  => $table->amount,
					"usage" 	  => $table->usage,
					"is_active"=>$table->is_active == 1 ? TRUE:FALSE
				);
			}
		}

		if(count($data)>0) {
			$this->response(array('results' => $data, 'count' => count($data)), 201);
		} else {
			$this->response(array('results' => $data, 'count' => count($data)), 200);
		}
	}
}
/* End of file categories.php */
/* Location: ./application/controllers/api/categories.php */
