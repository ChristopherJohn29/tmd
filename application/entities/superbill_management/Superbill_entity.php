<?php

namespace Mobiledrs\entities\superbill_management;

use \Mobiledrs\entities\patient_management\Type_visit_entity;
use \Mobiledrs\entities\patient_management\CPO_entity;

class Superbill_entity {

	private const AW_CODES_G0402 = 'G0402';
	private const AW_CODE_G0438 = 'G0438';
	private const AW_CODE_G0439 = 'G0439';
	private $type_of_visits = null;
	private $transactions = null;
	private $CPOs = null;

	public function __construct(array $transactions = [], array $CPOs = [])
	{
		$this->type_of_visits = new Type_visit_entity();
		$this->transactions = $transactions;
		$this->CPOs = $CPOs;
	}

	public function compute_transaction_aw_summary() : array
	{
		$summary = [
			'AW_CODES_G0402' => 0,
			'AW_CODE_G0438' => 0,
			'AW_CODE_G0439' => 0,
			'total' => 0
		];

		foreach ($this->transactions as $transaction)
		{
			if ( ! $transaction->is_aw_performed() && 
				(empty($transaction->pt_aw_ippe_code) || (  ! empty($transaction->pt_aw_ippe_code))))
			{
				continue;
			}

			if ($transaction->pt_aw_ippe_code == self::AW_CODES_G0402)
			{
				$summary['AW_CODES_G0402'] += 1;
				$summary['total'] += 1;
			}
			else if ($transaction->pt_aw_ippe_code == self::AW_CODE_G0438)
			{
				$summary['AW_CODE_G0438'] += 1;
				$summary['total'] += 1;
			}
			else if ($transaction->pt_aw_ippe_code == self::AW_CODE_G0439)
			{
				$summary['AW_CODE_G0439'] += 1;
				$summary['total'] += 1;
			}
		}

		return $summary;
	}

	public function compute_transaction_hv_summary() : array
	{
		$summary = [
			'INITIAL_VISIT_HOME' => 0,
			'FOLLOW_UP_HOME' => 0,
			'ACP' => 0,
			'DM' => 0,
			'TOBACCO' => 0,
			'total' => 0
		];

		foreach ($this->transactions as $transaction)
		{
			if ($transaction->pt_tovID == $this->type_of_visits::INITIAL_VISIT_HOME)
			{
				$summary['INITIAL_VISIT_HOME'] += 1;
				$summary['total'] += 1;
			}
			else if ($transaction->pt_tovID == $this->type_of_visits::FOLLOW_UP_HOME)
			{
				$summary['FOLLOW_UP_HOME'] += 1;
				$summary['total'] += 1;
			}

			if ($transaction->is_acp_selected())
			{
				$summary['ACP'] += 1;
				$summary['total'] += 1;
			}

			if ($transaction->is_diabetes_selected())
			{
				$summary['DM'] += 1;
				$summary['total'] += 1;
			}

			if ($transaction->is_tobacco_selected())
			{
				$summary['TOBACCO'] += 1;
				$summary['total'] += 1;
			}
		}

		return $summary;
	}

	public function compute_transaction_fv_summary() : array
	{
		$summary = [
			'INITIAL_VISIT_FACILITY' => 0,
			'FOLLOW_UP_FACILITY' => 0,
			'AW_CODES_G0402' => 0,
			'AW_CODE_G0438' => 0,
			'AW_CODE_G0439' => 0,
			'total' => 0
		];

		foreach ($this->transactions as $transaction)
		{
			if ($transaction->pt_aw_ippe_code == self::AW_CODES_G0402)
			{
				$summary['AW_CODES_G0402'] += 1;
				$summary['total'] += 1;
			}
			else if ($transaction->pt_aw_ippe_code == self::AW_CODE_G0438)
			{
				$summary['AW_CODE_G0438'] += 1;
				$summary['total'] += 1;
			}
			else if ($transaction->pt_aw_ippe_code == self::AW_CODE_G0439)
			{
				$summary['AW_CODE_G0439'] += 1;
				$summary['total'] += 1;
			}

			if ($transaction->pt_tovID == $this->type_of_visits::INITIAL_VISIT_FACILITY)
			{
				$summary['INITIAL_VISIT_FACILITY'] += 1;
				$summary['total'] += 1;
			}
			else if ($transaction->pt_tovID == $this->type_of_visits::FOLLOW_UP_FACILITY)
			{
				$summary['FOLLOW_UP_FACILITY'] += 1;
				$summary['total'] += 1;
			}
		}

		return $summary;
	}

	public function compute_transaction_tv_summary() : array
	{
		$summary = [
			'INITIAL_VISIT_TELEHEALTH' => 0,
			'FOLLOW_UP_TELEHEALTH' => 0,
			'AW_CODES_G0402' => 0,
			'AW_CODE_G0438' => 0,
			'AW_CODE_G0439' => 0,
			'total' => 0
		];

		foreach ($this->transactions as $transaction)
		{
			if ($transaction->pt_aw_ippe_code == self::AW_CODES_G0402)
			{
				$summary['AW_CODES_G0402'] += 1;
				$summary['total'] += 1;
			}
			else if ($transaction->pt_aw_ippe_code == self::AW_CODE_G0438)
			{
				$summary['AW_CODE_G0438'] += 1;
				$summary['total'] += 1;
			}
			else if ($transaction->pt_aw_ippe_code == self::AW_CODE_G0439)
			{
				$summary['AW_CODE_G0439'] += 1;
				$summary['total'] += 1;
			}

			if ($transaction->pt_tovID == $this->type_of_visits::INITIAL_VISIT_TELEHEALTH)
			{
				$summary['INITIAL_VISIT_TELEHEALTH'] += 1;
				$summary['total'] += 1;
			}
			else if ($transaction->pt_tovID == $this->type_of_visits::FOLLOW_UP_TELEHEALTH)
			{
				$summary['FOLLOW_UP_TELEHEALTH'] += 1;
				$summary['total'] += 1;
			}
		}

		return $summary;
	}

	public function compute_transaction_aw_summary_unbill() : array
	{
		$summary = [];

		foreach ($this->transactions as $transaction)
		{

			$billDate = date_format(date_create($transaction->pt_aw_billed), 'm/d/Y');
			// $billDate = $transaction->pt_aw_billed;

			if(isset($summary[$billDate])){
				$summary[$billDate] = $summary[$billDate] + 1;
			} else {
				$summary[$billDate] = 1;
			}
		}


		ksort($summary);
		
		return $summary;
	}

	public function compute_transaction_tv_summary_unbill() : array
	{
		$summary = [];

		foreach ($this->transactions as $transaction)
		{
			$billDate = date_format(date_create($transaction->pt_visitBilled), 'm/d/Y');

			if(isset($summary[$billDate])){
				$summary[$billDate] = $summary[$billDate] + 1;
			} else {
				$summary[$billDate] = 1;
			}
		}

		ksort($summary);

		return $summary;
	}

	public function compute_transaction_fv_summary_unbill() : array
	{
		$summary = [];

		foreach ($this->transactions as $transaction)
		{
			$billDate = date_format(date_create($transaction->pt_visitBilled), 'm/d/Y');

			if(isset($summary[$billDate])){
				$summary[$billDate] = $summary[$billDate] + 1;
			} else {
				$summary[$billDate] = 1;
			}
		}


		ksort($summary);
		
		return $summary;
	}

	public function compute_transaction_hv_summary_unbill() : array
	{
		$summary = [];

		foreach ($this->transactions as $transaction)
		{
			$billDate = date_format(date_create($transaction->pt_visitBilled), 'm/d/Y');

			if(isset($summary[$billDate])){
				$summary[$billDate] = $summary[$billDate] + 1;
			} else {
				$summary[$billDate] = 1;
			}
		}


		ksort($summary);
		
		return $summary;
	}


	public function compute_transaction_ca_summary() : array
	{
		$summary = [
			'COGNITIVE_HOME' => 0,
			'COGNITIVE_TELEHEALTH' => 0,
			'AW_CODES_G0402' => 0,
			'AW_CODE_G0438' => 0,
			'AW_CODE_G0439' => 0,
			'total' => 0
		];

		foreach ($this->transactions as $transaction)
		{
	

			if ($transaction->pt_tovID == $this->type_of_visits::COGNITIVE_HOME)
			{
				$summary['COGNITIVE_HOME'] += 1;
				$summary['total'] += 1;
			}
			else if ($transaction->pt_tovID == $this->type_of_visits::COGNITIVE_TELEHEALTH)
			{
				$summary['COGNITIVE_TELEHEALTH'] += 1;
				$summary['total'] += 1;
			}
		}

		return $summary;
	}

	public function compute_transaction_ca_summary_unbill() : array
	{
		$summary = [];

		foreach ($this->transactions as $transaction)
		{
			$billDate = date_format(date_create($transaction->pt_visitBilled), 'm/d/Y');

			if(isset($summary[$billDate])){
				$summary[$billDate] = $summary[$billDate] + 1;
			} else {
				$summary[$billDate] = 1;
			}

			
		}


		ksort($summary);
		
		return $summary;
	}

	public function get_sel_type_visit(string $sel_type) : array
	{
		$sel_list = [];

		if ($sel_type == 'hv')
		{
			$sel_list[] = $this->type_of_visits::INITIAL_VISIT_HOME;
			$sel_list[] = $this->type_of_visits::FOLLOW_UP_HOME;
		}
		else if ($sel_type == 'fv')
		{
			$sel_list[] = $this->type_of_visits::INITIAL_VISIT_FACILITY;
			$sel_list[] = $this->type_of_visits::FOLLOW_UP_FACILITY;
		}
		else if ($sel_type == 'tv')
		{
			$sel_list[] = $this->type_of_visits::INITIAL_VISIT_TELEHEALTH;
			$sel_list[] = $this->type_of_visits::FOLLOW_UP_TELEHEALTH;
		}else if ($sel_type == 'ca')
		{
			$sel_list[] = $this->type_of_visits::COGNITIVE_HOME;
			$sel_list[] = $this->type_of_visits::COGNITIVE_TELEHEALTH;
		}

		return $sel_list;
	}

	public function compute_CPO_unbill() : array
	{
		$summary = [];

		

		foreach ($this->CPOs as $transaction)
		{
			
			$billDate = date_format(date_create($transaction->ptcpo_dateBilled), 'm/d/Y');

			if(isset($summary[$billDate])){
				$summary[$billDate] = $summary[$billDate] + 1;
			} else {
				$summary[$billDate] = 1;
			}

		}



		ksort($summary);
		
		return $summary;
	}

	public function compute_CPO() : array
	{
		$summary = [
			'certification' => 0,
			'recertification' => 0,
			'date_Signed' => 0,
			'first_Month_CPO' => 0,
			'second_Month_CPO' => 0,
			'third_Month_CPO' => 0,
			'Recert_Date_Signed' => 0,
			'Refirst_Month_CPO' => 0,
			'Resecond_Month_CPO' => 0,
			'Rethird_Month_CPO' => 0,
			'total' => 0
		];

		foreach ($this->CPOs as $cpo)
		{
			if ($cpo->ptcpo_status == CPO_entity::CERTIFICATION)
			{
				$summary['certification'] += 1;
				$summary['total'] += 1;

				if ($cpo->ptcpo_firstMonthCPO && $cpo->ptcpo_firstMonthCPO != ' - ')
				{
					$summary['first_Month_CPO'] += 1;
					$summary['total'] += 1;
				}

				if ($cpo->ptcpo_secondMonthCPO && $cpo->ptcpo_secondMonthCPO != ' - ')
				{
					$summary['second_Month_CPO'] += 1;
					$summary['total'] += 1;
				}

				if ($cpo->ptcpo_thirdMonthCPO && $cpo->ptcpo_thirdMonthCPO != ' - ')
				{
					$summary['third_Month_CPO'] += 1;
					$summary['total'] += 1;
				}
			} 
			else if ($cpo->ptcpo_status == CPO_entity::RECERTIFICATION) 
			{
				$summary['recertification'] += 1;
				$summary['total'] += 1;

				if ($cpo->ptcpo_firstMonthCPO && $cpo->ptcpo_firstMonthCPO != ' - ')
				{
					$summary['Refirst_Month_CPO'] += 1;
					$summary['total'] += 1;
				}

				if ($cpo->ptcpo_secondMonthCPO && $cpo->ptcpo_secondMonthCPO != ' - ')
				{
					$summary['Resecond_Month_CPO'] += 1;
					$summary['total'] += 1;
				}

				if ($cpo->ptcpo_thirdMonthCPO && $cpo->ptcpo_thirdMonthCPO != ' - ')
				{
					$summary['Rethird_Month_CPO'] += 1;
					$summary['total'] += 1;
				}
			}
		}

		return $summary;
	}
}