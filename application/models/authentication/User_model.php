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
		$user_entity = $this->record([
			'key' => 'user_email',
			'value' => $this->input->post('user_email')
		]);

		$validate_password = $user_entity->user_id && 
			$user_entity->validate_password($this->input->post('user_password'));

		if ($validate_password)
		{
			$data = [
				'user_id' => $user_entity->user_id,
		        'user_fullname' => $user_entity->get_fullname(),
		        'user_email' => $user_entity->user_email,
		        'user_roleID' => $user_entity->user_roleID,
		        'user_logged_in' => true
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