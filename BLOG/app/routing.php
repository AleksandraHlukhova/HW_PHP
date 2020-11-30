<?php

use App\Core\Classes\Controllers\HomeController;


$app->router->get('/', [HomeController::class, 'home']);
$app->router->get('/content', 'content');