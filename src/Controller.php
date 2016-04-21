<?php

namespace Velosiped;

abstract class Controller
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

    public function init()
    {
        
    }

    /**
     * @param string $actionName
     * @throws \Exception
     */
    final public function doAction($actionName)
    {
        $this->init();

        if ($actionName == 'do') {
            throw new \Exception('Incorrect action');
        }

        if (method_exists($this, $actionName . 'Action')) {
            $this->response->send($this->{$actionName . 'Action'}());
        } else {
            throw new \Exception('Action not found');
        }
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return View
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param Request $request
     * @return Controller
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @param Response $response
     * @return Controller
     */
    public function setResponse(Response $response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @param View $view
     * @return Controller
     */
    public function setView(View $view)
    {
        $this->view = $view;
        return $this;
    }
}
