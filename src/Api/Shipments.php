<?php

namespace ComyoMedia\Shipcloud\Api;

class Shipments extends Api
{
    public function create($parameters = [])
    {
        return $this->post('shipments', $parameters);
    }

    public function find($id)
    {
        return $this->get("shipments/{$id}");
    }

    public function all($parameters = [])
    {
        return $this->get('shipments', $parameters);
    }
}