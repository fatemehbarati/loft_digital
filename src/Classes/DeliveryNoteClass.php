<?php

namespace src\Classes;


use src\Utils\App\ConstClass;

class DeliveryNoteClass
{

    /** @var  TransportationTypeClass */
    protected $transportationType;

    /** @var  LocationClass */
    protected $source;

    /** @var  LocationClass */
    protected $destination;

    /** @var  DeliveryCompanyClass */
    protected $deliveryCompany;

    public function __construct(array $deliveryNote)
    {

        $this->setTransportationType(new TransportationTypeClass());
        $this->transportationType->setName($deliveryNote['transportationType']);

        $this->setSource(new LocationClass());
        $this->source->setCountryName($deliveryNote['source']['countryName']);
        $this->source->setPlaceName($deliveryNote['source']['placeName']);

        $this->setDestination(new LocationClass());
        $this->destination->setCountryName($deliveryNote['destination']['countryName']);
        $this->destination->setPlaceName($deliveryNote['destination']['placeName']);

        $this->setDeliveryCompany(new DeliveryCompanyClass());
        $this->deliveryCompany->setName($deliveryNote['deliveryCompany']);

    }

    /**
     * @return TransportationTypeClass
     */
    public function getTransportationType()
    {
        return $this->transportationType;
    }

    /**
     * @param TransportationTypeClass $transportationType
     */
    public function setTransportationType(TransportationTypeClass $transportationType)
    {
        $this->transportationType = $transportationType;
    }

    /**
     * @return LocationClass
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param LocationClass $source
     */
    public function setSource(LocationClass $source)
    {
        $this->source = $source;
    }

    /**
     * @return LocationClass
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param LocationClass $destination
     */
    public function setDestination(LocationClass $destination)
    {
        $this->destination = $destination;
    }

    /**
     * @return DeliveryCompanyClass
     */
    public function getDeliveryCompany()
    {
        return $this->deliveryCompany;
    }

    /**
     * @param DeliveryCompanyClass $deliveryCompany
     */
    public function setDeliveryCompany(DeliveryCompanyClass $deliveryCompany)
    {
        $this->deliveryCompany = $deliveryCompany;
    }

    public function getDeliveryNoteInformation(){
        return  $this->transportationType->getName() .
                ConstClass::FROM_TEXT_PART_IN_NOTE .
                $this->source->getLocationTextPartInNote() .
                ConstClass::TO_TEXT_PART_IN_NOTE .
                $this->destination->getLocationTextPartInNote() .
                ConstClass::DELIVERY_COMPANY_TEXT_PART_IN_NOTE .
                $this->deliveryCompany->getName();

    }


}