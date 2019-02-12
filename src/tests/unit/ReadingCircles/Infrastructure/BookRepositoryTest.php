<?php

use MyApp\ReadingCircles\Infrastructure\Repositories\BookRepository;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;
use MyApp\ReadingCircles\Domain\Models\Book;

class BookRepositoryTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected $isbn = '9784274217623';
    protected $title = 'エクストリームプログラミング';

    public function testPersist()
    {
        $repository = \App::make(BookRepository::class);
        $newBook = new Book(null, new BookIsbn($this->isbn), $this->title);

        $registeredBook = $repository->persist($newBook);

        $this->tester->seeRecord('books', ['isbn' => $this->isbn]);
    }

    public function testFindByBookIsbn()
    {
        $repository = \App::make(BookRepository::class);
        $repository->findByBookIsbn(new BookIsbn($this->isbn));
    }
}