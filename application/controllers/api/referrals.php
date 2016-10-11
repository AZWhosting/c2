<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Referrals extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		
	}
	//POST
	function index_post() {
		
		$DS = $this->post('datesend');
		$uName = $this->post('uName');
		$rName1 = $this->post('rName1');
		$rName1 = $this->post('rName1');
		$rName2 = $this->post('rName2');
		$rName3 = $this->post('rName3');
		$rName4 = $this->post('rName4');
		$rName5 = $this->post('rName5');
		$rMail1 = $this->post('rMail1');
		$rMail2 = $this->post('rMail2');
		$rMail3 = $this->post('rMail3');
		$rMail4 = $this->post('rMail4');
		$rMail5 = $this->post('rMail5');
		
		
		// foreach ($models as $value) {
			$obj = new Referral();		
			isset($DS)? 				$obj->date 					= $DS : "";
			isset($uName)? 				$obj->user_name 			= $uName : "";
			isset($rName1)? 			$obj->rname1 				= $rName1 : "";
			isset($rName2)? 			$obj->rname2 				= $rName2 : "";
			isset($rName3)? 			$obj->rname3 				= $rName3 : "";
			isset($rName4)? 			$obj->rname4 				= $rName4 : "";
			isset($rName5)? 			$obj->rname5 				= $rName5 : "";
			isset($rMail1)? 			$obj->remail1 				= $rMail1 : "";
			isset($rMail2)? 			$obj->remail2 				= $rMail2 : "";
			isset($rMail3)? 			$obj->remail3 				= $rMail3 : "";
			isset($rMail4)? 			$obj->remail4 				= $rMail4 : "";
			isset($rMail5)? 			$obj->remail5 				= $rMail5 : "";

			if($obj->save()){
				$data['message'] = "Success";
				//$data['results'] = array('msg' =>  $MSG, 'date' => $DS, 'url' => $cURL);
			}else{
				$data['message'] = "error";
			}
			
		// }

		$this->response($data, 201);
		// echo $message;

	}

	
	
	
	
}
/* End of file transaction_template.php */
/* Location: ./application/controllers/api/transaction_template.php */
