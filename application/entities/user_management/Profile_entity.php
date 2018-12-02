<?php

namespace Mobiledrs\entities\user_management;

class Profile_entity extends \Mobiledrs\entities\Entity {
	
	protected $user_id; 
	protected $user_firstname;
	protected $user_lastname;
	protected $user_email;
	protected $user_dateCreated;
	protected $user_password;
	protected $user_roleID;
	protected $user_dateOfBirth;
	protected $user_phone;
	protected $user_address;
	protected $user_gender;
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

	public function set_birthday_format()
	{
		return date_format(date_create($this->user_dateOfBirth), 'Y-m-d');
	}
}