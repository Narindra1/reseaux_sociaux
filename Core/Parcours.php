<?php
require_once(dirname(__FILE__) ."/DB.php");
require_once(dirname(__FILE__) ."/Helper.php");

class Parcours extends DB{
    public $table = "parcours";
    public $id;
    public $label;
   

    public function __construct( $label=null) {
        $this->id = null;
        $this->label = $label;
        Parent::__construct();
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
}