<?php
session_start();
ini_set("display_errors", 1);

include_once("Core/Helper.php");
include_once("Core/Publication.php");

// $U = new Publication();
// $publications = $U->getAllWithDetails();
$userAuth = isAuth();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Listpublication</title>
</head>

<body>
    <nav>
        <p class="text-white">Bienvenue <?= $userAuth["nom"] ?> <?= $userAuth["isAdmin"]==1? "(ADMIN)":"" ?> </p>
        <div class="flex">
            <button><a href="/Core/Controller.php?action=deconnection">Deconnection</a></button>
            <button><a href="/Add.php">Ajouter</a></button>
        </div>
    </nav>
    <div id="publications"></div>

</body>
<script src="/code.js"></script>
<script> listePublication()</script>
</html>

