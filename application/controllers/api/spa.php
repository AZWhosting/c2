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
		$roomds = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$roomds->get_iterated();
		foreach($roomds as $rooms){
			$spaworkroom = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$spaworkroom->where("room_id", $rooms->id)->get_iterated();
			if($spaworkroom->exists()){
				foreach($spaworkroom as $spwr){
					$obj = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$obj->where("id", $spwr->work_id);
					$obj->get_iterated();
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
							//Service Charge
							$sc = new Spa_service_charge(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$sc->where("status", 1)->limit(1)->get();
							$scamount = 0;
							$scar = [];
							if($item->exists()){
								foreach($item as $i){
									$me = new Measurement(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
									$me->where("id", $i->measurement_id)->limit(1)->get();
									$itemar[] = array(
										"id" 			=> $i->id,
										"name" 			=> $i->description,
										"quantity" 		=> intval($i->quantity),
										"measurement" 	=> array("id" => $me->id, "name" => $me->name),
										"price" 		=> floatval($i->price),
										"amount" 		=> floatval($i->amount),
										"rate" 			=> floatval($i->rate),
										"locale" 		=> $i->locale
									);
									if($sc->exists()){
										if($i->item_id == $sc->item_id){
											$scamount = floatval($i->amount);
										}
									}
								}
							}
							$d = new DateTime($value->start_date);
							if($sc->exists()){
								$scitem = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
								$scitem->where("id", $sc->item_id)->limit(1)->get();
								$scar = array(
									"id" 		=> $sc->id,
									"item_id" 	=> $sc->item_id,
									"item_name" => $scitem->name
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
					 			"room_id" 		=> $room->id,
					 			"roomshow" 		=> $roomshow,
					 			"item" 			=> $itemar,
					 			"dateshow" 		=> $d->format('Y-m-d g:i A'),
					 			"start_date"  	=> $value->start_date,
					 			"customer" 		=> $conar,
					 			"customer_name" => $customer_name,
					 			"status" 		=> "Serving"
					 		);
					 	}
					}
				}
			}else{
				$data["results"][] = array(
		 			"id" 			=> "",
		 			"transaction_id" => "",
		 			"rate" 			=> "",
		 			"locale" 		=> "",
		 			"sub_total" 	=> "",
		 			"service_charge" => "",
		 			"service_charge_ar" => "",
		 			"amount" 		=> "",
		 			"tax" 			=> "",
		 			"discount" 		=> "",
		 			"room" 			=> "",
		 			"room_id" 		=> $rooms->id,
		 			"roomshow" 		=> $rooms->name,
		 			"item" 			=> array(),
		 			"dateshow" 		=> "",
		 			"start_date"  	=> "",
		 			"customer" 		=> "",
		 			"customer_name" => "",
		 			"status" 		=> "Available"
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
			//Service charge
			$sec = new Spa_service_charge(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$sec->where("status", 1)->limit(1)->get();
			$iecprice = 0;
			if($sec->exists()){
				$iecprice = (floatval($value->amount) + floatval($sec->percentage)) / 100;
			}
			$txn->amount = $value->amount + $iecprice;
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
					$i->description = $item->item->name;
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
				//Service charge
				if($iecprice > 0){
					$iec = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$iec->where("id", $sec->item_id)->limit(1)->get();
					$ie = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$ie->transaction_id = $txn->id;
					$ie->item_id = $sec->item_id;
					$ie->contact_id = $txn->contact_id;
					$ie->measurement_id = $iec->measurement_id;
					$ie->tax_item_id = 0;
					$ie->assembly_id = 0;
					$ie->description = $iec->name;
					$ie->quantity = 1;
					$ie->conversion_ratio = 1;
					$ie->cost = $iec->cost;
					$ie->price = $iecprice;
					$ie->amount = $iecprice;
					$ie->discount = 0;
					$ie->tax = 0;
					$ie->rate = $txn->rate;
					$ie->locale = $txn->locale;
					$ie->movement = 0;
					$ie->save();
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
					$room->work_id = $work->id;
					$room->save();
				}
				$data["results"][] = array(
			   		"transaction_id" 			=> $txn->id,
			   		"work_id" 					=> $work->id,
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
		$obj->where("status", 1);
		$obj->order_by("start_date", "asc");
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
				//Transaction
				$tran = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$tran->where("id", $value->transaction_id)->limit(1)->get();
				//Customer
				$con = new Spa_work_customer(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$con->where("book_id", $value->id)->get_iterated();
				$conar = [];
				$customer_name = "";
				if($con->exists()){
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
				$em = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$em->where("book_id", $value->id)->get_iterated();
				$employee_name = "";
				$emnar = [];
				if($em->exists()){
					foreach($em as $e){
						$ec = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$ec->where("id", $e->employee_id)->limit(1)->get();
						$emnar[] = array(
							"id" 	=> $ec->id,
							"name" 	=> $ec->name,
						);
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
							"transaction_id" => $i->transaction_id,
							"item_id" 		=> $i->item_id,
							"item" 			=> array("id" => $i->item_id, "name" => $i->name),
							"contact_id" 	=> $i->contact_id,
							"measurement_id" => $i->measurement_id,
							"tax_item_id" 	=> $i->tax_item_id,
							"assembly_id" 	=> $i->assembly_id,
							"description" 	=> $i->description,
							"quantity" 		=> $i->quantity,
							"avarage_cost" 	=> $i->avarage_cost, 			
							"quantity" 		=> intval($i->quantity),
							"measurement" 	=> array(
								"id" => $me->id, 
								"name" => $me->name,
								"measurement_id" => $me->id,
							),
							"tax_item" 		=> array(
								"id" => $i->tax_item_id
							),
							"price" 		=> floatval($i->price),
							"amount" 		=> floatval($i->amount),
							"discount" 		=> $i->discount,
							"tax" 			=> $i->tax,
							"rate" 			=> floatval($i->rate),
							"locale" 		=> $i->locale,
							"status" 		=> $obj->status,
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
		 			"employee_name" => $employee_name,
		 			"employee" 		=> $emnar,
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
					$i->description = isset($item->description) ? $item->description : $item->item->name;
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
	function updatebook_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_book(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->book_id)->limit(1)->get();
			$obj->end_date = $value->end_date;
			$obj->work_id = $value->work_id;
			$obj->status = 0;
			$obj->save();
			//Transaction
			$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$txn->where("id", $obj->transaction_id)->limit(1)->get();
			$txn->status = 1;
			$txn->save();
			$data["results"][] = array(
		   		"id" 			=> $obj->id
		   	);
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function cancel_book_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_book(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->book_id)->limit(1)->get();
			$obj->end_date = $value->end_date;
			$obj->cancel_reason_id = $value->reason_id;
			$obj->status = 0;
			$obj->save();
			//Transaction
			$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$txn->where("id", $obj->transaction_id)->limit(1)->get();
			$txn->status = 1;
			$txn->save();
			$data["results"][] = array(
		   		"id" 			=> $obj->id
		   	);
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
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
			$saleorder->where("type", "Sale_Order");
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
				//Journal 
				
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
			//Brach
			$brar = [];
			$userbranch = new Spa_user_branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$userbranch->where("user_id", $value->user_id)->limit(1)->get();
			if($userbranch->exists()){
				$branch = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$branch->where("id", $userbranch->branch_id)->limit(1)->get();
				$brar = array(
					"id" 	=> $branch->id,
					"name" 	=> $branch->name,
					"address" => $branch->address,
					"telephone" => $branch->telephone,
				);
			}
			$total = floatval($txn->sub_total) - floatval($txn->discount);
			$data["results"][] = array(
		   		"id" 			=> $txn->id,
		   		"number" 		=> $txn->number,
		   		"amount" 		=> floatval($txn->amount),
		   		"sub_total" 	=> floatval($txn->sub_total),
		   		"total" 		=> floatval($total),
		   		"discount" 		=> floatval($txn->discount),
		   		"tax" 			=> floatval($txn->tax),
		   		"rate" 			=> floatval($txn->rate),
		   		"locale" 		=> $txn->locale,
		   		"issued_date" 	=> $txn->issued_date,
		   		"items" 		=> $value->items,
		   		"contact" 		=> $conar,
		   		"branch" 		=> $brar,
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
	//Room
	function room_get(){
		$data["results"] = [];
		$data["count"] = 0;
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$obj = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		//Filter
		if(!empty($filter) && isset($filter)){
	    	foreach ($filter["filters"] as $value) {
	    		$obj->where($value["field"], $value["value"]);
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
				$items = [];
				$sri = new Spa_rooms_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$sri->where("room_id", $value->id)->get_iterated();
				if($sri->exists()){
					foreach($sri as $si){
						$items[] = array(
							"id" 	=> $si->item_id,
							"name" 	=> $si->item_name,
						);
					}
				}
				$data["results"][] = array(
					"id" 				=> $value->id,
					"name" 				=> $value->name,
					"description"		=> $value->description,
					"status"			=> $value->status,
					"square_meter" 		=> $value->square_meter,
					"branch_id" 		=> $value->branch_id,
					"items" 			=> $items,
					"number_bed" 		=> $value->number_bed,
				);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	function room_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->name) 		? $obj->name 			= $value->name : "";
			isset($value->branch_id) 	? $obj->branch_id 		= $value->branch_id : "";
			isset($value->description) 	? $obj->description 	= $value->description : "";
			isset($value->square_meter) ? $obj->square_meter 	= $value->square_meter : 0;
			isset($value->number_bed) 	? $obj->number_bed 		= $value->number_bed : 1;
			$obj->status = 1;
			$obj->work_id = 0;
	   		if($obj->save()){
	   			foreach($value->items as $i){
	   				$sri = new Spa_rooms_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$sri->room_id = $obj->id;
	   				$sri->item_id = $i->id;
	   				$sri->item_name = $i->name;
	   				$sri->save();
	   			}
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);	
	}
	function room_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->name) 		? $obj->name 			= $value->name : "";
			isset($value->branch_id) 	? $obj->branch_id 		= $value->branch_id : "";
			isset($value->description) 	? $obj->description 	= $value->description : "";
			isset($value->square_meter) ? $obj->square_meter 	= $value->square_meter : 0;
			isset($value->number_bed) 	? $obj->number_bed 		= $value->number_bed : 1;
			$obj->status = 1;
			$obj->work_id = 0;
	   		if($obj->save()){
	   			//Delete old items
	   			$oit = new Spa_rooms_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$oit->where("room_id", $obj->id)->get_iterated();
				if($oit->exists()){
					$oit->delete_all();
				}
	   			foreach($value->items as $i){
	   				$sri = new Spa_rooms_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$sri->room_id = $obj->id;
	   				$sri->item_id = $i->id;
	   				$sri->item_name = $i->name;
	   				$sri->save();
	   			}
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	function room_delete() {
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
	function roomname_get(){
		$data["results"] = [];
		$data["count"] = 0;
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$obj = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
					"name" 				=> $value->name
				);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	//Cash Reciept
	function search_invoice_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		$obj->where("status <>", 1);
		$obj->where("deleted <>", 1);
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
				//Sum amount paid
				$amount_paid = 0;
				//Check Pastsoldpaid
				if($value->status == 2){
					$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$paid->select_sum("amount");
					$paid->select_sum("discount");
					$paid->where_in("type", "Cash_Receipt");					
					$paid->where("reference_id", $value->id);
					$paid->where("deleted <>",1);
					$paid->get();
					$amount_paid = floatval($paid->amount) + floatval($paid->discount);
				}
				isset($value->payment_term_id) ? $value->payment_term_id = $value->payment_term_id : 5;
				$contact = $value->contact->get();
				$data["results"][] = array(
					"id" 						=> $value->id,
					"company_id" 				=> $value->company_id,
					"contact_id" 				=> intval($value->contact_id),
					"contact_name" 				=> $contact->name,
					"payment_term_id" 			=> $value->payment_term_id,
					"transaction_template_id" 	=> $value->transaction_template_id,
					"reference_id" 				=> intval($value->reference_id),
					"account_id" 				=> intval($value->account_id),
					"item_id" 					=> $value->item_id,
					"tax_item_id" 				=> $value->tax_item_id,
					"wht_account_id"			=> $value->wht_account_id,
					"user_id" 					=> $value->user_id,
				   	"number" 					=> $value->number,
				   	"type" 						=> $value->type,
				   	"journal_type" 				=> $value->journal_type,
				   	"sub_total"					=> floatval($value->sub_total),
				   	"discount" 					=> floatval($value->discount),
				   	"tax" 						=> floatval($value->tax),
				   	"amount" 					=> floatval($value->amount),
				   	"fine" 						=> floatval($value->fine),
				   	"deposit"					=> floatval($value->deposit),
				   	"remaining" 				=> floatval($value->remaining),
				   	"rate" 						=> floatval($value->rate),
				   	"locale" 					=> $value->locale,
				   	"month_of"					=> $value->month_of,
				   	"issued_date"				=> $value->issued_date,
				   	"bill_date"					=> $value->bill_date,
				   	"payment_date" 				=> $value->payment_date,
				   	"due_date" 					=> $value->due_date,
				   	"reference_no" 				=> $value->reference_no,
				   	"references" 				=> $value->references!="" ? array_map('intval', explode(",", $value->references)) : [],
				   	"memo" 						=> $value->memo,
				   	"memo2" 					=> $value->memo2,
				   	"status" 					=> intval($value->status),
				   	"is_journal" 				=> $value->is_journal,
				   	"print_count" 				=> $value->print_count,
				   	"amount_paid"				=> $amount_paid
				);
				//Check Relate Invoice
				$relateinv = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$relateinv->where("type", "Invoice");
				$relateinv->where("contact_id", $value->contact_id);
				$relateinv->where("id <>", $value->id);
				$relateinv->where("status <>", 1);
				$relateinv->where("deleted <>", 1);
				$relateinv->get_iterated();
				if($relateinv->exists()){
					foreach ($relateinv as $relate) {
						//Sum amount paid
						$amount_paid = 0;
						//Check Pastsoldpaid
						if($relate->status == 2){
							$paid = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$paid->select_sum("amount");
							$paid->select_sum("discount");
							$paid->where_in("type", "Cash_Receipt");					
							$paid->where("reference_id", $relate->id);
							$paid->where("deleted <>",1);
							$paid->get();
							$amount_paid = floatval($paid->amount) + floatval($paid->discount);
						}
						isset($relate->payment_term_id) ? $relate->payment_term_id = $relate->payment_term_id : 5;
						$contact = $relate->contact->get();
						$data["results"][] = array(
							"id" 						=> $relate->id,
							"company_id" 				=> $relate->company_id,
							"contact_id" 				=> intval($relate->contact_id),
							"contact_name" 				=> $contact->name,
							"payment_term_id" 			=> $relate->payment_term_id,
							"transaction_template_id" 	=> $relate->transaction_template_id,
							"reference_id" 				=> intval($relate->reference_id),
							"account_id" 				=> intval($relate->account_id),
							"item_id" 					=> $relate->item_id,
							"tax_item_id" 				=> $relate->tax_item_id,
							"wht_account_id"			=> $relate->wht_account_id,
							"user_id" 					=> $relate->user_id,
						   	"number" 					=> $relate->number,
						   	"type" 						=> $relate->type,
						   	"journal_type" 				=> $relate->journal_type,
						   	"sub_total"					=> floatval($relate->sub_total),
						   	"discount" 					=> floatval($relate->discount),
						   	"tax" 						=> floatval($relate->tax),
						   	"amount" 					=> floatval($relate->amount),
						   	"fine" 						=> floatval($relate->fine),
						   	"deposit"					=> floatval($relate->deposit),
						   	"remaining" 				=> floatval($relate->remaining),
						   	"rate" 						=> floatval($relate->rate),
						   	"locale" 					=> $relate->locale,
						   	"month_of"					=> $relate->month_of,
						   	"issued_date"				=> $relate->issued_date,
						   	"bill_date"					=> $relate->bill_date,
						   	"payment_date" 				=> $relate->payment_date,
						   	"due_date" 					=> $relate->due_date,
						   	"reference_no" 				=> $relate->reference_no,
						   	"references" 				=> $relate->references!="" ? array_map('intval', explode(",", $relate->references)) : [],
						   	"memo" 						=> $relate->memo,
						   	"memo2" 					=> $relate->memo2,
						   	"status" 					=> intval($relate->status),
						   	"is_journal" 				=> $relate->is_journal,
						   	"print_count" 				=> $relate->print_count,
						   	"amount_paid"				=> $amount_paid
						);
					}
				}
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	function cashreceipt_post() {
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		$number = "";
		foreach ($models as $value) {
			//Generate Number
			if(isset($value->number)){
				$number = $value->number;
				if($number==""){
					$number = $this->_generate_number($value->type, $value->issued_date);
				}
			}else{
				$number = $this->_generate_number($value->type, $value->issued_date);
			}
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->company_id) 				? $obj->company_id 					= $value->company_id : "";
			isset($value->location_id) 				? $obj->location_id 				= $value->location_id : 0;
			isset($value->pole_id) 					? $obj->pole_id 					= $value->pole_id : 0;
			isset($value->box_id) 					? $obj->box_id 						= $value->box_id : 0;
			isset($value->contact_id) 				? $obj->contact_id 					= $value->contact_id : "";
			isset($value->payment_term_id) 			? $obj->payment_term_id 			= $value->payment_term_id : 5;
			isset($value->payment_method_id) 		? $obj->payment_method_id 			= $value->payment_method_id : "";
			isset($value->transaction_template_id) 	? $obj->transaction_template_id 	= $value->transaction_template_id : "";
			isset($value->reference_id) 			? $obj->reference_id 				= $value->reference_id : "";
			isset($value->recurring_id) 			? $obj->recurring_id 				= $value->recurring_id : "";
			isset($value->return_id) 				? $obj->return_id 					= $value->return_id : "";
			isset($value->job_id) 					? $obj->job_id 						= $value->job_id : "";
			isset($value->account_id) 				? $obj->account_id 					= $value->account_id : "";
			isset($value->item_id) 					? $obj->item_id 					= $value->item_id : "";
			isset($value->tax_item_id) 				? $obj->tax_item_id 				= $value->tax_item_id : "";
			isset($value->wht_account_id) 			? $obj->wht_account_id 				= $value->wht_account_id : "";
			isset($value->user_id) 					? $obj->user_id 					= $value->user_id : "";
			isset($value->employee_id) 				? $obj->employee_id 				= $value->employee_id : "";
			$obj->number = $number;
		   	isset($value->type) 					? $obj->type 						= $value->type : "Cash_Receipt";
		   	isset($value->journal_type) 			? $obj->journal_type 				= $value->journal_type : "";
		   	isset($value->sub_total) ? 				$obj->sub_total 					= $value->sub_total : 0;
		   	isset($value->discount) 				? $obj->discount 					= floatval($value->discount) : 0;
		   	isset($value->tax) 						? $obj->tax 						= $value->tax : "";
		   	isset($value->amount) 					? $obj->amount 						= floatval($value->amount) : 0;
		   	isset($value->fine) 					? $obj->fine 						= $value->fine : "";
		   	isset($value->deposit) 					? $obj->deposit 					= $value->deposit : "";
		   	isset($value->remaining) 				? $obj->remaining 					= $value->remaining : "";
		   	isset($value->received) 				? $obj->received 					= $value->received : "";
		   	isset($value->change) 					? $obj->change 						= $value->change : "";
		   	isset($value->credit_allowed) 			? $obj->credit_allowed 				= $value->credit_allowed : "";
		   	isset($value->additional_cost) 			? $obj->additional_cost 			= $value->additional_cost : "";
		   	isset($value->additional_apply) 		? $obj->additional_apply 			= $value->additional_apply : "";
		   	isset($value->rate) 					? $obj->rate 						= $value->rate : "";
		   	isset($value->locale) 					? $obj->locale 						= $value->locale : "";
		   	isset($value->month_of) 				? $obj->month_of 					= $value->month_of : "";
		   	isset($value->issued_date) 				? $obj->issued_date 				= $value->issued_date : "";
		   	isset($value->bill_date) 				? $obj->bill_date 					= $value->bill_date : "";
		   	isset($value->payment_date) 			? $obj->payment_date 				= $value->payment_date : "";
		   	isset($value->due_date) 				? $obj->due_date 					= $value->due_date : "";
		   	isset($value->deposit_date) 			? $obj->deposit_date 				= $value->deposit_date : "";
		   	isset($value->reference_no) 			? $obj->reference_no 				= $value->reference_no : "";
		   	isset($value->bill_to) 					? $obj->bill_to 					= $value->bill_to : "";
		   	isset($value->ship_to) 					? $obj->ship_to 					= $value->ship_to : "";
		   	isset($value->memo) 					? $obj->memo 						= $value->memo : "";
		   	isset($value->memo2) 					? $obj->memo2 						= $value->memo2 : "";
		   	isset($value->status) 					? $obj->status 						= $value->status : 0;
		   	isset($value->is_recurring) 			? $obj->is_recurring 				= $value->is_recurring : "";
		   	isset($value->is_journal) 				? $obj->is_journal 					= $value->is_journal : "";
		   	isset($value->meter_id) 				? $obj->meter_id 					= $value->meter_id : 0;
		   	isset($value->amount_fine) 				? $obj->fine 						= $value->amount_fine : 0;
		   	$obj->sync = 1;
	   		if($obj->save()){
	   			$month_of = "";
				$m = isset($value->month_of) ? $value->month_of : "";
				$d = new DateTime($m);
			    $d->modify('first day of this month');
			    $month_of = $d->format('Y-m-d');
	   			//Journal DR
	   			$journal = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$journal->transaction_id = $obj->id;
	   			$journal->account_id = $obj->account_id;
	   			$journal->contact_id = $obj->contact_id;
	   			$journal->dr  		 = $obj->amount;
	   			$journal->description = "Spa Invoice";
	   			$journal->cr 		 = 0.00;
	   			$journal->rate 		 = $obj->rate;
	   			$journal->locale 	 = $obj->locale;
	   			$journal->save();
	   			if($obj->discount > 0){
	   				//Total Sale
					$totalsale->discount += floatval($obj->discount);
	   				$journalD = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			$journalD->transaction_id = $obj->id;
		   			$journalD->account_id 	= $obj->account_id;
		   			$journalD->contact_id 	= $obj->contact_id;
		   			$journalD->dr  		 	= $obj->discount;
		   			$journalD->description 	= "Utility Discount";
		   			$journalD->cr 		 	= 0.00;
		   			$journalD->rate 	 	= $obj->rate;
		   			$journalD->locale 	 	= $obj->locale;
		   			$journalD->save();
	   			}
	   			//Journal CR
	   			$journal2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$journal2->transaction_id = $obj->id;
	   			$journal2->account_id = 10;
	   			$journal2->contact_id = $obj->contact_id;
	   			$journal2->dr 		  = 0.00;
	   			$journal2->cr 		  = $obj->amount + $obj->discount;
	   			$journal2->description = "Spa Invoice";
	   			$journal2->rate 	  = $obj->rate;
	   			$journal2->locale 	  = $obj->locale;
	   			$journal2->save();
	   			$oldtran = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$oldtran->where("id", $value->reference_id)->limit(1)->get();
	   			$oldreciept = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$oldreciept->where("type", "Cash_Receipt");
	   			$oldreciept->where("reference_id", $oldtran->id);
	   			$oldreciept->get();
	   			$samount = 0;
	   			if($oldreciept->exists()){
	   				foreach ($oldreciept as $oreciept) {
	   					$samount += floatval($oreciept->amount);
	   				}
	   			}
	   			if($value->discount > 0) {
	   				$samount += floatval($value->discount);
	   			}
	   			if(floatval($oldtran->amount) == $samount){
	   				$oldtran->status = 1;
	   			}else{
	   				$oldtran->status = 2;
	   			}
	   			$oldtran->save();
	   			//Session Recieve
	   			if($value->session_id){
	   				$srecieve = new Cashier_session_receive(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$srecieve->cashier_session_id = $value->session_id;
	   				$srecieve->transaction_id = $value->reference_id;
	   				$srecieve->contact_id = $value->contact_id;
	   				$srecieve->amount = $value->amount;
	   				$srecieve->locale = $value->locale;
	   				$srecieve->rate = $value->rate;
	   				$srecieve->time = $value->issued_date;
	   				$srecieve->save();	
	   			}
			   	$data["results"][] = array(
			   		"id" => $obj->id
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);			
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