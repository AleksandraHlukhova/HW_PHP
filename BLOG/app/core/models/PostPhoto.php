<?php

namespace App\Core\Models;

// use App\Core\Classes\Database\Db;

/**
 * Post class
 */
class PostPhoto extends Model
{
    public integer $id;
    public integer $id_post;
    public string $photo_path;

    /**
     * get all posts from db
     * @param 
     * @return 
     **/
    public function getPostsPhotos()
    {
        $result = $this->queryDb('SELECT * FROM post_photos');

        return $result;
    }
}
