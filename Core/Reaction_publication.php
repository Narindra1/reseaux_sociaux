<?php
require_once(dirname(__FILE__) ."/DB.php");

class ReactionPublication extends DB {
    public $table = "reaction_publication";
    public $id;
    public $id_publication;
    public $id_user;
    public $type;

    public function __construct($id_publication=null, $id_user=null, $type=null) {
        $this->id = null;
        $this->id_publication = $id_publication;
        $this->id_user = $id_user;
        $this->type = $type;
        Parent::__construct();
    }

    public function create($id_publication, $id_user, $type) {
        $this->sql = "INSERT INTO ".$this->table." (id_publication, id_user, type)";
        $this->sql .= " VALUES (?, ?, ?);";
        return $this->fetch(array($id_publication, $id_user, $type));
    }

    public function update($id, $type) {
        $this->sql = "UPDATE ".$this->table." SET type = ? WHERE id = ?";
        return $this->fetch(array($type, $id));
    }

    public function delete($id) {
        $this->sql = "DELETE FROM ".$this->table." WHERE id = ?";
        return $this->fetch(array($id));
    }

    public function getAll() {
        $this->sql = "SELECT * FROM ".$this->table;
        return $this->fetchAll();
    }

    public function find($id) {
        $this->sql = "SELECT * FROM ".$this->table." WHERE id = ?";
        return $this->fetch(array($id));
    }
}
?>
