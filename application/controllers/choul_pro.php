<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Choul_pro extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}

	public function login() {	
		$this->load->view("choul_pro/login");
	}

	public function signup() {	
		$this->load->view("choul_pro/signup");
	}
	
	public function index() {	
		$this->load->view("choul_pro/header");		
		$this->load->view("choul_pro/sidebar");
		$this->load->view("choul_pro/home/home");
		$this->load->view("choul_pro/home/script");
		$this->load->view("choul_pro/footer");
	}

	public function home() {	
		$this->load->view("choul_pro/header");		
		$this->load->view("choul_pro/sidebar");
		$this->load->view("choul_pro/home/home");
		$this->load->view("choul_pro/home/script");
		$this->load->view("choul_pro/footer");
	}

	public function units() {	
		$this->load->view("choul_pro/header");
		$this->load->view("choul_pro/sidebar");
		$this->load->view("choul_pro/units/units");
		$this->load->view("choul_pro/units/script");
		$this->load->view("choul_pro/footer");
	}

	public function purchases() {	
		$this->load->view("choul_pro/header");
		$this->load->view("choul_pro/sidebar");
		$this->load->view("choul_pro/purchases/purchases");
		$this->load->view("choul_pro/purchases/script");
		$this->load->view("choul_pro/footer");
	}

	public function items() {	
		$this->load->view("choul_pro/header");
		$this->load->view("choul_pro/sidebar");
		$this->load->view("choul_pro/items/items");
		$this->load->view("choul_pro/items/script");
		$this->load->view("choul_pro/footer");
	}

	public function cashs() {	
		$this->load->view("choul_pro/header");
		$this->load->view("choul_pro/sidebar");
		$this->load->view("choul_pro/cashs/cashs");
		$this->load->view("choul_pro/cashs/script");
		$this->load->view("choul_pro/footer");
	}

	public function setting() {	
		$this->load->view("choul_pro/header");
		$this->load->view("choul_pro/sidebar");
		$this->load->view("choul_pro/setting/setting");
		$this->load->view("choul_pro/setting/script");
		$this->load->view("choul_pro/footer");
	}

	public function guide() {	
		$this->load->view("choul_pro/header");
		$this->load->view("choul_pro/sidebar");
		$this->load->view("choul_pro/guide/guide");
		$this->load->view("choul_pro/guide/script");
		$this->load->view("choul_pro/footer");
	}
	
	public function sidebar() {
		$this->load->view("choul_pro/sidebar");
	}

	public function confirm() {
		$this->load->view("choul_pro/confirm_view");
	}

	public function forgetpassword() {
		$this->load->view("choul_pro/forgetpassword");
	}

}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */