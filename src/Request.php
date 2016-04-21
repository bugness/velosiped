<?php

namespace Velosiped;

class Request
{
    /**
     * @return bool
     */
    public function isGet()
    {
        return $this->_isRequestMethod('GET');
    }

    /**
     * @return bool
     */
    public function isPost()
    {
        return $this->_isRequestMethod('POST');
    }

    /**
     * @return bool
     */
    public function isPut()
    {
        return $this->_isRequestMethod('PUT');
    }

    /**
     * @return bool
     */
    public function isDelete()
    {
        return $this->_isRequestMethod('DELETE');
    }

    /**
     * @return bool
     */
    public function isAjax()
    {
        return (bool) (isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        );
    }

    /**
     * @param string $name
     * @param mixed $defaultValue
     * @return mixed
     */
    public function getParam($name, $defaultValue = null)
    {
        if (isset($_REQUEST[$name])) {
            $value = $_REQUEST[$name];
            if (get_magic_quotes_gpc()) {
                $value = stripslashes($value);
            }
            return $value;
        } else {
            return $defaultValue ? $defaultValue : null;
        }
    }

    public function getControllerName()
    {
        $parts = explode('/', $_SERVER['REQUEST_URI']);

        return !empty($parts[1]) ? strtolower($parts[1]) : 'index';
    }

    public function getActionName()
    {
        $parts = explode('/', $_SERVER['REQUEST_URI']);

        return !empty($parts[2]) ? strtolower($parts[2]) : 'index';
    }

    /**
     * @param string $method
     * @return bool
     */
    protected function _isRequestMethod($method = 'GET')
    {
        return (bool) ($_SERVER['REQUEST_METHOD'] == strtoupper($method));
    }
}
