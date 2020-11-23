<?php

use App\Classes\Router;

// Router1::getInstance();


Router::addRoute('', 'MainController@index');
Router::addRoute('main/index', 'MainController@index');
Router::addRoute('main/post/', 'MainController@post');