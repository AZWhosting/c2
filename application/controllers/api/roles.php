<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Roles extends REST_Controller {

	public $_database;
	public $entity;
	public $user;
	public $pwd;
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		// date_default_timezone_set("Asia/Phnom_Penh");
		$institute = new Institute();
		$institute->where('id', $this->input->get_request_header('Institute'))->get();
		if($institute->exists()) {
			$conn = $institute->connection->get();
			$this->entity = $conn->server_name;
			$this->user = $conn->username;
			$this->pwd = $conn->password;
			$this->_database = $conn->inst_database;
			date_default_timezone_set("$conn->time_zone");
		}
	}

	function index_get() {
		$roles = new Role(null);
		$roles->get();
		if($roles->exists()) {
			foreach($roles as $role) {
				$data[] = array(
					'id' => $role->id,
					'name' => $role->name,
					'img_url' => "",
				);
			}
			$this->response(array('results'=>$data, 'error' => FALSE, 'count' => count($data)), 200);
		} else {
			$this->response(array('results'=>array(), 'error' => TRUE, 'count' => 0), 200);
		}
	}

	// function index_post() {
	// 	$request = json_decode($this->post('models'));

	// 	foreach($request as $d) {

	// 	}
	// }

	function users_get() {
		$requested_data = $this->get("filter");
		$filters = $requested_data['filters'];
		$data = array();

		$table = new User(null);
		// foreach($filters as $filter) {
		// 	if(isset($filter['operator'])){
		// 		$table->{$filter['operator']}($filter['field'], $filter['value']);
		// 	}
		// 	else {
		// 		$table->where_related_user($filter['field'], $filter['value']);
		// 	}
		// }
		$table->where('id', 1);
		// $table->include_related('user', array('id', 'username'));
		$table->get();

		if($table->exists()) {
			$roles = $table->role->include_joined_field()->get();
			// foreach($role as $t) {
				$data[] = array(
					'name' => $table->username
				);
			// }
		}			

		if(count($data) > 0) {
			$this->response(array('results' => $data, 'count' => count($data)), 200);
		} else {
			$this->response(array('results' => $data, 'count' => count($data)), 400);
		}
	}

	function users_post() {
		$request = json_decode($this->post('models'));
		foreach($request as $r) {
			$user = new User(null);
			$role = new Role(null);

			$user->where('username', $r->user->username);
			$user->get();

			$role->where('id', $r->role->id);
			$role->get();

			$role->save($user);
		}
	}

	function users_delete() {
		$request = json_decode($this->delete('models'));
		foreach($request as $r) {
			$user = new User(null);
			$role = new Role(null);

			$user->where('username', $r->user->username);
			$user->get();

			$role->where('id', $r->role->id);
			$role->get();

			$role->delete($user);
		}
	}
}
/* End of file functions.php */
/* Location: ./application/controllers/api/functions.php */
