<?php

namespace Mobiledrs\core;

class MY_Models extends \CI_Model {
	protected $table_name = '';
	protected $limit = 0;
	protected $offset = 5;

	public function __construct()
	{
		parent::__construct();
	}

	public function insert(array $params) : int
	{
		$this->db->insert($this->table_name, $params['data']);

		return $this->db->insert_id();
	}

	public function update(array $params) : bool
	{
		return $this->db->update($this->table_name, $params['data'], [$params['key'] => $params['value']]);
	}

	public function record(array $params)
	{
		if (isset($params['key']))
		{
			$this->db->where($params['key'], $params['value']);
		}

		if (isset($params['where'])) 
		{
			foreach ($params['where'] as $key => $value) {
				$this->db->where(
					$value['key'] . ' ' .
					$value['condition'],
					$value['value']
				);
			}
		}

		if (isset($params['order_by'])) 
		{
			$this->db->order_by($params['order_key'], $params['order_by']);
		}

		if (isset($params['joins'])) 
		{
			foreach ($params['joins'] as $key => $value) 
			{
				$this->db->join(
					$value['join_table_name'],
					$value['join_table_key'] . ' ' .
					$value['join_table_condition'] . ' ' .
					$value['join_table_value'],
					$value['join_table_type']
				);
			}
		}

		if (isset($params['orders'])) 
		{
			foreach ($params['orders'] as $key => $value) 
			{
				$this->db->order_by($value['column'], $value['direction']);
			}
		}

		$query = $this->db->get($this->table_name);

		return $query->custom_row_object(0, $this->entity);
	}

	public function records(array $params = [])
	{
		if (isset($params['select']))
		{
			$this->db->select($params['select']);
		}

		if (isset($params['joins'])) 
		{
			foreach ($params['joins'] as $key => $value) 
			{
				$this->db->join(
					$value['join_table_name'],
					$value['join_table_key'] . ' ' .
					$value['join_table_condition'] . ' ' .
					$value['join_table_value'],
					$value['join_table_type']
				);
			}
		}

		if (isset($params['order_by'])) 
		{
			$this->db->order_by($params['key'], $params['order_by']);
		}

		if (isset($params['where'])) 
		{
			foreach ($params['where'] as $key => $value) {
				$this->db->where(
					$value['key'] . ' ' .
					$value['condition'],
					$value['value']
				);
			}
		}

		if (isset($params['orders'])) 
		{
			foreach ($params['orders'] as $key => $value) 
			{
				$this->db->order_by($value['column'], $value['direction']);
			}
		}

		if (isset($params['where_in']))
		{
			$this->db->where_in($params['where_in']['column'], $params['where_in']['values']);
		}

		if (isset($params['limit']))
		{
			$this->db->limit($params['limit']);
		}

		$query = $this->db->get($this->table_name, $this->limit, $this->offset);

		return $query->custom_result_object($this->entity);
	}

	public function find(array $params)
	{
		foreach ($params['where_data'] as $i => $search) {
			$like_func = ($i > 0) ? 'or_like' : 'like';

			$this->db->$like_func($search['key'], $search['value']);
		}
		
		$query = $this->db->get($this->table_name);

		return $query->custom_result_object($this->entity);
	}

	public function get_records_by_join(array $params)
	{	
		if (isset($params['joins'])) 
		{
			foreach ($params['joins'] as $key => $value) 
			{
				$this->db->join(
					$value['join_table_name'],
					$value['join_table_key'] . ' ' .
					$value['join_table_condition'] . ' ' .
					$value['join_table_value'],
					$value['join_table_type']
				);
			}
		}

		if (isset($params['where']))
		{
			foreach ($params['where'] as $value) {
				$this->db->where(
					$value['key'] . ' ' .
					$value['condition'],
					$value['value']
				);
			}
		}

		if (isset($params['whereOr']))
		{
			foreach ($params['whereOr'] as $i => $value) {
				if ($i > 0) {
					$this->db->or_where(
						$value['key'] . ' ' .
						$value['condition'],
						$value['value']
					);	
				} else {
					$this->db->where(
						$value['key'] . ' ' .
						$value['condition'],
						$value['value']
					);
				}
			}
		}

		if (isset($params['where_in_list'])) 
		{
			$this->db->where_in(
				$params['where_in_list']['key'], 
				$params['where_in_list']['values']
			);
		}

		if (isset($params['order'])) 
		{
			$this->db->order_by($params['order']['key'], $params['order']['by']);
		}

		if (isset($params['offset']))
		{
			$this->db->limit($params['limit'], $params['offset']);
		} else {
			if (isset($params['limit'])) {
				$this->db->limit($params['limit']);
			}
		}

		$query = $this->db->get($this->table_name);

		return (isset($params['return_type']) && $params['return_type'] == 'row') ?
			$query->custom_row_object(0, $this->entity) :
			$query->custom_result_object($this->entity);
	}

	public function delete_data(array $params)
	{
		$this->db->where($params['table_key'], $params['record_id']);

		return $this->db->update($this->table_name, [
			$params['column_archive'] => '1'
		]);
	}

	public function prepare_entity_data()
	{
		foreach($this->input->post() as $key => $value)
		{
			if (isset($this->excludes_list) && in_array($key, $this->excludes_list))
			{
				continue;
			}

			$this->record_entity->$key = $value;
		}
	}

	public function make_paid(array $params)
	{
		$dataToInsert = [];

		for ($i = 0; $i < count($params['data']); $i++)
		{ 
			$dataToInsert[] = [
				$params['columnID'] => $params['data'][$i],
				$params['columnPaid'] => date('Y-m-d')
			];
		}

		return $this->db->update_batch($this->table_name, $dataToInsert, $params['columnID']);
	}
}