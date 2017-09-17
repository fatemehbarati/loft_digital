<?php
namespace src\Utils\App;

use src\Classes\DeliveryNoteClass;
use src\Utils\Interfaces\SortInterface;

class DeliveryNotesSortClass implements SortInterface
{

    /** @var DeliveryNoteClass[] */
    private static $unOrderedArray;

    /**
     * This array will fill gradually with ordered items
     * @var DeliveryNoteClass[]
     */
    private static $orderedArray = array();

    /**
     * a temp array for notes which is not ordered yet.
     * @var DeliveryNoteClass[]
     */
    private static $tempUnOrderedArray = array();

    /**
     * This method sorts array of delivery notes and return array of items
     * @param DeliveryNoteClass[] $items
     * @return array
     */
    public static function sort($items = array()){

        self::$unOrderedArray = $items;

        if (count(self::$orderedArray) == 0) {
            self::$orderedArray[] = array_shift(self::$unOrderedArray);
        }

        foreach (self::$unOrderedArray as $key => $unOrderedItem) {

            $source = reset(self::$orderedArray);
            $source = $source->getSource()->getLocationTextPartInNote();

            $destination = end(self::$orderedArray);
            $destination = $destination->getDestination()->getLocationTextPartInNote();

            if ($destination === $unOrderedItem->getSource()->getLocationTextPartInNote()
                ||
                $source === $unOrderedItem->getDestination()->getLocationTextPartInNote()) {

                if ($unOrderedItem->getSource()->getLocationTextPartInNote() === $destination) {
                    array_push(self::$orderedArray, $unOrderedItem);
                }

                if ($unOrderedItem->getDestination()->getLocationTextPartInNote() === $source) {
                    array_unshift(self::$orderedArray, $unOrderedItem);
                }

                if (isset(self::$tempUnOrderedArray[$key])) {
                    unset(self::$tempUnOrderedArray[$key]);
                }

            }
            else {
                array_push(self::$tempUnOrderedArray, $unOrderedItem);
            }
        }

        if (count(self::$tempUnOrderedArray) != 0) {
            self::sort(self::$tempUnOrderedArray);
        }

        return self::$orderedArray;
    }
}