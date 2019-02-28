<?php

namespace MyApp\ReadingCircles\Application\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use MyApp\ReadingCircles\Application\Http\Requests\Books\BookRegistrationRequest;
use MyApp\ReadingCircles\Application\UseCases\Books\RegisterBook;

class RegistrationController extends Controller
{
    public function form()
    {
        return view('reading-circles.books.registration.form');
    }

    /**
     * @var BookRegistrationRequest $request
     * @var BookRegistration $useCase
     */
    public function action(BookRegistrationRequest $request, RegisterBook $useCase)
    {
        $params = $request->all();
        // @todo 例外発生時の処理
        $useCase->register($params['isbn'], $params['title']);
        return redirect('reading-circles/books');
    }
}
