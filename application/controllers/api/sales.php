<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Sales extends REST_Controller {
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
			// $this->_database = $conn->inst_database;
			$this->_database = 'db_banhji';
		}
	}

	function summary_customer_get() {
		$filters 	= $this->get("filter")["filters"];
			$page 		= $this->get('page') !== false ? $this->get('page') : 1;
			$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
			$sort 	 	= $this->get("sort");
			$data["results"] = array();
			$data["count"] = 0;
			$is_pattern = 0;
			$deleted = 0;

			$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



			//Filter
			// if(!empty($filters) && isset($filters)){
		 //    	foreach ($filters as $value) {
		 //    		if(!empty($value["operator"]) && isset($value["operator"])){
			//     		if($value["operator"]=="where_in"){
			//     			$obj->where_in($value["field"], $value["value"]);
			//     		}else if($value["operator"]=="or_where_in"){
			//     			$obj->or_where_in($value["field"], $value["value"]);
			//     		}else if($value["operator"]=="where_not_in"){
			//     			$obj->where_not_in($value["field"], $value["value"]);
			//     		}else if($value["operator"]=="or_where_not_in"){
			//     			$obj->or_where_not_in($value["field"], $value["value"]);
			//     		}else if($value["operator"]=="like"){
			//     			$obj->like($value["field"], $value["value"]);
			//     		}else if($value["operator"]=="or_like"){
			//     			$obj->or_like($value["field"], $value["value"]);
			//     		}else if($value["operator"]=="not_like"){
			//     			$obj->not_like($value["field"], $value["value"]);
			//     		}else if($value["operator"]=="or_not_like"){
			//     			$obj->or_not_like($value["field"], $value["value"]);
			//     		}else if($value["operator"]=="startswith"){
			//     			$obj->like($value["field"], $value["value"], "after");
			//     		}else if($value["operator"]=="endswith"){
			//     			$obj->like($value["field"], $value["value"], "before");
			//     		}else if($value["operator"]=="contains"){
			//     			$obj->like($value["field"], $value["value"], "both");
			//     		}else if($value["operator"]=="or_where"){
			//     			$obj->or_where($value["field"], $value["value"]);
			//     		}else if($value["operator"]=="where_related"){
			//     			$obj->where_related($value["model"], $value["field"], $value["value"]);
			//     		}else if($value["operator"]=="search"){
			//     			$obj->like("number", $value["value"], "after");
			//     			$obj->or_like("enumber", $value["value"], "after");
			//     			$obj->or_like("wnumber", $value["value"], "after");
			// 		    	$obj->or_like("surname", $value["value"], "after");
			// 		    	$obj->or_like("name", $value["value"], "after");
			// 		    	$obj->or_like("company", $value["value"], "after");
			//     		}else{
			//     			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
			//     		}
		 //    		}else{
		 //    			if($value["field"]=="is_pattern"){
		 //    				$is_pattern = $value["value"];
		 //    			}else if($value["field"]=="deleted"){
		 //    				$deleted = $value["value"];
		 //    			}else{
		 //    				$obj->where($value["field"], $value["value"]);
		 //    			}
		 //    		}
			// 	}
			// }

			$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
			$type->where('parent_id', 1)->get();

			$obj->where_related("contact", 'contact_type_id', $type);
			$obj->where_in("type", array("Invoice", "Cash_Sale"));

			// $obj->include_related("contact_type", "name");

			//Results
			$obj->get_paged_iterated($page, $limit);
			$data["count"] = $obj->paged->total_rows;
			$customers = array();
			if($obj->result_count()>0){
				foreach ($obj as $value) {
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;
					if(isset($customers["$fullname"])) {
						$customers["$fullname"]['amount']+= floatval($value->amount);
					} else {
						$customers[$fullname]['amount']= floatval($value->amount);
					}
					$total += floatval($value->amount)/ floatval($value->rate);
				}
			}

			foreach ($customers as $key => $value) {
				$data["results"][] = array(
					'customer' => $key,
					'amount'	=> $value['amount']

				);
			}

			//Response Data
			$this->response($data, 200);


	}

	function detail_customer_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



		//Filter
		// if(!empty($filters) && isset($filters)){
	 //    	foreach ($filters as $value) {
	 //    		if(!empty($value["operator"]) && isset($value["operator"])){
		//     		if($value["operator"]=="where_in"){
		//     			$obj->where_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_where_in"){
		//     			$obj->or_where_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="where_not_in"){
		//     			$obj->where_not_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_where_not_in"){
		//     			$obj->or_where_not_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="like"){
		//     			$obj->like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_like"){
		//     			$obj->or_like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="not_like"){
		//     			$obj->not_like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_not_like"){
		//     			$obj->or_not_like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="startswith"){
		//     			$obj->like($value["field"], $value["value"], "after");
		//     		}else if($value["operator"]=="endswith"){
		//     			$obj->like($value["field"], $value["value"], "before");
		//     		}else if($value["operator"]=="contains"){
		//     			$obj->like($value["field"], $value["value"], "both");
		//     		}else if($value["operator"]=="or_where"){
		//     			$obj->or_where($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="where_related"){
		//     			$obj->where_related($value["model"], $value["field"], $value["value"]);
		//     		}else if($value["operator"]=="search"){
		//     			$obj->like("number", $value["value"], "after");
		//     			$obj->or_like("enumber", $value["value"], "after");
		//     			$obj->or_like("wnumber", $value["value"], "after");
		// 		    	$obj->or_like("surname", $value["value"], "after");
		// 		    	$obj->or_like("name", $value["value"], "after");
		// 		    	$obj->or_like("company", $value["value"], "after");
		//     		}else{
		//     			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		//     		}
	 //    		}else{
	 //    			if($value["field"]=="is_pattern"){
	 //    				$is_pattern = $value["value"];
	 //    			}else if($value["field"]=="deleted"){
	 //    				$deleted = $value["value"];
	 //    			}else{
	 //    				$obj->where($value["field"], $value["value"]);
	 //    			}
	 //    		}
		// 	}
		// }


		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where_in("type", array("Invoice", "Cash_Sale"));

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$customer = $value->contact->get();
				$fullname = $customer->surname.' '.$customer->name;
				$items = $value->item_line->include_related('item', array('name'))->get();
				$lines = array();
				foreach($items as $item) {
					$lines[] = array(
						'name' 			=> $item->item_name,
						'quantity' 	=> $item->quantity,
						'price' 		=> floatval($item->price)/floatval($value->rate),
						'amount'		=> floatval($item->amount)/floatval($value->rate)
					);
				}
				if(isset($customers["$fullname"])) {
					$customers["$fullname"]['amount'] += floatval($value->amount);
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate),
						'lines' 	=> $lines
					);
				} else {
					$customers["$fullname"]['amount'] = floatval($value->amount);
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate),
						'lines' 	=> $lines
					);
			//Results
			$obj->get_paged_iterated($page, $limit);

			$customers = array();
			if($obj->result_count()>0){

				foreach ($obj as $value) {
					$customer = $value->contact->get();
					$fullname = $customer->surname.' '.$customer->name;

					if(isset($customers[$fullname])){
						$customers[$fullname][]= $value;
					}else{
						$customers[$fullname][]= $value;
					}
					$total += floatval($value->amount)/ floatval($value->rate);
				}
			}
		}

		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' => $key,
				'amount'	 => $value['amount'],
				'items'	=> $value['transactions']
			);
		}
		$data['total'] = $total;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function transaction_customer_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



		//Filter
		// if(!empty($filters) && isset($filters)){
	 //    	foreach ($filters as $value) {
	 //    		if(!empty($value["operator"]) && isset($value["operator"])){
		//     		if($value["operator"]=="where_in"){
		//     			$obj->where_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_where_in"){
		//     			$obj->or_where_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="where_not_in"){
		//     			$obj->where_not_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_where_not_in"){
		//     			$obj->or_where_not_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="like"){
		//     			$obj->like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_like"){
		//     			$obj->or_like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="not_like"){
		//     			$obj->not_like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_not_like"){
		//     			$obj->or_not_like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="startswith"){
		//     			$obj->like($value["field"], $value["value"], "after");
		//     		}else if($value["operator"]=="endswith"){
		//     			$obj->like($value["field"], $value["value"], "before");
		//     		}else if($value["operator"]=="contains"){
		//     			$obj->like($value["field"], $value["value"], "both");
		//     		}else if($value["operator"]=="or_where"){
		//     			$obj->or_where($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="where_related"){
		//     			$obj->where_related($value["model"], $value["field"], $value["value"]);
		//     		}else if($value["operator"]=="search"){
		//     			$obj->like("number", $value["value"], "after");
		//     			$obj->or_like("enumber", $value["value"], "after");
		//     			$obj->or_like("wnumber", $value["value"], "after");
		// 		    	$obj->or_like("surname", $value["value"], "after");
		// 		    	$obj->or_like("name", $value["value"], "after");
		// 		    	$obj->or_like("company", $value["value"], "after");
		//     		}else{
		//     			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		//     		}
	 //    		}else{
	 //    			if($value["field"]=="is_pattern"){
	 //    				$is_pattern = $value["value"];
	 //    			}else if($value["field"]=="deleted"){
	 //    				$deleted = $value["value"];
	 //    			}else{
	 //    				$obj->where($value["field"], $value["value"]);
	 //    			}
	 //    		}
		// 	}
		// }

		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where_in("type", array("Invoice", "Cash_Sale", "Deposit", "Cash_Receipt"));

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$customer = $value->contact->get();
				$fullname = $customer->surname.' '.$customer->name;
				$account  = $value->account->get();
				$lines = array();

				if(isset($customers["$fullname"])) {
					$customers["$fullname"]['amount'] += floatval($value->amount);
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'account' => array('number' => $account->number, 'name' => $account->name),
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);
				} else {
					$customers["$fullname"]['amount'] = floatval($value->amount);
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'account' => array('number' => $account->number, 'name' => $account->name),
						'number' 	=> $value->number,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);
				}
				$total += floatval($value->amount)/floatval($value->rate);
			}
		}

		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' => $key,
				'amount'	 => $value['amount'],
				'items'	=> $value['transactions']
			);
		}
		$data['total'] = $total;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function invoice_list_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



		//Filter
		// if(!empty($filters) && isset($filters)){
	 //    	foreach ($filters as $value) {
	 //    		if(!empty($value["operator"]) && isset($value["operator"])){
		//     		if($value["operator"]=="where_in"){
		//     			$obj->where_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_where_in"){
		//     			$obj->or_where_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="where_not_in"){
		//     			$obj->where_not_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_where_not_in"){
		//     			$obj->or_where_not_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="like"){
		//     			$obj->like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_like"){
		//     			$obj->or_like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="not_like"){
		//     			$obj->not_like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_not_like"){
		//     			$obj->or_not_like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="startswith"){
		//     			$obj->like($value["field"], $value["value"], "after");
		//     		}else if($value["operator"]=="endswith"){
		//     			$obj->like($value["field"], $value["value"], "before");
		//     		}else if($value["operator"]=="contains"){
		//     			$obj->like($value["field"], $value["value"], "both");
		//     		}else if($value["operator"]=="or_where"){
		//     			$obj->or_where($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="where_related"){
		//     			$obj->where_related($value["model"], $value["field"], $value["value"]);
		//     		}else if($value["operator"]=="search"){
		//     			$obj->like("number", $value["value"], "after");
		//     			$obj->or_like("enumber", $value["value"], "after");
		//     			$obj->or_like("wnumber", $value["value"], "after");
		// 		    	$obj->or_like("surname", $value["value"], "after");
		// 		    	$obj->or_like("name", $value["value"], "after");
		// 		    	$obj->or_like("company", $value["value"], "after");
		//     		}else{
		//     			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		//     		}
	 //    		}else{
	 //    			if($value["field"]=="is_pattern"){
	 //    				$is_pattern = $value["value"];
	 //    			}else if($value["field"]=="deleted"){
	 //    				$deleted = $value["value"];
	 //    			}else{
	 //    				$obj->where($value["field"], $value["value"]);
	 //    			}
	 //    		}
		// 	}
		// }

		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where_in("type", array("Invoice"));

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$customer = $value->contact->get();
				$fullname = $customer->surname.' '.$customer->name;
				$account  = $value->account->get();
				$lines = array();

				if(isset($customers["$fullname"])) {
					$customers["$fullname"]['amount'] += floatval($value->amount);
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'account' => array('number' => $account->number, 'name' => $account->name),
						'number' 	=> $value->number,
						'due_date'=> $value->due_date,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);
				} else {
					$customers["$fullname"]['amount'] = floatval($value->amount);
					$customers["$fullname"]['transactions'][] = array(
						'type'  	=> $value->type,
						'date' 		=> $value->issued_date,
						'account' => array('number' => $account->number, 'name' => $account->name),
						'number' 	=> $value->number,
						'due_date'=> $value->due_date,
						'memo' 		=> $value->memo2,
						'amount' 	=> floatval($value->amount)/floatval($value->rate)
					);
				}
				$total += floatval($value->amount)/floatval($value->rate);
			}
		}

		foreach ($customers as $key => $value) {
			$data["results"][] = array(
				'group' => $key,
				'amount'	 => $value['amount'],
				'items'	=> $value['transactions']
			);
		}
		$data['total'] = $total;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}



	// item or service classified as list
	function summary_list_get() {
		$filters 	= $this->get("filter")["filters"];
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;
		$sort 	 	= $this->get("sort");
		$data["results"] = array();
		$data["count"] = 0;
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Transaction(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');



		//Filter
		// if(!empty($filters) && isset($filters)){
	 //    	foreach ($filters as $value) {
	 //    		if(!empty($value["operator"]) && isset($value["operator"])){
		//     		if($value["operator"]=="where_in"){
		//     			$obj->where_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_where_in"){
		//     			$obj->or_where_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="where_not_in"){
		//     			$obj->where_not_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_where_not_in"){
		//     			$obj->or_where_not_in($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="like"){
		//     			$obj->like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_like"){
		//     			$obj->or_like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="not_like"){
		//     			$obj->not_like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="or_not_like"){
		//     			$obj->or_not_like($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="startswith"){
		//     			$obj->like($value["field"], $value["value"], "after");
		//     		}else if($value["operator"]=="endswith"){
		//     			$obj->like($value["field"], $value["value"], "before");
		//     		}else if($value["operator"]=="contains"){
		//     			$obj->like($value["field"], $value["value"], "both");
		//     		}else if($value["operator"]=="or_where"){
		//     			$obj->or_where($value["field"], $value["value"]);
		//     		}else if($value["operator"]=="where_related"){
		//     			$obj->where_related($value["model"], $value["field"], $value["value"]);
		//     		}else if($value["operator"]=="search"){
		//     			$obj->like("number", $value["value"], "after");
		//     			$obj->or_like("enumber", $value["value"], "after");
		//     			$obj->or_like("wnumber", $value["value"], "after");
		// 		    	$obj->or_like("surname", $value["value"], "after");
		// 		    	$obj->or_like("name", $value["value"], "after");
		// 		    	$obj->or_like("company", $value["value"], "after");
		//     		}else{
		//     			$obj->where($value["field"].' '.$value["operator"], $value["value"]);
		//     		}
	 //    		}else{
	 //    			if($value["field"]=="is_pattern"){
	 //    				$is_pattern = $value["value"];
	 //    			}else if($value["field"]=="deleted"){
	 //    				$deleted = $value["value"];
	 //    			}else{
	 //    				$obj->where($value["field"], $value["value"]);
	 //    			}
	 //    		}
		// 	}
		// }

		$type = new Contact_type(null, $this->server_host, $this->server_user, $this->server_pwd, 'db_banhji');
		$type->where('parent_id', 1)->get();

		$obj->where_related("contact", 'contact_type_id', $type);
		$obj->where_in("type", array("Invoice"));

		// $obj->include_related("contact_type", "name");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;
		$customers = array();
		$total = 0;
		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$items = $value->item_line->include_related('item', array('name'))->get();
				$lines = array();
				foreach($items as $item) {
					$data['results'][] = array(
						'name' 			=> $item->item_name,
						'quantity' 	=> $item->quantity,
						'price' 		=> floatval($item->price)/floatval($value->rate),
						'amount'		=> floatval($item->amount)/floatval($value->rate)
					);
				}
				$total += floatval($value->amount)/floatval($value->rate);
			}
		}
		$data['total'] = $total;
		$data['count'] = count($customers);
		//Response Data
		$this->response($data, 200);
	}

	function detail_list_get() {
		$this->response(array('results' => "sales by item or service--detail"), 200);
	}

}//End Of Class
