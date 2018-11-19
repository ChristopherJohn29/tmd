<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'user_management/profile_model',
			'user_management/roles_model'
		));
	}

	public function index()
	{
		$this->check_permission('list_user');

		$page_data['records'] = $this->profile_model->records([
			'key' => 'user_dateCreated', 
			'order_by' => 'DESC'
		]);
	}

	public function add()
	{
		$this->check_permission('add_user');

		$page_data['roles'] = $this->roles_model->records();
	}

	public function edit(string $user_id)
	{
		$this->check_permission('edit_user');

		$page_data = [
			'record' => $this->profile_model->record([
				'key' => 'user_id',
	        	'value' => $user_id
			]),
			'roles' => $this->roles_model->records()
		];
	}

	public function save(string $user_id = '')
	{
		$params = array(
			'check_permission' => 'add_user',
			'record_id' => $user_id,
			'table_key' => 'user_id',
			'save_model' => 'profile_model',
			'redirect_url' => 'user_management/profile/details/'
		);

		parent::save($params);
	}

	public function details(string $user_id)
	{
		$this->check_permission('view_user');

		$page_data = [
			'record' => $this->profile_model->record([
				'key' => 'user_id',
	        	'value' => $user_id
			]),
			'roles' => $this->roles_model->records()
		];
	}

	public function search()
	{
		$params = [
			'check_permission' => 'search_user',
			'search_model' => 'profile_model'
		];

		$page_data['records'] = parent::search($params);
	}
}
