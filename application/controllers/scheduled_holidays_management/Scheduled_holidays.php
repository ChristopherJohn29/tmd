<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scheduled_holidays extends \Mobiledrs\core\MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'scheduled_holidays_management/scheduled_holidays_model'
		));
	}

	public function index()
	{
		$this->check_permission('scheduled_holidays');

		$params = [
			'key' => 'scheduled_holidays.sh_date',
			'order_by' => 'DESC',
			'where' => [
				[
					'key' => 'sh_archive',
					'condition' => '=',
					'value' => NULL
				]
			]
		];

		$page_data['scheduledHolidays'] = $this->scheduled_holidays_model->records($params);

		$this->twig->view('scheduled_holidays_management/list', $page_data);
	}

	public function add()
	{
		$this->twig->view('scheduled_holidays_management/add');
	}

	public function edit($sh_id)
	{
		$params = [
			'key' => 'scheduled_holidays.sh_id',
			'value' => $sh_id
		];

		$page_data['scheduledHoliday'] = $this->scheduled_holidays_model->record($params);

		$this->twig->view('scheduled_holidays_management/edit', $page_data);
	}

	public function save(string $formtype, string $sh_id = '')
	{
		$this->check_permission('scheduled_holidays');

		$validation_group = 'scheduled_holidays_management/scheduled_holidays/save';

		if ($formtype == 'edit') {
			$validation_group = 'scheduled_holidays_management/scheduled_holidays/update';
		}

		$params = [
			'record_id' => $sh_id,
			'table_key' => 'sh_id',
			'save_model' => 'scheduled_holidays_model',
			'redirect_url' => 'scheduled_holidays_management/scheduled_holidays',
			'validation_group' => $validation_group
		];

		$log = [];
		if ($formtype == 'edit') {
			$log = ['description' => 'Updates a scheduled holiday record.'];
		} else {
			$log = ['description' => 'Added a new scheduled holiday record.'];
		}

		parent::save_data($params, false);

		$lastRecordID = $formtype == 'edit' ? $sh_id : $this->db->insert_id();

		if ($this->session->userdata('user_roleID') != '1') {
            $this->logs_model->insert([
                'data' => [
                    'user_log_userID' => $this->session->userdata('user_id'),
                    'user_log_time' => date('H:m:s'),
                    'user_log_date' => date('Y-m-d'),
                    'user_log_description' => $log['description'],
                    'user_log_link' => 'scheduled_holidays_management/scheduled_holidays/edit/'.$lastRecordID
                ]
            ]);
        }		

		return redirect($params['redirect_url']); 
	}

	public function scheduled_holidays_date_check($value)
	{
		$params = [
			'where_data' => [
				[
					'key' => 'sh_date',
					'value' => date_format(date_create($value), 'Y-m-d')
				]
			]
		];

		$res = $this->scheduled_holidays_model->find($params);

		if ($res)
        {
            $this->form_validation->set_message(
            	'scheduled_holidays_date_check', 
            	'The date already exists.'
            );

            return FALSE;
        }
        else
        {
            return TRUE;
        }
	}
}