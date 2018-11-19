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

	public function add()
	{
		# code...
	}

	public function edit(string $provider_id)
	{
		# code...
	}

	public function save(string $provider_id = '')
	{
		$params = array(
			'check_permission' => 'add_provider',
			'record_id' => $provider_id,
			'table_key' => 'provider_id',
			'save_model' => 'profile_model',
			'redirect_url' => 'provider_management/profile/details/'
		);

		parent::save($params);   
	}

	public function details(string $provider_id)
	{
		# code...
	}

	public function search()
	{
		$params = [
			'check_permission' => 'search_provider',
			'search_model' => 'profile_model'
		];

		$page_data['records'] = parent::search($params);
	}
}