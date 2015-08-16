<?php

namespace ComyoMedia\Shipcloud\Http;

use GuzzleHttp\Query;
use GuzzleHttp\Event\BeforeEvent;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Message\RequestInterface;
use ComyoMedia\Shipcloud\Exception as Exception;

class Client extends \GuzzleHttp\Client implements ClientInterface
{
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        parent::__construct(['base_url' => 'https://api.shipcloud.io/v1/']);

        $this->getEmitter()->on('before', function (BeforeEvent $event) {
            $request = $event->getRequest();

            $request->setHeader(
                'Authorization', 'Basic '.base64_encode($this->apiKey)
            );
        });
    }

    public function send(RequestInterface $request)
    {
        return parent::send($request);
    }
}