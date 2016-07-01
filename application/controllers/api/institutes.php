<?php defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH.'/libraries/REST_Controller.php';

class Institutes extends REST_Controller {
	public function index_get() {
		$requested_data = $this->get("filter");
		$filters = $requested_data['filters'];
		$limit = $this->get('limit') ? $this->get('limit'): 50;
		$offset= $this->get('offset')? $this->get('offset'): null;

		$institute = new Institute();
		$institute->limit($limit, $offset);
		if(isset($filters)) {
			foreach($filters as $f) {
				$institute->where($f['field'], $f['value']);
			}
			// $institute->get_paged($page, $limit);
			$institute->get();
			if($institute->exists()) {
				foreach($institute as $i) {
					// $industry = $i->industry->get();
					$data[] = array(
						'id' => $i->id,
						'name' => $i->name,
						'email'=> $i->email,
						'address'=> $i->address,
						'logo' => $i->logo,
						'description' => $i->description,
						'country' => array('id' => $i->country_id),
						'province' => array('id' => $i->province_id),
						'industry'=> array('id' => $i->industry_id),
						'tax_regime' => $i->tax_regime,
						'type' => array('id' => $i->type_id),
						'locale' => $i->locale,
						'report_locale' => $i->report_locale,
						'vat_no' => $i->vat_number,
						'date_founded' => $i->year_founded,
						'fiscal_date' => $i->fiscal_date,
						'financial_year' => $i->financial_year,
						'financial_report_date' => $i->financial_report_date,
						'legal_name' => $i->legal_name,
						'is_local' => $i->is_local === 'true' ? TRUE:FALSE
					);
				}
				$this->response(
					array('error' => false, 'msg' => 'data found', 'results'=>$data, 'count'=>count($data)), 200);
			} else {		
				$this->response(
					array('error' => false, 'msg' => 'no user found', 'results'=>array(), 'count'=>0), 200);
			}	
		} else {
			$this->response(array('error' => true, 'msg' => 'no filter', 'results'=>array(), 'count'=>0), 200);
		}
	}

	public function index_post() {
		$posted_data = json_decode($this->post('models'));

		foreach($posted_data as $d) {
			$company = new Institute();
			$company->industry_id = $d->industry->id;
			$company->name = $d->name;
			$company->email= $d->email;
			$company->address = $d->address;
			$company->logo = $d->logo;
			$company->description = $d->description;
			$company->country_id = $d->country->id;
			$company->province_id = $d->province->id;
			$company->type_id = $d->type->id;
			$company->year_founded = $d->date_founded;
			$company->legal_name = $d->legal_name;
			$company->fiscal_date = $d->fiscal_date;
			$company->locale = $d->locale->locale;
			$company->tax_regime = $d->tax_regime->code;
			$company->vat_number = $d->vat_no;
			$company->report_locale = $d->report_locale->locale;
			$company->is_local = $d->is_local;
			$company->deleted = 'false';

			$login = new Login();
			$login->where('id', $d->login)->get();
			$module = new Module();
			$module->where('is_core', 'true')->get();
			if($company->save(array($login, $module))) {
				$data[] = array(
					'id' => $company->id,
					'name' => $company->name,
					'email'=> $company->email,
					'address'=> $company->address,
					'logo' => $company->logo,
					'description' => $company->description,
					'country' => array('id' => $company->country_id),
					'province' => array('id' => $company->province_id),
					'industry'=> array('id' => $company->industry_id),
					'tax_regime' => $company->tax_regime,
					'type' => array('id' => $company->type_id),
					'locale' => $company->locale,
					'report_locale' => $company->report_locale,
					'vat_no' => $company->vat_number,
					'date_founded' => $company->year_founded,
					'fiscal_date' => $company->fiscal_date,
					'financial_year' => $company->financial_year,
					'financial_report_date' => $company->financial_report_date,
					'legal_name' => $company->legal_name,
					'is_local' => $company->is_local === 'true' ? TRUE:FALSE
				);
			}
		}
		if(isset($data)) {
			$this->response(
				array(
					'error'  => false,
					'count' => count($data),
					'results'=> $data
				),
				201
			);
		} else {
			$this->response(
				array(
					'error'  => true,
					'count' => 0,
					'results'=> array()					
				),
				200
			);
		}
	}

	public function index_put() {
		$posted_data = json_decode($this->put('models'));

		foreach($posted_data as $d) {
			$company = new Institute();
			$company->where('id', $d->id)->get();
			if($company->exists()) {
				$company->industry_id = $d->industry->id;
				$company->name = $d->name;
				$company->email= $d->email;
				$company->address = $d->address;
				$company->logo = $d->logo;
				$company->description = $d->description;
				$company->country_id = $d->country->id;
				$company->province_id = $d->province->id;
				$company->type_id = $d->type->id;
				$company->year_founded = $d->date_founded;
				$company->legal_name = $d->legal_name;
				$company->fiscal_date = $d->fiscal_date;
				$company->locale = $d->locale;
				$company->tax_regime = $d->tax_regime;
				$company->vat_number = $d->vat_no;
				$company->logo = $d->logo;
				$company->financial_year = $d->financial_year;
				$company->is_local = $d->is_local;
				$company->report_locale = $d->report_locale;
				$company->type_id = $d->type->id;
				if($company->save()){
					$data[] = $d;
				}
			}
		}
		if(isset($data)) {
			$this->response(
				array(
					'error'  => false,
					'count' => count($data),
					'results'=> $data,
				),
				201
			);
		} else {
			$this->response(
				array(
					'error'  => true,
					'count' => 0,
					'results'=> array()					
				),
				200
			);
		}
	}

	public function index_delete() {
		$posted_data = json_decode($this->delete('models'));

		foreach($posted_data as $d) {
			$company = new Institute();
			$company->where('id', $d->id)->get();
			$company->deleted = 'true';
			if($company->save()){
				$data[] = $d;
			}
		}
		if(isset($data)) {
			$this->response(
				array(
					'error'  => false,
					'count' => count($data),
					'results'=> $data,
					'upload'=> $this->upload->data()
				),
				201
			);
		} else {
			$this->response(
				array(
					'error'  => true,
					'count' => 0,
					'results'=> array()					
				),
				200
			);
		}
	}

	public function types_get() {
		$requested_data = $this->get("filter");
		$filters = $requested_data['filters'];

		$types = new Institute_type();
		// foreach($filters as $filter) {
		// 	$types->where($filter['field'], $filter['value']);
		// }

		$types->get();
		if($types->exists()) {
			foreach($types as $type) {
				$data[] = array(
					'id'		=> $type->id,
					'country_id' 	=> $type->country_id,
					'name' 		=> $type->type
				);
			}
			$this->response(array('results' => $data, 'count' => count($data), 'error' => FALSE), 200);
		} else {
			$this->response(array('results' => array(), 'count' => 0, 'error' => TRUE), 200);
		}
	}
}