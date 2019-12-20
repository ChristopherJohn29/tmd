<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Transaction extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model([
			'patient_management/transaction_model',
			'user_management/logs_model'
		]);
	}

	public function delete(string $pt_patientID, string $pt_id)
	{
		$this->check_permission('delete_tr');

		$params = [
			'table_key' => 'pt_id',
			'record_id' => $pt_id,
			'column_archive' => 'pt_archive'
		];

		$res = $this->transaction_model->delete_data($params);

		if ($res)
		{
			if ($this->session->userdata('user_roleID') != '1') {
				$this->logs_model->insert([
					'data' => [
						'user_log_userID' => $this->session->userdata('user_id'),
						'user_log_time' => date('H:m:s'),
						'user_log_date' => date('Y-m-d'),
						'user_log_description' => 'Deletes a patient transaction record.',
						'user_log_link' => 'patient_management/transaction/edit/'.$pt_patientID.'/'.$pt_id
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

	public function mark_service_paid(string $pt_patientID, string $pt_id)
	{
		$this->check_permission('mark_service_paid');

		$params = [
			'key' => 'pt_id',
			'value' => $pt_id,
			'data' => [
				'pt_service_billed' => date('Y-m-d')
			]
		];

		$res = $this->transaction_model->update($params);

		if ($res)
		{
			if ($this->session->userdata('user_roleID') != '1') {
				$this->logs_model->insert([
					'data' => [
						'user_log_userID' => $this->session->userdata('user_id'),
						'user_log_time' => date('H:m:s'),
						'user_log_date' => date('Y-m-d'),
						'user_log_description' => 'Mark as Service Paid for patient transaction record.',
						'user_log_link' => 'patient_management/transaction/edit/'.$pt_patientID.'/'.$pt_id
					]
				]);
			}

			echo json_encode([
				'state' => true,
				'msg' => $this->lang->line('success_paid')
			]);
		}
		else 
		{
			echo json_encode([
				'state' => false,
				'msg' => $this->lang->line('danger_paid')
			]);
		}
	}
}