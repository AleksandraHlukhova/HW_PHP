<?php

namespace App\Core\Classes\Transformers;
/**
 * TransformerInfo class (transform info from db)
 */
class TransformerInfo
{

    /**
     * transform info from db in homeController::index
     * @param Type $var Description
     * @return type
     **/
    public function transformIndex($categories, $posts, $postsPhotos, $postLikes, $users)
    {
        $data = [];

        foreach($categories as $catId => &$category)
        {

            $catPosts = [];

            foreach($posts as $postId => &$post)
            {
                $photoPosts = [];
                $likePosts = [];
                $userPosts = [];

                if($category->id === $post->category_id)
                {
                    $catPosts[] = $post;
                }
                foreach($postsPhotos as $photoId => $photo)
                {
                    
                    if($post->id === $photo->post_id)
                    {
                        $photoPosts[] = $photo;
                    }
                }
                $post->photos = $photoPosts;
                foreach($postLikes as $likeId => $like)
                { 
                    if($post->id === $like->post_id)
                    {
                        $likePosts[] = $like;
                    }
                }
                $post->likes = $likePosts;

                foreach($users as $userId => $user)
                { 
                    if($user->id === $post->user_id)
                    {
                        $userPosts[] = $user;
                    }
                }
                $post->users = $userPosts;

            }
            $category->posts = $catPosts;
            $data[] = $category;

        }

        return $data;
    }

     /**
     * transform info from db in PostController::showOne
     * @param Type $var Description
     * @return type
     **/
    public function transformQuinta($categories, $posts, $postLikes, $postsPhotos, $comments, $users)
    {
        $data = [];

        foreach($categories as $catId => &$category)
        {

            $catPosts = [];

            foreach($posts as $postId => &$post)
            {
                $photoPosts = [];
                $commentPosts = [];
                $likePosts = [];

                if($category->id === $post->category_id)
                {
                    $catPosts[] = $post;
                }
                foreach($postsPhotos as $photoId => $photo)
                {
                    
                    if($post->id === $photo->post_id)
                    {
                        $photoPosts[] = $photo;
                    }
                }
                    $post->photos = $photoPosts;



                    foreach($postLikes as $likeId => $like)
                {
                    
                    if($post->id === $like->post_id)
                    {
                        $likePosts[] = $like;
                    }
                }
                    $post->likes = $likePosts;


                foreach($comments as $commentId => $comment)
                {
                    $commentUsers = [];   
                    if($post->id === $comment->post_id)
                    {
                        $commentPosts[] = $comment;
                    }
                    foreach($users as $userId => $user)
                    {
                        if($user->id === $comment->user_id)
                        {
                            $commentUsers[] = $user;
                        }
                    }
                    $comment->users = $commentUsers;
                }
                $post->comments = $commentPosts;    
            }
            $category->posts = $catPosts;
            $data[] = $category;

        }
        return $data;
    }

    /**
     * transform info from db in homeController::index
     * @param Type $var Description
     * @return type
     **/
    public function transformCommentPost($categories, $comments, $posts, $users, $likes)
    {
        $data = [];

        foreach($comments as $commId => &$comment)
        {

            $commPosts = [];

            foreach($posts as $postId => &$post)
            {
                $catPosts = [];
                $userPosts = [];
                $likePosts = [];

                if($post->id === $comment->post_id)
                {

                    $commPosts[] = $post;
                }

                    foreach($users as $userId => $user)
                    {    

                        if($user->id === $post->user_id)
                        {
                            $userPosts[] = $user;
                        }

                    }


                    foreach($likes as $likeId => $like)
                    {    
                        if($post->id === $like->post_id)
                        {
                            $likePosts[] = $like;
                        }

                    }
                    $post->users = $userPosts;

                    $post->likes = $likePosts;


            }

            $comment->posts = $commPosts;
            $data[] = $comment;
        }
        return $data;
    }

    /**
     * transform info from db in homeController::index
     * @param Type $var Description
     * @return type
     **/
    public function transformLikesPost($categories, $comments, $posts, $users, $likes, $postPhotos)
    {
        $data = [];

        foreach($likes as $likeId => &$like)
        {

            $likePosts = [];

            foreach($posts as $postId => &$post)
            {
                $catPosts = [];
                $userPosts = [];
                $commPosts = [];
                $photoPosts = [];

                if($post->id === $like->post_id)
                {

                    $likePosts[] = $post;
                }

                    foreach($users as $userId => $user)
                    {    

                        if($user->id === $post->user_id)
                        {
                            $userPosts[] = $user;
                        }

                    }


                    foreach($comments as $commd => $comment)
                    {    
                        if($post->id === $comment->post_id)
                        {
                            $commPosts[] = $comment;
                        }

                    }

                    foreach($postPhotos as $photoIdd => $photo)
                    {    
                        if($post->id === $photo->post_id)
                        {
                            $photoPosts[] = $photo;
                        }

                    }
                    $post->users = $userPosts;

                    $post->comments = $commPosts;
                    $post->photos = $photoPosts;


            }

            $like->posts = $likePosts;
            $data[] = $like;
        }

        return $data;
    }
    
}