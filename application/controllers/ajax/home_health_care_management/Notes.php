<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Notes extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('home_health_care_management/notes_model');
	}

	public function delete(string $hhc_id, string $hhcn_id)
	{
		$this->check_permission('delete_cn');

		$params = [
			'table_key' => 'hhcn_id',
			'record_id' => $hhcn_id,
			'column_archive' => 'hhcn_archive'
		];

		$res = $this->notes_model->delete_data($params);

		if ($res)
		{
			if ($this->session->userdata('user_roleID') != '1') {
				$this->logs_model->insert([
					'data' => [
						'user_log_userID' => $this->session->userdata('user_id'),
						'user_log_time' => date('H:m:s'),
						'user_log_date' => date('Y-m-d'),
						'user_log_description' => 'Deletes a home health care notes record.',
						'user_log_link' => 'home_health_care_management/notes/edit/'.$hhc_id.'/'.$hhcn_id
					]
				]);
			}

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