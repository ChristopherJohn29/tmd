<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Certifications extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('patient_management/CPO_model');
	}

	public function delete(string $ptcpo_id)
	{
		$this->check_permission('delete_cpo');

		$params = [
			'table_key' => 'ptcpo_id',
			'record_id' => $ptcpo_id
		];

		$res = $this->CPO_model->delete_data($params);

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