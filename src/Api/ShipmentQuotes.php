<?php

namespace ComyoMedia\Shipcloud\Api;

class ShipmentQuotes extends Api
{
    public function create($body, $parameters = [])
    {
        return $this->post('shipment_quotes', $parameters, $body);
    }
}