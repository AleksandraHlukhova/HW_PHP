<?php

namespace App\Core\Interfaces\Database;

interface Connectible
{
    /**
     * open connection with db
     * @param 
     * @return pdo obj
     **/
    public function connect();

    /**
     * close connection with db
     * @param 
     * @return null
     **/
    public function disconnect();
}