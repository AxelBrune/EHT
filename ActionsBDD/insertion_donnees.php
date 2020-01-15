<?php
include_once("../ConnexionBDD/connexion.php");

function insererSecteur($libelle){
    $connexion = databaseConnexion();
    $req = "INSERT INTO EHT_SECTEUR(LIBELLE_SECTEUR)
    VALUES (:libelle)";    
    $cur = preparerRequetePDO($connexion, $req);
    $cur = ajouterParamPDO($cur,':libelle',$libelle);
    $res = majDonneesPrepareesPDO($cur);
}

function insererAnnonce($titre,$secteur,$prix,$description){
    $connexion = databaseConnexion();
    $req = "INSERT INTO EHT_ANNONCE(TITRE,N_SECTEUR, PRIX,DESCRIPTIF)
    VALUES (:titre,1,:prix, :descriptif)";    
    $cur = preparerRequetePDO($connexion, $req);
    $cur = ajouterParamPDO($cur,':titre',$titre);
    $cur = ajouterParamPDO($cur,':prix',floatval($prix));
    $cur = ajouterParamPDO($cur,':descriptif', $description);
    $res = majDonneesPrepareesPDO($cur);
}
?>