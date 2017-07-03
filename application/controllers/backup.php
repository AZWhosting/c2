<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Backup extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$comint = "";
		$intID = $this->input->post("institute");
		$userID = $this->input->post("uid");
		$users = new User(null);
		$users->where("id", $userID)->limit(1)->get();
		foreach ($users as $user) {
			echo $inst = $user->institute->get();
			echo $comint = $inst->id;
		}
		if($intID == $comint){
			$institute = new Institute();
			$institute->where('id', $comint)->get();
			if($institute->exists()) {	
				$conn = $institute->connection->get();
				$this->_database = $conn->inst_database;
			}
			$dsn = 'mysql://'.$this->db->username.':'.$this->db->password.'@'.$this->db->hostname.'/'.$this->_database;
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
			    echo "error";
			}else{
			    $data = file_get_contents("assets/backupdb/".$dbname);
	    		force_download($dbname, $backup);
			}
		}else{
			echo "My Ass";
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */