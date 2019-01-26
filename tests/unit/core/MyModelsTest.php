<?php namespace core;

require_once('support/MyModelsTest/CI_Model.php');

class MyModelsTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testInsertWithCorrectParams()
    {
    	$my_model = $this->make('\Mobiledrs\core\MY_Models', [
    		'db' => new class {
    			public function insert($data)
    			{
    			}

    			public function insert_id()
    			{
    				return 1;
    			}
    		}
    	]);

    	$params = [
    		'data' => 'testData'
    	];

    	$result = $my_model->insert($params);

    	$this->assertEquals(1, $result);
    }
}