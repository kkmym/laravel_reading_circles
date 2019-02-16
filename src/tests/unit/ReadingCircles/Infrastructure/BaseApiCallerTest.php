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

    public function testGetRakutenBooksApiTest()
    {
        $uri = 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404';

        $params['applicationId'] = '1024169816585144772';
        $params['title'] = 'サピエンス全史';
        // 'isbn';

        /** @var BaseApiCaller $caller */
        $caller = App::make(BaseApiCaller::class);
        $contents = $caller->get($uri, $params);
        $this->assertInstanceOf(\stdClass::class, $contents);
    }
}
