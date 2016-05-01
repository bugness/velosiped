<?php

namespace Velosiped;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testRoutes()
    {
        $this->app->setRoutes([
            'index' => 'IndexController',
        ]);

        $routes = $this->app->getRoutes();

        $this->assertTrue(is_array($routes));
        $this->assertArrayHasKey('index', $routes);
    }

    public function testRun()
    {
        $this->app = new Application;
        $this->assertEquals(1, 1);
    }
}
