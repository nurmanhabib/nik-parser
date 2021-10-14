<?php

namespace Nurmanhabib\NIKParser\Exceptions;

class InvalidLengthException extends InvalidNIKException
{
    public function __construct($nik = "")
    {
        parent::__construct($nik, "Must be 16 digits");
    }
}
