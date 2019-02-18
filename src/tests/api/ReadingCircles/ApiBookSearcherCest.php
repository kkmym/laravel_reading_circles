<?php

class ApiBookSearcherCest
{
    public function _before()
    {
    }

    public function testIndex(ApiTester $I)
    {
        $isbn = '9784873114293';
        // $I->amOnPage('/api/reading-circles/books/search?isbn=' . $isbn);
        $I->sendGET('/api/reading-circles/books/search?isbn=' . $isbn);
        $I->seeResponseCodeIs(200);
        $I->seeResponseContainsJson(['isbn' => $isbn]);
        $I->seeResponseIsJson();
    }

    public function testIndexNotFound(ApiTester $I)
    {
        $isbn = '1234567890123';
        $I->amOnPage('/api/reading-circles/books/search?isbn=' . $isbn);
        $I->seeResponseCodeIs(200);
    }
}
