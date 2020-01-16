<?php
include_once("lecture_donnees.php");
function verifierSecteur($nomSecteur){
    $connexion = databaseConnexion();
    $listeSecteurs=getAllSecteurs();
    foreach($listeSecteurs as $donnee){
        if (strtoupper($nomSecteur)==$donnee["LIBELLE_SECTEUR"]){
            return true;
            break;
        }
        else{
            return false;
        }
    }
}

?>