<?php

namespace App\Core\Models;

// use App\Core\Classes\Database\Db;

/**
 * Category class
 */
class Category extends Model
{
    public integer $id;
    public string $name;

    /**
     * get all Categories
     * @param
     * @return obj
     **/
    public static function getAll()
    {
        return self::select('SELECT * FROM categories');
    }

    /**
     * get one 
     * @param
     * @return obj
     **/
    public static function getOne($data, $key, $value)
    {
        $res = self::select("SELECT $data FROM categories WHERE $key = ?", $value);
        $result = [];
        foreach($res as $value)
        {
            $result = $value->data;
        }
        return $result;
    }

}
