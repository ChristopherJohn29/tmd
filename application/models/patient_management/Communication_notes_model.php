<?php

class Communication_notes_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'patient_communication_notes';
	protected $entity = '\Mobiledrs\entities\patient_management\Communication_notes_entity';

	public function __construct()
	{
		parent::__construct();
	}

	public function prepare_data() : array
	{
		return [
			'ptcn_id' => $this->input->post('ptcn_id'),
			'ptcn_patientID' => $this->input->post('ptcn_patientID'),
			'ptcn_category' => $this->input->post('ptcn_category'),
			'ptcn_message' => $this->input->post('ptcn_message'),
			'ptcn_notesFromUserID' => $this->session->userdata('user_id')
		];
	}
}