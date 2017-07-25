<?php

namespace Velosiped;

class Config
{
    /**
     * @var array
     */
    private $data = [];

    public function __construct($file)
    {
        if (!file_exists($file)) {
            throw new \RuntimeException('Config not found');
        }
        $this->mergeEnvs(include $file);
    }

    /**
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    /**
     * @param array $params
     */
    private function mergeEnvs(array $params)
    {
        foreach ($params as $env => $vars) {
            $this->data = array_replace_recursive($this->data, $vars);
            if (APPLICATION_ENV == $env) {
                break;
            }
        }
    }
}
