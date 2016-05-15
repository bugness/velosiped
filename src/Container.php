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
     * @return Config|null
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        if (!$this->request) {
            $this->setRequest(new Request);
        }
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        if (!$this->response) {
            $this->setResponse(new Response);
        }
        return $this->response;
    }

    /**
     * @return View
     */
    public function getView()
    {
        if (!$this->view) {
            $this->setView(new View);
        }
        return $this->view;
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
     * @param Request $request
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @param Response $response
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @param View $view
     */
    public function setView(View $view)
    {
        $this->view = $view;
        return $this;
    }
}

