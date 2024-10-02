<?php
require_once(dirname(__FILE__) ."/DB.php");

class Publication extends DB {
    public $table = "publication";
    public $id;
    public $id_user;
    public $contenu;
    public $date_publication;

    public function __construct($id_user=null, $contenu=null, $date_publication=null) {
        $this->id = null;
        $this->id_user = $id_user;
        $this->contenu = $contenu;
        $this->date_publication = $date_publication;
        Parent::__construct();
    }

    public function create($id_user, $contenu) {
        $this->sql = "INSERT INTO ".$this->table." (id_user, contenu, date_publication)";
        $this->sql .= " VALUES (?, ?, NOW());";
        return $this->fetch(array($id_user, $contenu));
    }

    public function update($id, $contenu) {
        $this->sql = "UPDATE ".$this->table." SET contenu = ? WHERE id = ?";
        return $this->fetch(array($contenu, $id));
    }

    public function delete($id) {
        $this->sql = "DELETE FROM ".$this->table." WHERE id = ?";
        return $this->fetch(array($id));
    }

    public function getAll() {
        $this->sql = "SELECT * FROM ".$this->table;
        return $this->fetchAll();
    }

    public function getAllWithDetails() {
        
        $sql  = "SELECT p.id, p.contenu, p.date_publication, u.nom, u.prenom,";
        $sql .= "COUNT(DISTINCT c.id) AS nbr_commentaires, ";
        $sql .= "COUNT(DISTINCT rp.id) AS nbr_reactions ";
        $sql .= "FROM publication p ";
        $sql .= "JOIN user u ON p.id_user = u.id ";
        $sql .= "LEFT JOIN commentaire c ON p.id = c.id_publication ";
        $sql .= "LEFT JOIN reaction_publication rp ON p.id = rp.id_publication ";
        $sql .= "GROUP BY p.id, p.contenu, p.date_publication, u.nom, u.prenom ";
        $sql .= "ORDER BY p.date_publication DESC;";
        $this->sql = $sql;
        return $this->fetchAll();
    }


    public function find($id) {
        $this->sql = "SELECT * FROM ".$this->table." WHERE id = ?";
        return $this->fetch(array($id));
    }
}
?>
