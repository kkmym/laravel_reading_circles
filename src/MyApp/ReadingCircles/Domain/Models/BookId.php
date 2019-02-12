<?php

namespace MyApp\ReadingCircles\Domain\Models;

class BookId
{
    /**
     * @var int
     */
    protected $id;

    public function __construct(int $id = PHP_INT_MIN)
    {
        $this->id = $id;
    }

    public function value() : int
    {
        return $this->id;
    }
}
