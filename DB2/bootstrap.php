<?php

session_start();

require_once __DIR__ . '/init.php';
require_once __DIR__ . '/settings.php';
require_once __DIR__ . '/vendor/autoload.php';

use App\Classes\Application;

$app = new Application(__DIR__);

require_once __DIR__ . '/app/routing.php';

$app->run();




