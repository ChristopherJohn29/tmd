<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'core/MY_AJAX_Controller.php');

class Logs extends \Mobiledrs\core\MY_AJAX_Controller {

    public function __construct()
	{
		parent::__construct();
	}

    public function index()
    {
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
			],
            'limit' => $_GET['length'],
            'offset' => $_GET['start']
        ];

        if ( ! empty($_GET['search']['value'])) {
            $params['whereOr'] = [
                [
                    'key' => 'user_log_description',
                    'condition' => 'LIKE',
                    'value' => '%'.$_GET['search']['value'].'%'
                ],
                [
                    'key' => 'user_log_time',
                    'condition' => 'LIKE',
                    'value' => '%'.$_GET['search']['value'].'%'
                ],
                [
                    'key' => 'user_log_date',
                    'condition' => 'LIKE',
                    'value' => '%'.$_GET['search']['value'].'%'
                ],
                [
                    'key' => 'user_firstname',
                    'condition' => 'LIKE',
                    'value' => '%'.$_GET['search']['value'].'%'
                ],
                [
                    'key' => 'user_lastname',
                    'condition' => 'LIKE',
                    'value' => '%'.$_GET['search']['value'].'%'
                ]
            ];
        }
        
        $logs = $this->logs_model->get_records_by_join($params);

        $totalLogs = $this->logs_model->getTotalLogs();

        $totalFiltered = 0;

        $data = [];

        foreach ($logs as $log) {
            $row[] = $log->user_firstname . ' ' . $log->user_lastname;
            $row[] = $log->get_time_format($log->user_log_time);
            $row[] = $log->get_date_format($log->user_log_date);
            $row[] = $log->user_log_description;

            if ($log->user_log_link) {
                $row[] = '<a href="'.site_url($log->user_log_link).'" target="_blank">
                        <span class="label label-primary">View</span>
                    </a>';
            } else {
                $row[] = '';
            }

            $data[] = $row;

            $totalFiltered += 1;
        }

        $response = [
            "draw" => (int) $_GET['draw'],
            "recordsTotal" => $totalLogs,
            "data" => $data
        ];

        if ( ! empty($_GET['search']['value'])) {
            $response['recordsFiltered'] = $totalFiltered;
        }

        echo json_encode($response);
    }
}