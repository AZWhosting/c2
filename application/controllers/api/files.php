<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Files extends REST_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('inventory/meter_model', 'meter');
		$this->load->model('inventory/meter_record_model', 'meter_record');
		$this->load->model('inventory/electricity_box_model', 'electricity_box');
		$this->load->model('people/people_model', 'people');
	}
	
	function do_upload_image_post()	{
		$config['upload_path'] = './uploads/logo';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['overwrite'] = true;		
		$config['max_size']	= '1024*100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->response($error, 400);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			
			$file = $this->upload->data();
			//$data['name'] = $file['file_name'];

			$this->response($data, 200); //$this->load->view('upload_success', $data);
		}
	}
	
	function do_upload_file_post()	{
		$config['upload_path'] = './uploads/documents';
		$config['allowed_types'] = 'csv|doc|pdf|txt';
		$config['max_size']	= '1024*100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['overwrite']  = TRUE;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->response($error, 400);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->response($data, 200);
		}
	}

	function read_from_file_get() {
		$this->load->library('getcsv');
		$path = './uploads/documents/'.'meter_read.txt';
		$data = $this->getcsv->set_file_path($path)->get_array();
		//print_r($data);
		$this->response($data, 200);
	}

	//Meter reading file ----- Dawine
	function meter_reading_file_get(){
		$this->load->library('getcsv');
		$path = './uploads/documents/'.'meter_read.csv';
		$arr = $this->getcsv->set_file_path($path)->get_array();
		$this->response($arr, 200);

		$data = array();
		//if(count($arr)>0){
			// $meterNoList = array();
			// foreach ($arr as $key => $value) {
			// 	$meterNoList[] = $value->meter;
			// }
						
			//$meters = $this->meter->where_in("meter_no", $meterNoList)->get_all();								
			// foreach($meters as $m) {
			// 	$meter_record_id = $this->meter_record->max($m->id);
				
			// 	$data[] = array(						
			// 		'id' 				=> $m->id,					   		
			//   	 	'meter_no'			=> $m->meter_no,					  	 	
			//   	 	'parent_id'			=> $m->parent_id,
			//   	 	'tariff_id'			=> $m->tariff_id,
			//   	 	'max_digit'			=> $m->max_digit,

			//   	 	'customers'			=> $this->people->get($m->customer_id),						    
			// 	    'electricity_boxes'	=> $this->electricity_box->get($m->electricity_box_id),					  		
			// 	    'meter_records'		=> $this->meter_record->get($meter_record_id),
				
			//   		'rcheckNewRound'		=> false,					  		
			//   		'reactive_new_reading' 	=> "",
			//   		'checkNewRound'			=> false,					  		
			//   		'new_reading'			=> $row['reading']				  						  									    								   
			// 	);
				
			// }			
							
		// }else{
		// 	$this->response(array(), 200);
		// }			
	}	
}