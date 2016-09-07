<?php

namespace ComyoMedia\Shipcloud\Api;

class PickupRequests extends Api
{
    public function create($body, $parameters = [])
    {
        return $this->post('pickup_requests', $parameters, $body);
    }
}