<?php

namespace Mobiledrs\entities\superbill_management;

use \Mobiledrs\entities\patient_management\Type_visit_entity;

class Superbill_entity {

	private const AW_CODES_G0402 = 'G0402';
	private const AW_CODE_G0438 = 'G0438';
	private const AW_CODE_G0439 = 'G0439';
	private $type_of_visits = null;
	private $transactions = null;

	public function __construct(array $transactions = [])
	{
		$this->type_of_visits = new Type_visit_entity();
		$this->transactions = $transactions;
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

			if ($transaction->pt_acp == '1')
			{
				$summary['ACP'] += 1;
				$summary['total'] += 1;
			}

			if ($transaction->pt_diabetes == '1')
			{
				$summary['DM'] += 1;
				$summary['total'] += 1;
			}

			if ($transaction->pt_tobacco == '1')
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

		return $sel_list;
	}
}