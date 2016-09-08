<?php

namespace ComyoMedia\Shipcloud\Api;

class Shipments extends Api
{
    public function create($body, $parameters = [])
    {
        return $this->post('shipments', $parameters, $body);
    }

    public function find($id)
    {
        return $this->get("shipments/{$id}");
    }

    public function deleteById($id)
    {
        $response = $this->delete("shipments/{$id}");
        return $response;
    }

    public function all($parameters = [])
    {
        $response= $this->get('shipments', $parameters);
        return $response;
    }
}