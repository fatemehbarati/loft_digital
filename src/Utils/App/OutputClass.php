<?php
namespace src\Utils\App;

use src\Classes\DeliveryNoteClass;
use src\Utils\Interfaces\OutputInterface;

class OutputClass implements OutputInterface
{
    /**
     * @param DeliveryNoteClass[] $deliveryNotes
     * @return string
     */
    static function manageOutput($deliveryNotes = array()){

        $result = '';

        foreach ($deliveryNotes as $value) {
            $result .= $value->getDeliveryNoteInformation() . "\r\n";
        }

        return $result;
    }
}