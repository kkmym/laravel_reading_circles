<?php

use MyApp\ReadingCircles\Infrastructure\DAOs\BookDAO;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;

class BookDAOTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $isbn = '9784274217623';
    protected $title = 'エクストリームプログラミング';

    public function testCreate()
    {
        BookDAO::create([
            'isbn' => $this->isbn,
            'title' => $this->title,
        ]);

       $this->tester->seeRecord('books', ['isbn' => $this->isbn]);
    }

    public function testFindByBookIsbn()
    {
        $dao = new BookDAO();

        $dao->fill([
            'isbn' => $this->isbn,
            'title' => $this->title,
        ]);
        $dao->save();

        $book = $dao->findByIsbn($this->isbn);
        $this->assertEquals($book->isbn, $this->isbn);
    }

    public function testFindByBookIsbnFail()
    {
        $dao = new BookDAO();

        $dao->fill([
            'isbn' => $this->isbn,
            'title' => $this->title,
        ]);
        $dao->save();

        $book = $dao->findByIsbn('1234');
        $this->assertEmpty($book);
    }

    public function testFindByBookId()
    {
        $dao = new BookDAO();

        $dao->fill([
            'isbn' => $this->isbn,
            'title' => $this->title,
        ]);
        $dao->save();

        $newId = $dao->book_id;

        $book = $dao->findById($newId);
        $this->assertEquals($book->isbn, $this->isbn);
    }
}
