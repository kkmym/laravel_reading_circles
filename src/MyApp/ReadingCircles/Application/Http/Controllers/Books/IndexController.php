<?php

namespace MyApp\ReadingCircles\Application\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use MyApp\ReadingCircles\Application\Http\Presenter\Books\BookForIndex;
use MyApp\ReadingCircles\Domain\Models\Book;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;
use MyApp\ReadingCircles\Domain\Models\BookId;
use MyApp\ReadingCircles\Application\UseCases\Books\FindBooks;

class IndexController extends Controller
{
    /**
     * @var FindBooks
     */
    protected $useCase;

    public function __construct(FindBooks $useCase)
    {
        $this->useCase = $useCase;
    }

    public function index()
    {
        $books = $this->useCase->findAll();
        // ダミーデータ
        $viewData = [
            'books' => $books,
        ];

        return view('reading-circles.books.index')->with($viewData);
    }
}
