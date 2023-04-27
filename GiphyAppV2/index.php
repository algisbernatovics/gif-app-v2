<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

include 'router.php';
include 'app/Views/form.view.html';
require 'vendor/autoload.php';

$loader = new FilesystemLoader('app/Views');
$twig = new Environment($loader, [
    'cache' => 'app/cache',
]);

if (gettype($response) == 'string') {
    echo $response;

} elseif (gettype($response) == 'array') {
    $template = $twig->load('result.view.html');
    foreach ($response as $url) {
        $img = $url->getUrl();
        echo $template->render(['url' => $img]);
    }
}




