<?php

session_start();

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Classes\Application;
use App\Core\Classes\Router;
use App\Core\Classes\ConfigLoader;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = new ConfigLoader($_ENV);

$app = Application::getInstance();

require_once __DIR__ . '/app/routing.php';

$app->run();