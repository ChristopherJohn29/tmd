<?php

class Roles_permission_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'roles_permission';
	protected $entity = '\Mobiledrs\entities\user_management\Roles_entity';

	public function __construct()
	{
		parent::__construct();
	}
}