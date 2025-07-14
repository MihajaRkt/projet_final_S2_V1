<?php 
    include("../inc/functions.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Document</title>
</head>

<body>

<div class="contener">
        <h1 class="log">Sign Up</h1>

        <form action="traitement_signup.php" method="post">
            <input type="text" placeholder="Username" class="mdp" name="nom"><br>
            <input type="email" placeholder="Email" class="mdp" name="email"><br>
            <input type="password" placeholder="Password" class="mdp" name="mdp"><br>
            <input type="text" placeholder="Genre" class="mdp" name="genre"><br>
            <input type="date" placeholder="Date de naissance" class="mdp" name="date"><br>
            <input type="text" placeholder="Ville" class="mdp" name="ville"><br>
            <input type="submit" value="Submit" class="submit"><br>
        </form>

        <p class="new">If you have already have an account <a href="login.php"><span id="sign">Login</span></a></p>
    </div>


</body>

</html>