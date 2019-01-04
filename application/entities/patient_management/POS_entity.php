<?php

namespace Mobiledrs\entities\patient_management;

class POS_entity extends \Mobiledrs\entities\Entity {

	protected $pos_id;
	protected $pos_code;
	protected $pos_name;

	private $pos_list = [
		1 => 'POS11',
		2 => 'POS12',
		3 => 'POS13',
		4 => 'POS14'
	];

	public function get_pos_name(string $pos_id) : string
	{
		return $this->pos_list[$pos_id];
	}
}