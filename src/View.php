<?php

namespace Velosiped;

class View
{
    /**
     * @var string
     */
    protected $path;

    public function __construct($path = null)
    {
        $ds = DIRECTORY_SEPARATOR;
        $this->path = !empty($path)
            ? $path
            : __DIR__ . $ds . '..' . $ds . 'include' . $ds;
    }

    /**
     * @param string $template
     * @param array $data
     * @return string
     * @throws \Exception
     */
    public function render($template, $data = []) : string
    {
        $file = $this->path . $template;
        if (file_exists($file)) {
            extract($data);

            ob_start();
            include $file;
            $buffer = ob_get_contents();
            @ob_end_clean();

            return $buffer;
        } else {
            throw new \RuntimeException('Template not found');
        }
    }

    /**
     * @param string $str
     * @return string
     */
    public function escape($str = null)
    {
        return $str ? htmlentities($str, ENT_COMPAT) : '';
    }
}
