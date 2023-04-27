<?php

namespace app\Controller;

use App\Models\StartUpSearch;

class ClientController
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

    public function searchGifs(): array
    {
        $searchPhrase = $_POST['searchPhrase'];
        $uri = "v1/gifs/search?q=$searchPhrase&api_key=$this->API_KEY&limit=$this->resultLimit";
        $app = new StartUpSearch($uri);
        return $app->getUrls();
    }

    public function trending(): array
    {
        $uri = "v1/gifs/trending?&api_key=$this->API_KEY&limit=$this->resultLimit";
        $app = new StartUpSearch($uri);
        return $app->getUrls();
    }

    public function home(): string
    {
        return 'Home';
    }

}
