<?php

namespace Velosiped;

abstract class Controller
{
    use Component;

    public function init()
    {
        
    }

    /**
     * @param string $actionName
     * @throws \InvalidArgumentException
     */
    final public function doAction($actionName)
    {
        $this->init();

        if ($actionName == 'do') {
            throw new \InvalidArgumentException('Incorrect action');
        }

        if (method_exists($this, $actionName . 'Action')) {
            $this->response->send($this->{$actionName . 'Action'}());
        } else {
            throw new \InvalidArgumentException('Action not found');
        }
    }
}
