<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Market_center extends MY_Controller {
	
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
		$this->_render("market_center");	
	}
	
}

/* End of file water.php */
/* Location: ./application/controllers/water.php */