<?php

namespace MyApp\ReadingCircles\Domain\Models;

class MemberId
{
    protected $id;

    public function __construct(int $id = PHP_INT_MIN)
    {
        $this->id = $id;
    }

    public function value()
    {
        return $this->id;
    }
}
