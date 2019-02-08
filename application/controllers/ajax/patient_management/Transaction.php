<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Transaction extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('patient_management/transaction_model');
	}

	public function delete(string $pt_id)
	{
		$this->check_permission('delete_tr');

		$params = [
			'table_key' => 'pt_id',
			'record_id' => $pt_id
		];

		$res = $this->transaction_model->delete_data($params);

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