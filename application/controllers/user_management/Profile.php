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
		
		$params = [
			'table_key' => 'user_dateCreated',
			'order_type' => 'DESC',
			'records_model' => 'profile_model'
		];

		$page_data['records'] = parent::get_latest_records($params);

		$this->twig->view('user_management/profile/list', $page_data);
	}

	public function add()
	{
		$this->check_permission('add_user');

		$page_data['roles'] = $this->roles_model->records();

		$this->twig->view('user_management/profile/add', $page_data);
	}

	public function edit(string $user_id)
	{
		$this->check_permission('edit_user');

		$params = [
			'table_key' => 'user_id',
        	'record_key' => $user_id,
        	'record_table' => 'profile_model'
		];

		$page_data['record'] = parent::get_record($params);
		$page_data['roles'] = $this->roles_model->records();

		$this->twig->view('user_management/profile/edit', $page_data);
	}

	public function save(string $user_id = '')
	{
		$this->check_permission('add_user');

		$params = [
			'record_id' => $user_id,
			'table_key' => 'user_id',
			'save_model' => 'profile_model',
			'redirect_url' => 'user_management/profile/details/'
		];

		parent::save_data($params);
	}

	public function details(string $user_id)
	{
		$this->check_permission('view_user');

		$params = [
			'table_key' => 'profile_model',
        	'record_key' => $user_id,
        	'record_table' => 'profile_model'
		];

		$page_data['record'] = parent::get_record($params);
		$page_data['roles'] = $this->roles_model->records();

		$this->twig->view('user_management/profile/details', $page_data);
	}

	public function search()
	{
		$this->check_permission('add_user');

		$params = ['search_model' => 'profile_model'];

		$page_data['records'] = parent::search_data($params);

		$this->twig->view('user_management/profile/search', $page_data);
	}
}
