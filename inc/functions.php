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
    $sql ="select * from membres where email='$nom' and mdp='$mdp'";
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

    return $result;

}

function liste_objet($id_objet)
{
    $sql= "select * from objet  
    join images_objet on objet.id_objet= images_objet.id_objet
    where objet.id_objet != $id_objet";
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
    join objet on emprunt.id_objet=objet.id_objet
    join images_objet on objet.id_objet= images_objet.id_objet";

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

function id_objet_par_nom($nom)
{
    $sql= "select id_objet from objet where nom_objet= '$nom'";
    $donnee = mysqli_query(dbconnect(), $sql);
    $result = mysqli_fetch_assoc($donnee);

    return $result;
}

function changer_image($nom_img, $id_obj)
{
    $val = "update images_objet set nom_image= '$nom_img' where id_objet= $id_obj";
    mysqli_query(dbconnect(), $val);
}

function ajouter_objet($nom)
{
    $sql= "insert into objet(nom_objet, id_categorie, id_membre) values ('$nom', 0, NULL)";
    mysqli_query(dbconnect(), $sql);
}

function ajouter_image($nom_img, $id_obj)
{
    $val = "insert into images_objet values(nom_image, id_objet) set nom_image= '$nom_img' where id_objet= $id_obj";
    mysqli_query(dbconnect(), $val);
}

function verifier_objet($nom_obj)
{
    $sql= "select * from objet where nom_objet= '$nom_obj' ";
    $donnee = mysqli_query(dbconnect(), $sql);
    $result = mysqli_fetch_assoc($donnee);

    if($result['nom_objet'] == $nom_obj)
    {
        return $result;
    }

    else
    {
        return 0;
    }
}

function info_objet ($id_objet)
{
    $sql = "select * from objet join images_objet
    on objet.id_objet=images_objet.id_objet
    where objet.id_objet=$id_objet";
    $donnee = mysqli_query(dbconnect(), $sql);
    $result = mysqli_fetch_assoc($donnee);
    return $result;
}

function historique_emprunt($id_objet)
{
    $sql = "select * from emprunt where id_objet=$id_objet";
    $donnee = mysqli_query(dbconnect(), $sql);
    $result = mysqli_fetch_assoc($donnee);
    
    if($result['id_objet'] != $id_objet)
    {
        return NULL;
    }

    else
    {
        return $result;   
    }

}

function emprunter_objet($id_objet, $id_membre)
{
    $sql= "insert into emprunt (id_objet, id_membre, date_emprunt, date_retour) values 
    ($id_objet, $id_membre, current_date(), current_date()+ 3)";
    mysqli_query(dbconnect(), $sql);
}

function statut_emprunt($id_objet, $id_membre)
{
    $sql= "select * from emprunt where id_objet= $id_objet and id_membre= $id_membre";
    $donnee = mysqli_query(dbconnect(), $sql);
    $result = mysqli_fetch_assoc($donnee);
    return $result;
}

function info_membre($id)
{
    $sql= "select * from membres where id_membre=$id";
    $req = mysqli_query(dbconnect(), $sql);
    $result = mysqli_fetch_assoc($req);
    return $result;
}

function emprunt_corrrespondant($id)
{
    $sql = "select emprunt.*, objet.nom_objet from emprunt join objet on emprunt.id_objet=objet.id_objet where emprunt.id_membre=$id";
    $donnee = mysqli_query(dbconnect(), $sql);

    while ($pub = mysqli_fetch_assoc($donnee)) 
    {
        $result[] = $pub;

    }
    return $result;      
}
    
function retourner_objet($id_objet, $id_membre)
{
    $sql = "delete from emprunts where id_membre=$id_membre and id_objet=$id_objet";
    $req = mysqli_query(dbconnect(), $sql);
}

function etat_objet($indication)
{
    
}
?>