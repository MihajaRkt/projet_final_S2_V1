<?php
include("../inc/functions.php");

$choix = $_GET['filtre'];

header("Location:filtre.php?ind=$choix");

?>