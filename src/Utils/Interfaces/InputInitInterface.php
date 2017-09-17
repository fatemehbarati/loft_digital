<?php
namespace src\Utils\Interfaces;

interface InputInitInterface
{

    public function validate($inputData);

    public function initialize($inputData);
}