<?php

class Profile_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'home_health_care';
	protected $entity = '\Mobiledrs\entities\home_health_care_management\Profile_entity';
	protected $record_entity = null;

	public function __construct()
	{
		parent::__construct();

		$this->record_entity = new \Mobiledrs\entities\home_health_care_management\Profile_entity();
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
}