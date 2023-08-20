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
function app()
{
    return $_SERVER['app'];
}

// Get container function and instantiate the container with services
$dependencies = require __DIR__ . '/../app/services/dependencies.php';
$dependencies($container);

try {
    $env = Dotenv::createImmutable(__DIR__ . '/../');
    $env->load();
} catch (InvalidPathException $e) {
}
$container->get('db');

// Set and instantiate global middlewares
$middleware = require __DIR__ . '/../app/services/middleware.php';
$middleware($app);


// Application routes
$routes = require __DIR__ . '/../routes.php';
$routes($app);

// returning the app instance to be passed into public/index
return $app;
