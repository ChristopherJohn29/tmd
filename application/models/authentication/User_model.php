<?php

require_once(APPPATH . 'core/MY_Models.php');

class User_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'user';
	protected $entity = '\Mobiledrs\entities\authentication\User_entity';

	public function __construct()
	{
		parent::__construct();
	}

	public function fetchCookies(){
		$this->db->select('*');
		$this->db->from('cookie_restriction');

		$result = $this->db->get()->result_array();

		return $result;
	}

	public function fetchCookieDetails($id = 0){
		$this->db->select('*');
		$this->db->from('cookie_restriction');
		$this->db->where('id', $id);

		$result = $this->db->get()->result_array();

		return $result;
	}

	public function checkCookie($cookie = ''){

		$this->db->select('*');
		$this->db->where('cookie', $cookie);
		$this->db->where('status', 1);
		$this->db->from('cookie_restriction');

		$result = $this->db->get()->result_array();

		return $result;

	}

	public function addCookie(){

		$query['cookie'] =  $this->input->post('cookie');
		$query['name'] = $this->input->post('name');
		$query['status'] =  $this->input->post('status');

		return $this->db->insert('cookie_restriction', $query);

	}

	public function updateCookie($cookieID = 0){
		$query['cookie'] =  $this->input->post('cookie');
		$query['name'] = $this->input->post('name');
		$query['status'] =  $this->input->post('status');

		$this->db->set($query);
        $this->db->where('id', $cookieID);

		return $this->db->update('cookie_restriction');
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