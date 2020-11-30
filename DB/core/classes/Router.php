<?php

namespace App\Classes;

use App\Classes;
//use App\Classes\MainController;

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
            $method = strtolower($routes[2]);
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

        //var_dump(__NAMESPACE__ . '\\' . $controller);
        //connect controller

        $className = sprintf("%s\\%s", __NAMESPACE__, $controller);
        // var_dump($className);
        // exit;

        $className::$method($params);

        //__NAMESPACE__ . '\\' . $controller::$method($params);
        // call_user_func($controller, $method, $params);

    }
}