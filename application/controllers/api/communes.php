<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Communes extends REST_Controller {
	
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();		
		$this->load->model('locations/Commune_model', 'commune');	
	}
		
	
	//GET 
	function commune_get() {
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
				$this->commune->limit($limit, $offset);
			}			
			
			//Sort
			if(!empty($sorter) && isset($sorter)){			
				$sort = array();
				for ($j = 0; $j < count($sorter); ++$j) {				
					$sort += array($sorter[$j]['field'] => $sorter[$j]['dir']);
				}
				$this->commune->order_by($sort);
			}

			$data["results"] = $this->commune->get_many_by($para);
			$data["total"] = $this->commune->count_by($para);

			$this->response($data, 200);			
		}else{
			$data["results"] = $this->commune->get_all();
			$data["total"] = $this->commune->count_all();
			$this->response($data, 200);
		}			
	}
	
	//POST
	function commune_post() {	
		$post = array(
			"name" 			=> $this->post("name"),			
			"district_id" 	=> $this->post("district_id")					
		);

		$id = $this->commune->insert($post);
		$data["results"] = $this->commune->get($id);

		$this->response($data, 201);		
	}
	
	//PUT
	function commune_put() {
 		$put = array(
			"name" 			=> $this->put("name"),
			"district_id" 	=> $this->put("district_id")
		);
		$result = $this->commune->update($this->put('id'), $put);		
		$data = $this->commune->get($this->put('id'));
		
		$this->response(array("updated"=>$result, "results"=>$data), 200);
	}
	
	//DELETE
	function commune_delete() {
		//$this->response(array("status"=>$this->delete('id')), 200);
		$result = $this->commune->delete($this->delete('id'));
		$this->response($result, 200);
	}

	//CASCADING
	function commune_cascading_get() {
		$filter = $this->get("filter");
		if(!empty($filter) && isset($filter)){
			$data = $this->commune->get_many_by("district_id", $filter['filters'][0]['value']);
		}else{
			$data = $this->commune->get_all();
		}							
		$this->response($data, 200);
	}
		
	
}//End Of Class