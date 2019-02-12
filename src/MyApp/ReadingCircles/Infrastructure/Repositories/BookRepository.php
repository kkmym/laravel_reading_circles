<?php

namespace MyApp\ReadingCircles\Infrastructure\Repositories;

use MyApp\ReadingCircles\Domain\Models\BookRepositoryInterface;
use MyApp\ReadingCircles\Domain\Models\Book;
use MyApp\ReadingCircles\Domain\Models\BookId;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;
use MyApp\ReadingCircles\Infrastructure\DAOs\BookDAO;

class BookRepository implements BookRepositoryInterface
{
    /**
     * @var BookDAO
     */
    protected $bookDao;

    public function __construct(BookDAO $bookDao)
    {
        $this->bookDao = $bookDao;        
    }

    public function persist(Book $book) : Book
    {
        $bookArray = [
            'isbn' => $book->isbn(),
            'title' => $book->title(),
        ];
        $this->bookDao->fill($bookArray)->save();

        return new Book(
            new BookId($this->bookDao->book_id),
            new BookIsbn($book->isbn()),
            $book->title()
        );
    }

    public function findByBookId(BookId $bookId) : ?Book
    {
        $data = $this->bookDao->findById($bookId->value());
        if (!$data) {
            return null;
        }

        return $this->_stdClassToBook($data);
    }

    public function findByBookIsbn(BookIsbn $bookIsbn) : ?Book
    {
        $data = $this->bookDao->findByIsbn($bookIsbn->value());
        if (!$data) {
            return null;
        }

        return $this->_stdClassToBook($data);
    }

    protected function _stdClassToBook($data)
    {
        return new Book(
            new BookId($data->book_id),
            new BookIsbn($data->isbn),
            $data->title
        );
    }
}
