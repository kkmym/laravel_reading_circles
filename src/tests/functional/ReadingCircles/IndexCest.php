<?php

class IndexRegisterCest
{
    public function _before()
    {
    }

    public function testIndex(FunctionalTester $I)
    {
        $I->amOnPage('/reading-circles');
        $I->see('輪読会');
        $I->seeResponseCodeIs(200);
    }
}
