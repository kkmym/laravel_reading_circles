<?php

namespace MyApp\ReadingCircles\Domain\Repositories;

use MyApp\ReadingCircles\Domain\Models\BookIsbn;
use Illuminate\Support\Collection;

interface BookDetailsRepositoryInterface
{
    /**
     * @todo このメソッドが「BookのCollection」を返すとして、そのときは BooksCollection みたいな『中身はBookだけ』を保証するCollectionクラスを用意するべきなのか？
     */
    public function findByBookIsbn(BookIsbn $bookIsbn);
}
