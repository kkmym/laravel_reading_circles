<?php

use MyApp\ReadingCircles\Domain\Models\Book;
use MyApp\ReadingCircles\Domain\DomainServices\BookDomainService;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;
use MyApp\ReadingCircles\Infrastructure\DAOs\BookDAO;

class BookDomainServiceTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $isbn = '9784274217623';
    protected $title = 'エクストリームプログラミング';

    public function testIsDuplicateFail()
    {

        BookDAO::create([
            'isbn' => $this->isbn,
            'title' => $this->title,
        ]);

        $bookService = App::make(BookDomainService::class);
        $result = $bookService->isDuplicate(new BookIsbn('9784797347784'));

        $this->assertFalse($result);
    }

    public function testIsDuplicate()
    {

        BookDAO::create([
            'isbn' => $this->isbn,
            'title' => $this->title,
        ]);

        $bookService = App::make(BookDomainService::class);
        $result = $bookService->isDuplicate(new BookIsbn($this->isbn));

        $this->assertTrue($result);
    }
}
