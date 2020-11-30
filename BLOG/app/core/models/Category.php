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
     * get all categories from db
     * @param 
     * @return 
     **/
    public function getCategories()
    {
        $result = $this->queryDb('SELECT * FROM category');

        return $result;
    }
}
