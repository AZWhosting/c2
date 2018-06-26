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
			if($rooms->status == 0){
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
		 			"status" 		=> "Maintenance",
		 			"maintenance_date" => $rooms->maintenance_date,
		 			"employee_id" 	=> "",
					"employee_ar" 	=> "",
		 		);
			}else{
				if($rooms->work_id > 0){
					$spaworkroom = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$spaworkroom->where("room_id", $rooms->id)->get_iterated();
					if($spaworkroom->exists()){
						foreach($spaworkroom as $spwr){
							$obj = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$obj->where("id", $spwr->work_id);
							$obj->where("status", 0);
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
									//Emplyee
									$emp = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
									$emp->where("work_id", $value->id)->get_iterated();
									$empar = [];
									$empid = 0;
									if($emp->exists()){
										$jk = 1;
										foreach($emp as $e){
											$ec = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
											$ec->where("id", $e->employee_id)->limit(1)->get();
											$empar[] = array(
												"id" 	=> $ec->id,
												"name" 	=> $ec->name,
											);
											if($jk == 1){
												$empid = $ec->id;
											}
											$jk++;
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
							 			"status" 		=> "Serving",
							 			"maintenance_date" => "",
							 			"employee_id" 	=> $empid,
							 			"employee_ar" 	=> $empar,
							 		);
							 	}
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
			 			"status" 		=> "Available",
			 			"maintenance_date" => "",
			 			"employee_id" 	=> "",
						"employee_ar" 	=> "",
			 		);
				}
			}
		}
		$data["count"] = count($data["results"]);
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
			$txn->user_id = $value->user_id;
			//Add Branch
			$branchuser = new Spa_user_branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$branchuser->where("user_id", $value->user_id)->limit(1)->get();
			$txn->branch_id = isset($branchuser->branch_id) ? $branchuser->branch_id : 1;
			$txn->day = 1;
			$txn->number = $number;
			//Add Segment
			$brancht = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$brancht->where("id", $txn->branch_id)->limit(1)->get();
			$segmentit = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$segmentit->where("id", $brancht->segment_item_id)->limit(1)->get();
			if($txn->save($segmentit)){
				//Work
				$work = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$work->transaction_id = $txn->id;
				$work->start_date = date('Y-m-d H:i:s', strtotime($value->start_date));
				$work->phone = isset($value->phone) ? $value->phone: "";
				$work->male = intval($value->male);
				$work->female = intval($value->female);
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
					echo $emcount = sizeof($item->therapist);

					if($emcount > 0){
						foreach($item->therapist as $the){
							if(isset($the->id)){
								$emtxn = new Spa_employee_transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						   		$emtxn->transaction_id = $txn->id;
						   		$emtxn->employee_id = $the->id;
						   		if($emcount > 1){
						   			$emtxn->status = 2;
						   		}else{
						   			$emtxn->status = 1;
						   		}
						   		$emtxn->amount = floatval($txn->amount) / intval($emcount);
						   		$emtxn->save();
						   	}
						}
					}
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
					$emudate = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$emudate->where("id", $e->id)->limit(1)->get();
					$emudate->work_id = $work->id;
					$emudate->save();
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
					$room->transaction_id = $txn->id;
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
			$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$txn->where("id", $value->transaction_id)->limit(1)->get();
			//Contact
			$txn->amount = $value->amount;
			$txn->tax = $value->tax;
			$txn->discount = $value->discount;
			$txn->sub_total = $value->sub_total;
			if($txn->save()){
				//Work
				$work = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$work->where("id", $value->work_id)->limit(1)->get();
				$work->transaction_id = $txn->id;
				$work->save();
				//Item
				foreach($value->items as $item){
					$it = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$it->where("id", $item->id)->limit(1)->get();
					if($it->exists()){
						$it->price = $item->price;
						$it->quantity = $item->quantity;
						$it->amount = $item->amount;
						$it->save();
					}else{
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
				}
				$data["results"][] = array(
			   		"id" 			=> $txn->id
			   	);
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function serving_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
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
				//Emplyee
				$emp = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$emp->where("work_id", $value->id)->get_iterated();
				$empar = [];
				$empid = 0;
				if($emp->exists()){
					$jk = 1;
					foreach($emp as $e){
						$ec = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$ec->where("id", $e->employee_id)->limit(1)->get();
						$empar[] = array(
							"id" 	=> $ec->id,
							"name" 	=> $ec->name,
						);
						if($jk == 1){
							$empid = $ec->id;
						}
						$jk++;
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
							// "id" 			=> $i->id,
							// "name" 			=> $i->description,
							// "quantity" 		=> intval($i->quantity),
							// "measurement" 	=> array("id" => $me->id, "name" => $me->name),
							// "price" 		=> floatval($i->price),
							// "amount" 		=> floatval($i->amount),
							// "rate" 			=> floatval($i->rate),
							// "locale" 		=> $i->locale,
							"id" 			=> $i->id,
							"transaction_id" => $i->transaction_id,
							"item_id" 		=> $i->item_id,
							"description" 	=> $i->description,
							"item_price" 		=> $i->item_price,
							"item" 			=> array("id" => $i->item_id, "name" => $i->description),
							"contact_id" 	=> $i->contact_id,
							"measurement_id" => $i->measurement_id,
							"tax_item_id" 	=> $i->tax_item_id,
							"assembly_id" 	=> $i->assembly_id,
							"description" 	=> $i->description,
							"quantity" 		=> $i->quantity,
							"avarage_cost" 	=> $i->avarage_cost, 			
							"quantity" 		=> intval($i->quantity),
							"measurement" 	=> array(
								"id" 				=> $me->id, 
								"measurement" 		=> $me->name,
								"name" 				=> $me->name,
								"measurement_id" 	=> $me->id,
							),
							"tax_item" 		=> array(
								"id" 				=> $i->tax_item_id
							),
							"price" 		=> floatval($i->price),
							"item_price" 	=> array(
								"measurement" 		=> $me->name,
								"measurement_id" 	=> $me->id,
							),
							"amount" 		=> floatval($i->amount),
							"discount" 		=> $i->discount,
							"tax" 			=> $i->tax,
							"rate" 			=> floatval($i->rate),
							"locale" 		=> $i->locale,
							"status" 		=> $obj->status,
							"therapist" 	=> [],
							"therapistname" => "",
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
		 			"status" 		=> "Serving",
		 			"maintenance_date" => "",
		 			"employee_id" 	=> $empid,
		 			"employee_ar" 	=> $empar,
		 		);
		 	}
		}
		//Response Data		
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
							"therapist" 	=> [],
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
		 			"male" 			=> $value->male,
		 			"female" 		=> $value->female,
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

			$duedate = strtotime('30 day', strtotime($value->start_date));
			$txn->due_date = date ('Y-m-d', $duedate);

			$txn->frequency = "Daily";
			$txn->month_option = "Day";
			$txn->intval = 1;
			$txn->user_id = $value->user_id;
			$branchuser = new Spa_user_branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$branchuser->where("user_id", $value->user_id)->limit(1)->get();
			$txn->branch_id = isset($branchuser->branch_id) ? $branchuser->branch_id : 1;
			$txn->day = 1;
			$txn->number = $number;
			//Add Segment
			$brancht = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$brancht->where("id", $txn->branch_id)->limit(1)->get();
			$segmentit = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$segmentit->where("id", $brancht->segment_item_id)->limit(1)->get();
			if($txn->save($segmentit)){
				//Work
				$work = new Spa_book(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$work->transaction_id = $txn->id;
				$work->start_date = date('Y-m-d H:i:s', strtotime($value->start_date));
				$work->phone = isset($value->phone) ? $value->phone: "";
				$work->status = 1;
				$work->male = intval($value->male);
				$work->female = intval($value->female);
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

			$duedate = strtotime('30 day', strtotime($value->issued_date));
			$txn->due_date = date ('Y-m-d', $duedate);

			$txn->contact_id = $saleorder->contact_id;
			$txn->payment_term_id = 5;
			$txn->payment_method_id = 1;
			$txn->user_id = $value->user_id;
			$branchuser = new Spa_user_branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$branchuser->where("user_id", $value->user_id)->limit(1)->get();
			$txn->branch_id = isset($branchuser->branch_id) ? $branchuser->branch_id : 1;
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
			$txn->employee_id = $value->employee_id;
			$txn->interval = 1;
			$txn->day = 1;
			$txn->status = 0;
			$txn->is_journal = 1;
			$txn->work_id = $value->work_id;
			//Add Segment
			$brancht = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$brancht->where("id", $txn->branch_id)->limit(1)->get();
			$segmentit = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$segmentit->where("id", $brancht->segment_item_id)->limit(1)->get();
			if($txn->save($segmentit)){
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
				$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$contact->where("id", $txn->contact_id)->limit(1)->get();
				//CR
				$j1 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$j1->transaction_id = $txn->id;
				$j1->account_id = $contact->ra_id;
				$j1->contact_id = $txn->contact_id;
				$j1->description = "Wellnez Invoice";
				$j1->dr = 0;
				$j1->cr = $txn->amount;
				$j1->rate = $txn->rate;
				$j1->locale = $txn->locale;
				$j1->save();
				//DR
				$j2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$j2->transaction_id = $txn->id;
				$j2->account_id = $contact->account_id;
				$j2->contact_id = $txn->contact_id;
				$j2->description = "Wellnez Invoice";
				$j2->dr = $txn->amount;
				$j2->cr = 0;
				$j2->rate = $txn->rate;
				$j2->locale = $txn->locale;
				$j2->save();
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
			//Room
			$room = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$room->where("work_id", $work->id)->get();
			$roomshow = "";
			foreach($room as $r){
				$rr = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$rr->where("id", $r->room_id)->get();
				$rr->status = 0;
				$rr->work_id = 0;
				$rr->maintenance_date = date('Y-m-d H:i:s', strtotime($value->issued_date));
				$rr->save();
				$roomshow .= $rr->name." ";
			}
			//Employee
			$employee = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$employee->where("work_id", $work->id)->get();
			$employee_name = "";
			foreach($employee as $em){
				$emc = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$emc->where("id", $em->employee_id)->get();
				$emc->work_id = 0;
				$emc->save();
				$employee_name .= $emc->abbr."-".$emc->number." ".$emc->name;
			}
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
			//Cashier
			$cashier_name = "";
			$u = new User(null, $this->server_host, $this->server_user, $this->server_pwd, 'banhji');
			$u->where("id", $value->user_id)->limit(1)->get();
			if($u->exists()){
				$cashier_name = $u->first_name." ".$u->last_name;
			}
			$total = floatval($txn->sub_total) - floatval($txn->discount);
			$data["results"][] = array(
		   		"id" 			=> $txn->id,
		   		"number" 		=> $txn->number,
		   		"contact" 		=> $conar,
		   		"amount" 		=> floatval($txn->amount),
		   		"sub_total" 	=> floatval($txn->sub_total),
		   		"discount" 		=> floatval($txn->discount),
		   		"tax" 			=> floatval($txn->tax),
		   		"rate" 			=> floatval($txn->rate),
		   		"locale" 		=> $txn->locale,
		   		"issued_date" 	=> $txn->issued_date,
		   		"items" 		=> $value->items,
		   		"cashier_name" 	=> $cashier_name,
		   		"room_number" 	=> $roomshow,
		   		"employee_name" => $employee_name,
		   	);
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function splitbill_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		$i = 1;
		foreach ($models as $value) {
			if(count($value->item_one) > 0){
				$data["results"][] = $this->splitinvoiceitem($value->item_one, $value->transaction_id, $value->userid);
			}
			if(count($value->item_two) > 0){
				$data["results"][] = $this->splitinvoiceitem($value->item_two, $value->transaction_id, $value->userid);
			}
			if(count($value->item_three) > 0){
				$data["results"][] = $this->splitinvoiceitem($value->item_three, $value->transaction_id, $value->userid);
			}
			if(count($value->item_four) > 0){
				$data["results"][] = $this->splitinvoiceitem($value->item_four, $value->transaction_id, $value->userid);
			}
			//Cashier
			$cashier_name = "";
			$u = new User(null, $this->server_host, $this->server_user, $this->server_pwd, 'banhji');
			$u->where("id", $value->userid)->limit(1)->get();
			if($u->exists()){
				$cashier_name = $u->first_name." ".$u->last_name;
			}
			$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$txn->where("id", $value->transaction_id)->limit(1)->get();
			$work = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$work->where("transaction_id", $txn->id)->limit(1)->get();
			$roomshow = "";
			$work_room = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$work_room->where("work_id", $work->id)->get();
			if($work_room->exists()){
				foreach($work_room as $wr){
					$sroom = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$sroom->where("id", $wr->room_id)->limit(1)->get();
					$roomshow .= $sroom->name." ";
				}
			}
			//Employee
			$employee = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$employee->where("work_id", $work->id)->get();
			$employee_name = "";
			foreach($employee as $em){
				$emc = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$emc->where("id", $em->employee_id)->get();
				$emc->work_id = 0;
				$emc->save();
				$employee_name .= $emc->abbr."-".$emc->number." ".$emc->name;
			}
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
		   		"contact" 		=> $conar,
		   		"amount" 		=> floatval($txn->amount),
		   		"sub_total" 	=> floatval($txn->sub_total),
		   		"discount" 		=> floatval($txn->discount),
		   		"tax" 			=> floatval($txn->tax),
		   		"rate" 			=> floatval($txn->rate),
		   		"locale" 		=> $txn->locale,
		   		"issued_date" 	=> $txn->issued_date,
		   		"items" 		=> $value->item,
		   		"cashier_name" 	=> $cashier_name,
		   		"room_number" 	=> $roomshow,
		   		"employee_name" => $employee_name,
		   	);
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	public function splitinvoiceitem($item, $txnid, $userid){
		$data["results"] = [];
		$amount = 0;
		foreach($item as $i1){
			$amount += floatval($i1->amount);
		}
		$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$value = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$value->where("id", $txnid)->limit(1)->get();
		$number = $this->_generate_number("Invoice", $value->issued_date);
		$txn->amount = $amount;
		$txn->number = $number;
		$txn->issued_date = $value->issued_date;

		$duedate = strtotime('30 day', strtotime($value->issued_date));
		$txn->due_date = date ('Y-m-d', $duedate);

		$txn->contact_id = $value->contact_id;
		$txn->payment_term_id = 5;
		$txn->payment_method_id = 1;
		$txn->user_id = $value->user_id;
		$branchuser = new Spa_user_branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$branchuser->where("user_id", $value->user_id)->limit(1)->get();
		$txn->branch_id = isset($branchuser->branch_id) ? $branchuser->branch_id : 1;
		$txn->type = 'Invoice';
		$txn->sub_total = $amount;
		$txn->discount = $value->discount;
		$txn->tax = $value->tax;
		$txn->fine = $value->fine;
		$txn->rate = $value->rate;
		$txn->locale = $value->locale;
		$txn->start_date = $value->issued_date;
		$txn->frequency = 'Daily';
		$txn->month_option = 'Day';
		$txn->employee_id = $value->employee_id;
		$txn->interval = 1;
		$txn->day = 1;
		$txn->status = 0;
		$txn->is_journal = 1;
		//update old transaction amount
		$oldamount = floatval($value->amount - $amount);
		$value->amount = $oldamount;
		$value->sub_total = $oldamount;
		$value->save();
		$ojcr = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$ojcr->where("transaction_id", $value->id);
		$ojcr->where("dr", 0);
		$ojcr->cr = $oldamount;
		$ojcr->save();
		$ojdr = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$ojdr->where("transaction_id", $value->id);
		$ojdr->where("cr", 0);
		$ojdr->dr = $oldamount;
		$ojdr->save();
		//Add Segment
		$brancht = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$brancht->where("id", $txn->branch_id)->limit(1)->get();
		$segmentit = new Segmentitem(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$segmentit->where("id", $brancht->segment_item_id)->limit(1)->get();
		if($txn->save($segmentit)){
			//update work
			$work = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$work->where("transaction_id", $value->id)->limit(1)->get();
			$w = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$w->transaction_id = $txn->id;
			$w->start_date = $work->start_date;
			$w->end_date = $work->end_date;
			$w->phone = $work->phone;
			$w->status = $work->status;
			$roomshow = "";
			if($w->save()){
				$txn->work_id = $w->id;
				$txn->save();
				$work_room = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$work_room->where("work_id", $work->id)->get();
				if($work_room->exists()){
					foreach($work_room as $wr){
						$newroom = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$newroom->room_id = $wr->room_id;
						$newroom->work_id = $w->id;
						$newroom->save();
						$sroom = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$sroom->where("id", $wr->room_id)->limit(1)->get();
						$roomshow .= $sroom->name." ";
					}
				}
			}
			foreach($item as $i){
				$oit = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$oit->where("id", $i->id)->limit(1)->get();
				$oit->transaction_id = $txn->id;
				$oit->save();
			}
			//journal
			//CR
			$j1 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$j1->transaction_id = $txn->id;
			$j1->account_id = $ojcr->account_id;
			$j1->contact_id = $txn->contact_id;
			$j1->description = "Wellnez Invoice";
			$j1->dr = 0;
			$j1->cr = $txn->amount;
			$j1->rate = $txn->rate;
			$j1->locale = $txn->locale;
			$j1->save();
			//DR
			$j2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$j2->transaction_id = $txn->id;
			$j2->account_id = $ojdr->account_id;
			$j2->contact_id = $txn->contact_id;
			$j2->description = "Wellnez Invoice";
			$j2->dr = $txn->amount;
			$j2->cr = 0;
			$j2->rate = $txn->rate;
			$j2->locale = $txn->locale;
			$j2->save();
			//Cashier
			$cashier_name = "";
			$u = new User(null, $this->server_host, $this->server_user, $this->server_pwd, 'banhji');
			$u->where("id", $userid)->limit(1)->get();
			if($u->exists()){
				$cashier_name = $u->first_name." ".$u->last_name;
			}
			//Employee
			$employee = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$employee->where("work_id", $work->id)->get();
			$employee_name = "";
			foreach($employee as $em){
				$emc = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$emc->where("id", $em->employee_id)->get();
				$emc->work_id = 0;
				$emc->save();
				$employee_name .= $emc->abbr."-".$emc->number." ".$emc->name;
			}
			$data["results"] = array(
		   		"id" 			=> $txn->id,
		   		"number" 		=> $txn->number,
		   		"amount" 		=> floatval($txn->amount),
		   		"sub_total" 	=> floatval($txn->sub_total),
		   		"discount" 		=> floatval($txn->discount),
		   		"tax" 			=> floatval($txn->tax),
		   		"rate" 			=> floatval($txn->rate),
		   		"locale" 		=> $txn->locale,
		   		"issued_date" 	=> $txn->issued_date,
		   		"items" 		=> $item,
		   		"cashier_name" 	=> $cashier_name,
		   		"room_number" 	=> $roomshow,
		   		"employee_name" => $employee_name,
		   	);
		   	return $data["results"];
		}
	}
	function printbill_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
				//contact
				$con = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$con->where("id", $value->contact_id)->limit(1)->get();
				$conar = array(
					"id" 	=> $con->id,
					"name" 	=> $con->name,
					"address" 	=> $con->address,
					"phone" 	=> $con->phone,
					"number" 	=> $con->number,
					"abbr" 		=> $con->abbr,
				);
				//Cashier
				$cashier_name = "";
				$u = new User(null, $this->server_host, $this->server_user, $this->server_pwd, 'banhji');
				$u->where("id", $value->user_id)->limit(1)->get();
				if($u->exists()){
					$cashier_name = $u->first_name." ".$u->last_name;
				}
				//Work
				$work = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$work->where("transaction_id", $value->id)->limit(1)->get();
				//Room
				$room = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$room->where("work_id", $work->id)->get();
				$roomshow = "";
				foreach($room as $r){
					$rr = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$rr->where("id", $r->room_id)->get();
					$rr->status = 0;
					$rr->work_id = 0;
					$rr->maintenance_date = date('Y-m-d H:i:s', strtotime($value->issued_date));
					$rr->save();
					$roomshow .= $rr->name." ";
				}
				//Employee
				$employee = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$employee->where("work_id", $work->id)->get();
				$employee_name = "";
				foreach($employee as $em){
					$emc = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$emc->where("id", $em->employee_id)->get();
					$emc->work_id = 0;
					$emc->save();
					$employee_name .= $emc->abbr."-".$emc->number." ".$emc->name;
				}
				//Item
				$items = [];
				$item = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$item->where("transaction_id", $value->id)->get();
				if($item->exists()){
					foreach($item as $it){
						$me = new Measurement(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$me->where("id", $it->measurement_id)->limit(1)->get();
						$items[] = array(
							"item" 			=> array(
								"name" 			=> $it->description,
							),
							"measurement" 	=> array(
								"measurement" => $me->name
							),
							"price" 		=> floatval($it->price),
							"locale" 		=> $it->locale,
							"quantity" 		=> intval($it->quantity),
							"amount" 		=> floatval($it->amount),
						); 
					}
				}
				$data["results"][] = array(
			   		"id" 			=> $value->id,
			   		"number" 		=> $value->number,
			   		"contact" 		=> $conar,
			   		"amount" 		=> floatval($value->amount),
			   		"sub_total" 	=> floatval($value->sub_total),
			   		"discount" 		=> floatval($value->discount),
			   		"tax" 			=> floatval($value->tax),
			   		"rate" 			=> floatval($value->rate),
			   		"locale" 		=> $value->locale,
			   		"issued_date" 	=> $value->issued_date,
			   		"items" 		=> $items,
			   		"cashier_name" 	=> $cashier_name,
			   		"room_number" 	=> $roomshow,
			   		"employee_name" => $employee_name,
			   	);
		 	}
		}
		//Response Data		
		$this->response($data, 200);
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
					"name" 				=> $value->name
				);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	function roomavailable_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->room_id)->get();
			$obj->status = 1;
			$obj->maintenance_date = "";
			$obj->transaction_id = "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
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
				   	"print_count" 				=> $value->print_count
				);
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
	function allinvoice_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_recurring = 0;
		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
		$obj->where("status", 0);
		$obj->where("deleted <>", 1);
		$obj->where_in("type", "Invoice");
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
				$work = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$work->where("transaction_id", $value->id)->limit(1)->get();
				if($work->exists()){
					$roomname = "";
					$wroom = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$wroom->where("work_id", $work->id)->get();
					if($wroom->exists()){
						foreach($wroom as $ro){
							$room = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
							$room->where("id", $ro->room_id)->get();
							if($room->exists()){
								foreach($room as $r){
									$roomname .= $r->name.", ";
								}
							}
						}
					}
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
					   	"room" 						=> $roomname,
					   	"status" 					=> 'Serving',
					   	"work_id" 					=> $work->id,
					);
				}
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	function paybill_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		$number = "";
		foreach ($models as $value) {
			//Generate Number
			$number = $this->_generate_number($value->type, $value->issued_date);
			//Old txn
			$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$txn->where("id", $value->transaction_id)->limit(1)->get();
			//Work
			$work = new Spa_work(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$work->where("transaction_id", $txn->id)->limit(1)->get();
			//obj
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			
			$obj->contact_id = $txn->contact_id;
			isset($value->payment_term_id) 			? $obj->payment_term_id 			= $value->payment_term_id : 5;
			$obj->payment_method_id = 1;

			$obj->reference_id = $txn->id;

			isset($value->account_id) 				? $obj->account_id 					= $value->account_id : "";

			isset($value->user_id) 					? $obj->user_id 					= $value->user_id : "";

			$obj->employee_id = $txn->employee_id;
			$obj->number = $number;
		   	$obj->type = "Cash_Receipt";
		   	$obj->transaction_template_id = 8;
		   	isset($value->sub_total) ? 				$obj->sub_total 					= $value->sub_total : 0;

		   	isset($value->discount) 				? $obj->discount 					= floatval($value->discount) : 0;
		   	isset($value->tax) 						? $obj->tax 						= $value->tax : "";

		   	isset($value->amount) 					? $obj->amount 						= floatval($value->amount) : 0;
			$obj->rate = $txn->rate;
		   	$obj->locale = $txn->locale;
		   	$obj->month_of = $value->issued_date;
		   	isset($value->issued_date) 				? $obj->issued_date 				= $value->issued_date : "";
		   	$obj->reference_no = $txn->number;

		   	isset($value->status) 					? $obj->status 						= $value->status : 0;
		   	$obj->is_journal = 1;
		   	$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   	$contact->where("id", $obj->contact_id)->limit(1)->get();
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
	   			$journal->description = "Wellnez Cash Reciept";
	   			$journal->cr 		 = 0.00;
	   			$journal->rate 		 = $obj->rate;
	   			$journal->locale 	 = $obj->locale;
	   			$journal->save();
	   			if($obj->discount > 0){
	   				//Total Sale
	   				$journalD = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			$journalD->transaction_id = $obj->id;
		   			$journalD->account_id 	= $obj->account_id;
		   			$journalD->contact_id 	= $obj->contact_id;
		   			$journalD->dr  		 	= $obj->discount;
		   			$journalD->description 	= "Wellnez Discount";
		   			$journalD->cr 		 	= 0.00;
		   			$journalD->rate 	 	= $obj->rate;
		   			$journalD->locale 	 	= $obj->locale;
		   			$journalD->save();
	   			}
	   			//Journal CR
	   			$journal2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$journal2->transaction_id = $obj->id;
	   			$journal2->account_id = $contact->account_id;
	   			$journal2->contact_id = $obj->contact_id;
	   			$journal2->dr 		  = 0.00;
	   			$journal2->cr 		  = $obj->amount + $obj->discount;
	   			$journal2->description = "Wellnez Cash Reciept";
	   			$journal2->rate 	  = $obj->rate;
	   			$journal2->locale 	  = $obj->locale;
	   			$journal2->save();
	   			
	   			//Save old txn
	   			$txn->status = 1;
	   			$txn->save();
	   			//Employee
	   			$checkemtxn = new Spa_employee_transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$checkemtxn->where("transaction_id", $txn->id)->get();
	   			if($checkemtxn->exists()){
	   				$checkemtxn->update_all('transaction_id', $obj->id);
	   			}else{
		   			$ew = new Spa_work_employee(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   			$ew->where("work_id", $work->id)->get();
		   			$emcount = count($ew);
		   			foreach($ew as $e){
				   		$emtxn = new Spa_employee_transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				   		$emtxn->transaction_id = $obj->id;
				   		$emtxn->employee_id = $e->employee_id;
				   		if($emcount > 1){
				   			$emtxn->status = 2;
				   		}else{
				   			$emtxn->status = 1;
				   		}
				   		$emtxn->amount = floatval($txn->amount) / intval($emcount);
				   		$emtxn->save();
		   			}
		   		}
	   			//Session
	   			$session = new Cashier_session(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$session->where("cashier_id", $value->user_id);
	   			$session->where("active", 1)->limit(1)->order_by("id", "desc")->get();
	   			$sessionrecieve = new Cashier_session_receive(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$sessionrecieve->cashier_session_id = $session->id;
   				$sessionrecieve->transaction_id = $obj->reference_id;
   				$sessionrecieve->contact_id = $obj->contact_id;
   				$sessionrecieve->amount = $obj->amount;
   				$sessionrecieve->locale = $obj->locale;
   				$sessionrecieve->rate = $obj->rate;
   				$sessionrecieve->time = $value->issued_date;
   				$sessionrecieve->save();
   				//Reciept Note
	   			if(count($value->receipt_note) > 0){
	   				foreach($value->receipt_note as $vr){
	   					if($vr->amount > 0){
		   					$reciepnot = new Cashier_currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   					$reciepnot->cashier_session_id = $session->id;
		   					$reciepnot->type =0;
		   					$reciepnot->currency = $vr->currency;
		   					$reciepnot->locale = $vr->locale;
		   					$reciepnot->rate = $vr->rate;
		   					$reciepnot->amount = $vr->amount;
		   					$reciepnot->save();
		   				}
	   				}
	   			}
	   			//Change Note
	   			if(count($value->change_note) > 0){
	   				foreach($value->change_note as $vc){
	   					if($vc->amount > 0){
		   					$reciepnot1 = new Cashier_currency(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		   					$reciepnot1->cashier_session_id = $session->id;
		   					$reciepnot1->type = 1;
		   					$reciepnot1->currency = $vc->currency;
		   					$reciepnot1->locale = $vc->locale;
		   					$reciepnot1->rate = $vc->rate;
		   					$reciepnot1->amount = $vc->amount;
		   					$reciepnot1->save();
		   				}
	   				}
	   			}
			   	$data["results"][] = array(
			   		"id" => $obj->id
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//Room Service
	function roomservice_get(){
		$data["results"] = [];
		$data["count"] = 0;
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$obj = new Spa_rooms_item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
			$it = [];
			foreach ($obj as $value) {
					$it[] = intval($value->item_id);
			}
			$data["results"][] = array(
				"item" 				=> $it,
			);
		}
		//Response Data
		$this->response($data, 200);
	}
	//Loyalty
	function loyalty_get(){
		$data["results"] = [];
		$data["count"] = 0;
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$obj = new Spa_loyalty(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
				$branches = [];
				$lb = new Spa_loyalty_branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$lb->where("loyalty_id", $value->id)->get_iterated();
				if($lb->exists()){
					foreach($lb as $bl){
						$br = new Branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$br->where("id", $bl->branch_id)->limit(1)->get();
						$branches[] = array(
							"id" 	=> $br->id,
							"name"  => $br->name,
						);
					}
				}
				$data["results"][] = array(
					"id" 				=> $value->id,
					"name"				=> $value->name,
					"base"				=> intval($value->base),
					"base_type"			=> intval($value->base_type),
					"amount_per_point"	=> floatval($value->amount_per_point),
					"amount_type"		=> intval($value->amount_type),
					"point_per_reward"	=> intval($value->point_per_reward),
					"reward_amount"		=> floatval($value->reward_amount),
					"reward_type"		=> intval($value->reward_type),
					"expire"			=> $value->expire,
					"branches"			=> $branches,
					"status"			=> intval($value->status),
				);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	function loyalty_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_loyalty(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			isset($value->name) 				? $obj->name 				= $value->name : "";
			isset($value->base) 				? $obj->base 				= $value->base : 1;
			isset($value->base_type) 			? $obj->base_type 			= $value->base_type : 1;
			isset($value->amount_per_point) 	? $obj->amount_per_point 	= $value->amount_per_point : 1;
			isset($value->amount_type) 			? $obj->amount_type 		= $value->amount_type : 1;
			isset($value->point_per_reward) 	? $obj->point_per_reward 	= $value->point_per_reward : 1;
			isset($value->reward_amount) 		? $obj->reward_amount 		= $value->reward_amount : 1;
			isset($value->reward_type) 			? $obj->reward_type 		= $value->reward_type : 1;
			isset($value->expire) 				? $obj->expire 				= $value->expire : "";
			$obj->status = 1;
	   		if($obj->save()){
	   			foreach ($value->branches as $b) {
	   				$loyaltybranch = new Spa_loyalty_branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
   					$loyaltybranch->loyalty_id = $obj->id;
   					$loyaltybranch->branch_id = $b->id;
   					$loyaltybranch->save();
	   			}
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);	
	}
	function loyalty_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_loyalty(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->name) 				? $obj->name 				= $value->name : "";
			isset($value->base) 				? $obj->base 				= $value->base : 1;
			isset($value->base_type) 			? $obj->base_type 			= $value->base_type : 1;
			isset($value->amount_per_point) 	? $obj->amount_per_point 	= $value->amount_per_point : 1;
			isset($value->amount_type) 			? $obj->amount_type 		= $value->amount_type : 1;
			isset($value->point_per_reward) 	? $obj->point_per_reward 	= $value->point_per_reward : 1;
			isset($value->reward_amount) 		? $obj->reward_amount 		= $value->reward_amount : 1;
			isset($value->reward_type) 			? $obj->reward_type 		= $value->reward_type : 1;
			isset($value->expire) 				? $obj->expire 				= $value->expire : "";
			$obj->status = 1;
	   		if($obj->save()){
	   			$oit = new Spa_loyalty_branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$oit->where("loyalty_id", $obj->id)->get_iterated();
				if($oit->exists()){
					$oit->delete_all();
				}
	   			foreach ($value->branches as $b) {
	   				$loyaltybranch = new Spa_loyalty_branch(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
   					$loyaltybranch->loyalty_id = $obj->id;
   					$loyaltybranch->branch_id = $b->id;
   					$loyaltybranch->save();
	   			}
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	function loyalty_delete(){
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Spa_loyalty(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}
	}
	function addpoint_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_reward(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			isset($value->amount) 				? $obj->amount 				= $value->amount : "";
			isset($value->loyalty_id) 			? $obj->loyalty_id 			= $value->loyalty_id : 1;
			isset($value->transaction_id) 		? $obj->transaction_id 		= $value->transaction_id : 1;
			isset($value->transaction_amount) 	? $obj->transaction_amount 	= $value->transaction_amount : 1;
			isset($value->type) 				? $obj->type 				= $value->type : 1;
	   		if($obj->save()){
	   			$addpoint = new Spa_card_reward(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$addpoint->where("loyalty_id", $value->loyalty_id)->limit(1)->get();
   				$addpoint = floatval($addpoint->amount) + floatval($value->amount);
   				$addpoint->save();
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id
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
	//Card
	function card_get(){
		$data["results"] = [];
		$data["count"] = 0;
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$obj = new Spa_card(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		//Filter
		if(!empty($filter['filters']) && isset($filter['filters'])){
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					if($value['operator']=="startswith"){
	    				$obj->like($value['field'], $value['value'], 'after');
	    			}else if($value['operator']=="contains"){
	    				$obj->like($value['field'], $value['value'], 'both');
	    			}else if($value['operator']=="by_user_id"){
	    				$employeeUsers = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	    				$employeeUsers->where("user_id", $value['value']);
	    				$employeeUsers->get();

	    				if($employeeUsers->exists()){
	    					$obj->where_related_contact_assignee($value['field'], $employeeUsers->id);
	    				}
	    			}else{
						$obj->{$value['operator']}($value['field'], $value['value']);
	    			}
				} else {
					if($value["field"]=="is_pattern"){
	    				$is_pattern = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}
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
				$statusdetail = "";
				$contact = "";
				if($value->status == 1){
					$statusdetail = "Activated";
					if($value->contact_id > 0){
						$con = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
						$con->where("id", $value->contact_id)->limit(1)->get();
						$contact = $con->name;
					}
				}else{
					$statusdetail = "Not Activated";
				}
				$data["results"][] = array(
					"id" 				=> $value->id,
					"name" 				=> $value->name,
					"number"			=> $value->number,
					"serial"			=> $value->serial,
					"status" 			=> $statusdetail,
					"contact_id" 		=> $value->contact_id,
					"contact_name" 		=> $contact,
					"registered_date"	=> $value->registered_date,
				);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	function card_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_card(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->name) 		? $obj->name 			= $value->name : "";
			isset($value->number) 		? $obj->number 			= $value->number : "";
			isset($value->serial) 		? $obj->serial 			= $value->serial : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"name" 			=> $obj->name,
					"number"		=> $obj->card,
					"serial"		=> $obj->serial,
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);	
	}
	function card_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_card(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);
			isset($value->name) 		? $obj->name 			= $value->name : "";
			isset($value->number) 		? $obj->number 			= $value->number : "";
			isset($value->serial) 		? $obj->serial 			= $value->serial : "";
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   		"name" 			=> $obj->name,
					"number"		=> $obj->card,
					"serial"		=> $obj->serial,
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	function card_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Spa_card(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);
		}
	}
	function activate_card_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$contact = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$contact->name = isset($value->name) ? $value->name : "";
			$contact->country_id = 36;
			$contact->memo = isset($value->nationality) ? $value->nationality : "";
			$contact->contact_type_id = 4;
			$contact->abbr = "CP";
			$contact->gender = isset($value->gender) ? $value->gender : "M";
			$contact->dob = isset($value->dob) ? $value->dob : "";
			$contact->locale = isset($value->locale) ? $value->locale : "km-KH";
			$contact->dob = isset($value->dob) ? $value->dob : "";
			$contact->phone = isset($value->phone) ? $value->phone : "";
			$contact->payment_term_id = 4;
			$contact->payment_method_id = 1;
			$contact->deposit_account_id = 55;
			$contact->trade_discount_id = 72;
			$contact->settlement_discount_id = 99;
			$contact->account_id = 10;
			$contact->ra_id = 71;
			$contact->or_account_id = 110;
			$contact->tax_item_id = 10;
			$contact->registered_date = isset($value->registered_date) ? $value->registered_date : "";
			$contact->status = 1;
			$contact->type = 1;
			if($contact->save()){
				$card = new Spa_card(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$card->where("id", $value->card_id)->limit(1)->get();
				$card->contact_id = $contact->id;
				$card->status = 1;
				$card->registered_date = isset($value->registered_date) ? $value->registered_date : "";
				$card->activated_by = isset($value->activated_by) ? $value->activated_by : "";
		   		if($card->save()){
				   	$data["results"][] = array(
				   		"id" 				=> $contact->id,
				   	);
			    }
			}			
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);	
	}
	function card_loyalty_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Spa_card_loyalty(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			isset($value->card_id) 			? $obj->card_id 			= $value->card_id : 0;
			isset($value->loyalty_id) 		? $obj->loyalty_id 		= $value->loyalty_id : 0;
			$obj->status = 1;
	   		if($obj->save()){
	   			$loyalty = new Spa_loyalty(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   			$loyalty->where("id", $obj->loyalty_id)->limit(1)->get();
	   			//Add Reward
	   			if($loyalty->base == 2){
	   				$reward = new Spa_card_reward(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
	   				$reward->loyalty_id = $obj->loyalty_id;
	   				$reward->card_id = $obj->id;
	   				$reward->amount = 0;
	   				$reward->type = 2;
	   				$reward->save();
	   			}
			   	$data["results"][] = array(
			   		"id" 					=> $obj->id,
			   		"card_id" 				=> $obj->card_id,
					"loyalty_id"			=> $obj->loyalty_id,
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function card_loyalty_get(){
		$data["results"] = [];
		$data["count"] = 0;
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$obj = new Spa_card_loyalty(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
				$loyalty = new Spa_loyalty(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$loyalty->where("status", 1);
				$loyalty->where("id", $value->loyalty_id)->limit(1)->get();
				$base = "Promotion";
				if($loyalty->base != 1){
					$base = "Point";
				}
				$status = "Active";
				if($loyalty->status == 0){
					$status = "Inactive";
				}
				$rewardtype = "%";
				$rewardamount = floatval($loyalty->reward_amount);
				if($loyalty->reward_type != 1){
					$rewardtype = "$";
				}
				$reward_amount = 0;
				$reward = new Spa_card_reward(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$reward->where("loyalty_id", $loyalty->id)->limit(1)->get();
				if($reward->exists()){
					$reward_amount = $reward->amount;
				}
				$dcompare = date('Y-m-d');
				if($dcompare > $loyalty->expire){
					$status = "Expire";
				}
				$data["results"][] = array(
			   		"id" 			=> $loyalty->id,
			   		"name" 			=> $loyalty->name,
					"base"			=> $base,
					"base_type" 	=> $loyalty->base_type,
					"reward_amount"	=> intval($loyalty->reward_amount),
					"reward_type" 	=> intval($loyalty->reward_type),
					"reward"	 	=> $reward_amount.$rewardtype,
					"expire" 		=> $loyalty->expire,
					"status" 		=> $status,
					"amount_per_point" => floatval($loyalty->amount_per_point),
					"amount_type" 	=> intval($loyalty->amount_type),
					"point_per_reward" 	=> floatval($loyalty->point_per_reward),
			   	);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	//Therapist
	function employee_get(){
		$data["results"] = [];
		$data["count"] = 0;
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
			foreach ($obj as $employees) {
				$data["results"][] = array(
					'id' 			=> $employees->id,
					'name' 			=> $employees->name,
					'branch_id'  	=> $employees->branch_id,
					'abbr' 			=> $employees->abbr,
					'status' 		=> $employees->status,
					'role' 			=> $employees->role,
					'number' 		=> $employees->number,
					'ship_to' 		=> $employees->ship_to,
					'bill_to' 		=> $employees->bill_to,
					'memo' 			=> $employees->memo,
					'is_fulltime' 	=> $employees->is_fulltime == 0 ? FALSE : TRUE,
					'registered_date' => $employees->registered_date,
					'address' 		=> $employees->address,
					'phone' 		=> $employees->phone,
					'email' 		=> $employees->email,
					'userid' 		=> $employees->user_id,
					'type' 			=> $employees->type,
					'currency' 	 	=> $employees->locale,
				);
			}
		}
		//Response Data
		$this->response($data, 200);
	}
	function employee_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$employees = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$employees->name 		= $value->name;
			$employees->branch_id 	= $value->branch_id;
			$employees->gender 		= $value->gender;
			$employees->abbr 		= $value->abbr;
			$employees->contact_type_id = $value->role;
			$employees->number  	= $value->number;
			$employees->email  		= $value->email;
			$employees->ship_to  	= $value->ship_to;
			$employees->bill_to  	= $value->bill_to;
			$employees->registered_date = $value->registered_date;
			$employees->phone  		= $value->phone;
			$employees->memo  		= $value->memo;
			$employees->is_fulltime = $value->is_fulltime == true ? 1:0;
			$employees->account_id 	= $value->account->id;
			$employees->salary_account_id = $value->salary->id;
			$employees->address  	= $value->address;
			$employees->status  	= $value->status;
			$employees->type  		= $value->type;
			$employees->user_id 	= $value->userid;
			$employees->locale 		= $value->currency;
			if($employees->save()) {
				$data["results"][] = array(
					'id' 			=> $employees->id,
					'name' 			=> $employees->name,
					'branch_id'  	=> $employees->branch_id,
					'abbr' 			=> $employees->abbr,
					'status' 		=> $employees->status,
					'role' 			=> $employees->role,
					'number' 		=> $employees->number,
					'ship_to' 		=> $employees->ship_to,
					'bill_to' 		=> $employees->bill_to,
					'memo' 			=> $employees->memo,
					'is_fulltime' 	=> $employees->is_fulltime == 0 ? FALSE : TRUE,
					'registered_date' => $employees->registered_date,
					'address' 		=> $employees->address,
					'phone' 		=> $employees->phone,
					'email' 		=> $employees->email,
					'userid' 		=> $employees->user_id,
					'type' 			=> $employees->type,
				);
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function employee_put(){
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$employees = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$employees->get_by_id($value->id);
			$employees->name 		= $value->name;
			$employees->branch_id 	= $value->branch_id;
			$employees->gender 		= $value->gender;
			$employees->abbr 		= $value->abbr;
			$employees->contact_type_id = $value->role;
			$employees->number  	= $value->number;
			$employees->email  		= $value->email;
			$employees->ship_to  	= $value->ship_to;
			$employees->bill_to  	= $value->bill_to;
			$employees->registered_date = $value->registered_date;
			$employees->phone  		= $value->phone;
			$employees->memo  		= $value->memo;
			$employees->is_fulltime = $value->is_fulltime == true ? 1:0;
			$employees->account_id 	= $value->account->id;
			$employees->salary_account_id = $value->salary->id;
			$employees->address  	= $value->address;
			$employees->status  	= $value->status;
			$employees->type  		= $value->type;
			$employees->user_id 	= $value->userid;
			$employees->locale 		= $value->currency;
			if($employees->save()) {
				$data["results"][] = array(
					'id' 			=> $employees->id,
					'name' 			=> $employees->name,
					'branch_id'  	=> $employees->branch_id,
					'abbr' 			=> $employees->abbr,
					'status' 		=> $employees->status,
					'role' 			=> $employees->role,
					'number' 		=> $employees->number,
					'ship_to' 		=> $employees->ship_to,
					'bill_to' 		=> $employees->bill_to,
					'memo' 			=> $employees->memo,
					'is_fulltime' 	=> $employees->is_fulltime == 0 ? FALSE : TRUE,
					'registered_date' => $employees->registered_date,
					'address' 		=> $employees->address,
					'phone' 		=> $employees->phone,
					'email' 		=> $employees->email,
					'userid' 		=> $employees->user_id,
					'type' 			=> $employees->type,
				);
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 200);
	}
	//Delete INV
	function delpwd_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		$obj = new Spa_admin_password(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		 			"id" 			=> $value->id,
		 		);
		 	}
		}
		//Response Data		
		$this->response($data, 200);
	}
	function deltxn_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->txnid)->limit(1)->get();
			$obj->deleted = 1;
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 			=> $obj->id,
			   	);
		    }
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//Update Items
	function itemupdate_get(){
	}
	function itemupdate_delete(){
	}
	function itemupdate_post(){
		$models = json_decode($this->post('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->limit(1)->get();
			$item = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$item->where("id", $obj->item_id)->limit(1)->get();
			//Txn
			$oldtxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$oldtxn->where("id", $value->transaction_id)->limit(1)->get();
			$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$txn->contact_id = $oldtxn->contact_id;
			$txn->transaction_template_id = 20;
			$txn->user_id = $value->user_id;
			$number = $this->_generate_number("Sale_Return", $oldtxn->issued_date);
			$txn->number = $number;
			$txn->type = 'Sale_Return';
			$amount = floatval($value->quantity) * floatval($value->price);
			$txn->sub_total = $amount;
			$txn->amount = $amount;
			$txn->rate = $oldtxn->rate;
			$txn->locale = $oldtxn->locale;
			$isdate = date('Y-m-d H:i:s');
			$txn->issued_date = $isdate;
			$txn->start_date = $isdate;
			$txn->intval = 1;
			$txn->day = 1;
			$txn->is_journal = 1;
			if($txn->save()){
				//CR
				$j1 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$j1->transaction_id = $txn->id;
				$j1->account_id = 74;
				$j1->contact_id = $txn->contact_id;
				$j1->description = "QTY Item Wellnez";
				$j1->dr = 0;
				$j1->cr = $value->quantity;
				$j1->rate = $txn->rate;
				$j1->locale = $txn->locale;
				$j1->save();
				//DR
				$j2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$j2->transaction_id = $txn->id;
				$j2->account_id = 14;
				$j2->contact_id = $txn->contact_id;
				$j2->description = "QTY Item Wellnez";
				$j2->dr = $value->quantity;
				$j2->cr = 0;
				$j2->rate = $txn->rate;
				$j2->locale = $txn->locale;
				$j2->save();
				//CR
				$j3 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$j3->transaction_id = $txn->id;
				$j3->account_id = 71;
				$j3->contact_id = $txn->contact_id;
				$j3->description = "Amount Item Wellnez";
				$j3->dr = 0;
				$j3->cr = $txn->amount;
				$j3->rate = $txn->rate;
				$j3->locale = $txn->locale;
				$j3->save();
				//DR
				$j4 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$j4->transaction_id = $txn->id;
				$j4->account_id = 10;
				$j4->contact_id = $txn->contact_id;
				$j4->description = "Amount Item Wellnez";
				$j4->dr = $txn->amount;
				$j4->cr = 0;
				$j4->rate = $txn->rate;
				$j4->locale = $txn->locale;
				$j4->save();

				//Save Item
				$i = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$i->transaction_id = $txn->id;
				$i->measurement_id = $item->measurement_id;
				$i->item_id = $item->id;
				$i->description = $obj->description;
				$i->quantity = $value->quantity;
				$i->conversion_ratio = $obj->conversion_ratio;
				$i->cost = $obj->cost;
				$i->price = $value->price;
				$i->amount = $amount;
				$i->movement = 1;
				$i->rate = $txn->rate;
				$i->locale = $txn->locale;
				$i->save();

				//Offset Inv
				$txn1 = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$txn1->contact_id = $oldtxn->contact_id;
				$txn1->transaction_template_id = 20;
				$txn1->user_id = $value->user_id;
				$number = $this->_generate_number("Offset_Invoice", $oldtxn->issued_date);
				$txn1->number = $number;
				$txn1->type = 'Offset_Invoice';
				$amount = floatval($value->quantity) * floatval($value->price);
				$txn1->sub_total = $amount;
				$txn1->amount = $amount;
				$txn1->rate = $oldtxn->rate;
				$txn1->locale = $oldtxn->locale;
				$isdate = date('Y-m-d H:i:s');
				$txn1->issued_date = $isdate;
				$txn1->is_journal = 0;
				$txn1->reference_id = $value->transaction_id;
				$txn1->return_id = $txn->id;
				$txn1->save();
				$data["results"][] = array(
			   		"id" 			=> $txn->id,
			   	);
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	function itemupdate_put(){
		$models = json_decode($this->put('models'));
		$data["results"] = [];
		$data["count"] = 0;
		foreach ($models as $value) {
			$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->limit(1)->get();
			$item = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$item->where("id", $obj->item_id)->limit(1)->get();
			//Txn
			$oldtxn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$oldtxn->where("id", $value->transaction_id)->limit(1)->get();
			$txn = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$txn->contact_id = $oldtxn->contact_id;
			$txn->transaction_template_id = 20;
			$txn->user_id = $value->user_id;
			$number = $this->_generate_number("Sale_Return", $oldtxn->issued_date);
			$txn->number = $number;
			$txn->type = 'Sale_Return';
			$amount = floatval($value->quantity) * floatval($value->price);
			$txn->sub_total = $amount;
			$txn->amount = $amount;
			$txn->rate = $oldtxn->rate;
			$txn->locale = $oldtxn->locale;
			$isdate = date('Y-m-d H:i:s');
			$txn->issued_date = $isdate;
			$txn->start_date = $isdate;
			$txn->intval = 1;
			$txn->day = 1;
			$txn->is_journal = 1;
			if($txn->save()){
				//CR
				$j1 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$j1->transaction_id = $txn->id;
				$j1->account_id = 74;
				$j1->contact_id = $txn->contact_id;
				$j1->description = "QTY Item Wellnez";
				$j1->dr = 0;
				$j1->cr = $value->quantity;
				$j1->rate = $txn->rate;
				$j1->locale = $txn->locale;
				$j1->save();
				//DR
				$j2 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$j2->transaction_id = $txn->id;
				$j2->account_id = 14;
				$j2->contact_id = $txn->contact_id;
				$j2->description = "QTY Item Wellnez";
				$j2->dr = $value->quantity;
				$j2->cr = 0;
				$j2->rate = $txn->rate;
				$j2->locale = $txn->locale;
				$j2->save();
				//CR
				$j3 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$j3->transaction_id = $txn->id;
				$j3->account_id = 71;
				$j3->contact_id = $txn->contact_id;
				$j3->description = "Amount Item Wellnez";
				$j3->dr = 0;
				$j3->cr = $txn->amount;
				$j3->rate = $txn->rate;
				$j3->locale = $txn->locale;
				$j3->save();
				//DR
				$j4 = new Journal_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$j4->transaction_id = $txn->id;
				$j4->account_id = 10;
				$j4->contact_id = $txn->contact_id;
				$j4->description = "Amount Item Wellnez";
				$j4->dr = $txn->amount;
				$j4->cr = 0;
				$j4->rate = $txn->rate;
				$j4->locale = $txn->locale;
				$j4->save();

				//Save Item
				$i = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$i->transaction_id = $txn->id;
				$i->measurement_id = $item->measurement_id;
				$i->item_id = $item->id;
				$i->description = $obj->description;
				$i->quantity = $value->quantity;
				$i->conversion_ratio = $obj->conversion_ratio;
				$i->cost = $obj->cost;
				$i->price = $value->price;
				$i->amount = $amount;
				$i->movement = 1;
				$i->rate = $txn->rate;
				$i->locale = $txn->locale;
				$i->save();

				//Offset Inv
				$txn1 = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$txn1->contact_id = $oldtxn->contact_id;
				$txn1->transaction_template_id = 20;
				$txn1->user_id = $value->user_id;
				$number = $this->_generate_number("Offset_Invoice", $oldtxn->issued_date);
				$txn1->number = $number;
				$txn1->type = 'Offset_Invoice';
				$amount = floatval($value->quantity) * floatval($value->price);
				$txn1->sub_total = $amount;
				$txn1->amount = $amount;
				$txn1->rate = $oldtxn->rate;
				$txn1->locale = $oldtxn->locale;
				$isdate = date('Y-m-d H:i:s');
				$txn1->issued_date = $isdate;
				$txn1->is_journal = 0;
				$txn1->reference_id = $value->transaction_id;
				$txn1->return_id = $txn->id;
				$txn1->save();
				$data["results"][] = array(
			   		"id" 			=> $txn->id,
			   	);
			}
		}
		$data["count"] = count($data["results"]);
		$this->response($data, 201);
	}
	//Report
	function sale_summary_by_room_get(){
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$is_pattern = 0;
		$obj = new Transactions(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
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
		$obj->where("type", "Invoice");
		//Results
		if($page && $limit){
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
		}else{
			$obj->get_iterated();
			$data["count"] = $obj->result_count();
		}
		if($obj->exists()){
			$objList = [];
			foreach ($obj as $value) {
				if($value->work_id > 0){
			 		$swr = new Spa_work_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			 		$swr->where("id", $value->work_id)->limit(1)->get();
			 		$r = new Spa_room(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			 		$r->where("id", $swr->room_id)->limit(1)->get();
			 		$data["results"][] = array(
						"id" 			=> $value->id,
						"amount" 		=> floatval($value->amount),
					);
			 	}
		 	}
		}
		//Response Data		
		$this->response($data, 200);
	}
}
/* End of file choulr.php */
/* Location: ./application/controllers/api/meters.php */