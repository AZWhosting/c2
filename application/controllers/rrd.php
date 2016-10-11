<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rrd extends MY_Controller {
	
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
		$this->_render("demo_view");	
	}

	public function pich() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("pich_view");	
	}

	public function choeun() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("choeun_view");	
	}
	public function poav() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("poav_view");	
	}
	public function pheak() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("pheak_view");	
	}
}

/* End of file app.php */
/* Location: ./application/controllers/app.php */