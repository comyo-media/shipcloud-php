<?php

namespace ComyoMedia\Shipcloud\Api;

class ShipmentQuotes extends Api
{
    public function create($parameters = [])
    {
        return $this->post('shipment_quotes', $parameters);
    }
}