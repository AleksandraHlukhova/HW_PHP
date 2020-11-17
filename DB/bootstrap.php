<?php

session_start();

require_once __DIR__ . '/settings.php';
require_once __DIR__ . '/views/layout/main.view.php';
require_once __DIR__ . '/vendor/autoload.php';

use App\Classes\Router;


Router::getRout();


// $mysqli = new DbConnect(HOST, USER, PASS, DbName);
// $data = PostModel::getPosts($mysqli);
// var_dump($data);


