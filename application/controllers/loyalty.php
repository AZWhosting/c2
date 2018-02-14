<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loyalty extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->load->view("loyalty/header");
		$this->load->view("loyalty/loyalty");
		$this->load->view("loyalty/script");
		$this->load->view("loyalty/footer");
	}
}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */