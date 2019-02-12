<?php

namespace MyApp\ReadingCircles\Application\Http\Controllers\Books;

use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function form()
    {
        return view('reading-circles.books.registration.form');
    }

    public function action()
    {
        return redirect('reading-circles/books');
    }
}
