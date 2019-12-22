<?php

class Scheduled_holidays_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'scheduled_holidays';
	protected $entity = '\Mobiledrs\entities\scheduled_holidays_management\Scheduled_holidays_entity';
	protected $record_entity = null;

	public function __construct()
	{
		parent::__construct();

		$this->record_entity = new \Mobiledrs\entities\scheduled_holidays_management\Scheduled_holidays_entity();
	}

	public function prepare_data() : array
	{
		$this->prepare_entity_data();

		return [
			'sh_description' => $this->record_entity->sh_description,
			'sh_date' => $this->record_entity->set_date_format($this->record_entity->sh_date)
		];
	}
}