<?php

namespace MyApp\ReadingCircles\Infrastructure\Repositories;

use MyApp\ReadingCircles\Domain\Models\BookDetailsRepositoryInterface;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;
use MyApp\ReadingCircles\Infrastructure\ApiCallers\RakutenApiCaller;
use MyApp\ReadingCircles\Domain\Models\BookDetails;


class BookDetailsRepository implements BookDetailsRepositoryInterface
{
    /**
     * @var RakutenApiCaller
     */
    protected $apiCaller;

    public function __construct(RakutenApiCaller $apiCaller)
    {
        $this->apiCaller = $apiCaller;
    }

    public function queryByBookIsbn(BookIsbn $bookIsbn) : ?BookDetails
    {
        $apiResult = $this->apiCaller->queryByIsbn($bookIsbn->value());
        if (!property_exists($apiResult, 'count') || $apiResult->count == 0) {
            return null;
        }

        return $this->_stdClassToBookDetails($apiResult);
    }

    protected function _stdClassToBookDetails(\stdClass $apiResult) : BookDetails
    {
        if (!property_exists($apiResult, 'Items')) {
            return null;
        }

        $apiBook = $apiResult->Items[0]->Item;
        $bookDetails = new BookDetails(
            $apiBook->title
            ,new BookIsbn($apiBook->isbn)
            ,$apiBook->author
            ,$apiBook->publisherName
            ,$apiBook->salesDate
            ,$apiBook->itemPrice
            ,$apiBook->mediumImageUrl
        );

        return $bookDetails;
    }
}
