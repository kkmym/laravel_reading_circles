<?php

use MyApp\ReadingCircles\Domain\Models\Book;
use MyApp\ReadingCircles\Domain\Models\BookId;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;

class BookTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    /**
     * @var Book
     */
    protected $book;

    protected $initData = [
        'isbn' => '9784873118208'
        ,'title' => 'ベタープログラマ'
    ];

    protected function _before()
    {
        $this->book = new Book(
            new BookId()
            ,new BookIsbn($this->initData['isbn'])
            ,$this->initData['title']
        );
    }

    protected function _after()
    {
    }

    public function testBook()
    {
        $bookIsbn = $this->book->getBookIsbn();
        $this->assertEquals(get_class($bookIsbn), BookIsbn::class);
        $this->assertEquals($bookIsbn->value(), $this->initData['isbn']);

        $this->assertEquals($this->book->title(), $this->initData['title']);
    }
}
