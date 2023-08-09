<?php

namespace App\Models;
class ViewResults
{
    private string $path;
    private array $URLs;

    public function __construct(string $path, array $URLs)
    {
        $this->path = $path;
        $this->URLs = $URLs;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getURLs(): array
    {
        return $this->URLs;
    }
}