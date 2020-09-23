<?php

namespace Francerz\Utils\Frameworks;

use Psr\Http\Message\ResponseInterface;

class CodeIgniter2
{
    public static function outputHttpResponse(&$CI, ResponseInterface $response)
    {
        $CI->output->set_status_header($response->getStatusCode(), $response->getReasonPhrase());
        $CI->output->set_output($response->getBody());
        foreach ($response->getHeaders() as $name => $values) {
            $CI->output->set_header($name.': '.implode(', ', $values), true);
        }
    }
}