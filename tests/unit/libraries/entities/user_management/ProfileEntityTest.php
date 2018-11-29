<?php namespace libraries\entities\user_management;

use  Mobiledrs\entities\user_management\Profile_entity;

class ProfileEntityTest extends \Codeception\Test\Unit
{
    private $profile_entity = null;
    private $encrypted_pass = '$2y$10$pDdFRdvB.ze4q6pB/s5cFOw4WmdL9kzDf9KZHssajRnfBPqrB2jBG';
    
    protected function _before()
    {
        $this->profile_entity = new Profile_entity;
    }

    protected function _after()
    {
        unset($this->profile_entity);
    }

    public function testSettingProperties()
    {
        $this->profile_entity->user_id = '1';
        $this->profile_entity->user_firstname = 'Nikkolai';
        $this->profile_entity->user_lastname = 'Fernandez';
        $this->profile_entity->user_email = 'nikkolaifernandez14@gmail.com';
        $this->profile_entity->user_dateCreated = '2018-11-30';
        $this->profile_entity->user_password = $this->encrypted_pass;
        $this->profile_entity->user_roleID = 1;
        $this->profile_entity->user_dateOfBirth = '1992-11-14';
        $this->profile_entity->roles_id = 1;
        $this->profile_entity->roles_name = 'Super Administrator';

        $this->assertEquals('1', $this->profile_entity->user_id);
        $this->assertEquals('Nikkolai', $this->profile_entity->user_firstname);
        $this->assertEquals('Fernandez', $this->profile_entity->user_lastname);
        $this->assertEquals('nikkolaifernandez14@gmail.com', $this->profile_entity->user_email);
        $this->assertEquals('2018-11-30', $this->profile_entity->user_dateCreated);
        $this->assertEquals($this->encrypted_pass, $this->profile_entity->user_password);
        $this->assertEquals(1, $this->profile_entity->user_roleID);
        $this->assertEquals('1992-11-14', $this->profile_entity->user_dateOfBirth);
        $this->assertEquals('1', $this->profile_entity->roles_id);
        $this->assertEquals('Super Administrator', $this->profile_entity->roles_name);
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