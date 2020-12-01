<?php

namespace Francerz\Utils\Frameworks;

use Psr\Http\Message\ResponseInterface;

class CodeIgniter4
{
    public static function outputResponsePsr7($ci_response, ResponseInterface $response)
    {
        $ci_response->setStatusCode($response->getStatusCode());

        foreach ($response->getHeaders() as $name => $values) {
            $ci_response->setHeader($name, $values);
        }

        $ci_response->setBody((string)$response->getBody());
    }
}