<?php
include("../inc/functions.php");;

session_start();

$categorie = liste_categorie();
$emprunt = liste_emprunts();

if (isset($_GET['indice'])) {
    $statut = statut_emprunt($_GET['indice'], $_SESSION['IdM']);
}

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

    <a href="fichemembre.php">Fiche du membre</a>
    <a href="menu.php">Menu</a>
    <div class="row align-items-center mt-5">
        <div class="col-lg-4 offset-1">
            <h3 class="mb-0">Liste de tous les objets</h3>
        </div>

        <div class="col-lg-3 mt-5">

            <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Ajouter objet
                </a>
            </p>

            <div class="collapse" id="collapseExample">
                <div class="card card-body">

                    <form action="traitement_upload.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="nom_objet" placeholder="Nom de l'objet">
                        <input type="file" name="img_profil" placeholder="Choisir une image">
                        <input type="submit" class="ajout" value="Upload">
                    </form>

                    </ul>

                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="d-flex">
                <h3 class="mb-0 me-3">Filtre</h3>
                <form action="traitement_filtre.php" method="get" class="d-flex align-items-center">
                    <select name="filtre" class="form-select me-2" aria-label="Default select example">
                        <?php foreach ($categorie as $c) { ?>
                            <option value="<?= $c['id_categorie'] ?>"><?= $c['nom_categorie'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" class="btn btn-primary" value="Soumettre">
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
                <td><strong>Emprunt</strong></td>
                <td>Statut</td>
            </tr>


            <?php foreach ($emprunt as $e) { ?>
                <tr>
                    <td> <a href="fiche.php?id=<?= $e['id_objet'] ?>"> <?= $e['nom_objet'] ?> </a></td>
                    <td><?= $e['date_emprunt'] ?></td>
                    <td><?= $e['date_retour'] ?></td>
                    <td>
                        <?php if ($statut != NULL && $statut['id_objet'] == $e['id_objet']) { ?>
                            Disponible le <?= $statut['date_retour'] ?>
                        <?php } else { ?>
                            Disponile
                        <?php } ?>

                    </td>
                    <td>
                        <form action="traitement_emprunt.php" method="get">
                            <input type="hidden" value="<?= $e['id_objet'] ?>" name="id_objet">
                            <input type="submit" value="Emprunter" class="btn-primary">
                        </form>
                    </td>
                </tr>

                <?php $objet = liste_objet($e['id_objet']); ?>

                <?php foreach ($objet as $o) { ?>
                    <tr>
                        <td> <a href="fiche.php?id=<?= $o['id_objet'] ?>"> <?= $o['nom_objet'] ?> </a></td>
                        <td>Non emprunte</td>
                        <td>Non emprunte</td>
                        <td>
                        <?php if ($statut != NULL  && $statut['id_objet'] == $o['id_objet']) { ?>
                            Disponible le <?= $statut['date_retour'] ?>
                        <?php } else { ?>
                            Disponible
                        <?php } ?>

                        </td>

                        <td>

                            <form action="traitement_emprunt.php" method="get">
                                <input type="hidden" value="<?= $o['id_objet'] ?>" name="id_objet">
                                <input type="submit" value="Emprunter" class="btn-primary">
                            </form>
                        </td>

                    </tr>
                <?php } ?>


            <?php } ?>
        </table>

    </div>


    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>