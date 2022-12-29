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

        $page_data['records'] = $this->user_model->fetchHomeVisitRequest();
        
        $this->twig->view('homevisitrequest/list', $page_data);
		
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
		$this->email->to('christopherjohngamo@gmail.com');
		$this->email->subject('Home visit request form');
		$this->email->message('test');
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