<?php

class MY_Model extends CI_Model {
	protected $table_name = '';
	protected $limit = 0;
	protected $offset = 5;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	* @param array $params['data'] Values to be inserted in the database
	*/
	public function insert(array $params) : int
	{
		$this->db->insert($this->table_name, $params['data']);

		return $this->db->insert_id();
	}

	/**
	* @param array $params['data'] Values to be updated in the database
	* @param array $params['key'] Table key name
	* @param array $params['value'] Table column value
	*/
	public function update(array $params) : bool
	{
		return $this->db->update($this->table_name, $params['data'], [$params['key'] => $params['value']]);
	}

	/**
	* @param array $params['key'] Table key name
	* @param array $params['value'] Table column value
	*/
	public function record(array $params) : object
	{
		$this->db->where($params['key'], $params['value']);

		$query = $this->db->get($this->table_name);

		return $query->custom_row_object(0, $this->entity);
	}

	/**
	* @param array $params['key'] Table key name
	* @param array $params['order_by'] Order type [ASC | DESC]
	*/
	public function records(array $params = []) : array
	{
		if (isset($params['order_by'])) 
		{
			$this->db->order_by($params['key'], $params['order_by']);
		}

		$query = $this->db->get($this->table_name, $this->limit, $this->offset);

		return $query->result_array() ?? [];
	}

	/**
	* @param array $params['where_data'] an array of key, values to be filtered
	*/
	public function find(array $params) : array
	{
		foreach ($params['where_data'] as $key => $value) {
			$this->db->like($key, $value);
		}

		$query = $this->db->get($this->table_name);

		return $query->result_array() ?? [];
	}
}