<?php
include("../inc/functions.php");
session_start();
// var_dump($_SESSION['IdM']);
$info = info_membre($_SESSION['IdM']);
$liste = emprunt_corrrespondant(($_SESSION['IdM']));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <title>Fiche membre</title>
</head>

<body>
    <h3>Nom : <?= $info['nom'] ?></h3>

    <table border="1">
        <?php foreach ($liste as $l) { ?>
            <tr>
                <td><?= $l['nom_objet'] ?></td>
                <td><?= $l['date_emprunt'] ?></td>
                <td><?= $l['date_retour'] ?></td>
                <td>
                    <p>
                        <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Retourner objet
                        </a>
                    </p>

                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">

                            <form action="traitement_retourner.php" method="get" class="d-flex align-items-center">
                                <select name="filtre" class="form-select me-2" aria-label="Default select example">
                                        <option value="0">Abime</option>
                                        <option value="1">OK</option>
                                </select>
                                <input type="submit" class="btn btn-primary" value="Soumettre">
                            </form>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>