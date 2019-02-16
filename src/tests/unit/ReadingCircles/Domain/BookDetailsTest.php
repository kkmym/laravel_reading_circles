<?php

use MyApp\ReadingCircles\Domain\Models\BookDetails;
use MyApp\ReadingCircles\Domain\Models\BookIsbn;

class BookDetailsTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testBookDetails()
    {
        $bookDetails = new BookDetails(
            'エリック・エヴァンスのドメイン駆動設計'
            ,new BookIsbn('9784798121963')
            ,'エリック・エヴァンス/今関剛'
            ,'翔泳社'
            ,'2011年04月'
            ,5616
            ,'https://thumbnail.image.rakuten.co.jp/@0_mall/book/cabinet/1963/9784798121963.jpg?_ex=120x120'
        );
        $this->assertEquals('9784798121963', $bookDetails->isbn());
    }
}
