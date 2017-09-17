<?php
namespace src\Exception;

use src\Utils\Interfaces\DNExceptionInterface;

class FieldIsNullException extends \Exception implements DNExceptionInterface
{
    const MANDATORY_FIELD_IS_NULL = '"%s" value is null!Please fill it.';

    public function __construct($fieldName = "")
    {
        $message = sprintf(self::MANDATORY_FIELD_IS_NULL, $fieldName);
        parent::__construct($message);
    }
}