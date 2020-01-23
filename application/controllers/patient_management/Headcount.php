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

	private $typeDropdown = [
		'1' => [
			'1' => 'Total Patients',
            '2' => 'Unbilled CPO',
            '3' => 'Unbilled AW',
            '4' => 'Unbilled Visits',
            '5' => 'Unpaid Providers',
            '6' => 'Blank / Empty Diagnoses',
            '7' => 'No Show Patients'
		],
		'2' => [
			'1' => 'Total Patients',
            '2' => 'Unbilled CPO',
            '3' => 'Unbilled AW',
            '4' => 'Unbilled Visits',
            '5' => 'Unpaid Providers',
            '6' => 'Blank / Empty Diagnoses',
            '7' => 'No Show Patients'
		],
		'3' => [
			'1' => 'Total Patients',
			'6' => 'Blank / Empty Diagnoses',
			'7' => 'No Show Patients'
		]
	];

	private $tableColumns = [
		'1' => 'patient_name',
        '2' => 'provider',
        '3' => 'pt_supervising_mdID',
        '4' => 'dateOfService',
        '5' => 'deductible',
        '6' => 'home_health',
        '7' => 'paid',
        '8' => 'aw_billed',
        '9' => 'visit_billed',
        '10' => 'cpo_billed',
        '11' => 'actions'
	];
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/transaction_model',
			'patient_management/headcount_model',
			'patient_management/CPO_model',
			'payroll_management/payroll_model',
			'provider_management/supervising_md_model'		
		));
	}

	public function index()
	{
		$this->check_permission('headcount_pt');

		$page_data['typeList'] = $this->typeDropdown[$this->session->userdata('user_roleID')];

		$this->twig->view('patient_management/headcount/create', $page_data);
	}

	public function generate()
	{
		$this->check_permission('headcount_pt');

		$this->load->library('Date_formatter');

		$selected_type = $this->input->post('type');

		$page_data['month'] = $this->input->post('month');
		$page_data['fromDate'] = $this->input->post('fromDate');
		$page_data['toDate'] = $this->input->post('toDate');
		$page_data['year'] = $this->input->post('year');
		$page_data['type'] = $selected_type;
		$page_data['typeList'] = $this->typeDropdown[$this->session->userdata('user_roleID')];
		$page_data['typeTitle'] = $this->typeDropdown[$this->session->userdata('user_roleID')][$selected_type];

		$newFromDate = $page_data['year'] . '-' . $page_data['month'] . '-' . $page_data['fromDate'];
		$newToDate = $page_data['year'] . '-' . $page_data['month'] . '-' . $page_data['toDate'];
		$this->date_formatter->set_date($newFromDate, $newToDate);
		$page_data['datePeriod'] = $this->date_formatter->format();

		if ($selected_type == 5) {
			$this->load->model('provider_management/profile_model', 'pr_profile_model');

			$page_data['newfromDate'] = implode('/', [
				$page_data['year'],
				$page_data['month'],
				$page_data['fromDate']
			]);

			$page_data['newToDate'] = implode('/', [
				$page_data['year'],
				$page_data['month'],
				$page_data['toDate']
			]);

			$headcounts = $this->payroll_model->get_unpaid_providers(
				$page_data['newfromDate'],
				$page_data['newToDate']
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

			$page_data['headcounts'] = $this->supervising_md_model->get_supervisingMD_details(
				$this->headcount_model->$selected_func()
			);
			
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

	public function pdf(
		string $type, string $month, string $fromDate, 
		string $toDate, string $year, string $tableColumndID = null, 
		string $sortDirection = null
	)
	{
		$this->load->library(['PDF', 'Date_formatter']);

		$newFromDate = $year . '-' . $month . '-' . $fromDate;
		$newToDate = $year . '-' . $month . '-' . $toDate;
		$this->date_formatter->set_date($newFromDate, $newToDate);
		$page_data['dateFormat'] = $this->date_formatter->format();

		$selected_type = $type;
		$html = '';
		$filename = '';

		$selectedTitle = $this->typeDropdown[$this->session->userdata('user_roleID')][$selected_type];
		$selectedTitle = str_replace(' ', '_', $selectedTitle);
		$selectedTitle = str_replace('/', '', $selectedTitle);

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
			$filename = 'Headcount_' . $selectedTitle . '_' . $page_data['dateFormat'];
		}
		else {
			$this->load->model('patient_management/profile_model', 'pt_profile_model');

			$selected_type = $type;
			$selected_func = $this->heacount_type_func[$selected_type];

			$this->headcount_model->prepare_dateRange($month, $fromDate, $toDate, $year);

			$page_data['headcounts'] = $this->headcount_model->$selected_func(
				$this->tableColumns[$tableColumndID],
				$sortDirection
			);

			$page_data['headcounts_total'] = count($page_data['headcounts']);

			$html = $this->load->view('patient_management/headcount/pdf', $page_data, true);
			$filename = 'Headcount_' . $selectedTitle . '_' . $page_data['dateFormat'];
		}

		$this->pdf->page_orientation = 'L';
		$this->pdf->generate($html, $filename);
	}
}