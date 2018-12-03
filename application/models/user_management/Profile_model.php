<?php

class Profile_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'user';
	protected $entity = '\Mobiledrs\entities\user_management\Profile_entity';
	protected $profile_entity = null;

	public function __construct()
	{
		parent::__construct();

		$this->profile_entity = new \Mobiledrs\entities\user_management\Profile_entity();
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
			'user_dateOfBirth' => $this->profile_entity->set_date_format(
				$this->profile_entity->user_dateOfBirth),
			'user_phone' => $this->profile_entity->user_phone,
			'user_address' => $this->profile_entity->user_address,
			'user_gender' => $this->profile_entity->user_gender
		];
	}
}