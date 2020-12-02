<?php

namespace App\Core\Classes\Controllers;

use App\Core\Models\Category;
use App\Core\Models\Post;
use App\Core\Models\PostPhoto;
use App\Core\Classes\Transformers\TransformerInfo;


/**
 * HomeController class
 */
class HomeController extends Controller
{

    public Category $category;
    public Post $posts;
    public PostPhoto $postsPhoto;

    public function __construct()
    {
        parent::__construct();
        $this->category = new Category;
        $this->posts = new Post;
        $this->postsPhoto = new PostPhoto;
    }


    /**
     * home method
     * @param 
     * @return 
    **/
    public function index()
    {

        $categories = $this->category->getCategories();
        $posts = $this->posts->getPosts();
        $postsPhotos = $this->postsPhoto->getPostsPhotos();

        // $data = TransformerInfo::transformIndex($categories, $posts, $postsPhotos);
        $data = $this->transformer->transformIndex($categories, $posts, $postsPhotos);

        // echo '<pre>';
        // var_dump($data);
        // exit;
        return $this->view->render('home', $data);
    }
    
    
}