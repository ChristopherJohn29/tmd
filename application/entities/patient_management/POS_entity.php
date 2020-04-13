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
		if ($tov_id == tv_entity::INITIAL_VISIT_HOME) {
			return 'POS12';
		} else if ($tov_id == tv_entity::FOLLOW_UP_HOME) {
			return 'POS12';
		} else if ($tov_id == tv_entity::INITIAL_VISIT_FACILITY) {
			return 'POS13';
		} else if ($tov_id == tv_entity::FOLLOW_UP_FACILITY) {
			return 'POS13';
		} else {
			return '';
		}
	}

	public function get_pos_completename(string $pos_id) : string
	{
		return $this->pos_list[$pos_id] . ' - ' . $this->pos_name;
	}
}