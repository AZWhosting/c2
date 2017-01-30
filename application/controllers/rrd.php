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
	public function segment() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("demo_view_segment");	
	}

	public function pich() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("pich_view");	
	}
	public function sela() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("sela_view");	
	}

	public function choeun() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("choeun_view");	
	}
	public function choeunw() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("choeunw_view");	
	}
	public function water() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("water_view");	
	}

	public function virtual() {
		$this->_render('virtual_view');
	}
}

/* End of file app.php */
/* Location: ./application/controllers/app.php */