<?php

namespace Core\Classes;

class AutoloadClass
{

    public static function load()
    {
        self::loadClasses();
        self::loadInterfaces();
        self::loadTraites();

    }

    //autoload classes
    public static function loadClasses()
    {
        spl_autoload_register(function($className)
        {
            $pathFile = $className . '.php';

            if(file_exists($pathFile))
            {
                include_once $pathFile;
            }
        });

    }

    //autoload interfaces
    public static function loadInterfaces()
    {
        spl_autoload_register(function($interfaceName)
        {
            $pathFile = $interfaceName . '.php';

            if(file_exists($pathFile))
            {
                include_once $pathFile;
            }
        });

    }

    //autoload traites
    public static function loadTraites()
    {
        spl_autoload_register(function($traitName)
        {
            $pathFile = $traitName . '.php';
            if(file_exists($pathFile))
            {
                include_once $pathFile;
            }
        });

    }


}