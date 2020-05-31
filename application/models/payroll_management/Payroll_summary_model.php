<?php

class Payroll_summary_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'payroll_summary';

	protected $entity = '\Mobiledrs\entities\payroll_management\Payroll_summary_entity';

	public function __construct()
	{
		parent::__construct();
	}

	public function save($details, $mileageQty)
	{
		$provider_id = $details[0];
		$from = $details[1];
		$to = $details[2];

		$hasRecord = $this->get($provider_id, $from, $to);
		if ($hasRecord) {
			$params = [
				'data' => [
					'mileage' => $mileageQty
				],
				'key' => 'provider_id',
				'value' => $provider_id 
			];

			$this->update($params);
		} else {
			$params = [
				'data' => [
					'provider_id' => $provider_id,
					'from' => $from,
					'to' => $to,
					'mileage' => $mileageQty
				]
			];

			$this->insert($params);	
		}
	}

	public function get($fromDate, $toDate, $provider_id = null)
	{
		$whereQuery = [
			[
				'key' => 'from',
				'condition' => '=',
				'value' => $fromDate
			],
			[
				'key' => 'to',
				'condition' => '=',
				'value' => $toDate
			]
		];

		if (!empty($provider_id)) {
			$whereQuery[] = [
				'key' => 'provider_id',
				'condition' => '=',
				'value' => $provider_id
			];
		}

		$params = [ 'where' => $whereQuery ];

		return !empty($provider_id) ? 
			$this->record($params) : 
			$this->records($params);
	}
}