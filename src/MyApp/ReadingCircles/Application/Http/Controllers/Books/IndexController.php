<?php

namespace MyApp\ReadingCircles\Application\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use MyApp\ReadingCircles\Application\Http\Presenter\Books\BookForIndex;
use MyApp\ReadingCircles\Domain\Models\Book;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;
use MyApp\ReadingCircles\Domain\Models\BookId;

class IndexController extends Controller
{
    public function index()
    {
        // ダミーデータ
        $viewData = [
            // 'bookList' => [new BookForIndex(new Book(new BookId(1), new BookIsbn('9784822289607'), 'ファクトフルネス'))]
        ];

        return view('reading-circles.books.index')->with($viewData);
    }
}
