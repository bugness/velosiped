<?php

namespace Velosiped;

class Response
{
    /**
     * @param string $content
     */
    public function send($content)
    {
        echo $content;
        exit;
    }

    /**
     * @param array $data
     */
    public function sendJson($data = array())
    {
        echo json_encode($data);
        exit;
    }

    /**
     * @param string $url
     */
    public function redirect($url)
    {
        header('Location:' . $url, true, 302);
        exit;
    }

    /**
     * @param int $code
     * @return Response
     */
    public function setStatusCode($code = 200)
    {
        http_response_code($code);
        return $this;
    }
}
