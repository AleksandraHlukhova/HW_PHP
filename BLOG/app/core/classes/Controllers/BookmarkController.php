<?php

namespace App\Core\Classes\Controllers;

use App\Core\Models\User;
use App\Core\Models\Post;
use App\Core\Models\Comment;
use App\Core\Models\Category;
use App\Core\Models\PostLike;
use App\Core\Models\Bookmark;
use App\Core\Models\PostPhoto;
use App\Core\Classes\Errors\CustomException;

/**
 * BookmarkController class
 */
class BookmarkController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * show all my bookmarks
     * @param 
     * @return 
     **/
    public function index()
    {
        $bookmarks = Bookmark::select("SELECT * FROM post_bookmarks WHERE user_id = ?", [$_SESSION['auth']]);
        $likes = PostLike::getAll(); 
        $posts = Post::getAll();
        $categories = Category::getAll();
        $comments = Comment::getAll();
        $postPhotos = PostPhoto::getAll();
        $writers = User::getAll();
        $user = User::select("SELECT * FROM users WHERE id = ?", [$_SESSION['auth']]);

        $data = $this->transformer->transformBookmarkPost($categories, $comments, $posts, $writers, $likes, $bookmarks, $postPhotos);
        // echo '<pre>';
        // var_dump($data);
        // exit;
        return $this->view->render('mybookmarks', 'profile-main', [
            'info' => $data,
            'user' => $user
        ]);
    }

        /**
     * delate photo when edit post
     * @param 
     * @return 
     **/

    public function postBookmarks($params)
    {
        $post_id = $params['post_id'];
        $user = User::select("SELECT * FROM users WHERE id = ?", [$_SESSION['auth']]);
        $user_id =  $user[0]->id;
        $status = Bookmark::select('SELECT status FROM post_bookmarks WHERE user_id=:user_id AND post_id=:post_id', [':user_id' => $user_id, ':post_id' => $post_id])[0]->status;

        if($status)
        {
            $stmt = Bookmark::delate("DELETE FROM post_bookmarks WHERE user_id=:user_id AND post_id=:post_id", [':user_id' => $user_id, ':post_id' => $post_id]);
            if($stmt)
        {
            header("Location: ". $_SERVER['HTTP_REFERER']);
            return;

        }else{
            new CustomException('You were not registred!');
            header("Location: ". $_SERVER["REQUEST_URI"]);
            return;

        }
        }else{
            $status = 1;
        }
        $stmt = Bookmark::insert("INSERT INTO post_bookmarks (user_id, post_id, status) 
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