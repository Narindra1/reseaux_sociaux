<?php
session_start();
include_once("Core/Helper.php");
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <div class="">
        <form method="post" action="/Core/Controller.php?action=login">
            <label for="Email">Email </label>
            <input name="Email" id="Email" placeholder="adresse email"></input><br></br>
            <label for="mdp">Mot de passe</label>
            <input type="text" name="mdp" id="mdp" placeholder="mot de passe"></input><br></br>
            <input type="submit" value="Connexion">
        </form>
    </div>
</body>

</html>