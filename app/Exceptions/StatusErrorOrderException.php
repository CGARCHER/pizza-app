<?php

namespace App\Exceptions;

use Exception;

class StatusErrorOrderException extends Exception
{
    public function __construct($message, $code)
    {
        parent::__construct($message, $code);
    }
}
