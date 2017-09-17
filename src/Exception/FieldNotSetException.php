<?php
namespace src\Exception;

use src\Utils\Interfaces\DNExceptionInterface;

class FieldNotSetException extends \Exception implements DNExceptionInterface
{
    const MANDATORY_FIELD_IS_UNDEFINED = '"%s" is mandatory and is not defined!';

    public function __construct($fieldName = "")
    {
        $message = sprintf(self::MANDATORY_FIELD_IS_UNDEFINED, $fieldName);
        parent::__construct($message);
    }
}