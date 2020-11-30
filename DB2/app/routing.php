<?php

use App\Controllers\SiteNavController;
use App\Controllers\AuthController;

$app->router->get('/', [SiteNavController::class, 'home']);

$app->router->get('/contact', [SiteNavController::class, 'contact']);
$app->router->post('/contact', [SiteNavController::class, 'handleContact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);