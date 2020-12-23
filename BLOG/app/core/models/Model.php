<?php

namespace App\Core\Models;

use App\Core\Classes\Database\PdoConnection;
use App\Core\Interfaces\ModelInterface;
use App\Core\Classes\ConfigLoader;
use App\Core\Classes\Errors\CustomException;


/**
 * Model class
 */
class Model implements ModelInterface
{

    public static $DB;
    private $db_facade;

    public function __construct()
    {
        $this->db_facade = ConfigLoader::get('DB_CONNECTION');
        
        if($this->db_facade === 'PDO')
        {
            self::$DB = new PdoConnection();
            self::$DB = self::$DB->dbh;

        }
    }

    
    /**
     * Get from data db
     * @param $stmt, $params = []
     * @return array
     **/
    public static function select($stmt, $params = [])
    {
        $sth = self::$DB->prepare($stmt);
        $sth->execute($params);
        $result = $sth->fetchAll(\PDO::FETCH_OBJ);
        
        return $result;
    }

    /**
     * add to database
     * @param 
     * @return 
     **/
    public static function insert($stmt, $params = [])
    {   
        $stmt = self::$DB->prepare($stmt); 
        if($stmt->execute($params))
        {
            return true;
        }else{
            new CustomException('You were not registred!');
        }
 
    }

    /**
     * update data in database
     * @param 
     * @return 
     **/
    public static function update($stmt, $params = [])
    {
        $stmt = self::$DB->prepare($stmt);   
        if($stmt->execute($params))
        {
            return true;
        }else{
            new CustomException('You were not registred!');
        }
    }

        /**
     * update data in database
     * @param 
     * @return 
     **/
    public static function delate($stmt, $params = [])
    {
        $stmt = self::$DB->prepare($stmt);   
        if($stmt->execute($params))
        {
            return true;
        }else{
            new CustomException('You were not registred!');
        }
    }
}
