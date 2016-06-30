<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Districts extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('locations/District_model', 'district');	
	}
		
	
	//GET 
	function district_get() {
		$filter = $this->get("filter");
		$limit = $this->get("pageSize");
		$offset = $this->get('skip');
		$sorter = $this->get("sort");

		if(!empty($filter) && isset($filter)){			
			//Filter
			$para = array();				
			for ($i = 0; $i < count($filter['filters']); ++$i) {				
				$para += array($filter['filters'][$i]['field'] => $filter['filters'][$i]['value']);
			}
			
			//Limit
			if(!empty($limit) && isset($limit)){
				$this->district->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->district->order_by($sort);
			}

			$data["results"] = $this->district->get_many_by($para);
			$data["total"] = $this->district->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->district->get_all();
			$data["total"] = $this->district->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function district_post() {	
		$post = array(
			"name" 			=> $this->post("name"),
			"province_id" 	=> $this->post("province_id")
		);
		$id = $this->district->insert($post);
		$data["results"] = $this->district->get($id);

		$this->response($data, 201);	
	}
	
	//PUT
	function district_put() {
 		 $put = array(
			"name" 			=> $this->put("name"),
			"province_id" 	=> $this->put("province_id")
		);
		$result = $this->district->update($this->put('id'), $put);		
		$data = $this->district->get($this->put('id'));
		
		$this->response(array("updated"=>$result, "results"=>$data), 200);
	}
	
	//DELETE
	function district_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$result = $this->district->delete($this->delete('id'));
		$this->response($result, 200);
	}

	//CASCADING
	function district_cascading_get() {
		$filter = $this->get("filter");
		if(!empty($filter) && isset($filter)){
			$data = $this->district->get_many_by("province_id", $filter['filters'][0]['value']);
		}else{
			$data = $this->district->get_all();
		}							
		$this->response($data, 200);
	}
	
}//End Of Class