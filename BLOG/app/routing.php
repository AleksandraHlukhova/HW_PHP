<?php

use App\Core\Classes\Controllers\HomeController;
use App\Core\Classes\Controllers\AuthController;
use App\Core\Classes\Controllers\ProfileController;
use App\Core\Classes\Controllers\PostController;
use App\Core\Classes\Controllers\CommentController;
use App\Core\Classes\Controllers\LikeController;


$app::$router->get('/', [HomeController::class, 'index']);
$app::$router->get('/post', [HomeController::class, 'post']);

$app::$router->get('auth/signup', [AuthController::class, 'index']);
$app::$router->post('auth/signup', [AuthController::class, 'signup']);

$app::$router->get('auth/profile', [ProfileController::class, 'index']);

$app::$router->get('post/index', [PostController::class, 'index']);
$app::$router->post('post/add', [PostController::class, 'add']);
$app::$router->get('post/show', [PostController::class, 'show']);
$app::$router->get('post/showOne', [PostController::class, 'showOne']);
$app::$router->post('post/showOne', [PostController::class, 'showOne']);
$app::$router->get('post/delete', [PostController::class, 'delete']);

$app::$router->get('comment/index', [CommentController::class, 'index']);
$app::$router->get('comment/delComment', [CommentController::class, 'delComment']);
$app::$router->get('like/index', [LikeController::class, 'index']);

$app::$router->get('post/bookmark', [PostController::class, 'bookmark']);
$app::$router->get('post/like', [LikeController::class, 'postLikes']);


$app::$router->get('post/edit', [PostController::class, 'edit']);
$app::$router->post('post/edit', [PostController::class, 'edit']);
$app::$router->get('post/delPhoto', [PostController::class, 'delPhoto']);


$app::$router->get('auth/login', [AuthController::class, 'login']);
$app::$router->post('auth/login', [AuthController::class, 'login']);

$app::$router->get('auth/logout', [AuthController::class, 'logout']);