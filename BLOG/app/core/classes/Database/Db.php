<?php

namespace App\Core\Classes\Database;

/**
 * Db class
 */
abstract class Db implements Connectible
{
    
    /**
     * open connection with db
     * @param 
     * @return
     **/
    public abstract function connect(array $params);

    /**
     * close connection with db
     * @param 
     * @return
     **/
    public abstract function disconnect();
    

}