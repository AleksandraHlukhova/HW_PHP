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

    public $DB;
    private $db_facade;

    public function __construct()
    {
        $this->db_facade = ConfigLoader::get('DB_CONNECTION');
        
        if($this->db_facade === 'PDO')
        {
            $this->DB = new PdoConnection();
            $this->DB = $this->DB->dbh;

        }
    }

    
    /**
     * Get from data db
     * @param $stmt, $params = []
     * @return array
     **/
    public function select($stmt, $params = [])
    {

        $sth = $this->DB->prepare($stmt);
        $sth->execute($params);
        $result = $sth->fetchAll(\PDO::FETCH_OBJ);
        
        return $result;
    }

    /**
     * add to database
     * @param 
     * @return 
     **/
    public function insert($stmt, $params = [])
    {   
        $stmt = $this->DB->prepare($stmt);        

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
    public function update($stmt, $params = [])
    {
        # code...
    }

    ////up()
    ///down() for migrations


}
