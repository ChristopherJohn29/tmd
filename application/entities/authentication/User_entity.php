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
	protected $user_sessionID;
	protected $user_archive;

	public function validate_password(string $password) : bool
	{
		return password_verify($password, $this->user_password);
	}

	public function get_fullname() : string
	{
		return $this->user_firstname . ' ' . $this->user_lastname;
	}

	public function not_valid_sessionID(string $sessionID) : bool
	{
		return $this->user_sessionID != $sessionID;
	}
}