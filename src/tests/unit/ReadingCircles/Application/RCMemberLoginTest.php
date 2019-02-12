<?php

use MyApp\ReadingCircles\Application\UseCases\RCMemberLogin;
use MyApp\ReadingCircles\Domain\Models\Member;
use MyApp\ReadingCircles\Domain\Models\MemberId;
use MyApp\ReadingCircles\Domain\Models\MemberLoginId;

use Mockery;

class RCMemberLoginTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $initMemberData;

    protected function _before()
    {
        $this->initMemberData = [
            'login_id' => 'testLoginId',
            'name' => 'テスト用ユーザー',
            'display_name' => 'テスト用ユーザー（表示用の名前）',
        ];

        $cookie = Mockery::mock('overload:cookie');
        $cookie->shouldReceive('queue');
        $cookie->shouldReceive('get')->with('loginId')->andReturn($this->initMemberData['login_id']);
    }

    protected function _after()
    {

    }

    public function testLoginByFormInput()
    {
        // DBにテストデータを入れる
        $this->tester->haveRecord('members', $this->initMemberData);

        // テストデータを使ってログイン処理
        $memberLogin = \App::make(RCMemberLogin::class);
        $result = $memberLogin->loginByFormInput($this->initMemberData['login_id']);
        $this->assertTrue($result);

        // ログイン結果の検証
        $loggedIn = \Auth::guard('rcmember')->check();
        $this->assertTrue($loggedIn);
        $loginIdInSession = session('loginId');
        $this->assertEquals($this->initMemberData['login_id'], $loginIdInSession);
    }

    public function testLoginBySessionInfo()
    {
        // セッションにテストデータをセット
        $member = new Member(
            new MemberId(1),
            new MemberLoginId($this->initMemberData['login_id']),
            $this->initMemberData['name'],
            $this->initMemberData['display_name']
        );
        session(['loginId' => $member->loginId(), $member->loginId() => serialize($member)]);

        // テストデータでログイン処理が成功するか検証
        $memberLogin = \App::make(RCMemberLogin::class);
        $result = $memberLogin->loginBySessionInfo();
        $this->assertTrue($result);
    }

    public function testLoginByCookieInfo()
    {
        // DBにテストデータを入れる
        $this->tester->haveRecord('members', $this->initMemberData);

        // Cookieにデータをセット
        // Cookie::get() を _before() で Mock済なのでとくにここでは処理なし

        // ログイン処理が成功するか検証
        $memberLogin = \App::make(RCMemberLogin::class);
        $result = $memberLogin->loginByCookieInfo();
        $this->assertTrue($result);
    }
}
