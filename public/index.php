<?php

// autoload app dependencies and classes
require __DIR__ . '/../vendor/autoload.php';

// bootstrap application
$app = require __DIR__ . '/../bootstrap.php';

// instantiate the application or run it....
$app->run();
