<?php

use MyApp\ReadingCircles\Infrastructure\Repositories\BookDetailsRepository;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;

class BookDetailsRepositoryTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testQueryByBookIsbn()
    {
        $isbn = '9784822289607';

        /** @var BookDetailsRepository $repo */
        $repo = App::make(BookDetailsRepository::class);
        $bookDetails = $repo->findByBookIsbn(new BookIsbn($isbn));

        $this->assertNotEmpty($bookDetails);
        $this->assertEquals($isbn, $bookDetails->isbn());
    }

    public function testQueryByBookIsbnResultZero()
    {
        $isbn = '9784949999137';

        /** @var BookDetailsRepository $repo */
        $repo = App::make(BookDetailsRepository::class);
        $bookDetails = $repo->findByBookIsbn(new BookIsbn($isbn));

        $this->assertNull($bookDetails);
    }
}
