<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Communication_notes extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('patient_management/communication_notes_model', 'cn_model');
	}

	public function delete(string $cn_patientID, string $cn_id)
	{
		$this->check_permission('delete_cn');

		$params = [
			'table_key' => 'ptcn_id',
			'record_id' => $cn_id,
			'column_archive' => 'ptcn_archive'
		];

		$res = $this->cn_model->delete_data($params);

		if ($res)
		{
			if ($this->session->userdata('user_roleID') != '1') {
				$this->logs_model->insert([
					'data' => [
						'user_log_userID' => $this->session->userdata('user_id'),
						'user_log_time' => date('H:m:s'),
						'user_log_date' => date('Y-m-d'),
						'user_log_description' => 'Deletes a patient communication notes record.',
						'user_log_link' => 'patient_management/communication_notes/edit/'.$cn_patientID.'/'.$cn_id
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