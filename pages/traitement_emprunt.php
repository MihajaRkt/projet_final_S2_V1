<?php 
    include("../inc/functions.php");
    session_start();

$id_objet= $_GET['id_objet'];
var_dump($id_objet);

$emprunt= emprunter_objet($id_objet, $_SESSION['IdM']);

header("Location:accueil.php?indice=$id_objet");

?>
