<?php

namespace Mobiledrs\entities\home_health_care_management;

class Profile_entity extends \Mobiledrs\entities\Entity {

	protected $hhc_id;
	protected $hhc_name;
	protected $hhc_contact_name;
	protected $hhc_phoneNumber;
	protected $hhc_faxNumber;
	protected $hhc_email;
	protected $hhc_address;
	protected $hhc_dateCreated;
	protected $hhc_email_additional;

	public function has_changed_email(string $email) : bool
	{
		return $this->hhc_email != $email;
	}
}