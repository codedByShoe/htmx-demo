<?php

use Slim\App;
use Slim\Routing\RouteCollectorProxy;
use App\Http\Controllers\WelcomeController;

return function (App $app) {
    $app->get('/', [WelcomeController::class, 'index']);
    $app->get('/posts', [WelcomeController::class, 'show']);
    $app->get('/about', function ($response) {
        return view($response, 'about');
    });
    $app->post('/test', [WelcomeController::class, 'test']);
    $app->get('/contact', function ($response) {
        return view($response, 'contact');
    });
    // api routes prefixed with /api
    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->get('/{name}', [WelcomeController::class, 'api']);
    });
};
