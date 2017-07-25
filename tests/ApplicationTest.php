<?php

namespace Velosiped;

use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    public function testSuccessRun()
    {
        $controller = $this->getMockBuilder('stdClass')
            ->setMethods(['setContainer', 'doAction'])
            ->getMock();

        $controller
            ->method('setContainer')
            ->will($this->returnSelf());

        $router = $this->getMockBuilder(Router::class)
            ->setMethods(['getController'])
            ->getMock();

        $router
            ->method('getController')
            ->willReturn($controller);

        $request = $this->getMockBuilder(Request::class)
            ->setMethods(['getControllerName', 'getActionName'])
            ->getMock();

        $request
            ->method('getControllerName')
            ->willReturn('index');

        $request
            ->method('getActionName')
            ->willReturn('index');

        $container = $this->getMockBuilder(Container::class)
            ->setMethods(['getRequest'])
            ->getMock();

        $container
            ->method('getRequest')
            ->willReturn($request);

        $app = new Application;
        $app->setContainer($container);

        $this->assertEquals(Application::EXIT_SUCCESS, $app->run($router));
    }
}
