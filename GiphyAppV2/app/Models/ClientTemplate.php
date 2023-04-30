<?php

namespace App\Models;

class ClientTemplate
{
    protected string $API_KEY;
    protected string $resultLimit;
    protected ?string $searchPhrase;

    protected int $offset;

    public function __construct()
    {
        $this->API_KEY = $_ENV['API_KEY'];
        $this->resultLimit = $_ENV['SEARCH_RESULT_LIMIT'];
        $this->searchPhrase = $_POST['searchPhrase'];
        $this->offset = rand(0, 4999);
    }

    public function random(): array
    {
        $URLs = [];
        for ($i = 0; $i < $this->resultLimit; $i++) {
            $uri = "v1/gifs/random?&api_key=$this->API_KEY";
            $APIResponse = new ClientRequest($uri);
            $resource = $APIResponse->getGifResource();
            $URLs[] = new RecordResults($resource['images']['fixed_width']['url']);
        }
        return $URLs;
    }

    public function search(): array
    {
        $searchPhrase = $_POST['searchPhrase'];
        $uri = "v1/gifs/search?q=$searchPhrase&api_key=$this->API_KEY&limit=$this->resultLimit&offset=$this->offset";
        $APIResponse = new ClientRequest($uri);
        $resource = $APIResponse->getGifResource();
        $URLs = [];

        foreach ($resource as $gif) {
            $URLs[] = new RecordResults($gif['images']['fixed_width']['url']);
        }
        return $URLs;
    }

    public function trending(): array
    {
        $uri = "v1/gifs/trending?&api_key=$this->API_KEY&limit=$this->resultLimit&offset=$this->offset";
        $APIResponse = new ClientRequest($uri);
        $resource = $APIResponse->getGifResource();
        $URLs = [];

        foreach ($resource as $gif) {
            $URLs[] = new RecordResults($gif['images']['fixed_width']['url']);
        }
        return $URLs;
    }
}

