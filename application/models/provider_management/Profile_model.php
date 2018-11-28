<?php

class Profile_model extends MY_Model {
	
	protected $table_name = 'provider';
	protected $entity = 'Profile_entity';

	public function __construct()
	{
		parent::__construct();

		$this->load->library('provider_management/profile/' . $this->entity);
	}

	public function prepare_data() : array
	{
		return [
			'provider_firstname' => $this->input->post('provider_firstname'),
			'provider_lastname' => $this->input->post('provider_lastname'),
			'provider_contactNum' => $this->input->post('provider_contactNum'),
			'provider_email' => $this->input->post('provider_email'),
			'provider_address' => $this->input->post('provider_address'),
			'provider_dateOfBirth' => $this->input->post('provider_dateOfBirth'),
			'provider_languages' => $this->input->post('provider_languages'),
			'provider_areas' => $this->input->post('provider_areas'),
			'provider_npi' => $this->input->post('provider_npi'),
			'provider_dea' => $this->input->post('provider_dea'),
			'provider_license' => $this->input->post('provider_license'),
			'provider_rate_initialVisit' => $this->input->post('provider_rate_initialVisit'),
			'provider_rate_followUpVisit' => $this->input->post('provider_rate_followUpVisit'),
			'provider_rate_aw' => $this->input->post('provider_rate_aw'),
			'provider_rate_acp' => $this->input->post('provider_rate_acp'),
			'provider_rate_noShowPT' => $this->input->post('provider_rate_noShowPT'),
			'provider_rate_others' => $this->input->post('provider_rate_others'),
			'provider_rate_mileage' => $this->input->post('provider_rate_mileage')
		];
	}

	public function prepare_search_data() : array
	{
		return [
			'provider_firstname' => $this->input->post('provider_firstname'),
			'provider_middleName' => $this->input->post('provider_middleName'),
			'provider_lastname' => $this->input->post('provider_lastname'),
			'provider_email' => $this->input->post('provider_email')
		];
	}
}