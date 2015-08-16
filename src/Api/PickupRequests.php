<?php

namespace ComyoMedia\Shipcloud\Api;

class PickupRequests extends Api
{
    public function create($parameters = [])
    {
        return $this->post('pickup_requests', $parameters);
    }
}