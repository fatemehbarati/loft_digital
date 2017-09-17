<?php

namespace src\Classes;

class DeliveryNoteClass
{

    /**
     * const parameters to parse final string of delivery notes
     */
    const DELIVERY_COMPANY_TEXT_PART_IN_NOTE = ". With delivery company ";
    const FROM_TEXT_PART_IN_NOTE = " from ";
    const TO_TEXT_PART_IN_NOTE = " to ";

    /** @var  TransportationTypeClass */
    private $transportationType;

    /** @var  LocationClass */
    private $source;

    /** @var  LocationClass */
    private $destination;

    /** @var  DeliveryCompanyClass */
    private $deliveryCompany;

    public function __construct(array $deliveryNote)
    {

        $this->transportationType = new TransportationTypeClass($deliveryNote['transportationType']);

        $this->source = new LocationClass($deliveryNote['source']['countryName'], $deliveryNote['source']['placeName']);
        $this->destination = new LocationClass($deliveryNote['destination']['countryName'], $deliveryNote['destination']['placeName']);

        $this->deliveryCompany = new DeliveryCompanyClass($deliveryNote['deliveryCompany']);

    }

    /**
     * @return TransportationTypeClass
     */
    public function getTransportationType()
    {
        return $this->transportationType;
    }

    /**
     * @return LocationClass
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @return LocationClass
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @return DeliveryCompanyClass
     */
    public function getDeliveryCompany()
    {
        return $this->deliveryCompany;
    }

    /**
     * This method create delivery note on specific format
     * @return string
     */
    public function getDeliveryNoteInformation(){

        return  $this->transportationType->getName() .
                self::FROM_TEXT_PART_IN_NOTE .
                $this->source->getLocationTextPartInNote() .
                self::TO_TEXT_PART_IN_NOTE .
                $this->destination->getLocationTextPartInNote() .
                self::DELIVERY_COMPANY_TEXT_PART_IN_NOTE .
                $this->deliveryCompany->getName();

    }


}