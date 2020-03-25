<?php

namespace Mobiledrs\entities\user_management;

class Logs_entity extends \Mobiledrs\entities\Entity {
	
	protected $user_log_id;
	protected $user_log_userID;
	protected $user_log_time;
	protected $user_log_date;
	protected $user_log_description;
	protected $user_log_link;

	protected $user_id; 
	protected $user_firstname;
	protected $user_lastname;
	protected $user_email;
	protected $user_dateCreated;
	protected $user_password;
	protected $user_roleID;
	protected $user_sessionID;
	protected $user_archive;
}