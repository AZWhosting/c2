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
		$obj = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		$obj->order_by("start_date", "asc");
		if($obj->exists()){
			foreach ($obj as $value) {
				//Transaction
				$tran = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$tran->where("id", $value->transaction_id)->limit(1)->get();
				//Customer
				$con = new Spa_work_customer(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$con->where("work_id", $value->id)->get_iterated();
				if($con->exists()){
					$conar = [];
					$customer_name = "";
					foreach($con as $c){
						$sc = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$sc->where("id", $c->customer_id)->limit(1)->get();
						$conar[] = array(
							"id" 	=> $sc->id,
							"name" 	=> $sc->name,
						);
						$customer_name .= $sc->name." ";
					}
				}
				//Room
				$room = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$room->where("work_id", $value->id)->get_iterated();
				$roomar = [];
				$roomshow = "";
				if($room->exists()){
					foreach($room as $r){
						$sroom = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$sroom->where("id", $r->room_id)->limit(1)->get();
						$roomar[] = array(
							"id" => $sroom->id,
							"name" => $sroom->name,
						);
						$roomshow .= $sroom->name." ";
					}
				}
				//Item
				$item = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$item->where("transaction_id", $value->transaction_id)->get_iterated();
				$itemar = [];
				if($item->exists()){
					foreach($item as $i){
						$me = new Measurement(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$me->where("id", $i->measurement_id)->limit(1)->get();
						$itemar[] = array(
							"id" 			=> $i->id,
							"description" 	=> $i->description,
							"quantity" 		=> intval($i->quantity),
							"measurement" 	=> array("id" => $me->id, "name" => $me->name),
							"price" 		=> floatval($i->price),
							"amount" 		=> floatval($i->amount),
							"rate" 			=> floatval($i->rate),
							"locale" 		=> $i->locale
						);
					}
				}
				$d = new DateTime($value->start_date);
				//Service Charge
				$scamount = 0;
				$scar = [];
				$sc = new Spa_service_charge(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$sc->where("status", 1)->limit(1)->get();
				if($sc->exists()){
					$scamount = (floatval($tran->sub_total) * floatval($sc->percentage)) / 100;
					$scitem = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$scitem->where("id", $sc->item_id)->limit(1)->get();
					$scar = array(
						"id" 		=> $sc->id,
						"item_id" 	=> $sc->item_id,
						"item_name" 	=> $scitem->name
					);
				}
		 		$data["results"][] = array(
		 			"id" 			=> $value->id,
		 			"transaction_id" 	=> intval($value->transaction_id),
		 			"rate" 			=> floatval($tran->rate),
		 			"locale" 		=> $tran->locale,
		 			"sub_total" 	=> floatval($tran->sub_total),
		 			"service_charge" => $scamount,
		 			"service_charge_ar" => $scar,
		 			"amount" 		=> floatval($tran->amount),
		 			"tax" 			=> floatval($tran->tax),
		 			"discount" 		=> floatval($tran->discount),
		 			"room" 			=> $roomar,
		 			"roomshow" 		=> $roomshow,
		 			"item" 			=> $itemar,
		 			"dateshow" 		=> $d->format('Y-m-d g:i A'),
		 			"start_date"  	=> $value->start_date,
		 			"customer" 		=> $conar,
		 			"customer_name" => $customer_name,
		 		);
		 	}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function workbk_post(){
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
			$today = date('Y-m-d', strtotime($value->start_date));
			$number = $this->_generate_number("Sale_Order", $today);
			$txn->type = "Sale_Order";
			$txn->start_date = date('Y-m-d H:i:s', strtotime($value->start_date));
			$txn->issued_date = date('Y-m-d H:i:s', strtotime($value->start_date));
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
				$work->phone = isset($value->phone) ? $value->phone: "";
				$work->save();
				//Item
				$allcost = 0;
				$itemjournalcost = 0;
				$itemrate = $value->rate;
				$itemlocale = $value->locale;
				foreach($value->items as $item){
					$i = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$i->transaction_id = $txn->id;
					$i->item_id = $item->item->id;
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
					$j2->description = "Wellnez Tax";
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
					$j4->description = "Wellnez Discount";
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
			$number = $this->_generate_number("Sale_Order", $today);
			$txn->type = "Sale_Order";
			$txn->start_date = date('Y-m-d H:i:s', strtotime($value->start_date));
			$txn->issued_date = date('Y-m-d H:i:s', strtotime($value->start_date));
			$txn->frequency = "Daily";
			$txn->month_option = "Day";
			$txn->intval = 1;
			$txn->day = 1;
			$txn->number = $number;
			if($txn->save()){
				//Work
				$work = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$work->transaction_id = $txn->id;
				$work->start_date = date('Y-m-d H:i:s', strtotime($value->start_date));
				$work->phone = isset($value->phone) ? $value->phone: "";
				$work->save();
				//Item
				$allcost = 0;
				$itemjournalcost = 0;
				$itemrate = $value->rate;
				$itemlocale = $value->locale;
				foreach($value->items as $item){
					$i = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$i->transaction_id = $txn->id;
					$i->item_id = $item->item->id;
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
					$i->movement = 0;
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
				}
				$data["results"][] = array(
			   		"id" 			=> $txn->id
			   	);
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
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
	function updatework_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			//Transaction
			$tran = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$tran->where("id", $value->transaction_id)->limit(1)->get();
			$tran->deleted = 1;
			$tran->save();
			//Item
			$it = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$it->where("transaction_id", $value->transaction_id);
			$it->update("deleted",1);
			//Save New Txn
			$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			//Contact
			$txn->amount = $value->amount;
			$txn->tax = $value->tax;
			$txn->discount = $value->discount;
			$txn->sub_total = $value->sub_total;
			$txn->locale = $value->locale;
			$txn->is_journal = 1;
			$txn->rate = floatval($tran->rate);
			$txn->contact_id = intval($tran->contact_id);
			$txn->account_id = intval($tran->account_id);
			$today = date("Y-m-d");
			$number = $this->_generate_number("Sale_Order", $today);
			$txn->type = "Sale_Order";
			$txn->start_date = $value->start_date;
			$txn->issued_date = $value->start_date;
			$txn->frequency = "Daily";
			$txn->month_option = "Day";
			$txn->intval = 1;
			$txn->day = 1;
			$txn->number = $number;
			if($txn->save()){
				//Work
				$work = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$work->where("id", $value->work_id)->limit(1)->get();
				$work->transaction_id = $txn->id;
				$work->save();
				//Item
				foreach($value->items as $item){
					$i = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$i->transaction_id = $txn->id;
					$i->item_id = $item->item->id;
					$i->contact_id = $txn->contact_id;
					$i->measurement_id = $item->measurement->measurement_id;
					$i->tax_item_id = $item->tax_item->id;
					$i->assembly_id = $item->assembly_id;
					$i->description = isset($item->description) ? $item->description : $item->name;
					$i->quantity = $item->quantity;
					$i->conversion_ratio = 1;
					$i->cost = $item->cost;
					$i->price = $item->price;
					$i->amount = $item->amount;
					$i->discount = $item->discount;
					$i->tax = $item->tax;
					$i->rate = $txn->rate;
					$i->locale = $txn->locale;
					$i->movement = 0;
					$i->save();
				}
				$data["results"][] = array(
			   		"id" 			=> $txn->id
			   	);
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
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
		$obj = new Spa_book(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		$obj->order_by("start_date", "asc");
		$obj->where("status", 1);
		if($obj->exists()){
			foreach ($obj as $value) {
				//Transaction
				$tran = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$tran->where("id", $value->transaction_id)->limit(1)->get();
				//Customer
				$con = new Spa_work_customer(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$con->where("book_id", $value->id)->get_iterated();
				if($con->exists()){
					$conar = [];
					$customer_name = "";
					foreach($con as $c){
						$sc = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$sc->where("id", $c->customer_id)->limit(1)->get();
						$conar[] = array(
							"id" 	=> $sc->id,
							"name" 	=> $sc->name,
						);
						$customer_name .= $sc->name." ";
					}
				}
				//Room
				$room = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$room->where("book_id", $value->id)->get_iterated();
				$roomar = [];
				$roomshow = "";
				if($room->exists()){
					foreach($room as $r){
						$sroom = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$sroom->where("id", $r->room_id)->limit(1)->get();
						$roomar[] = array(
							"id" => $sroom->id,
							"name" => $sroom->name,
						);
						$roomshow .= $sroom->name." ";
					}
				}
				//Employee
				//Customer
				$em = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$em->where("book_id", $value->id)->get_iterated();
				$employee_name = "";
				if($em->exists()){
					foreach($em as $e){
						$ec = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$ec->where("id", $e->employee_id)->limit(1)->get();
						$employee_name .= $ec->name." ";
					}
				}
				//Item
				$item = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$item->where("transaction_id", $value->transaction_id)->get_iterated();
				$itemar = [];
				if($item->exists()){
					foreach($item as $i){
						$me = new Measurement(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$me->where("id", $i->measurement_id)->limit(1)->get();
						$itemar[] = array(
							"id" 			=> $i->id,
							"description" 	=> $i->description,
							"quantity" 		=> intval($i->quantity),
							"measurement" 	=> array("id" => $me->id, "name" => $me->name),
							"price" 		=> floatval($i->price),
							"amount" 		=> floatval($i->amount),
							"rate" 			=> floatval($i->rate),
							"locale" 		=> $i->locale
						);
					}
				}
				$d = new DateTime($value->start_date);
		 		$data["results"][] = array(
		 			"id" 			=> $value->id,
		 			"transaction_id" 	=> intval($value->transaction_id),
		 			"rate" 			=> floatval($tran->rate),
		 			"locale" 		=> $tran->locale,
		 			"sub_total" 	=> floatval($tran->sub_total),
		 			"amount" 		=> floatval($tran->amount),
		 			"tax" 			=> floatval($tran->tax),
		 			"discount" 		=> floatval($tran->discount),
		 			"room" 			=> $roomar,
		 			"roomshow" 		=> $roomshow,
		 			"item" 			=> $itemar,
		 			"dateshow" 		=> $d->format('Y-m-d g:i A'),
		 			"start_date"  	=> $value->start_date,
		 			"customer" 		=> $conar,
		 			"customer_name" => $customer_name,
		 			"phone" 		=> $value->phone,
		 			"employee_name" => $employee_name
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
			$today = date('Y-m-d', strtotime($value->start_date));
			$number = $this->_generate_number("Quote", $today);
			$txn->type = "Quote";
			$txn->start_date = date('Y-m-d H:i:s', strtotime($value->start_date));
			$txn->issued_date = date('Y-m-d H:i:s', strtotime($value->start_date));
			$txn->frequency = "Daily";
			$txn->month_option = "Day";
			$txn->intval = 1;
			$txn->day = 1;
			$txn->number = $number;
			if($txn->save()){
				//Work
				$work = new Spa_book(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$work->transaction_id = $txn->id;
				$work->start_date = date('Y-m-d H:i:s', strtotime($value->start_date));
				$work->phone = isset($value->phone) ? $value->phone: "";
				$work->status = 1;
				$work->save();
				//Item
				$itemrate = $value->rate;
				$itemlocale = $value->locale;
				foreach($value->items as $item){
					$i = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$i->transaction_id = $txn->id;
					$i->item_id = $item->item->id;
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
					$i->movement = 0;
					$i->save();
				}
				
				//customer
				foreach($value->customer as $cus){
					$sc = new Spa_work_customer(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$sc->book_id = $work->id;
					$sc->customer_id = $cus->id;
					$sc->save();
				}
				//employee
				foreach($value->employee as $e){
					$se = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$se->book_id = $work->id;
					$se->employee_id = $e->id;
					$se->save();
				}
				//room
				foreach($value->room as $r){
					$sr = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$sr->book_id = $work->id;
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
	function book_put(){
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			//Work
			$work = new Spa_book(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$work->get_by_id($value->id);
			$work->start_date = date('Y-m-d H:i:s', strtotime($value->start_date));
			$work->deleted = 0;
			$work->phone = $value->phone;
			$work->save();
			//Item
			foreach($value->items as $item){
				//Delet old
				$it = new Spa_book_item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$it->where("transaction_id", $value->id)->get_iterated();
				if($it->exists()){
					$it->delete_all();
				}
				$i = new Spa_book_item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
			$scd = new Spa_work_customer(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$scd->where("book_id", $value->id)->get_iterated();
			if($scd->exists()){
				$scd->delete_all();
			}
			foreach($value->customer as $cus){
				$sc = new Spa_work_customer(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$sc->book_id = $work->id;
				$sc->customer_id = $cus->id;
				$sc->save();
			}
			//employee
			$sed = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$sed->where("book_id", $value->id)->get_iterated();
			if($sed->exists()){
				$sed->delete_all();
			}
			foreach($value->employee as $e){
				$se = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$se->book_id = $work->id;
				$se->employee_id = $e->id;
				$se->save();
			}
			//room
			$srd = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$srd->where("book_id", $value->id)->get_iterated();
			if($srd->exists()){
				$srd->delete_all();
			}
			foreach($value->room as $r){
				$sr = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$sr->book_id = $work->id;
				$sr->room_id = $r->id;
				$sr->save();
				$room = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$room->where("id", $r->id)->limit(1)->get();
				$room->book_time = $work->start_date;
				$room->save();
			}
			$data["results"][] = array(
		   		"id" 			=> $work->id
		   	);
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	function book_delete() {
		$models = json_decode($this->delete('models'));
		foreach ($models as $value) {
			$obj = new Spa_book(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			$obj->deleted = 1;
			$obj->save();
			//Customer
			$sc = new Spa_work_customer(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$sc->where("book_id", $value->id)->get_iterated();
			if($sc->exists()){
				$sc->delete_all();
			}
			//Employee
			$se = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$se->where("book_id", $value->id)->get_iterated();
			if($se->exists()){
				$se->delete_all();
			}
			//Room
			$sr = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$sr->where("book_id", $value->id)->get_iterated();
			if($sr->exists()){
				$sr->delete_all();
			}
			//Item
			$it = new Spa_book_item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$it->where("transaction_id", $value->id)->get_iterated();
			if($it->exists()){
				$it->delete_all();
			}
			//
			$data["results"][] = array(
				"id"   => $obj->id,
			);
		}

		//Response data
		$this->response($data, 200);
	}
	//Room
	function rooms_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		$obj = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		 			"number" 	=> $value->number,
		 			"square_meter" 	=> $value->square_meter,
		 			"branch_id" => $value->branch_id
		 		);
		 	}
		}
		//Response Data		
		$this->response($data, 200);
	}
	//Calendar
	function calendar_get(){
		$data['callback'] = [];
 		$data["callback"][] = array(
 			"MeetingID"=>2,
		    "RoomID"=>1,
		    "Attendees"=>[],
		    "Title"=>"Meeting with customers.",
		    "Description"=>"",
		    "StartTimezone"=>null,
		    "Start"=>"\/Date(1518495271)\/",
		    "End"=>"\/Date(1518495271)\/",
		    "EndTimezone"=>null,
		    "RecurrenceRule"=>null,
		    "RecurrenceID"=>null,
		    "RecurrenceException"=>null,
		    "IsAllDay"=>false
 		);
		//Response Data		
		$this->response($data, 200);
	}
	//Invoicing
	function invoice_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			//Sale Order
			$saleorder = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$saleorder->where("id", $value->transaction_id)->limit(1)->get();
			//Invoice
			$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$number = $this->_generate_number("Invoice", $value->issued_date);
			$txn->amount = $saleorder->amount;
			$txn->number = $number;
			$txn->issued_date = $value->issued_date;
			$txn->contact_id = $saleorder->contact_id;
			$txn->payment_term_id = 5;
			$txn->payment_method_id = 1;
			$txn->user_id = $value->user_id;
			$txn->type = 'Invoice';
			$txn->sub_total = $saleorder->sub_total;
			$txn->discount = $saleorder->discount;
			$txn->tax = $saleorder->tax;
			$txn->fine = $saleorder->fine;
			$txn->rate = $saleorder->rate;
			$txn->locale = $saleorder->locale;
			$txn->start_date = $value->issued_date;
			$txn->frequency = 'Daily';
			$txn->month_option = 'Day';
			$txn->interval = 1;
			$txn->day = 1;
			$txn->status = 0;
			$txn->is_journal = 1;
			if($txn->save()){
				//Item
				foreach($value->items as $item){
					$it = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$it->transaction_id = $txn->id;
					$it->contact_id = $txn->contact_id;
					$it->measurement_id = $item->measurement_id;
					$it->tax_item_id = $item->tax_item_id;
					$it->item_id = $item->item_id;
					$it->assembly_id = $item->assembly_id;
					$it->description = isset($item->description) ? $item->description : $item->item->name;
					$it->quantity = $item->quantity;
					$it->conversion_ratio = $item->conversion_ratio;
					$it->cost = $item->cost;
					$it->price = $item->price;
					$it->amount = $item->amount;
					$it->discount = $item->discount;
					$it->tax = $item->tax;
					$it->rate = $item->rate;
					$it->locale = $item->locale;
					if($item->item->item_type_id == 4){
						$it->movement = 0;
					}else{
						$it->movement = -1;
					}
					$it->reference_id = $saleorder->id;
					$it->reference_no = $saleorder->number;
					$it->save();
				}
			}
			$saleorder->status = 1;
			$saleorder->save();
			//Work
			$work = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$work->where("id", $value->work_id)->limit(1)->get();
			$work->end_date = date('Y-m-d H:i:s', strtotime($value->issued_date));
			$work->status = 1;
			$work->transaction_id = $txn->id;
			$work->save();
			//contact
			$con = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$con->where("id", $txn->contact_id)->limit(1)->get();
			$conar = array(
				"id" 	=> $con->id,
				"name" 	=> $con->name,
				"address" 	=> $con->address,
				"phone" 	=> $con->phone,
				"number" 	=> $con->number,
				"abbr" 		=> $con->abbr,
			);
			$data["results"][] = array(
		   		"id" 			=> $txn->id,
		   		"number" 		=> $txn->number,
		   		"amount" 		=> floatval($txn->amount),
		   		"sub_total" 	=> floatval($txn->sub_total),
		   		"discount" 		=> floatval($txn->discount),
		   		"tax" 			=> floatval($txn->tax),
		   		"rate" 			=> floatval($txn->rate),
		   		"locale" 		=> $txn->locale,
		   		"issued_date" 	=> $txn->issued_date,
		   		"items" 		=> $value->items,
		   		"contact" 		=> $conar
		   	);
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//Service Charge
	function service_charge_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		$obj = new Spa_service_charge(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		$obj->where("deleted", 0);
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
		 			"id" 			=> $value->id,
		 			"item_id" 		=> intval($value->item_id),
		 			"percentage" 	=> floatval($value->percentage),
		 			"status" 		=> intval($value->status),
		 			"register" 		=> $value->status == 1 ? true:false,
		 		);
		 	}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function service_charge_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			//Work
			$obj = new Spa_service_charge(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->item_id 		= isset($value->item_id) 	? $value->item_id : 0;
			$obj->percentage 	= isset($value->percentage) ? $value->percentage : 0;
			$obj->status 		= $value->register == false ? 0 : 1;
			//Check Item
			if($obj->item_id == 0){
				//Add Transace Item
				$it = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$it->item_type_id = 5;
				$it->category_id = 4;
				$it->name = 'Service Charge';
				$it->sale_description = 'Service Charge';
				$it->locale = $value->locale;
				$it->inventory_account_id = 71;
				$it->status = 1;
				if($it->save()){
					$obj->item_id = $it->id;
				}
			}
			$obj->save();
			$data["results"][] = array(
		   		"id" 			=> $obj->id,
		   		"item_id" 		=> $obj->item_id,
		   		"percentage" 	=> $obj->percentage,
		   		"status" 		=> $obj->status,
		   	);
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function service_charge_put(){
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			//Work
			$obj = new Spa_service_charge(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			$obj->item_id 		= isset($value->item_id) 	? $value->item_id : 0;
			$obj->percentage 	= isset($value->percentage) ? $value->percentage : 0;
			$obj->status 		= $value->register == false ? 0 : 1;
			//Check Item
			if($obj->item_id == 0){
				//Add Transace Item
				$it = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$it->item_type_id = 5;
				$it->category_id = 4;
				$it->name = 'Service Charge';
				$it->sale_description = 'Service Charge';
				$it->locale = $value->locale;
				$it->inventory_account_id = 71;
				$it->status = 1;
				if($it->save()){
					$obj->item_id = $it->id;
				}
			}
			$obj->save();
			$data["results"][] = array(
		   		"id" 			=> $obj->id,
		   		"item_id" 		=> $obj->item_id,
		   		"percentage" 	=> $obj->percentage,
		   		"status" 		=> $obj->status,
		   	);
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//Cancel Reason
	function cancel_reason_get(){
		$data["results"] = [];
		$data["count"] = 0;
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$obj = new Spa_cancel_reason(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
					"id" 				=> $value->id,
					"description"		=> $value->description,
					"status"			=> $value->status
				);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	function cancel_reason_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_cancel_reason(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->description) 		? $obj->description 	= $value->description : "";
			$obj->status = 1;
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"description" 	=> $obj->description,
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);	
	}
	function cancel_reason_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_cancel_reason(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->description) 		? $obj->description 	= $value->description : 0;
			$obj->status = 1;
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
			   		"description" 		=> $obj->description
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	function cancel_reason_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Spa_cancel_reason(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}
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