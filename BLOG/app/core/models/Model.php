<?php

namespace App\Core\Models;

use App\Core\Classes\Database\Db;
use App\Core\Interfaces\ModelInt;


/**
 * Model class
 */
class Model implements ModelInt
{

    public Db $db;

    public function __construct()
    {
        $this->db = new Db();
    }

    
    /**
     * 
     * @param 
     * @return
     **/
    public function queryDb($stmt)
    {
        $result =  $this->db->dbh->query($stmt, \PDO::FETCH_OBJ)->fetchAll();
        return $result;
    }

    /**
     * prepare statment
     * @param 
     * @return
     **/
    public function prepareDb($stmt)
    {

    }

    /**
     * add to database
     * @param 
     * @return 
     **/
    public function insert($stmt)
    {
        # code...
    }


}
