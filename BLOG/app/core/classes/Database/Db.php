<?php

namespace App\Core\Classes\Database;

use App\Core\Interfaces\Database\Connectible;


/**
 * Db class
 */
abstract class DB implements Connectible
{
    
    /**
     * open connection with db
     * @param 
     * @return pdo obj
     **/
    public abstract function connect();

    /**
     * close connection with db
     * @param 
     * @return null
     **/
    public abstract function disconnect();
    

}