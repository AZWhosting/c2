<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wellnez extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$this->load->view("wellnez/header");
		$this->load->view("wellnez/home/home");
		$this->load->view("wellnez/home/script");
		$this->load->view("wellnez/footer");
	}

	public function home() {	
		$this->load->view("wellnez/header");
		$this->load->view("wellnez/home/home");
		$this->load->view("wellnez/home/script");
		$this->load->view("wellnez/footer");
	}

	public function books() {
		$this->load->view("wellnez/header");
		$this->load->view("wellnez/books/books");
		$this->load->view("wellnez/books/script");
		$this->load->view("wellnez/footer");
		$this->load->view("wellnez/sidebar");
	}

	public function customer() {
		$this->load->view("wellnez/header");
		$this->load->view("wellnez/customer/customer");
		$this->load->view("wellnez/customer/script");
		$this->load->view("wellnez/footer");
		$this->load->view("wellnez/sidebar");
	}

	public function employee() {
		$this->load->view("wellnez/header");
		$this->load->view("wellnez/employee/employee");
		$this->load->view("wellnez/employee/script");
		$this->load->view("wellnez/footer");
		$this->load->view("wellnez/sidebar");
	}

	public function loyalty() {
		$this->load->view("wellnez/header");
		$this->load->view("wellnez/loyalty/loyalty");
		$this->load->view("wellnez/loyalty/script");
		$this->load->view("wellnez/footer");
		$this->load->view("wellnez/sidebar");
	}

	public function pay() {
		$this->load->view("wellnez/header");
		$this->load->view("wellnez/pay/pay");
		$this->load->view("wellnez/pay/script");
		$this->load->view("wellnez/footer");
		$this->load->view("wellnez/sidebar");
	}

	public function pos() {
		$this->load->view("wellnez/header");
		$this->load->view("wellnez/pos/pos");
		$this->load->view("wellnez/pos/script");
		$this->load->view("wellnez/footer");
		$this->load->view("wellnez/sidebar");
	}

	public function reports() {
		$this->load->view("wellnez/sidebar");
	}

	public function services() {
		$this->load->view("wellnez/header");
		$this->load->view("wellnez/services/services");
		$this->load->view("wellnez/services/script");
		$this->load->view("wellnez/footer");
		$this->load->view("wellnez/sidebar");
	}

	public function session() {
		$this->load->view("wellnez/header");
		$this->load->view("wellnez/session/session");
		$this->load->view("wellnez/session/script");
		$this->load->view("wellnez/footer");
		$this->load->view("wellnez/sidebar");
	}

	public function setting() {
		$this->load->view("wellnez/header");
		$this->load->view("wellnez/setting/setting");
		$this->load->view("wellnez/setting/script");
		$this->load->view("wellnez/footer");
		$this->load->view("wellnez/sidebar");
	}

	public function rooms() {	
		$this->load->view("wellnez/header");
		$this->load->view("wellnez/rooms/rooms");
		$this->load->view("wellnez/rooms/script");
		$this->load->view("wellnez/footer");
	}

	public function sidebar() {
		$this->load->view("wellnez/sidebar");
	}

}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */