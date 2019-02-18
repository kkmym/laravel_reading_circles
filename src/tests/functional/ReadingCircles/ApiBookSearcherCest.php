<?php

class ApiBookSearcherCest
{
    public function _before()
    {
    }

    public function testIndex(FunctionalTester $I)
    {
        $isbn = '9784873114293';
        $I->amOnPage('/api/reading-circles/books/search?isbn=' . $isbn);
        $I->seeResponseCodeIs(200);
    }

    public function testIndexNotFound(FunctionalTester $I)
    {
        $isbn = '1234567890123';
        $I->amOnPage('/api/reading-circles/books/search?isbn=' . $isbn);
        $I->seeResponseCodeIs(200);
    }
}
