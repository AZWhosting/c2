<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Micro extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function login() {	
		$this->load->view("micro/login");
	}

	public function signup() {	
		$this->load->view("micro/signup");
	}
	
	public function index() {	
		$this->load->view("micro/header");		
		$this->load->view("micro/sidebar");
		$this->load->view("micro/home/home");
		$this->load->view("micro/home/script");
		$this->load->view("micro/footer");
	}

	public function home() {	
		$this->load->view("micro/header");		
		$this->load->view("micro/sidebar");
		$this->load->view("micro/home/home");
		$this->load->view("micro/home/script");
		$this->load->view("micro/footer");
	}

	public function sales() {	
		$this->load->view("micro/header");
		$this->load->view("micro/sidebar");
		$this->load->view("micro/sales/sales");
		$this->load->view("micro/sales/script");
		$this->load->view("micro/footer");
	}

	public function purchases() {	
		$this->load->view("micro/header");
		$this->load->view("micro/sidebar");
		$this->load->view("micro/purchases/purchases");
		$this->load->view("micro/purchases/script");
		$this->load->view("micro/footer");
	}

	public function items() {	
		$this->load->view("micro/header");
		$this->load->view("micro/sidebar");
		$this->load->view("micro/items/items");
		$this->load->view("micro/items/script");
		$this->load->view("micro/footer");
	}

	public function cashs() {	
		$this->load->view("micro/header");
		$this->load->view("micro/sidebar");
		$this->load->view("micro/cashs/cashs");
		$this->load->view("micro/cashs/script");
		$this->load->view("micro/footer");
	}

	public function setting() {	
		$this->load->view("micro/header");
		$this->load->view("micro/sidebar");
		$this->load->view("micro/setting/setting");
		$this->load->view("micro/setting/script");
		$this->load->view("micro/footer");
	}

	public function guide() {	
		$this->load->view("micro/header");
		$this->load->view("micro/sidebar");
		$this->load->view("micro/guide/guide");
		$this->load->view("micro/guide/script");
		$this->load->view("micro/footer");
	}
	
	public function sidebar() {
		$this->load->view("micro/sidebar");
	}

}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */