<?php
include("../inc/functions.php");;

$categorie = liste_categorie();
$emprunt = liste_emprunts();
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

    <div class="row">
        <div class="col-lg-4 offset-1">
            <h3 class="mt-5">Liste de tous les objets</h3>

        </div>

        <div class="col-lg-6 offset-1">
            <div class="row">
                <h3 class="mt-4">Filtre</h3>
                <form action="traitement_filtre.php" method="get">
                    <select name="filtre">
                        <?php foreach ($categorie as $c) { ?>
                            <option value="<?= $c['id_categorie'] ?>"><?= $c['nom_categorie'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" value="Soumettre">
                </form>

            </div>

        </div>

    </div>

    <div class="col-lg-10 offset-1 ">
        <table class="table table-hover">
            <tr>
                <td><strong>Objets</strong></td>
                <td><strong>Date_emprunt</strong></td>
                <td><strong>Date de retour</strong></td>
            </tr>


            <?php foreach ($emprunt as $e) { ?>
                <tr>
                    <td><?= $e['nom_objet'] ?></td>
                    <td><?= $e['date_emprunt'] ?></td>
                    <td><?= $e['date_retour'] ?></td>
                </tr>

                <?php $objet = liste_objet($e['id_objet']); ?>

                <?php foreach ($objet as $o) { ?>
                    <tr>
                        <td><?= $o['nom_objet'] ?></td>
                        <td>Disponible</td>
                        <td>Disponible</td>
                    </tr>
                <?php } ?>


            <?php } ?>
        </table>

    </div>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>