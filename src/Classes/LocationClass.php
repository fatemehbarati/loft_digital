<?php
namespace src\Classes;

class LocationClass
{

    /** @var  string */
    private $countryName;

    /** @var  string */
    private $placeName;

    /**
     * @return string
     */
    public function getCountryName()
    {
        return $this->countryName;
    }

    /**
     * @param string $countryName
     */
    public function setCountryName($countryName)
    {
        $this->countryName = $countryName;
    }

    /**
     * @return string
     */
    public function getPlaceName()
    {
        return $this->placeName;
    }

    /**
     * @param string $placeName
     */
    public function setPlaceName($placeName)
    {
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