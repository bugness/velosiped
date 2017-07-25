<?php

namespace Velosiped;

trait ContainerAware
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @return Container
     */
    public function getContainer() : Container
    {
        if (!$this->container) {
            $this->setContainer(new Container);
        }
        return $this->container;
    }

    /**
     * @param Container $container
     */
    public function setContainer(Container $container) : self
    {
        $this->container = $container;
        return $this;
    }
}
