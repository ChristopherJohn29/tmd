<?php

class Profile_model extends MY_Model {
	
	protected $table_name = 'patient';
	protected $entity = 'User_entity';

	public function __construct()
	{
		parent::__construct();

		$this->load->library('entities/authentication/' . $this->entity);
	}

	public function prepare_data() : array
	{
		return [
			'patient_firstname' => $this->input->post('patient_firstname'),
			'patient_lastname' => $this->input->post('patient_lastname'),
			'patient_sex' => $this->input->post('patient_sex'),
			'patient_referralDate' => $this->input->post('patient_referralDate'),
			'patient_medicareNum' => $this->input->post('patient_medicareNum'),
			'patient_dateOfBirth' => $this->input->post('patient_dateOfBirth'),
			'patient_phoneNum' => $this->input->post('patient_phoneNum'),
			'patient_hhcID' => $this->input->post('patient_hhcID'),
			'patient_dateCreated' => $this->input->post('patient_dateCreated')
		];
	}

	public function prepare_search_data() : array
	{
		return [
			'patient_firstname' => $this->input->post('patient_firstname'),
			'patient_lastname' => $this->input->post('patient_lastname'),
			'patient_medicareNum' => $this->input->post('patient_medicareNum')
		];
	}
}