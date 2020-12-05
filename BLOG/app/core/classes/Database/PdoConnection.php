<?php


namespace App\Core\Classes\Database;
/**
 * PdoConnection
 */
class PdoConnection extends \PDO
{

    public $dbh;

    public function __construct()
    {
        try {

            $this->dbh = new \PDO("mysql:host={$_ENV['HOST_NAME']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
            
        } catch (\PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
}
