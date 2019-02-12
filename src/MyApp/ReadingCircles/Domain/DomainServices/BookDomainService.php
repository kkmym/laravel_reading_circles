<?php

namespace MyApp\ReadingCircles\Domain\DomainServices;

use MyApp\ReadingCircles\Domain\Models\BookRepositoryInterface;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;

class BookDomainService
{
    /**
     * @var BookRepositoryInterface
     */
    protected $repository;

    public function __construct(BookRepositoryInterface $repository)
    {
        $this->repository = $repository;    
    }

    public function isDuplicate(BookIsbn $bookIsbn) : bool
    {
        $book = $this->repository->findByBookIsbn($bookIsbn);

        if ($book) {
            return true;
        } else {
            return false;
        }
    }
}