<?php

namespace Velosiped;

class Application
{
    /**
     * @var array
     */
    protected $routes = [];

    /**
     * @var Config|null
     */
    protected $config = null;

    /**
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @return Config|null
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param array $routes
     * @return Application
     */
    public function setRoutes($routes = [])
    {
        $this->routes = $routes;
        return $this;
    }

    /**
     * @param Config $config
     * @return Application
     */
    public function setConfig(Config $config)
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function run()
    {
        try {
            $request = new Request;

            $controllerName = $request->getControllerName();
            if (array_key_exists($controllerName, $this->routes)) {
                $controller = new $this->routes[$controllerName];
            } else {
                throw new \Exception('Controller not found');
            }

            $controller
                ->setRequest($request)
                ->setResponse(new Response)
                ->setView(new View)
                ->doAction($request->getActionName())
            ;
        } catch (\Exception $e) {
            exit($e->getMessage());
        }
    }
}
