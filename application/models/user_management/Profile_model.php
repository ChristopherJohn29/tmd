<?php

class Profile_model extends CI_Model {	
	function __construct()
	{
		parent::__construct();
	}

	public function save() : array
	{
		$data = [
			'user_firstname' => $this->input->post('user_firstname'),
			'user_middlename' => $this->input->post('user_middlename'),
			'user_lastname' => $this->input->post('user_lastname'),
			'user_email' => $this->input->post('user_email'),
			'user_address' => $this->input->post('user_address'),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'user_roleID' => $this->input->post('user_roleID'),
		];

		return [
			'state' => $this->db->insert('user', $data),
			'id' => $this->db->insert_id()
		];
	}

	public function update(string $userID) : bool
	{
		$data = [
			'user_firstname' => $this->input->post('user_firstname'),
			'user_middlename' => $this->input->post('user_middlename'),
			'user_lastname' => $this->input->post('user_lastname'),
			'user_email' => $this->input->post('user_email'),
			'user_address' => $this->input->post('user_address'),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'user_roleID' => $this->input->post('user_roleID'),
		];

		$this->db->where('user_id', $userID);

		return $this->db->update('user', $data);
	}

	public function records() : array
	{
		$select = 'user_firstname, user_middlename, user_lastname, user_email';

		$this->db->select($select);

		$query = $this->db->get('user');

		return $query->result_array() ?? [];
	}

	public function record(string $userID) : array
	{
		$this->db->where('user_id', $userID);

		$query = $this->db->get('user');

		return $query->row_array() ?? [];
	}

	public function search() : array
	{
		$select = 'user_firstname, user_middlename, user_lastname, user_email';

		$this->db->select($select);
		
		if (!empty($this->input->post('user_firstname'))) {
			$this->db->where('user_firstname', $this->input->post('user_firstname'));
		}

		if (!empty($this->input->post('user_middlename'))) {
			$this->db->where('user_middlename', $this->input->post('user_middlename'));
		}

		if (!empty($this->input->post('user_lastname'))) {
			$this->db->where('user_lastname', $this->input->post('user_lastname'));
		}

		if (!empty($this->input->post('user_email'))) {
			$this->db->where('user_email', $this->input->post('user_email'));
		}

		$query = $this->db->get('user');

		return $query->result_array() ?? [];
	}
}