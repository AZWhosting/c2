<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';

class Items extends REST_Controller {
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
		$is_pattern = 0;
		$deleted = 0;

		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		    			$obj->where($value["field"], $value["value"]);
		    		}
	    		}else{	    			
	    			if($value["field"]=="is_pattern"){
	    				$is_pattern = $value["value"];
	    			}else if($value["field"]=="deleted"){
	    				$deleted = $value["value"];
	    			}else{
	    				$obj->where($value["field"], $value["value"]);
	    			}
	    		}
			}									 			
		}

		$obj->include_related("item_type", "name");
		$obj->where("is_pattern", $is_pattern);
		$obj->where("deleted", $deleted);			
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$itemPrice = [];				
				foreach ($value->item_price->get() as $p) {					
					$itemPrice[] = array(
						"id" 			=> $p->id,				
						"item_id" 		=> $p->item_id,
						"assembly_id"	=> $p->assembly_id,
						"measurement_id"=> $p->measurement_id,
						"quantity"		=> floatval($p->quantity),					
						"unit_value" 	=> floatval($p->unit_value),
						"price" 		=> floatval($p->price),
						"amount" 		=> floatval($p->amount),
						"locale" 		=> $p->locale,
						
						"measurement" 	=> $p->measurement->get()->name
					); 
				}

				//Sum On Hand
				$on_hand = 0;
				if($value->item_type_id=="1"){					
					$itemIn = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$itemIn->select_sum("quantity");
					$itemIn->where_in_related("transaction", "type", array("Cash_Purchase", "Credit_Purchase", "Adjustment"));
					$itemIn->where_related("transaction", "is_recurring", 0);
					$itemIn->where_related("transaction", "deleted", 0);
					$itemIn->where("item_id", $value->id);
					$itemIn->where("movement", 1);
					$itemIn->get();
					
					$itemOut = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
					$itemOut->select_sum("quantity");
					$itemOut->where_in_related("transaction", "type", array("Invoice", "Cash_Sale", "Adjustment"));
					$itemOut->where_related("transaction", "is_recurring", 0);
					$itemOut->where_related("transaction", "deleted", 0);
					$itemOut->where("item_id", $value->id);
					$itemOut->where("movement", -1);
					$itemOut->get();					
					
					$on_hand = floatval($itemIn->quantity) - floatval($itemOut->quantity);
				}

				$data["results"][] = array(
					"id" 					=> $value->id,
					"company_id" 			=> $value->company_id,
					"contact_id" 			=> $value->contact_id,
					"currency_id" 			=> $value->currency_id,
					"item_type_id"			=> $value->item_type_id,					
					"category_id" 			=> $value->category_id,
					"item_group_id"			=> $value->item_group_id,
					"item_sub_group_id"		=> $value->item_sub_group_id,
					"brand_id" 				=> $value->brand_id,					
					"measurement_id" 		=> $value->measurement_id,					
					"main_id" 				=> $value->main_id,
					"abbr" 					=> $value->abbr,
					"number" 				=> $value->number,
					"international_code" 	=> $value->international_code,
					"imei" 					=> $value->imei,
					"serial_number" 		=> $value->serial_number,
					"supplier_code"			=> $value->supplier_code,
					"color_code" 			=> $value->color_code,
				   	"name" 					=> $value->name,
				   	"purchase_description" 	=> $value->purchase_description,
				   	"sale_description" 		=> $value->sale_description,
				   	"catalogs" 				=> explode(",",$value->catalogs),				   	
				   	"cost" 					=> floatval($value->cost),
				   	"price" 				=> floatval($value->price),
				   	"amount" 				=> floatval($value->amount),
				   	"rate" 					=> floatval($value->rate),
				   	"locale" 				=> $value->locale,
				   	"on_hand" 				=> $on_hand,
				   	"on_po" 				=> floatval($value->on_po),
				   	"on_so" 				=> floatval($value->on_so),
				   	"order_point" 			=> intval($value->order_point),
				   	"account_id" 			=> $value->account_id,
				   	"income_account_id" 	=> $value->income_account_id,
				   	"cogs_account_id"		=> $value->cogs_account_id,
				   	"inventory_account_id"	=> $value->inventory_account_id,
				   	"deposit_account_id" 	=> $value->deposit_account_id,	   				   	
				   	"preferred_vendor_id" 	=> $value->preferred_vendor_id,
				   	"image_url" 			=> $value->image_url,
				   	"favorite" 				=> $value->favorite=="true"?true:false,
				   	"is_catalog" 			=> $value->is_catalog,
				   	"is_assemble" 			=> $value->is_assemble,
				   	"is_pattern" 			=> intval($value->is_pattern),				  
				   	"status" 				=> $value->status,
				   	"deleted" 				=> $value->deleted, 					
 					
 					"item_type" 			=> $value->item_type_name,
				   	"measurement"			=> [],//$value->measurement->get()->name,
				   	"item_prices"			=> $itemPrice
				);
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}	
	
	//POST
	function index_post() {
		$models = json_decode($this->post('models'));				
		$data["results"] = array();
		$data["count"] = 0;				
		
		foreach ($models as $value) {
			$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			isset($value->company_id) 				? $obj->company_id 				= $value->company_id : "";
			isset($value->contact_id) 				? $obj->contact_id 				= $value->contact_id : "";			
			isset($value->currency_id) 				? $obj->currency_id 			= $value->currency_id : "";
			isset($value->item_type_id) 			? $obj->item_type_id			= $value->item_type_id : "";			
			isset($value->category_id) 				? $obj->category_id 			= $value->category_id : "";
			isset($value->item_group_id) 			? $obj->item_group_id 			= $value->item_group_id : "";
			isset($value->item_sub_group_id) 		? $obj->item_sub_group_id 		= $value->item_sub_group_id : "";
			isset($value->brand_id) 				? $obj->brand_id 				= $value->brand_id : "";
			isset($value->measurement_id) 			? $obj->measurement_id 			= $value->measurement_id : "";		
			isset($value->main_id) 					? $obj->main_id 				= $value->main_id : "";
			isset($value->abbr) 					? $obj->abbr 					= $value->abbr : "";
			isset($value->number) 					? $obj->number 					= $value->number : "";
			isset($value->international_code) 		? $obj->international_code 		= $value->international_code : "";
			isset($value->imei) 					? $obj->imei 					= $value->imei : "";
			isset($value->serial_number) 			? $obj->serial_number 			= $value->serial_number : "";
			isset($value->supplier_code) 			? $obj->supplier_code 			= $value->supplier_code : "";
			isset($value->color_code) 				? $obj->color_code 				= $value->color_code : "";
		   	isset($value->name) 					? $obj->name 					= $value->name :  "";
		   	isset($value->purchase_description) 	? $obj->purchase_description 	= $value->purchase_description : "";
		   	isset($value->sale_description) 		? $obj->sale_description 		= $value->sale_description : "";
		   	isset($value->catalogs) 				? $obj->catalogs 				= implode(",",$value->catalogs) : "";
		   	isset($value->cost) 					? $obj->cost 					= $value->cost : "";
		   	isset($value->price) 					? $obj->price 					= $value->price : "";
		   	isset($value->amount) 					? $obj->amount 					= $value->amount : "";
		   	isset($value->rate) 					? $obj->rate 					= $value->rate : "";
		   	isset($value->locale) 					? $obj->locale 					= $value->locale : "";
		   	isset($value->on_hand) 					? $obj->on_hand 				= $value->on_hand : "";
		   	isset($value->on_po) 					? $obj->on_po 					= $value->on_po : "";
		   	isset($value->on_so) 					? $obj->on_so 					= $value->on_so : "";
		   	isset($value->order_point) 				? $obj->order_point 			= $value->order_point : "";
		   	isset($value->account_id) 				? $obj->account_id 				= $value->account_id : "";
		   	isset($value->income_account_id) 		? $obj->income_account_id 		= $value->income_account_id : "";
		   	isset($value->cogs_account_id) 			? $obj->cogs_account_id 		= $value->cogs_account_id : "";
		   	isset($value->inventory_account_id) 	? $obj->inventory_account_id 	= $value->inventory_account_id : "";
		   	isset($value->deposit_account_id) 		? $obj->deposit_account_id 		= $value->deposit_account_id : "";
		   	isset($value->preferred_vendor_id) 		? $obj->preferred_vendor_id 	= $value->preferred_vendor_id : "";
		   	isset($value->image_url) 				? $obj->image_url				= $value->image_url : "";
		   	isset($value->favorite) 				? $obj->favorite 				= $value->favorite : "";
		   	isset($value->is_catalog) 				? $obj->is_catalog 				= $value->is_catalog : "";
		   	isset($value->is_assemble) 				? $obj->is_assemble 			= $value->is_assemble : "";
		   	isset($value->is_pattern) 				? $obj->is_pattern 				= $value->is_pattern : "";
		   	isset($value->status) 					? $obj->status 					= $value->status : "";	   	
		   	isset($value->deleted) 					? $obj->deleted 				= $value->deleted : "";

	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 					=> $obj->id,
					"company_id" 			=> $obj->company_id,
					"contact_id" 			=> $obj->contact_id,
					"currency_id" 			=> $obj->currency_id,
					"item_type_id"			=> $obj->item_type_id,					
					"category_id" 			=> $obj->category_id,
					"item_group_id"			=> $obj->item_group_id,
					"item_sub_group_id"		=> $obj->item_sub_group_id,
					"brand_id" 				=> $obj->brand_id,					
					"measurement_id" 		=> $obj->measurement_id,					
					"main_id" 				=> $obj->main_id,
					"abbr" 					=> $obj->abbr,
					"number" 				=> $obj->number,
					"international_code" 	=> $obj->international_code,
					"imei" 					=> $obj->imei,
					"serial_number" 		=> $obj->serial_number,
					"supplier_code"			=> $obj->supplier_code,
					"color_code" 			=> $obj->color_code,
				   	"name" 					=> $obj->name,
				   	"purchase_description" 	=> $obj->purchase_description,
				   	"sale_description" 		=> $obj->sale_description,
				   	"catalogs" 				=> explode(",",$obj->catalogs),				   	
				   	"cost" 					=> floatval($obj->cost),
				   	"price" 				=> floatval($obj->price),
				   	"amount" 				=> floatval($obj->amount),
				   	"rate" 					=> floatval($obj->rate),
				   	"locale" 				=> floatval($obj->locale),
				   	"on_hand" 				=> floatval($obj->on_hand),
				   	"on_po" 				=> floatval($obj->on_po),
				   	"on_so" 				=> floatval($obj->on_so),
				   	"order_point" 			=> intval($obj->order_point),
				   	"account_id" 			=> $obj->account_id,
				   	"income_account_id" 	=> $obj->income_account_id,
				   	"cogs_account_id"		=> $obj->cogs_account_id,
				   	"inventory_account_id"	=> $obj->inventory_account_id,
				   	"deposit_account_id" 	=> $obj->deposit_account_id,				   				   	
				   	"preferred_vendor_id" 	=> $obj->preferred_vendor_id,
				   	"image_url" 			=> $obj->image_url,
				   	"favorite" 				=> $obj->favorite=="true"?true:false,
				   	"is_catalog" 			=> $obj->is_catalog,
				   	"is_assemble" 			=> $obj->is_assemble,
				   	"is_pattern" 			=> intval($obj->is_pattern),				  
				   	"status" 				=> $obj->status,
				   	"deleted" 				=> $obj->deleted
			   	);
		    }	
		}
		
		$data["count"] = count($data["results"]);
		$this->response($data, 201);		
	}
	
	//PUT
	function index_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->company_id) 				? $obj->company_id 				= $value->company_id : "";
			isset($value->contact_id) 				? $obj->contact_id 				= $value->contact_id : "";			
			isset($value->currency_id) 				? $obj->currency_id 			= $value->currency_id : "";
			isset($value->item_type_id) 			? $obj->item_type_id			= $value->item_type_id : "";			
			isset($value->category_id) 				? $obj->category_id 			= $value->category_id : "";
			isset($value->item_group_id) 			? $obj->item_group_id 			= $value->item_group_id : "";
			isset($value->item_sub_group_id) 		? $obj->item_sub_group_id 		= $value->item_sub_group_id : "";
			isset($value->brand_id) 				? $obj->brand_id 				= $value->brand_id : "";
			isset($value->measurement_id) 			? $obj->measurement_id 			= $value->measurement_id : "";		
			isset($value->main_id) 					? $obj->main_id 				= $value->main_id : "";
			isset($value->abbr) 					? $obj->abbr 					= $value->abbr : "";
			isset($value->number) 					? $obj->number 					= $value->number : "";
			isset($value->international_code) 		? $obj->international_code 		= $value->international_code : "";
			isset($value->imei) 					? $obj->imei 					= $value->imei : "";
			isset($value->serial_number) 			? $obj->serial_number 			= $value->serial_number : "";
			isset($value->supplier_code) 			? $obj->supplier_code 			= $value->supplier_code : "";
			isset($value->color_code) 				? $obj->color_code 				= $value->color_code : "";
		   	isset($value->name) 					? $obj->name 					= $value->name :  "";
		   	isset($value->purchase_description) 	? $obj->purchase_description 	= $value->purchase_description : "";
		   	isset($value->sale_description) 		? $obj->sale_description 		= $value->sale_description : "";
		   	isset($value->catalogs) 				? $obj->catalogs 				= implode(",",$value->catalogs) : "";
		   	isset($value->cost) 					? $obj->cost 					= $value->cost : "";
		   	isset($value->price) 					? $obj->price 					= $value->price : "";
		   	isset($value->amount) 					? $obj->amount 					= $value->amount : "";
		   	isset($value->rate) 					? $obj->rate 					= $value->rate : "";
		   	isset($value->locale) 					? $obj->locale 					= $value->locale : "";
		   	isset($value->on_hand) 					? $obj->on_hand 				= $value->on_hand : "";
		   	isset($value->on_po) 					? $obj->on_po 					= $value->on_po : "";
		   	isset($value->on_so) 					? $obj->on_so 					= $value->on_so : "";
		   	isset($value->order_point) 				? $obj->order_point 			= $value->order_point : "";
		   	isset($value->account_id) 				? $obj->account_id 				= $value->account_id : "";
		   	isset($value->income_account_id) 		? $obj->income_account_id 		= $value->income_account_id : "";
		   	isset($value->cogs_account_id) 			? $obj->cogs_account_id 		= $value->cogs_account_id : "";
		   	isset($value->inventory_account_id) 	? $obj->inventory_account_id 	= $value->inventory_account_id : "";
		   	isset($value->deposit_account_id) 		? $obj->deposit_account_id 		= $value->deposit_account_id : "";		   	
		   	isset($value->preferred_vendor_id) 		? $obj->preferred_vendor_id 	= $value->preferred_vendor_id : "";
		   	isset($value->image_url) 				? $obj->image_url				= $value->image_url : "";
		   	isset($value->favorite) 				? $obj->favorite 				= $value->favorite : "";
		   	isset($value->is_catalog) 				? $obj->is_catalog 				= $value->is_catalog : "";
		   	isset($value->is_assemble) 				? $obj->is_assemble 			= $value->is_assemble : "";
		   	isset($value->is_pattern) 				? $obj->is_pattern 				= $value->is_pattern : "";
		   	isset($value->status) 					? $obj->status 					= $value->status : "";	   	
		   	isset($value->deleted) 					? $obj->deleted 				= $value->deleted : "";

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 					=> $obj->id,
					"company_id" 			=> $obj->company_id,
					"contact_id" 			=> $obj->contact_id,
					"currency_id" 			=> $obj->currency_id,
					"item_type_id"			=> $obj->item_type_id,					
					"category_id" 			=> $obj->category_id,
					"item_group_id"			=> $obj->item_group_id,
					"item_sub_group_id"		=> $obj->item_sub_group_id,
					"brand_id" 				=> $obj->brand_id,					
					"measurement_id" 		=> $obj->measurement_id,					
					"main_id" 				=> $obj->main_id,
					"abbr" 					=> $obj->abbr,
					"number" 				=> $obj->number,
					"international_code" 	=> $obj->international_code,
					"imei" 					=> $obj->imei,
					"serial_number" 		=> $obj->serial_number,
					"supplier_code"			=> $obj->supplier_code,
					"color_code" 			=> $obj->color_code,
				   	"name" 					=> $obj->name,
				   	"purchase_description" 	=> $obj->purchase_description,
				   	"sale_description" 		=> $obj->sale_description,
				   	"catalogs" 				=> explode(",",$obj->catalogs),				   	
				   	"cost" 					=> floatval($obj->cost),
				   	"price" 				=> floatval($obj->price),
				   	"amount" 				=> floatval($obj->amount),
				   	"rate" 					=> floatval($obj->rate),
				   	"locale" 				=> floatval($obj->locale),
				   	"on_hand" 				=> floatval($obj->on_hand),
				   	"on_po" 				=> floatval($obj->on_po),
				   	"on_so" 				=> floatval($obj->on_so),
				   	"order_point" 			=> intval($obj->order_point),
				   	"account_id" 			=> $obj->account_id,
				   	"income_account_id" 	=> $obj->income_account_id,
				   	"cogs_account_id"		=> $obj->cogs_account_id,
				   	"inventory_account_id"	=> $obj->inventory_account_id,
				   	"deposit_account_id" 	=> $obj->deposit_account_id,				   				   	
				   	"preferred_vendor_id" 	=> $obj->preferred_vendor_id,
				   	"image_url" 			=> $obj->image_url,
				   	"favorite" 				=> $obj->favorite=="true"?true:false,
				   	"is_catalog" 			=> $obj->is_catalog,
				   	"is_assemble" 			=> $obj->is_assemble,
				   	"is_pattern" 			=> intval($obj->is_pattern),				  
				   	"status" 				=> $obj->status,
				   	"deleted" 				=> $obj->deleted
				);						
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE
	function index_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	}

	//GET ASSEMBLY
	function assembly_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$pl = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				
				$itemPrice = array();				
				foreach ($pl->get_by_id($value->assembly_id) as $p) {
					$priceList[] = array(
						"id" 			=> $p->id,
						"currency_id" 	=> $p->currency_id,
						"product_id" 	=> $p->product_id,
						"measurement_id"=> $p->measurement_id,
						"price" 		=> floatval($p->price),
						"unit_value" 	=> floatval($p->unit_value),
						
						"measurement" 	=> $p->measurement->get()->name,
						"currency" 		=> $p->currency->get_raw()->result()
					); 
				}

				$data["results"][] = array(
					"id" 				=> $value->id,
					"item_id" 			=> $value->item_id,
					"assembly_id" 		=> $value->assembly_id,
					"currency_id" 		=> $value->currency_id,
					"measurement_id" 	=> $value->measurement_id,
					"quantity" 			=> $value->quantity,
					"unit_value" 		=> $value->unit_value,
					"price" 			=> $value->price,
					"amount" 			=> $value->amount,
 					"locale" 			=> $value->locale,
 					"item_price" 		=> $itemPrice,
 					"assembly" 			=> $value->assembly->get_raw()->result()					
				);
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}	
	
	//POST ASSEMBLY
	function assembly_post() {
		$models = json_decode($this->post('models'));				
		$data["results"] = array();
		$data["count"] = 0;				
		
		foreach ($models as $value) {
			$obj = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			$obj->item_id 			= $value->item_id;
			$obj->assembly_id 		= $value->assembly_id;
			$obj->currency_id 		= $value->currency_id;
			$obj->measurement_id 	= $value->measurement_id;
			$obj->quantity 			= $value->quantity;
			$obj->unit_value 		= $value->unit_value;
			$obj->price 			= $value->price;
			$obj->amount 			= $value->amount;			
			
	   		if($obj->save()){
			   	$data["results"][] = array(
			   		"id" 				=> $obj->id,
					"item_id" 			=> $obj->item_id,
					"assembly_id" 		=> $obj->assembly_id,
					"currency_id" 		=> $obj->currency_id,
					"measurement_id" 	=> $obj->measurement_id,
					"quantity" 			=> $obj->quantity,
					"unit_value" 		=> $obj->unit_value,
					"price" 			=> $obj->price,
					"amount" 			=> $obj->amount
			   	);
		    }	
		}
		
		$data["count"] = count($data["results"]);
		$this->response($data, 201);		
	}
	
	//PUT ASSEMBLY
	function assembly_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$obj->item_id 			= $value->item_id;
			$obj->assembly_id 		= $value->assembly_id;
			$obj->currency_id 		= $value->currency_id;
			$obj->measurement_id 	= $value->measurement_id;
			$obj->quantity 			= $value->quantity;
			$obj->unit_value 		= $value->unit_value;
			$obj->price 			= $value->price;
			$obj->amount 			= $value->amount;

			if($obj->save()){				
				//Results
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"item_id" 			=> $obj->item_id,
					"assembly_id" 		=> $obj->assembly_id,
					"currency_id" 		=> $obj->currency_id,
					"measurement_id" 	=> $obj->measurement_id,
					"quantity" 			=> $obj->quantity,
					"unit_value" 		=> $obj->unit_value,
					"price" 			=> $obj->price,
					"amount" 			=> $obj->amount
				);						
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE ASSEMBLY
	function assembly_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Item_price(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	}


	//GET ITEM GROUP
	function group_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Item_group(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		    			$obj->where($value["field"], $value["value"]);
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
					"category_id" 	=> $value->category_id,					
					"sub_of" 		=> $value->sub_of,
					"code" 			=> $value->code,
					"name" 	 		=> $value->name,
					"abbr" 			=> $value->abbr,
					"is_system"		=> $value->is_system	
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
	
	//POST ITEM GROUP
	function group_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Item_group(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			$obj->category_id 	= $value->category_id;
			$obj->sub_of 		= $value->sub_of;
			$obj->code 			= $value->code;
			$obj->name 			= $value->name;
			$obj->abbr 			= $value->abbr;
			$obj->is_system 	= $value->is_system;
						
			if($obj->save()){
				$data["results"][] = array(
					"id" 			=> $obj->id,
					"category_id" 	=> $obj->category_id,					
					"sub_of" 		=> $obj->sub_of,
					"code" 			=> $obj->code,
					"name" 	 		=> $obj->name,
					"abbr" 			=> $obj->abbr,
					"is_system"		=> $obj->is_system	
				);
			}
		}
		$data["count"] = count($data["results"]);
		
		$this->response($data, 201);						
	}

	//PUT ITEM GROUP
	function group_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Item_group(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			$obj->category_id 	= $value->category_id;
			$obj->sub_of 		= $value->sub_of;
			$obj->code 			= $value->code;
			$obj->name 			= $value->name;
			$obj->abbr 			= $value->abbr;
			$obj->is_system 	= $value->is_system;

			if($obj->save()){				
				$data["results"][] = array(
					"id" 			=> $obj->id,
					"category_id" 	=> $obj->category_id,					
					"sub_of" 		=> $obj->sub_of,
					"code" 			=> $obj->code,
					"name" 	 		=> $obj->name,
					"abbr" 			=> $obj->abbr,
					"is_system"		=> $obj->is_system	
				);		
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE ITEM GROUP
	function group_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Item_group(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	}


	//GET ITEM CONTACT
	function contact_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Item_contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		    			$obj->where($value["field"], $value["value"]);
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
					"item_id" 		=> $value->item_id,					
					"contact_id" 	=> $value->contact_id,					
					"code"			=> $value->code,
					"type"			=> $value->type	
				);
			}
		}

		//Response Data		
		$this->response($data, 200);		
	}
	
	//POST ITEM CONTACT
	function contact_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Item_contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			
			isset($value->item_id) 		? $obj->item_id 	= $value->item_id : "";
			isset($value->contact_id) 	? $obj->contact_id 	= $value->contact_id : "";			
			isset($value->code) 		? $obj->code 		= $value->code : "";
			isset($value->type) 		? $obj->type 		= $value->type : "";
									
			if($obj->save()){
				$data["results"][] = array(
					"id" 			=> $obj->id,
					"item_id" 		=> $obj->item_id,					
					"contact_id" 	=> $obj->contact_id,
					"code"			=> $obj->code,					
					"type"			=> $obj->type	
				);
			}
		}
		$data["count"] = count($data["results"]);
		
		$this->response($data, 201);						
	}

	//PUT ITEM CONTACT
	function contact_put() {
		$models = json_decode($this->put('models'));
		$data["results"] = array();
		$data["count"] = 0;

		foreach ($models as $value) {			
			$obj = new Item_contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->item_id) 		? $obj->item_id 	= $value->item_id : "";
			isset($value->contact_id) 	? $obj->contact_id 	= $value->contact_id : "";
			isset($value->code) 		? $obj->code 		= $value->code : "";			
			isset($value->type) 		? $obj->type 		= $value->type : "";

			if($obj->save()){				
				$data["results"][] = array(
					"id" 			=> $obj->id,
					"item_id" 		=> $obj->item_id,					
					"contact_id" 	=> $obj->contact_id,
					"code"			=> $obj->code,					
					"type"			=> $obj->type	
				);		
			}
		}
		$data["count"] = count($data["results"]);

		$this->response($data, 200);
	}
	
	//DELETE ITEM CONTACT
	function contact_delete() {
		$models = json_decode($this->delete('models'));

		foreach ($models as $key => $value) {
			$obj = new Item_contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();
			
			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);							
		}

		//Response data
		$this->response($data, 200);
	}	


	//GENERATE NUMBER
	private function _generate_number($type_id){		
		$header = "";
    	switch($type_id){
		case "2":
		  	$header = "NIP";
		  	break;
		case "3":
		  	$header = "FXA";
		  	break;
		case "4":
		  	$header = "SVR";
		  	break;
		case "5":
		  	$header = "DEP";
		  	break;
		case "6":
		  	$header = "VAT";
		  	break;
		case "7":
		  	$header = "OCH";
		  	break;
		case "8":
		  	$header = "TRA";
		  	break;									
		default:
		  	$header = "INP";
		}
		
		$YY = date("y");
		$MM = date("m");
		$headerWithDate = $header . $YY . $MM;

		$inv = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$inv->where('item_type_id', $type_id);
		$inv->order_by('id', 'desc');
		$inv->get();

		$last_no = "";		
		if(count($inv)>0){
			$last_no = $inv->number;
		}
		$no = 0;
		$curr_YY = 0;
		if(strlen($last_no)>10){
			$no = intval(substr($last_no, strlen($last_no) - 5));
			$curr_YY = intval(substr($last_no, strlen($last_no) - 9, 2));			
		}				 
		
		//Reset invoice number back to 1 for the new year starts
		if(intval($YY)>$curr_YY){
			$no = 1;
		}else{
			$no++;
		}
								
		$number = $headerWithDate . str_pad($no, 5, "0", STR_PAD_LEFT);					
		
		return $number;				
	}

	//GET DASHBOARD
	function dashboard_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

		$type = new Item_type(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);				
		$gpm = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		$item = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {			    				
	    		$gpm->where_related("transaction", $value["field"], $value["value"]);		    		
			}									 			
		}

		//Gross Profit Margin
		$gpm->where_in_related("transaction", "type", array("Invoice", "Cash_Sale"));
		$gpm->where_in_related("item", "item_type_id", 1);
		$gpm->get();

		$cogs = 0; $sale = 0;
		foreach ($gpm as $m) {
			$cogs += floatval($m->quantity) * floatval($m->cost);
			$sale += floatval($m->quantity) * floatval($m->price); 
		}

		$gp = $sale - $cogs;
		$margin = 0;
		if($sale>0){
			$margin = $gp / $sale;
		}

		//Total Inventory Value
		$item->where("item_type_id", 1);
		$item->where("is_catalog", 0);
		$item->where("is_assemble", 0);
		$item->get();

		$total_cost = 0; $total_cogs = 0; $as_of = date("Y-m-d"); $sdate = date("Y-m-d");
		foreach ($item as $i) {
			$line = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$lineA = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);			

			if(!empty($filters) && isset($filters)){			
		    	foreach ($filters as $value) {			    				
			    	$line->where_related("transaction", $value["field"], $value["value"]);			    			    	
			    	$as_of = $value["value"];		    		
				}									 			
			}

			//Total Cost
			$line->where_in_related("transaction", "type", array("Invoice","Cash_Sale"));
			$line->where("item_id", $i->id);
			$line->order_by("issued_date", "desc");
			$line->limit(1);			
			$line->get();

			$total_cost += floatval($line->on_hand) * floatval($line->cost);

			//Total COGS
			$sdate = date('Y', strtotime($as_of)).'-01-01';
			
			$lineA->where_related("transaction", "issued_date >=", $sdate);
			$lineA->where_related("transaction", "issued_date <=", $as_of);
			$lineA->where_in_related("transaction", "type", array("Invoice","Cash_Sale"));
			$lineA->where("item_id", $i->id);					
			$lineA->get();
			
			foreach ($lineA as $la) {				
				$total_cogs += intval($la->quantity) * floatval($la->cost);
			}									
		}

		//Inventory Turnover Day		
		$diff = strtotime($as_of) - strtotime($sdate);
		$diff = floor($diff/(60*60*24));

		$days = 0;
		if($total_cogs>0){
			$days = ($total_cost / $total_cogs) * $diff;
		}

		$data["results"][] = array(
			"id" 					=> 1,
			"type" 					=> $type->count(),
			"gross_profit_margin"	=> $margin,
			"turnover_day"			=> $days,
			"total_value" 			=> $total_cost
		);			

		//Response Data		
		$this->response($data, 200);	
	}

	//GET INVENTORY POSITION SUMMARY
	function inventory_position_summary_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		$obj->where("item_type_id", 1);
		$obj->where("is_catalog", 0);
		$obj->where("is_assemble", 0);		
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$record = $value->item_line;				
				
				if(!empty($filters) && isset($filters)){			
			    	foreach ($filters as $val) {			    				
			    		$record->where_related("transaction", $val["field"], $val["value"]);		    		
					}									 			
				}
				
				//Record
				$record->order_by_related("transaction", "issued_date", "desc");
				$record->limit(1);
				$record->get();

				$data["results"][] = array(
					"id" 			=> $value->id,
					"item_id" 		=> $value->item_id,
					"category_id" 	=> $value->category_id,
					"item_group_id" => $value->item_group_id,					
					"number"			=> $value->number,
					"name" 			=> $value->name,									
					"category" 		=> $value->category->get_raw()->result(),
					"item_group" 	=> $value->item_group->get_raw()->result(),
					"on_hand" 		=> intval($record->on_hand),
					"on_po" 		=> intval($record->on_po),
					"on_so" 		=> intval($record->on_so),
					"cost" 			=> floatval($record->cost),					
					"price_avg" 	=> floatval($record->price_avg)
				);
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET INVENTORY POSITION DETAIL
	function inventory_position_detail_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {	    			    			
	    		$obj->where_related("transaction", $value["field"], $value["value"]);	    		
			}									 			
		}

		$obj->where_in_related("transaction", "type", array("Invoice", "Cash_Sale", "Cash_Purchase", "Credit_Purchase", "Adjustment"));		
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$data["results"][] = array(
					"id" 			=> $value->id,
					"item_id" 		=> $value->item_id,
					"on_hand" 		=> intval($value->on_hand),
					"unit" 			=> intval($value->quantity),
					"cost" 			=> floatval($value->cost),
					"price" 		=> floatval($value->price),
					"amount" 		=> floatval($value->amount),
					"rate" 			=> floatval($value->rate),
					"locale" 		=> $value->locale,
					"movement" 		=> intval($value->movement),										
					"issued_date" 	=> $value->issued_date,							
					
					"invoice" 		=> $value->transaction->get_raw()->result(),
					"item" 			=> $value->item->get_raw()->result()				
				);
			}
		}				

		//Response Data		
		$this->response($data, 200);	
	}

	//GET INVENTORY SALE BY ITEM
	function inventory_sale_by_item_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		$obj->where("item_type_id", 1);
		$obj->where("is_catalog", 0);
		$obj->where("is_assemble", 0);		
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$record = $value->item_line;				
				
				if(!empty($filters) && isset($filters)){			
			    	foreach ($filters as $val) {			    				
			    		$record->where_related("transaction", $val["field"], $val["value"]);		    		
					}									 			
				}
				$record->get();
				
				$qty = 0; $cost = 0; $price = 0;
				foreach ($record as $r) {
					$qty += intval($r->quantity);
					$price = floatval($r->price_avg);
					$cost = floatval($r->cost);
				}				

				$data["results"][] = array(
					"id" 			=> $value->id,
					"item_id" 		=> $value->item_id,
					"category_id" 	=> $value->category_id,
					"item_group_id" => $value->item_group_id,					
					"number"			=> $value->number,
					"name" 			=> $value->name,									
					"category" 		=> $value->category->get_raw()->result(),
					"item_group" 	=> $value->item_group->get_raw()->result(),
					"qty" 			=> $qty,
					"price" 		=> $price,
					"cost" 			=> $cost
				);
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET INVENTORY TURNOVER LIST
	function inventory_turnover_list_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = array();
		$data["count"] = 0;

		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		$obj->where("item_type_id", 1);
		$obj->where("is_catalog", 0);
		$obj->where("is_assemble", 0);		
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->result_count()>0){
			foreach ($obj as $value) {
				$sale = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$record = $value->item_line;				
				$edate = date("Y-m-d");				

				if(!empty($filters) && isset($filters)){			
			    	foreach ($filters as $val) {			    		
			    		$record->where_related("transaction", $val["field"], $val["value"]);
			    		$edate = $val["value"];			    				    		
					}									 			
				}
				$record->order_by_related("transaction", "issued_date", "desc");
				$record->limit(1);
				$record->get();
				
				$inventory = floatval($record->on_hand) * floatval($record->cost);				

				$sdate = date('Y', strtotime($edate)).'-01-01';
				$diff = strtotime($edate) - strtotime($sdate);
				$diff = floor($diff/(60*60*24));

				$sale->select_sum("quantity");
				$sale->where_related("transaction", "issued_date >=", $sdate);
				$sale->where_related("transaction", "issued_date <=", $edate);
				$sale->where_in_related("transaction", "type", array("Invoice", "Cash_Sale"));
				$sale->get();
				
				$cogs = intval($sale->quantity) * floatval($record->cost);

				$days = 0;
				if($cogs>0){
					$days = ($inventory / $cogs) * $diff;
				}

				$data["results"][] = array(
					"id" 			=> $value->id,					
					"category_id" 	=> $value->category_id,
					"item_group_id" => $value->item_group_id,					
					"number"			=> $value->number,
					"name" 			=> $value->name,									
					"category" 		=> $value->category->get_raw()->result(),
					"item_group" 	=> $value->item_group->get_raw()->result(),					
					"cost" 			=> $inventory,
					"days" 			=> $days
				);
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET INVENTORY MOVEMENT SUMMARY
	function inventory_movement_summary_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
		
		$obj->where("item_type_id", 1);
		$obj->where("is_catalog", 0);
		$obj->where("is_assemble", 0);		
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->exists()){
			foreach ($obj as $value) {
				$begin = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$purchase = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$sale = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
				$adj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);							
				
				if(!empty($filters) && isset($filters)){			
			    	foreach ($filters as $val) {			    				
			    		$begin->where_related("transaction", $val["field"], $val["value"]);
			    		$purchase->where_related("transaction", $val["field"], $val["value"]);
			    		$sale->where_related("transaction", $val["field"], $val["value"]);
			    		$adj->where_related("transaction", $val["field"], $val["value"]);		    		
					}									 			
				}
				
				//Begining
				$begin->where("item_id", $value->id);
				$begin->order_by_related("transaction", "issued_date", "asc");
				$begin->limit(1);
				$begin->get();

				//Purchase
				$purchase->where("item_id", $value->id);
				$purchase->select_sum("quantity");
				$purchase->where_related("transaction", "type", "PO");							
				$purchase->get();

				//Sale
				$sale->where("item_id", $value->id);
				$sale->select_sum("quantity");
				$sale->where_related("transaction", "type", "SO");							
				$sale->get();

				//Adjustment
				$adj->where("item_id", $value->id);
				$adj->select_sum("quantity");
				$adj->where_related("transaction", "type", "Adjustment");							
				$adj->get();

				$data["results"][] = array(
					"id" 			=> $value->id,					
					"category_id" 	=> $value->category_id,
					"item_group_id" => $value->item_group_id,					
					"number"			=> $value->number,
					"name" 			=> $value->name,									
					"category" 		=> $value->category->get_raw()->result(),
					"item_group" 	=> $value->item_group->get_raw()->result(),
					"begining" 		=> intval($begin->on_hand),
					"purchase" 		=> intval($purchase->quantity),
					"adjustment" 	=> intval($adj->quantity),
					"sale" 			=> intval($sale->quantity)
				);
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET INVENTORY MOVEMENT DETAIL
	function inventory_movement_detail_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}
			
		//Filter		
		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $value) {	    			    			
	    		$obj->where_related("transaction", $value["field"], $value["value"]);	    		
			}									 			
		}

		$obj->where_in_related("transaction", "type", array("Invoice", "Cash_Sale", "Cash_Purchase", "Credit_Purchase", "Adjustment"));		
		
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->result_count()>0){
			foreach ($obj as $value) {
				if($value->item_id>0){
					$data["results"][] = array(
						"id" 			=> $value->id,
						"item_id" 		=> $value->item_id,
						"on_hand" 		=> intval($value->on_hand),
						"unit" 			=> intval($value->quantity),
						"cost" 			=> floatval($value->cost),
						"price" 		=> floatval($value->price),
						"amount" 		=> floatval($value->amount),
						"rate" 			=> floatval($value->rate),
						"locale" 		=> $value->locale,
						"movement" 		=> intval($value->movement),											
						
						"invoice" 		=> $value->transaction->get_raw()->result(),						
						"item" 			=> $value->item->get_raw()->result()								
					);
				}
			}
		}				

		//Response Data		
		$this->response($data, 200);	
	}

	//GET PURCHASE BY VENDOR SUMMARY
	function purchase_by_vendor_summary_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Contact(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		$obj->where_related("contact_type", "parent_id", 2);		
				
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->exists()){
			foreach ($obj as $value) {
				$line = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

				if(!empty($filters) && isset($filters)){			
			    	foreach ($filters as $val) {			    				
			    		$line->where_related("transaction", $val["field"], $val["value"]);			    				    		
					}									 			
				}

				$line->select_sum("amount");
				$line->select_sum("quantity");
				$line->where_related("transaction", "contact_id", $value->id);
				$line->where_related("transaction", "type", "Purchase");
				$line->get();

				if($line->amount>0){
					$data["results"][] = array(
						"id" 			=> $value->id,					
						"name" 			=> $value->company,					
						"unit" 		=> intval($line->quantity),
						"amount" 		=> floatval($line->amount)
					);
				}
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET PURCHASE BY VENDOR SUMMARY
	function purchase_by_vendor_detail_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

		//Sort
		if(!empty($sort) && isset($sort)){					
			foreach ($sort as $value) {
				$obj->order_by($value["field"], $value["dir"]);
			}
		}

		if(!empty($filters) && isset($filters)){			
	    	foreach ($filters as $val) {			    				
	    		$obj->where_related("transaction", $val["field"], $val["value"]);			    				    		
			}									 			
		}		
		
		$obj->include_related('transaction', array('number','type','issued_date'));
		$obj->include_related('transaction/contact', 'company');
		$obj->where_related("transaction", "type", "Purchase");
				
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->exists()){
			foreach ($obj as $value) {				
				$data["results"][] = array(
					"id" 			=> $value->id,
					"item_id" 		=> $value->item_id,
					"issued_date" 	=> $value->invoice_issued_date,
					"number" 		=> $value->invoice_number,
					"type" 			=> $value->invoice_type,										
					"name" 			=> $value->invoice_contact_company,
					"item" 			=> $value->item->get_raw()->result(),
					"unit" 			=> intval($value->quantity),
					"price" 		=> floatval($value->price),					
					"amount" 		=> floatval($value->amount)
				);				
			}
		}		

		//Response Data		
		$this->response($data, 200);	
	}

	//GET SUMMARY
	function summary_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Item(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		    		}else if($value["operator"]=="where_related"){
		    			$obj->where_related($value["model"], $value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_in_related"){
		    			$obj->where_in_related($value["model"], $value["field"], $value["value"]);		    			    		
		    		}else{
		    			$obj->where($value["field"], $value["value"]);
		    		}
	    		}else{	    			
	    			$obj->where($value["field"], $value["value"]);	    				    			
	    		}
			}									 			
		}
				
		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->result_count()>0){
			foreach ($obj as $value) {
				if($value->item_id>0){
					$data["results"][] = array(
						"id" 			=> $value->id,
						"item_id" 		=> $value->item_id,
						"on_hand" 		=> intval($value->on_hand),
						"unit" 			=> intval($value->quantity),
						"cost" 			=> floatval($value->cost),
						"price" 		=> floatval($value->price),
						"amount" 		=> floatval($value->amount),
						"rate" 			=> floatval($value->rate),
						"locale" 		=> $value->locale,
						"movement" 		=> intval($value->movement),											
						
						"invoice" 		=> $value->transaction->get_raw()->result(),						
						"item" 			=> $value->item->get_raw()->result()								
					);
				}
			}
		}				

		//Response Data		
		$this->response($data, 200);	
	}

	//GET MOVEMENT
	function movement_get() {		
		$filters 	= $this->get("filter")["filters"];		
		$page 		= $this->get('page') !== false ? $this->get('page') : 1;		
		$limit 		= $this->get('limit') !== false ? $this->get('limit') : 100;								
		$sort 	 	= $this->get("sort");		
		$data["results"] = [];
		$data["count"] = 0;

		$obj = new Item_line(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);		

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
		    		}else if($value["operator"]=="where_related"){
		    			$obj->where_related($value["model"], $value["field"], $value["value"]);
		    		}else if($value["operator"]=="where_in_related"){
		    			$obj->where_in_related($value["model"], $value["field"], $value["value"]);		    			    		
		    		}else{
		    			$obj->where($value["field"], $value["value"]);
		    		}
	    		}else{	    			
	    			$obj->where($value["field"], $value["value"]);	    				    			
	    		}
			}									 			
		}

		$obj->where_in_related("transaction","type",["Invoice","Cash_Sale","Cash_Purchase","Credit_Purchase"]);
		$obj->where_related("transaction","is_recurring",0);
		$obj->where_related("transaction","deleted",0);
		$obj->order_by_related("transaction", "issued_date", "desc");

		//Results
		$obj->get_paged_iterated($page, $limit);
		$data["count"] = $obj->paged->total_rows;							

		if($obj->exists()){
			foreach ($obj as $value) {
				if($value->item_id>0){
					$data["results"][] = array(
						"id" 			=> $value->id,
						"item_id" 		=> $value->item_id,
						"on_hand" 		=> floatval($value->on_hand),
						"quantity" 		=> floatval($value->quantity),
						"cost" 			=> floatval($value->cost),
						"price" 		=> floatval($value->price),
						"amount" 		=> floatval($value->amount),
						"rate" 			=> floatval($value->rate),
						"locale" 		=> $value->locale,
						"movement" 		=> $value->movement,
						
						"invoice" 		=> $value->transaction->get_raw()->result(),						
						"item" 			=> $value->item->get_raw()->result()								
					);
				}
			}
		}				

		//Response Data		
		$this->response($data, 200);	
	}	


	
}