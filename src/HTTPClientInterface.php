<?php

namespace ZammadAPIClient;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface HTTPClientInterface
{
    public function request(string $method, $uri = '', array $options = []): ResponseInterface;
}
