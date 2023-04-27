<?php

namespace App\Models;

class TakeSearchUrl
{
    protected array $searchResults;

    public function __construct($searchResults)
    {
        $this->searchResults = $searchResults;
    }

    public function takeUrl(): array
    {
        $URLs = [];
        foreach ($this->searchResults as $result) {
            if (isset($result['url'])) {
                $URLs[] = new UrlRecord($result['images']['fixed_width']['url']);
            }
        }
        return $URLs;
    }
}