<?php

namespace MyApp\ReadingCircles\Application\Http\Controllers;

use App\Http\Controllers\Controller;
use MyApp\ReadingCircles\Application\UseCases\RCMemberLogin;
use MyApp\ReadingCircles\Infrastructure\Repositories\BookRepository;
use MyApp\ReadingCircles\Domain\Models\Book;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;
use MyApp\ReadingCircles\Infrastructure\DAOs\BookDAO;

class TestController extends Controller
{
    public function index()
    {
        $loginUserCase = \App::make(RCMemberLogin::class);
        return 'Hello.';
    }

    public function sessionTest()
    {
        $val = session('test', 'noval');
        session(['test' => date('YmdHis')]);

        echo $val;
    }

    public function bookSaveTest()
    {
        $dao = new BookDAO();
        // $book = new Book(null, new BookIsbn('1234567890'), 'test');
        $dao->fill(['isbn' => '1234567890', 'title' => 'test']);
        $dao->save();
        echo $dao->book_id;
    }
}
