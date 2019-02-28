<?php

namespace MyApp\ReadingCircles\Domain\Repositories;

use MyApp\ReadingCircles\Domain\Models\Book;
use MyApp\ReadingCircles\Domain\Models\BookId;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;
use MyApp\ReadingCircles\Domain\Specifications\PaginateInterface;

interface BookRepositoryInterface
{
    public function persist(Book $book) : Book;
    public function findByBookId(BookId $bookId) : ?Book;
    public function findByBookIsbn(BookIsbn $bookIsbn) : ?Book;
    // public function findAllBy(?PaginateInterface $pagenate) : ?BookCollectionInterface;
}
