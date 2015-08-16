<?php

namespace ComyoMedia\Shipcloud\Api;

class Carriers extends Api
{
    public function all()
    {
        return $this->get('carriers');
    }
}