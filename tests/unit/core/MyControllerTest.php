<?php namespace core;

require_once('support/myControllerTest/AclMock.php');
require_once('support/myControllerTest/SessionMock.php');
require_once('support/myControllerTest/CI_Controller.php');
require_once('support/myControllerTest/utils.php');
require_once('support/myControllerTest/LoaderMock.php');

use \Codeception\Stub\Expected;

class MyControllerTest extends \Codeception\Test\Unit
{
    private $myController = null;

    protected function _before()
    {
    }

    protected function _after()
    {
        unset($this->myController);
    }

    public function testCheckHasPermission()
    {
        $params = [
            'acl' => new \AclMock(),
            'session' => new \SessionMock(),
            'load' => new \LoaderMock()
        ];

        $this->myController = $this->make('\Mobiledrs\core\MY_Controller', $params);

        $result = $this->myController->check_permission('testPermission');

        $this->assertNull($result);
    }

    public function testCheckHasNoPermission()
    {
        $params = [
            'acl' => new \AclMock(),
            'session' => new \SessionMock(),
            'load' => new \LoaderMock()
        ];

        $this->myController = $this->make('\Mobiledrs\core\MY_Controller', $params);

        $result = $this->myController->check_permission('dummyPermission');

        $this->assertTrue($result);
    }

    public function testUserIsLoggedIn()
    {
        $params = [
            'session' => new class {
                public function userdata(string $sessionName)
                {
                    return true;
                }
            },
            'load' => new \LoaderMock()
        ];

        $this->myController = $this->make('\Mobiledrs\core\MY_Controller', $params);

        $result = $this->myController->is_logged_in();

        $this->assertNull($result);
    }

    public function testUserIsNotLoggedIn()
    {
        $params = [
            'session' => new class {
                public function userdata(string $sessionName)
                {
                    return false;
                }
            },
            'load' => new \LoaderMock()
        ];

        $this->myController = $this->make('\Mobiledrs\core\MY_Controller', $params);

        $result = $this->myController->is_logged_in();

        $this->assertTrue($result);
    }

    public function testFormFailedValidationOnAddPage()
    {
        $params = [
            'form_validation' => new class {
                public function run($validation_group)
                {
                    return false;
                }
            },
            'load' => new \LoaderMock()
        ];

        $this->myController = $this->make('\Mobiledrs\core\MY_Controller', $params);

        $save_params = [
            'validation_group' => 'test'
        ];

        $result = $this->myController->save_data($save_params);

        $this->assertEquals('add page', $result);
    }

    public function testFormFailedValidationOnEditPage()
    {
        $params = [
            'form_validation' => new class {
                public function run($validation_group)
                {
                    return false;
                }
            },
            'load' => new \LoaderMock()
        ];

        $this->myController = $this->make('\Mobiledrs\core\MY_Controller', $params);

        $save_params = [
            'record_id' => 1,
            'validation_group' => 'test'
        ];

        $result = $this->myController->save_data($save_params);

        $this->assertEquals('edit page', $result);
    }

    public function testFormSaveSuccessOnAddPage()
    {
        $params = [
            'form_validation' => new class {
                public function run($validation_group)
                {
                    return true;
                }
            },
            'load' => new \LoaderMock(),
            'lang' => new class {
                public function line($message)
                {
                    return 'Saved Successfully';
                }
            },
            'sample_model' => new class {
                public function insert($data)
                {
                    return true;
                }

                public function prepare_data()
                {
                    
                }
            },
            'session' => new \SessionMock()
        ];

        $this->myController = $this->make('\Mobiledrs\core\MY_Controller', $params);

        $save_params = [
            'save_model' => 'sample_model',
            'redirect_url' => 'test/test',
            'validation_group' => 'test'
        ];

        $result = $this->myController->save_data($save_params);

        $this->assertEquals('Saved Successfully', $this->myController->session->flashdata('success'));
        $this->assertTrue($result);
    }

    public function testFormSaveNotSuccessOnAddPage()
    {
        $params = [
            'form_validation' => new class {
                public function run($validation_group)
                {
                    return true;
                }
            },
            'load' => new \LoaderMock(),
            'lang' => new class {
                public function line($message)
                {
                    return 'Error Saving Data';
                }
            },
            'sample_model' => new class {
                public function insert($data)
                {
                    return false;
                }

                public function prepare_data()
                {
                    
                }
            },
            'session' => new \SessionMock()
        ];

        $this->myController = $this->make('\Mobiledrs\core\MY_Controller', $params);

        $save_params = [
            'save_model' => 'sample_model',
            'redirect_url' => 'test/test',
            'validation_group' => 'test'
        ];

        $result = $this->myController->save_data($save_params);

        $this->assertEquals('Error Saving Data', $this->myController->session->flashdata('danger'));
        $this->assertTrue($result);
    }

    public function testFormSaveSuccessOnEditPage()
    {
        $params = [
            'form_validation' => new class {
                public function run($validation_group)
                {
                    return true;
                }
            },
            'load' => new \LoaderMock(),
            'lang' => new class {
                public function line($message)
                {
                    return 'Saved Successfully';
                }
            },
            'sample_model' => new class {
                public function update($data)
                {
                    return true;
                }

                public function prepare_data()
                {
                    
                }
            },
            'session' => new \SessionMock()
        ];

        $this->myController = $this->make('\Mobiledrs\core\MY_Controller', $params);

        $save_params = [
            'record_id' => '1',
            'save_model' => 'sample_model',
            'redirect_url' => 'test/test',
            'table_key' => 'test_key',
            'validation_group' => 'test'
        ];

        $result = $this->myController->save_data($save_params);

        $this->assertEquals('Saved Successfully', $this->myController->session->flashdata('success'));
        $this->assertTrue($result);
    }
}