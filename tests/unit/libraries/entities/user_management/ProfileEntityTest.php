<?php namespace libraries\entities\user_management;

use  Mobiledrs\entities\user_management\Profile_entity;

class ProfileEntityTest extends \Codeception\Test\Unit
{
    
    private $profile_entity = null;
    
    protected function _before()
    {
        $this->profile_entity = new Profile_entity;
    }

    protected function _after()
    {
        unset($this->profile_entity);
    }

    public function testGetFullName()
    {
        $this->profile_entity->user_firstname = 'Nikkolai';
        $this->profile_entity->user_lastname = 'Fernandez';

        $result = $this->profile_entity->get_fullname();

        $expected = 'Nikkolai Fernandez';

        $this->assertEquals($expected, $result);
    }
}