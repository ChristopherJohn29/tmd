<?php

class AclMock {
	private $access_list = [
		'testPermission'
	];

	public function has_permission(string $role_id, string $permission_name)
	{
		return in_array($permission_name, $this->access_list);
	}
}