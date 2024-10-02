<?php
require_once(dirname(__FILE__) ."/DB.php");
require_once(dirname(__FILE__) ."/Helper.php");

class User extends DB{
    public $table = "user";
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $password;

    public function __construct($nom=null, $prenom=null, $date_naissance=null, $sexe=null, $id_parcours=null,$email=null, $password=null) {
        $this->id = null;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->password = $password;
        Parent::__construct();
    }
    

    public function create($nom,$prenom,$date_naissance, $sexe, $id_parcours, $email, $password) {
        $this->sql = "INSERT INTO ".$this->table. "(nom, prenom, date_naissance, sexe, id_parcours, email, password)";     
        $this->sql .= " VALUES (?,?,?,?,?,?,?);";  
        
        $result = $this->fetch(array($nom, $prenom ,$date_naissance, $sexe, $id_parcours, $email, $password));
        return $result;
    }

    public function update($id,$nom,$prenom, $date_naissance, $sexe, $id_parcours,$email, $password) {
        $this->sql = "UPDATE ".$this->table;
        $this->sql .= " SET nom = '".$nom."', prenom = '".$prenom."', date_naissance = '".$date_naissance."', sexe = '".$sexe."', id_parcours = '".$id_parcours."'  , email = '".$email."', password = '".$password."'";
        $this->sql .= " WHERE id = ".$id;
        $result = $this->fetch();
        return $result;
    }
    
    public function delete($id) {
        $this->sql = "DELETE FROM ".$this->table;
        $this->sql .= " WHERE id = ".$id;
        $result = $this->fetch();
        return $result;
    }

    public function getAll(){
        $this->sql = "SELECT * FROM ".$this->table;     
        $result = $this->fetchAll();
        return $result;
    }

    public function find($id){
        $this->sql = "SELECT * FROM ".$this->table;    
        $this->sql .= " WHERE id = '".$id."'";    
        $result = $this->fetch();
        return $result;
    }
    


    public function isIn($email,$password){
        $this->sql = "SELECT * FROM ".$this->table;  
        $this->sql .= " WHERE email = '".$email."'";   
        $this->sql .= " AND password = '".$password."'"; 

        $user = $this->fetch();
        if(!$user) return false;

        $this->id = $user['id'];
        $this->nom = $user['nom'];
        $this->prenom = $user['prenom'];
        $this->date_naissance = $user['date_naissance'];
        $this->sexe = $user['sexe'];
        $this->id_parcours = (int)$user['id_parcours'];
        $this->email = $user['email'];
        $this->password = $user['password'];
        sessionAdd($user);
        return true  ;
    }

    




}