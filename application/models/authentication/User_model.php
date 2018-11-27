<?php

class User_model extends MY_Model {
	
	protected $table_name = 'user';

	public function __construct()
	{
		parent::__construct();

		$this->load->library('entities/authentication/User');
	}

	public function verify() : bool
	{
		$res = $this->record([
			'key' => 'user_email',
			'value' => $this->input->post('user_email')
		]);

		if (count($res) && password_verify($this->input->post('user_password'), $res['user_password'])) 
		{
			$data = [
		        'user_firstname' => $res['user_firstname'],
		        'user_lastname' => $res['user_lastname'],
		        'user_role_id' => $res['user_roleID'],
		        'user_logged_in' => true
			];

			$this->session->set_userdata($data);

			return true;
		}
		else 
		{
			return false;
		}
	}
}