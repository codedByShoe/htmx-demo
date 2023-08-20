<?php

use DI\Container;
use App\Libraries\Database;
use RyanChandler\Blade\Blade;

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
        return new Database($settings['db']);
    });
};
