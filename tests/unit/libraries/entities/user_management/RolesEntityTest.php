<?php namespace libraries\entities\user_management;

use Mobiledrs\entities\user_management\Roles_entity;

class RolesEntityTest extends \Codeception\Test\Unit
{
    private $roles_entity = null;
    
    protected function _before()
    {
        $this->roles_entity = new Roles_entity;
    }

    protected function _after()
    {
        unset($this->roles_entity);
    }

    public function testSettingProperties()
    {
        $this->roles_entity->roles_id = 1;
        $this->roles_entity->roles_name = 'Administrator';

        $this->assertEquals(1, $this->roles_entity->roles_id);
        $this->assertEquals('Administrator', $this->roles_entity->roles_name);
    }
}