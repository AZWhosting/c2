<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Choulr extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$this->load->view("template/choulr-header");
		$this->load->view("choulr_view");
		$this->load->view("template/choulr-script");
		$this->load->view("template/choulr-footer");
	}
	// public function index() {	
	// 	$this->load->view("choulr/header");		
	// 	$this->load->view("choulr/sidebar");
	// 	$this->load->view("choulr/view");
	// 	$this->load->view("choulr/script");
	// 	$this->load->view("choulr/footer");
	// }
}

/* End of file home.php */
/* Location: ./application/controllers/choulr_view.php */