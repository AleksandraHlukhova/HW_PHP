<?php

namespace App\Classes;

use App\Classes\MainController;

class Router
{
    public $controller = '';
    public $method = '';
    public $params = '';

    public static function getRout()
    {
        //get path after domain
        $url = str_replace(BASE_URL, '', $_SERVER['REQUEST_URI']);
        // replace index.php?action= from path
        $url = str_replace('index.php?action=', '', $url);

        // make array of path. 
        //[0] - controller
        //[1] - method
        //[2] - params
        $routes = explode('/', $url);
        //var_dump($routes);

        //without params connect home page
        if(empty($routes[0]) && empty($routes[1]))
        {
            MainController::index();
            return;
        }

        // make controller name
        if(!empty($routes[1]))
        {
            $controller = ucfirst($routes[1] . 'Controller');
        }

        //make method name
        if(!empty($routes[2]))
        {
            $method = $routes[2];
        }
        
        ///show error
        //$controller::$method();

        //connect controller
        MainController::$method();

    }
}