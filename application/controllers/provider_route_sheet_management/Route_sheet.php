<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route_sheet extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'provider_route_sheet_management/route_sheet_model' => 'rs_model',
			'provider_route_sheet_management/Route_sheet_list_model' => 'rs_list_model',
			'patient_management/Type_visit_model' => 'tov_model',
			'patient_management/Profile_model' => 'pt_model',
			'patient_management/transaction_model' => 'pat_trans_model',
			'provider_management/profile_model' => 'pr_model',
			'provider_management/supervising_md_model' => 'pr_supervisingMD_model'
		));

		$this->load->library('Time_converter');
	}

	public function index(string $is_ca = '')
	{
		$this->check_permission('list_prs');

		if($is_ca == 'ca'){
		
		}

		$params = [
			'joins' => [
				[
					'join_table_name' => 'provider',
					'join_table_key' => 'provider.provider_id',
					'join_table_condition' => '=',
					'join_table_value' => 'provider_route_sheet.prs_providerID',
					'join_table_type' => 'inner'
				]
			],
			'order' => [
				'key' => 'provider_route_sheet.prs_dateOfService',
				'by' => 'DESC'
			],
			'where' => [
				[
					'key' => 'provider_route_sheet.prs_archive',
					'condition' => '=',
	        		'value' => NULL
        		]
			],
			'return_type' => 'object'
		];

		if($is_ca == 'ca'){
			$params['where'][] = 
			[
				'key' => 'provider_route_sheet.is_ca',
				'condition' => '=',
				'value' => 1
			];
		} else {
			$params['where'][] = 
			[
				'key' => 'provider_route_sheet.is_ca',
				'condition' => '=',
				'value' => NULL
			];
		}
		

		$page_data['records'] = $this->rs_model->get_records_by_join($params);
		$page_data['routesheet_entity'] = new \Mobiledrs\entities\provider_route_sheet_management\Routesheet_entity();

		if($is_ca == 'ca'){
			$this->twig->view('provider_route_sheet_management/route_sheet/ca/list', $page_data);
		} else {
			$this->twig->view('provider_route_sheet_management/route_sheet/list', $page_data);
		}

	
	}

	public function add(string $is_ca = '')
	{
		$this->check_permission('add_prs');

		$supervisingMDs = $this->pr_supervisingMD_model->supervisingMD_records(); 

		if($is_ca == 'ca') {
			$this->twig->view('provider_route_sheet_management/route_sheet/ca/add', [
				'current_date' => date('Y-m-d'),
				'supervisingMDs' => $supervisingMDs
			]);
		} else {
			$this->twig->view('provider_route_sheet_management/route_sheet/add', [
				'current_date' => date('Y-m-d'),
				'supervisingMDs' => $supervisingMDs
			]);
		}

		
	}

	public function edit(string $prs_id, string $is_ca = '')
	{
		$this->check_permission('edit_prs');

		$record_params = [
			'joins' => [
				[
					'join_table_name' => 'provider',
					'join_table_key' => 'provider.provider_id',
					'join_table_condition' => '=',
					'join_table_value' => 'provider_route_sheet.prs_providerID',
					'join_table_type' => 'inner'
				]
			],
			'where' => [
				[
					'key' => 'provider_route_sheet.prs_id',
					'condition' =>  '=',
					'value' => $prs_id
				]
			],
			'return_type' => 'row'
		];

		if($is_ca == 'ca'){
			$record_params['where'][] = 
			[
				'key' => 'provider_route_sheet.is_ca',
				'condition' => '=',
				'value' => 1
			];
		} else {
			$record_params['where'][] = 
			[
				'key' => 'provider_route_sheet.is_ca',
				'condition' => '=',
				'value' => NULL
			];
		}

		if($is_ca == 'ca'){
		$lists_params = [
			'joins' => [
				[
					'join_table_name' => 'patient',
					'join_table_key' => 'patient.patient_id',
					'join_table_condition' => '=',
					'join_table_value' => 'provider_route_sheet_list.prsl_patientID',
					'join_table_type' => 'inner'
				],
				[
					'join_table_name' => 'home_health_care',
					'join_table_key' => 'home_health_care.hhc_id',
					'join_table_condition' => '=',
					'join_table_value' => 'provider_route_sheet_list.prsl_hhcID',
					'join_table_type' => 'inner'
				],
				[
					'join_table_name' => 'type_of_visits',
					'join_table_key' => 'type_of_visits.tov_id',
					'join_table_condition' => '=',
					'join_table_value' => 'provider_route_sheet_list.prsl_tovID',
					'join_table_type' => 'inner'
				],
				[
					'join_table_name' => 'patient_transactions',
					'join_table_key' => 'patient_transactions.pt_id',
					'join_table_condition' => '=',
					'join_table_value' => 'provider_route_sheet_list.prsl_patientTransID',
					'join_table_type' => 'inner'
				]
			],
			'where' => [
				[
					'key' => 'provider_route_sheet_list.prsl_prsID',
					'condition' =>  '=',
					'value' => $prs_id
				]
			],
			'return_type' => 'object'
		];} else {
			$lists_params = [
				'joins' => [
					[
						'join_table_name' => 'patient',
						'join_table_key' => 'patient.patient_id',
						'join_table_condition' => '=',
						'join_table_value' => 'provider_route_sheet_list.prsl_patientID',
						'join_table_type' => 'inner'
					],
					[
						'join_table_name' => 'patient_transactions',
						'join_table_key' => 'patient_transactions.pt_id',
						'join_table_condition' => '=',
						'join_table_value' => 'provider_route_sheet_list.prsl_patientTransID',
						'join_table_type' => 'inner'
					],
					[
						'join_table_name' => 'home_health_care',
						'join_table_key' => 'home_health_care.hhc_id',
						'join_table_condition' => '=',
						'join_table_value' => 'patient_transactions.patient_hhcID',
						'join_table_type' => 'left'
					],
					[
						'join_table_name' => 'type_of_visits',
						'join_table_key' => 'type_of_visits.tov_id',
						'join_table_condition' => '=',
						'join_table_value' => 'provider_route_sheet_list.prsl_tovID',
						'join_table_type' => 'inner'
					],
					
				],
				'where' => [
					[
						'key' => 'provider_route_sheet_list.prsl_prsID',
						'condition' =>  '=',
						'value' => $prs_id
					]
				],
				'return_type' => 'object'
			];

		}

		if($is_ca == 'ca'){
			$lists_params['where'][] = 
			[
				'key' => 'provider_route_sheet_list.is_ca',
				'condition' => '=',
				'value' => 1
			];
		} else {
			$lists_params['where'][] = 
			[
				'key' => 'provider_route_sheet_list.is_ca',
				'condition' => '=',
				'value' => NULL
			];
		}

		$tov_params = [
			'where' => [
				[
					'key' => 'type_of_visits.tov_id',
					'condition' => '<>',
					'value' => '5'
				],
				[
					'key' => 'type_of_visits.tov_id',
					'condition' => '<>',
					'value' => '6'
				]
			]
		];

		$page_data['record'] = $this->rs_model->get_records_by_join($record_params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$page_data['lists'] = $this->rs_list_model->get_records_by_join($lists_params);
		$page_data['tovs'] = $this->tov_model->records($tov_params);
		$page_data['current_date'] = date('Y-m-d');

		$page_data['supervisingMDs'] = $this->pr_supervisingMD_model->supervisingMD_records(); 

		if($is_ca == 'ca'){
			$this->twig->view('provider_route_sheet_management/route_sheet/ca/edit', $page_data);
		} else {
			$this->twig->view('provider_route_sheet_management/route_sheet/edit', $page_data);
		}


		
	}

	public function save(string $formtype, string $prs_id = '')
	{
		$this->check_permission('add_prs');

		// check first if the provider has already been created
		// a route sheet for the same day

		$is_ca = $this->input->post('is_ca') ? $this->input->post('is_ca') : '';
		if ($formtype == 'add')
		{
			$entity = new \Mobiledrs\entities\Entity();

			$provider_route_sheet_params = [
				'where' => [
					[
						'key' => ' provider_route_sheet.prs_providerID',
						'condition' => '=',
						'value' => $this->input->post('prs_providerID')
					],
					[
						'key' => ' provider_route_sheet.prs_archive',
						'condition' => '',
						'value' => 'IS NOT NULL'
					],
					[
						'key' => ' provider_route_sheet.prs_dateOfService',
						'condition' => '=',
						'value' => $entity->set_date_format($this->input->post('prs_dateOfService'))
					]
				]
			];

			$provider_route_sheets = $this->rs_model->records($provider_route_sheet_params);

			if (count($provider_route_sheets))
			{
				$this->session->set_flashdata('danger', $this->lang->line('danger_routesheet_duplication_provider_sameday'));

				return (! empty($prs_id)) ? $this->edit($prs_id) : $this->add();
			}
		}

		

		$params = [
			'record_id' => $prs_id,
			'table_key' => 'provider_route_sheet.prs_id',
			'save_model' => 'rs_model',
			
			'validation_group' => 'provider_route_sheet_management/route_sheet/save'
		];

		if ($is_ca == 1){
			$params['redirect_url'] = 'provider_route_sheet_management/route_sheet/index/ca';
		} else {
			$params['redirect_url'] = 'provider_route_sheet_management/route_sheet';
		}
		

		parent::save_data($params);
	}

	public function details(string $prs_id, string $is_ca = '')
	{
		$this->check_permission('view_prs');

		
		$page_data = $this->get_routesheet_details_data($prs_id, $is_ca);

		if ($is_ca == 'ca'){
			$this->twig->view('provider_route_sheet_management/route_sheet/ca/details', $page_data);
		} else {
			$this->twig->view('provider_route_sheet_management/route_sheet/details', $page_data);
		}

	
	}

	public function print(string $prs_id, string $is_ca = '')
	{
		$this->check_permission('print_prs');
		
		$page_data = $this->get_routesheet_details_data($prs_id, $is_ca);

		$this->twig->view('provider_route_sheet_management/route_sheet/print', $page_data);
	}

	private function get_routesheet_details_data(string $prs_id, string $is_ca = '') : array
	{
		$record_params = [
			'joins' => [
				[
					'join_table_name' => 'provider',
					'join_table_key' => 'provider.provider_id',
					'join_table_condition' => '=',
					'join_table_value' => 'provider_route_sheet.prs_providerID',
					'join_table_type' => 'inner'
				]
			],
			'where' => [
				[
					'key' => 'provider_route_sheet.prs_id',
					'condition' =>  '=',
					'value' => $prs_id
				]
			],
			'return_type' => 'row'
		];

		if($is_ca == 'ca'){
			$record_params['where'][] = 
			[
				'key' => 'provider_route_sheet.is_ca',
				'condition' => '=',
				'value' => 1
			];
		} else {
			$record_params['where'][] = 
			[
				'key' => 'provider_route_sheet.is_ca',
				'condition' => '=',
				'value' => NULL
			];
		}
		
		if($is_ca == 'ca'){
			$lists_params = [
				'joins' => [
					[
						'join_table_name' => 'patient',
						'join_table_key' => 'patient.patient_id',
						'join_table_condition' => '=',
						'join_table_value' => 'provider_route_sheet_list.prsl_patientID',
						'join_table_type' => 'inner'
					],
					[
						'join_table_name' => 'home_health_care',
						'join_table_key' => 'home_health_care.hhc_id',
						'join_table_condition' => '=',
						'join_table_value' => 'provider_route_sheet_list.prsl_hhcID',
						'join_table_type' => 'inner'
					],
					[
						'join_table_name' => 'type_of_visits',
						'join_table_key' => 'type_of_visits.tov_id',
						'join_table_condition' => '=',
						'join_table_value' => 'provider_route_sheet_list.prsl_tovID',
						'join_table_type' => 'inner'
					],
					[
						'join_table_name' => 'patient_transactions',
						'join_table_key' => 'patient_transactions.pt_id',
						'join_table_condition' => '=',
						'join_table_value' => 'provider_route_sheet_list.prsl_patientTransID',
						'join_table_type' => 'inner'
					]
				],
				'where' => [
					[
						'key' => 'provider_route_sheet_list.prsl_prsID',
						'condition' =>  '=',
						'value' => $prs_id
					]
				],
				'return_type' => 'object'
			];

		} else {
			$lists_params = [
				'joins' => [
					[
						'join_table_name' => 'patient',
						'join_table_key' => 'patient.patient_id',
						'join_table_condition' => '=',
						'join_table_value' => 'provider_route_sheet_list.prsl_patientID',
						'join_table_type' => 'inner'
					],
					[
						'join_table_name' => 'type_of_visits',
						'join_table_key' => 'type_of_visits.tov_id',
						'join_table_condition' => '=',
						'join_table_value' => 'provider_route_sheet_list.prsl_tovID',
						'join_table_type' => 'inner'
					],
					[
						'join_table_name' => 'patient_transactions',
						'join_table_key' => 'patient_transactions.pt_id',
						'join_table_condition' => '=',
						'join_table_value' => 'provider_route_sheet_list.prsl_patientTransID',
						'join_table_type' => 'inner'
					],
					[
						'join_table_name' => 'home_health_care',
						'join_table_key' => 'home_health_care.hhc_id',
						'join_table_condition' => '=',
						'join_table_value' => 'patient_transactions.patient_hhcID',
						'join_table_type' => 'left'
					],
				],
				'where' => [
					[
						'key' => 'provider_route_sheet_list.prsl_prsID',
						'condition' =>  '=',
						'value' => $prs_id
					]
				],
				'return_type' => 'object'
			];
		}


		if($is_ca == 'ca'){
			$lists_params['where'][] = 
			[
				'key' => 'provider_route_sheet_list.is_ca',
				'condition' => '=',
				'value' => 1
			];
		} else {
			$lists_params['where'][] = 
			[
				'key' => 'provider_route_sheet_list.is_ca',
				'condition' => '=',
				'value' => NULL
			];
		}

		$page_data['record'] = $this->rs_model->get_records_by_join($record_params);



		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$page_data['lists'] = $this->pr_supervisingMD_model->get_supervisingMD_details(
			$this->rs_list_model->get_records_by_join($lists_params)
		);

		$count = 0;
		$page_data['spouse'] = array();

		foreach($page_data['lists'] as $value){

			$spouse = $this->pt_model->getSpouseData($page_data['lists'][$count]->patient_spouse); 
			$page_data['spouse'][$page_data['lists'][$count]->patient_spouse] = $spouse;


			if(empty($spouse)){

				$page_data['spouse'][$page_data['lists'][$count]->patient_spouse] = array(
					0 => array('patient_name' => '')
				);
			}




			$count++;
		}

		return $page_data;
	}

	public function form(string $prs_id)
	{
		$is_ca  = $this->input->post('is_ca') ? 'ca' : '';
		$this->check_permission('download_prs');

		$this->load->library('PDF');

		$page_data = $this->get_routesheet_details_data($prs_id, $is_ca);
		$submit_type = $this->input->post('submit_type');
		$dateOfService = $page_data['record']->get_date_format($page_data['record']->prs_dateOfService);
		$filename = $page_data['record']->get_provider_fullname() . '_routesheet_';
		$filename .= str_replace('/', '_', $dateOfService);

		if ($submit_type == 'email') {
			$this->load->library('email');			

			$tmpDir = sys_get_temp_dir() . '/';
			$emailTemplate = $this->load->view('provider_route_sheet_management/route_sheet/email_template', $page_data, true);

			$html = $this->load->view('provider_route_sheet_management/route_sheet/pdf', $page_data, true);
			$this->pdf->page_orientation = 'L';
			$this->pdf->generate_as_attachement($html, $tmpDir . $filename);

			$this->email->from('info@themobiledrs.com', 'The MobileDrs');
			$this->email->to($page_data['record']->provider_email);
			$this->email->subject('Your routesheet for the date of ' . $dateOfService);
			$this->email->message($emailTemplate);
			$this->email->attach($tmpDir . $filename . '.pdf', 'attachment', $filename . '.pdf');

			$send = $this->email->send();

			if ($send)
			{
				unlink($tmpDir . $filename . '.pdf');

				$this->session->set_flashdata('success', $this->lang->line('success_email'));
			}
			else
			{
				$this->session->set_flashdata('danger', $this->lang->line('danger_email'));	
			}

			if($is_ca == 'ca'){
				$redirect_url = 'provider_route_sheet_management/route_sheet/details/' . $prs_id. '/ca';
			} else {
				$redirect_url = 'provider_route_sheet_management/route_sheet/details/' . $prs_id;
			}

			

			redirect($redirect_url);

		} elseif ($submit_type == 'pdf') {
			if($is_ca == 'ca'){
				$html = $this->load->view('provider_route_sheet_management/route_sheet/pdf_ca', $page_data, true);
			} else {
				$html = $this->load->view('provider_route_sheet_management/route_sheet/pdf', $page_data, true);
			}
			
		
			$this->pdf->page_orientation = 'L';
			$this->pdf->generate($html, $filename);
		}
	}
}