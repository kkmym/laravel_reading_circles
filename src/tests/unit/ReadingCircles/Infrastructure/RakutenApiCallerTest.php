<?php

use MyApp\ReadingCircles\Infrastructure\ApiCallers\RakutenApiCaller;

class RakutenApiCallerTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testQueryByIsbn()
    {
        $isbn = '9784798121963';

        /** @var RakutenApiCaller $apiCaller */
        $apiCaller = App::make(RakutenApiCaller::class);
        $apiResult = $apiCaller->queryByIsbn($isbn);

        $this->assertNotEquals(0, $apiResult->count);
        $this->assertObjectHasAttribute('Items', $apiResult);
        $this->assertObjectHasAttribute('title', $apiResult->Items[0]->Item);
    }

    public function testQueryByIsbnResultZero()
    {
        $isbn = '1234567890123';

        /** @var RakutenApiCaller $apiCaller */
        $apiCaller = App::make(RakutenApiCaller::class);
        $apiResult = $apiCaller->queryByIsbn($isbn);

        $this->assertEquals(0, $apiResult->count);
    }
}
