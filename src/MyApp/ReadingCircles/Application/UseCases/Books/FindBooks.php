<?php

namespace MyApp\ReadingCircles\Application\UseCases\Books;

use MyApp\ReadingCircles\Infrastructure\Repositories\BookRepository;
use MyApp\ReadingCircles\Application\Http\Presenter\Books\BookForIndex;
use MyApp\ReadingCircles\Domain\Models\Book;
use Illuminate\Support\Collection;


class FindBooks
{
    /**
     * @var BookRepository
     */
    protected $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findAll() : ?Collection
    {
        // 書籍一覧用データを取得する（この時点では Book の Collection）
        $collection = $this->repository->findAllBy();
        if (is_null($collection)) {
            return null;
        }

        // BookForIndex の Collection に変換する
        $bookForIndexCollection = collect();
        /** @var Book $record */
        foreach($collection as $record) {
            $bookForIndexCollection->push(new BookForIndex($record));
        }
        return $bookForIndexCollection;
    }
}
