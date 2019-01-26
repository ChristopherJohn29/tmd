<?php

class Route_sheet_list_model extends \Mobiledrs\core\MY_Models {
	
	protected $table_name = 'provider_route_sheet_list';
	protected $entity = '\Mobiledrs\entities\provider_route_sheet_management\Routesheet_list_entity';

	public function __construct()
	{
		parent::__construct();
	}
}