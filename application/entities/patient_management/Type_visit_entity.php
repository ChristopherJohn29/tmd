<?php

namespace Mobiledrs\entities\patient_management;

class Type_visit_entity extends \Mobiledrs\entities\Entity {

	const INITIAL_VISIT_HOME = 1;
	const INITIAL_VISIT_FACILITY = 2;
	const FOLLOW_UP_HOME = 3;
	const FOLLOW_UP_FACILITY = 4;
	const NO_SHOW = 5;
	const CANCELLED = 6;

	protected $tov_id; 
	protected $tov_name;

	public static function get_visits_list() : array
	{
		return [
			self::INITIAL_VISIT_HOME,
			self::INITIAL_VISIT_FACILITY,
			self::FOLLOW_UP_HOME,
			self::FOLLOW_UP_FACILITY,
		];
	}
}