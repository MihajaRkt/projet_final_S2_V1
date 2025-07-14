<?php
include("../inc/functions.php");

$nom=$_POST['nom'];
$email=$_POST['email'];
$mdp=$_POST['mdp'];
$date=$_POST['date'];
$genre=$_POST['genre'];
$ville=$_POST['ville'];

register($nom, $date, $genre, $email, $ville, $mdp);
header('location:login.php');
?>