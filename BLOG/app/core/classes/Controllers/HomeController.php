<?php

namespace App\Core\Classes\Controllers;

use App\Core\Models\Post;
use App\Core\Models\PostPhoto;
use App\Core\Classes\Database\PdoConnection;
use App\Core\Classes\Transformers\TransformerInfo;
// use App\Core\Classes\Request;


/**
 * HomeController class
 */
class HomeController extends Controller
{

    public Post $posts;
    public PostPhoto $postsPhoto;
    public PdoConnection $DB;

    public function __construct()
    {
        parent::__construct();
        $this->posts = new Post;
        $this->postsPhoto = new PostPhoto;
        $this->DB = new PdoConnection();
    }


    /**
     * home method
     * @param 
     * @return view with data
    **/
    public function index()
    {

        $categories = $this->category->select('SELECT * FROM category');
        $posts = $this->posts->select('SELECT * FROM post');
        $postsPhotos = $this->postsPhoto->select('SELECT * FROM post_photos');

        $data = $this->transformer->transformIndex($categories, $posts, $postsPhotos);

        $this->DB->disconnect();

        return $this->view->render('home', ['info' => $data, 'main' => 1]);
    }

    /**
     * post method
     * @param 
     * @return view with data
    **/
    public function post($params)
    {

        $categories = $this->category->select('SELECT * FROM category');
        $posts = $this->posts->select("SELECT * FROM post WHERE id = ?", [$params['id']]);
        $postsPhotos = $this->postsPhoto->select('SELECT * FROM post_photos');

        $data = $this->transformer->transformIndex($categories, $posts, $postsPhotos);

        $this->DB->disconnect();

        return $this->view->render('posts', $data);
        
    }


    
    
}