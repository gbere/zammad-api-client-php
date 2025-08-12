<?php

/**
 * @package Zammad API Client
 * @author  Jens Pfeifer <jens.pfeifer@znuny.com>
 */

namespace ZammadAPIClient\Client;

use Symfony\Contracts\HttpClient\ResponseInterface;

class Response
{
    private $body;
    private $headers;
    private $data  = [];
    private $error = null;

    public function __construct(private ResponseInterface $response)
    {
        try {
            $this->data = $this->response->toArray();
            $this->body = $this->response->getContent();
        } catch (\Exception $e) {
            $this->error = $e->getMessage();
        }
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getError()
    {
        return $this->error;
    }

    public function hasError()
    {
        return !empty( $this->getError() );
    }
}

