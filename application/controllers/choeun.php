<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Choeun extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		$fineDate = new DateTime(date('Y-m-d'));
		echo $a = $fineDate->getTimestamp().'<br>';
		$fdate = new DateTime('2017-10-14');
		echo $b = $fdate->getTimestamp().'<br>';
		echo $c = $b - $a."<br>";
		echo $b + $c."<br>";

		$ddate = new DateTime('2017-10-15');
		echo $b = $ddate->getTimestamp().'<br>';
	}
}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */