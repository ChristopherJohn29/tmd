<?php

class Type_visit_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'type_of_visits';
	protected $entity = '\Mobiledrs\entities\patient_management\Type_visit_entity';

	public function __construct()
	{
		parent::__construct();
	}
}