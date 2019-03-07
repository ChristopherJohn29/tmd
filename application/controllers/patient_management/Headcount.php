<?php

class Headcount extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/profile_model',
			'patient_management/transaction_model',
			'patient_management/headcount_model',
			'patient_management/CPO_model'
		));
	}

	public function index()
	{
		$this->check_permission('headcount_pt');

		$this->twig->view('patient_management/headcount/create');
	}

	public function generate()
	{
		$this->check_permission('headcount_pt');

		$heacount_type_func = [
			'1' => 'get_total_patients',
			'2' => 'get_unbilled_cpo',
			'3' => 'get_unbilled_aw',
			'4' => 'get_unbilled_visits',
			'5' => 'get_unpaid_providers',
			'6' => 'get_blank_diagnoses',
			'7' => 'get_noshow_patients'
		];

		$selected_type = $this->input->post('type');
		$selected_func = $heacount_type_func[$selected_type];

		$page_data['headcounts'] = $this->headcount_model->$selected_func();
		$page_data['headcounts_total'] = count($page_data['headcounts']);
		$page_data['month'] = $this->input->post('month');
		$page_data['fromDate'] = $this->input->post('fromDate');
		$page_data['toDate'] = $this->input->post('toDate');
		$page_data['year'] = $this->input->post('year');

		$this->twig->view('patient_management/headcount/create', $page_data);
	}

	public function print(string $month, string $fromDate, string $toDate, string $year)
	{
		$page_data['headcounts'] = $this->headcount_model->get_headcount(
			$month,
			$fromDate,
			$toDate,
			$year
		);

		$page_data['headcounts_total'] = count($page_data['headcounts']);

		$this->twig->view('patient_management/headcount/print', $page_data);
	}

	public function pdf(string $month, string $fromDate, string $toDate, string $year)
	{
		$this->load->library(['PDF', 'Date_formatter']);

		$newFromDate = $year . '-' . $month . '-' . $fromDate;
		$newToDate = $year . '-' . $month . '-' . $toDate;
		$this->date_formatter->set_date($newFromDate, $newToDate);
		$dateFormat = $this->date_formatter->format();

		$page_data['headcounts'] = $this->headcount_model->get_headcount(
			$month,
			$fromDate,
			$toDate,
			$year
		);

		$page_data['headcounts_total'] = count($page_data['headcounts']);

		$html = $this->load->view('patient_management/headcount/pdf', $page_data, true);
		$filename = 'Headcount_' . $dateFormat;

		$this->pdf->page_orientation = 'L';
		$this->pdf->generate($html, $filename);
	}
}