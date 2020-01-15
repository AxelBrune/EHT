<?php
include_once("../ConnexionBDD/connexion.php");

function getAllAnnonces(){
    $connexion = databaseConnexion();
    $req = "SELECT * FROM EHT_ANNONCE";
    $donneesRecues = [];
    LireDonneesPDO1($connexion,$req,$donneesRecues);
    return $donneesRecues;
}

function getAllSecteurs(){
    $connexion = databaseConnexion();
    $req = "SELECT * FROM EHT_SECTEUR";
    $donneesRecues = [];
    LireDonneesPDO1($connexion,$req,$donneesRecues);
    return $donneesRecues;
}
?>