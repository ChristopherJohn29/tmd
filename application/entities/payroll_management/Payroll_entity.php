<?php

namespace Mobiledrs\entities\payroll_management;

class Payroll_entity {

	private $provider_details = null;
	private $provider_transactions = null;
	private $type_of_visits = null;

	public function __construct(
		$provider_details,
		array $provider_transactions
	)
	{
		$this->provider_details = $provider_details;
		$this->provider_transactions = $provider_transactions;
		$this->type_of_visits = new \Mobiledrs\entities\patient_management\Type_visit_entity();
	}

	public function compute_payment_summary() : array
	{
		$computed = [
			'initial_visit_home' => [
				'qty' => 0,
				'amount' => $this->provider_details->provider_rate_initialVisit,
				'total' => 0
			],
			'initial_visit_facility' => [
				'qty' => 0,
				'amount' => $this->provider_details->provider_rate_initialVisit,
				'total' => 0
			],
			'initial_visit_telehealth' => [
				'qty' => 0,
				'amount' => $this->provider_details->provider_rate_initialVisit_TeleHealth,
				'total' => 0
			],
			'follow_up_home' => [
				'qty' => 0,
				'amount' => $this->provider_details->provider_rate_followUpVisit,
				'total' => 0
			],
			'follow_up_facility' => [
				'qty' => 0,
				'amount' => $this->provider_details->provider_rate_followUpVisit,
				'total' => 0
			],
			'follow_up_telehealth' => [
				'qty' => 0,
				'amount' => $this->provider_details->provider_rate_followUpVisit_TeleHealth,
				'total' => 0
			],
			'no_show' => [
				'qty' => 0,
				'amount' => $this->provider_details->provider_rate_noShowPT,
				'total' => 0
			],
			'aw_ippe' => [
				'qty' => 0,
				'amount' => $this->provider_details->provider_rate_aw,
				'total' => 0
			],
			'acp' => [
				'qty' => 0,
				'amount' => $this->provider_details->provider_rate_acp,
				'total' => 0
			],
			'mileage' => [
				'qty' => 0,
				'amount' => $this->provider_details->provider_rate_mileage,
				'total' => 0
			],
			'total_salary' => 0,
			'total_visits' => 0
		];

		foreach ($this->provider_transactions as $provider_transaction) 
		{
			if ((int) $provider_transaction->tov_id == $this->type_of_visits::CANCELLED)
			{
				break;
			}

			if ((int) $provider_transaction->tov_id == $this->type_of_visits::INITIAL_VISIT_HOME)
			{
				$computed['initial_visit_home']['qty'] += 1;

				$computed['total_visits'] += 1;
			}
			else if ((int) $provider_transaction->tov_id == $this->type_of_visits::INITIAL_VISIT_FACILITY)
			{
				$computed['initial_visit_facility']['qty'] += 1;

				$computed['total_visits'] += 1;
			}
			else if ((int) $provider_transaction->tov_id == $this->type_of_visits::INITIAL_VISIT_TELEHEALTH)
			{
				$computed['initial_visit_telehealth']['qty'] += 1;

				$computed['total_visits'] += 1;
			}
			else if ((int) $provider_transaction->tov_id == $this->type_of_visits::FOLLOW_UP_HOME)
			{
				$computed['follow_up_home']['qty'] += 1;

				$computed['total_visits'] += 1;
			}
			else if ((int) $provider_transaction->tov_id == $this->type_of_visits::FOLLOW_UP_FACILITY)
			{
				$computed['follow_up_facility']['qty'] += 1;

				$computed['total_visits'] += 1;
			}
			else if ((int) $provider_transaction->tov_id == $this->type_of_visits::FOLLOW_UP_TELEHEALTH)
			{
				$computed['follow_up_telehealth']['qty'] += 1;

				$computed['total_visits'] += 1;
			}
			else if ((int) $provider_transaction->tov_id == $this->type_of_visits::NO_SHOW)
			{
				$computed['no_show']['qty'] += 1;

				$computed['total_visits'] += 1;
			}

			if ($provider_transaction->is_aw_performed()) {
				$computed['aw_ippe']['qty'] += 1;
			}
			
			if ($provider_transaction->is_acp_selected()) {
				$computed['acp']['qty'] += 1;
			}
			
			if ($provider_transaction->has_mileage()) {
				$computed['mileage']['qty'] += ((float) $provider_transaction->pt_mileage);
			}
		}

		$computed['initial_visit_home']['total'] = $computed['initial_visit_home']['qty'] * 
			$computed['initial_visit_home']['amount'];

		$computed['total_salary'] += $computed['initial_visit_home']['total'];

		$computed['initial_visit_facility']['total'] = $computed['initial_visit_facility']['qty'] * 
			$computed['initial_visit_facility']['amount'];
		
		$computed['total_salary'] += $computed['initial_visit_facility']['total'];

		if ( ! empty($this->provider_details->provider_rate_initialVisit_TeleHealth))
		{
			$computed['initial_visit_telehealth']['total'] = $computed['initial_visit_telehealth']['qty'] * 
				$computed['initial_visit_telehealth']['amount'];

			$computed['total_salary'] += $computed['initial_visit_telehealth']['total'];
		}

		$computed['follow_up_home']['total'] = $computed['follow_up_home']['qty'] * 
			$computed['follow_up_home']['amount'];

		$computed['total_salary'] += $computed['follow_up_home']['total'];
		
		$computed['follow_up_facility']['total'] = $computed['follow_up_facility']['qty'] * 
			$computed['follow_up_facility']['amount'];

		$computed['total_salary'] += $computed['follow_up_facility']['total'];

		if ( ! empty($this->provider_details->provider_rate_followUpVisit_TeleHealth))
		{
			$computed['follow_up_telehealth']['total'] = $computed['follow_up_telehealth']['qty'] * 
				$computed['follow_up_telehealth']['amount'];

			$computed['total_salary'] += $computed['follow_up_telehealth']['total'];
		}
		
		$computed['no_show']['total'] = $computed['no_show']['qty'] * 
			$computed['no_show']['amount'];

		$computed['total_salary'] += $computed['no_show']['total'];
		
		$computed['aw_ippe']['total'] = $computed['aw_ippe']['qty'] * 
			$computed['aw_ippe']['amount'];

		$computed['total_salary'] += $computed['aw_ippe']['total'];
		
		$computed['acp']['total'] = $computed['acp']['qty'] * 
			$computed['acp']['amount'];

		$computed['total_salary'] += $computed['acp']['total'];
		
		$computed['mileage']['total'] = $computed['mileage']['qty'] * 
			$computed['mileage']['amount'];

		$computed['total_salary'] += $computed['mileage']['total'];

		return $computed;
	}

	public function format_display_list() : array
	{
		$new_providers_list = [];
		$providers_added = [];

		for ($i = 0; $i < count($this->provider_transactions); $i++)
		{
			if (in_array($this->provider_transactions[$i]['provider_id'], $providers_added))
			{
				continue;
			}

			$new_providers_list[] = $this->provider_transactions[$i];
			$providers_added[] = $this->provider_transactions[$i]['provider_id'];
		}

		return $new_providers_list;
	}
}