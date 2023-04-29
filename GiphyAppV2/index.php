<?php

require 'vendor/autoload.php';

include 'app/Views/form.view.twig';
include 'router.php';

use App\Models\ViewResults;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader('app/Views');
$twig = new Environment($loader, [
    'cache' => 'app/cache',
]);
/** @var ViewResults $response */
echo $twig->render('gifs.view.twig', $response->getURLs());










