<?php namespace libraries\entities;

use Mobiledrs\entities\Entity;

class EntityTest extends \Codeception\Test\Unit
{
    
    private $entity = null;

    protected function _before()
    {
        $this->entity = $this->getMyEntityObject();
    }

    protected function _after()
    {
        unset($this->entity);
    }

    public function testSet()
    {
        $this->entity->firstname = 'Nikko';

        $this->assertEquals('Nikko', $this->entity->firstname);
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage 'lastname' is not a part of the class
     */
    public function testSetWithException()
    {
        $this->entity->lastname = 'Fernandez';
    }

    public function testGet()
    {
        $this->assertEquals('Nikkolai', $this->entity->firstname);
    }

     /**
     * @expectedException Exception
     * @expectedExceptionMessage 'lastname' is not a part of the class
     */
    public function testGetWithException()
    {
        $this->entity->lastname;
    }

    public function getMyEntityObject()
    {
        return new class extends Entity {
            protected $firstname = 'Nikkolai';
        };
    }

    public function testIssetWithPropertyNotExist()
    {
        $this->assertFalse(isset($this->entity->lastname));
    }

    public function testIssetWithPropertyExist()
    {
        $this->assertTrue(isset($this->entity->firstname));
    }
}