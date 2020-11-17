<?php

namespace App\Classes;

use App\Classes\MainController;

class Router
{
    private $controller = '';
    private $method = '';

    public static function getRout()
    {
        $url = str_replace(BASE_URL, '', $_SERVER['REQUEST_URI']);
        $url = str_replace('index.php?action=', '', $url);
        $routes = explode('/', $url);
        var_dump($routes);
        if(empty($routes[0]) && empty($routes[1]))
        {
            MainController::index();
        }

        if(!empty($routes[1]))
        {
            $controller = ucfirst($routes[1] . 'Controller');
        }

        if(!empty($routes[2]))
        {
            $method = $routes[2];
        }
        
        MainController::$method();

    }
}