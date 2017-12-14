<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wellnez extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$this->load->view("template/wellnez-header");
		// $this->_render("utibill_view");
		$this->load->view("wellnez_view");
		$this->load->view("template/wellnez-script");
		$this->load->view("template/wellnez-footer");
	}

	public function login() {
		$this->load->view("utibill/login");
	}
}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */