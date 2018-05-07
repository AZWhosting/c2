<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$this->load->view("template/staff-header");
		$this->load->view("staff_view");
		$this->load->view("template/staff-script");
		$this->load->view("template/staff-footer");
	}
}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */