<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Route_sheet extends \Mobiledrs\core\MY_AJAX_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'provider_route_sheet_management/route_sheet_model' => 'rs_model',
			'provider_route_sheet_management/Route_sheet_list_model' => 'rs_list_model'
		));
	}

	public function delete(string $prs_id)
	{
		$this->check_permission('delete_prs');

		$rs_list_params = [
			'table_key' => 'prsl_prsID',
			'record_id' => $prs_id
		];

		$rs_params = [
			'table_key' => 'prs_id',
			'record_id' => $prs_id
		];

		$rs_list_model_res = $this->rs_list_model->delete_data($rs_list_params);
		$rs_model_res = $this->rs_model->delete_data($rs_params);

		if ($rs_list_model_res && $rs_model_res)
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