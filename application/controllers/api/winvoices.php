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
		$this->_database = "db_banhji";
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
												'usage' => array(
													'id'   => $row->id,
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
													'name' => $contact->name
												);
				$tmp["$meter->number"]['meter'] = array(
													'id' => $meter->id,
													'number' => $meter->number,
													'multiplier' => $meter->multiplier
												);
				$tmp["$meter->number"]['items'][] = array(
												'usage' => array(
													'id'   => $row->id,
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
						$tmp["$meter->number"]['items'][] = array(
						"$item->type" => array(
							'id'   => $item->id,
							'from' => $item->from,
							'to'   => $item->to,
							'prev' =>0,
							'current'=>0,
							'usage' => 0,
							'unit'  => $item->unit,
							'amount'=> $item->amount
						));
					}						
				}

				// installment
				$installment = $meter->installment->get();
				$tmp["$meter->number"]['items'][] = array(
											"installment" => array(
												'id'   => $installment->id,
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
			if($number==""){
				$number = $this->_generate_number($value->type);
			}else{
				$last_no = $number;
				$header = substr($last_no, 0, -5);
				$no = intval(substr($last_no, strlen($last_no) - 5));
				$no++;
				$number = $header . str_pad($no, 5, "0", STR_PAD_LEFT);
			}

			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			// $obj->company_id 		= $value->company_id;
			// $obj->location_id 		= $value->location_id;
			$obj->contact_id 		= $value->contact_id;
			$obj->payment_term_id	= $value->payment_term_id;
			$obj->payment_method_id = $value->payment_method_id;
			$obj->reference_id 		= $value->reference_id;
			$obj->account_id 		= $value->account_id;
			$obj->vat_id 			= $value->vat_id;
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
		   	$obj->due_date 			= $value->due_date;
		   	$obj->check_no 			= $value->check_no;
		   	$obj->memo 				= $value->memo;
		   	$obj->memo2 			= $value->memo2;
		   	$obj->status 			= $value->status;

	   		if($obj->save()){
	   			$invoice_lines = [];
		   		foreach ($value->invoice_lines as $row) {
		   			$line = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			$line->invoice_id 		= $obj->id;
		   			$line->item_id 			= $row->item_id;
		   			$line->meter_record_id 	= $row->meter_record_id;
		   			$line->description 		= $row->description;
		   			$line->unit 			= $row->unit;
		   			$line->price 			= $row->price;
		   			$line->amount 			= $row->amount;
		   			$line->rate 			= $row->rate;
		   			$line->locale 			= $row->locale;
		   			$line->has_vat 			= $row->has_vat;
		   			$line->type 			= isset($row->type)?$row->type:"";

		   			if($line->save()){
		   				$invoice_lines[] = array(
		   					"id" 				=> $line->id,
		   					"invoice_id"		=> $line->invoice_id,
				   			"item_id"			=> $line->item_id,
				   			"measurement_id" 	=> isset($line->measurement_id)?$line->measurement_id:0,
				   			"meter_record_id" 	=> $line->meter_record_id,
				   			"description" 		=> $line->description,
				   			"unit"				=> $line->unit,
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
			$existTxn->where('is_recurring', 0);
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
