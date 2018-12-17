<?php

namespace Mobiledrs\entities\patient_management\pages;

class Transactions_entity {

	private $datas = null;
	private $initialVisitHome = 1;
	private $initialVisitFacility = 2;
	private $tab_lists = [];

	public function set_datas($datas)
	{
		$this->datas = $datas;
	}

	public function has_initial_records(string $tov_id) : bool
	{
		foreach ($this->datas as $data) {
			if (($tov_id == $this->initialVisitHome || $tov_id == $this->initialVisitFacility) && 
				($data->pt_tovID == $this->initialVisitHome || $data->pt_tovID == $this->initialVisitFacility))
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
			if ($this->initialVisitHome == $sel_tov_id || $this->initialVisitFacility == $sel_tov_id)
			{
				$new_tovs[] = $tov;

				continue;
			}
			// record type of visit selected is NOT initial (Home / Facility)
			// do NOT include it in the dropdown list
			else if (($sel_tov_id != $this->initialVisitHome || $sel_tov_id != $this->initialVisitFacility) &&
				($this->initialVisitHome == $tov->tov_id || $this->initialVisitFacility == $tov->tov_id))
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
}