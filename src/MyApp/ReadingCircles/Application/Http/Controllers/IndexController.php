<?php

namespace MyApp\ReadingCircles\Application\Http\Controllers;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('reading-circles.index');
    }
}
