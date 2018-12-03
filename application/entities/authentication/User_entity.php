<?php

namespace Mobiledrs\entities\authentication;

class User_entity extends \Mobiledrs\entities\Entity {
	
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

	public function validate_password(string $password) : bool
	{
		return password_verify($password, $this->user_password);
	}

	public function get_fullname() : string
	{
		return $this->user_firstname . ' ' . $this->user_lastname;
	}
}