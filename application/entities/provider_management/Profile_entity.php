<?php

namespace Mobiledrs\entities\provider_management;

class Profile_entity extends \Mobiledrs\entities\Entity {
	
	protected $provider_id;
	protected $provider_firstname;
	protected $provider_lastname;
	protected $provider_contactNum;
	protected $provider_email;
	protected $provider_address;
	protected $provider_dateOfBirth;
	protected $provider_languages;
	protected $provider_areas;
	protected $provider_npi;
	protected $provider_dea;
	protected $provider_license;
	protected $provider_gender;
	protected $provider_dateCreated;
	protected $provider_rate_initialVisit;
	protected $provider_rate_followUpVisit;
	protected $provider_rate_aw;
	protected $provider_rate_acp;
	protected $provider_rate_noShowPT;
	protected $provider_rate_mileage;
	protected $provider_rate_initialVisitOffice;
	protected $provider_rate_followUpVisitOffice;

	public function get_fullname() : string
	{
		return $this->provider_firstname . ' ' . $this->provider_lastname;
	}

	public function get_reverse_fullname() : string
	{
		return $this->provider_lastname . ', ' . $this->provider_firstname;
	}

	public function get_selected_gender(string $gender) : string
	{
		return ($gender == $this->provider_gender) ? 'selected=true' : '';
	}

	public function has_changed_email(string $email) : bool
	{
		return $this->provider_email != $email;
	}
}