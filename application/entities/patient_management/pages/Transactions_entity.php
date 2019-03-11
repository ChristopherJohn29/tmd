<?php

namespace Mobiledrs\entities\patient_management\pages;

use \Mobiledrs\entities\patient_management\Type_visit_entity;

class Transactions_entity {

	private $tab_lists = [];
	private $type_visit_entity = null;

	public function __construct()
	{
		$this->type_visit_entity = new Type_visit_entity();
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