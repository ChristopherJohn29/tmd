<?php

class Logs_model extends \Mobiledrs\core\MY_Models {
	protected $table_name = 'user_logs';
	protected $entity = '\Mobiledrs\entities\user_management\Logs_entity';

	public function getTotalLogs() {
		$this->db->from('user_logs');
		return $this->db->count_all_results();
	}
}