<?php

use MyApp\ReadingCircles\Infrastructure\ApiCallers\BaseApiCaller;

class BaseApiCallerTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testGet()
    {
        /** @var BaseApiCaller $caller */
        $caller = App::make(BaseApiCaller::class);
        $response = $caller->get('https://example.com', []);

        $this->assertRegExp('/example domain/i', $response);
    }
}
