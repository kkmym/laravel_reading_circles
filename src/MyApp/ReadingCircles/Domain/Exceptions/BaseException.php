<?php

namespace MyApp\ReadingCircles\Domain\Exceptions;

abstract class BaseException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
