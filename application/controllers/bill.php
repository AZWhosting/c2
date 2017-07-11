<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bill extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		// if(!$this->session->userdata('logged_in')) {
		// 	redirect('home');
		// }
	}
	
	public function index() {	
		redirect('utibill', 'refresh');
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		// $this->_render("utibill_view");
		$this->load->view("template/utibill-header");
		// $this->_render("utibill_view");
		$this->load->view("utibill_view");
		$this->load->view("template/utibill-footer");
	}
	
}

/* End of file water.php */
/* Location: ./application/controllers/water.php */