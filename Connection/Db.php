<?php 

namespace Connection;

require_once __DIR__.'/config.php';

use PDO;
use PDOException;

class Db{


   private $dbname = DB_NAME;
   private $dbuser =  DB_USER;
   private $dbhost=  DB_HOST;
   private $dbpass = DB_PASSWORD;

    protected function connect(){

        $dsn = "sqlsrv:Server={$this->dbhost};Database={$this->dbname}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            1005 => 1,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        try{
            $conn = new PDO($dsn,$this->dbuser,$this->dbpass,$options);

            return $conn;
        }
        catch(PDOException $e){
            return $e->getMessage();
        }

    }

    public function displayConection(){

        $storedConnection= $this->connect();
        return $storedConnection;
    }

}


// $db = new Db();
// $conn = $db->displayConection();
// print_r($conn);
// if ($conn) echo "Connected successfully!";
// else echo "Connection failed.";

