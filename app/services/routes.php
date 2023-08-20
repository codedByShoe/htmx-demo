<?php

use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\ExampleAfterMiddleware;

return function (App $app) {
    $app->get('/', [WelcomeController::class, 'index']);
    $app->get('/test/{name}', [WelcomeController::class, 'test'])->add(new ExampleAfterMiddleware);
    $app->get('/about', function (Request $req, Response $res, $args) {
        return view($res, 'about.twig');
    });
    $app->get('/contact', function (Request $req, Response $res, $args) {
        return view($res, 'contact.twig');
    });
    // api routes
    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->get('/{name}', [WelcomeController::class, 'api']);
    });
};
