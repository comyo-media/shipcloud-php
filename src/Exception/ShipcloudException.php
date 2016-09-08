<?php

namespace ComyoMedia\Shipcloud\Exception;

class ShipcloudException extends \Exception {
    public function __construct($message  = "Shipcloud Error", $code = 500, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
