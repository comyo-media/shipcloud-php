<?php

require 'vendor/autoload.php';

$shipcloud = new ComyoMedia\Shipcloud\Shipcloud('api-key');

// Find Shipment By Id
// var_dump($shipcloud->shipments()->find('shipment-id'));

// List all carriers
// var_dump($shipcloud->carriers()->all());

var_dump($shipcloud->addresses()->create([
    'company'    => 'company name',
    'first_name' => 'first name',
    'last_name'  => 'lastname',
    'street'     => 'street',
    'street_no'  => 'street_no',
    'zip_code'   => 'zip_code',
    'city'       => 'city',
    'country'    => 'country',
    'phone'      => 'phone'
]));