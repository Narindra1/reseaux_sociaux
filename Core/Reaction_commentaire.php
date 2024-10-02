<?php
require_once(dirname(__FILE__) ."/DB.php");

class ReactionCommentaire extends DB {
    public $table = "reaction_commentaire";
    public $id;
    public $id_commentaire;
    public $id_user;
    public $type;

    public function __construct($id_commentaire=null, $id_user=null, $type=null) {
        $this->id = null;
        $this->id_commentaire = $id_commentaire;
        $this->id_user = $id_user;
        $this->type = $type;
        Parent::__construct();
    }

    public function create($id_commentaire, $id_user, $type) {
        $this->sql = "INSERT INTO ".$this->table." (id_commentaire, id_user, type)";
        $this->sql .= " VALUES (?, ?, ?);";
        return $this->fetch(array($id_commentaire, $id_user, $type));
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
