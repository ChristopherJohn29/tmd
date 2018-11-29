<?php namespace libraries\entities\authentication;

use Mobiledrs\entities\authentication\User_entity;

class UserEntityTest extends \Codeception\Test\Unit
{
    private $user_entity = null;
    private $encrypted_pass = '$2y$10$pDdFRdvB.ze4q6pB/s5cFOw4WmdL9kzDf9KZHssajRnfBPqrB2jBG';
    
    protected function _before()
    {

        $this->user_entity = new User_entity();
    }

    protected function _after()
    {
        unset($this->user_entity);
    }

    /**
     * @dataProvider validatePasswordProvider
     */
    public function testValidatePassword($encrypted_pass, $plain_password, $expected)
    {
        $this->user_entity->user_password = $encrypted_pass;

        $password = $plain_password;

        $result = $this->user_entity->validate_password($password);

        $this->assertEquals($expected, $result);
    }

    public function validatePasswordProvider()
    {
        return [
            [
                $this->encrypted_pass,
                'abc',
                true
            ],
            [
                $this->encrypted_pass,
                'abb',
                false
            ]
        ];
    }

    public function testSettingProperties()
    {
        $this->user_entity->user_id = '1';
        $this->user_entity->user_firstname = 'Nikkolai';
        $this->user_entity->user_lastname = 'Fernandez';
        $this->user_entity->user_email = 'nikkolaifernandez14@gmail.com';
        $this->user_entity->user_dateCreated = '2018-11-30';
        $this->user_entity->user_password = $this->encrypted_pass;
        $this->user_entity->user_roleID = 1;
        $this->user_entity->user_dateOfBirth = '1992-11-14';

        $this->assertEquals('1', $this->user_entity->user_id);
        $this->assertEquals('Nikkolai', $this->user_entity->user_firstname);
        $this->assertEquals('Fernandez', $this->user_entity->user_lastname);
        $this->assertEquals('nikkolaifernandez14@gmail.com', $this->user_entity->user_email);
        $this->assertEquals('2018-11-30', $this->user_entity->user_dateCreated);
        $this->assertEquals($this->encrypted_pass, $this->user_entity->user_password);
        $this->assertEquals(1, $this->user_entity->user_roleID);
        $this->assertEquals('1992-11-14', $this->user_entity->user_dateOfBirth);
    }
}