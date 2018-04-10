<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poch extends MY_Controller {
	
	function __construct() {
		parent::__construct();
		// if(!$this->session->userdata('logged_in')) {
		// 	redirect('home');
		// }
	}
	
	

	public function index() {
		$this->load->view('poch_view');
	}
}

/* End of file app.php */
/* Location: ./application/controllers/app.php */