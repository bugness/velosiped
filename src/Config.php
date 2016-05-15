<?php

namespace Velosiped;

class Config
{
    /**
     * @var Config
     */
    private static $instance = null;

    /**
     * @var array
     */
    private $data = [];

    private function __construct()
    {
//        foreach ($parameters as $env => $vars) {
//            $this->data = array_replace_recursive($this->data, $vars);
//            if (APPLICATION_ENV == $env) {
//                break;
//            }
//        }
    }

    private function __clone()
    {
        
    }

    /**
     * @return Config
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function get($key)
    {
    }
}