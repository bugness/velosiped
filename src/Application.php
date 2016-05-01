<?php

namespace Velosiped;

class Application
{
    use Component;

    /**
     * @param Router $router
     * @throws \InvalidArgumentException
     */
    public function run(Router $router)
    {
        try {
            $request = $this->getRequest();

            $controller = $router->getController($request->getControllerName());
            $controller
                ->setRequest($request)
                ->doAction($request->getActionName())
            ;
        } catch (\InvalidArgumentException $e) {
            exit($e->getMessage());
        }
    }
}
