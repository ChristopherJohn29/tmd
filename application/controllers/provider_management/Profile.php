<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'provider_management/profile_model'
		));
	}

	public function index()
	{
		$this->check_permission('list_provider');

		$params = [
			'table_key' => 'provider_dateCreated',
			'order_type' => 'DESC',
			'records_model' => 'profile_model'
		];

		$page_data['records'] = parent::get_latest_records($params);
	}

	public function add()
	{
		$this->check_permission('add_provider');
	}

	public function edit(string $provider_id)
	{
		$this->check_permission('edit_provider');

		$params = [
			'table_key' => 'provider_id',
        	'record_key' => $provider_id,
        	'record_table' => 'profile_model'
		];

		$page_data['record'] = parent::get_record($params);
	}

	public function save(string $provider_id = '')
	{
		$this->check_permission('add_provider');

		$params = [
			'record_id' => $provider_id,
			'table_key' => 'provider_id',
			'save_model' => 'profile_model',
			'redirect_url' => 'provider_management/profile/details/'
		];

		parent::save($params);   
	}

	public function details(string $provider_id)
	{
		$this->check_permission('view_provider');

		$params = [
			'table_key' => 'provider_id',
        	'record_key' => $provider_id,
        	'record_table' => 'profile_model'
		];

		$page_data['record'] = parent::get_record($params);
	}

	public function search()
	{
		$this->check_permission('search_provider');

		$params = ['search_model' => 'profile_model'];

		$page_data['records'] = parent::search($params);
	}
}