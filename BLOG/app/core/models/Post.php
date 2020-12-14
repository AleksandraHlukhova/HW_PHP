<?php

namespace App\Core\Models;

// use App\Core\Classes\Database\Db;

/**
 * Post class
 */
class Post extends Model
{
    public integer $id;
    public integer $user_id;
    public integer $category_id;
    public string $title;
    public string $description;
    public string $status;
    public date $date;


}
