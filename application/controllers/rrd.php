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

	public function voucher() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("voucher_view");	
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

	public function store() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("app_store");	
	}

	public function fsr() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("fsr_view");	
	}

	public function test() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("gridtest");	
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

	public function utibill() {	
		
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set) 
		 */
		$this->_render("utibill_view");	
	}

	public function virtual() {
		$this->_render('virtual_view');
	}
}

/* End of file app.php */
/* Location: ./application/controllers/app.php */