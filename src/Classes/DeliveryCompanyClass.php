<?php
namespace src\Classes;

class DeliveryCompanyClass
{

    /**
     * name of delivery company
     * @var string
     */
    private $name;

    /**
     * DeliveryCompanyClass constructor.
     * @param string $deliveryCompanyName
     */
    public function __construct($deliveryCompanyName)
    {
        $this->name = $deliveryCompanyName;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}