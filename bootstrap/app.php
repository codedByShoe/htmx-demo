<?php

use DI\Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();

$_SERVER['app'] = &$app;
if (!function_exists('app')) {
    function app()
    {
        return $_SERVER['app'];
    }
}

// Get container function and instantiate the container with services
$appContainer = require __DIR__ . '/../app/services/appContainer.php';
$appContainer($container);

// Set and instantiate global middlewares
$middleware = require __DIR__ . '/../app/services/middleware.php';
$middleware($app);

// Application routes
$routes = require __DIR__ . '/../app/services/routes.php';
$routes($app);

return $app;
