
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Invoice extends REST_Controller {	
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
			date_default_timezone_set("$conn->time_zone");
		}
		$this->response($institute->name);	
	}
	//GET 
	public function index_get($id = NULL) {
		
	}
	
}
/* End of file template.php */
/* Location: ./application/controllers/api/template.php */