<?php
namespace src\Classes;

class TransportationTypeClass
{

    /**
     * name of transportation type
     * @var string
     */
    private $name;

    /**
     * TransportationTypeClass constructor.
     * @param string $transportationTypeName
     */
    public function __construct($transportationTypeName)
    {

        $this->name = $transportationTypeName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

}