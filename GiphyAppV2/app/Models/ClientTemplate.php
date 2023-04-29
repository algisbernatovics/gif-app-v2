<?php

namespace App\Models;

class ClientTemplate
{
    protected string $API_KEY;
    protected string $resultLimit;
    protected ?string $searchPhrase;

    public function __construct()
    {
        $this->API_KEY = $_ENV['API_KEY'];
        $this->resultLimit = $_ENV['SEARCH_RESULT_LIMIT'];
        $this->searchPhrase = $_POST['searchPhrase'];
    }

    public function search(): array
    {
        $searchPhrase = $_POST['searchPhrase'];
        $uri = "v1/gifs/search?q=$searchPhrase&api_key=$this->API_KEY&limit=$this->resultLimit";
        $APIResponse = new ClientRequest($uri);
        $resource = $APIResponse->getGifResource();
        $URLs = [];

        foreach ($resource as $gif) {
            if (isset($gif['url'])) {
                $URLs[] = new RecordResults($gif['images']['fixed_width']['url']);
            }
        }
        return $URLs;
    }

    public function trending(): array
    {
        $uri = "v1/gifs/trending?&api_key=$this->API_KEY&limit=$this->resultLimit";
        $APIResponse = new ClientRequest($uri);
        $resource = $APIResponse->getGifResource();
        $URLs = [];
        foreach ($resource as $gif) {

            if (isset($gif)) {
                $URLs[] = new RecordResults($gif['images']['fixed_width']['url']);
            }
        }
        return $URLs;
    }

    public function random(): array
    {
        $uri = "v1/gifs/random?&api_key=$this->API_KEY";
        $APIResponse = new ClientRequest($uri);
        $resource = $APIResponse->getGifResource();
        $URLs = [];
        $URLs[] = new RecordResults($resource['images']['fixed_width']['url']);
        return $URLs;
    }
}

