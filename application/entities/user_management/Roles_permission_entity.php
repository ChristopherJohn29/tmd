<?php

namespace Mobiledrs\entities\user_management;

class Roles_permission_entity extends \Mobiledrs\entities\Entity {
	
	protected $roles_permissions = [];

	public function set_roles_permissions(array $roles_permissions)
	{
		$this->roles_permissions = $roles_permissions;
	}

	public function has_permission_name(array $permission_names) : bool
	{
		foreach ($this->roles_permissions as $roles_permission) 
		{
			if (in_array($roles_permission->permissions_name, $permission_names))
			{
				return true;
			}
		}

		return false;
	}

	public function has_permission_module(array $permission_modules) : bool
	{
		foreach ($this->roles_permissions as $roles_permission) 
		{
			if (in_array($roles_permission->permissions_module, $permission_modules))
			{
				return true;
			}
		}

		return false;
	}

	public function get_serialized() : string
	{
		return serialize($this);
	}
}