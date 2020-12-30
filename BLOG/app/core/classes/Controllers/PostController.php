<?php

namespace App\Core\Classes\Controllers;

use App\Core\Models\Category;
use App\Core\Models\User;
use App\Core\Models\Post;
use App\Core\Models\PostPhoto;
use App\Core\Models\Comment;
use App\Core\Models\Bookmark;
use App\Core\Models\PostLike;
use App\Core\Classes\Request;
use App\Core\Classes\Helpers\Validate;
use App\Core\Classes\Helpers\FileUpload;
use App\Core\Classes\Errors\CustomException;

/**
 * PostController class
 */
class PostController extends Controller
{

    public Request $request;
    public Validate $validate;

    public function __construct()
    {
        parent::__construct();
        $this->request = new Request;
        $this->validate = new Validate;
    }

    /**
     * show add post form
     * @param 
     * @return 
     **/
    public function index()
    {
        $user = User::select("SELECT * FROM users WHERE id = ?", [$_SESSION['auth']]); 

        $categories = Category::getAll();
        return $this->view->render('profile-post', 'profile-main', [
            'categories' => $categories,
            'user' => $user
        ]);
    }

    /**
     * form handler
     * @param 
     * @return 
     **/
    public function add()
    {
        //get data
        $data = $this->request->getData();
        //about photos info
        $photosInfo = $_FILES;
        //clean data
        $data = $this->validate->clean($data);
        
        $result[] = $this->validate->validate($data, [
            'title' => [
                'checkLengthTitle' => true,
            ],
            'description' => [
                'checkLengthDescription' => true,
            ]
        ]);

        if($photosInfo)
        {
            $result[] = $this->validate->validate($photosInfo['photos'], [
                'type' => [
                    'checkMimeType' => $photosInfo['photos']['type'],
                ],
                'size' => [
                    'checkImageSize' => $photosInfo['photos']['size'],
                ]
            ]);
        
            foreach($result as $bool)
            {
                if(!$bool)
                {
                    $result = false;
                }else{
                    $result = true;
                }            
            }
        }
        $categories = Category::getAll();
        $user = User::select("SELECT * FROM users WHERE id = ?", [$_SESSION['auth']]); 
        
        if(!$result)
        {
            return $this->view->render('profile-post','profile-main', [
                'errors' => $this->validate->err,
                'oldInput' => $this->validate->oldInput,
                'categories' => $categories,
                'user' => $user
            ]);
        }
        
        $category_id = $data['category'];
        $title = $data['title'];
        $description = $data['description'];

        $user_id = $_SESSION['auth'];

        $date = new \DateTime;
        $date = $date->format('Y-m-d H:i:s');

        //add to db
        $stmt = Post::insert("INSERT INTO posts (user_id, category_id, title, description, status, date) 
        VALUES (:user_id, :category_id, :title, :description, :status, :date)", [':user_id' => $user_id, ':category_id' => $category_id, ':title' => $title, 
        ':description' => $description, ':status' => 'posted', ':date' => $date]);
        
        //last  post id
        $post_id = Post::select('SELECT * FROM posts ORDER BY id DESC LIMIT 1')[0]->id;
        //remove photo, hash and get path
        $pathes = FileUpload::getPath($photosInfo['photos']);

        foreach($pathes as $key => $photo_path)
        {
            $stmt1 = PostPhoto::insert("INSERT INTO post_photos (post_id, photo_path) 
            VALUES (:post_id, :photo_path)", [':post_id' => $post_id, ':photo_path' => $photo_path]);
        }

        //if was added to db, user is auth
        if($stmt && $stmt1)
        {
            return $this->view->render('success-posted', 'profile-main', [
                'user' => $user
            ]);

        }else{
            new CustomException('You were not registred!');
            return $this->view->render('profile-post', 'profile-main', [
                'user' => $user, 
                'categories' => $categories
            ]);
        }
    }

    /**
     * show all my posts
     * @param 
     * @return 
     **/
    public function show()
    {
        $user_id = $_SESSION['auth'];
        $posts = Post::select('SELECT * FROM posts WHERE user_id = ?', [$user_id]);
        
        $categories = Category::getAll();
        $postsPhotos = PostPhoto::getAll();
        $user = User::select("SELECT * FROM users WHERE id = ?", [$_SESSION['auth']]); 
        $postLikes = PostLike::getAll();
        $bookmarks = Bookmark::getAll();
        $users = User::getAll();

        $data = $this->transformer->transformIndex($categories, $posts, $postsPhotos, $postLikes, $bookmarks, $users);

        return $this->view->render('profile-my-post', 'profile-main', [
            'info' => $data,
            'user' => $user
        ]);
    }

        /**
     * show all my posts
     * @param 
     * @return 
     **/
    public function showOne($params)
    {
        $post_id = $params['post_id'];

        $categories = Category::getAll();
        $posts = Post::select('SELECT * FROM posts WHERE id = ?', [$post_id]);
        $postsPhotos = PostPhoto::getAll();
        $bookmarks = Bookmark::getAll();
        $comments = Comment::select('SELECT * FROM comments WHERE post_id=?', [$post_id]);
        $users = User::getAll();
        $postLikes = PostLike::getAll();

        $dataQ = $this->transformer->transformForOnePost($categories, $posts, $postLikes, $postsPhotos, $bookmarks, $comments, $users);
        // echo '<pre>';
        // var_dump($dataQ);
        // exit;
        if($this->request->getMethod() === 'POST')
        {
            //get data
            $data = $this->request->getData();
            //clean data
            $data = $this->validate->clean($data);
            
            $result[] = $this->validate->validate($data, [
                'comment' => [
                    'checkLengthDescription' => true,
                ]
            ]);

        if(!$result)
        {
            return $this->view->render('post','main', [
                'errors' => $this->validate->err,
                'oldInput' => $this->validate->oldInput
            ]);
        }

        $comment = $data['comment'];
        $post_id = $params['post_id'];
        $user_id = $_SESSION['auth'];

        $date = new \DateTime;
        $timestamp = $date->format('Y-m-d H:i:s');

        //add to db
        $stmt = Comment::insert("INSERT INTO comments (user_id, post_id, description, date) 
        VALUES (:user_id, :post_id, :description, :date)", [':user_id' => $user_id, ':post_id' => $post_id, 
        ':description' => $comment, ':date' => $timestamp]);
        
        $comments = Comment::select('SELECT * FROM comments WHERE post_id=?', [$post_id]);

        //$dataQ = $this->transformer->transformForOnePost($categories, $posts, $postLikes, $postsPhotos, $bookmarks, $comments, $users);
         //if was added to db, user is auth
        if($stmt)
        {
            return $this->view->render('posts', 'main', [
                'info' => $dataQ
            ]);
 
        }else{
            new CustomException('You were not registred!');
            return $this->view->render('posts', 'main', [
                'info' => $dataQ
            ]);
        }
        }
        return $this->view->render('posts', 'main', [
            'info' => $dataQ
        ]);
    }

    /**
     * edit my posts
     * @param 
     * @return 
     **/
    public function edit($params)
    {
        $user = User::select("SELECT * FROM users WHERE id = ?", [$_SESSION['auth']]); 

        if($this->request->getMethod() === 'GET')
        {
            $posts = Post::select('SELECT * FROM posts WHERE id = ?', [$params['post_id']]);
            $categories = Category::getAll();
            $postsPhotos = PostPhoto::getAll();
            $postLikes = PostLike::getAll();
            $bookmarks = Bookmark::getAll();
            $users = User::getAll();

            $data = $this->transformer->transformIndex($categories, $posts, $postsPhotos, $postLikes, $bookmarks, $users);
            
            return $this->view->render('profile-edit-post', 'profile-main', [
                'info' => $data,
                'user' => $user
            ]);
        }

        //get data
        $data = $this->request->getData();
        //about photos info
        $photosInfo = $_FILES;
        //clean data
        $data = $this->validate->clean($data);
        
        $result[] = $this->validate->validate($data, [
            'title' => [
                'checkLengthTitle' => true,
            ],
            'description' => [
                'checkLengthDescription' => true,
            ]
        ]);
   
        if($photosInfo)
        {
            $result[] = $this->validate->validate($photosInfo['photos'], [
                'type' => [
                    'checkMimeType' => $photosInfo['photos']['type'],
                ],
                'size' => [
                    'checkImageSize' => $photosInfo['photos']['size'],
                ]
            ]);
        
            foreach($result as $bool)
            {
                if(!$bool)
                {
                    $result = false;
                }else{
                    $result = true;
                }            
            }
        }
        
        $categories = Category::getAll();

        if(!$result)
        {
            $post = Post::select('SELECT * FROM posts WHERE id = ?', [$params['post_id']]);
            $postsPhotos = PostPhoto::getAll();
    
            $postLikes = PostLike::getAll();
            $bookmarks = Bookmark::getAll();
            $users = User::getAll();

            $data = $this->transformer->transformIndex($categories, $posts, $postsPhotos, $postLikes, $bookmarks, $users);
            return $this->view->render('profile-edit-post','profile-main', [
                'info' => $data,
                'errors' => $this->validate->err,
                'oldInput' => $this->validate->oldInput,
                'categories' => $categories,
                'user' => $user
            ]);
        }
        
        $category_id = $data['category'];
        $title = $data['title'];
        $description = $data['description'];

        $user_id = $_SESSION['auth'];

        $date = new \DateTime;
        $timestamp = $date->format('Y-m-d H:i:s');

        $post_id = $params['post_id'];

        $stmt = Post::update("UPDATE posts SET user_id=:user_id, category_id=:category_id, title=:title, description=:description WHERE id = $post_id", [':user_id' => $user_id, ':category_id' => $category_id, ':title' => $title, 
        ':description' => $description]);
        //remove photo, hash and get path
        $pathes = FileUpload::getPath($photosInfo['photos']);
        
        foreach($pathes as $key => $photo_path)
        {
            $stmt1 = PostPhoto::insert("INSERT INTO post_photos (post_id, photo_path) 
            VALUES (:post_id, :photo_path)", [':post_id' => $post_id, ':photo_path' => $photo_path]);
        }

        //if was added to db, user is auth
        if($stmt && $stmt1)
        {
            return $this->view->render('success-updated', 'profile-main', [
                'user' => $user
            ]);
        }else{
            new CustomException('You were not registred!');
            return $this->view->render('profile-edit-post', 'profile-main', [
                'categories' => $categories,
                'user' => $user
            ]);
        }
 
    }

    /**
     * delate post
     * @param 
     * @return 
     **/
    public function delete($params)
    {
        $post_id = $params['post_id'];
        //add to db
        $stmt = Post::delate("DELETE FROM posts WHERE id = :id", [':id' => $post_id]);

        if($stmt)
        {
            header("Location: ". $_SERVER['HTTP_REFERER']);
            return;
        }else{
            new CustomException('You were not registred!');
            header("Location: ". $_SERVER['HTTP_REFERER']);
            return;
        }
        
    }

     /**
     * delate photo when edit post
     * @param 
     * @return 
     **/
    public function delPhoto($params)
    {
        $user = User::select("SELECT * FROM users WHERE id = ?", [$_SESSION['auth']]); 
        
        $photo_id = $params['photo_id'];
        $post_id = $params['post_id'];
        //add to db
        $stmt = Post::delate("DELETE FROM post_photos WHERE id = :id", [':id' => $photo_id]);

        if($stmt)
        {
            $posts = Post::select('SELECT * FROM posts WHERE id = ?', [$post_id]);
            $categories = Category::getAll();
            $postsPhotos = PostPhoto::getAll();
            $postLikes = PostLike::getAll();
            $bookmark = Bookmark::getAll();
            $users = User::getAll();

            $data = $this->transformer->transformIndex($categories, $posts, $postsPhotos, $postLikes, $bookmark, $users);
            return $this->view->render('profile-edit-post', 'profile-main', [
                'info' => $data,
                'user' => $user
            ]);
        }else{
            new CustomException('You were not registred!');
            return $this->view->render('profile-edit-post', 'profile-main', [
                'categories' => $categories,
                'user' => $user
            ]);
        }
        
    }

    /**
     * delate bookmark
     * @param 
     * @return 
     **/

    public function bookmark($params)
    {
        var_dump($params);
        exit;

    }
    
}