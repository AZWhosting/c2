
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Templates extends REST_Controller {	
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
	function transaction_templates_get($id = NULL) {		
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data 		= array();
		$is_recurring = 0;

		$obj = new Transaction_template(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		
		
		// //Filter
		// if(!empty($filter) && isset($filter)){
	 //    	foreach ($filter['filters'] as $value) {
	 //    		$obj->where($value["field"], $value["value"]);
		// 	}
		// }
		
		// $obj->order_by("type","desc");
		
		//Results
		$obj->where('id', $id);
		$obj->get();
		$count = 1;	
		if($obj->exists()){
			$data = array(
				"id" => $obj->id
			);	
			$this->response($data);	
		} else {
			$this->response("not found", 404);
		}
		//Response Data		
				
	}
	
}
/* End of file template.php */
/* Location: ./application/controllers/api/template.php */