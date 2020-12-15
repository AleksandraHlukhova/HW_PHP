<?php

use App\Core\Classes\Controllers\HomeController;
use App\Core\Classes\Controllers\AuthController;


$app::$router->get('/', [HomeController::class, 'index']);
$app::$router->get('/post', [HomeController::class, 'post']);

$app::$router->get('auth/signup', [AuthController::class, 'index']);
$app::$router->post('auth/signup', [AuthController::class, 'signup']);

$app::$router->get('auth/profile', [ProfileController::class, 'profile']);

$app::$router->get('auth/login', [AuthController::class, 'login']);
$app::$router->post('auth/login', [AuthController::class, 'login']);

$app::$router->get('auth/logout', [AuthController::class, 'logout']);