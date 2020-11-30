<?php

namespace App\Classes;

class DbConnect extends \mysqli
{
    public function __construct($host, $user, $pass, $db)
    {
        parent::__construct($host, $user, $pass, $db);
    
        self::createConnection($host, $user, $pass, $db);
    }

    public static function createConnection($host, $user, $pass, $db)
    {
        if (mysqli_connect_error()) {
            die('Connect error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        }
    }

    public static function closeConnection(\mysqli &$conn)
    {
        $conn->close();
        $conn = null;
    }
}