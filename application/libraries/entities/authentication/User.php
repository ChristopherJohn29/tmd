<?php

require_once APPPATH . 'libraries/entities/Entity.php';

class User extends Entity {
	protected $user_id; 
	protected $user_firstname;
	protected $user_lastname;
	protected $user_email;
	protected $user_dateCreated;
	protected $user_password;
	protected $user_roleID;
	protected $user_dateOfBirth;

	public function encrypt_password(string $notEncrypt_password) : string
	{
		return password_hash($notEncrypt_password, PASSWORD_BCRYPT);
	}

	public function validate_password(string $password) : bool
	{
		return password_hash($password, $this->user_password);
	}
}