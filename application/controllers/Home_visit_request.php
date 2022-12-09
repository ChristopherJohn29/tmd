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

		$this->load->view('homevisitrequest/pdf', $data);

		// $html = $this->load->view('homevisitrequest/pdf', $data, true);

		// $this->load->library(['PDF']);
		// $filename = 'SAMPLE PDF';

		// $this->pdf->generate($html, $filename);

	}

}