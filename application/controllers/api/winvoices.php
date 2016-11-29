<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Winvoices extends REST_Controller {
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
		$this->_database = "db_banhji";
	}

	// based on meter
	// with contact detail
	// and items based on meter record &
	// plan items
	function make_get() {
		$getData = $this->get('filter');
		$filters = $getData['filters'];
		$table = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		$table->where('invoiced <>', 1);
		$table->get();

		$tmp = array();

		foreach($table as $row) {
			$meter = $row->meter->get();
			$plan  = $meter->plan->get();

			if(isset($tmp["$meter->number"])){
				$tmp["$meter->number"]['items'][] = array(
												'usage' => array(
													'id'   => $row->id,
													'from' => $row->from_date,
													'to'   => $row->to_date,
													'prev'=>$row->previous, 
													'current'=>$row->current, 
													'usage' => $row->usage
												));
			} else {
				$tmp["$meter->number"]['type'] = 'invoice';
				$tmp["$meter->number"]['meter'] = array(
													'number' => $meter->number,
													'multiplier' => $meter->multiplier
												);
				$tmp["$meter->number"]['items'][] = array(
												'usage' => array(
													'id'   => $row->id,
													'from' => $row->from_date,
													'to'   => $row->to_date,
													'prev'=>$row->previous, 
													'current'=>$row->current, 
													'usage' => $row->usage
												));
				$items = $plan->plan_item->get();
				foreach($items as $item) {
					$tmp["$meter->number"]['items'][] = array(
												"$item->type" => array(
													'id'   => $row->id,
													'from' => $row->from_date,
													'to'   => $row->to_date,
													'prev'=>$row->previous, 
													'current'=>$row->current, 
													'usage' => $row->usage
												));
				}
			}
		}

		foreach($tmp as $t) {
			$data[] = array(
				'type' => $t['type'],
				'meter'=> $t['meter'],
				'items'=> $t['items']
			);
		}

		$this->response(array('results' => $data, 'count' => count($data)), 200);
	}

	function index_post() {
		$requestedData = json_decode($this->post('models'));
		$data = array();
		foreach($requestedData as $row) {
			$table = new Plan(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$table->code = $row->code;
			$table->name = $row->name;
			if($table->save()) {
				$items = array();
				foreach($row->items as $item) {
					$related_table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$related_table->where($item->id)->get();
					if($related_table->save($table->id)) {
						$items[] = array(
							'id' => $related_table->id,
							'is_flat' => $related_table->is_flat,
							'unit' => $related_table->unit,
							'type' => $related_table->type,
							'amount' => $related_table->amount,
							'from' => $related_table->from,
							'to' => $related_table->to
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

			$table->code = $row->code;
			$table->name = $row->name;
			if($table->save()) {
				$items = array();
				foreach($row->items as $item) {
					$related_table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$related_table->where($item->id)->get();
					if($related_table->save($table)) {
						$items[] = array(
							'id' => $related_table->id,
							'is_flat' => $related_table->is_flat,
							'unit' => $related_table->unit,
							'type' => $related_table->type,
							'amount' => $related_table->amount,
							'from' => $related_table->from,
							'to' => $related_table->to
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
							'from' => $related_table->from,
							'to' => $related_table->to
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
		$table->get();

		if($table->exists()) {
			foreach($table as $value) {
				$data[] = array(
					"is_flat" => $table->is_flat,
					"type" 	  => $table->type,
					"unit" 	  => $table->unit,
					"amount"  => $table->amount,
					"to" 	  => $table->to,
					"from" 	  => $table->from,
					"is_active"=>$table->is_active == 1 ? TRUE:FALSE
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
			$table->where('id',  $row->id)->get();
			$table->is_flat = $row->is_flat == TRUE ? 1 : 0;
			$table->type = $row->type;
			$table->unit = $row->unit;
			$table->amount = $row->amount;
			$table->to = $row->to;
			$table->from = $row->from;
			$table->is_active = isset($row->is_active) ? $row->is_active : 1;
			$table->is_deleted = 0;

			if($table->save()) {
				$data[] = array(
					"is_flat" => $table->is_flat,
					"type" 	  => $table->type,
					"unit" 	  => $table->unit,
					"amount"  => $table->amount,
					"to" 	  => $table->to,
					"from" 	  => $table->from,
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
			$table->is_flat = $row->is_flat == TRUE ? 1 : 0;
			$table->type = $row->type;
			$table->unit = $row->unit;
			$table->amount = $row->amount;
			$table->to = $row->to;
			$table->from = $row->from;
			$table->is_active = isset($row->is_active) ? $row->is_active : 1;
			$table->is_deleted = 0;

			if($table->save()) {
				$data[] = array(
					"is_flat" => $table->is_flat,
					"type" 	  => $table->type,
					"unit" 	  => $table->unit,
					"amount"  => $table->amount,
					"to" 	  => $table->to,
					"from" 	  => $table->from,
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
		$requestedData = json_decode($this->put('models'));
		$array = array();

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
					"to" 	  => $table->to,
					"from" 	  => $table->from,
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
