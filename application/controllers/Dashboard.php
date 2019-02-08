<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/profile_model' => 'pt_profile_model',
			'patient_management/transaction_model' => 'transaction_model',
			'provider_route_sheet_management/route_sheet_model' => 'rs_model',
		));
	}

	public function index()
	{
		$pt_params = [
			'key' => 'patient.patient_dateCreated',
			'order_by' => 'DESC',
			'limit' => '15'
		];

		$patients = $this->pt_profile_model->records($pt_params);

		$prs_params = [
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
			'limit' => '15',
			'return_type' => 'object'
		];

		$page_data['patients'] = $this->pt_profile_model->get_pt_profile_trans_recently_added($patients);
		$page_data['pt_profile_entity'] = new \Mobiledrs\entities\patient_management\pages\Profile_entity();
		$page_data['provider_route_sheets'] = $this->rs_model->get_records_by_join($prs_params);
		$page_data['routesheet_entity'] = new \Mobiledrs\entities\provider_route_sheet_management\Routesheet_entity();
		
		$this->twig->view('home', $page_data);
	}
}
