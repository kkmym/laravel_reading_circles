<?php

namespace MyApp\ReadingCircles\Application\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use MyApp\ReadingCircles\Application\Http\Requests\Books\BookRegistrationRequest;

class RegistrationController extends Controller
{
    public function form()
    {
        return view('reading-circles.books.registration.form');
    }

    public function action(BookRegistrationRequest $request)
    {
        return redirect('reading-circles/books');
    }
}
