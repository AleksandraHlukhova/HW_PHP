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
    public function transformIndex($categories, $posts, $postsPhotos, $postLikes, $bookmarks, $users, $comments)
    {
        $data = [];

        foreach($categories as $catId => &$category)
        {

            $catPosts = [];

            foreach($posts as $postId => &$post)
            {
                $photoPosts = [];
                $likePosts = [];
                $bookmarkPosts = [];
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

                $summL = 0;
                foreach($postLikes as $likeId => $like)
                { 
                    if($post->id === $like->post_id)
                    {
                        $summL++;
                        $likePosts[] = $like;
                    }
                }
                $post->likeSum = $summL;
                $post->likes = $likePosts;
                
                $summB = 0;
                foreach($bookmarks as $bookId => $bookmark)
                { 
                    if($post->id === $bookmark->post_id)
                    {
                        $summB++;
                        $bookmarkPosts[] = $bookmark;
                    }
                }
                $post->bookmarkSum = $summB;
                $post->bookmarks = $bookmarkPosts;

                foreach($users as $userId => $user)
                { 
                    if($user->id === $post->user_id)
                    {
                        $userPosts[] = $user;
                    }
                }
                $post->users = $userPosts;
                
                $summC = 0;
                foreach($comments as $commId => $comment)
                { 
                    if($comment->post_id === $post->id)
                    {
                        $summC++;
                    }
                }
                $post->commSum = $summC;

            }
            $category->posts = $catPosts;
            $data[] = $category;

        }

        return $data;
    }

    /**
     * transform info from db in homeController::index latest post
     * @param Type $var Description
     * @return type
     **/
    public function transformLatestPost($latestPost, $categories, $postsPhotos)
    {
        $data = [];

        foreach($latestPost as $postId => &$post)
        {

            $catPosts = [];
            $photoPosts = [];

            foreach($categories as $cattId => $category)
            {

                if($category->id === $post->category_id)
                {
                    $catPosts[] = $category;
                }

            }
            foreach($postsPhotos as $photo)
            {

                if($photo->post_id === $post->id)
                {
                    $photoPosts[] = $photo;
                }

            }
            $post->categories = $catPosts;
            $post->photos = $photoPosts;

        }
        $data[] = $post;

        return $data;
    }

     /**
     * transform info from db in PostController::showOne
     * @param Type $var Description
     * @return type
     **/
    public function transformForOnePost($categories, $posts, $postLikes, $postsPhotos, $bookmarks, $comments, $users)
    {
        $data = [];

        foreach($categories as $catId => &$category)
        {

            $catPosts = [];

            foreach($posts as $postId => &$post)
            {
                $photoPosts = [];
                $userPosts = [];
                $commentPosts = [];
                $bookmarkPosts = [];
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

                    foreach($users as $user)
                    {
                        if($post->user_id === $user->id)
                        {
                            $userPosts[] = $user;
                        }
                    }
                        $post->users = $userPosts;
                
                $summB = 0;
                foreach($bookmarks as $bookmarkId => $bookmark)
                {
                    
                    if($post->id === $bookmark->post_id)
                    {
                        $summB++;
                        $bookmarkPosts[] = $summB;
                    }
                }
                    $post->bookmarks = $bookmarkPosts;
                    
                    $summL = 0;
                    foreach($postLikes as $likeId => $like)
                {
                    
                    if($post->id === $like->post_id)
                    {
                        $summL++;
                        $likePosts[] = $like;
                    }
                }
                    $post->likes = $likePosts;

                $summC = 0;
                foreach($comments as $commentId => $comment)
                {
                    $commentUsers = [];   
                    if($post->id === $comment->post_id)
                    {
                        $summC++;
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
                $post->commSum = $summC;
                $post->likeSum = $summL;
                $post->bookmarkSum = $summB;

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
    public function transformCommentPost($categories, $yourComments, $posts, $users, $likes, $bookmarks, $comments)
    {
        $data = [];

        foreach($yourComments as $commId => &$yourComment)
        {

            $commPosts = [];
            foreach($posts as $postId => &$post)
            {
                $catPosts = [];
                $userPosts = [];
                $likePosts = [];
                $bookmarkPosts = [];
                $comm = [];

                if($post->id === $yourComment->post_id)
                {
                    $commPosts[] = $post;
                }
                    foreach($categories as $category)
                    {
                        if($category->id === $post->category_id)
                        {
                            $catPosts[] = $category;
                        }
                    }
                
                    foreach($users as $userId => $user)
                    {    

                        if($user->id === $post->user_id)
                        {
                            $userPosts[] = $user;
                        }

                    }

                    $summL = 0;
                    foreach($likes as $likeId => $like)
                    {    
                        if($post->id === $like->post_id)
                        {
                            $summL++;
                            $likePosts[] = $like;
                        }

                    }

                    $summB = 0;
                    foreach($bookmarks as $bookmark)
                    {    
                        if($post->id === $bookmark->post_id)
                        {
                            $summB++;
                            $bookmarkPosts[] = $bookmark;
                        }

                    }

                    $summC = 0;
                    foreach($comments as $comment)
                    {    
                        if($post->id === $comment->post_id)
                        {
                            $summC++;
                            $comm[] = $comment;
                        }

                    }
                    $post->users = $userPosts;
                    $post->likes = $likePosts;
                    $post->category = $catPosts;
                    $post->bookmarks = $bookmarkPosts;
                    $post->comments = $comm;
                    $post->likeSum = $summL;
                    $post->bookmarkSum = $summB;
                    $post->commSum = $summC;

            }

            $yourComment->posts = $commPosts;
            $data[] = $yourComment;
        }
        return $data;
    }

    /**
     * transform info from db in homeController::index
     * @param Type $var Description
     * @return type
     **/
    public function transformLikesPost($categories, $comments, $posts, $users, $myLikes, $postPhotos, $likes, $bookmarks)
    {
        $data = [];

        foreach($myLikes as $likeId => &$myLike)
        {

            $likePosts = [];

            foreach($posts as $postId => &$post)
            {
                $catPosts = [];
                $userPosts = [];
                $commPosts = [];
                $photoPosts = [];
                $bookmarkPosts = [];
                $likeP = [];

                if($post->id === $myLike->post_id)
                {

                    $likePosts[] = $post;
                }

                    foreach($categories as $category)
                    {    

                        if($post->category_id === $category->id)
                        {
                            $catPosts[] = $category;
                        }

                    }
                    foreach($users as $userId => $user)
                    {    

                        if($user->id === $post->user_id)
                        {
                            $userPosts[] = $user;
                        }

                    }

                    $summC = 0;
                    foreach($comments as $commd => $comment)
                    {    
                        if($post->id === $comment->post_id)
                        {
                            $summC++;
                            $commPosts[] = $comment;
                        }

                    }
                    $summL = 0;
                    foreach($likes as $like)
                    {    
                        if($post->id === $like->post_id)
                        {
                            $summL++;
                            $likeP[] = $like;
                        }

                    }
                    $summB = 0;
                    foreach($bookmarks as $bookmark)
                    {    
                        if($post->id === $bookmark->post_id)
                        {
                            $summB++;
                            $bookmarkPosts[] = $bookmark;
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
                    $post->likes = $likeP;
                    $post->bookmarks = $bookmarkPosts;
                    $post->photos = $photoPosts;
                    $post->bookmarkSum = $summB;
                    $post->commSum = $summC;
                    $post->likeSum = $summL;
                    $post->category = $catPosts;

            }

            $myLike->posts = $likePosts;
            $data[] = $myLike;
        }

        return $data;
    }

    /**
     * transform info from db in BookmarkController:index
     * @param Type $var Description
     * @return type
     **/
    public function transformBookmarkPost($categories, $comments, $posts, $users, $likes, $myBookmarks, $postPhotos, $bookmarks)
    {
        $data = [];

        foreach($myBookmarks as $bookmarkId => $myBookmark)
        {

            $bookmarkPosts = [];

            foreach($posts as $postId => &$post)
            {
                $catPosts = [];
                $userPosts = [];
                $commPosts = [];
                $likePosts = [];
                $photoPosts = [];
                $categoryPosts = [];
                $bookPosts = [];

                if($post->id === $myBookmark->post_id)
                {
                    $bookmarkPosts[] = $post;
                    
                }
                    foreach($categories as $category)
                    {    

                        if($category->id === $post->category_id)
                        {
                            $categoryPosts[] = $category;
                        }

                    }
                    foreach($users as $userId => $user)
                    {    

                        if($user->id === $post->user_id)
                        {
                            $userPosts[] = $user;
                        }

                    }

                    $summC = 0;
                    foreach($comments as $commd => $comment)
                    {    
                        if($post->id === $comment->post_id)
                        {
                            $summC++;
                            $commPosts[] = $comment;
                        }

                    }
                    $post->commSum = $summC;
                    $summL = 0;
                    foreach($likes as $likeId => $like)
                    {    
                        if($post->id === $like->post_id)
                        {
                            $summL++;
                            $likePosts[] = $like;
                        }
                    }
                    $post->likeSum = $summL;


                    foreach($postPhotos as $photoIdd => $photo)
                    {    
                        if($post->id === $photo->post_id)
                        {
                            $photoPosts[] = $photo;
                        }

                    }
                    $summB = 0;
                    foreach($bookmarks as $bookmark)
                    {    
                        if($post->id === $bookmark->post_id)
                        {
                            $summB++;
                            $bookPosts[] = $bookmark;
                        }

                    }
                    $post->bookmarkSum = $summB;

                    $post->users = $userPosts;
                    $post->comments = $commPosts;
                    $post->likes = $likePosts;
                    $post->photos = $photoPosts;
                    $post->category = $categoryPosts;
                    $post->bookmarks = $bookPosts;

            }

            $myBookmark->posts = $bookmarkPosts;
            $data[] = $myBookmark;
        }

        return $data;
    }
    
}