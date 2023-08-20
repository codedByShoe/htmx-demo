<?php

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\ExampleAfterMiddleware;

return function (App $app) {
    $app->get('/', [WelcomeController::class, 'index']);
    $app->get('/test/{name}', [WelcomeController::class, 'test'])->add(new ExampleAfterMiddleware);
    $app->get('/about', function ($response) {
        return view($response, 'about.twig');
    });
    $app->get('/contact', function ($response) {
        return view($response, 'contact.twig');
    });
    // api routes prefixed with /api
    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->get('/{name}', [WelcomeController::class, 'api']);
    });
};
