<?php

namespace Velosiped;

class Router
{
    /**
     * @var array
     */
    protected $routes = [];

    /**
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @param array $routes
     * @return Router
     */
    public function setRoutes($routes = [])
    {
        $this->routes = $routes;
        return $this;
    }

    /**
     * @param string $name
     * @throws \InvalidArgumentException
     * @return Controller
     */
    public function getController($name)
    {
        if (!array_key_exists($name, $this->routes)) {
            throw new \InvalidArgumentException('Controller not found');
        }
        return new $this->routes[$name];
    }
}
