<?php

namespace App\Core\Classes\Database;

/**
 * Db class
 */
class Db extends DbConnection
{
    
    /**
     * close connection with db
     * @param 
     * @return
     **/
    public function closeConnection()
    {
        return $this->dbh = null;
    }

    /**
     * close conn
     * @param 
     * @return
     **/
    public function __destruct()
    {
        $this->closeConnection();
    }

}