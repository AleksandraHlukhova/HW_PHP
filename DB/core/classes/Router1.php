<?php

namespace App\Classes;

use App\Classes\MainController;

class Router1
{
    public static $routing = [];

    public static function addRout($path, $handlers)
    {
        $handlers = explode('@', $handlers);

            self::$routing[$path] =  [
                'controller' => $handlers[0],
                'method' => $handlers[1],
            ];
        debug(self::$routing);

        
    }

    

}