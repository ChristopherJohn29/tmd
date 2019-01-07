<?php

namespace Mobiledrs\entities\patient_management\pages;

use \Mobiledrs\entities\patient_management\Type_visit_entity;

class Transactions_entity {

	private $datas = null;
	private $tab_lists = [];
	private $type_visit_entity = null;

	public function __construct()
	{
		$this->type_visit_entity = new Type_visit_entity();
	}

	public function set_datas($datas)
	{
		$this->datas = $datas;
	}

	public function has_initial_records(string $tov_id) : bool
	{
		foreach ($this->datas as $data) {
			if ((in_array($tov_id, $this->type_visit_entity->get_initial_list())) && 
				(in_array($data->pt_tovID, $this->type_visit_entity->get_initial_list())))
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
			// record type of visit selected is initial (Home / Facility / Office)
			// include it in the dropdown list
			if (in_array($sel_tov_id, $this->type_visit_entity->get_initial_list()) &&
				(in_array($tov->tov_id, $this->type_visit_entity->get_initial_list())))
			{
				$new_tovs[] = $tov;

				continue;
			}
			// record type of visit selected is NOT initial (Home / Facility / Office)
			// do NOT include it in the dropdown list
			else if (in_array($sel_tov_id, $this->type_visit_entity->get_followup_list()) && 
				in_array($tov->tov_id, $this->type_visit_entity->get_followup_list()))
			{
				$new_tovs[] = $tov;

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
		return $tov_id == $this->type_visit_entity::NO_SHOW || $tov_id == $this->type_visit_entity::CANCELLED;
	}
}