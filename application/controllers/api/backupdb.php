<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Backupdb extends REST_Controller {	
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

	function index_post(){
		$dsn = 'mysql://mightyadmin:banhji2016@banhji-db-instance.cwxbgxgq7thx.ap-southeast-1.rds.amazonaws.com/db_1495085871';
		$DB1 = $this->load->database($dsn, TRUE);
		// get all of the tables
		$this->load->dbutil();
		$this->load->helper('file');
		$this->load->helper('download');
		
		$this->db = $DB1;
		// Backup your entire database and assign it to a variable
		$this->load->dbutil();

		$prefs = array(
			'ignore' => array(),
			'format' => 'sql',
			'filename' => $this->db->database .'-'. date("Y-m-d-H-i-s").'-backup.sql',  
			'add_drop' => TRUE,
			'add_insert' => TRUE,
			'newline' => "\n" 
		);

		$backup = $this->dbutil->backup($prefs);
		$dbname = $this->db->database .'-'. date("Y-m-d-H-i-s").'-backup.sql';
		
		if ( ! write_file('assets/backupdb/'.$dbname, $backup)){
		    echo 'Unable to write the file';
		}else{
		    $data = file_get_contents("assets/backupdb/".$dbname);
    		force_download($dbname, $backup);
		}
	}
	
}
/* End of file meters.php */
/* Location: ./application/controllers/api/meters.php */