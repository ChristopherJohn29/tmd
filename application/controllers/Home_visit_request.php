<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_visit_request extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'authentication/user_model',
		));
	}

    public function index(){

        $this->check_permission('cookie_restriction');
		$this->load->library(['Date_formatter']);
		$page_data['fromDate'] = NULL;
		$page_data['toDate'] = NULL;

		if($this->input->post('year') && $this->input->post('fromMonth') && $this->input->post('fromDate')){
			$page_data['fromDate'] = implode('/', [
				$this->input->post('year'),
				$this->input->post('fromMonth'),
				$this->input->post('fromDate')
			]);
		}

		if($this->input->post('year') && $this->input->post('toMonth') && $this->input->post('toDate')){
			$page_data['toDate'] = implode('/', [
				$this->input->post('year'),
				$this->input->post('toMonth'),
				$this->input->post('toDate')
			]);
		}

		$new_fromDate = str_replace('_', '/', $page_data['fromDate']);
		$new_toDate = str_replace('_', '/', $page_data['toDate']);

		$this->date_formatter->set_date($new_fromDate, $new_toDate);
		$page_data['datePeriod'] = $this->date_formatter->format();
        $page_data['records'] = $this->user_model->fetchHomeVisitRequest($page_data['fromDate'], $page_data['toDate']);
		$page_data['headcounts_total'] = count($page_data['records']);

		$page_data['fromDate'] = str_replace('/', '_', $page_data['fromDate']);
		$page_data['toDate'] = str_replace('/', '_',$page_data['toDate']);


        $this->twig->view('homevisitrequest/list', $page_data);
	}

	public function generate_pdf_list($fromDate, $toDate){

		$fromDate = str_replace('/', '_', $fromDate);
		$toDate = str_replace('/', '_', $toDate);
		
		$page_data['records'] = $this->user_model->fetchHomeVisitRequest($fromDate,  $toDate);

		$page_data['headcounts_total'] = count($page_data['records']);
		ini_set('max_execution_time', 0);
		ini_set('memory_limit', '2048M');

		$this->load->library(['Date_formatter', 'PDF']);

		$new_fromDate = str_replace('_', '/', $fromDate);
		$new_toDate = str_replace('_', '/', $toDate);

		$this->date_formatter->set_date($new_fromDate, $new_toDate);
		$date_period = $this->date_formatter->format();

		$page_data['fromDate'] =  str_replace('_', '/', $fromDate);
		$page_data['toDate'] = str_replace('_', '/', $toDate);

		
		$this->date_formatter->set_date($new_fromDate, $new_toDate);
		$page_data['date_sent'] = $this->date_formatter->format();

		$md = $this->user_model->getSuperMd();

		$mds = array();
		foreach ($md as $key => $value) {
			$mds[$value['provider_id']] = $value['provider_firstname'].' '.$value['provider_lastname'];
		}

		$page_data['mds'] = $mds;

		$html = $this->load->view('homevisitrequest/pdflist', $page_data, true);
		$filename = 'homevisitreport' . $date_period;

		$this->pdf->page_orientation = 'L';
		$this->pdf->generate($html, $filename);

	}

	public function generate_pdf($id){

		$data = $this->user_model->fetchHomeVisitRequestById($id);

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// exit;
		$tmpDir = sys_get_temp_dir() . '/';
		$html = $this->load->view('homevisitrequest/pdf', $data[0], true);

		$this->load->library(['email', 'PDF']);

		$config = array(
			'wordwrap'  => true,
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.bizmail.yahoo.com',
			'smtp_port' => 465,
			'smtp_user' => 'info@themobiledrs.com',
			'smtp_pass' => 'ucjemnxyefywdbyw',
			'mailtype'  => 'html',
			'newline' 	=> "\r\n"
		);

		$this->email->initialize($config);

		$filename = 'Home Visit Form PDF';
		

		$this->pdf->generate_hv($html, $tmpDir . $filename);

		$this->email->from('info@themobiledrs.com', 'The MobileDrs');
		// $this->email->reply_to('michelle@themobiledrs.com', 'The MobileDrs');
		$this->email->to($data[0]['pf_email']);
		$this->email->subject('Home visit request form');
		$this->email->message('Attached is a copy of the Home Visit Request form submitted to The Mobile Drs.');
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

		redirect('/home_visit_request');
	}

	public function generate_pdf_admin($id){

		$data = $this->user_model->fetchHomeVisitRequestById($id);

		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// exit;
		$tmpDir = sys_get_temp_dir() . '/';
		$html = $this->load->view('homevisitrequest/pdf', $data[0], true);

		$this->load->library(['email', 'PDF']);

		$config = array(
			'wordwrap'  => true,
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.bizmail.yahoo.com',
			'smtp_port' => 465,
			'smtp_user' => 'info@themobiledrs.com',
			'smtp_pass' => 'ucjemnxyefywdbyw',
			'mailtype'  => 'html',
			'newline' 	=> "\r\n"
		);

		$this->email->initialize($config);

		$filename = 'Home Visit Form PDF';
		

		$this->pdf->generate_hv($html, $tmpDir . $filename);

		$this->email->from('info@themobiledrs.com', 'The MobileDrs');
		// $this->email->reply_to('michelle@themobiledrs.com', 'The MobileDrs');
		$this->email->to('Intake@themobilemd.com');
		$this->email->subject('Home visit request form');
		$this->email->message('Attached is a copy of the Home Visit Request form submitted to The Mobile Drs.');
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

		redirect('/home_visit_request');
	}

}