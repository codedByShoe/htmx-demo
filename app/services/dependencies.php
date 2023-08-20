<?php

use DI\Container;
use Slim\Views\Twig;
use RyanChandler\Blade\Blade;
use Illuminate\Database\Capsule\Manager;

return function (Container $container) {
    // Set view in Container
    $container->set('view', function () {
        $cache = base_path('storage/cache');
        $views = base_path('views');

        $blade = new Blade($views, $cache);
        return $blade;
    });

    $container->set('settings', function () {
        $settings = require base_path('settings.php');
        return $settings;
    });

    $container->set('db', function ($container) {
        $settings = $container->get('settings');
        $conn = $settings['db']['default'];
        $config = $settings['db']['connections'][$conn];

        $capsule = new Manager();
        $capsule->addConnection($config);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        return $capsule;
    });
};
