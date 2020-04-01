<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Profile extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'user_management/profile_model'
		));
	}

	public function delete(string $user_id)
	{
		$this->check_permission('delete_user');

		$params = [
			'table_key' => 'user_id',
			'record_id' => $user_id,
			'column_archive' => 'user_archive'
		];

		$res = $this->profile_model->delete_data($params);

		if ($res)
		{
			echo json_encode([
				'state' => true,
				'msg' => $this->lang->line('success_delete')
			]);
		}
		else 
		{
			echo json_encode([
				'state' => false,
				'msg' => $this->lang->line('danger_delete')
			]);
		}
	}
}