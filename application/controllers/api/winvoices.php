<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Winvoices extends REST_Controller {
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
			date_default_timezone_set("$conn->time_zone");
		}
		// $this->_database = "db_banhji";
	}
	function make_get() {
		$getData = $this->get('filter');
		$filters = $getData['filters'];
		$table = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$data = array();

		if(isset($filters)) {
			foreach($filters as $filter) {
				if(isset($filter['operator'])) {
					$table->{$filter['operator']}($filter['field'], $filter['value']);
				} else {
					$table->where($filter['field'], $filter['value']);
				}
			}
		}
		$table->where('invoiced <>', 1);
		$table->get();

		$tmp = array();

		foreach($table as $row) {
			$meter = $row->meter->get();
			if($meter->reactive_status == 0){
				$contact = $meter->contact->get();

				$plan  = $meter->plan->get();
				
				if(isset($tmp["$meter->number"])){
					$tmp["$meter->number"]['items'][] = array(
					'type' => 'usage',
						'line' => array(
							'id'   => $row->id,
							'name' => 'usage',
							'from' => $row->from_date,
							'to'   => $row->to_date,
							'prev'=> intval($row->previous),
							'current'=> intval($row->current),
							'usage' => intval($row->usage),
							'unit' => 'm3',
							'amount'=> 0
						));
				} else {
					$tmp["$meter->number"]['type'] = 'Utility_invoice';
					$tmp["$meter->number"]['contact'] = array(
							'id' => $contact->id,
							'account_id' => $contact->account_id,
							'ra_id' => $contact->ra_id,
							'name' => $contact->name,
							'vat' => $contact->vat_no,
							'locale' => $contact->locale
													);
					$tmp["$meter->number"]['meter'] = array(
						'id' => $meter->id,
						'meter_number' => $meter->number,
						'location_id' => $meter->location_id,
						'multiplier' => intval($meter->multiplier)
					);
					$tmp["$meter->number"]['items'][] = array(
					'type' => 'usage',
					'line' => array(													
						'id'   => $row->id,
						'name' => 'Usage',
						'from' => $row->from_date,
						'to'   => $row->to_date,
						'prev'=> intval($row->previous),
						'current'=> intval($row->current),
						'usage_real' => intval($row->usage),
						'usage' => floatval($row->usage * $meter->multiplier),
						'amount'=> 0
					));
					// plan items
					$items = $plan->plan_item->get();
					foreach($items as $item) {
						$types = array('tariff', 'exemption', 'maintenance');
						if(in_array($item->type, $types)) {
							if($item->type == 'tariff') {
								$tariff = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
								$tariff->where('tariff_id', $item->id)->get();
								if($tariff->exists()) {
									foreach($tariff as $t) {
										$tmp["$meter->number"]['tariff'][] = array(
											"type" => 'tariff',
											"line" => array(
												'id'   => $t->id,
												'name' => $t->name,
												'is_flat' => $t->is_flat,
												'usage'  => floatval($t->usage),
												'amount'=> floatval($t->amount)
											)
										);
									}									
								}
							} else if($item->type == 'exemption'){
								$tmp["$meter->number"]['exemption'][] = array(
									"type" => $item->type,
									"line" => array(
										'id'   => $item->id,
										'currency_id' => $item->currency_id,
										'name' => $item->name,
										'unit'  => $item->unit,
										'amount'=> floatval($item->amount),
										'type' => $item->type
									)
								);
							}else {
								$tmp["$meter->number"]['maintenance'][] = array(
									"type" => $item->type,
									"line" => array(
										'id'   => $item->id,
										'name' => $item->name,
										'is_flat' => $item->is_flat == 0 ? FALSE:TRUE,
										'unit'  => $item->unit,
										'amount'=> floatval($item->amount)
									)
								);
							}							
						}						
					}

					// installment
					$installment = $meter->installment->include_related('installment_schedule', array('id','amount'))->limit(1)->where_related_installment_schedule('invoiced', 0)->get();
					$tmp["$meter->number"]['installment'][] = array(
						"type" => 'installment',
						"line" => array(
							'id'   => $installment->installment_schedule_id,
							'name' => 'រំលោះ',
							'from' => $installment->date,
							'to'   => 0,
							'prev' =>0,
							'current'=>0,
							'usage' => 1,
							'unit'  => 'money',
							'amount'=> floatval($installment->installment_schedule_amount)
						));
				}
			}
			if($meter->reactive_id != 0){
				$reactive = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$reactive->where("meter_id", $meter->reactive_id);
				$reactive->where('invoiced <>', 1);
				$reactive->order_by("id", "desc");
				$reactive->limit(1)->get();
				if($reactive->exists()){
					$tmp["$meter->number"]['reactive'] = array(
						'type' => 'reactive',
						'id'   => $reactive->id,
						'name' => 'reactive',
						'from' => $reactive->from_date,
						'to'   => $reactive->to_date,
						'prev'=> intval($reactive->previous),
						'current'=> intval($reactive->current),
						'usage' => intval($reactive->usage),
						'meter_number' => $meter->number."(Reactive)",
						'amount'=> 0
					);
				}
			}
		}

		foreach($tmp as $t) {
			$exemption = isset($t['exemption']) ? $t['exemption'] : [];
			$maintenance = isset($t['maintenance']) ? $t['maintenance'] : [];
			$installment = isset($t['installment']) ? $t['installment'] : [];
			$reactive = isset($t['reactive']) ? $t['reactive'] : 0;
			$data[] = array(
				'type' => $t['type'],
				'invoiced'=> FALSE,
				'contact' => $t['contact'],
				'meter'=> $t['meter'],
				'installment' => $installment,
				'exemption'=> $exemption,
				'reactive'=> $reactive,
				'maintenance' => $maintenance,
				'tariff' => $t['tariff'],
				'items'=> $t['items']
			);
		}
		$results['results'] = $data;
		$results['count'] = count($data);
		$this->response($results, 200);
	}
	function index_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = array();
		$data["count"] = 0;


		$number = "";
		foreach ($models as $value) {
			if($value->type == ""){
				$value->type = "WI";
			}
			if($value->issued_date == ""){
				$value->issued_date= "2017-01-01";
			}
			if(isset($value->is_recurring)){
				if($value->is_recurring==0){
					$number = $this->_generate_number($value->type, $value->issued_date);
				}
			}else{
				$number = $this->_generate_number($value->type, $value->issued_date);
			}

			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			// $obj->company_id 		= $value->company_id;
			$obj->location_id 		= isset($value->location_id) ? $value->location_id : "";
			$obj->contact_id 		= isset($value->contact->id) ? $value->contact->id : "";
			$obj->payment_term_id	= isset($value->payment_term_id) ? $value->payment_term_id : "";
			$obj->payment_method_id = isset($value->payment_method_id) ? $value->payment_method_id : "";
			$obj->reference_id 		= isset($value->reference_id) ? $value->reference_id:0;
			$obj->account_id 		= isset($value->contact->account_id) ? $value->contact->account_id : "";
			$obj->vat_id 			= isset($value->contact->vat) ? $value->contact->vat: 0;
			$obj->biller_id 		= isset($value->biller_id) ? $value->biller_id : "";
		   	$obj->number 			= isset($number) ? $number : "";
		   	$obj->type 				= isset($value->type) ? $value->type : "";
		   	$obj->amount 			= isset($value->amount) ? $value->amount : "";
		   	$obj->vat 				= isset($value->vat) ? $value->vat : "";
		   	$obj->rate 				= isset($value->rate) ? $value->rate : "";
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
		   	$obj->status 			= isset($value->status) ? $value->status: "";

		   	

	   		if($obj->save()){

	   			$journal = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$journal->transaction_id = $obj->id;
	   			$journal->account_id = $value->contact->account_id;
	   			$journal->contact_id = $value->contact->id;
	   			$journal->dr  		 = $obj->amount;
	   			$journal->description = "Utility Invoice";
	   			$journal->cr 		 = 0.00;
	   			$journal->rate 		 = $obj->rate;
	   			$journal->locale 	 = $obj->locale;
	   			$journal->save();

	   			$journal2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$journal2->transaction_id = $obj->id;
	   			$journal2->account_id = $value->contact->ra_id;
	   			$journal2->contact_id = $value->contact->id;
	   			$journal2->dr 		  = 0.00;
	   			$journal2->cr 		  = $obj->amount;
	   			$journal2->description = "Utility Invoice";
	   			$journal2->rate 	  = $obj->rate;
	   			$journal2->locale 	  = $obj->locale;

	   			$journal2->save();

	   			$invoice_lines = [];
		   		foreach ($value->invoice_lines as $row) {
		   			if(isset($row->type) && $row->type == 'usage') {
		   				$record = new Meter_record(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   				$record->where('id', $row->meter_record_id)->get();
		   				$record->invoiced = 1;
		   				$record->save();
		   			}
		   			$line = new Winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			$line->transaction_id 	= $obj->id;
		   			//$line->item_id 			= $row->item_id;
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

			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
					"company_id" 		=> $obj->company_id,
					"location_id" 		=> $obj->location_id,
					"contact_id" 		=> $obj->contact_id,
					"payment_term_id" 	=> $obj->payment_term_id,
					"payment_method_id" => $obj->payment_method_id,
					"reference_id" 		=> $obj->reference_id,
					"account_id" 		=> $obj->account_id,
					"vat_id"			=> $obj->vat_id,
					"biller_id" 		=> $obj->biller_id,
				   	"number" 			=> $obj->number,
				   	"type" 				=> $obj->type,
				   	"amount" 			=> floatval($obj->amount),
				   	"vat" 				=> floatval($obj->vat),
				   	"rate" 				=> floatval($obj->rate),
				   	"locale" 			=> $obj->locale,
				   	"month_of"			=> $obj->month_of,
				   	"issued_date"		=> $obj->issued_date,
				   	"bill_date" 		=> $obj->bill_date,
				   	"due_date" 			=> $obj->due_date,
				   	"check_no" 			=> $obj->check_no,
				   	"memo" 				=> $obj->memo,
				   	"memo2" 			=> $obj->memo2,
				   	"status" 			=> $obj->status,
				   	"invoice_lines" 	=> $invoice_lines
			   	);
		    }
		}

		$data["count"] = count($data["results"]);
		// $this->response($data, 201);
		$this->response($models, 201);
	}
	function index_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {

			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where('id', $value->id)->get();
			if($obj->exists()) {
				$obj->print_count = $value->print_count;
				if($obj->save()){
					$data["results"][] = array(
				   		"id" 				=> $obj->id,
						"company_id" 		=> null,
						"print_count"	 	=> $obj->print_count,
						"location_id" 		=> null,
						"contact_id" 		=> null,
						"payment_term_id" 	=> null,
						"payment_method_id" => null,
						"reference_id" 		=> $obj->reference_id,
						"account_id" 		=> $obj->account_id,
						"vat_id"			=> $obj->vat_id,
						"biller_id" 		=> $obj->biller_id,
					   	"number" 			=> $obj->number,
					   	"type" 				=> $obj->type,
					   	"amount" 			=> floatval($obj->amount),
					   	"vat" 				=> floatval($obj->vat),
					   	"rate" 				=> floatval($obj->rate),
					   	"locale" 			=> $obj->locale,
					   	"month_of"			=> $obj->month_of,
					   	"issued_date"		=> $obj->issued_date,
					   	"bill_date" 		=> $obj->bill_date,
					   	"due_date" 			=> $obj->due_date,
					   	"check_no" 			=> $obj->check_no,
					   	"memo" 				=> $obj->memo,
					   	"memo2" 			=> $obj->memo2,
					   	"status" 			=> $obj->status,
					   	"invoice_lines" 	=> array()
				   	);
				}
			}
		}
		$data["count"] = count($data["results"]);
		// $this->response($data, 201);
		$this->response($models, 201);
	}
	function index_get() {
		$getData = $this->get('filter');
		$filters = $getData['filters'];
		$table = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$data = array();

		if(isset($filters)) {
			foreach($filters as $filter) {
				if(isset($filter['operator'])) {
					$table->{$filter['operator']}($filter['field'], $filter['value']);
				} else {
					$table->where($filter['field'], $filter['value']);
				}
			}
		}
		$table->where('status', 0);
		$table->where('deleted', 0);
		$table->where('type','Utility_Invoice');
		$table->get();

		// $tmp = array();

		foreach($table as $row) {
			//echo $row->id."__";
			$contact = $row->contact->get();
			$meter = null;
			$invoiceLine = new winvoice_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$invoiceLine->include_related('meter_record/meter', array("id", "number"));

			$location = $row->location->get_raw();
			$invoiceLine->where('transaction_id', $row->id);
			$invoiceLine->limit(1)->get();
			if($invoiceLine->exists()) {
				foreach($invoiceLine as $line) {
					$meter = array(
						'meter_number'   => $line->meter_record_meter_number,
						'meter_id'   => $line->meter_record_meter_id,
						'location' => $location->result()
					);
				}
			}


			$items  = $row->winvoice_line->get();
			$lines  = array();
			
			
			$usage = 0;
			$remain = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			//$remain->where_related("contact/meter", "id", $meter->meter_id);
			$remain->where("meter_id", $row->meter_id);
			$remain->where("type", "Utility_Invoice");
			$remain->where("id <>", $row->id);
			$remain->where("deleted <>", 1);
			$remain->where("status <>", 1)->get();
			$amountOwed = 0;
			foreach($remain as $rem) {
				if($rem->status == 2) {
					$Rremain = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$Rremain->where("type", "Cash_Receipt");
					$Rremain->where("reference_id", $rem->id);
					$Rremain->where("deleted <>", 1);
					$Rremain->where("status <>", 1)->get();
					
					foreach($Rremain as $Rrem) {
						$amountOwed = $Rrem->sub_total - $Rrem->amount;
					}
				} else {
					$amountOwed += $rem->amount;
				}
			}
			foreach($items as $item) {
				
				if($item->type == 'usage') {
					$record = $item->meter_record->limit(1)->get();
					$usage = $record->usage;
					$lines[] = array(
						// 'number' => $m->number,
						'previous' => floatval($record->previous),
						'current'  => floatval($record->current),
						'consumption' => floatval($record->usage),
						'rate' => floatval($item->rate),
						'amount' => floatval($item->amount),
						'type' => $item->type,
						'from_date' => $record->from_date,
						'to_date' => $record->to_date
					);
				} elseif($item->type == 'exemption') {
					$unit = $item->item->limit(1)->get();
					$usage = $record->usage;
					$lines[] = array(
						'number' => $item->description,
						'previous' => floatval($record->previous),
						'current'  => floatval($record->current),
						'consumption' => floatval($record->usage),
						'rate' => floatval($item->rate),
						'amount' => floatval($item->amount),
						'type' => $item->type,
						'unit' => $unit->unit
					);
				}elseif($item->type == 'installment') {
					if($item->amount != 0){
						$unit = $item->item->limit(1)->get();
						$usage = $record->usage;
						$lines[] = array(
							'number' => "រំលោះ",
							'previous' => floatval($record->previous),
							'current'  => floatval($record->current),
							'consumption' => floatval($record->usage),
							'rate' => floatval($item->rate),
							'amount' => floatval($item->amount),
							'type' => $item->type,
							'unit' => $unit->unit
						);
					}
				}else{
					$lines[] = array(
						'number' => $item->description,
						'previous' => floatval($item->previous),
						'current'  => floatval($item->current),
						'consumption' => floatval($item->quantity),
						'rate' => 0,
						'amount' => floatval($item->amount),
						'type' => $item->type
					);
				}
			}
			//Calucate minus month of 5months
			$date = strtotime($row->month_of .' -5 months');
			$d = date('Y-m-01', $date);
			$monthGraph = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$monthGraph->where("month_of >=", $d);
			$monthGraph->where("meter_id", $row->meter_id);
			$monthGraph->where("deleted <>", 1);
			$monthGraph->order_by('id', 'desc')->limit(5)->get();
			$minusM = array();
			foreach($monthGraph as $monthOF) {
				array_push($minusM, $monthOF->amount);
			}

			$data[] = array(
				'id' => $row->id,
				'type' => $row->type,
				'number' => $row->number,
				'print_count' => intval($row->print_count),
				'month_of' => date('m', strtotime($row->month_of)),
				'status'=> $row->status,
				'issue_date' => $row->issued_date,
				'due_date' => $row->due_date,
				'bill_date' => $row->bill_date,
				'amount'  => floatval($row->amount),
				'locale' => $row->locale,
				'consumption' => $usage,
				'minusMonth' => $minusM,
				'contact' => array(
					'id' => $contact->id,
					'name' => $contact->name,
					'phone' => $contact->phone,
					'abbr' => $contact->abbr,
					'number' => $contact->number,
					'address'=> isset($contact->address)?$contact->address:''
					//'code' 	 => $contact->utility_abbr ."-".$contact->utility_code
				),
				'amount_remain' => floatval($amountOwed),
				'meter'=> $meter,
				'invoice_lines'=> $lines
			);

		}
		$this->response(array('results'=> $data, 'count'=> count($data)), 200);
	}

	//GET WATER PRINT SNAPSHOT 
	function wprint_snapshot_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Meter_record(null, $this->entity);		

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

		//Only water invoice
		$obj->where("type", "wInvoice");		
		
		//Results
		$obj->get();

		$totalInvoice = 0;
		$totalUnprint = 0;
		$totalUsage = 0;
		$totalAmount = 0;
		$ids = [];		
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				array_push($ids, $value->id);
				$totalInvoice++;
				if($value->print_count==0){
					$totalUnprint++;
				}
				$totalAmount += $value->amount;
			}

			$line = new Invoice_line(null, $this->entity);
			$line->select_sum("unit");
			$line->where_in("invoice_id", $ids);
			$line->where("type", "tariff");
			$line->get();
		}

		$data["results"][] = array(
			"id" 			=> 0,
			"totalInvoice" 	=> $totalInvoice,
			"totalUnprint" 	=> $totalUnprint,
			"totalUsage" 	=> intval($line->unit),
			"totalAmount" 	=> $totalAmount					
		);
		$data["count"] = count($data["results"]);			

		//Response Data		
		$this->response($data, 200);	
	}

	//Generate invoice number
	public function _generate_number($type, $date){
		$YY = date("y");
		$MM = date("m");
		$startDate = date("Y")."-01-01";
		$endDate = date("Y")."-12-31";

		if(isset($date)){
			$YY = date('y', strtotime($date));
			$MM = date('m', strtotime($date));
			$startDate = $YY."-01-01";
			$endDate = $YY."-12-31";
		}

		$prefix = new Prefix(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$prefix->where('type', $type);
		$prefix->limit(1);
		$prefix->get();

		$headerWithDate = $prefix->abbr . $YY . $MM;

		$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$txn->where('type', $type);
		$txn->where("issued_date >=", $startDate);
		$txn->where("issued_date <=", $endDate);
		$txn->where('is_recurring <>', 1);
		$txn->order_by('id', 'desc');
		$txn->limit(1);
		$txn->get();

		$number = "";
		if($txn->exists()){
			$no = 0;
			if(strlen($txn->number)>10){
				$no = intval(substr($txn->number, strlen($txn->number) - 5));
			}
			$no++;

			$number = $headerWithDate . str_pad($no, 5, "0", STR_PAD_LEFT);
		}else{
			//Check existing txn
			$existTxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$existTxn->where('type', $type);
			$existTxn->where('is_recurring <>', 1);
			$existTxn->limit(1);
			$existTxn->get();

			if($existTxn->exists()){
				$number = $headerWithDate . str_pad(1, 5, "0", STR_PAD_LEFT);
			}else{
				$number = $headerWithDate . str_pad($prefix->startup_number, 5, "0", STR_PAD_LEFT);
			}
		}

		return $number;
	}
}
/* End of file winvoices.php */
/* Location: ./application/controllers/api/categories.php */
