<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cashier extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$this->load->view("template/cashier-header");
		$this->load->view("cashier_view");
		$this->load->view("template/cashier-script");
		$this->load->view("template/cashier-footer");
	}

	public function login() {
		$this->load->view("utibill/login");
	}
}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */