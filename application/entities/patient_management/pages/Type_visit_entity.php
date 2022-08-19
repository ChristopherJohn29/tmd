<?php

namespace Mobiledrs\entities\patient_management\pages;

use \Mobiledrs\entities\patient_management\Type_visit_entity as tv_entity;

class Type_visit_entity {

	private $transaction_list = null;
	private $type_visit_list = null;
	private $type_visit_entity = null;

	public function __construct(array $transaction_list, array $type_visit_list)
	{
		$this->transaction_list = $transaction_list;
		$this->type_visit_list = $type_visit_list;
		$this->type_visit_entity = new tv_entity();
	}

	public function get_list() :  array
	{
		$has_initial_follow_list = false;

		foreach ($this->transaction_list as $transaction) 
		{
			if (in_array($transaction->pt_tovID, $this->type_visit_entity->get_visits_list()))
			{
				$has_initial_follow_list = true;

				break;
			}
		}

		$new_type_visit_list = [];

		foreach ($this->type_visit_list as $type_visit)
		{
			if (in_array($type_visit->tov_id, $this->type_visit_entity->get_initial_list()) && 
				$has_initial_follow_list)
			{
				continue;
			}

			$new_type_visit_list[] = $type_visit;
		}

		return $new_type_visit_list;
	}


	public function get_list_non_ca() :  array
	{
		$has_initial_follow_list = false;

		foreach ($this->transaction_list as $transaction) 
		{
			if (in_array($transaction->pt_tovID, $this->type_visit_entity->get_visits_list()))
			{
				$has_initial_follow_list = true;

				break;
			}
		}

		$new_type_visit_list = [];

		foreach ($this->type_visit_list as $type_visit)
		{
			if (in_array($type_visit->tov_id, $this->type_visit_entity->get_initial_list()) && 
				$has_initial_follow_list)
			{
				continue;
			}

			if (in_array($type_visit->tov_id, $this->type_visit_entity->get_ca_list()) )
			{
				continue;
			}

			$new_type_visit_list[] = $type_visit;
		}

		return $new_type_visit_list;
	}
}