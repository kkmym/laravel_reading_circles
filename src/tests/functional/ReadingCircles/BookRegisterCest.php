<?php

class BookRegisterCest
{
    protected $initMemberData;

    public function _before()
    {
        $this->initMemberData = [
            'login_id' => 'testLoginId',
            'name' => 'テスト用ユーザー',
            'display_name' => 'テスト用ユーザー（表示用の名前）',
        ];
    }

    public function testBookRegisterRouting(FunctionalTester $I)
    {
        $I->haveRecord('members', $this->initMemberData);
        $I->amLoggedAs(['login_id' => 'testLoginId'], 'rcmember');

        $I->amOnPage('/reading-circles/books/registration/form');
        $I->fillField(['name' => 'isbn'], '9784757143555');
        $I->fillField(['name' => 'title'], 'ニュー・ダーク・エイジ');
        $I->click('#registerButton');

        $I->seeCurrentUrlEquals('/reading-circles/books');
        $I->seeResponseCodeIs(200);
    }
}
