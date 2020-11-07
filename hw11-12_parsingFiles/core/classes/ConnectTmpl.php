<?php

namespace Core\Classes;

class ConnectTmpl
{
    public static function getTmpl($mainPath, $connectedPath, $data)
    {
        $_SESSION['path'] = $connectedPath;
        $_SESSION['data'] = $data;
        
        require_once $mainPath;
    }
}