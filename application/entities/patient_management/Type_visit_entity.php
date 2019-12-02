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

	public function filterRecords($trans_id, $tovs) : array
	{
		$filteredTovs = [];

		$otherList = [
			self::NO_SHOW,
			self::CANCELLED
		];

		foreach ($tovs as $tov) {
			$tovInitialType = in_array($trans_id, $this->get_initial_list()) && 
				in_array($tov->tov_id, $this->get_initial_list());

			$tovFollowupType = in_array($trans_id, $this->get_followup_list()) && 
				in_array($tov->tov_id, $this->get_followup_list());

			if ($tovInitialType) {
				$filteredTovs[] = $tov;
			}

			if ($tovFollowupType) {
				$filteredTovs[] = $tov;
			}

			if (in_array($tov->tov_id, $otherList)) {
				$filteredTovs[] = $tov;	
			}
		}

		return $filteredTovs;
	}
}