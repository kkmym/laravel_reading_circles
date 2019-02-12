<?php

namespace MyApp\ReadingCircles\Application\UseCases\Books\BookRegistration;

use MyApp\ReadingCircles\Domain\Models\BookIsbn;
use MyApp\ReadingCircles\Domain\Models\Book;
use MyApp\ReadingCircles\Domain\Models\BookRepositoryInterface;
use MyApp\ReadingCircles\Domain\DomainServices\BookDomainService;


class BookRegistration
{
    /**
     * @var BookRepositoryInterface
     */
    protected $repository;

    /**
     * @var BookDomainService
     */
    protected $bookService;

    public function __construct(BookRepositoryInterface $repository, BookDomainService $bookService)
    {
        $this->repository = $repository;
        $this->bookService = $bookService;
    }

    public function register(string $isbn, string $title) : Book
    {
        $newBook = new Book(null, new BookIsbn($isbn), $title);

        if ($this->bookService->isDuplicate($newBook->getBookIsbn())) {
            throw \Exception('すでに登録されているISBNです');
        }

        return $this->repository->persist($newBook);
    }
}
