<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Referrals extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		
	}
	//POST
	function index_post() {
		$models = $this->post('msg');
		$MSG = $this->post('msg');
		$DS = $this->post('datesend');
		$cURL = $this->post('cURL');
		$uName = $this->post('uName');
			
		
		
		// foreach ($models as $value) {
			$obj = new Referral();			
			isset($MSG)? 				$obj->feedback_message 		= $MSG : "";
			isset($DS)? 				$obj->date 					= $DS : "";
			isset($cURL)? 				$obj->feedback_link 		= $cURL : "";
			isset($uName)? 				$obj->user_name 			= $uName : "";
						
			if($obj->save()){
				$data['message'] = "Success";
				$data['results'] = array('msg' =>  $MSG, 'date' => $DS, 'url' => $cURL);
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
