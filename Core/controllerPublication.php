<?php
session_start();
ini_set("display_errors",1);
error_reporting(E_ALL);
include_once("Helper.php");
include_once("User.php");
include_once("Publication.php");
include_once("Commentaire.php");


if(isset($_GET) && isset($_GET["action"])) {
    $action = $_GET["action"];
    if($action == "listePublication") {
        $U = new Publication();
        $publications = $U->getAllWithDetails();

        echo json_encode([
            'publications'=>$publications
        ]);
    }
    else if($action == "detailPublication") {

    }
    else if($action == "reaction") {

    }
    else if($action == "getCommentaire") {
        $id = $_GET["idPub"];

        $U = new Commentaire();
        $coms = $U->getCommentaire($id);
        echo json_encode([
            'coms'=>$coms
        ]);
    }

}
