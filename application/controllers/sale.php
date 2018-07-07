<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sale extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		// if(!$this->session->userdata('logged_in')) {
		// 	redirect('home');
		// }
	}
	
	public function index() {
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		// $this->_render("sale_view");
		$this->load->view("template/demo-header");
		$this->load->view("sale_view");
		$this->load->view("sale_script");
		$this->load->view("template/demo-footer");	
	}

}

/* End of file sale_view.php */
/* Location: ./application/controllers/sale_view.php */