<?php

namespace MyApp\ReadingCircles\Application\UseCases\Api;

use MyApp\ReadingCircles\Domain\Repositories\BookDetailsRepositoryInterface;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;
use MyApp\ReadingCircles\Domain\Exceptions\InvariantException;


class BookSearch
{
    /**
     * @var BookDetailsRepositoryInterface
     */
    protected $repository;

    public function __construct(BookDetailsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function searchByIsbn(string $isbn)
    {
        try {
            return $this->repository->findByBookIsbn(new BookIsbn($isbn));
        } catch (InvariantException $invariantExp) {
            // ISBNの形式がおかしいときにこの例外が発生する可能性あり
            return null;
        }
    }
}
