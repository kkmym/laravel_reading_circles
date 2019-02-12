<?php

use MyApp\ReadingCircles\Domain\Models\Member;
use MyApp\ReadingCircles\Domain\Models\MemberId;
use MyApp\ReadingCircles\Domain\Models\MemberLoginId;

class MemberTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $member;

    protected function _before()
    {
        $this->member = new Member(
            new MemberId(123)
            ,new MemberLoginId('1234abcd')
            ,'登録用の名前'
            ,'表示用の名前'
        );
    }

    protected function _after()
    {

    }
    
    public function testMember()
    {
        $memberId = $this->member->getMemberId();
        $this->assertEquals($memberId->value(), 123);

        $memberLoginId = $this->member->getMemberLoginId();
        $this->assertEquals($memberLoginId->value(), '1234abcd');

        $this->assertEquals($this->member->name(), '登録用の名前');
        $this->assertEquals($this->member->displayName(), '表示用の名前');
    }
}
