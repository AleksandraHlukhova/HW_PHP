<?php

namespace App\Core\Classes\Controllers;

use App\Core\Models\User;
use App\Core\Models\Post;
use App\Core\Models\Comment;
use App\Core\Models\Category;
use App\Core\Models\PostLike;
use App\Core\Models\Bookmark;
use App\Core\Classes\Errors\CustomException;

/**
 * CommentController class
 */
class CommentController extends Controller
{

    public Request $request;
    public Validate $validate;

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
        $yourComments = Comment::select("SELECT * FROM comments WHERE user_id = ? ORDER BY `date` DESC", [$_SESSION['auth']]); 
        $posts = Post::select("SELECT * FROM posts ");
        $categories = Category::getAll();
        $likes = PostLike::getAll();
        $bookmarks = Bookmark::getAll();
        $comments = Comment::getAll();
        $writers = User::getAll();

        $user = User::select("SELECT * FROM users WHERE id=?", [$_SESSION['auth']]);

        $data = $this->transformer->transformCommentPost($categories, $yourComments, $posts, $writers, $likes, $bookmarks, $comments);

        return $this->view->render('mycomments', 'profile-main', [
            'info' => $data,
            'user' => $user
        ]);
    }

        /**
     * delate comment
     * @param 
     * @return 
     **/

    public function delComment($params)
    {
        $post_id = $params['post_id'];
        $comment_id = $params['comment_id'];
         
        $stmt = Comment::delate('DELETE FROM comments WHERE id=:id AND post_id=:post_id', [':id' => $comment_id, ':post_id' => $post_id]);

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
    
}