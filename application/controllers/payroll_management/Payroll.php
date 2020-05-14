<?php

use \Mobiledrs\entities\payroll_management\Payroll_entity;

class Payroll extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'patient_management/transaction_model',
			'payroll_management/payroll_model',
			'payroll_management/payroll_summary_model',
			'provider_management/profile_model',
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

		$payroll_summary = $this->payroll_summary_model->get($provider_id, $fromDate, $toDate);

		$page_data = $this->get_provider_details_data($provider_id, $fromDate, $toDate);

		if (!empty($payroll_summary)) {
			$page_data['provider_payment_summary']['mileage']['qty'] = $payroll_summary->mileage;
		}

		$this->twig->view(
			'payroll_management/payroll/details', 
			$page_data			
		);
	}

	public function form(string $provider_id, string $fromDate, string $toDate)
	{
		$this->check_permission('print_pr');

		$page_data = $this->get_provider_details_data($provider_id, $fromDate, $toDate);
		$page_data['mileageQty'] = $this->input->post('mileageQty');
		$page_data['mileageAmount'] = $this->input->post('mileageAmount');
		$page_data['mileageTotal'] = $this->input->post('mileageTotal');
		$page_data['notes'] = $this->input->post('notes');
		$page_data['others_field'] = $this->input->post('others_field');
		$page_data['others'] = $this->input->post('others');
		$page_data['total'] = $this->input->post('total');

		if ($this->input->post('submit_type') == 'print')
		{
			$this->twig->view('payroll_management/payroll/print', $page_data);
		}
		elseif ($this->input->post('submit_type') == 'paid')
		{
			$details_params = [
				$this->uri->segment(4), // provider id
				$this->uri->segment(5), // from date
				$this->uri->segment(6) // to date
			];

			$redirect_url = 'payroll_management/payroll/details/' . implode('/', $details_params);

			$transaction_params = [
				'data' => $this->input->post('pt_id'),
				'columnPaid' => 'pt_service_billed',
				'columnID' => 'pt_id',
				'model' => 'transaction_model',
				'redirect_url' => $redirect_url
			];

			// save summary
			$this->payroll_summary_model->save(
				$details_params,
				$page_data['mileageQty']
			);

			parent::make_paid($transaction_params);
		}
		elseif ($this->input->post('submit_type') == 'pdf')
		{
			$this->load->library('PDF');
			
			$html = $this->load->view('payroll_management/payroll/pdf', $page_data, true);
			$filename = $this->input->post('providerName') . ' Payroll Period: ';
			$filename .= $this->input->post('payPeriod');

			$this->pdf->generate($html, $filename);
		}
		elseif ($this->input->post('submit_type') == 'email')
		{
			$this->load->library(['email', 'PDF']);

			$tmpDir = sys_get_temp_dir() . '/';
			$page_data['payPeriod'] = $this->input->post('payPeriod');
			$page_data['providerName'] = $this->input->post('providerName');
			$emailTemplate = $this->load->view('payroll_management/payroll/email_template', $page_data, true);

			$filename = $page_data['providerName'] . ' Payroll Period: ';
			$filename .= $page_data['payPeriod'];

			$html = $this->load->view('payroll_management/payroll/pdf', $page_data, true);
			$this->pdf->generate_as_attachement($html, $tmpDir . $filename);

			$provider_params = [
				'key' => 'provider.provider_id',
				'value' => $provider_id
			];

			$providerDetails = $this->profile_model->record($provider_params);
			
			$this->email->from('info@themobiledrs.com', 'The MobileDrs');
			$this->email->reply_to('michelle@themobiledrs.com', 'The MobileDrs');
			$this->email->to($providerDetails->provider_email);
			$this->email->subject('Your payment summary for ' . $page_data['payPeriod']);
			$this->email->message($emailTemplate);
			$this->email->attach($tmpDir . $filename . '.pdf', 'attachment', $filename . '.pdf');

			$send = $this->email->send();

			if ($send)
			{
				unlink($tmpDir . $filename . '.pdf');
				
				$this->session->set_flashdata('success', $this->lang->line('success_email'));
			}
			else
			{
				$this->session->set_flashdata('danger', $this->lang->line('danger_email'));	
			}

			$details_params = [
				$this->uri->segment(4), // provider id
				$this->uri->segment(5), // from date
				$this->uri->segment(6) // to date
			];

			$redirect_url = 'payroll_management/payroll/details/' . implode('/', $details_params);

			redirect($redirect_url);
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