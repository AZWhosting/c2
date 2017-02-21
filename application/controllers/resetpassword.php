<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resetpassword extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$this->load->view("admin/resetpassword");	
	}

	public function en() {
		$this->load->view("admin/forgetpassword_en_view");	
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */