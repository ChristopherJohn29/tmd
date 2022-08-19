<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'user_management/profile_model',
			'user_management/roles_model'
		));
	}

	public function index(string $highlight = '')
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
				[
					'key' => 'user_roleID',
					'condition' => '<>',
					'value' => 1
				],
				[
					'key' => 'user_archive',
					'condition' => '=',
					'value' => NULL
				]
			],
			'return_type' => 'result'
		];

		if($this->session->userdata('user_roleID') == 1){
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
					[
						'key' => 'user_email',
						'condition' => '<>',
						'value' => 'jayson.arcayna@gmail.com'
					],
					[
						'key' => 'user_email',
						'condition' => '<>',
						'value' => 'christopherjohngamo@gmail.com'
					],
					[
						'key' => 'user_archive',
						'condition' => '=',
						'value' => NULL
					]
				],
				'return_type' => 'result'
			];
		}


		
		$page_data['highlight'] = $highlight;
		$page_data['records'] = $this->profile_model->get_records_by_join($params);

		$this->twig->view('user_management/profile/list', $page_data);
	}

	public function add()
	{
		$this->check_permission('add_user');

		$params = [
			'where' => [
				[
					'key' => 'roles_id',
					'condition' => '<>',
					'value' => '1'
				]
			]
		];

		$page_data['roles'] = $this->roles_model->records($params);

		$this->twig->view('user_management/profile/add', $page_data);
	}

	public function edit(string $user_id)
	{
		$this->check_permission('edit_user');

		

		$params = [
			'key' => 'user_id',
        	'value' => $user_id
		];

		$page_data['record'] = $this->profile_model->record($params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		if($this->session->userdata('user_roleID') == 1){
			$role_params = [
				'where' => [
					[
						'key' => 'roles_id',
						'condition' => '<>',
						'value' => '0'
					]
				]
			];
		} else {
			$role_params = [
				'where' => [
					[
						'key' => 'roles_id',
						'condition' => '<>',
						'value' => '1'
					]
				]
			];
		}
		

		$page_data['roles'] = $this->roles_model->records($role_params);

		$this->twig->view('user_management/profile/edit', $page_data);
	}

	public function save(string $formtype, string $user_id = '')
	{
		$this->check_permission('add_user');

		// only check for duplicate emails when the email field has been changed
		$validation_group = '';
		if ($formtype == 'edit')
		{
			$params = [
				'key' => 'user_id',
	        	'value' => $user_id
			];

			$_SERVER["REQUEST_METHOD"] = "POST";
	
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ( $this->upload->do_upload('userFile'))
			{
				$data = $this->upload->data();
				$_POST['user_photo'] = $data['file_name'];
			}

			$user_record = $this->profile_model->record($params);

			if ( ! $user_record)
			{
				redirect('errors/page_not_found');
			}

			if ($user_record->has_changed_email($this->input->post('user_email')))
			{
				$validation_group = 'user_management/profile/save';
			}
			else
			{
				$validation_group = 'user_management/profile/save_update';
			}
		}
		else
		{
			$validation_group = 'user_management/profile/save';

			$_SERVER["REQUEST_METHOD"] = "POST";
	
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ( $this->upload->do_upload('userFile'))
			{
				$data = $this->upload->data();
				$_POST['provider_photo'] = $data['file_name'];
			}
		}

		$params = [
			'record_id' => $user_id,
			'table_key' => 'user_id',
			'save_model' => 'profile_model',
			'redirect_url' => 'user_management/profile',
			'validation_group' => $validation_group
		];

		parent::save_data($params);
	}
}
