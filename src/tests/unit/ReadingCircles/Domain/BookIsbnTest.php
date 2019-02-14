<?php

use MyApp\ReadingCircles\Domain\Models\BookIsbn;
use MyApp\ReadingCircles\Domain\Exceptions\InvariantException;

class BookIsbnTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testInvalidIsbn()
    {
        $this->tester->expectException(InvariantException::class, function() {
            new BookIsbn('1234567890123');
        });
    }

    public function testValidIsbn()
    {
        $bookIsbn = new BookIsbn('978-4797347784');
        $this->assertInstanceOf(BookIsbn::class, $bookIsbn);
    }
}
