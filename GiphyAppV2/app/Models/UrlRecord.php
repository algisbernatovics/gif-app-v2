<?php

namespace App\Models;
class UrlRecord
{
    protected string $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}