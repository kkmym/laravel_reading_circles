<?php

class LoginCest
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

    public function loginUsingCredentials(FunctionalTester $I)
    {
        $I->haveRecord('members', $this->initMemberData);

        $I->amOnPage('reading-circles/login');
        $I->seeElement('input', ['name' => 'loginId']);

        $I->fillField(['name' => 'loginId'], $this->initMemberData['login_id']);
        $I->click('ログイン');

        $I->seeCurrentUrlEquals('/reading-circles/');
    }

    public function loginFaitUsingCredentials(FunctionalTester $I)
    {
        $I->haveRecord('members', $this->initMemberData);

        $I->amOnPage('reading-circles/login');
        $I->seeElement('input', ['name' => 'loginId']);

        $I->fillField(['name' => 'loginId'], 'xxx');
        $I->click('ログイン');

        $I->seeCurrentUrlEquals('/reading-circles/auth');
        $I->see('ログイン失敗');
    }
}
