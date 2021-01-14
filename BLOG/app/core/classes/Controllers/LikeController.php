<?php

namespace App\Core\Classes\Controllers;

use App\Core\Models\User;
use App\Core\Models\Post;
use App\Core\Models\Comment;
use App\Core\Models\Category;
use App\Core\Models\PostLike;
use App\Core\Models\PostPhoto;
use App\Core\Models\Bookmark;
use App\Core\Classes\Errors\CustomException;

/**
 * LikeController class
 */
class LikeController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * show all my comments
     * @param 
     * @return 
     **/
    public function index()
    {
        $myLikes = PostLike::select("SELECT * FROM post_likes WHERE user_id = ?", [$_SESSION['auth']]); 
        $posts = Post::select("SELECT * FROM posts ");
        $categories = Category::getAll();
        $comments = Comment::getAll();
        $postPhotos = PostPhoto::getAll();
        $likes = PostLike::getAll();
        $bookmarks = Bookmark::getAll();
        $writers = User::getAll();
        $user = User::select("SELECT * FROM users WHERE id = ?", [$_SESSION['auth']]);

        $data = $this->transformer->transformLikesPost($categories, $comments, $posts, $writers, $myLikes, $postPhotos, $likes, $bookmarks);

        return $this->view->render('mylikes', 'profile-main', [
            'info' => $data,
            'user' => $user
        ]);
    }

        /**
     * delate photo when edit post
     * @param 
     * @return 
     **/

    public function postLikes($params)
    {
        $post_id = $params['post_id'];
        
        $user = User::select("SELECT * FROM users WHERE id = ?", [$_SESSION['auth']]);
        $user_id =  $user[0]->id;
        
        $status = PostLike::select('SELECT status FROM post_likes WHERE user_id=:user_id AND post_id=:post_id', [':user_id' => $user_id, ':post_id' => $post_id]);
    
        if($status)
        {
            $stmt = PostLike::delate("DELETE FROM post_likes WHERE user_id=:user_id AND post_id=:post_id", [':user_id' => $user_id, ':post_id' => $post_id]);
            if($stmt)
            {
            header("Location: ". $_SERVER['HTTP_REFERER']);
            return;

            }else{
            new CustomException('You were not registred!');
            header("Location: ". $_SERVER["REQUEST_URI"]);
            return;
            }

        }
       
        $status = 1;
        $stmt = PostLike::insert("INSERT INTO post_likes (user_id, post_id, status) 
        VALUES (:user_id, :post_id, :status)", [':user_id' => $user_id, ':post_id' => $post_id, ':status' => $status]);
        //if was added to db, user is auth
        if($stmt)
        {
            header("Location: ". $_SERVER['HTTP_REFERER']);

        }else{
            new CustomException('You were not registred!');
            header("Location: ". $_SERVER["REQUEST_URI"]);

        }
    }
    
}