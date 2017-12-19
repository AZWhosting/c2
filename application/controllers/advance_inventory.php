<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advance_inventory extends MY_Controller {
	
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
		$this->_render("advance_inventory_view");	
	}

}

/* End of file advance_inventory_view.php */
/* Location: ./application/controllers/advance_inventory_view.php */