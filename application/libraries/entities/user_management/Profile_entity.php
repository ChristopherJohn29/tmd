<?php

require APPPATH . 'libraries/entities/Entity.php';

class Profile_entity extends Entity {
	
	protected $user_id; 
	protected $user_firstname;
	protected $user_lastname;
	protected $user_email;
	protected $user_dateCreated;
	protected $user_password;
	protected $user_roleID;
	protected $user_dateOfBirth;
	protected $roles_id;
	protected $roles_name;

	public function get_fullname() : string
	{
		return $this->user_firstname . ' ' . $this->user_lastname;
	}

	public function encrypt_password() : string
	{
		return password_hash($this->user_password, PASSWORD_BCRYPT);
	}
}