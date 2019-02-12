<?php

use MyApp\ReadingCircles\Infrastructure\DAOs\MemberDAO;

class MemberDAOTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testCreate()
    {
        $loginId = 'testuser';
        $name = 'テストユーザー';
        $displayName = '表示用のユーザー名';

        MemberDAO::create([
            'login_id' => $loginId,
            'name' => $name,
            'display_name' => $displayName,
        ]);

        $this->tester->seeRecord('members', ['login_id' => $loginId]);
    }
}