<?php

namespace MyApp\ReadingCircles\Application\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use MyApp\ReadingCircles\Application\Http\Requests\Api\BookSearcherRequest;
use MyApp\ReadingCircles\Application\UseCases\Api\BookSearch;
use MyApp\ReadingCircles\Domain\Models\BookDetails;

class BookSearcherController extends Controller
{
    public function index(BookSearcherRequest $request, BookSearch $useCase)
    {
        /*
        return response()->json(
            [
                ['title'=>'書籍タイトル１', 'isbn'=>'1111111111111'],
                ['title'=>'書籍タイトル２', 'isbn'=>'2222222222222'],
            ]
        );
        */

        $params = $request->all();
        $isbn = array_get($params, 'isbn');
        /** @var BookDetails $bookDetails */
        $bookDetails = $useCase->searchByIsbn($isbn);
        if (!$bookDetails) {
            rturn;
        }

        return response()->json(
            [
                'title' => $bookDetails->title(),
                'isbn' => $bookDetails->isbn()
            ]
        );
    }
}
