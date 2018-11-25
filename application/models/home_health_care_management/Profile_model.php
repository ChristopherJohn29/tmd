<?php

class Profile_model extends MY_Model {
	protected $table_name = 'home_health_care';

	public function __construct()
	{
		parent::__construct();
	}

	public function prepare_data() : array
	{
		return [
			'hhc_name' => $this->input->post('hhc_name'),
			'hhc_contact_name' => $this->input->post('hhc_contact_name'),
			'hhc_phoneNumber' => $this->input->post('hhc_phoneNumber'),
			'hhc_faxNumber' => $this->input->post('hhc_faxNumber'),
			'hhc_email' => $this->input->post('hhc_email'),
			'hhc_address' => $this->input->post('hhc_address')
		];
	}

	public function prepare_search_data() : array
	{
		return [
			'hhc_name' => $this->input->post('hhc_name'),
			'hhc_contact_name' => $this->input->post('hhc_contact_name'),
			'hhc_email' => $this->input->post('hhc_email')
		];
	}
}