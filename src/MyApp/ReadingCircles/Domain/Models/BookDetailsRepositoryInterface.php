<?php

namespace MyApp\ReadingCircles\Domain\Models;

use Illuminate\Support\Collection;

interface BookDetailsRepositoryInterface
{
    /**
     * @todo このメソッドが「BookのCollection」を返すとして、そのときは BooksCollection みたいな『中身はBookだけ』を保証するCollectionクラスを用意するべきなのか？
     */
    public function queryByBookIsbn(BookIsbn $bookIsbn);
}
