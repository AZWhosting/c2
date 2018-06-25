<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class wellnez_ktv extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$this->load->view("wellnez_ktv/header");
		$this->load->view("wellnez_ktv/home/home");
		$this->load->view("wellnez_ktv/home/script");
		$this->load->view("wellnez_ktv/footer");
	}

	public function home() {	
		$this->load->view("wellnez_ktv/header");
		$this->load->view("wellnez_ktv/home/home");
		$this->load->view("wellnez_ktv/home/script");
		$this->load->view("wellnez_ktv/footer");
	}

	public function books() {
		$this->load->view("wellnez_ktv/header");
		$this->load->view("wellnez_ktv/books/books");
		$this->load->view("wellnez_ktv/books/script");
		$this->load->view("wellnez_ktv/footer");
		$this->load->view("wellnez_ktv/sidebar");
	}

	public function customer() {
		$this->load->view("wellnez_ktv/header");
		$this->load->view("wellnez_ktv/customer/customer");
		$this->load->view("wellnez_ktv/customer/script");
		$this->load->view("wellnez_ktv/footer");
		$this->load->view("wellnez_ktv/sidebar");
	}

	public function employee() {
		$this->load->view("wellnez_ktv/header");
		$this->load->view("wellnez_ktv/employee/employee");
		$this->load->view("wellnez_ktv/employee/script");
		$this->load->view("wellnez_ktv/footer");
		$this->load->view("wellnez_ktv/sidebar");
	}

	public function loyalty() {
		$this->load->view("wellnez_ktv/header");
		$this->load->view("wellnez_ktv/loyalty/loyalty");
		$this->load->view("wellnez_ktv/loyalty/script");
		$this->load->view("wellnez_ktv/footer");
		$this->load->view("wellnez_ktv/sidebar");
	}

	public function pay() {
		$this->load->view("wellnez_ktv/header");
		$this->load->view("wellnez_ktv/pay/pay");
		$this->load->view("wellnez_ktv/pay/script");
		$this->load->view("wellnez_ktv/footer");
		$this->load->view("wellnez_ktv/sidebar");
	}

	public function pos() {
		$this->load->view("wellnez_ktv/header");
		$this->load->view("wellnez_ktv/pos/pos");
		$this->load->view("wellnez_ktv/pos/script");
		$this->load->view("wellnez_ktv/footer");
		$this->load->view("wellnez_ktv/sidebar");
	}

	public function reports() {
		$this->load->view("wellnez_ktv/header");
		$this->load->view("wellnez_ktv/reports/reports");
		$this->load->view("wellnez_ktv/reports/script");
		$this->load->view("wellnez_ktv/footer");
		$this->load->view("wellnez_ktv/sidebar");
	}

	public function services() {
		$this->load->view("wellnez_ktv/header");
		$this->load->view("wellnez_ktv/services/services");
		$this->load->view("wellnez_ktv/services/script");
		$this->load->view("wellnez_ktv/footer");
		$this->load->view("wellnez_ktv/sidebar");
	}

	public function session() {
		$this->load->view("wellnez_ktv/header");
		$this->load->view("wellnez_ktv/session/session");
		$this->load->view("wellnez_ktv/session/script");
		$this->load->view("wellnez_ktv/footer");
		$this->load->view("wellnez_ktv/sidebar");
	}

	public function setting() {
		$this->load->view("wellnez_ktv/header");
		$this->load->view("wellnez_ktv/setting/setting");
		$this->load->view("wellnez_ktv/setting/script");
		$this->load->view("wellnez_ktv/footer");
		$this->load->view("wellnez_ktv/sidebar");
	}

	public function rooms() {	
		$this->load->view("wellnez_ktv/header");
		$this->load->view("wellnez_ktv/rooms/rooms");
		$this->load->view("wellnez_ktv/rooms/script");
		$this->load->view("wellnez_ktv/footer");
	}

	public function sidebar() {
		$this->load->view("wellnez_ktv/sidebar");
	}

}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */