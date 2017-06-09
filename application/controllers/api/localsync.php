<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Localsync extends REST_Controller {	
	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		
		$institute = new Institute();
		$institute->where('id', $this->input->get_request_header('Institute'))->get();
		if($institute->exists()) {
			$conn = $institute->connection->get();
			$this->server_host = $conn->server_name;
			$this->server_user = $conn->username;
			$this->server_pwd = $conn->password;	
			$this->_database = $conn->inst_database;
		}
	}

	function txn_post() {
		$models = json_decode($this->post('models'));
		$institute = new Institute();
		$institute->where('id', $models[0]->institute_id)->get();
		if($institute->exists()) {
			$conn = $institute->connection->get();
			$this->server_host = $conn->server_name;
			$this->server_user = $conn->username;
			$this->server_pwd = $conn->password;	
			$this->_database = $conn->inst_database;
			date_default_timezone_set("$conn->time_zone");
		}
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->location_id 		= isset($value->location_id) ? $value->location_id : "";
			$obj->contact_id 		= isset($value->contact_id) ? $value->contact_id : "";
			$obj->payment_term_id	= isset($value->payment_term_id) ? $value->payment_term_id : 5;
			$obj->payment_method_id = isset($value->payment_method_id) ? $value->payment_method_id : "";
			$obj->reference_id 		= isset($value->reference_id) ? $value->reference_id:0;
			$obj->account_id 		= isset($value->account_id) ? $value->account_id : "";
			$obj->vat_id 			= isset($value->vat) ? $value->vat: 0;
			$obj->biller_id 		= isset($value->biller_id) ? $value->biller_id : "";
		   	$obj->number 			= isset($value->number) ? $value->number : "";
		   	$obj->type 				= isset($value->type) ? $value->type : "";
		   	$obj->amount 			= isset($value->amount) ? $value->amount : "";
		   	$obj->vat 				= isset($value->vat) ? $value->vat : "";
		   	$obj->rate 				= isset($value->rate) ? $value->rate : 1;
		   	$obj->locale 			= isset($value->locale) ? $value->locale : "";
		   	$obj->month_of 			= isset($value->month_of) ? $value->month_of : "";
		   	$obj->issued_date 		= isset($value->issued_date) ? $value->issued_date : "";
		   	$obj->bill_date 		= isset($value->bill_date) ? $value->bill_date : "";
		   	$obj->due_date 			= date('Y-m-d', strtotime($value->due_date));
		   	$obj->is_journal 		= 1;
		   	$obj->check_no 			= isset($value->check_no) ? $value->check_no : "";
		   	$obj->memo 				= isset($value->memo) ? $value->memo: "";
		   	$obj->memo2 			= isset($value->memo2) ? $value->memo2: "";
		   	$obj->meter_id 			= isset($value->meter_id) ? $value->meter_id: "";
		   	$obj->status 			= isset($value->status) ? $value->status: 0;
		   	$obj->sub_total 		= isset($value->amount) ? $value->amount : "";

	   		if($obj->save()){

	   			$journal = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$journal->transaction_id = $obj->id;
	   			$journal->account_id = isset($value->account_id) ? $value->account_id: "";
	   			$journal->contact_id = $value->contact_id;
	   			$journal->dr  		 = $obj->amount;
	   			$journal->description = "Utility Invoice";
	   			$journal->cr 		 = 0.00;
	   			$journal->rate 		 = $obj->rate;
	   			$journal->locale 	 = $obj->locale;
	   			$journal->save();

	   			$journal2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$journal2->transaction_id = $obj->id;
	   			$journal2->account_id = isset($value->account_id) ? $value->account_id: "";
	   			$journal2->contact_id = $value->contact_id;
	   			$journal2->dr 		  = 0.00;
	   			$journal2->cr 		  = $obj->amount;
	   			$journal2->description = "Utility Invoice";
	   			$journal2->rate 	  = $obj->rate;
	   			$journal2->locale 	  = $obj->locale;

	   			$journal2->save();

	   			$invoice_lines = [];
		   		foreach ($value->wline as $row) {
		   			$line = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			$line->transaction_id 	= $obj->id;
		   			$line->meter_record_id 	= isset($row->meter_record_id) ? $row->meter_record_id : "";
		   			$line->description 		= isset($row->description) ? $row->description : "Utility Invoice";
		   			$line->quantity 		= isset($row->quantity) ? $row->quantity: 0;
		   			$line->price 			= isset($row->price) ? $row->price : "";
		   			$line->amount 			= isset($row->amount) ? $row->amount : "";
		   			$line->rate 			= isset($row->rate) ? $row->rate : "";
		   			$line->locale 			= isset($row->locale) ? $row->locale : "";
		   			$line->has_vat 			= isset($row->has_vat) ? $row->has_vat : "";
		   			$line->type 			= isset($row->type)?$row->type:"";
		   			$line->item_id 			= isset($row->item_id)?$row->item_id:"";
		   			if($row->type == 'installment') {
		   				//Update Installment Schedule Invoice = 1
						$updateInstallSchedule = new Installment_schedule(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$updateInstallSchedule->where('id', $row->item_id);
						$updateInstallSchedule->update('invoiced', 1);
		   			}
		   			//to do: add to accouting line
		   			$updateInstallSchedule = isset($updateInstallSchedule) ? $updateInstallSchedule : "";
		   			if($line->save()){
		   				$invoice_lines[] = array(
		   					"id" 				=> $line->id,
		   					"invoice_id"		=> $line->invoice_id,
				   			"item_id"			=> $line->item_id,
				   			"measurement_id" 	=> isset($line->measurement_id)?$line->measurement_id:0,
				   			"meter_record_id" 	=> $line->meter_record_id,
				   			"description" 		=> $line->description,
				   			"quantity"			=> $line->quantity,
				   			"price" 			=> floatval($line->price),
				   			"amount" 			=> floatval($line->amount),
				   			"rate"				=> floatval($line->rate),
				   			"locale" 			=> $line->locale,
				   			"has_vat" 			=> $line->has_vat=="true"?true:false,
				   			"type" 				=> $line->type,
				   			"installment" 		=> $updateInstallSchedule
		   				);
		   			}
		   		}

				$data["results"][] = [];
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response(array('results'=> $data, 'count'=> count($data)), 201);				
	}
	function record_post() {
		$models = json_decode($this->post('models'));
		$institute = new Institute();
		$institute->where('id', $models[0]->institute_id)->get();
		if($institute->exists()) {
			$conn = $institute->connection->get();
			$this->server_host = $conn->server_name;
			$this->server_user = $conn->username;
			$this->server_pwd = $conn->password;	
			$this->_database = $conn->inst_database;
			date_default_timezone_set("$conn->time_zone");
		}
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->meter_id 		= $value->meter_id;
			$obj->read_by 		= isset($value->read_by)?$value->read_by:"";
			$obj->input_by 		= isset($value->input_by)?$value->input_by:"";
			$obj->previous 		= intval($value->previous);
			$obj->current 		= intval($value->current);
			$obj->new_round 	= isset($value->new_round)?$value->new_round:"";
			$obj->usage 		= intval($value->usage);
			$obj->month_of 		= $value->month_of;
			$obj->from_date 	= $value->from_date;
			$obj->to_date 		= $value->to_date;
			$obj->invoiced 		= 1;
			$obj->memo 			= isset($value->memo)?$value->memo:"";
			$obj->deleted 		= isset($value->deleted)?$value->deleted:"";
			$obj->deleted_by 	= isset($value->deleted_by)?$value->deleted_by:"";
						
			if($obj->save()){
				//Respsone
				$data["results"][] = array(
					"id" 			=> $obj->id,
					"meter_id" 		=> $obj->meter_id, 		
					"read_by" 		=> $obj->read_by, 		
					"input_by" 		=> $obj->input_by,
					"previous" 		=> $obj->previous, 	
					"current" 		=> $obj->current,
					"new_round" 	=> $obj->new_round,
					"usage"			=> $obj->usage,			
					"month_of" 		=> $obj->month_of, 						
					"from_date" 	=> $obj->from_date,			
					"to_date" 		=> $obj->to_date,
					"memo"			=> $obj->memo,		
					"invoiced" 		=> 1,	
					"deleted" 		=> $obj->deleted,											
					"deleted_by"	=> $obj->deleted_by	
				);				
			}			
		}
		$data["count"] = count($data["results"]);
		
		$this->response($data, 201);					
	}
	
	function index_get(){
		$this->backup();
	}

	public function backup()
	{
		$dsn = 'mysql://mightyadmin:banhji2016@banhji-db-instance.cwxbgxgq7thx.ap-southeast-1.rds.amazonaws.com/db_1495085871';
		$DB1 = $this->load->database($dsn, TRUE);
		// get all of the tables
		$this->load->dbutil();
		$this->load->helper('file');
		$this->load->helper('download');
		
		$this->db = $DB1;
		// Backup your entire database and assign it to a variable
		$this->load->dbutil();

		$prefs = array(
			'ignore' => array(),
			'format' => 'sql',
			'filename' => $this->db->database .'-'. date("Y-m-d-H-i-s").'-backup.sql',  
			'add_drop' => TRUE,
			'add_insert' => TRUE,
			'newline' => "\n" 
		);

		$backup = $this->dbutil->backup($prefs);
		$dbname = $this->db->database .'-'. date("Y-m-d-H-i-s").'-backup.sql';
		
		if ( ! write_file('assets/backupdb/'.$dbname, $backup)){
		    echo 'Unable to write the file';
		}else{
		    $data = file_get_contents("assets/backupdb/".$dbname);
    		force_download($dbname, $backup);
		}
	}
	
}
/* End of file meters.php */
/* Location: ./application/controllers/api/meters.php */