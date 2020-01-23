<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Scheduled_holidays extends \Mobiledrs\core\MY_AJAX_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'scheduled_holidays_management/scheduled_holidays_model'
		));
	}

	public function delete(string $sh_id)
	{
		$this->check_permission('scheduled_holidays');

		$params = [
			'table_key' => 'sh_id',
			'record_id' => $sh_id,
			'column_archive' => 'sh_archive'
		];

		$res = $this->scheduled_holidays_model->delete_data($params);

		if ($res)
		{
			if ($this->session->userdata('user_roleID') != '1') {
				$this->logs_model->insert([
					'data' => [
						'user_log_userID' => $this->session->userdata('user_id'),
						'user_log_time' => date('H:m:s'),
						'user_log_date' => date('Y-m-d'),
						'user_log_description' => 'Deletes a scheduled holiday record.',
						'user_log_link' => 'scheduled_holidays_management/scheduled_holidays/edit/'.$sh_id
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

	public function list()
	{
		$this->check_permission('scheduled_holidays');

		$params = [
			'where' => [
				[
					'key' => 'sh_archive',
					'condition' => '=',
					'value' => NULL
				]
			]
		];

		$res = $this->scheduled_holidays_model->records($params);

		$scheduled_holidays = [];
		foreach ($res as $scheduled_holiday) {
			$scheduled_holidays[] = [
				'description' => $scheduled_holiday->sh_description,
				'date' => $scheduled_holiday->sh_date
			];
		}

		if ($res)
		{
			echo json_encode([
				'state' => true,
				'data' => $scheduled_holidays
			]);
		}
		else 
		{
			echo json_encode([
				'state' => false
			]);
		}
	}
}