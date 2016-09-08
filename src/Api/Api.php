<?php

namespace ComyoMedia\Shipcloud\Api;

use ComyoMedia\Shipcloud\Exception\ShipcloudException;
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

    public function delete($uri = null, $parameters = [])
    {
        return json_decode($this->execute('delete', $uri, $parameters)->getBody(), true);
    }

    public function execute($httpMethod, $uri, array $parameters = [], array $body = [])
    {
        try
        { 
            return $response = $this->getClient()->{$httpMethod}("{$uri}", [
                'query' => $parameters,
                'json' => $body
            ]); 
        }
        catch (\GuzzleHttp\Exception\RequestException $re)
        {
            $response = $re->getResponse();           
            $errorMessageArray = json_decode($response->getBody()->getContents(),true);
            $errorMessage="";
            if(array_key_exists("errors", $errorMessageArray)) {         
                foreach($errorMessageArray["errors"] as $error) {
                    $errorMessage .= "Shipcloud Error: " . $error . "\n";
                }
            }
            throw new ShipcloudException($errorMessage, $response->getStatusCode());          
        }
    }

    protected function getClient()
    {
        return new Client($this->apiKey);
    }
}