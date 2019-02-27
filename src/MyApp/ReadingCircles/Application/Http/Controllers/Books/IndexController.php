<?php

namespace MyApp\ReadingCircles\Application\Http\Controllers\Books;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        // ダミーデータ
        $viewData = [];
        return view('reading-circles.books.index')->with($viewData);
    }
}
