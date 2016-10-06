<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Counts extends REST_Controller {
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
	}


	//GET 
	function index_get() {		
		
		$obj = new User();
		// $obj->where('created_at >= ', '2016-10-7');

		$count = $obj->count();	

				

		//Response Data		
		$this->response(array('results' => $count), 200);	
	}	
	
	
}//End Of Class