<?php

namespace ComyoMedia\Shipcloud\Http;

use GuzzleHttp\Message\RequestInterface;

interface ClientInterface
{
    public function send(RequestInterface $request);
}