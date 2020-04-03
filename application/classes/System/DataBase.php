<?php
namespace System;
use PDO;
use PDOException;
class DataBase extends Environment{
    protected static $DBInstance;
    protected function DB(){
        $servername = parent::$env['DB_HOST'];
        $username = parent::$env['DB_USER'];
        $password = parent::$env['DB_PASSWORD'];
        $db_name = parent::$env['DB_NAME'];
        $db_type = parent::$env['DB_TYPE'];
        try {
            $conn = new PDO("$db_type:host=$servername;dbname=$db_name", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$DB=$conn;
            return $conn;
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return false;
        }
    }
}