<?php

namespace MyApp\ReadingCircles\Domain\Models;

/*
わざわざ作らずとも、世の中にはこういうのが↓ある
▼Uri - URI
http://uri.thephpleague.com/uri/5.0/
*/

class Url
{
    protected $url;

    public function __construct(string $url)
    {
        // @todo URLとしての妥当性チェック
        $this->url = $url;
    }

    public function value()
    {
        return $this->url;
    }
}
