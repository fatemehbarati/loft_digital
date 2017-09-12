<?php
namespace src\Classes;

class LocationClass
{

    private $countryName;
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

    public function getLocationTextPartInNote(){
        return $this->placeName . ', ' . $this->countryName;
    }
}