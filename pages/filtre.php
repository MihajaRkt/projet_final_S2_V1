<?php
include("../inc/functions.php");

$indice = $_GET['ind'];
$filtre = objets_filtre($indice);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<body>

    <div class="col-lg-10 offset-1">
        <table class="table table-hover mt-5">
            <tr>
                <td><strong>Objets</strong> </td>
                <td><strong>Categorie</strong> </td>
            </tr>

            <?php foreach ($filtre as $f) { ?>
                <tr>
                    <td><?= $f['nom_objet'] ?></td>
                    <td><?= $f['nom_categorie'] ?></td>
                </tr>
            <?php } ?>
        </table>


    </div>
    <a href="accueil.php">Revenir a l'accueil</a>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>