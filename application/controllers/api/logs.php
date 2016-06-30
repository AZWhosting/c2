<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); //disallow direct access to this file

require APPPATH.'/libraries/REST_Controller.php';

class Logs extends REST_Controller {
	public $entity;
	//CONSTRUCTOR
	function __construct() {
		parent::__construct();
		$institute = new Institute();
		$institute->where('id', $this->input->get_request_header('Entity'))->get();
		if($institute->exists()) {
			$conn = $institute->connection->get();
			// $this->entity = $conn->server_name;
			// $this->user = $conn->user;
			// $this->pwd = $conn->password;	
			$this->entity = $conn->inst_database;
		}
	}

	public function index_get() {
		$requested_data = $this->get('filter');
		$filters = $requested_data['filters'];
		$limit = $this->get('limit');
		$page= $this->get('page');
		$related = array();
		$data = array();
		$this->benchmark->mark('benchmark_start');
		$logs = new Log(null, $this->entity);
		if(isset($filters)) {
			foreach($filters as $f) {
				$logs->where($f['field'], $f['value']);
			}
		}
		$logs->get_paged($page, $limit);
		if($logs->exists()) {
			foreach($logs as $log) {
				if($log->type === 'purchase' || $log->type === 'expense') {
					$bills = new Bill(null, $this->entity);
					$bills->where('id', $log->type_id)->limit(1)->get();
					if($bills->exists()) {
						foreach($bills as $bill) {
							$related = array(
								'id' => $bill->id,
								'voucher' => $bill->voucher
							);
						}
					}
				} else if($log->type === 'gl' || $log->type === 'adj') {
					$bills = new Journal(null, $this->entity);
					$bills->where('id', $log->type_id)->limit(1)->get();
					if($bills->exists()) {
						foreach($bills as $bill) {
							$related = array(
								'id' => $bill->id,
								'voucher' => $bill->voucher
							);
						}
					}
				} else if($log->type === 'pmt') {
					$bills = new Payment(null, $this->entity);
					$bills->where('id', $log->type_id)->limit(1)->get();
					if($bills->exists()) {
						foreach($bills as $bill) {
							$related = array(
								'id' => $bill->id,
								'voucher' => $bill->voucher
							);
						}
					}
				} else if($log->type === 'deposit') {
					$bills = new Deposit(null, $this->entity);
					$bills->where('id', $log->type_id)->limit(1)->get();
					if($bills->exists()) {
						foreach($bills as $bill) {
							$related = array(
								'id' => $bill->id
							);
						}
					}
				} else if($log->type === 'Receipt') {
					$bills = new Invoice(null, $this->entity);
					$bills->where('id', $log->type_id)->limit(1)->get();
					if($bills->exists()) {
						foreach($bills as $bill) {
							$related = array(
								'id' => $bill->id,
								'voucher' => $bill->number
							);
						}
					}
				}
				$data[] = array(
					'action' => $log->action,
					'type' 	 => $log->type,
					'related'=> $related
				);
			}
			$this->benchmark->mark('benchmark_end');
			$this->response(
				array(
					'error'=> FALSE, 
					'results'=> $data, 
					'msg' => 'no result found',
					'count' => $logs->paged->total_rows,
					'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
				),
				200
			);
		} else {
			$this->benchmark->mark('benchmark_end');
			$this->response(
				array(
					'error'=> TRUE, 
					'results'=> array(), 
					'msg' => 'no result found',
					'count' => 0,
					'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
				),
				200
			);
		}
	}

	public function index_post() {
		$requested_data = json_decode($this->post('models'));
		$data = array();
		$logs = new Log(null, $this->entity);

		$this->benchmark->mark('benchmark_start');
		foreach($requested_data as $data) {
			$logs->action 	= $data->action;
			$logs->type 	= $data->type;
			$logs->type_id 	= $data->related->id;
			if($logs->save()) {
				$data[] = array(
					'action' => $log->action,
					'type' 	 => $log->type,
					'related'=> $data->related->id
				);
			}
		}

		$this->benchmark->mark('benchmark_end');
		if(count($data) > 0) {
			$this->response(
				array(
					'error'=> FALSE, 
					'results'=> $data, 
					'msg' => 'no result found',
					'count' => count($data),
					'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
				),
				200
			);
		} else {
			$this->response(
				array(
					'error'=> TRUE, 
					'results'=> array(), 
					'msg' => 'no result found',
					'count' => 0,
					'generatedIn'=>$this->benchmark->elapsed_time('benchmark_start', 'benchmark_end')
				),
				200
			);
		}
	}
}

/* End of file auth.php */
/* Location: ./application/controller/api/role.php */