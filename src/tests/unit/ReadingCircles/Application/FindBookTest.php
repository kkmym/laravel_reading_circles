<?php

use MyApp\ReadingCircles\Application\UseCases\Books\FindBooks;
use MyApp\ReadingCircles\Infrastructure\DAOs\BookDAO;
use MyApp\ReadingCircles\Application\Http\Presenter\Books\BookForIndex;


class FindBookTest extends \Codeception\Test\Unit
{
    protected $isbn = '9784274217623';
    protected $title = 'エクストリームプログラミング';

    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testFindAll()
    {
        $this->_initData();

        /** @var FindBooks $useCase */
        $useCase = App::make(FindBooks::class);
        $collection = $useCase->findAll();

        foreach ($collection as $bookForIndex) {
            $this->assertTrue($bookForIndex instanceof BookForIndex);
        }
    }

    protected function _initData()
    {
        BookDAO::create([
            'isbn' => $this->isbn,
            'title' => $this->title,
        ]);
    }
}
