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
        return json_decode($this->execute('get', $uri, $parameters)->getBody(), true);
    }

    public function post($uri = null, $parameters = [], $body = [])
    {
        return json_decode($this->execute('post', $uri, $parameters, $body)->getBody(), true);
    }

    public function execute($httpMethod, $uri, array $parameters = [], array $body = [])
    {
        return $this->getClient()->{$httpMethod}("{$uri}", [
            'query'       => $parameters,
            'form_params' => $body
        ]);
    }

    protected function getClient()
    {
        return new Client($this->apiKey);
    }
}