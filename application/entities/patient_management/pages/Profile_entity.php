<?php

namespace Mobiledrs\entities\patient_management\pages;

class Profile_entity extends \Mobiledrs\entities\Entity {

	private $noShow = 5;
	private $cancelled = 6;

	public function is_sel_noshow_cancelled(string $pt_tovID) : bool
	{
		return $pt_tovID == $this->noShow || $pt_tovID == $this->cancelled;
	}
}