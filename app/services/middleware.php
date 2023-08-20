<?php

use App\Http\Middleware\ExampleBeforeMiddleware;
use Slim\Views\TwigMiddleware;
use Slim\App;
use Tracy\Debugger;

return function (App $app) {
    // Add Tracy debugbar
    Debugger::enable(Debugger::Detect, base_path('storage/logs'));
    Debugger::$dumpTheme = 'dark';

    // Add Twig-View Middleware
    $app->add(TwigMiddleware::createFromContainer($app));

    // add global middleware example
    // $app->add(new ExampleBeforeMiddleware);
};
