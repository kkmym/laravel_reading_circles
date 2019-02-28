<?php

namespace MyApp\ReadingCircles\Domain\Specifications;

interface PaginateInterface
{
    public function currentPage() : Page;
}
