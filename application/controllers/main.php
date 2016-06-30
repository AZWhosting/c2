<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$this->load->view('showcase_view');
	}

	public function login() {
		$this->load->view('admin/login_view');
	}

	public function work() {
		$this->load->view('app/demo_view');
	}

	public function admin() {
		$this->load->view('admin/admin_view');
	}

	public function mockup() {
		$this->load->view('app/banhji_view');
	}

	public function create() {
		$this->load->view('signup_view');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */