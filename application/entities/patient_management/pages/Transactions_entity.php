<?php

namespace Mobiledrs\entities\patient_management\pages;

use \Mobiledrs\entities\patient_management\Type_visit_entity;

class Transactions_entity {

	private $datas = null;
	private $tab_lists = [];

	public function set_datas($datas)
	{
		$this->datas = $datas;
	}

	public function has_initial_records(string $tov_id) : bool
	{
		foreach ($this->datas as $data) {
			if (($tov_id == Type_visit_entity::INITIAL_VISIT_HOME || 
				$tov_id == Type_visit_entity::INITIAL_VISIT_FACILITY) && 
				($data->pt_tovID == Type_visit_entity::INITIAL_VISIT_HOME || 
				$data->pt_tovID == Type_visit_entity::INITIAL_VISIT_FACILITY))
			{
				return true;
			}
		}

		return false;
	}

	public function get_type_visits(array $tovs, string $sel_tov_id) : array
	{
		$new_tovs = [];

		foreach ($tovs as $tov) {
			// record type of visit selected is initial (Home / Facility)
			// include it in the dropdown list
			if (Type_visit_entity::INITIAL_VISIT_HOME == $sel_tov_id || 
				Type_visit_entity::INITIAL_VISIT_FACILITY == $sel_tov_id)
			{
				$new_tovs[] = $tov;

				continue;
			}
			// record type of visit selected is NOT initial (Home / Facility)
			// do NOT include it in the dropdown list
			else if (($sel_tov_id != Type_visit_entity::INITIAL_VISIT_HOME || 
				$sel_tov_id != Type_visit_entity::INITIAL_VISIT_FACILITY) &&
				(Type_visit_entity::INITIAL_VISIT_HOME == $tov->tov_id || 
				Type_visit_entity::INITIAL_VISIT_FACILITY == $tov->tov_id))
			{
				continue;
			}

			$new_tovs[] = $tov;
		}

		return $new_tovs;
	}

	public function not_in_tab_list(string $tov_id) : bool
	{
		return ! in_array($tov_id, $this->tab_lists);
	}

	public function is_tov_sel_noshow_cancelled(string $tov_id) : bool
	{
		return $tov_id == Type_visit_entity::NO_SHOW || $tov_id == Type_visit_entity::CANCELLED;
	}
}