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

		$rs_params = [
			'table_key' => 'prs_id',
			'record_id' => $prs_id,
			'column_archive' => 'prs_archive'
		];

		$rs_model_res = $this->rs_model->delete_data($rs_params);

		if ($rs_model_res)
		{
			if ($this->session->userdata('user_roleID') != '1') {
				$this->logs_model->insert([
					'data' => [
						'user_log_userID' => $this->session->userdata('user_id'),
						'user_log_time' => date('H:m:s'),
						'user_log_date' => date('Y-m-d'),
						'user_log_description' => 'Deletes a route sheet record.',
						'user_log_link' => 'provider_route_sheet_management/route_sheet/details/'.$prs_id
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

	public function check_provider_routesheet_by_date()
	{
		$newDateFormat = date_format(date_create($this->input->get('dateOfService')), 'Y-m-d');

		$rs_param = [
			'where' => [
				[
					'key' => 'provider_route_sheet.prs_providerID',
					'condition' => '',
					'value' => $this->input->get('providerID')
				],
				[
					'key' => 'provider_route_sheet.prs_dateOfService',
					'condition' => '',
					'value' => $newDateFormat
				],
				[
					'key' => 'provider_route_sheet.prs_archive',
					'condition' => '=',
					'value' => NULL
				],
				[
					'key' => 'provider_route_sheet.is_ca',
					'condition' => '=',
					'value' => NULL
				]
			]
		];

		$provider_routesheet = $this->rs_model->records($rs_param);

		if ($provider_routesheet) {
			echo json_encode([
				'state' => true,
				'msg' => 'The provider "' . $this->input->get('providerName') .'" has a previous routesheet for the selected date of "' . $this->input->get('dateOfService') . '".'
			]);
		}
		else 
		{
			echo json_encode([
				'state' => false,
				'msg' => ''
			]);
		}
	}

	public function check_provider_routesheet_by_date_ca()
	{
		$newDateFormat = date_format(date_create($this->input->get('dateOfService')), 'Y-m-d');

		$rs_param = [
			'where' => [
				[
					'key' => 'provider_route_sheet.prs_providerID',
					'condition' => '',
					'value' => $this->input->get('providerID')
				],
				[
					'key' => 'provider_route_sheet.prs_dateOfService',
					'condition' => '',
					'value' => $newDateFormat
				],
				[
					'key' => 'provider_route_sheet.prs_archive',
					'condition' => '=',
					'value' => NULL
				],
				[
					'key' => 'provider_route_sheet.is_ca',
					'condition' => '=',
					'value' => 1
				]
			]
		];

		$provider_routesheet = $this->rs_model->records($rs_param);

		if ($provider_routesheet) {
			echo json_encode([
				'state' => true,
				'msg' => 'The provider "' . $this->input->get('providerName') .'" has a previous routesheet for the selected date of "' . $this->input->get('dateOfService') . '".'
			]);
		}
		else 
		{
			echo json_encode([
				'state' => false,
				'msg' => ''
			]);
		}
	}
}