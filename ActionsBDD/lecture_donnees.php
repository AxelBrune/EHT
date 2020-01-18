<?php
include_once("../ConnexionBDD/connexion.php");

function getAllAnnonces(){
    $connexion = databaseConnexion();
    $req = "SELECT * FROM EHT_ANNONCE";
    $donneesRecues = [];
    LireDonneesPDO1($connexion,$req,$donneesRecues);
    return $donneesRecues;
}

function getAnnonce($ref){
    $connexion = databaseConnexion();
    $req = "SELECT * FROM EHT_ANNONCE WHERE REFERENCE=:ref";
    $donneesRecues = [];
    $cur=preparerRequetePDO($connexion,$req);
    ajouterParamPDO($cur,':ref',$ref);
    LireDonneesPDOPreparee($cur,$donneesRecues);
    return $donneesRecues[0];
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

function getImages($ref){
    $connexion = databaseConnexion();
    $req = "SELECT NOM_IMAGE FROM EHT_IMAGES WHERE REFERENCE=:ref";
    $donneesRecues = [];
    $cur=preparerRequetePDO($connexion,$req);
    ajouterParamPDO($cur,':ref',$ref);
    LireDonneesPDOPreparee($cur,$donneesRecues);
    return $donneesRecues;
}
?>