<?php

namespace Mobiledrs\entities\user_management;

class Roles_entity extends \Mobiledrs\entities\Entity {
	
	protected $roles_id;
	protected $roles_name;

	protected $rp_id;
	protected $rp_rolesID;
	protected $rp_permissionsID;

	protected $permissions_id;
	protected $permissions_name;
	protected $permissions_module;
}