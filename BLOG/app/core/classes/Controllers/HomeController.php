<?php

namespace App\Core\Classes\Controllers;

use App\Core\Models\Post;
use App\Core\Models\PostPhoto;
use App\Core\Models\Category;
use App\Core\Models\PostLike;
use App\Core\Models\User;
use App\Core\Models\Bookmark;
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

        $categories = Category::getAll();
        $posts = Post::getAll();
        $postsPhotos = PostPhoto::getAll();
        $postLikes = PostLike::getAll();
        $bookmarks = Bookmark::getAll();
        $users = User::getAll();
        $data = $this->transformer->transformIndex($categories, $posts, $postsPhotos, $postLikes, $bookmarks, $users);
//  echo "<pre>";
// var_dump($data);
// exit;
        $this->DB->disconnect();

        return $this->view->render('home', 'main', ['info' => $data]);
    }

    /**
     * post method
     * @param 
     * @return view with data
    **/
    public function post($params)
    {

        $categories = Category::getAll();
        $posts = $this->posts->select("SELECT * FROM posts WHERE id = ?", [$params['post_id']]);
        $postsPhotos = $this->postsPhoto->select('SELECT * FROM post_photos');
        $postLikes = PostLike::getAll();
        $bookmarks = Bookmark::getAll();
        $users = User::getAll();
        
        $data = $this->transformer->transformIndex($categories, $posts, $postsPhotos, $postLikes, $bookmarks, $users);

        $this->DB->disconnect();

        return $this->view->render('posts', 'main', ['info' => $data]);       
    }
}