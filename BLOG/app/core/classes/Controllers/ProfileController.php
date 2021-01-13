<?php

namespace App\Core\Classes\Controllers;
use App\Core\Models\User;
use App\Core\Models\PostLike;
use App\Core\Models\Comment;
use App\Core\Models\Post;
use App\Core\Models\Bookmark;

/**
 * ProfileController class
 */
class ProfileController extends Controller
{

    /**
     * show profile
     * @param 
     * @return 
     **/
    public function index()
    {
        $user = User::select("SELECT * FROM users WHERE id = ?", [$_SESSION['auth']]); 
        $likes_qty = PostLike::select("SELECT COUNT(id) as qty FROM post_likes ")[0]->qty; 
        $comments_qty = Comment::select("SELECT COUNT(id) as qty FROM comments ")[0]->qty; 
        $posts_qty = Post::select("SELECT COUNT(id) as qty FROM posts ")[0]->qty; 
        $bookmarks_qty = Bookmark::select("SELECT COUNT(id) as qty FROM post_bookmarks ")[0]->qty; 

        return $this->view->render('profile', 'profile-main', [
            'user' => $user,
            'likes_qty' => $likes_qty,
            'comments_qty' => $comments_qty,
            'posts_qty' => $posts_qty,
            'bookmarks_qty' => $bookmarks_qty,
        ]);
    }
    
}