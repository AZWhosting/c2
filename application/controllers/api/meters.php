<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Meters extends REST_Controller {	
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
	
	//GET 
	function index_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){
	    	foreach ($filters as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}			

		//Get Result
		$obj->order_by('worder','asc');
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		

		if($obj->result_count()>0){			
			foreach ($obj as $value) {
				$contact = $value->contact->get_raw();
				$currency= $value->currency->get();
				$contacts = $value->contact->get();
				//Results				
				$data["results"][] = array(
					"id" 					=> $value->id,
					"currency_id"			=> $value->currency_id,
					"_currency"				=> array(
												"id" => $currency->id,
												"code" => $currency->code,
												"locale" => $currency->locale
					),
					"meter_number" 			=> $value->number,
					"worder" 				=> $value->worder,
					"contact_name" 			=> $contacts->name,
					"status" 				=> $value->status,
					"contact" 				=> $contact->result(),
					"number_digit"			=> $value->number_digit,
					"plan_id"				=> $value->plan_id,
					"map" 					=> $value->latitute,
					"starting_no" 			=> $value->startup_reading,
					"location_id" 			=> $value->location_id,
					"brand_id" 				=> $value->brand_id,
					"branch_id" 			=> $value->branch_id,
					"activated" 			=> $value->activated,
					"latitute" 				=> $value->latitute,
					"longtitute" 			=> $value->longtitute,
					"date_used" 			=> $value->date_used
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
	
	//POST
	function index_post() {
		$models = json_decode($this->post('models'));
		$data = array();
		foreach ($models as $value) {
			$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			
			
			$obj->deposit_id 			= isset($value->deposit_id)			?$value->deposit_id:0;
			$obj->invoice_id 			= isset($value->invoice_id)			?$value->invoice_id:0;
			$obj->ampere_id 			= isset($value->ampere_id)			?$value->ampere_id:0;
			$obj->phase_id 				= isset($value->phase_id)			?$value->phase_id:0;
			$obj->voltage_id 			= isset($value->voltage_id)			?$value->voltage_id:0;
			$obj->electricity_box_id 	= isset($value->electricity_box_id)	?$value->electricity_box_id:0;			
			$obj->item_id 				= isset($value->item_id)			?$value->item_id:0;
			$obj->tariff_id 			= isset($value->tariff_id)			?$value->tariff_id:0;
			$obj->exemption_id 			= isset($value->exemption_id)		?$value->exemption_id:0;
			$obj->maintenance_id 		= isset($value->maintenance_id)		?$value->maintenance_id:0;
			$obj->reactive_of 			= isset($value->reactive_of)		?$value->reactive_of:0;
			$obj->backup_of 			= isset($value->backup_of)			?$value->backup_of:0;
			$obj->number 				= isset($value->meter_number) 			? $value->meter_number:0;			
			$obj->multiplier 			= isset($value->multiplier) 		? $value->multiplier: 1;
			$obj->max_number 			= isset($value->max_number) 		? $value->max_number:0;
			$obj->contact_id 			= isset($value->contact_id) 		? $value->contact_id:0;
			$obj->startup_reading 		= isset($value->starting_no) 		? $value->starting_no: 0;
			$obj->ear_sealed 			= isset($value->ear_sealed)			?$value->ear_sealed:true;
			$obj->cover_sealed 			= isset($value->cover_sealed)		?$value->cover_sealed:true;
			// $obj->memo 					= $value->memo;
			$obj->longtitute 			= isset($value->longtitute) 		?$value->longtitute: "";
			$obj->latitute 				= isset($value->latitute) 			?$value->latitute: "";
			$obj->status 				= isset($value->status)				?$value->status:1;
			$obj->branch_id 			= isset($value->branch_id)			?$value->branch_id:"";
			$obj->location_id 			= isset($value->location_id)		?$value->location_id:"";
			$obj->brand_id 				= isset($value->brand_id)			?$value->brand_id:"";
			$obj->date_used= isset($value->date_used)?date("Y-m-d", strtotime($value->date_used)):'0000-00-00';
			
			$obj->number_digit 			= isset($value->number_digit)		?$value->number_digit:4;
			$obj->plan_id 				= isset($value->plan_id)			?$value->plan_id:0;
			if($obj->save()){	
				$data[] = array(
					"id" 					=> $obj->id,
					"number" 				=> $obj->number,
					"status" 				=> $obj->status,
					"number_digit" 			=> $obj->number_digit,
					"latitute" 				=> $obj->map,	
					"plan_id" 				=> $obj->plan_id,	
					"location_id" 			=> $obj->location_id,
					"brand_id" 				=> $obj->brand_id,
					"activated" 			=> 0,
					"latitute" 				=> $obj->latitute,
					"longtitute" 			=> $obj->longtitute,
					"date_used" 			=> $obj->date_used
				);					
			}			
		}
		$count = count($data);
		
		// $this->response($data, 201);
		if($count > 0) {
			$this->response(array("results" => 'success'), 201);
		} else {
			$this->response(array("results" => 'failed'), 401);
		}
							
	}

	//PUT
	function index_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$obj->deposit_id 			= isset($value->deposit_id)			?$value->deposit_id:0;
			$obj->invoice_id 			= isset($value->invoice_id)			?$value->invoice_id:0;
			$obj->ampere_id 			= isset($value->ampere_id)			?$value->ampere_id:0;
			$obj->phase_id 				= isset($value->phase_id)			?$value->phase_id:0;
			$obj->voltage_id 			= isset($value->voltage_id)			?$value->voltage_id:0;
			$obj->electricity_box_id 	= isset($value->electricity_box_id)	?$value->electricity_box_id:0;			
			$obj->item_id 				= isset($value->item_id)			?$value->item_id:0;
			$obj->tariff_id 			= isset($value->tariff_id)			?$value->tariff_id:0;
			$obj->exemption_id 			= isset($value->exemption_id)		?$value->exemption_id:0;
			$obj->maintenance_id 		= isset($value->maintenance_id)		?$value->maintenance_id:0;
			$obj->reactive_of 			= isset($value->reactive_of)		?$value->reactive_of:0;
			$obj->backup_of 			= isset($value->backup_of)			?$value->backup_of:0;
			$obj->number 				= isset($value->meter_number) 			? $value->meter_number:0;			
			$obj->multiplier 			= isset($value->multiplier) 		? $value->multiplier: 1;
			$obj->max_number 			= isset($value->max_number) 		? $value->max_number:0;
			// $obj->contact_id 			= isset($value->contact_id) 		? $value->contact_id:0;
			$obj->startup_reading 		= isset($value->starting_no) 		? $value->starting_no: 0;
			$obj->ear_sealed 			= isset($value->ear_sealed)			?$value->ear_sealed:true;
			$obj->cover_sealed 			= isset($value->cover_sealed)		?$value->cover_sealed:true;
			// $obj->memo 					= $value->memo;
			$obj->longtitute 			= isset($value->longtitute) 		?$value->longtitute: "";
			$obj->activated 			= isset($value->activated) 			?$value->activated: "";
			$obj->latitute 				= isset($value->latitute) 			?$value->latitute: "";
			$obj->status 				= isset($value->status)				?$value->status:1;
			$obj->branch_id 			= isset($value->branch_id)			?$value->branch_id:"";
			$obj->location_id 			= isset($value->location_id)		?$value->location_id:"";
			$obj->brand_id 				= isset($value->brand_id)			?$value->brand_id:"";
			$obj->worder 				= isset($value->worder)			?$value->worder:0;
			$obj->date_used = isset($value->date_used)?date("Y-m-d", strtotime($value->date_used)):'0000-00-00';
			$obj->number_digit 			= isset($value->number_digit)		?$value->number_digit:4;
			$obj->plan_id 				= isset($value->plan_id)			?$value->plan_id:0;

			if($obj->save()){
				//Results
				$data[] = array(
					"id" 					=> $obj->id,
					"number" 				=> $obj->number,
					"status" 				=> $obj->status,
					"number_digit" 			=> $obj->number_digit,
					"latitute" 				=> $obj->map,	
					"plan_id" 				=> $obj->plan_id,	
					"location_id" 			=> $obj->location_id,
					"brand_id" 				=> $obj->brand_id,
					"activated" 			=> $obj->activated,
					"worder" 				=> $obj->worder,
					"latitute" 				=> $obj->latitute,
					"longtitute" 			=> $obj->longtitute,
					"date_used" 			=> $obj->date_used
				);					
			}
		}
		$count = count($data);
		if($count > 0) {
			$this->response(array("results" => 'success'), 201);
		} else {
			$this->response(array("results" => 'failed'), 401);
		}
	}
	
	//DELETE
	function index_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
							
		}

		//Response data
		$this->response($data, 200);
	}

	//GET RECORD
	function record_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);		    		    		
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}									 			
		}		
	
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		

		if($obj->result_count()>0){			
			foreach ($obj as $value) {				
				//Results				
				$data["results"][] = array(
					"id" 			=> $value->id,
					"meter_id" 		=> $value->meter_id, 		
					"read_by" 		=> $value->read_by, 		
					"input_by" 		=> $value->input_by,
					"previous" 		=> $value->previous, 	
					"current" 		=> $value->current,
					"new_round" 	=> $value->new_round,
					"usage"			=> intval($value->usage),			
					"month_of" 		=> $value->month_of, 						
					"from_date" 	=> $value->from_date,			
					"to_date" 		=> $value->to_date,
					"memo"			=> $value->memo,			
					"deleted" 		=> $value->deleted,											
					"deleted_by"	=> $value->deleted_by	
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
	
	//POST RECORD
	function record_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->meter_id 		= $value->meter_id;
			$obj->read_by 		= $value->read_by;
			$obj->input_by 		= $value->input_by;
			$obj->previous 		= $value->previous;
			$obj->current 		= $value->current;
			$obj->new_round 	= $value->new_round;
			$obj->usage 		= $value->usage;
			$obj->month_of 		= $value->month_of;
			$obj->from_date 	= $value->from_date;
			$obj->to_date 		= $value->to_date;
			$obj->memo 			= $value->memo;
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
					"deleted" 		=> $obj->deleted,											
					"deleted_by"	=> $obj->deleted_by	
				);				
			}			
		}
		$data["count"] = count($data["results"]);
		
		$this->response($data, 201);						
	}

	//PUT RECORD
	function record_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$obj->meter_id 		= $value->meter_id;
			$obj->read_by 		= $value->read_by;
			$obj->input_by 		= $value->input_by;
			$obj->previous 		= $value->previous;
			$obj->current 		= $value->current;
			$obj->new_round 	= $value->new_round;
			$obj->usage 		= $value->usage;
			$obj->month_of 		= $value->month_of;
			$obj->from_date 	= $value->from_date;
			$obj->to_date 		= $value->to_date;
			$obj->memo 			= $value->memo;
			$obj->deleted 		= $value->deleted;
			$obj->deleted_by 	= $value->deleted_by;

			if($obj->save()){				
				//Results
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
					"deleted" 		=> $obj->deleted,											
					"deleted_by"	=> $obj->deleted_by	
				);						
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE RECORD
	function record_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	} 
	

	//GET READING
	function reading_get() {		
		$filters = $this->get();				
		$data["results"] = array();
		$data["count"] = 0;
		$isIRreader = false;

		if(!empty($filters) && isset($filters)){
			$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			if(!empty($filters["meter_id"]) || !empty($filters["location_id"])){
				//By location_id
				$hr = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$hr->select('meter_id');
				$hr->where('month_of', $filters["month_of"]);
				
				if($filters["location_id"]!==""){
					$hr->where_related_meter('location_id', $filters["location_id"]);				
				}else{
					$hr->where('id', $filters["meter_id"]);
				}

				$hr->get_iterated();								
				$ids = array();
				if($hr->exists()) {		    
				    foreach($hr as $value) {
				        $ids[] = $value->meter_id;
				    }
				}
				
				if($filters["location_id"]!==""){				
					$obj->where('location_id', $filters["location_id"]);
				}else{
					$obj->where('id', $filters["meter_id"]);
				}				
				if(count($ids)>0) {			    
				    $obj->where_not_in('id', $ids);
				}					
			}else{
				//By IR Reader	
				$isIRreader = true;			
				$noList = array();
				for ($i=1; $i < count($filters); $i++) {
					$d = explode(',', $filters[$i]);
					if(count($d)>1){
						$sr = str_replace(array("\n","\r\n","\r"), '', $d);						
						array_push($noList, $sr[0]);						
					}									
				}

				if(count($noList)>0){
					$obj->where_in('number', $noList);
				}				
			}

			//Unread				
			$obj->include_related('electricity_box', 'number');
			$obj->include_related('contact', array('surname', 'name'), FALSE);
			
			$obj->get_iterated();
			if($obj->exists()) {		    
			    foreach($obj as $key => $value) {
			    	$ir_current = "";
			    	$ir_usage = "";
			    	$previous = "";
			    	
					if($isIRreader){
						$mr = $value->meter_record->order_by('month_of', 'desc')->limit(1)->get();
				    	if($mr->exists()){
				    		$previous = $mr->current;
				    	}

						for ($i=1; $i < count($filters); $i++) { 
							$d = explode(',', $filters[$i]);
							if(count($d)>1){
								$sr = str_replace(array("\n","\r\n","\r"), '', $d);							
								if($sr[0]===$value->number){
									$ir_current = intval($sr[1]);
									$ir_usage = $ir_current - intval($previous);
									break;
								}
							}
						}
					}else{
						$mr = $value->meter_record->where('month_of <', $filters["month_of"])->order_by('month_of', 'desc')->limit(1)->get();
				    	if($mr->exists()){
				    		$previous = $mr->current;
				    	}
					}

			    	$data["results"][] = array(
						"id" 		=> $value->id,
						"meter_number" 	=> $value->number,			
						"multiplier"=> $value->multiplier,			
						"max_number"=> $value->max_number,
						
						"previous" 	=> $previous,
						"current" 	=> $ir_current,
						"new_round" => false,
						"usage" 	=> $ir_usage,											
						
						"index" 	=> $key,
						"isValid" 	=> true,
						"fullname" 	=> $value->surname.' '.$value->name,
						"electricity_box_number" => $value->electricity_box_number
					);
			    }
			}
			$data["count"] = $obj->result_count();
			$this->response($data, 200);
		}		
	}

	//WATER
	//GET WATER DEPOSIT
	function wdeposit_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);		    		
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{
	    			$obj->where($value["field"], $value["value"]);
	    		}
			}									 			
		}			

		//Get Result
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		

		if($obj->exists()){			
			foreach ($obj as $value) {
				$deposit = "";
				$deposit_amount = 0;
				$locale = "km-KH";
				$rate = 1;
				if($value->deposit_id>0){
					$d = new Invoice(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$d->get_by_id($value->deposit_id);

					$deposit = $d->number;
					$rate = floatval($d->rate);
					$locale = $d->locale;

					$depositAmount = new Payment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$depositAmount->select_sum("amount");
					$depositAmount->where("meter_id", $value->id);					
					$depositAmount->get();

					$deposit_amount = floatval($depositAmount->amount);
				}

				$invoice = "";
				$invoice_amount = 0;
				if($value->invoice_id>0){
					$inv = new Invoice(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$inv->get_by_id($value->invoice_id);

					$invoice = $inv->number;
					$invoice_amount = floatval($inv->amount);									
				}

				//Results				
				$data["results"][] = array(
					"id" 					=> $value->id,					
					"deposit_id" 			=> $value->deposit_id,
					"invoice_id" 			=> $value->invoice_id,						
					"number" 				=> $value->number,

					"deposit" 				=> $deposit,
					"deposit_amount" 		=> $deposit_amount,
					"invoice"				=> $invoice,
					"invoice_amount" 		=> $invoice_amount,
					"rate" 					=> $rate,
					"locale" 				=> $locale
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}

	//GET WREADING
	function wreading_get() {		
		$filters = $this->get();				
		$data["results"] = array();
		$data["count"] = 0;
		$isIRreader = false;

		if(!empty($filters) && isset($filters)){
			$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			if(!empty($filters["meter_id"]) || !empty($filters["location_id"])){
				//By manual
				$hr = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$hr->select('meter_id');								
				$hr->where('month_of', $filters["month_of"]);
				
				if($filters["location_id"]!==""){
					$hr->where_related('meter','location_id', $filters["location_id"]);				
				}else{
					$hr->where('meter_id', $filters["meter_id"]);
				}

				$hr->get();								
				$ids = array();
				if($hr->exists()) {		    
				    foreach($hr as $value) {
				        $ids[] = $value->meter_id;
				    }
				}
				
				if($filters["location_id"]!==""){				
					$obj->where('location_id', $filters["location_id"]);
				}else{
					$obj->where('id', $filters["meter_id"]);
				}				
				if(count($ids)>0) {			    
				    $obj->where_not_in('id', $ids);
				}					
			}else{
				//By IR Reader	
				$isIRreader = true;			
				$noList = array();
				for ($i=1; $i < count($filters); $i++) {
					$d = explode(',', $filters[$i]);
					if(count($d)>1){
						$sr = str_replace(array("\n","\r\n","\r"), '', $d);						
						array_push($noList, $sr[0]);						
					}									
				}

				if(count($noList)>0){
					$obj->where_in('number', $noList);
				}				
			}

			//Unread
			$obj->where("utility_id", 2);
			$obj->where("status", 1);						
			$obj->include_related('contact', array('contact_type_id','surname', 'name', 'company'), FALSE);
			$obj->order_by_related("contact", "worder", "asc");
			
			$obj->get();
			if($obj->exists()) {		    
			    foreach($obj as $key => $value) {
			    	$ir_current = "";
			    	$ir_usage = "";
			    	$previous = "";
			    	
					if($isIRreader){
						$mr = $value->meter_record->order_by('month_of', 'desc')->limit(1)->get();
				    	if($mr->exists()){
				    		$previous = $mr->current;
				    	}else{
				    		$previous = $value->startup_reading;
				    	}

						for ($i=1; $i < count($filters); $i++) { 
							$d = explode(',', $filters[$i]);
							if(count($d)>1){
								$sr = str_replace(array("\n","\r\n","\r"), '', $d);							
								if($sr[0]===$value->number){
									$ir_current = intval($sr[1]);
									$ir_usage = $ir_current - intval($previous);
									break;
								}
							}
						}
					}else{
						$mr = $value->meter_record->where('month_of <', $filters["month_of"])->order_by('month_of', 'desc')->limit(1)->get();
				    	if($mr->exists()){
				    		$previous = $mr->current;
				    	}else{
				    		$previous = $value->startup_reading;
				    	}
					}

					$fullname = $value->surname.' '.$value->name;
					if($value->contact_type_id=="6" || $value->contact_type_id=="7" || $value->contact_type_id=="8"){
						$fullname = $value->company;
					}

			    	$data["results"][] = array(
						"id" 		=> $value->id,
						"meter_number" 	=> $value->number,			
						"multiplier"=> $value->multiplier,			
						"max_number"=> $value->max_number,
						
						"previous" 	=> $previous,
						"current" 	=> $ir_current,
						"new_round" => false,
						"usage" 	=> $ir_usage,											
						
						"index" 	=> $key,
						"isValid" 	=> true,
						"fullname" 	=> $fullname										
					);
			    }
			}
			$data["count"] = $obj->result_count();
			$this->response($data, 200);
		}		
	}

	//GET WATER READING BOOK
	function wbook_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Meter(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {	    		
	    		$obj->where($value["field"], $value["value"]);	    		
			}									 			
		}

		//Join contact
		$obj->include_related("location", "name");
		$obj->include_related("contact", array("contact_type_id", "wnumber", "surname", "name", "company"));		
		$obj->where("status", 1);
		$obj->order_by_related("contact", "worder", "asc");
	
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		

		if($obj->result_count()>0){			
			foreach ($obj as $value) {
				$fullname = $value->contact_surname.' '.$value->contact_name;
				if($value->contact_contact_type_id=="6" || $value->contact_contact_type_id=="7" || $value->contact_contact_type_id=="8"){
					$fullname = $value->contact_company;
				}

				$mr = $value->meter_record->order_by('month_of', 'desc')->limit(1)->get();
				$reading = 0;
				$month_of = "";
				if($mr->exists()){
		    		$reading = $mr->current;
		    		$month_of = $mr->month_of;
		    	}else{
		    		$reading = $value->startup_reading;
		    		$month_of = $value->date_used;
		    	}

				//Results				
				$data["results"][] = array(
					"id" 				=> $value->id,
					"meter_number" 		=> $value->number,
					"reading" 			=> $reading,
					"month_of" 			=> $month_of,

					"contact_number" 	=> $value->contact_wnumber,				
					"fullname"			=> $fullname,
					"location_name" 	=> $value->location_name
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
	
	//GET READING FOR INVOICE
	function reading_for_invoice_get() {		
		$filters = $this->get();			
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$obj->where('month_of', $filters["month_of"]);
		
		if(!empty($filters["location_id"]) && isset($filters["location_id"])){    					    		
			$obj->where_related("meter", "location_id", $filters["location_id"]);   			
		}

		if(!empty($filters["meter_id"]) && isset($filters["meter_id"])){    					    		
			$obj->where("meter_id", $filters["meter_id"]);   			
		}				

		$obj->include_related('invoice_line', 'id');
				
		$obj->get();
		if($obj->exists()) {		    
		    foreach($obj as $value) {
		    	if($value->invoice_line_id){
		    		//Has invoice, so not include
		    	}else{
			    	$data["results"][] = array(
						"id" 		=> $value->id,													
						"meter_id"  => $value->meter_id,
						"previous" 	=> $value->previous,
						"current" 	=> $value->current,
						"new_round" => $value->new_round=="true"?true:false,
						"usage" 	=> $value->usage,
						"month_of"  => $value->month_of,
						"from_date" => $value->from_date,
						"to_date"   => $value->to_date,

						"meter" 	=> $value->meter->get_raw()->result(),
						"customer" 	=> $value->meter->get()->contact->get_raw()->result(),
																		
						"isCheck" 	=> false												
					);
		    	}
		    }
		}
		$data["count"] = count($data["results"]);		

		$this->response($data, 200);		
	}	
	
	//GET WATER LOW CONSUMPTION
	function wlow_consumption_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				if($value["field"]=="meter_number"){
					$obj->order_by_related("meter", "number", $value["dir"]);
				}else if($value["field"]=="branch_name"){
					$obj->order_by_related("meter", "branch_id", $value["dir"]);
				}else if($value["field"]=="location_name"){
					$obj->order_by_related("meter", "location_id", $value["dir"]);
				}else if($value["field"]=="contact_number" || $value["field"]=="fullname"){
					$obj->order_by_related("meter", "contact_id", $value["dir"]);
				}else{
					$obj->order_by($value["field"], $value["dir"]);
				}
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {
	    		if(!empty($value["operator"]) && isset($value["operator"])){
		    		if($value["operator"]=="where_in"){
		    			$obj->where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_in"){
		    			$obj->or_where_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_not_in"){
		    			$obj->where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_where_not_in"){
		    			$obj->or_where_not_in($value["field"], $value["value"]);
		    		}else if($value["operator"]=="like"){
		    			$obj->like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_like"){
		    			$obj->or_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="not_like"){
		    			$obj->not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="or_not_like"){
		    			$obj->or_not_like($value["field"], $value["value"]);
		    		}else if($value["operator"]=="startswith"){
		    			$obj->like($value["field"], $value["value"], "after");
		    		}else if($value["operator"]=="endswith"){
		    			$obj->like($value["field"], $value["value"], "before");
		    		}else if($value["operator"]=="contains"){
		    			$obj->like($value["field"], $value["value"], "both");
		    		}else if($value["operator"]=="or_where"){
		    			$obj->or_where($value["field"], $value["value"]);
		    		}else if($value["operator"]=="join_meter"){
		    			$obj->where_related("meter", $value["field"], $value["value"]);
		    		}else{
		    			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		    		}
	    		}else{
	    			$obj->where($value["field"], $value["value"]);	    			
	    		}
			}									 			
		}

		//Include meter
		$obj->include_related("meter", "number");
		$obj->include_related("meter/location", "name");
		$obj->include_related("meter/company", "name");
		$obj->include_related("meter/contact", array("contact_type_id", "wnumber", "surname", "name", "company"));

		//Only water meter
		$obj->where_related("meter", "utility_id", 2);
		
		//Get Result
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;		

		if($obj->exists()){			
			foreach ($obj as $value) {						
				$fullname = $value->meter_contact_surname.' '.$value->meter_contact_name;
				if($value->meter_contact_contact_type_id=="6" || $value->meter_contact_contact_type_id=="7" || $value->meter_contact_contact_type_id=="8"){
					$fullname = $value->meter_contact_company;
				}

				$data["results"][] = array(
					"id" 				=> $value->id,					 						
					"meter_number" 		=> $value->meter_number,
					"usage" 			=> $value->usage,
					"contact_number" 	=> $value->meter_contact_wnumber,
					"fullname" 			=> $fullname,
					"location_name"		=> $value->meter_location_name,
					"branch_name" 		=> $value->meter_company_name	 			
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
}
/* End of file meters.php */
/* Location: ./application/controllers/api/meters.php */