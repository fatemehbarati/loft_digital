<?php

require_once __DIR__ . '/../vendor/autoload.php';

use src\Classes\DeliveryNoteClass;
use src\Utils\App\DeliveryNotesSortClass;
use src\Utils\App\OutputClass;

$deliveryNotesArray = array(
    array(
        'transportationType' => 'Flight',
        'source' => array(
            'countryName' => 'Brazil',
            'placeName' => 'São Paulo–Guarulhos International Airport'
        ),
        'destination' => array(
            'countryName' => 'Portugal',
            'placeName' => 'Porto International Airport'
        ),
        'deliveryCompany' =>'LATAM'
    ),
    array(
        'transportationType' => 'Truck',
        'source' => array(
            'countryName' => 'Brazil',
            'placeName' => 'Fazenda São Francisco Citros'
        ),
        'destination' => array(
            'countryName' => 'Brazil',
            'placeName' => 'São Paulo–Guarulhos International Airport'
        ),
        'deliveryCompany' =>'Correios'
    ),
    array(
        'transportationType' => 'Van',
        'source' => array(
            'countryName' => 'Portugal',
            'placeName' => 'Porto International Airport'
        ),
        'destination' => array(
            'countryName' => 'Spain',
            'placeName' => 'Adolfo Suárez Madrid–Barajas Airport'
        ),
        'deliveryCompany' =>'AnyVan'
    ),
    array(
        'transportationType' => 'Van',
        'source' => array(
            'countryName' => 'UK',
            'placeName' => 'London Heathrow'
        ),
        'destination' => array(
            'countryName' => 'UK',
            'placeName' => 'Loft Digital, London'
        ),
        'deliveryCompany' =>'City Sprint'
    ),
    array(
        'transportationType' => 'Flight',
        'source' => array(
            'countryName' => 'Spain',
            'placeName' => 'Adolfo Suárez Madrid–Barajas Airport'
        ),
        'destination' => array(
            'countryName' => 'UK',
            'placeName' => 'London Heathrow'
        ),
        'deliveryCompany' =>'DHL'
    ),
);

foreach ($deliveryNotesArray as $value) {
    $deliveryNotes[] = new DeliveryNoteClass($value);
}

$result = DeliveryNotesSortClass::sort($deliveryNotes);
var_dump(OutputClass::manageOutput($result));
