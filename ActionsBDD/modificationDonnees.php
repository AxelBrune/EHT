<?php
include_once("../ConnexionBDD/connexion.php");

function cacherAnnonce($reference){
    $connexion = databaseConnexion();
    $req = "UPDATE EHT_ANNONCE
            SET ACTIF = 1 WHERE REFERENCE = ?";
    $cur = preparerRequetePDO($connexion, $req);
    $donnees = array($reference);
    majDonneesPrepareesTabPDO($cur, $donnees);
}

?>