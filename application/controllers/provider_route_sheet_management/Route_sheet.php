<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route_sheet extends MY_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'provider_route_sheet_management/route_sheet_model' => 'rs_model'
		));
	}

	public function index()
	{
		$this->check_permission('list_prs');

		$page_data['records'] = $this->rs_model->routes_sheet_list();
	}

	public function add()
	{
		$this->check_permission('add_prs');
	}

	public function edit(string $prs_id)
	{
		$this->check_permission('edit_prs');

		$page_data['record'] = $this->rs_model->routes_sheet_record($prs_id);
	}

	public function save(string $prs_providerID = '')
	{
		$this->check_permission('add_prs');

		// $params = [
		// 	'record_id' => $prs_providerID,
		// 	'table_key' => 'prs_providerID',
		// 	'save_model' => 'rs_model',
		// 	'redirect_url' => 'provider_route_sheet_management/route_sheet/details/'
		// ];

		// parent::save($params);   
	}

	public function details(string $prs_id)
	{
		$this->check_permission('view_prs');

		$page_data['record'] = $this->rs_model->routes_sheet_record($prs_id);
	}

	public function search()
	{
		$this->check_permission('search_prs');

		$page_data['records'] = $this->rs_model->routes_sheet_list(
			$this->rs_model->prepare_search_data()
		);
	}

	public function download(string $prs_providerID)
	{
		$this->check_permission('download_prs');

		// prepare records in pdf then send directly to browser to download
	}
}