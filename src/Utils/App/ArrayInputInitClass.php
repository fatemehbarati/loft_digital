<?php

namespace src\Utils\App;

use src\Classes\DeliveryNoteClass;
use src\Exception\FieldIsNullException;
use src\Exception\FieldNotSetException;
use src\Exception\FieldStructureIsNotValidException;
use src\Utils\Interfaces\InputInitInterface;

class ArrayInputInitClass implements InputInitInterface
{

    /** @var DeliveryNoteClass[]  */
    private $inputParameter;

    /** @var array */
    public function __construct($inputData)
    {
        $this->inputParameter = $this->initialize($inputData);
    }

    /**
     * This method get a base array and check required indexes
     * @param $inputData
     * @throws FieldIsNullException
     * @throws FieldNotSetException
     * @throws FieldStructureIsNotValidException
     */
    public function validate($inputData)
    {

        if(!array_key_exists('transportationType', $inputData)){
            throw new FieldNotSetException('transportationType');
        }
        elseif (!$inputData['transportationType']){
            throw new FieldIsNullException('transportationType');
        }

        if(!array_key_exists('source', $inputData)){
            throw new FieldNotSetException('source');
        }
        elseif (!is_array($inputData['source']))
        {
            throw new FieldStructureIsNotValidException('source');
        }
        else {
            if (!array_key_exists('countryName', $inputData['source'])) {
                throw new FieldNotSetException('countryName of source');
            } elseif (!$inputData['source']['countryName']) {
                throw new FieldIsNullException('countryName of source');
            }
            else
            {
                if (!array_key_exists('placeName', $inputData['source'])) {
                    throw new FieldNotSetException('placeName of source');
                } elseif (!$inputData['source']['placeName']) {
                    throw new FieldIsNullException('placeName of source');
                }
            }
        }

        if(!array_key_exists('destination', $inputData)){
            throw new FieldNotSetException('destination');
        }
        elseif (!is_array($inputData['destination']))
        {
            throw new FieldStructureIsNotValidException('destination');
        }
        else {
            if (!array_key_exists('countryName', $inputData['destination'])) {
                throw new FieldNotSetException('countryName of destination');
            } elseif (!$inputData['destination']['countryName']) {
                throw new FieldIsNullException('countryName of destination');
            }
            else
            {
                if (!array_key_exists('placeName', $inputData['destination'])) {
                    throw new FieldNotSetException('placeName of destination');
                } elseif (!$inputData['destination']['placeName']) {
                    throw new FieldIsNullException('placeName of destination');
                }
            }
        }

        if(!array_key_exists('deliveryCompany', $inputData)){
            throw new FieldNotSetException('deliveryCompany');
        }
        elseif (!$inputData['deliveryCompany']){
            throw new FieldIsNullException('deliveryCompany');
        }
    }

    /**
     * This method validate each part of array and convert it to array of DeliveryNote objects
     * @param $inputData
     * @return DeliveryNoteClass[]
     * @throws \Exception
     */
    public function initialize($inputData)
    {
        try
        {
            $deliveryNotes = array();
            foreach ($inputData as $key => $value) {
                $this->validate($value);

                $deliveryNotes[] = new DeliveryNoteClass($value);
            }

            return $deliveryNotes;
        }
        catch (FieldNotSetException $undefinedField)
        {
          throw $undefinedField;
        }
        catch (FieldIsNullException $nullField){
            throw $nullField;
        }

    }

    /**
     * This method sorts and creates output as a text
     * @return string
     */
    public function sortAndGetOutput(){

        $deliveryNotes = $this->inputParameter;

        $result = DeliveryNotesSortClass::sort($deliveryNotes);

        return OutputClass::manageOutput($result);
    }

}