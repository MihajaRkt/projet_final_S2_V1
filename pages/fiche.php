<?php
include("../inc/functions.php");

if (isset($_GET['id'])) {
    $indice = $_GET['id'];
}
$info = info_objet($indice);
$historique = historique_emprunt($indice);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche</title>
</head>

<body>
    <h3> Objet: <?= $info['nom_objet'] ?></h3>
    <img src="../assets/uploads/<?= $info['nom_image'] ?>" class="img-thumbnail" width="50px" height="50px">

    <?php if ($historique != NULL) { ?>
            <p>Date emprunt: <?= $historique['date_emprunt'] ?></p>
            <p>Date retour: <?= $historique['date_retour'] ?></p>

    <?php } else { ?>
        <p>Pas d'emprunt</p>
    <? }?>


    <a href="accueil.php">Retour</a>
</body>

</html>