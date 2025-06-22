<?php

class Database{
    public $connection;
    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=demo;charset=utf8mb4";
        $user = "root";
        $this ->connection =  new PDO($dsn,$user);
    }
    public function query($query){

        $statement = $this->connection->prepare($query);
        $statement -> execute();
        return $statement;
    }
}


?>