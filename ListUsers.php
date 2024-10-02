<?php
session_start();
ini_set("display_errors",1);

include_once("Core/Helper.php");
include_once("Core/User.php");

$U = new User();
$users = $U->getAll() ;
$userAuth = isAuth();
?>



<p>Bienvenue Admin <?= $userAuth["nom"] ?> </p>
<button><a href="/Core/Controller.php?action=deconnection">Deconnection</a></button>
<button><a href="/Add.php">Ajouter</a></button>
<table border="1">
    <thead>
        <tr>
            <th>id</th>
            <th>Nom</th>
            <th>Prenoms</th>
            <th>Date de naissance</th>
            <th>Sexe</th>
            <th>Parcours</th>
            <th>Email</th>
            <th>Mdp</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $a): ?>
            <tr>
                <td><?= $a["id"] ?>    </td>
                <td><?= $a["nom"] ?>    </td>
                <td><?= $a["prenom"] ?></td>
                <td><?= $a["date_naissance"] ?></td>
                <td><?= $a["sexe"] ?></td>
                <td><?= $a["id_parcours"] ?></td>
                <td><?= $a["email"] ?>  </td>
                <td><?= $a["password"] ?>    </td>

                <td>
                    <button>voir</button>
                    <button>
                        <a href=<?= "/Modifie.php?id=".$a["id"] ?>>
                            modifier
                        </a>
                    </button>
                    <button>
                        <a href=<?= "/Core/Controller.php?action=delete&id=".$a["id"] ?>>
                            supprimer
                        </a>
                    </button>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php
