<?php

class Roles_model extends MY_Model {
	
	protected $table_name = 'roles';
	protected $entity = '\Mobiledrs\entities\user_management\Roles_entity';

	public function __construct()
	{
		parent::__construct();
	}
}