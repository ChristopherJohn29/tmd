<?php

class Profile extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'home_health_care_management/profile_model'
		));
	}

	public function index()
	{
		$this->check_permission('list_hhc');

		$params = [
			'table_key' => 'hhc_dateCreated',
			'order_type' => 'DESC',
			'records_model' => 'profile_model'
		];

		$page_data['records'] = parent::get_latest_records($params);

		$this->twig->view('home_health_care_management/profile/list', $page_data);
	}

	public function add()
	{
		$this->check_permission('add_hhc');

		$this->twig->view('home_health_care_management/profile/add');
	}

	public function edit(string $hhc_id)
	{
		$this->check_permission('edit_hhc');

		$params = [
			'table_key' => 'hhc_id',
        	'record_key' => $hhc_id,
        	'record_table' => 'profile_model'
		];

		$page_data['record'] = parent::get_record($params);

		$this->twig->view('home_health_care_management/profile/edit', $page_data);
	}

	public function save(string $hhc_id = '')
	{
		$this->check_permission('add_hhc');

		$params = [
			'record_id' => $hhc_id,
			'table_key' => 'hhc_id',
			'save_model' => 'profile_model',
			'redirect_url' => 'home_health_care_management/profile/details/'
		];

		parent::save_data($params);   
	}

	public function details(string $hhc_id)
	{
		$this->check_permission('view_hhc');

		$params = [
			'table_key' => 'hhc_id',
        	'record_key' => $hhc_id,
        	'record_table' => 'profile_model'
		];

		$page_data['record'] = parent::get_record($params);

		$this->twig->view('home_health_care_management/profile/details', $page_data);
	}

	public function search()
	{
		$this->check_permission('search_hhc');

		$params = ['search_model' => 'profile_model'];

		$page_data['records'] = parent::search_data($params);

		$this->twig->view('home_health_care_management/profile/search', $page_data);
	}
}