<?php

namespace Mobiledrs\entities\patient_management\pages;

class Profile_details_entity {

	private $cpo_data = null;

	public function set_cpo_data(array $data)
	{
		$this->cpo_data = $data;
	}

	public function cpo_cert_button() : bool
	{
		$max_cpo_add = 2;

		return count($this->cpo_data) == $max_cpo_add ? false : true;
	}
}