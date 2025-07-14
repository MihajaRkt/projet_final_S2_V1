<?php 
    include("../inc/functions.php");;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $page= $_GET['page'];
        include("$page");
    ?>
</body>
</html>