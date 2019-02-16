<?php

use MyApp\ReadingCircles\Application\UseCases\Api\BookSearch;

class BookSearchTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testSearchByIsbn()
    {
        $isbn = '9784798121963';
        /** @var BookSearch $useCase */
        $useCase = App::make(BookSearch::class);
        $bookDetails = $useCase->searchByIsbn($isbn);

        $this->assertNotEmpty($bookDetails);
    }
}
