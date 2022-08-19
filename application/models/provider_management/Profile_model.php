<?php

class Profile_model extends Mobiledrs\core\MY_Models {
	
	protected $table_name = 'provider';
	protected $entity = '\Mobiledrs\entities\provider_management\Profile_entity';
	protected $record_entity = null;

	public function __construct()
	{
		parent::__construct();

		$this->record_entity = new \Mobiledrs\entities\provider_management\Profile_entity();
	}

	public function prepare_data() : array
	{
		$this->prepare_entity_data();

		return [
			'provider_firstname' => $this->record_entity->provider_firstname,
			'provider_lastname' => $this->record_entity->provider_lastname,
			'provider_contactNum' => $this->record_entity->provider_contactNum,
			'provider_email' => $this->record_entity->provider_email,
			'provider_address' => $this->record_entity->provider_address,
			'provider_dateOfBirth' => $this->record_entity->set_date_format($this->record_entity->provider_dateOfBirth),
			'provider_languages' => $this->record_entity->provider_languages,
			'provider_areas' => $this->record_entity->provider_areas,
			'provider_npi' => $this->record_entity->provider_npi,
			'provider_dea' => $this->record_entity->provider_dea,
			'provider_license' => $this->record_entity->provider_license,
			'provider_gender' => $this->record_entity->provider_gender,
			'provider_rate_initialVisit' => $this->record_entity->provider_rate_initialVisit,
			'provider_rate_initialVisit_TeleHealth' => $this->record_entity->provider_rate_initialVisit_TeleHealth,
			'provider_rate_followUpVisit' => $this->record_entity->provider_rate_followUpVisit,
			'provider_rate_followUpVisit_TeleHealth' => $this->record_entity->provider_rate_followUpVisit_TeleHealth,
			'provider_rate_aw' => $this->record_entity->provider_rate_aw,
			'provider_rate_acp' => $this->record_entity->provider_rate_acp,
			'provider_rate_noShowPT' => $this->record_entity->provider_rate_noShowPT,
			'provider_rate_mileage' => $this->record_entity->provider_rate_mileage,
			'provider_supervising_MD' => $this->record_entity->provider_supervising_MD,
			'provider_inactive' => $this->record_entity->provider_inactive,
			'provider_rate_ca_homeHealth' => $this->record_entity->provider_rate_ca_homeHealth,
			'provider_rate_ca_teleHealth' => $this->record_entity->provider_rate_ca_teleHealth,
			'provider_photo' => $this->record_entity->provider_photo

		];
	}

	public function supervisingMD_records() {
		return $this->records([
			'where' => [
				[
					'key' => 'provider_supervising_MD',
					'condition' => '',
					'value' => '1',
				]
			]
		]);
	}
}