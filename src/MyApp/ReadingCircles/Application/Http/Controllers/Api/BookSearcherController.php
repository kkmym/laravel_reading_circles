<?php

namespace MyApp\ReadingCircles\Application\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use MyApp\ReadingCircles\Application\Http\Requests\Api\BookSearcherRequest;
use MyApp\ReadingCircles\Application\UseCases\Api\SearchBook;
use MyApp\ReadingCircles\Domain\Models\BookDetails;

class BookSearcherController extends Controller
{
    public function index(BookSearcherRequest $request, SearchBook $useCase)
    {
        $params = $request->all();
        $isbn = array_get($params, 'isbn');
        /** @var BookDetails $bookDetails */
        $bookDetails = $useCase->searchByIsbn($isbn);
        if (!$bookDetails) {
            return;
        }

        return response()->json(
            [
                'title' => $bookDetails->title(),
                'isbn' => $bookDetails->isbn()
            ]
        );
    }
}
