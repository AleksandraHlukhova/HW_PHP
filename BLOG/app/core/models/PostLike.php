<?php

namespace App\Core\Models;

/**
 * PostLike class
 */
class PostLike extends Model
{
    public integer $id;
    public integer $user_id;
    public integer $post_id;
    public bool $status;

    /**
     * get all PostPhoto
     * @param
     * @return obj
     **/
    public static function getAll()
    {
        return self::select('SELECT * FROM post_likes');
    }

}
