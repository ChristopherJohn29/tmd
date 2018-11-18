<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
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
		$page_data['records'] = $this->profile_model->records();
	}

	public function add()
	{
		$page_data['roles'] = $this->roles_model->records();
	}

	public function edit(string $userID)
	{
		$page_data = [
			'record' => $this->profile_model->record($userID),
			'roles' => $this->roles_model->records()
		];
	}

	public function save()
	{
		$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE)
        {
			$this->add();	

			return;
        }

        $user = $this->profile_model->save();

        if ($user['state']) {
        	$this->session->set_flashdata('success', $this->lang->line('success_save'));
        } else {
        	$this->session->set_flashdata('error', $this->lang->line('error_save'));
        }

        redirect('user_management/profile/details/' . $user['id']);
	}

	public function update(string $userID)
	{
		$this->load->library('form_validation');

		if ($this->form_validation->run() == FALSE)
        {
			$this->edit();	

			return;
        }

        $user = $this->profile_model->update($userID);

        if ($user['state']) {
        	$this->session->set_flashdata('success', $this->lang->line('success_save'));
        } else {
        	$this->session->set_flashdata('error', $this->lang->line('error_save'));
        }

        redirect('user_management/profile/details/' . $user['id']);
	}

	public function details(string $userID)
	{
		$page_data = [
			'record' => $this->profile_model->record($userID),
			'roles' => $this->roles_model->records()
		];
	}

	public function search()
	{
		$page_data['records'] = $this->profile_model->search();
	}
}
