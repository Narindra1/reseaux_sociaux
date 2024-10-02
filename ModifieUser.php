<?php
session_start();
include_once("Core/Helper.php");
include_once("Core/User.php");
require_once(dirname(__FILE__) . "/Core/Parcours.php");
$PARCOUR = new Parcours();
$parcours = $PARCOUR->getAll();

$userAuth = isAuth();
// dump($userAuth);
$id = (isset($_GET) && isset($_GET["id"]))? $_GET["id"]:0;

if($id===0){redirect("/List.php");}

$USER = new User();
$user = $USER->find($id);

if(!$user){redirect("/List.php");}

//dump(["user"=>$user]);
// $user = $userAuth;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add </title>
</head>

<body>

    <p>Hello Mr <?= $userAuth["nom"] ?> </p>
    <div class="info">
        <form method="post" action="/Core/Controller.php?action=modifie">
            <label for="Nom">Nom:</label>
            <input type="text" name="Nom" id="Nom" placeholder="nom" value="<?= $user["nom"]?>"><br><br>
            
            <label for="Prenoms">Prenoms:</label>
            <input type="text" name="Prenoms" id="Prenoms" placeholder="prénoms"  value="<?= $user["prenom"]?>"><br><br>
            <label for="Date_Naissance">Date de Naissance:</label>
            <input type="date" name="date_naissance" id="date_naissance" placeholder="date_naissance"  value="<?= $user["date_naissance"]?>"><br><br>

            <label for="Sexe">Sexe: </label>

            <label for="Masculin">Masculin</label>
            <input type="radio" name="sexe" id="sexe" value ="Masculin" <?= (!($a["sexe"] && $a["sexe"]=="Masculin"))? "checked":"" ?>>

            <label for="Feminin">Féminin </label>
            <input type="radio" name="sexe" id="sexe"  value = "Féminin" <?= (($a["sexe"]  && $a["sexe"]=="Masculin"))? "checked":"" ?> ><br><br>

            <label for="parcours">Parcours: </label>
            <select name="id_parcours" id="id_parcours">
                <?php foreach ($parcours as $a): ?>

                    <option value="<?= $user["id_parcours"]?>"><?= $a["label"] ?></option>
                <?php endforeach ?>
            </select><br><br>

            <label for="Email">Email </label>
            <input name="Email" id="Email" placeholder="adresse email" value="<?= $user["email"]?>"></input><br></br>
            
            <label for="mdp">Mot de passe</label>
            <input type="text" name="mdp" id="mdp" placeholder="mot de passe" value="<?= $user["password"]?>"></input><br></br>
            
            <input type="text" name="id" id="id" value="<?= $user["id"]?>" hidden></input><br></br>

            <button type="submit">Ajouter</button>
        </form>

    </div>
</body>

</html>