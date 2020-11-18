<?php

namespace App\Classes;

use App\Classes\DbConnect;
use App\Models\PostModel;

class MainController
{
    //connect tmpl
    public static function load($path = 'home', $data = [])
    {
        $_SESSION['path'] = $path;
        $_SESSION['data'] = $data;
        //var_dump($_SESSION);
        require_once __DIR__ . '/../../views/layout/main.view.php';
    }

    //connect home page
    public static function index()
    {
        self::load();
    }

    //connect posts page
    public static function posts()
    {
        $mysqli = new DbConnect(HOST, USER, PASS, DbName);
        $data = PostModel::getPosts($mysqli);
        self::load('post', $data);
    }
}