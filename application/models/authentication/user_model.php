<?php

class User_model extends My_Model {
	protected $table_name = 'user';

	public function __construct()
	{
		parent::__construct();
	}

	public function verify() : bool
	{
		$res = $this->record([
			'key' => 'user_email',
			'value' => $this->input->post('user_email')
		]);

		if (count($res) && password_verify($this->input->post('user_password'), $res['user_password'])) 
		{
			$data = array(
		        'user_firstname' => $res['user_firstname'],
		        'user_lastname' => $res['user_lastname'],
		        'user_id' => $res['user_id'],
		        'user_logged_in' => true
			);

			$this->session->set_userdata($data);

			return true;
		}
		else 
		{
			return false;
		}
	}
}