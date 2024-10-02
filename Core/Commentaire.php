<?php
require_once(dirname(__FILE__) . "/DB.php");

class Commentaire extends DB
{
    public $table = "commentaire";
    public $id;
    public $label;
    public $id_user;
    public $id_publication;

    public function __construct($label = null, $id_user = null, $id_publication = null)
    {
        $this->id = null;
        $this->label = $label;
        $this->id_user = $id_user;
        $this->id_publication = $id_publication;
        Parent::__construct();
    }

    public function create($label, $id_user, $id_publication)
    {
        $this->sql = "INSERT INTO " . $this->table . " (label, id_user, id_publication)";
        $this->sql .= " VALUES (?, ?, ?);";
        return $this->fetch(array($label, $id_user, $id_publication));
    }

    public function update($id, $label)
    {
        $this->sql = "UPDATE " . $this->table . " SET label = ? WHERE id = ?";
        return $this->fetch(array($label, $id));
    }

    public function delete($id)
    {
        $this->sql = "DELETE FROM " . $this->table . " WHERE id = ?";
        return $this->fetch(array($id));
    }

    public function getAll()
    {
        $this->sql = "SELECT * FROM " . $this->table;
        return $this->fetchAll();
    }

    public function find($id)
    {
        $this->sql = "SELECT * FROM " . $this->table . " WHERE id = ?";
        return $this->fetch(array($id));
    }
    public function getCommentaire($id_publication)
    {
        $this->sql = "SELECT * FROM " . $this->table;
        $this->sql .= " AS c
                  JOIN user AS u ON c.id_user = u.id
                  WHERE c.id_publication = ".$id_publication;
        return $this->fetchAll();
    }
}
