<?php

class User_model extends CI_Model {	
	function __construct()
	{
		parent::__construct();
	}

	public function verify() : bool
	{
		$this->db->select('user_firstname, user_email');

		$this->db->where('user_email', $this->input->post('user_email'));

		$query = $this->db->query('user');

		$res = $query->row_array();

		if (count($res) && password_verify($this->input->post('user_password'), $res['user_password'])) 
		{
			$data = array(
		        'username'  => $res['user_firstname'],
		        'email'     => $res['user_email'],
		        'logged_in' => TRUE
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