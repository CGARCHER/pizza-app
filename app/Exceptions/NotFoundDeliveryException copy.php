<?php

namespace App\Exceptions;

use Exception;

class NotFoundDeliveryException extends Exception
{
    public function __construct($message, $code){
        $this->code = $code;
        parent::__construct($message);
    }
}
