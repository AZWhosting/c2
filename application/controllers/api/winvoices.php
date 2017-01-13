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
		}
		// $this->_database = "db_banhji";
	}

	// based on meter
	// with contact detail
	// and items based on meter record &
	// plan
	// installment
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
													'prev'=>$row->previous,
													'current'=>$row->current,
													'usage' => $row->usage,
													'unit' => 'm3',
													'amount'=> 0
												));
			} else {
				$tmp["$meter->number"]['type'] = 'water_invoice';
				$tmp["$meter->number"]['contact'] = array(
													'id' => $contact->id,
													'account_id' => $contact->account_id,
													'ra_id' => $contact->ra_id,
													'name' => $contact->name
												);
				$tmp["$meter->number"]['meter'] = array(
													'id' => $meter->id,
													'number' => $meter->number,
													'multiplier' => $meter->multiplier
												);
				$tmp["$meter->number"]['items'][] = array(
												'type' => 'usage',
												'line' => array(													
													'id'   => $row->id,
													'name' => 'Usage',
													'from' => $row->from_date,
													'to'   => $row->to_date,
													'prev'=>$row->previous,
													'current'=>$row->current,
													'usage' => $row->usage,
													'unit' => 'm3',
													'amount'=> 0
												));
				// plan items
				$items = $plan->plan_item->get();
				foreach($items as $item) {
					$types = array('tariff', 'exemption', 'maintenance');
					if(in_array($item->type, $types)) {
						if($item->type === 'tariff') {
							$tariff = new Plan_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$tariff->where('tariff_id', $item->id)->get();
							if($tariff->exists()) {
								foreach($tariff as $t) {
									$tmp["$meter->number"]['items'][] = array(
										"type" => "$item->type",
										"line" => array(
											'id'   => $t->id,
											'from' => $t->from,
											'to'   => $t->to,
											'name' => $t->name,
											'prev' =>0,
											'current'=>0,
											'usage' => 0,
											'is_flat' => $t->is_flat == 0 ? FALSE:TRUE,
											'usage'  => $t->usage,
											'amount'=> $t->amount
										)
									);
								}									
							}
						} else {
							$tmp["$meter->number"]['items'][] = array(
								"type" => "$item->type",
								"line" => array(
									'id'   => $item->id,
									'from' => $item->from,
									'to'   => $item->to,
									'name' => $item->name,
									'prev' =>0,
									'current'=>0,
									'usage' => 0,
									'is_flat' => $item->is_flat == 0 ? FALSE:TRUE,
									'unit'  => $item->unit,
									'amount'=> $item->amount
								)
							);
						}							
					}						
				}

				// installment
				$installment = $meter->installment->get();
				$tmp["$meter->number"]['items'][] = array(
											"type" => 'installment',
											"line" => array(
												'id'   => $installment->id,
												'name' => 'Installment',
												'from' => 0,
												'to'   => 0,
												'prev' =>0,
												'current'=>0,
												'usage' => 0,
												'unit'  => 'money',
												'amount'=> $installment->amount
											));
			}
		}

		foreach($tmp as $t) {
			$data[] = array(
				'type' => $t['type'],
				'invoiced'=> FALSE,
				'contact' => $t['contact'],
				'meter'=> $t['meter'],
				'items'=> $t['items']
			);
		}

		$this->response(array('results' => $data, 'count' => count($data)), 200);
	}

	function index_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = array();
		$data["count"] = 0;

		$number = "";
		foreach ($models as $value) {
			if(isset($value->is_recurring)){
				if($value->is_recurring==0){
					$number = $this->_generate_number($value->type, $value->issued_date);
				}
			}else{
				$number = $this->_generate_number($value->type, $value->issued_date);
			}

			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			// $obj->company_id 		= $value->company_id;
			// $obj->location_id 		= $value->location_id;
			$obj->contact_id 		= $value->contact_id;
			$obj->payment_term_id	= $value->payment_term_id;
			$obj->payment_method_id = $value->payment_method_id;
			$obj->reference_id 		= $value->reference_id;
			$obj->account_id 		= $value->account_id;
			$obj->vat_id 			= isset($value->vat_id) ? $value->vat_id: 0;
			$obj->biller_id 		= $value->biller_id;
		   	$obj->number 			= $number;
		   	$obj->type 				= $value->type;
		   	$obj->amount 			= $value->amount;
		   	$obj->vat 				= $value->vat;
		   	$obj->rate 				= $value->rate;
		   	$obj->locale 			= $value->locale;
		   	$obj->month_of 			= $value->month_of;
		   	$obj->issued_date 		= $value->issued_date;
		   	$obj->payment_date 		= $value->payment_date;
		   	$obj->due_date 			= date('Y-m-d', strtotime($value->due_date));
		   	$obj->check_no 			= $value->check_no;
		   	$obj->memo 				= $value->memo;
		   	$obj->memo2 			= $value->memo2;
		   	$obj->status 			= $value->status;

	   		if($obj->save()){
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
		   			$line->item_id 			= $row->item_id;
		   			$line->meter_record_id 	= $row->meter_record_id;
		   			$line->description 		= $row->description;
		   			$line->quantity 		= $row->quantity;
		   			$line->price 			= $row->price;
		   			$line->amount 			= $row->amount;
		   			$line->rate 			= $row->rate;
		   			$line->locale 			= $row->locale;
		   			$line->has_vat 			= $row->has_vat;
		   			$line->type 			= isset($row->type)?$row->type:"";

		   			//to do: add to accouting line

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
				   			"type" 				=> $line->type
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
				   	"payment_date" 		=> $obj->payment_date,
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
		$this->response($data, 201);
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
		$table->where('type','Water_Invoice');
		$table->get();

		$tmp = array();

		foreach($table as $row) {
			$meter = null;
			$contact = $row->contact->include_related('utility', array('abbr', 'code'))->select('id, name, abbr, number, address')->get();

			$items  = $row->winvoice_line->get();
			$lines  = array();
			$m = $contact->meter->get();
			$usage = 0;	
			$meter = array(
				'number'   => $m->number,
				'location' => $m->location->get_raw()->result(),
			);

			foreach($items as $item) {
				
				 if($item->type == '') {
					$record = $item->meter_record->limit(1)->get();
					$usage = $record->usage;
					$lines[] = array(
						'number' => $m->number,
						'previous' => $record->previous,
						'current'  => $record->current,
						'consumption' => $record->usage,
						'rate' => $item->rate,
						'amount' => $item->amount
					);
				} else {
					$lines[] = array(
						'number' => $item->description,
						'previous' => 0,
						'current'  => 0,
						'consumption' => 0,
						'rate' => 0,
						'amount' => $item->amount
					);
				}
			}
			$data[] = array(
				'id' => $row->id,
				'type' => $row->type,
				'number' => $row->number,
				'month_of' => date('m', strtotime($row->month_of)),
				'status'=> $row->status,
				'issue_date' => $row->issued_date,
				'due_date' => $row->due_date,
				'amount'  => $row->amount,
				'consumption' => $usage,
				'contact' => array(
					'id' => $contact->id,
					'name' => $contact->name,
					'abbr' => $contact->abbr,
					'number' => $contact->number,
					'address'=> $contact->address,
					'code' 	 => $contact->utility_abbr ."-".$contact->utility_code
				),
				'meter'=> $meter,
				'items'=> $lines
			);

		}

		$this->response(array('results' => $data, 'count' => count($data)), 200);
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
