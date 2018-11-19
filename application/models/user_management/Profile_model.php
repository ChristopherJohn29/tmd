<?php

class Profile_model extends My_Model {
	protected $table_name = 'user';

	public function __construct()
	{
		parent::__construct();
	}

	public function prepare_data() : array
	{
		return [
			'user_firstname' => $this->input->post('user_firstname'),
			'user_middlename' => $this->input->post('user_middlename'),
			'user_lastname' => $this->input->post('user_lastname'),
			'user_email' => $this->input->post('user_email'),
			'user_address' => $this->input->post('user_address'),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'user_roleID' => $this->input->post('user_roleID'),
		];
	}

	public function prepare_search_data() : array
	{
		return [
			'user_firstname' => $this->input->post('user_firstname'),
			'user_middlename' => $this->input->post('user_middlename'),
			'user_lastname' => $this->input->post('user_lastname'),
			'user_email' => $this->input->post('user_email')
		];
	}
}