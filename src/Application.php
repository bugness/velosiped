<?php

namespace Velosiped;

class Application
{
    use ContainerAware;

    const EXIT_SUCCESS = 0;
    const EXIT_FAILURE = 1;

    /**
     * @param Router $router
     * @return int - exit status
     */
    public function run(Router $router)
    {
        try {
            $request = $this->getContainer()->getRequest();

            $controller = $router->getController($request->getControllerName());
            $controller
                ->setContainer($this->getContainer())
                ->doAction($request->getActionName())
            ;
        } catch (\LogicException $e) {
            return self::EXIT_FAILURE;
        } catch (\Exception $e) {
            return self::EXIT_FAILURE;
        }

        return self::EXIT_SUCCESS;
    }
}
