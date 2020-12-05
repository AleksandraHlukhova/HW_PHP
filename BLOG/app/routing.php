<?php

use App\Core\Classes\Controllers\HomeController;


$app::$router->get('/', [HomeController::class, 'index']);
$app::$router->get('/content', 'content');