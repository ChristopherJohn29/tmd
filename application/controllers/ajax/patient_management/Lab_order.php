<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Lab_order extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model([
			'patient_management/lab_orders_model',
			'user_management/logs_model'
		]);
	}

	public function delete(string $pt_patientID, string $lab_order_id)
	{
		// $this->check_permission('delete_tr');

		$params = [
			'patient_id' => $pt_patientID,
			'lab_order_id' => $lab_order_id,
		];

		$res = $this->lab_orders_model->deleteLabOrder($params);

		if ($res)
		{
			// if ($this->session->userdata('user_roleID') != '1') {
			// 	$this->logs_model->insert([
			// 		'data' => [
			// 			'user_log_userID' => $this->session->userdata('user_id'),
			// 			'user_log_time' => date('H:m:s'),
			// 			'user_log_date' => date('Y-m-d'),
			// 			'user_log_description' => 'Deletes a patient transaction record.',
			// 			'user_log_link' => 'patient_management/lab_order/edit/'.$pt_patientID.'/'.$lab_order_id
			// 		]
			// 	]);
			// }

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