<?php

class Profile_model extends MY_Model {
	
	protected $table_name = 'user';
	protected $entity = '\Mobiledrs\entities\user_management\Profile_entity';

	public function __construct()
	{
		parent::__construct();
	}

	public function prepare_data() : array
	{
		foreach($this->input->post() as $key => $value)
		{
			if ($key == 'confirm_password')
			{
				continue;
			}

			$this->profile_entity->$key = $value;
		}

		return [
			'user_firstname' => $this->profile_entity->user_firstname,
			'user_lastname' => $this->profile_entity->user_lastname,
			'user_email' => $this->profile_entity->user_email,
			'user_password' => $this->profile_entity->encrypt_password(),
			'user_roleID' => $this->profile_entity->user_roleID,
			'user_dateOfBirth' => $this->profile_entity->user_dateOfBirth
		];
	}

	public function prepare_search_data() : array
	{
		return [
			'user_firstname' => $this->input->post('user_firstname'),
			'user_lastname' => $this->input->post('user_lastname'),
			'user_email' => $this->input->post('user_email')
		];
	}
}