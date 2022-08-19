<?php

namespace Mobiledrs\entities\home_health_care_management;

class Notes_entity extends \Mobiledrs\entities\Entity {

	protected $hhcn_id;
	protected $hhcn_notes;
    protected $hhcn_date;
    protected $hhcn_userID;
	protected $hhcn_hhcID;
	protected $hhcn_archive;

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
    
    public function getNotesFromUserID()
	{
		return $this->user_firstname;
	}
}