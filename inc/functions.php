<?php
require("connexion.php");

function register($nom, $date, $genre,$email, $ville, $mdp)
{
    $sql = "insert into membres (nom, date_de_naissance, genre, email, ville, mdp, image_profil)
     values('$nom', '$date', '$genre', '$email', '$ville', '$mdp', 'profil.png')";
    mysqli_query(dbconnect(), $sql);
}

function login($nom, $mdp)
{
    $sql = sprintf("select * from membres where email='$nom' and mdp='$mdp'");
    $donnee = mysqli_query(dbconnect(), $sql);
    $result = mysqli_fetch_assoc($donnee);

    mysqli_free_result($donnee);

    if ($nom == $result['email'] && $mdp == $result['mdp']) {
        return $result;
    } else {
        return 0;
    }
}

function current_date()
{
    $sql= "select current_date()";
    $donnee = mysqli_query(dbconnect(), $sql);
    $result = mysqli_fetch_assoc($donnee);

}

function liste_objet($id_objet)
{
    $sql= "select * from objet where id_objet != $id_objet";
    $donnee = mysqli_query(dbconnect(), $sql);

    $result = array();
    while ($pub = mysqli_fetch_assoc($donnee)) 
    {
        $result[] = $pub;
    }
    mysqli_free_result($donnee);
    return $result;
}

function liste_emprunts()
{
    $sql= "select * from emprunt 
    join objet on emprunt.id_objet=objet.id_objet";
    $donnee = mysqli_query(dbconnect(), $sql);

    $result = array();
    while ($pub = mysqli_fetch_assoc($donnee)) 
    {
        if($pub['date_retour'] < current_date())
        {
            $pub['date_retour']== NULL;
        }
        $result[] = $pub;
    }

    mysqli_free_result($donnee);
    return $result;
}


function liste_categorie()
{
    $sql = "select * from categorie_objet";
    $donnee = mysqli_query(dbconnect(), $sql);

    while ($pub = mysqli_fetch_assoc($donnee)) 
    {
        $result[] = $pub;        
    }
    return $result;
}

function objets_filtre($choix)
{
    $sql = "select * from objet join categorie_objet 
    on objet.id_categorie=categorie_objet.id_categorie
    where objet.id_categorie=$choix";
    $donnee = mysqli_query(dbconnect(), $sql);

    while ($pub = mysqli_fetch_assoc($donnee)) 
    {
        $result[] = $pub;

    }
    return $result;   
}

?>