<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utibillpro extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$this->load->view("utibillpro/header");
		$this->load->view("utibillpro/index");
		$this->load->view("utibillpro/script");
		$this->load->view("utibillpro/footer");
	}

	public function setting() {	
		$this->load->view("utibillpro/header");
		$this->load->view("utibillpro/setting/setting");
		$this->load->view("utibillpro/setting/script");
		$this->load->view("utibillpro/footer");
	}
}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */