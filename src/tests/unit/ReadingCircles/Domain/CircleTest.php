<?php

use MyApp\ReadingCircles\Domain\Models\Circle;
use MyApp\ReadingCircles\Domain\Models\Book;
use MyApp\ReadingCircles\Domain\Models\BookId;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;
use MyApp\ReadingCircles\Domain\Models\Member;
use MyApp\ReadingCircles\Domain\Models\MemberId;
use MyApp\ReadingCircles\Domain\Models\MemberLoginId;
use MyApp\ReadingCircles\Domain\Models\Url;

class CircleTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testCircle()
    {
        $book = new Book(new BookId(1), new BookIsbn('1234567890'), 'テスト');

        $organizers = [
            new Member(new MemberId(100), new MemberLoginId('1234abcd'), '名前登録用', '名前表示用'),
            new Member(new MemberId(101), new MemberLoginId('login101'), '名前登録用101', '名前表示用101'),
            new Member(new MemberId(102), new MemberLoginId('login102'), '名前登録用102', '名前表示用102'),
        ];

        $urls = [
            new Url('https://qiita.com/ushironoko/items/a2420cf4a28af56907e5'),
        ];

        $circle = new Circle($book, $organizers, $urls);

        $this->assertEquals($circle->getReadingBook()->title(), 'テスト');
        $this->assertEquals(($circle->getOrganaizers())[0]->loginId(), '1234abcd');

        $organizer = $circle->getOrganizer(101);
        $this->assertNotEmpty($organizer);
        $this->assertInstanceOf(Member::class, $organizer);
        $this->assertEquals(101, $organizer->id());
    }
}
