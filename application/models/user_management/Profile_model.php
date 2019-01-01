<?php

class Profile_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'user';
	protected $entity = '\Mobiledrs\entities\user_management\Profile_entity';
	protected $record_entity = null;
	protected $excludes_list = ['confirm_password'];

	public function __construct()
	{
		parent::__construct();

		$this->record_entity = new \Mobiledrs\entities\user_management\Profile_entity();
	}

	public function prepare_data() : array
	{
		$this->prepare_entity_data();

		return [
			'user_firstname' => $this->record_entity->user_firstname,
			'user_lastname' => $this->record_entity->user_lastname,
			'user_email' => $this->record_entity->user_email,
			'user_password' => $this->record_entity->encrypt_password(),
			'user_roleID' => $this->record_entity->user_roleID
		];
	}
}