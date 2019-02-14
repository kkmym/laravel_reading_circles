<?php

namespace MyApp\ReadingCircles\Domain\Exceptions;

class InvariantException extends BaseException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
