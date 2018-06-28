<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Choeun extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index() {	
		// $fineDate = new DateTime(date('Y-m-d'));
		// echo $a = $fineDate->getTimestamp().'<br>';
		// $fdate = new DateTime(date(''));
		// echo $b = $fdate->getTimestamp().'<br>';
		// echo $c = $b - $a."<br>";
		// echo $b + $c."<br>";

		// $ddate = new DateTime('2017-10-15');
		// echo $b = $ddate->getTimestamp().'<br>';

		// echo $a = sha1('pX1209$16@'.date('Y-m-d').'842');
		// $b = 'pX1209$16@'.date('Y-m-d').'842';
		// if($a == sha1($b)){
		// 	echo 'Yes';
		// }else{
		// 	echo 'No';
		// }
		// $d = new DateTime('2010-01-19');
		// $d->modify('-1 month');
	 //    $d->modify('first day of this month');
	 //    echo $d->format('Y-m-d');
		// $date = strtotime('2012-05-01 -1 months');
		// echo $date;
		// $now = date("Y-m-d H:i:s");
		// echo $now;
		// $new_time = date("Y-m-d H:i:s", strtotime('+5 hours',strtotime($now)));
		// echo $new_time;
		$this->load->view("wellnez/header");
		$this->load->view("choeun");
		$this->load->view("wellnez/footer");
	}
}

/* End of file home.php */
/* Location: ./application/controllers/utibill_view.php */