<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

require '../app/routes/api.php';


// prueba de llamada a un controlador
$app->get('/hello/{name}', [new App\Controllers\PruebaController, 'hello']);


$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});



