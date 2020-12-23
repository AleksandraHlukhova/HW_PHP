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
     * get all PostPhoto
     * @param
     * @return obj
     **/
    public static function getAll()
    {
        return self::select('SELECT * FROM post_photos');
    }

}
