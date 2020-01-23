<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Certifications extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('patient_management/CPO_model');
	}

	public function delete(string $patient_id, string $ptcpo_id)
	{
		$this->check_permission('delete_cpo');

		$params = [
			'table_key' => 'ptcpo_id',
			'record_id' => $ptcpo_id,
			'column_archive' => 'ptcpo_archive'
		];

		$res = $this->CPO_model->delete_data($params);

		if ($res)
		{
			if ($this->session->userdata('user_roleID') != '1') {
				$this->logs_model->insert([
					'data' => [
						'user_log_userID' => $this->session->userdata('user_id'),
						'user_log_time' => date('H:m:s'),
						'user_log_date' => date('Y-m-d'),
						'user_log_description' => 'Deletes a patient certification record.',
						'user_log_link' => 'patient_management/CPO/edit/'.$patient_id.'/'.$ptcpo_id
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