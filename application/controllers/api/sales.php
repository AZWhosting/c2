<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Sales extends REST_Controller {
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
			// $this->_database = $conn->inst_database;
			$this->_database = 'db_banhji';
		}
	}

	function summary_customer_get() {
		$this->response(array('results' => 'sales by customer--summary'), 200);
	}

	function detail_customer_get() {
		$this->response(array('results' => 'sales by customer--detail'), 200);
	}

	// item or service classified as list
	function summary_list_get() {
		$this->response(array('results' => 'sales by item or service--summary'), 200);
	}

	function detail_list_get() {
		$this->response(array('results' => "sales by item or service--detail"), 200);
	}

}//End Of Class
