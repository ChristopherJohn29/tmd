<?php

class Profile extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/profile_model',
			'provider_management/supervising_md_model',
			'patient_management/transaction_model',
			'patient_management/communication_notes_model',
			'patient_management/CPO_model',
			'patient_management/POS_model'
		));
	}

	public function index()
	{
		$this->check_permission('list_pt');

		$trans_params = [
			'key' => 'patient_transactions.pt_dateRef',
			'order_by' => 'DESC',
			'where' => [
				[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
					'value' => NULL
				]
			]
		];

		$patients = $this->transaction_model->records($trans_params);

		$page_data['records'] = $this->profile_model->get_pt_profile_trans($patients);
		$page_data['profile_entity'] = new \Mobiledrs\entities\patient_management\pages\Profile_entity();

		$this->twig->view('patient_management/profile/list', $page_data);
	}

	public function add()
	{
		$this->check_permission('add_pt');

		$this->twig->view('patient_management/profile/add', []);
	}

	public function edit(string $patient_id)
	{
		$this->check_permission('edit_pt');

		$record_params = [
			'joins' => [
				[
					'join_table_name' => 'home_health_care',
					'join_table_key' => 'home_health_care.hhc_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient.patient_hhcID',
					'join_table_type' => 'inner'
				]
			],
			'where' => [
				[
					'key' => 'patient_id',
					'condition' => '',
	        		'value' => $patient_id
        		]
			],
			'return_type' => 'row'
		];

		$page_data['record'] = $this->profile_model->get_records_by_join($record_params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$this->twig->view('patient_management/profile/edit', $page_data);
	}

	public function save(string $formtype, string $patient_id = '')
	{
		$this->check_permission('add_pt');

		// only check for duplicate medicare number when the medicare number field has been changed
		$validation_group = '';
		$log = [];
		if ($formtype == 'edit')
		{
			$params = [
				'key' => 'patient_id',
	        	'value' => $patient_id
			];

			$patient_record = $this->profile_model->record($params);

			if ( ! $patient_record)
			{
				redirect('errors/page_not_found');
			}

			if ($patient_record->has_changed_medicareNum($this->input->post('patient_medicareNum')))
			{
				$validation_group = 'patient_management/profile/save';
			}
			else
			{
				$validation_group = 'patient_management/profile/save_update';
			}

			$log = ['description' => 'Updates a patient profile.'];
		}
		else
		{
			$validation_group = 'patient_management/profile/save';

			$log = ['description' => 'Added a new patient profile.'];
		}

		$params = [
			'record_id' => $patient_id,
			'table_key' => 'patient_id',
			'save_model' => 'profile_model',
			'redirect_url_details' => 'patient_management/profile/details/',
			'validation_group' => $validation_group
		];

		parent::save_data($params, false);

		$lastRecordID = $formtype == 'edit' ? $patient_id : $this->db->insert_id();

		if ( ! empty($log) && $this->session->userdata('user_roleID') != '1') {
            $this->logs_model->insert([
                'data' => [
                    'user_log_userID' => $this->session->userdata('user_id'),
                    'user_log_time' => date('H:m:s'),
                    'user_log_date' => date('Y-m-d'),
                    'user_log_description' => $log['description'],
                    'user_log_link' => $params['redirect_url_details'] . $lastRecordID
                ]
            ]);
        }

        return redirect($params['redirect_url_details'] . $lastRecordID);
	}

	public function details(string $patient_id)
	{
		$this->check_permission('view_pt');

		$record_params = [
			'joins' => [
				[
					'join_table_name' => 'home_health_care',
					'join_table_key' => 'home_health_care.hhc_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient.patient_hhcID',
					'join_table_type' => 'inner'
				]
			],
			'where' => [
				[
					'key' => 'patient_id',
					'condition' => '',
	        		'value' => $patient_id
        		]
			],
			'return_type' => 'row'
		];

		$transaction_params = [
			'order' => [
				'key' => 'patient_transactions.pt_dateOfService',
				'by' => 'DESC'
			],
			'joins' => [
				[
					'join_table_name' => 'type_of_visits',
					'join_table_key' => 'type_of_visits.tov_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_tovID',
					'join_table_type' => 'inner'
				],
				[
					'join_table_name' => 'provider',
					'join_table_key' => 'provider.provider_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_providerID',
					'join_table_type' => 'left'
				]
			],
			'where' => [
				[
					'key' => 'patient_transactions.pt_patientID',
					'condition' => '',
	        		'value' => $patient_id
        		],
        		[
					'key' => 'patient_transactions.pt_archive',
					'condition' => '=',
	        		'value' => NULL
        		]
			],
			'return_type' => 'object'
		];

		$communication_params = [
			'joins' => [
				[
					'join_table_name' => 'user',
					'join_table_key' => 'user.user_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_communication_notes.ptcn_notesFromUserID',
					'join_table_type' => 'left'
				]
			],
			'where' => [
				[
					'key' => 'patient_communication_notes.ptcn_patientID',
					'condition' => '',
	        		'value' => $patient_id
        		],
        		[
					'key' => 'patient_communication_notes.ptcn_archive',
					'condition' => '=',
	        		'value' => NULL
        		]
			],
			'key' => 'patient_communication_notes.ptcn_dateCreated',
			'order_by' => 'DESC'
		];

		$cpo_params = [
			'where' => [
				[
					'key' => 'patient_CPO.ptcpo_patientID',
					'condition' => '',
	        		'value' => $patient_id
				],
				[
					'key' => 'patient_CPO.ptcpo_archive',
					'condition' => '=',
	        		'value' => NULL
				]
			],
			'joins' => [
				[
					'join_table_name' => 'user',
					'join_table_key' => 'user.user_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_CPO.ptcpo_addedByUserID',
					'join_table_type' => 'LEFT'
				]
			]
		];

		$page_data['record'] = $this->profile_model->get_records_by_join($record_params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$page_data['transactions'] = $this->supervising_md_model->get_supervisingMD_details(
			$this->transaction_model->get_records_by_join($transaction_params)
		);

		$page_data['communication_notes'] = $this->communication_notes_model->records($communication_params);
		$page_data['cpos'] = $this->CPO_model->get_records_by_join($cpo_params);
		$page_data['transaction_entity'] = new \Mobiledrs\entities\patient_management\pages\Transactions_entity();

		uasort($page_data['cpos'], function($a, $b) {
			$startDateA = explode(' - ', $a->ptcpo_period)[0];
			$startDateB = explode(' - ', $b->ptcpo_period)[0];

			return strtotime($startDateA) < strtotime($startDateB);

		});

		$this->twig->view('patient_management/profile/details', $page_data);
	}

	public function search()
	{
		$this->check_permission('search_pt');

		$page_data['records'] = null;

		if ( ! empty($this->input->post('search_term')))
		{
			$page_data['records'] = $this->profile_model->search();
		}

		$this->twig->view('patient_management/profile/search', $page_data);
	}

	public function print(string $patient_id)
	{
		$record_params = [
			'joins' => [
				[
					'join_table_name' => 'home_health_care',
					'join_table_key' => 'home_health_care.hhc_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient.patient_hhcID',
					'join_table_type' => 'inner'
				],
				[
					'join_table_name' => 'place_of_service',
					'join_table_key' => 'place_of_service.pos_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient.patient_placeOfService',
					'join_table_type' => 'left'
				]
			],
			'where' => [
				[
					'key' => 'patient_id',
					'condition' => '',
	        		'value' => $patient_id
        		]
			],
			'return_type' => 'row'
		];

		$transaction_params = [
			'order' => [
				'key' => 'patient_transactions.pt_dateCreated',
				'by' => 'DESC'
			],
			'joins' => [
				[
					'join_table_name' => 'type_of_visits',
					'join_table_key' => 'type_of_visits.tov_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_tovID',
					'join_table_type' => 'inner'
				],
				[
					'join_table_name' => 'provider',
					'join_table_key' => 'provider.provider_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_providerID',
					'join_table_type' => 'left'
				]
			],
			'where' => [
				[
					'key' => 'patient_transactions.pt_patientID',
					'condition' => '',
	        		'value' => $patient_id
        		]
			],
			'return_type' => 'object'
		];

		$communication_params = [
			'where' => [
				[
					'key' => 'patient_communication_notes.ptcn_patientID',
					'condition' => '',
	        		'value' => $patient_id
        		]
			]
		];

		$cpo_params = [
			'where' => [
				[
					'key' => 'patient_CPO.ptcpo_patientID',
					'condition' => '',
	        		'value' => $patient_id
				]
			]
		];

		$page_data['record'] = $this->profile_model->get_records_by_join($record_params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$page_data['transactions'] = $this->transaction_model->get_records_by_join($transaction_params);
		$page_data['communication_notes'] = $this->communication_notes_model->records($communication_params);
		$page_data['cpos'] = $this->CPO_model->records($cpo_params);
		$page_data['transaction_entity'] = new \Mobiledrs\entities\patient_management\pages\Transactions_entity(); 

		$this->twig->view('patient_management/profile/print', $page_data);
	}

	public function pdf(string $patient_id)
	{
		$record_params = [
			'joins' => [
				[
					'join_table_name' => 'home_health_care',
					'join_table_key' => 'home_health_care.hhc_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient.patient_hhcID',
					'join_table_type' => 'inner'
				]
			],
			'where' => [
				[
					'key' => 'patient_id',
					'condition' => '',
	        		'value' => $patient_id
        		]
			],
			'return_type' => 'row'
		];

		$transaction_params = [
			'order' => [
				'key' => 'patient_transactions.pt_dateCreated',
				'by' => 'DESC'
			],
			'joins' => [
				[
					'join_table_name' => 'type_of_visits',
					'join_table_key' => 'type_of_visits.tov_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_tovID',
					'join_table_type' => 'inner'
				],
				[
					'join_table_name' => 'provider',
					'join_table_key' => 'provider.provider_id',
					'join_table_condition' => '=',
					'join_table_value' => 'patient_transactions.pt_providerID',
					'join_table_type' => 'left'
				]
			],
			'where' => [
				[
					'key' => 'patient_transactions.pt_patientID',
					'condition' => '',
	        		'value' => $patient_id
        		]
			],
			'return_type' => 'object'
		];

		$communication_params = [
			'where' => [
				[
					'key' => 'patient_communication_notes.ptcn_patientID',
					'condition' => '',
	        		'value' => $patient_id
        		]
			]
		];

		$cpo_params = [
			'where' => [
				[
					'key' => 'patient_CPO.ptcpo_patientID',
					'condition' => '',
	        		'value' => $patient_id
				]
			]
		];

		$page_data['record'] = $this->profile_model->get_records_by_join($record_params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$page_data['transactions'] = $this->transaction_model->get_records_by_join($transaction_params);
		$page_data['communication_notes'] = $this->communication_notes_model->records($communication_params);
		$page_data['cpos'] = $this->CPO_model->records($cpo_params);
		$page_data['transaction_entity'] = new \Mobiledrs\entities\patient_management\pages\Transactions_entity(); 

		$html = $this->load->view('patient_management/profile/pdf', $page_data, true);
		$filename = $page_data['record']->patient_name;

		$this->load->library('PDF');

		$this->pdf->page_orientation = 'L';
		$this->pdf->generate($html, $filename);
	}
}