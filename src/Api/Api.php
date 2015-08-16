<?php

namespace ComyoMedia\Shipcloud\Api;

use ComyoMedia\Shipcloud\Http\Client;
use ComyoMedia\Shipcloud\ConfigInterface;

abstract class Api implements ApiInterface
{
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function get($uri = null, $parameters = [])
    {
        return $this->execute('get', $uri, $parameters)->json();
    }

    public function post($uri = null, $parameters = [])
    {
        return $this->execute('post', $uri, $parameters)->json();
    }

    public function execute($httpMethod, $uri, array $parameters = [], array $body = [])
    {
        return $this->getClient()->{$httpMethod}("{$uri}", [
            'query' => $parameters,
            'body'  => $body
        ]);
    }

    protected function getClient()
    {
        return new Client($this->apiKey);
    }
}