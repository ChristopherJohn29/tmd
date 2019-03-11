<?php

namespace Mobiledrs\entities\patient_management;

class Type_visit_entity extends \Mobiledrs\entities\Entity {

	const INITIAL_VISIT_HOME = 1;
	const INITIAL_VISIT_FACILITY = 2;
	const FOLLOW_UP_HOME = 3;
	const FOLLOW_UP_FACILITY = 4;
	const NO_SHOW = 5;
	const CANCELLED = 6;
	const INITIAL_VISIT_OFFICE = 7;
	const FOLLOW_UP_OFFICE = 8;

	protected $tov_id; 
	protected $tov_name;
	
	public static function get_visits_list() : array
	{
		return [
			self::INITIAL_VISIT_HOME,
			self::INITIAL_VISIT_FACILITY,
			self::FOLLOW_UP_HOME,
			self::FOLLOW_UP_FACILITY,
			self::INITIAL_VISIT_OFFICE,
			self::FOLLOW_UP_OFFICE,
		];
	}

	public static function get_all_visits_list() : array
	{
		return [
			self::INITIAL_VISIT_HOME,
			self::INITIAL_VISIT_FACILITY,
			self::FOLLOW_UP_HOME,
			self::FOLLOW_UP_FACILITY,
			self::INITIAL_VISIT_OFFICE,
			self::FOLLOW_UP_OFFICE,
			self::NO_SHOW,
			self::CANCELLED,
		];
	}

	public function get_initial_list() : array
	{
		return [
			self::INITIAL_VISIT_HOME,
			self::INITIAL_VISIT_FACILITY,
			self::INITIAL_VISIT_OFFICE
		];
	}

	public function get_followup_list() : array
	{
		return [
			self::FOLLOW_UP_HOME,
			self::FOLLOW_UP_FACILITY,
			self::FOLLOW_UP_OFFICE
		];
	}
}