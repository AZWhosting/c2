<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Books extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$this->load->view("wellnez/sidebar");
		$this->load->view("wellnez/header");
		$this->load->view("wellnez/books/books");
		$this->load->view("wellnez/books/script");
		$this->load->view("wellnez/footer");
	}
}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */