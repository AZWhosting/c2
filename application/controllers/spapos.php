<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Spapos extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$this->load->view("template/spapos-header");
		$this->load->view("spapos_view");
		$this->load->view("template/spapos-script");
		$this->load->view("template/spapos-footer");
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */