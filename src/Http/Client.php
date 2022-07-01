<?php

namespace ComyoMedia\Shipcloud\Http;

use GuzzleHttp\Query;
use GuzzleHttp\Event\BeforeEvent;
use GuzzleHttp\Exception\ClientException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Client extends \GuzzleHttp\Client implements ClientInterface
{
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;

        parent::__construct([
            'base_uri' => 'https://api.shipcloud.io/v1/',
            'auth' => [$apiKey, null],
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ]);
    }

    public function send(RequestInterface $request, array $options = []): ResponseInterface
    {
        return parent::send($request, $options);
    }
}
