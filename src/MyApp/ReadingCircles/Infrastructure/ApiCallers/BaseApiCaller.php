<?php

namespace MyApp\ReadingCircles\Infrastructure\ApiCallers;

use GuzzleHttp\Client as GuzzleClient;

class BaseApiCaller
{
    /**
     * @var GuzzleClient
     */
    protected $guzzle;

    public function __construct(GuzzleClient $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function get($uri, $queryParams)
    {
        $response = $this->guzzle->request('GET', $uri, ['query' => $queryParams, 'verify' => false]);
        return $response->getBody();
    }

    public function post()
    {

    }
}
