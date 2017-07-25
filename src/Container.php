<?php

namespace Velosiped;

class Container
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var View
     */
    protected $view;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @return Config
     */
    public function getConfig() : Config
    {
        return $this->config;
    }

    /**
     * @return Request
     */
    public function getRequest() : Request
    {
        if (!$this->request) {
            $this->setRequest(new Request);
        }
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse() : Response
    {
        if (!$this->response) {
            $this->setResponse(new Response);
        }
        return $this->response;
    }

    /**
     * @return View
     */
    public function getView() : View
    {
        if (!$this->view) {
            $this->setView(new View($this->getConfig()->get('templates')));
        }
        return $this->view;
    }

    /**
     * @param Config $config
     */
    public function setConfig(Config $config) : self
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request) : self
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @param Response $response
     */
    public function setResponse(Response $response) : self
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @param View $view
     */
    public function setView(View $view) : self
    {
        $this->view = $view;
        return $this;
    }
}
