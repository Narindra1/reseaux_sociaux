<?php
session_start();
ini_set("display_errors",1);
error_reporting(E_ALL);
include_once("Helper.php");
include_once("User.php");


if(isset($_GET) && isset($_GET["action"])) {
    $action = $_GET["action"];
    if($action == "login") {
        if(
            isset($_POST) && 
            isset($_POST["Email"]) &&
            isset($_POST["mdp"])
        ) {
            $Email = $_POST["Email"];
            $Mdp = $_POST["mdp"];
            $response=true;
            $user = new User();
            $response = $user->isIn($Email,$Mdp);

            //dump(['session'=>$_SESSION["user"]]);
            // ===============================
            // dump([
            //     "data"=>[
            //         $Email,$Mdp
            //     ],
            //     "action"=>$action,
            //     "session"=>$_SESSION,
            //    "r"=>$response,
            //    'user'=>$user
            // ]);
            if($response){  redirect("/ListPublications.php");exit();}
            else {redirect("/Login.php");};
            // ===============================
        }


    }
    else if($action == "add_user") {
        if(
            isset($_POST) && 
            isset($_POST["Email"]) &&
            isset($_POST["mdp"]) 
        ) {
            $nom =    (isset($_POST["Nom"])     && trim(($_POST["Nom"])!=="")     ) ? $_POST["Nom"] :"none";
            $prenom = (isset($_POST["Prenoms"]) && trim(($_POST["Prenoms"])!=="") ) ? $_POST["Prenoms"] :"none";
            $date_naissance =    (isset($_POST["date_naissance"])     && trim(($_POST["date_naissance"])!=="") ) ? $_POST["date_naissance"] :"none";
            $sexe = (isset($_POST["sexe"]) && trim(($_POST["sexe"])!== "") ) ? $_POST["sexe"] :"none";
            $id_parcours = (isset($_POST["id_parcours"]) && trim(($_POST["id_parcours"])!== "") ) ? $_POST["id_parcours"] :0;

            
            
            $Email = $_POST["Email"];
            $Mdp = $_POST["mdp"];
        
            // ===============================
            $user = new User($nom,$prenom, $date_naissance, $sexe, $id_parcours, $Email,$Mdp);
            
            dump([
                "data"=>[
                    $nom,$prenom, $date_naissance, $sexe, $id_parcours,$Email,$Mdp
                ],
                "action"=>$action,
                'user'=> $user->create($nom,$prenom,$date_naissance, $sexe,$id_parcours,$Email,$Mdp)
            ]);
           redirect("/List.php");exit();


            // ===============================
                
        }
    }
    else if($action == "modifie_user") {
        if(
            isset($_POST) && 
            isset($_POST["Email"]) &&
            isset($_POST["mdp"]) 
        
        ) {
            $nom =    (isset($_POST["Nom"])     && trim(($_POST["Nom"])!=="")     ) ? $_POST["Nom"] :"none";
            $prenom = (isset($_POST["Prenoms"]) && trim(($_POST["Prenoms"])!=="") ) ? $_POST["Prenoms"] :"none";
            $date_naissance = (isset($_POST["date_naissance"])  && trim(($_POST["date_naissance"])!=="") )? $_POST["date_naissance"] :"none";
            $sexe = (isset($_POST["sexe"]) && trim(($_POST["sexe"])!== "") ) ? $_POST["sexe"] :"none";
            $id_parcours = (isset($_POST["id_parcours"]) && trim(  ($_POST["id_parcours"])!== "") ) ? $_POST["id_parcours"] :0;


            $Email = $_POST["Email"];
            $Mdp = $_POST["mdp"];
            $id = $_POST["id"];
        
            // ===============================
            // dump([
            //     "post"=>$_POST,
            //     "data"=>[
            //         $nom,$prenom, $date_naissance, $sexe, $id_parcours,$Email,$Mdp
            //     ],
            //     "action"=>$action
            // ]);
            $user = new User();
            $user->update($id,$nom,$prenom,$date_naissance, $sexe, $id_parcours,$Email,$Mdp);
            redirect("/List.php");exit();
            // ===============================
                
        }
    }
    else if($action == "deconnection") {

        dump($_SESSION);
        sessionRemove();
        redirect("/Login.php");exit();
    }
    else if($action == "delete_user") {
        $id = (isset($_GET) && isset($_GET["id"]))? $_GET["id"]:0;
        if($id===0){redirect("/List.php");}
        
        $USER = new User();
        $user = $USER->delete($id);
        if(!$user){redirect("/List.php");}

            
    }
}
