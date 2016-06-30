<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Helpers extends REST_Controller {

	function index_get() {
		$this->response(array(array('id'=>1,'status'=>'OK'),array('id'=>2, 'status'=>'not OK')), 200);
	}

	function statuses_get() {
		$statuses = array(
			array( "id" => 1, "status" => "មិនទាន់ចាប់ផ្ដើម" ),
			array( "id" => 2, "status" => "បង់វែ" ),
			array( "id" => 3, "status" => "ផ្អាក" ),
			array( "id" => 4, "status" => "កំពុងដំណើរការ" ),
			array( "id" => 5, "status" => "រងចាំ" ),
			array( "id" => 6, "status" => "ចប់" )
		);

		$this->response($statuses, 200);
	}

	function priorities_get() {
		$priorityList = array(
			array( "id" => "1", "priority" => "ទាប" ),
			array( "id" => "2", "priority" => "បធ្យម" ),
			array( "id" => "3", "priority" => "បន្ទាន់" )
		);
		$this->response($priorityList, 200);

	}
}