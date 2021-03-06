<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Attachments extends REST_Controller {
	public $_database;
	public $server_host;
	public $server_user;
	public $server_pwd;
	public $intitute;
	public $allowedStorage;
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$institute = new Institute();
		$institute->where('id', $this->input->get_request_header('Institute'))->get();
		if($institute->exists()) {
			$conn = $institute->connection->get();
			$this->institute = $conn->id;
			$this->allowedStorage = ceil((($institute->storage_space / 1024) / 1024 ) / 1024);
			$this->server_host = $conn->server_name;
			$this->server_user = $conn->username;
			$this->server_pwd = $conn->password;
			$this->_database = $conn->inst_database;
		}
	}

	//GET
	function index_get() {
		$filter 	= $this->get("filter");
		$page 		= $this->get('page');
		$limit 		= $this->get('limit');
		$sort 	 	= $this->get("sort");
		$data["results"] = [];
		$data["count"] = 0;
		$traNumber = 0;
		$conNumber = 0;
		$traSize = 0;
		$conSize = 0;
		$accountNumber = 0;
		$accountSize = 0;
		$total 	   = 0;
		$gb = 3072;

		$profileImage = new Pimage(null, $this->server_host, $this->server_user, $this->server_pwd, 'banhji');
		$profileImage->where_related('institute', 'id', $this->institute)->get();
		$profileImageSize = 0;
		foreach($profileImage as $image) {
			$profileImageSize = ceil((($image->size) / 1024) / 1024);
		}

		$obj = new Attachment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

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
	    	foreach ($filter['filters'] as $value) {
	    		if(isset($value['operator'])) {
					$obj->{$value['operator']}($value['field'], $value['value']);
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
				//Results
				$attachedTo = array('id' => null, 'name' => null, 'type' => null);
				if($value->contact_id) {
					$c = $value->contact->get();
					$conNumber++;
					$conSize += ceil((($value->size) / 1024) /1024);
					$attachedTo = array('id' => $c->id, 'name' => $c->name, 'type' => 'contact');
				} elseif($value->transaction_id) {
					$t = $value->transaction->get();
					$traNumber++;
					$traSize += ceil((($value->size) / 1024) /1024);
					$attachedTo = array('id' => $t->id, 'name' => $t->number, 'type' => 'transaction', 'go' => $t->type);
				} elseif($value->account_id) {
					$a = $value->account->get();
					$accountNumber++;
					$accountSize += ceil((($value->size) / 1024) /1024);
					$attachedTo = array('id' => $a->id, 'name' => $a->name, 'type' => 'account');
				} else {
					$item = $value->item->get();
					$conNumber++;
					$conSize += ceil((($value->size) / 1024) /1024);
					$attachedTo = array('id' => $item->id, 'name' => $item->name, 'type' => 'item');
				}
				$user = $value->user->get();
				$data["results"][] = array(
					"id" 				=> $value->id,
					"user_id" 			=> $value->user_id,
					"transaction_id" 	=> $value->transaction_id,
					"reference_id" 		=> $value->reference_id,
					"account_id" 		=> $value->account_id,
					"contact_id" 		=> $value->contact_id,
					"item_id" 			=> $value->item_id,
					"type" 				=> $value->type,
					"name" 				=> $value->name,
					"description" 		=> $value->description,
					"key" 				=> $value->key,
					"url" 				=> $value->url,
					"size"				=> (($value->size) / 1024) /1024,
					"user" 				=> $user->exists() ? array('id' => $user->id, 'name' => $user->name):array(),
					'attachedTo'		=> $attachedTo,
					"license_id" 		=> $value->license_id,
					"deleted"			=> $value->deleted,
					"created_at" 		=> $value->created_at,
					"updated_at" 		=> $value->updated_at
				);
			}
		}
		$data['transactionNumber'] = $traNumber;
		$data['contactNumber'] = $conNumber;
		$data['transactionSize'] = $traSize / 1024;
		$data['contactSize'] = $conSize / 1024;
		$data['allowedSize'] = $this->allowedStorage;
		$data['total'] = ($traSize + $conSize + $profileImageSize) / 1024;
		//Response Data
		$this->response($data, 200);
	}

	//POST
	function index_post() {
		$models = json_decode($this->post('models'));

		foreach ($models as $value) {
			$obj = new Attachment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);

			isset($value->user_id) 			? $obj->user_id 		= $value->user_id : "";
			isset($value->transaction_id) 	? $obj->transaction_id 	= $value->transaction_id : "";
			isset($value->reference_id) 	? $obj->reference_id 	= $value->reference_id : "";
			isset($value->account_id) 		? $obj->account_id 		= $value->account_id : "";
			isset($value->contact_id) 		? $obj->contact_id 		= $value->contact_id : "";
			isset($value->item_id) 			? $obj->item_id 		= $value->item_id : "";
			isset($value->type) 			? $obj->type 			= $value->type : "";
			isset($value->name) 			? $obj->name 			= $value->name : "";
			isset($value->description) 		? $obj->description 	= $value->description : "";
			isset($value->key) 				? $obj->key 			= $value->key : "";
			isset($value->url) 				? $obj->url 			= $value->url : "";
			isset($value->license_id) 		? $obj->license_id 		= $value->license_id : "";
			isset($value->deleted) 			? $obj->deleted 		= $value->deleted : "";
			isset($value->size) 			? $obj->size 			= $value->size : "";
			isset($value->created_at) 		? $obj->created_at 		= $value->created_at : "";

			if($obj->save()){
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"user_id" 			=> $obj->user_id,
					"transaction_id" 	=> $obj->transaction_id,
					"reference_id" 		=> $obj->reference_id,
					"account_id" 		=> $obj->account_id,
					"contact_id" 		=> $obj->contact_id,
					"item_id" 			=> $obj->item_id,
					"type" 				=> $obj->type,
					"name" 				=> $obj->name,
					"description" 		=> $obj->description,
					"key" 				=> $obj->key,
					"url" 				=> $obj->url,
					"license_id" 		=> $obj->license_id,
					"deleted"			=> $obj->deleted,
					"created_at" 		=> $obj->created_at,
					"updated_at" 		=> $obj->updated_at
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
			$obj = new Attachment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->get_by_id($value->id);

			isset($value->user_id) 			? $obj->user_id 		= $value->user_id : "";
			isset($value->transaction_id) 	? $obj->transaction_id 	= $value->transaction_id : "";
			isset($value->reference_id) 	? $obj->reference_id 	= $value->reference_id : "";
			isset($value->account_id) 		? $obj->account_id 		= $value->account_id : "";
			isset($value->contact_id) 		? $obj->contact_id 		= $value->contact_id : "";
			isset($value->item_id) 			? $obj->item_id 		= $value->item_id : "";
			isset($value->type) 			? $obj->type 			= $value->type : "";
			isset($value->name) 			? $obj->name 			= $value->name : "";
			isset($value->description) 		? $obj->description 	= $value->description : "";
			isset($value->size) 			? $obj->size 			= $value->size : "";
			isset($value->key) 				? $obj->key 			= $value->key : "";
			isset($value->url) 				? $obj->url 			= $value->url : "";
			isset($value->license_id) 		? $obj->license_id 		= $value->license_id : "";
			isset($value->deleted) 			? $obj->deleted 		= $value->deleted : "";

			if($obj->save()){
				$data["results"][] = array(
					"id" 				=> $obj->id,
					"user_id" 			=> $obj->user_id,
					"transaction_id" 	=> $obj->transaction_id,
					"reference_id" 		=> $obj->reference_id,
					"account_id" 		=> $obj->account_id,
					"contact_id" 		=> $obj->contact_id,
					"item_id" 			=> $obj->item_id,
					"type" 				=> $obj->type,
					"name" 				=> $obj->name,
					"description" 		=> $obj->description,
					"key" 				=> $obj->key,
					"url" 				=> $obj->url,
					"license_id" 		=> $obj->license_id,
					"deleted"			=> $obj->deleted,
					"created_at" 		=> $obj->created_at,
					"updated_at" 		=> $obj->updated_at
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
			$obj = new Attachment(null, $this->server_host, $this->server_user, $this->server_pwd, $this->_database);
			$obj->where("id", $value->id)->get();

			$data["results"][] = array(
				"data"   => $value,
				"status" => $obj->delete()
			);						
		}

		//Response data
		$this->response($data, 200);
	}

}
/* End of file categories.php */
/* Location: ./application/controllers/api/categories.php */
