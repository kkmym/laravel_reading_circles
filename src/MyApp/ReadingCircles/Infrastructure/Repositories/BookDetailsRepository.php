<?php

namespace MyApp\ReadingCircles\Infrastructure\Repositories;

use MyApp\ReadingCircles\Domain\Models\BookDetailsRepositoryInterface;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;


class BookDetailsRepository implements BookDetailsRepositoryInterface
{
    public function queryByBookIsbn(BookIsbn $bookIsbn)
    {

    }
}
