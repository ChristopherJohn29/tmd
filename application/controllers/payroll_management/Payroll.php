<?php

class Payroll extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/transaction_model'
		));
	}

	public function index()
	{
		$this->check_permission('generate_pr');

		$page_data = [];

		if ( ! empty($this->input->post()))
		{
			$transaction_params = [
				'order' => [
					'key' => 'patient_transactions.pt_dateOfService',
					'by' => 'DESC'
				],
				'joins' => [
					[
						'join_table_name' => 'provider',
						'join_table_key' => 'provider.provider_id',
						'join_table_condition' => '=',
						'join_table_value' => 'patient_transactions.pt_providerID',
						'join_table_type' => 'inner'
					]
				],
				'where' => [
					[
						'key' => 'patient_transactions.pt_dateOfService',
						'condition' => '>=',
		        		'value' => $this->input->post('fromDate')
					],
					[
						'key' => 'patient_transactions.pt_dateOfService',
						'condition' => '<=',
		        		'value' => $this->input->post('toDate')
					]
				],
				'return_type' => 'object'
			];

			$page_data['results'] = $this->transaction_model->get_records_by_join($transaction_params);
		}

		$this->twig->view('payroll_management/payroll/search', $page_data);
	}

	public function details(string $patient_id)
	{
		$this->check_permission('generate_pr');
		
		$this->twig->view('payroll_management/payroll/details');
	}
}