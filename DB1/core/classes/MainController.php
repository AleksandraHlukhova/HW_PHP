<?php

namespace App\Classes;

use App\Classes\DbConnect;
use App\Models\CategoryModel;
use App\Models\PostModel;
use App\Models\PostPhotoModel;

class MainController
{
    //connect tmpl
    public static function load($path = 'home', $categories = [], $data = [])
    {
        $_SESSION['path'] = $path;
        $_SESSION['categories'] = $categories;
        $_SESSION['data'] = $data;

        require_once __DIR__ . '/../../views/layout/main.view.php';
    }

    //connect home page
    public static function index($params = [])
    {
        $mysqli = new DbConnect(HOST, USER, PASS, DbName);

        $categories = CategoryModel::getCategories($mysqli);
        $posts = PostModel::getPosts($mysqli);
        
        $tnsf = [];
        echo "<pre>";
        print_r($categories);
        print_r($posts);
        foreach ($categories as $catId => &$category) {
            $catPosts = [];
            foreach($posts as $key => $post) 
            {
                if($post->category_id === $catId)
                {
                    $catPosts[$catId] = $posts[$catId];
                }
            }
            // var_dump($catId, intval($post->category_id));
           
               $category->posts = $catPosts; 

        }
        
        // print_r($catPosts);
        exit;
        
        //$photos = PostPhotoModel::getPostPhotos($mysqli);
        
        DbConnect::closeConnection($mysqli);
    

        self::load('home', $categories, $posts);
    }

    //connect posts page
    public static function post($params)
    {
        $mysqli = new DbConnect(HOST, USER, PASS, DbName);
        $categories = CategoryModel::getCategories($mysqli);

        $mysqli1 = new DbConnect(HOST, USER, PASS, DbName);
        $posts = PostModel::getPosts($mysqli1, $params);

        self::load('home', $categories, $posts);
    }
}