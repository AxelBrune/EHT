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
    $req = "SELECT LIBELLE_SECTEUR FROM EHT_SECTEUR";
    $donneesRecues = [];
    LireDonneesPDO1($connexion,$req,$donneesRecues);
    return $donneesRecues;
}

function getRefMax(){
    $connexion = databaseConnexion();
    $req = "SELECT MAX(REFERENCE)+1 AS MAXI FROM EHT_ANNONCE";
    $donneesRecues = [];
    LireDonneesPDO1($connexion,$req,$donneesRecues);
    return $donneesRecues[0]["MAXI"];
}

function getNMax(){
    $connexion = databaseConnexion();
    $req = "SELECT MAX(N_SECTEUR)+1 AS MAXI FROM EHT_SECTEUR";
    $donneesRecues = [];
    LireDonneesPDO1($connexion,$req,$donneesRecues);
    return $donneesRecues[0]["MAXI"];
}
?>