<?php

use \Mobiledrs\entities\payroll_management\Payroll_entity;

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

			$page_data['fromDate'] = implode('/', [
				$this->input->post('year'),
				$this->input->post('month'),
				$this->input->post('fromDate')
			]);

			$page_data['toDate'] = implode('/', [
				$this->input->post('year'),
				$this->input->post('month'),
				$this->input->post('toDate')
			]);

			$results = $this->payroll_model->list(
				$page_data['fromDate'], 
				$page_data['toDate']
			);

			$payroll_entity = new Payroll_entity([], $results);

			$page_data['results'] = $payroll_entity->format_display_list();
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

		$payroll_entity = new Payroll_entity(
			$page_data['provider_details'],
			$page_data['provider_transactions']
		);

		$page_data['provider_payment_summary'] = $payroll_entity->compute_payment_summary();

		return $page_data;
	}
}