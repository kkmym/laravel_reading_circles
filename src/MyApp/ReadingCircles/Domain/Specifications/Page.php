<?php

namespace MyApp\ReadingCircles\Domain\Specifications;

class Page
{
    /**
     *
     */
    protected $offset;
    protected $limit;

    public function __construct(int $offset = 0, int $limit = PHP_INT_MAX)
    {
        $this->offset = $offset;
        $this->limit = $limit;
    }

    public function limit()
    {
        return $this->limit;
    }

    public function offset()
    {
        return $this->offset;
    }
}
