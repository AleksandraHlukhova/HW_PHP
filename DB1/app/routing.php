<?php

use App\Classes\Router;


Router::addRoute('', 'MainController@index');
Router::addRoute('main/index', 'MainController@index');
Router::addRoute('main/post/', 'MainController@post');