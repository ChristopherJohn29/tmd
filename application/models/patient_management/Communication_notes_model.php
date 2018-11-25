<?php

class Communication_notes_model extends MY_Model {
	protected $table_name = 'patient_communication_notes';

	public function __construct()
	{
		parent::__construct();
	}

	public function prepare_data() : array
	{
		return [
			'ptcn_patientID' => $this->uri->segment(3),
			'ptcn_message' => $this->input->post('ptcn_message')
		];
	}
}