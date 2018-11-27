<?php

class Profile_model extends MY_Model {
	
	protected $table_name = 'user';
	protected $entity = 'User_entity';

	public function __construct()
	{
		parent::__construct();

		$this->load->library('entities/authentication/' . $this->entity);
	}

	public function prepare_data() : array
	{
		return [
			'user_firstname' => $this->input->post('user_firstname'),
			'user_lastname' => $this->input->post('user_lastname'),
			'user_email' => $this->input->post('user_email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'user_roleID' => $this->input->post('user_roleID'),
			'user_dateOfBirth' => $this->input->post('user_dateOfBirth')
		];
	}

	public function prepare_search_data() : array
	{
		return [
			'user_firstname' => $this->input->post('user_firstname'),
			'user_lastname' => $this->input->post('user_lastname'),
			'user_email' => $this->input->post('user_email')
		];
	}
}