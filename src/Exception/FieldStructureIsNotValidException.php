<?php
namespace src\Exception;

use src\Utils\Interfaces\DNExceptionInterface;

class FieldStructureIsNotValidException extends \Exception implements DNExceptionInterface
{
    const MANDATORY_FIELD_MUST_BE_ARRAY = "%s must be an array!";

    public function __construct($fieldName = "")
    {
        $message = sprintf(self::MANDATORY_FIELD_MUST_BE_ARRAY, $fieldName);
        parent::__construct($message);
    }

}