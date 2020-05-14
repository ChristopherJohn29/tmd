<?php

namespace Mobiledrs\entities\patient_management;

use \Mobiledrs\entities\patient_management\Type_visit_entity as tv_entity;

class POS_entity extends \Mobiledrs\entities\Entity {

	protected $pos_id;
	protected $pos_code;
	protected $pos_name;

	private $pos_list = [
		1 => 'POS11',
		2 => 'POS12',
		3 => 'POS13',
		4 => 'POS14'
	];

	public function get_pos_name(string $tov_id) : string
	{
		$pos12 = [
			tv_entity::INITIAL_VISIT_HOME,
			tv_entity::INITIAL_VISIT_TELEHEALTH,
			tv_entity::FOLLOW_UP_HOME,
			tv_entity::FOLLOW_UP_TELEHEALTH
		];

		$pos13 = [
			tv_entity::INITIAL_VISIT_FACILITY,
			tv_entity::FOLLOW_UP_FACILITY
		];

		if (in_array($tov_id, $pos12)) {
			return 'POS12';
		} else if (in_array($tov_id, $pos13)) {
			return 'POS13';
		} else { echo '3';
			return '';
		}
	}

	public function get_pos_completename(string $pos_id) : string
	{
		return $this->pos_list[$pos_id] . ' - ' . $this->pos_name;
	}
}