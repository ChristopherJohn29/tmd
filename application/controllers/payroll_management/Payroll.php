<?php

class Payroll extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/transaction_model',
			'payroll_management/payroll_model',
			'provider_management/profile_model'
		));

		$this->load->library('Date_formatter');
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

	public function details(string $provider_id, string $fromDate, string $toDate)
	{
		$this->check_permission('generate_pr');

		$this->twig->view(
			'payroll_management/payroll/details', 
			$this->get_provider_details_data($provider_id, $fromDate, $toDate)
		);
	}

	public function form(string $provider_id, string $fromDate, string $toDate)
	{
		$this->check_permission('print_pr');

		$page_data = $this->get_provider_details_data($provider_id, $fromDate, $toDate);
		$page_data['notes'] = $this->input->post('notes');
		$page_data['others'] = $this->input->post('others');
		$page_data['total'] = $this->input->post('total');

		if ($this->input->post('submit_type') == 'print')
		{
			$this->twig->view('payroll_management/payroll/print', $page_data);
		}
		else
		{
			redirect('errors/page_not_found');
		}
	}

	private function get_provider_details_data(string $provider_id, string $fromDate, string $toDate) : array
	{
		$provider_params = [
			'key' => 'provider_id',
        	'value' => $provider_id,
		];

		$page_data['fromDate'] = str_replace('_', '/', $fromDate);
		$page_data['toDate'] = str_replace('_', '/', $toDate);

		$this->date_formatter->set_date($page_data['fromDate'], $page_data['toDate']);

		$page_data['pay_period'] = $this->date_formatter->format();
		
		$page_data['provider_transactions'] = $this->payroll_model->details(
			$provider_id,
			$page_data['fromDate'],
			$page_data['toDate']
		);

		if (empty($page_data['provider_transactions']))
		{
			redirect('errors/page_not_found');
		}

		$page_data['provider_details'] = $this->profile_model->record($provider_params);

		$payroll_entity = new \Mobiledrs\entities\payroll_management\Payroll_entity(
			$page_data['provider_details'],
			$page_data['provider_transactions']
		);

		$page_data['provider_payment_summary'] = $payroll_entity->compute_payment_summary();

		return $page_data;
	}
}