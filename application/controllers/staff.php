<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$this->load->view("staff/header");
		$this->load->view("staff/home/home");
		$this->load->view("staff/home/script");
		$this->load->view("staff/footer");
	}

	public function home() {	
		$this->load->view("staff/header");
		$this->load->view("staff/home/home");
		$this->load->view("staff/home/script");
		$this->load->view("staff/footer");
	}
}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */