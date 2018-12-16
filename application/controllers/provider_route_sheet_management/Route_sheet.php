<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route_sheet extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'provider_route_sheet_management/route_sheet_model' => 'rs_model',
			'patient_management/Type_visit_model' => 'tov_model'
		));
	}

	public function index()
	{
		$this->check_permission('list_prs');

		$page_data['records'] = $this->rs_model->routes_sheet_list([]);

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

		$page_data['record'] = $this->rs_model->routes_sheet_record($prs_id);

		$this->twig->view('provider_route_sheet_management/route_sheet/edit', $page_data);
	}

	public function save(string $prs_providerID = '')
	{
		$this->check_permission('add_prs');

		// $params = [
		// 	'record_id' => $prs_providerID,
		// 	'table_key' => 'prs_providerID',
		// 	'save_model' => 'rs_model',
		// 	'redirect_url' => 'provider_route_sheet_management/route_sheet'
		// ];

		// parent::save_data($params);   
	}

	public function details(string $prs_id)
	{
		$this->check_permission('view_prs');

		$page_data['record'] = $this->rs_model->routes_sheet_record($prs_id);

		$this->twig->view('provider_route_sheet_management/route_sheet/details', $page_data);
	}

	public function download(string $prs_providerID)
	{
		$this->check_permission('download_prs');

		// prepare records in pdf then send directly to browser to download
	}
}