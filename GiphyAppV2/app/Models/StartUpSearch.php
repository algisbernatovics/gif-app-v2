<?php

namespace App\Models;

class StartUpSearch
{
    protected array $urls;

    public function __construct($uri)
    {
        $app = new ClientRequest($uri);
        $take = new TakeSearchUrl($app->getGifResource());
        $this->urls = $take->takeUrl();
    }

    public function getUrls(): array
    {
        return $this->urls;
    }
}
