<?php

class Supervising_md_model extends Mobiledrs\core\MY_Models {
	
	protected $table_name = 'provider';
	protected $entity = '\Mobiledrs\entities\provider_management\Profile_entity';
	protected $record_entity = null;

	public function __construct()
	{
		parent::__construct();

		$this->record_entity = new \Mobiledrs\entities\provider_management\Profile_entity();
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