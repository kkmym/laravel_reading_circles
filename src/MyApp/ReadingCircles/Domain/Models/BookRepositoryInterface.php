<?php

namespace MyApp\ReadingCircles\Domain\Models;

interface BookRepositoryInterface
{
    public function persist(Book $book) : Book;
    public function findByBookId(BookId $bookId) : ?Book;
    public function findByBookIsbn(BookIsbn $bookIsbn) : ?Book;
}
