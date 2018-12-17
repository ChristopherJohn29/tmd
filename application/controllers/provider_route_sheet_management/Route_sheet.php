<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route_sheet extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'provider_route_sheet_management/route_sheet_model' => 'rs_model',
			'provider_route_sheet_management/Route_sheet_list_model' => 'rs_list_model',
			'patient_management/Type_visit_model' => 'tov_model'
		));
	}

	public function index()
	{
		$this->check_permission('list_prs');

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
			'return_type' => 'object'
		];

		$page_data['records'] = $this->rs_model->get_records_by_join($params);

		$this->twig->view('provider_route_sheet_management/route_sheet/list', $page_data);
	}

	public function add()
	{
		$this->check_permission('add_prs');

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

		$page_data['tovs'] = $this->tov_model->records($tov_params);

		$this->twig->view('provider_route_sheet_management/route_sheet/add', $page_data);
	}

	public function edit(string $prs_id)
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
				'key' => 'provider_route_sheet.prs_id',
				'condition' =>  '=',
				'value' => $prs_id
			],
			'return_type' => 'row'
		];

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
				]
			],
			'where' => [
				'key' => 'provider_route_sheet_list.prsl_prsID',
				'condition' =>  '=',
				'value' => $prs_id
			],
			'return_type' => 'object'
		];

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

		$this->twig->view('provider_route_sheet_management/route_sheet/edit', $page_data);
	}

	public function save(string $formtype, string $prs_id = '')
	{
		$this->check_permission('add_prs');

		// check first if the provider has already been created
		// a route sheet for the same day
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
			'redirect_url' => 'provider_route_sheet_management/route_sheet',
			'validation_group' => 'provider_route_sheet_management/route_sheet/save'
		];

		parent::save_data($params);
	}

	public function details(string $prs_id)
	{
		$this->check_permission('view_prs');

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
				'key' => 'provider_route_sheet.prs_id',
				'condition' =>  '=',
				'value' => $prs_id
			],
			'return_type' => 'row'
		];

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
				]
			],
			'where' => [
				'key' => 'provider_route_sheet_list.prsl_prsID',
				'condition' =>  '=',
				'value' => $prs_id
			],
			'return_type' => 'object'
		];

		$page_data['record'] = $this->rs_model->get_records_by_join($record_params);

		if ( ! $page_data['record'])
		{
			redirect('errors/page_not_found');
		}

		$page_data['lists'] = $this->rs_list_model->get_records_by_join($lists_params);

		$this->twig->view('provider_route_sheet_management/route_sheet/details', $page_data);
	}

	// public function download(string $prs_providerID)
	// {
	// 	$this->check_permission('download_prs');

	// 	// prepare records in pdf then send directly to browser to download
	// }
}