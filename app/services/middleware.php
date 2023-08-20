<?php

use Slim\App;
use Tracy\Debugger;

return function (App $app) {
    // Add Tracy debugbar
    $app->addRoutingMiddleware();
    Debugger::enable(Debugger::Detect, base_path('storage/logs'));
    Debugger::$dumpTheme = 'dark';

    // add global middleware example
    // $app->add(new ExampleBeforeMiddleware);
};
