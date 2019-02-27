<?php

namespace MyApp\ReadingCircles\Application\Http\Presenter\Books;

use MyApp\ReadingCircles\Domain\Models\Book;

class BookForIndex
{
    /**
     * @var Book
     */
    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function linkToCircleList()
    {
        $url = "/reading-circles/circles?book_id=" . $this->book->id();
        return $url;
    }

    public function __call($method, $args)
    {
        if (method_exists($this->book, $method)) {
            return $this->book->$method();
        }

        return null;
    }
}
