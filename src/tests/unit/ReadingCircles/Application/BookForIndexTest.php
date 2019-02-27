<?php

use MyApp\ReadingCircles\Application\Http\Presenter\Books\BookForIndex;
use MyApp\ReadingCircles\Domain\Models\Book;
use MyApp\ReadingCircles\Domain\Models\BookId;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;

class BookForIndexTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testMethodOfBook()
    {
        /** @var Book $book */
        $book = new Book(new BookId(1), new BookIsbn('9784822289607'), 'ファクトフルネス');
        /** @var BookForIndex $bookForIndex */
        $bookForIndex = new BookForIndex($book);

        $link = $bookForIndex->linkToCircleList();
        $this->assertTrue(strpos($link, '/reading-circles/circles') !== false);
        $this->assertEquals($bookForIndex->isbn(), '9784822289607');
    }
}
