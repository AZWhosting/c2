<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {		
		$this->load->view("wellnez/header");
		$this->load->view("wellnez/setting/setting");
		$this->load->view("wellnez/setting/script");
		$this->load->view("wellnez/footer");
		$this->load->view("wellnez/sidebar");
	}
}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */ 