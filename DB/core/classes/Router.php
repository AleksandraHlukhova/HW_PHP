<?php

namespace App\Classes;

use App\Classes\MainController;

class Router
{
    public $controller = '';
    public $method = '';
    public $params = [];

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
            $method = ucfirst($routes[2]);
        }

        ///come &id=1
        if(!empty($routes[3]))
        {
            //word between & and =
            preg_match('|&(.*?)=|si', $routes[3], $key);
            //last numb
            preg_match('/\d$/', $routes[3], $value);
            //make array
            $params = [
                $key[1] => $value[0]
            ];
    
        }else
        {
            $params = [];
        }

        //connect controller
        MainController::$method($params);

    }
}