<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends \Mobiledrs\core\MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->check_permission('logs');

		$params = [
			'order' => [
				'key' => 'user_log_id',
				'by' => 'DESC',
			],
			'joins' => [
				[
					'join_table_name' => 'user',
					'join_table_key' => 'user.user_id',
					'join_table_condition' => '=',
					'join_table_value' => 'user_logs.user_log_userID',
					'join_table_type' => 'INNER'
				]
			]
		];

		$page_data['logs'] = $this->logs_model->get_records_by_join($params);

		$this->twig->view('user_management/logs', $page_data);
	}
}