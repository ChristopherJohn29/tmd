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
			'joins' => [
				[
					'join_table_name' => 'roles',
					'join_table_key' => 'roles.roles_id',
					'join_table_condition' => '=',
					'join_table_value' => 'user.user_roleID',
					'join_table_type' => 'inner',
				]
			],
			'where' => [
				'key' => 'user_roleID',
				'condition' => '<>',
				'value' => 1
			],
			'return_type' => 'result'
		];
		
		$page_data['records'] = $this->profile_model->get_records_by_join($params);

		$this->twig->view('user_management/profile/list', $page_data);
	}

	public function add()
	{
		$this->check_permission('add_user');

		$params = [
			'where' => [
				'key' => 'roles_id',
				'condition' => '<>',
				'value' => '1'
			]
		];

		$page_data['roles'] = $this->roles_model->records($params);

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
		
		$role_params = [
			'where' => [
				'key' => 'roles_id',
				'condition' => '<>',
				'value' => '1'
			]
		];

		$page_data['roles'] = $this->roles_model->records($role_params);

		$this->twig->view('user_management/profile/edit', $page_data);
	}

	public function save(string $user_id = '')
	{
		$this->check_permission('add_user');

		$params = [
			'record_id' => $user_id,
			'table_key' => 'user_id',
			'save_model' => 'profile_model',
			'redirect_url' => 'user_management/profile'
		];

		parent::save_data($params);
	}

	public function details(string $user_id)
	{
		$this->check_permission('view_user');

		$params = [
			'joins' => [
				[
					'join_table_name' => 'roles',
					'join_table_key' => 'roles.roles_id',
					'join_table_condition' => '=',
					'join_table_value' => 'user.user_roleID',
					'join_table_type' => 'inner',
				]
			],
			'where' => [
				'key' => 'user_id',
				'condition' => '=',
				'value' => $user_id
			],
			'return_type' => 'row'
		];
		
		$page_data['records'] = $this->profile_model->get_records_by_join($params);

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
