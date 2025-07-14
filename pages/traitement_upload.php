<?php
session_start();

include('../inc/functions.php');
$objet= $_POST['nom_objet'];
$id_objet= id_objet_par_nom($objet);
$verif= verifier_objet($objet);

var_dump($id_objet);

$uploadDir = '../assets/uploads/';
$maxSize = 2 * 1024 * 1024; 
$allowedMimeTypes = ['image/jpeg', 'image/png', 'image/webp', 'application/pdf'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['img_profil'])) 
{
    $file = $_FILES['img_profil'];

    if ($file['error'] !== UPLOAD_ERR_OK) 
    {
        die('Erreur lors de l’upload : ' . $file['error']);
    }

    if ($file['size'] > $maxSize) 
    {
        die('Le fichier est trop volumineux.');
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mime, $allowedMimeTypes)) 
    {
        die('Type de fichier non autorisé : ' . $mime);
    }

    $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = $originalName . '_' . uniqid() . '.' . $extension;
    
    if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) 
    {
        echo "Fichier uploadé avec succès : " . $newName;

        if($verif== 0)
        {
            ajouter_objet($objet);
            ajouter_image($newName, $id_objet['id_objet']);
        }

        else
        {
            changer_image($newName, $id_objet['id_objet']);
        }
    } 
    

    else     
    {
        echo "Échec du déplacement du fichier.";
    }

    header('Location:../pages/accueil.php');

}

else 
{
    echo "Aucun fichier reçu.";
}

?>
