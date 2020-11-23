<?php

use App\Classes\Router1;

// Router1::getInstance();


Router1::addRout('', 'MainController@index');
Router1::addRout('main', 'MainController@main');