<?php

namespace Velosiped;

use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    protected $map = [];
    protected $router;

    protected function setUp()
    {
        parent::setUp();

        $this->map = [
            'index' => 'IndexController',
            'users' => 'UsersController',
            'test'  => Router::class,
        ];
        $this->router = new Router;
        $this->router->setRoutes($this->map);
    }

    public function testSuccessCreate()
    {
        $this->assertInstanceOf(Router::class, new Router);
    }

    public function testSetRoutes()
    {
        $this->assertInstanceOf(
            Router::class,
            $this->router->setRoutes($this->map)
        );
    }

    public function testGetRoutes()
    {
        $this->assertEquals($this->map, $this->router->getRoutes());
    }

    public function testSuccessGetController()
    {
        $this->assertInstanceOf(
            Router::class,
            $this->router->getController('test')
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testControllerNotFound()
    {
        $this->router->getController('error');
    }
}
