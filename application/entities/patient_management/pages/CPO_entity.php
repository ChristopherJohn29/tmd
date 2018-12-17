<?php

namespace Mobiledrs\entities\patient_management\pages;

class CPO_entity {

	private $datas = null;
	private $max_cpo_add = 2;

	public function set_data(array $datas)
	{
		$this->datas = $datas;
	}

	public function cpo_cert_button() : bool
	{
		return count($this->datas) == $this->max_cpo_add ? false : true;
	}
}