<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_ca extends \Mobiledrs\core\MY_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model(array(
			'ca_routesheet/ca_routesheet' => 'rs_model',
			'provider_management/supervising_md_model' => 'supervising_md_model',
			'patient_management/lab_orders_model' => 'lab_orders_model'
		));

		$this->load->library('Time_converter');
	}

	public function add(string $pt_patientID)
	{
		$this->check_permission('add_tr');



		$page_data['record'] = $this->rs_model->getPatientRecord($pt_patientID);

		$page_data['supervisingMDs'] = $this->supervising_md_model->supervisingMD_records();

		// echo "<pre>";
		// var_dump($page_data);
		// echo "</pre>";
		// exit;
		
		$this->twig->view('patient_management/transaction_ca/add', $page_data);

	}

	public function edit(string $pt_patientID, string $pt_id)
	{
		$this->check_permission('add_tr');



		$page_data['transaction'] = $this->rs_model->getTransactionRecord($pt_id)[0];
		$page_data['transaction']['pt_dateOfService'] = date_format(date_create($page_data['transaction']['pt_dateOfService']), 'm/d/Y');
		


		$page_data['record'] = $this->rs_model->getPatientRecord($pt_patientID);

		// var_dump($page_data['record']);

		$page_data['supervisingMDs'] = $this->supervising_md_model->supervisingMD_records();

		// echo "<pre>";
		// var_dump($page_data);
		// echo "</pre>";
		// exit;
		
		$this->twig->view('patient_management/transaction_ca/edit', $page_data);

	}

	public function save(string $page_type, string $pt_patientID = '', string $pt_id = '')
	{
		$this->check_permission('add_tr');

		$dateRefEmailed = $this->input->post('pt_dateOfService');
		$providerId = $this->input->post('provider_id');

		if($this->input->post('lab_orders') ){
			$this->lab_orders_model->createOrdersFromVisit($pt_patientID, $dateRefEmailed, $providerId, $this->session->userdata('user_id'));
		}
		

		$log = [];
		if ($page_type == 'edit') {
			
			$this->rs_model->updateCATransaction($_POST, $pt_id);
			$log = ['description' => 'Updates a patient transaction record.'];

		} else {

			$this->rs_model->addCATransaction($_POST);
			$log = ['description' => 'Added a new patient transaction record.'];
		}

		$lastRecordID = $page_type == 'edit' ? $pt_id : $this->db->insert_id();

		if ( ! empty($log) && $this->session->userdata('user_roleID') != '1') {
            $this->logs_model->insert([
                'data' => [
                    'user_log_userID' => $this->session->userdata('user_id'),
                    'user_log_time' => date('H:m:s'),
                    'user_log_date' => date('Y-m-d'),
                    'user_log_description' => $log['description'],
                    'user_log_link' => 'patient_management/transaction/edit/'.$pt_patientID.'/'.$lastRecordID
                ]
            ]);
        }

        redirect('patient_management/profile/details/' . $pt_patientID);
	}


}