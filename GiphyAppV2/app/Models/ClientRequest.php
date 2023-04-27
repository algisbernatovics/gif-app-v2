<?php

namespace App\Models;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class ClientRequest
{
    private const BASE_URI = 'https://api.giphy.com';
    private array $searchResults;
    private object $response;

    public function __construct($uri)
    {

        $client = new Client(['base_uri' => self::BASE_URI]);

        try {
            $this->response = $client->request('GET', $uri);

        } catch (GuzzleException $e) {
        }

        $this->searchResults = json_decode($this->response->getBody(), true)['data'];
    }

    public function getGifResource(): array
    {
        return $this->searchResults;
    }
}

