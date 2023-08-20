<?php

use DI\Container;
use Slim\Views\Twig;

return function (Container $container) {
    // Set view in Container
    $container->set('view', function () {
        return Twig::create(base_path('views'), ['cache' => false]);
    });
};
