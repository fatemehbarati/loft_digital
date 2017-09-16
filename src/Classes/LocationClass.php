<?php
namespace src\Classes;

class LocationClass
{

    /** @var  string */
    private $countryName;

    /** @var  string */
    private $placeName;

    /**
     * LocationClass constructor.
     * @param string $countryName
     * @param string $placeName
     */
    public function __construct($countryName, $placeName)
    {

        $this->countryName = $countryName;
        $this->placeName = $placeName;
    }

    /**
     * This method concat place name and location name
     * @return string
     */
    public function getLocationTextPartInNote(){
        return $this->placeName . ', ' . $this->countryName;
    }
}