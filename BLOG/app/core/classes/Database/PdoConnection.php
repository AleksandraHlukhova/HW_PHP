<?php

namespace App\Core\Classes\Database;

use App\Core\Classes\ConfigLoader;

/**
 * PdoConnection
 */
class PdoConnection extends DB
{

    public $dbh;

    public function __construct()
    {
        try {

           $this->connect();
            
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    /**
     * open connection with db
     * @param 
     * @return pdo obj
     **/
    public function connect()
    {
        $host = ConfigLoader::get('HOST_NAME'); 
        $db_name = ConfigLoader::get('DB_NAME'); 
        $user = ConfigLoader::get('DB_USER'); 
        $pass = ConfigLoader::get('DB_PASSWORD'); 

        $this->dbh = new \PDO("mysql:host={$host};dbname={$db_name}", $user, $pass);
    }

    /**
     * close connection with db
     * @param 
     * @return null
     **/
    public function disconnect()
    {
        $this->dbh = null;
    }
    
}
