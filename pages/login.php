<?php 
    include("../inc/functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Login</title>
</head>

<body>

    <div class="contener">
        <h1 class="log">Login</h1>

        <form action="traitement_login.php" method="post">
            <input type="email" placeholder="Email" class="mdp" name="email"><br>
            <input type="password" placeholder="Password" class="mdp" name="mdp"><br>
            <input type="submit" value="Submit" class="submit"><br>
        </form>

        <p class="new"><a href="signup.php"><span id="sign">Sign in</span></a></p>
    </div>



    <?php
    if (isset($_GET['erreur'])) {
    ?>
        <p>Veuillez verifier votre identifiant</p>
    <?php
    }
    ?>

</body>

</html>