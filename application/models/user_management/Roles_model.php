<?php

class Roles_model extends MY_Model {
	
	protected $table_name = 'roles';
	protected $entity = 'Roles_entity';

	public function __construct()
	{
		parent::__construct();

		$this->load->library('entities/user_management/' . $this->entity);
	}
}