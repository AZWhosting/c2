<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work extends MY_Controller {

	public function index()
	{
		$this->_render('app/demo_view');
	}

	public function mockup() {
		$this->_render('app/banhji_view');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */