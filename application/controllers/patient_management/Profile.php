<?php

class Profile extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/profile_model' => 'profile_model',
			'home_health_care_management/profile_model' => 'hhcm_profile_model'
		));
	}

	public function index()
	{
		$this->check_permission('list_pt');

		$params = [
			'table_key' => 'patient_dateCreated',
			'order_type' => 'DESC',
			'records_model' => 'profile_model'
		];

		$page_data['records'] = parent::get_latest_records($params);

		$this->twig->view('patient_management/profile/list', $page_data);
	}

	public function add()
	{
		$this->check_permission('add_pt');

		$page_data['hhcm_records'] = $this->hhcm_profile_model->records(['key' => 'hhc_id']);

		$this->twig->view('patient_management/profile/add', $page_data);
	}

	public function edit(string $patient_id)
	{
		$this->check_permission('edit_pt');

		$params = [
			'table_key' => 'patient_id',
        	'record_key' => $patient_id,
        	'record_table' => 'profile_model'
		];

		$page_data['record'] = parent::get_record($params);
		$page_data['hhcm_records'] = $this->hhcm_profile_model->records(['key' => 'hhc_id']);

		$this->twig->view('patient_management/profile/edit', $page_data);
	}

	public function save(string $patient_id = '')
	{
		$this->check_permission('add_pt');

		$params = [
			'record_id' => $patient_id,
			'table_key' => 'patient_id',
			'save_model' => 'profile_model',
			'redirect_url' => 'patient_management/profile'
		];

		parent::save_data($params);
	}

	public function details(string $patient_id)
	{
		$this->check_permission('view_pt');

		$params = [
			'table_key' => 'patient_id',
        	'record_key' => $patient_id,
        	'record_table' => 'profile_model'
		];

		$page_data['record'] = parent::get_record($params);

		$this->twig->view('patient_management/profile/details', $page_data);
	}

	public function search()
	{
		$this->check_permission('search_pt');

		$params = ['search_model' => 'profile_model'];

		$page_data['records'] = parent::search_data($params);

		$this->twig->view('patient_management/profile/search', $page_data);
	}
}