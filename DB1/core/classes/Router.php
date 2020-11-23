<?php

namespace App\Classes;

use App\Classes\MainController;

class Router
{

    public static $routing = [];

    //add route to routinf array
    public static function addRoute($path, $handlers)
    {
        $handlers = explode('@', $handlers);

            self::$routing[$path] =  [
                'controller' => $handlers[0],
                'method' => $handlers[1],
            ];
        
    }

    // take url and connect controller
    public static function run()
    {
        $url = str_replace(BASE_URL, '', $_SERVER['REQUEST_URI']);
        $url = str_replace('index.php?action=', '', $url);
        preg_match('|&(.*?)\d|si', $url, $key);
        preg_match('|&(.*?)=|si', $url, $params);
        
        if(count($key) > 0)
        {
            $url = str_replace($key, '', $url);
        }
       
        if(count($params) > 0)
        {
            $param = str_replace($params[0], '', $key[0]);
            $param = [
                $params[1] => $param
            ];
           
        }else
        {
            $param = []; 
        }

        if(self::match($url))
        {

            $controller = self::$routing[$url]['controller'];
            $method = self::$routing[$url]['method'];
            MainController::$method($param);
            
        }else{
            echo 'This pass doesn`t exist!';
        }
    }   
    
    //chack if url match with path from routing array
    public static function match($url)
    {
    
        foreach(self::$routing as $path => $route)
        {
            if($path == $url) return true;
        }
        return false;

    }   
    


}