<?php
include("../inc/functions.php");
if (isset($_GET['etat']))
{
    $choix = $_GET['filtre'];
}
session_start();
retourner_objet($_SESSION['IdM'], $id_membre);

header('location:fichemembre.php');
?>