<?php

namespace MyApp\ReadingCircles\Infrastructure\ApiCallers;

class RakutenApiCaller extends BaseApiCaller
{
    const API_URL = 'https://app.rakuten.co.jp/services/api/BooksBook/Search/20170404';
    const APPLICATION_ID = '1024169816585144772';

    public function queryByIsbn(string $isbn)
    {
        $queryParams = [
            'applicationId' => self::APPLICATION_ID,
            'isbn' => $isbn,
        ];
        return $this->get(self::API_URL, $queryParams);
    }
}
