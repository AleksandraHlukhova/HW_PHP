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
    public static function transformIndex($categories, $posts, $postsPhotos)
    {
        $data = [];

        foreach($categories as $catId => &$category)
        {

            $catPosts = [];

            foreach($posts as $postId => &$post)
            {
                $photoPosts = [];

                if($category->id === $post->category_id)
                {
                    $catPosts[] = $post;
                }
                foreach($postsPhotos as $photoId => $photo)
                {
                    
                    if($post->id === $photo->id_post)
                    {
                        $photoPosts[] = $photo;
                    }
                }
                    $post->photos = $photoPosts;


            }
            $category->posts = $catPosts;
            $data[] = $category;

        }

        return $data;
    }
    
}