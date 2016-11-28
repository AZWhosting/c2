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
		$this->_database = "db_banhji";
	}

	function index_get() {
		$getData = $this->get('filter');
		$filters = $getData['filters'];
		$table = new Plan(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$data = array();

		if(isset($filters)) {
			foreach($filters as $filter) {
				if(isset($filter['operator'])) {
					if($filter['operator'] == "where_in") {
						$table->where_in($filter['field'], $filter['value']);
					} elseif($filter['operator'] == "or_where") {
						$table->or_where($filter['field'], $filter['value']);
					} elseif($filter['operator'] == "like") {
						$table->where($filter['field'], $filter['value']);
					}
				} else {
					$table->where($filter['field'], $filter['value']);
				}
			}
		}
		$table->get();

		if($table->exists()) {
			foreach($table as $value) {
				$items = $value->plan_item->select('id, is_flat, type, unit, amount, from, to')->get_raw();
				$data[] = array(
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
			$table->code = $row->code;
			$table->name = $row->name;
			if($table->save()) {
				$items = array();
				foreach($row->items as $item) {
					$related_table = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$related_table->where($item->id)->get();
					$related_table->is_flat = $item->is_flat;
					$related_table->unit = $item->unit;
					$related_table->type = $item->type;
					$related_table->amount = $item->amount;
					$related_table->from = $item->from;
					$related_table->to = $item->to;
					if($related_table->save()) {
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

	function index_delete() {}

	function items_get($id = null) {
		if($id) {
			$this->response(array('results' => $id), 200);
		} else {
			$this->response(array('results' => 'test'), 200);
		}
	}

	function itemById_get() {}

	function items_put() {}

	function items_post() {}

	function items_delete() {}
}
/* End of file categories.php */
/* Location: ./application/controllers/api/categories.php */
