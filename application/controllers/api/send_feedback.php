<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Send_feedback extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		
	}
	//POST
	function index_post() {
		// $models = json_decode($this->post('models'));
		$MSG = $_REQUEST['msg'];
		$DS = $_REQUEST['datesend'];
		$cURL = $_REQUEST['cURL'];
		$uName = $_REQUEST['uName'];
			
		/*----------------PHP CODE MAIL BY CHOEUN----------------------*/
		//$emailTo = 'chhunhour.strinfo@gmail.com'; //Put your own email address here
		$emailTo = 'loat.choeun@gmail.com';
		$subject = 'Feedback From BanhJi app';
		$body = "User Name : $uName \n\nMessage: $MSG \n\nURL: $cURL \n\nDate Send: $DS \n\n--------------\nThis Email sended from BanhJi app";
		$headers = 'From: BanhJi app <'.$emailTo.'>' . "\r\n" . 'Reply-To: ';
		if(mail($emailTo, $subject, $body, $headers)){
			$message = "Your feedback was send to us. Thank";
		}else{
			$message = "error";
		}
		
		// foreach ($models as $value) {
		// 	$obj = new Transaction_template(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
		// 	isset($value->transaction_form_id)? $obj->transaction_form_id 	= $value->transaction_form_id : "";
		// 	isset($value->user_id)? 			$obj->user_id 				= $value->user_id : "";
		// 	isset($value->type)? 				$obj->type 					= $value->type : "";
		// 	isset($value->name)? 				$obj->name 					= $value->name : "";
		// 	isset($value->title)? 				$obj->title 				= $value->title : "";
		// 	isset($value->note)? 				$obj->note 					= $value->note : "";
		// 	isset($value->moduls)? 				$obj->moduls 				= $value->moduls : "";
		// 	isset($value->color)? 				$obj->color 				= $value->color : "";	
						
		// 	if($obj->save()){
		// 		$data["results"][] = array(
		// 			"id" 					=> $obj->id,
		// 			"transaction_form_id" 	=> $obj->transaction_form_id,					
		// 			"user_id" 				=> $obj->user_id,
		// 			"type" 					=> $obj->type,
		// 			"name" 	 				=> $obj->name,
		// 			"color" 				=> $obj->color,
		// 			"title" 				=> $obj->title,
		// 			"note" 					=> $obj->note,
		// 			"moduls" 				=> $obj->moduls,
		// 			"created_at" 			=> $obj->created_at,
		// 			"updated_at" 			=> $obj->updated_at
		// 		);
		// 	}
		// }
		//$data["count"] = count($data["results"]);
		
		echo $message;

	}

	
	
	
	
}
/* End of file transaction_template.php */
/* Location: ./application/controllers/api/transaction_template.php */
