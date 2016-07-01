<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Electricity_poles extends REST_Controller {
	
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('inventory/electricity_pole_model', 'electricity_pole');		
	}
	
		
	//GET 
	function electricity_pole_get() {
		$filter = $this->get("filter");		
		if(!empty($filter) && isset($filter)){
			$data = $this->electricity_pole->get_many_by('transformer_id', $filter['filters'][0]['value']);	
		}else{
			$data = $this->electricity_pole->get_all();	
		}					
		$this->response($data, 200);		
	}
	
	//POST
	function electricity_pole_post() {		
		$this->electricity_pole->insert($this->post());
		//$this->response($this->post(), 200);				
	}
	
	//PUT
	function electricity_pole_put() {
		$this->electricity_pole->update($this->put('id'), $this->put());
	}
	
	//DELETE
	function electricity_pole_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$this->electricity_pole->delete($this->delete('id'));
	}	


}//End Of Class