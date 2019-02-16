<?php

namespace MyApp\ReadingCircles\Infrastructure\ApiCallers;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Response;
use App;

class BaseApiCaller
{
    /**
     * @var GuzzleClient
     */
    protected $guzzle;

    public function __construct()
    {
        $this->guzzle = App::make(GuzzleClient::class);
    }

    public function get($uri, $queryParams)
    {
        $response = $this->guzzle->request('GET', $uri, ['query' => $queryParams, 'verify' => false]);
        return $this->_decodeContentsIfJson($response);
    }

    public function post()
    {

    }

    /**
     * @var Response $response
     */
    protected function _decodeContentsIfJson(Response $response)
    {
        $contents = $response->getBody()->getContents();

        if (!$this->_isJsonContents($response->getHeader('Content-Type')[0])) {
            return $contents;
        }

        $decoded = json_decode($contents, false);

        if (json_last_error() != JSON_ERROR_NONE) {
            return $contents;
        }

        return $decoded;
    }

    protected function _isJsonContents(string $contentType)
    {
        if (strpos($contentType, '/json') !== false) {
            return true;
        } else {
            return false;
        }
    }
}
