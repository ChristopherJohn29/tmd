<?php

require_once(APPPATH . 'core/MY_Models.php');

class User_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'user';
	protected $entity = '\Mobiledrs\entities\authentication\User_entity';

	public function __construct()
	{
		parent::__construct();
	}

	public function verify() : bool
	{
		$user_params = [
			'where' => [
				[
					'key' => 'user_email',
					'condition' => '=',
					'value' => $this->input->post('user_email')
				],
				[
					'key' => 'user_archive',
					'condition' => '=',
					'value' => NULL
				]
			]
		];

		$user_entity = $this->record($user_params);

		$validate_password = $user_entity->user_id && 
			$user_entity->validate_password($this->input->post('user_password'));

		if ($validate_password)
		{
			$user_record_params = [
				'key' => 'user.user_id',
				'value' => $user_entity->user_id,
				'data' => ['user_sessionID' => session_id()]
			];

			$this->update($user_record_params);

			$data = [
				'user_id' => $user_entity->user_id,
		        'user_fullname' => $user_entity->get_fullname(),
		        'user_email' => $user_entity->user_email,
		        'user_roleID' => $user_entity->user_roleID
			];

			$this->session->set_userdata($data);

			return true;
		}
		else 
		{
			return false;
		}
	}
}