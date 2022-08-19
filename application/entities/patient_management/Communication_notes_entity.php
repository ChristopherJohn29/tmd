<?php

namespace Mobiledrs\entities\patient_management;

class Communication_notes_entity extends \Mobiledrs\entities\Entity {

	protected $ptcn_id;
	protected $ptcn_patientID;
	protected $ptcn_message;
	protected $ptcn_dateCreated;
	protected $ptcn_archive;
	protected $ptcn_category;
	protected $ptcn_notesFromUserID;

	protected $user_id; 
	protected $user_firstname;
	protected $user_lastname;
	protected $user_email;
	protected $user_dateCreated;
	protected $user_password;
	protected $user_roleID;
	protected $user_sessionID;
	protected $user_archive;
	protected $user_photo;

	public function getCategories()
	{
		return [
			'CPO',
			'Medications',
			'DME',
			'Scheduling',
			'Issues',
			'HH Comm',
			'485',
			'Billing',
			'Misc',
			'Cognitive Issues',
		];
	}

	public function getNotesFromUserID()
	{
		return $this->user_firstname;
	}
}