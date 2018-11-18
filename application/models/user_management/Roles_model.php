<?php

class Roles_model extends CI_Model {	
	function __construct()
	{
		parent::__construct();
	}

	public function records() : array
	{
		$query = $this->db->get('roles');

		return $query->result_array() ?? [];
	}
}