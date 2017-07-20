<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Choulr extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$this->load->view("template/choulr-header");
		// $this->_render("utibill_view");
		$this->load->view("choulr_view");
		$this->load->view("template/choulr-footer");
	}
}

/* End of file home.php */
/* Location: ./application/controllers/choulr_view.php */