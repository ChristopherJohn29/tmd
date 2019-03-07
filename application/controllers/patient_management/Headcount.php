<?php

use \Mobiledrs\entities\payroll_management\Payroll_entity;

class Headcount extends \Mobiledrs\core\MY_Controller {

	private $heacount_type_func = [
		'1' => 'get_total_patients',
		'2' => 'get_unbilled_cpo',
		'3' => 'get_unbilled_aw',
		'4' => 'get_unbilled_visits',
		'6' => 'get_blank_diagnoses',
		'7' => 'get_noshow_patients'
	];
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/transaction_model',
			'patient_management/headcount_model',
			'patient_management/CPO_model',
			'payroll_management/payroll_model'			
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

		$selected_type = $this->input->post('type');

		$page_data['month'] = $this->input->post('month');
		$page_data['fromDate'] = $this->input->post('fromDate');
		$page_data['toDate'] = $this->input->post('toDate');
		$page_data['year'] = $this->input->post('year');
		$page_data['type'] = $selected_type;


		if ($selected_type == 5) {
			$this->load->model('provider_management/profile_model', 'pr_profile_model');

			$newfromDate = implode('/', [
				$this->input->post('year'),
				$this->input->post('month'),
				$this->input->post('fromDate')
			]);

			$newToDate = implode('/', [
				$this->input->post('year'),
				$this->input->post('month'),
				$this->input->post('toDate')
			]);

			$headcounts = $this->payroll_model->get_unpaid_providers(
				$newfromDate,
				$newToDate
			);

			$payroll_entity = new Payroll_entity([], $headcounts);
			$page_data['headcounts'] = $payroll_entity->format_display_list();
			$page_data['headcounts_total'] = count($page_data['headcounts']);
			$page_data['viewName'] = 'unPaidProviders';
		}
		else {
			$this->load->model('patient_management/profile_model', 'pt_profile_model');

			$selected_func = $this->heacount_type_func[$selected_type];

			$this->headcount_model->prepare_dateRange(
				$page_data['month'], 
				$page_data['fromDate'], 
				$page_data['toDate'], 
				$page_data['year']
			);

			$page_data['headcounts'] = $this->headcount_model->$selected_func();
			$page_data['headcounts_total'] = count($page_data['headcounts']);
			
			$page_data['viewName'] = 'list';
		}

		$this->twig->view('patient_management/headcount/create', $page_data);	
	}

	public function print(string $type, string $month, string $fromDate, string $toDate, string $year)
	{
		$selected_type = $type;

		if ($selected_type == 5) {
			$this->load->model('provider_management/profile_model', 'pr_profile_model');

			$newfromDate = implode('/', [
				$year,
				$month,
				$fromDate
			]);

			$newToDate = implode('/', [
				$year,
				$month,
				$toDate
			]);

			$headcounts = $this->payroll_model->get_unpaid_providers(
				$newfromDate,
				$newToDate
			);

			$payroll_entity = new Payroll_entity([], $headcounts);
			$page_data['headcounts'] = $payroll_entity->format_display_list();
			$page_data['headcounts_total'] = count($page_data['headcounts']);

			$page_data['headcounts_total'] = count($page_data['headcounts']);

			$this->twig->view('patient_management/headcount/printUnPaidProviders', $page_data);
		}
		else {
			$this->load->model('patient_management/profile_model', 'pt_profile_model');

			$selected_func = $this->heacount_type_func[$selected_type];

			$this->headcount_model->prepare_dateRange($month, $fromDate, $toDate, $year);

			$page_data['headcounts'] = $this->headcount_model->$selected_func();
			$page_data['headcounts_total'] = count($page_data['headcounts']);

			$this->twig->view('patient_management/headcount/print', $page_data);	
		}
	}

	public function pdf(string $type, string $month, string $fromDate, string $toDate, string $year)
	{
		$this->load->library(['PDF', 'Date_formatter']);

		$newFromDate = $year . '-' . $month . '-' . $fromDate;
		$newToDate = $year . '-' . $month . '-' . $toDate;
		$this->date_formatter->set_date($newFromDate, $newToDate);
		$dateFormat = $this->date_formatter->format();

		$selected_type = $type;
		$html = '';
		$filename = '';

		if ($selected_type == 5) {
			$this->load->model('provider_management/profile_model', 'pr_profile_model');

			$newfromDate = implode('/', [
				$year,
				$month,
				$fromDate
			]);

			$newToDate = implode('/', [
				$year,
				$month,
				$toDate
			]);

			$headcounts = $this->payroll_model->get_unpaid_providers(
				$newfromDate,
				$newToDate
			);

			$payroll_entity = new Payroll_entity([], $headcounts);
			$page_data['headcounts'] = $payroll_entity->format_display_list();
			$page_data['headcounts_total'] = count($page_data['headcounts']);

			$page_data['headcounts_total'] = count($page_data['headcounts']);

			$html = $this->load->view('patient_management/headcount/pdfUnPaidProviders', $page_data, true);
			$filename = 'Headcount_' . $dateFormat;
		}
		else {
			$this->load->model('patient_management/profile_model', 'pt_profile_model');

			$selected_type = $type;
			$selected_func = $this->heacount_type_func[$selected_type];

			$this->headcount_model->prepare_dateRange($month, $fromDate, $toDate, $year);

			$page_data['headcounts'] = $this->headcount_model->$selected_func();
			$page_data['headcounts_total'] = count($page_data['headcounts']);

			$html = $this->load->view('patient_management/headcount/pdf', $page_data, true);
			$filename = 'Headcount_' . $dateFormat;	
		}

		$this->pdf->page_orientation = 'L';
		$this->pdf->generate($html, $filename);
	}
}