<?php

class DB {
    private  $pdo;
    private $dsn = "mysql:host=127.0.0.1;dbname=Reseau_Sociaux";
    private $username = "sahoby";
    private $password = "password";

    protected $sql;

    public function __construct() {
        $this->pdo = new \PDO($this->dsn,$this->username,$this->password,[]);
    }

    public function getPdo() {
        if(!$this->pdo){
            $this->pdo = new \PDO($this->dsn,$this->username,$this->password,[]);
            return $this->pdo;
        }
        return $this->pdo;
    } 
    
    public function fetch($params=[]){
        $stmt  = ($this->pdo->prepare($this->sql));
        //dump([$this->sql,$params]);exit();
        $stmt->execute($params);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function fetchAll($params=null){
        $stmt = $this->pdo->prepare($this->sql);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}