<?php

namespace Mobiledrs\entities\patient_management\pages;

class Profile_entity extends \Mobiledrs\entities\Entity {

	public function is_sel_noshow_cancelled(string $pt_tovID) : bool
	{
		return $pt_tovID == \Mobiledrs\entities\patient_management\Type_visit_entity::NO_SHOW || 
			$pt_tovID == \Mobiledrs\entities\patient_management\Type_visit_entity::CANCELLED;
	}
}