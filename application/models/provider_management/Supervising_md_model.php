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

	public function get_supervisingMD_detail($id) {
		$this->db->where('provider_id', $id);

		$query = $this->db->get($this->table_name);

		return $query->row();
	}

	public function get_supervisingMD_details($datas) {
		$newDatas = [];

		foreach ($datas as $data) {
			$tmpData = $data;

			if (gettype($data) == 'object') {
				$supervisingMD_detail = $this->get_supervisingMD_detail($data->pt_supervising_mdID);	

				$tmpData->supervisingMD_firstname = '';
				$tmpData->supervisingMD_lastname = '';

				if ($supervisingMD_detail) {
					$tmpData->supervisingMD_firstname = $supervisingMD_detail->provider_firstname;
					$tmpData->supervisingMD_lastname = $supervisingMD_detail->provider_lastname;	
				}

			} else {
				$supervisingMD_detail = $this->get_supervisingMD_detail($data['pt_supervising_mdID']);	

				$tmpData['supervisingMD_firstname'] = '';
				$tmpData['supervisingMD_lastname'] = '';

				if ($supervisingMD_detail) {
					$tmpData['supervisingMD_firstname'] = $supervisingMD_detail->provider_firstname;
					$tmpData['supervisingMD_lastname'] = $supervisingMD_detail->provider_lastname;	
				}
			}

			$newDatas[] = $tmpData;
		}

		return $newDatas;
	}
}