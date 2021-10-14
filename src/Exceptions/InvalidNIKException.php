<?php

namespace Nurmanhabib\NIKParser\Exceptions;

use Exception;

class InvalidNIKException extends Exception
{
    public $nik;

    public function __construct($nik = "", $detail = null)
    {
        $msg = "NIK $nik is invalid";

        if ($detail) {
            $msg .= ": " . $detail;
        }

        parent::__construct($msg);

        $this->nik = $nik;
    }
}
