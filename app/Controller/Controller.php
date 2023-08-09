<?php

namespace app\Controller;

use App\Models\ClientTemplate;
use App\Models\ViewResults;

class Controller
{
    public function trending(): ViewResults
    {
        $clientTemplate = new ClientTemplate();
        $gifs = $clientTemplate->trending();
        return new ViewResults('gifs.view.twig', ['gifs' => $gifs]);
    }

    public function search(): ViewResults
    {
        $clientTemplate = new ClientTemplate();
        $gifs = $clientTemplate->search();
        return new ViewResults('gifs.view.twig', ['gifs' => $gifs]);
    }

    public function random(): ViewResults
    {
        $clientTemplate = new ClientTemplate();
        $gifs = $clientTemplate->random();
        return new ViewResults('gifs.view.twig', ['gifs' => $gifs]);
    }

    public function home(): void
    {

    }
}
