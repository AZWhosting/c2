<?php defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'/libraries/REST_Controller.php';

class Spa extends REST_Controller {	
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
	}
	//Work
	function work_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		$obj = new Choulr_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value['operator'])){
					$obj->{$value['operator']}($value["field"], $value["dir"]);
				}else{
					$obj->order_by($value["field"], $value["dir"]);
				}
			}
		}
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["operator"])) {
					$obj->{$value["operator"]}($value["field"], $value["value"]);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		//Results
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}
		if($obj->exists()){
			foreach ($obj as $value) {
		 		$data["results"][] = array(
		 			"id" 		=> $value->id,
		 			"name" 		=> $value->name,
		 			"is_system" => $value->is_system
		 		);
		 	}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function work_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			//Contact
			$txn->amount = $value->amount;
			$txn->tax = $value->tax;
			$txn->discount = $value->discount;
			$txn->sub_total = $value->sub_total;
			$txn->locale = $value->locale;
			$txn->is_journal = 1;
			$txn->rate = 1;
			$txn->contact_id = $value->contact_id;
			$txn->account_id = $value->account_id;
			$today = date("Y-m-d");
			$number = $this->_generate_number("Cash_Sale", $today);
			$txn->type = "Cash_Sale";
			$txn->start_date = date('Y-m-d H:i:s', strtotime($value->date));
			$txn->issued_date = date('Y-m-d H:i:s', strtotime($value->date));
			$txn->frequency = "Daily";
			$txn->month_option = "Day";
			$txn->intval = 1;
			$txn->day = 1;
			$txn->number = $number;
			if($txn->save()){
				//Work
				$work = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$work->transaction_id = $txn->id;
				$work->date = date('Y-m-d H:i:s', strtotime($value->date));
				$work->save();
				//Item
				$allcost = 0;
				$itemjournalcost = 0;
				$itemrate = $value->rate;
				$itemlocale = $value->locale;
				foreach($value->items as $item){
					$i = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$i->transaction_id = $txn->id;
					$i->item_id = $item->id;
					$i->contact_id = $txn->contact_id;
					$i->measurement_id = $item->measurement->measurement_id;
					$i->tax_item_id = $item->tax_item->id;
					$i->assembly_id = $item->assembly_id;
					$i->description = isset($item->description) ? $item->description : $item->name;
					$i->quantity = $item->quantity;
					$i->conversion_ratio = 1;
					$i->cost = $item->avarage_cost;
					$i->price = $item->price;
					$i->amount = $item->amount;
					$i->discount = $item->discount;
					$i->tax = $item->tax;
					$i->rate = $txn->rate;
					$i->locale = $txn->locale;
					$i->movement = -1;
					$allcost += $item->avarage_cost;
					if($item->item->item_type_id == 1){
						$ijr = $item->amount * $item->rate;
						$itemjournalcost += $ijr;
						$itemrate = $item->rate;
						$itemlocale = $item->locale;
					}
					$i->save();
				}
				//Journal
				$j1 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$j1->transaction_id = $txn->id;
				$j1->account_id = 71;
				$j1->contact_id = $txn->contact_id;
				$j1->description = $value->items[0]->item->name;
				$j1->dr = 0;
				$j1->cr = $txn->sub_total;
				$j1->rate = $txn->rate;
				$j1->locale = $txn->locale;
				$j1->save();
				if($value->tax > 0){
					$j2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$j2->transaction_id = $txn->id;
					$j2->account_id = 57;
					$j2->contact_id = $txn->contact_id;
					$j2->description = $value->items[0]->item->name;
					$j2->dr = 0;
					$j2->cr = $value->tax;
					$j2->rate = $txn->rate;
					$j2->locale = $txn->locale;
					$j2->save();
				}
				$j3 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$j3->transaction_id = $txn->id;
				$j3->account_id = 7;
				$j3->contact_id = $txn->contact_id;
				$j3->description = $value->items[0]->item->name;
				$j3->dr = $value->amount;
				$j3->cr = 0;
				$j3->rate = $txn->rate;
				$j3->locale = $txn->locale;
				$j3->save();
				if($value->discount > 0){
					$j4 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$j4->transaction_id = $txn->id;
					$j4->account_id = 72;
					$j4->contact_id = $txn->contact_id;
					$j4->description = "Spa POS Discount";
					$j4->dr = $value->discount;
					$j4->cr = 0;
					$j4->rate = $txn->rate;
					$j4->locale = $txn->locale;
					$j4->save();
				}
				if($itemjournalcost > 0){
					$j5 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$j5->transaction_id = $txn->id;
					$j5->account_id = 74;
					$j5->contact_id = $txn->contact_id;
					$j5->description = "Cost of Sale ".$value->items[0]->item->name;
					$j5->dr = $itemjournalcost;
					$j5->cr = 0;
					$j5->rate = $itemrate;
					$j5->locale = $itemlocale;
					$j5->save();
					$j6 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$j6->transaction_id = $txn->id;
					$j6->account_id = 13;
					$j6->contact_id = $txn->contact_id;
					$j6->description = "Inventory ".$value->items[0]->item->name;
					$j6->dr = 0;
					$j6->cr = $itemjournalcost;
					$j6->rate = $itemrate;
					$j6->locale = $itemlocale;
					$j6->save();
				}
				//customer
				foreach($value->customer as $cus){
					$sc = new Spa_work_customer(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$sc->work_id = $work->id;
					$sc->customer_id = $cus->id;
					$sc->save();
				}
				//employee
				foreach($value->employee as $e){
					$se = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$se->work_id = $work->id;
					$se->employee_id = $e->id;
					$se->save();
				}
				//room
				foreach($value->room as $r){
					$sr = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$sr->work_id = $work->id;
					$sr->room_id = $r->id;
					$sr->save();
				}
				$data["results"][] = array(
			   		"id" 			=> $txn->id
			   	);
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function work_put(){
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->name) 		? $obj->name 	= $value->name : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"name" 			=> $obj->name
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	function work_delete() {
		$models = json_decode($this->delete('models'));
		foreach ($models as $key => $value) {
			$obj = new Choulr_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
		$this->response($data, 200);
	}
	//Book
	function book_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		$obj = new Choulr_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		//Sort
		if(!empty($sort) && isset($sort)){
			foreach ($sort as $value) {
				if(isset($value['operator'])){
					$obj->{$value['operator']}($value["field"], $value["dir"]);
				}else{
					$obj->order_by($value["field"], $value["dir"]);
				}
			}
		}
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		if(isset($value["operator"])) {
					$obj->{$value["operator"]}($value["field"], $value["value"]);
				} else {
	    			$obj->where($value["field"], $value["value"]);
				}
			}
		}
		//Results
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}
		if($obj->exists()){
			foreach ($obj as $value) {
		 		$data["results"][] = array(
		 			"id" 		=> $value->id,
		 			"name" 		=> $value->name,
		 			"is_system" => $value->is_system
		 		);
		 	}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function book_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			//Work
			$work = new Spa_book(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$work->date = date('Y-m-d H:i:s', strtotime($value->date));
			$work->deleted = 0;
			$work->save();
			//Item
			foreach($value->items as $item){
				$i = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$i->transaction_id = $work->id;
				$i->item_id = $item->id;
				$i->contact_id = $value->contact_id;
				$i->measurement_id = $item->measurement->measurement_id;
				$i->tax_item_id = $item->tax_item->id;
				$i->assembly_id = $item->assembly_id;
				$i->description = isset($item->description) ? $item->description : $item->name;
				$i->quantity = $item->quantity;
				$i->conversion_ratio = 1;
				$i->cost = $item->avarage_cost;
				$i->price = $item->price;
				$i->amount = $item->amount;
				$i->discount = $item->discount;
				$i->tax = $item->tax;
				$i->rate = $item->rate;
				$i->locale = $value->locale;
				$i->movement = -1;
				$i->save();
			}
			//customer
			foreach($value->customer as $cus){
				$sc = new Spa_work_customer(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$sc->work_id = $work->id;
				$sc->customer_id = $cus->id;
				$sc->save();
			}
			//employee
			foreach($value->employee as $e){
				$se = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$se->work_id = $work->id;
				$se->employee_id = $e->id;
				$se->save();
			}
			//room
			foreach($value->room as $r){
				$sr = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$sr->work_id = $work->id;
				$sr->room_id = $r->id;
				$sr->save();
				$room = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$room->where("id", $r->id)->limit(1)->get();
				$room->book_time = $work->date;
				$room->save();
			}
			$data["results"][] = array(
		   		"id" 			=> $work->id
		   	);
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function book_put(){
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Choulr_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->name) 		? $obj->name 	= $value->name : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"name" 			=> $obj->name
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	function book_delete() {
		$models = json_decode($this->delete('models'));
		foreach ($models as $key => $value) {
			$obj = new Choulr_space(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}

		//Response data
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
/* End of file choulr.php */
/* Location: ./application/controllers/api/meters.php */