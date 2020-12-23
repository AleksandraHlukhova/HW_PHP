<?php

namespace App\Core\Models;

/**
 * Comment class
 */
class Comment extends Model
{
    public integer $id;
    public integer $user_id;
    public integer $category_id;
    public string $title;
    public string $description;
    public string $status;
    public date $date;

    /**
     * get all Comments
     * @param
     * @return obj
     **/
    public static function getAll()
    {
        return self::select('SELECT * FROM comments');
    }

      /**
     * get one
     * @param
     * @return obj
     **/
    public static function getOne($data, $key, $value)
    {
        $res = self::select("SELECT $data FROM comments WHERE $key = ?", $value);
       
        $result = [];
        foreach($res as $value)
        {
            $result = $value->data;
        }
        return $result;
    }

    

}
