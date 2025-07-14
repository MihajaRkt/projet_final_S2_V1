<?php
include("../inc/functions.php");

session_start();
$mdp=$_POST['mdp'];
$email=$_POST['email'];

$log= login($email, $mdp);

$_SESSION['IdM']= $log['Id_membre'];
var_dump($_SESSION['IdM']);

if($log == 0)
{
    header('Location:login.php?erreur=1');
}

else
{
    header('Location:accueil.php');
}
?>