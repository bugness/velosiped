<?php

namespace Velosiped;

class Application
{
    const EXIT_SUCCESS = 0;
    const EXIT_FAILURE = 1;

    /**
     * @param Config $config
     * @return array
     */
    public function bootstrap(Config $config) : array
    {
        $container = new Container;
        $container->setConfig($config);

        $router = new Router();
        $router->setRoutes($config->get('routes', []));

        return [$container, $router];
    }

    /**
     * @param Config $config
     * @return int - exit status
     */
    public function run(Config $config) : int
    {
        try {
            list($container, $router) = $this->bootstrap($config);

            $request    = $container->getRequest();
            $controller = $router->getController($request->getControllerName());
            $controller
                ->setContainer($container)
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
