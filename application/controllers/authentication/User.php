<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Mobiledrs\entities\user_management\Roles_permission_entity;

class User extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'authentication/user_model',
			'user_management/roles_permission_model',
			'user_management/logs_model'
		));

		$this->load->library('twig');
	}

	public function index()
	{
		$this->twig->view('authentication/user');
	}

	public function verify()
	{
		$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE)
        {
        	$this->index();

        	return;
        }

		if ($this->user_model->verify())
		{
			$roles_param = [
				'joins' => [
					[
						'join_table_name' => 'permissions',
						'join_table_key' => 'permissions.permissions_id',
						'join_table_condition' => '=',
						'join_table_value' => 'roles_permission.rp_permissionsID',
						'join_table_type' => 'inner'
					]
				],
				'where' => [
					[
						'key' => 'roles_permission.rp_rolesID',
						'condition' => '=',
						'value' => $this->session->userdata('user_roleID')
					]
				],
				'return_type' => 'object'
			];

			$roles_permissions = $this->roles_permission_model->get_records_by_join($roles_param);

			$roles_permission_entity = new Roles_permission_entity();
			$roles_permission_entity->set_roles_permissions($roles_permissions);

			$this->session->set_userdata(
				'roles_permission_entity', 
				$roles_permission_entity->get_serialized()
			);

			if ($this->session->userdata('user_roleID') != '1') {
				$this->logs_model->insert([
					'data' => [
						'user_log_userID' => $this->session->userdata('user_id'),
						'user_log_time' => date('H:m:s'),
						'user_log_date' => date('Y-m-d'),
						'user_log_description' => 'Log in to the system.'
					]
				]);
			}

			redirect('dashboard');
		}
		else 
		{
			$this->session->set_flashdata(
				'danger', 
				$this->lang->line('danger_authentication_invalid_user')
			);

			redirect('authentication/user');
		}
	}

	public function logout()
	{
		if ($this->session->userdata('user_roleID') != '1') {
			$this->logs_model->insert([
				'data' => [
					'user_log_userID' => $this->session->userdata('user_id'),
					'user_log_time' => date('H:m:s'),
					'user_log_date' => date('Y-m-d'),
					'user_log_description' => 'Log out to the system.'
				]
			]);
		}

		$this->session->sess_destroy();

		redirect('authentication/user');
	}
}