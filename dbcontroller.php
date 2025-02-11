<?php
class Dbcontroller{
    private $con=null;
    private $host="localhost";
    private $user= "root";
    private $pass= "";
    private $dbname= "pecabot";
    function __construct(){
        $this->connectDB();

    }
    function connectDB(){
        try 
        {
            $this->con=new PDO("mysql:host={$this->host}; dbname={$this->dbname};charset=utf8", $this->user, $this->pass);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Csatlakozási hiba".$e->getMessage());
        }
    }
    function executeSelectQuery($query,$params) {
        try {
            $stmt=$this->con->prepare($query);
            $stmt->execute($params);
        } catch (PDOException $e) {
            die("Lekérdezési hiba".$e->getMessage());
        }




    }
}