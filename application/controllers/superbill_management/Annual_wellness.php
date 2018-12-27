<?php

class Annual_wellness extends \Mobiledrs\core\MY_Controller {
	
	private $table_name_page = 'aw';

	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/transaction_model',
			'superbill_management/superbill_model'
		));
	}

	public function list(string $fromDate, string $toDate)
	{
		$this->check_permission('generate_sbawr');

		$page_data['table_name_page'] = $this->table_name_page;
		$page_data['fromDate'] = str_replace('_', '/', $fromDate);
		$page_data['toDate'] = str_replace('_', '/', $toDate);

		$pt_transactions = $this->superbill_model->get_pt_transaction(
			$page_data['fromDate'],
			$page_data['toDate']
		);

		$page_data['results'] = [1,2];

		$this->twig->view('superbill_management/create', $page_data);
	}

	public function details(string $fromDate, string $toDate)
	{
		$this->check_permission('generate_sbawr');

		$page_data['table_name_page'] = $this->table_name_page;
		$page_data['fromDate'] = str_replace('_', '/', $fromDate);
		$page_data['toDate'] = str_replace('_', '/', $toDate);
		$page_data['pt_transactions'] = $this->superbill_model->get_pt_transaction(
			$page_data['fromDate'],
			$page_data['toDate']
		);

		$page_data['summary'] = '';

		$this->twig->view('superbill_management/annual_wellness');
	}
}