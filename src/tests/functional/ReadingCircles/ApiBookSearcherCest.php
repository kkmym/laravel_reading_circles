<?php

class ApiBookSearcherCest
{
    public function _before()
    {
    }

    public function testIndex(FunctionalTester $I)
    {
        $I->amOnPage('/api/reading-circles/books/search');
        $I->seeResponseCodeIs(200);
    }
}
