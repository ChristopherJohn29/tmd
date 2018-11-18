<?php

class User_model extends CI_Model {	
	function __construct()
	{
		parent::__construct();
	}

	public function verify() : bool
	{
		$select = 'user_id, user_firstname, user_lastname, user_password';

		$this->db->select($select);

		$this->db->where('user_email', $this->input->post('user_email'));

		$query = $this->db->query('user');

		$res = $query->row_array();

		if (count($res) && password_verify($this->input->post('user_password'), $res['user_password'])) 
		{
			$data = array(
		        'user_firstname' => $res['user_firstname'],
		        'user_lastname' => $res['user_lastname'],
		        'user_id' => $res['user_id'],
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