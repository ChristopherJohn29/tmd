<?php

class Notes_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'home_health_care_notes';
	protected $entity = '\Mobiledrs\entities\home_health_care_management\Notes_entity';
    protected $record_entity = null;
    
    public function __construct()
	{
		parent::__construct();

		$this->record_entity = new \Mobiledrs\entities\home_health_care_management\Notes_entity();
	}

    public function prepare_data() : array
	{
        $this->prepare_entity_data();

		return [
			'hhcn_notes' => $this->record_entity->hhcn_notes,
            'hhcn_date' => $this->record_entity->set_date_format(date('Y-m-d')),
            'hhcn_userID' => $this->session->userdata('user_id'),
            'hhcn_hhcID' => $this->input->post('hhcn_hhcID')
		];
	}

}