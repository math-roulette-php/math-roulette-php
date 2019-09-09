<?php

namespace MathRoulette\Exceptions;

use Throwable;

class EventObjectException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}