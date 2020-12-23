<?php

namespace App\Core\Models;

/**
 * Bookmark class
 */
class Bookmark extends Model
{
    /**
     * get all Bookmark
     * @param
     * @return obj
     **/
    public static function getAll()
    {
        return self::select('SELECT * FROM comments');
    }

}
