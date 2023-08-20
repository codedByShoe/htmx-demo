<?php

use DI\Container;
use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;
use DI\Bridge\Slim\Bridge as SlimAppFactory;

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();
// AppFactory::setContainer($container);
$app = SlimAppFactory::create($container);

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
try {
    $env = Dotenv::createImmutable(base_path());
    $env->load();
} catch (InvalidPathException $e) {
}
// Set and instantiate global middlewares
$middleware = require __DIR__ . '/../app/services/middleware.php';
$middleware($app);

// Application routes
$routes = require __DIR__ . '/../routes.php';
$routes($app);

// returning the app instance to be passed into public/index
return $app;
