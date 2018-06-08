<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utibill extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$this->load->view("template/utibill-header");
		$this->load->view("utibill_view");
		$this->load->view("template/utibill-script");
		$this->load->view("template/utibill-footer");
	}

	public function login() {
		$this->load->view("utibill/login");
	}

	public function setting() {	
		$this->load->view("template/utibill-header");
		$this->load->view("utibill/setting/view");
		$this->load->view("utibill/setting/script");
		$this->load->view("template/utibill-footer");
	}
}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */