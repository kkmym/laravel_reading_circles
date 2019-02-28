<?php

namespace MyApp\ReadingCircles\Domain\Specifications;

interface PaginateInterface
{
    public function __construct(int $pageNo = 0);
    public function limit() : int;
    public function offset() : int;
}
