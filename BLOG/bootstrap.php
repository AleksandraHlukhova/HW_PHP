<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Classes\Application;
use App\Core\Classes\Router;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// echo '<pre>';
// var_dump($_ENV['BASE_PATH']);
// exit;
$app = new Application($_ENV['BASE_URL'], __DIR__);

require_once __DIR__ . '/app/routing.php';
// echo '<pre>';
// var_dump($_SERVER);
$app->run();