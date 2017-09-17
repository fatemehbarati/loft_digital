<?php
namespace src\Utils\Interfaces;

interface DNExceptionInterface
{
    /** @var string */
    public function __construct($fieldName);
}