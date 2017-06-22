<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {

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
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$comint = "";
		$intID = $this->input->post("institute");
		$userID = $this->input->post("uid");
		$users = new User(null);
		$users->where("id", $userID)->limit(1)->get();
		foreach ($users as $user) {
			$inst = $user->institute->get();
			$comint = $inst->id;
		}
		if($intID == $comint){
			$this->load->view('import', array('error' => ' ' ));
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
			$templine = '';
			// Read in entire file
			if(isset($_FILES["userfile"])){
				$lines = file($_FILES["userfile"]["tmp_name"]); 
				$this->db->query('use '. $this->db->database);
				// Loop through each line
				foreach ($lines as $line){
					// Skip it if it's a comment
					if (substr($line, 0, 2) == '--' || $line == '')
					continue;
					// Add this line to the current templine we are creating
					$templine .= $line;

					// If it has a semicolon at the end, it's the end of the query so can process this templine
					if (substr(trim($line), -1, 1) == ';')
					{
						// Perform the query
						$this->db->query($templine);
						// Reset temp variable to empty
						$templine = '';
					}
				}
				echo '<script>alert("Successfull!");</script>';
				redirect('bill', 'refresh');
			}
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */