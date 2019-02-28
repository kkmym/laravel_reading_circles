<?php

use MyApp\ReadingCircles\Application\UseCases\Api\SearchBook;

class SearchBookTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testSearchByIsbn()
    {
        $isbn = '9784798121963';
        /** @var SearchBook $useCase */
        $useCase = App::make(SearchBook::class);
        $bookDetails = $useCase->searchByIsbn($isbn);

        $this->assertNotEmpty($bookDetails);
    }
}
