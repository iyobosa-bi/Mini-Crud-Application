<?php


require_once ("./Connection/Db.php");

class Interactions extends Db{

        private $dbconn;

        public function __construct()
        {
            $this->dbconn = $this->connect();
        }
        public function insertRecord($fname,$lname,$email,$tel){
            
            $sql = "INSERT INTO UsersTable(FirstName,LastName,Email,Telephone) Values(?,?,?,?)";
            $stmt= $this->dbconn->prepare($sql);
            $stmt->execute([$fname,$lname,$email,$tel]);
            $id = $this->dbconn->lastInsertId();
            return $id;
        }   

        public function getUsersById($id){
            $sql = "SELECT * FROM UsersTable WHERE id = ?";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute($id);
            $recs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $recs;
        }

         public function getAllUsers(){
            $sql = "SELECT * FROM UsersTable";
            $stmt = $this->dbconn->prepare($sql);
            $stmt->execute();
            $recs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $recs;
        }


}


// $db =  new Interactions();
// $user = $db->getAllUsers();
// print_r($user);










