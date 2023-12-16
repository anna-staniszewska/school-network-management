<?php

class Database{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dtbName = "siecszkol";

    protected function connect()
    {
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dtbName;
            $pdo = new PDO($dsn, $this->user, $this->password);
            //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br>";
            die();
        }
    }
}