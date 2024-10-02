<?php
session_start();
ini_set("display_errors", 1);
error_reporting(E_ALL);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter</title>
</head>

<body>

    <div class="info">
        <form method="post" action="/Core/Controller.php?action=add">
            <label for="Nom">Nom:</label>
            <input type="text" name="Nom" id="Nom" placeholder="nom"><br><br>

            <label for="Prenoms">Prenoms:</label>
            <input type="text" name="Prenoms" id="Prenoms" placeholder="prénoms"><br><br>

            <label for="Date_Naissance">Date de Naissance:</label>
            <input type="date" name="date_naissance" id="date_naissance" placeholder="date_naissance"  ><br><br>

            <label for="Sexe">Sexe: </label>

            <label for="Masculin">Masculin</label>
            <input type="radio" name="sexe" id="sexe" value="Masculin" >

            <label for="Feminin">Féminin </label>
            <input type="radio" name="sexe" id="sexe" value="Féminin " ><br><br>

           
            <label for="Email">Email </label>
            <input name="Email" id="Email" placeholder="adresse email"></input><br></br>

            <label for="mdp">Mot de passe</label>
            <input type="text" name="mdp" id="mdp" placeholder="mot de passe"></input><br></br>

            <button type="submit">Enregistrer</button>
        </form>

    </div>

</body>

</html>